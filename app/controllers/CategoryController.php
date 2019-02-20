<?php

namespace app\controllers;

use app\models\CategoryModel;
use project\Pagination;

class CategoryController extends AppController
{
    public function __construct($route) {
        parent::__construct($route);
        $this->model = new CategoryModel();
        $this->itemModel = new \app\models\ItemModel();
    }

    public function index()
    {
        $alias = $this->route['alias'];
        $category = $this->model->readCat($alias);
        if (!$category) {
            throw new \Exception('Страница не найдена', 404);
        }
        $filter = [];
        $ids = $this->getIds($category['id']);
        $ids = !$ids ? $category['id'] : $ids . $category['id'];
        $filter['ids'] = $ids;
        if (isset($_GET['brand'])) {
            $filter['brand'] = $_GET['brand'];
        }
        if (isset($_GET['price'])) {
            $price = explode('-', $_GET['price']);
            $filter['priceMin'] = (int)$price[0];
            $filter['priceMax'] = (int)$price[1];
        }
        if ((!empty($_POST['price'])) || (!empty($_POST['price2']))) {
            $min = $this->itemModel->listItems($filter = [], $fields = 'min')['min'];
            $max = $this->itemModel->listItems($filter = [], $fields = 'max')['max'];
            $priceMin = (int)$_POST['price']?: $min;
            $priceMax = (int)$_POST['price2'] ?: $max;
            $price = $priceMin . "-" . $priceMax;
            $url = filterUrl($alias, 'price', $price);
            redirect($url);
        }
        
        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
        switch ($sort)
        {
            case 'price-asc';
            $sort = 'price ASC';
            break;
            
            case 'price-desc';
            $sort = 'price DESC';
            break;
        
            default :
            $sort = 'id DESC';
            break;
        }
        
        $perpage = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $total = $this->itemModel->listItems($filter, $fields = 'count', ['sort' => $sort]);
        $total = $total['count'];
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $pagination = $pagination->getHtml();
        
        $products = $this->itemModel->listItems($filter, $fields = null, ['sort' => $sort], $perpage, $start);
        $brands = $this->model->findAll('brands');
        
        $this->setMeta($category['name']);
        $this->set(compact('products','brands','category','pagination','alias'));
    }
    
    public function getIds($id)
    {
        $category = $this->model->getColumnAsKey();
        $ids = null;
        foreach ($category as $k=>$v) {
            if ($v['parent_id'] == $id) {
                $ids .=$k . ',';
                $ids .= $this->getIds($k);
            }
        }
        return $ids;
    }
    
}
