<?php

namespace app\controllers;

use app\models\ItemModel;
use project\Auth;
use project\Pagination;

Class HomeController extends AppController
{

    public function __construct($route)
    {
        parent::__construct($route);
        if (!isset($_SESSION['visited'])) {
            $_SESSION['visited'] = array();          
        }
        $this->model = new ItemModel();
    }
    
//    public function index()
//    {
//        
//        $user = Auth::getUser();
//        
//        $perpage = 3;
//        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
//        $total = $this->model->countAll();
//        $pagination = new Pagination($page, $perpage, $total);
//        $start = $pagination->getStart();
//        $pagination = $pagination->getHtml();
//        $items = $this->model->get_arr_items($start, $perpage);
//        
//        $lastItem =  $this->model->listItems();
//        $lastViewed = [];
//        foreach ($lastItem as $item) {
//            $lastViewed[] = new Item($item);
//        }
//        $data = [
//            'items'=> $items,
//            'lastViewItems'=> $this->recViewed ($lastViewed),
//            'cookieOk' => $this->cookie(),
//            'user' => $user,
//            'pagination' => $pagination
//        ]; 
//        
//        $this->setMeta('Все товары');
//        $this->set($data);
//    
//    }
    
    public function main()
    {
        if ((isset($_POST['check'])) and (isset($_POST['on']))) {
            setcookie('check','yes', time() +3600*24*365);
    	    header("Location: /");
    	    die;
        }
        $brands = $this->model->findAll('brands', 'LIMIT 0,3');
        $new = $this->model->find('goods', "new = '1'");
        foreach ($new as $item) {
            $news[] = new Item($item);
        }
        $this->setMeta('Главная');
        $this->set(['brands'=>$brands, 'news'=>$news, 'user' =>Auth::getUser(), 'cookieOk' => $this->cookie()]);
        
    }

    public function cookie()
    {
        if (isset($_COOKIE['check'])) {
            return true;
            
        }
    }
    
    public function recViewed($items)
    {
        $f_Items = [];
        if (isset($_GET['id'])) {
            array_unshift($_SESSION['visited'], $_GET['id']);
        }
        $_SESSION['visited'] = array_unique($_SESSION['visited']);
        $_SESSION['visited'] = array_slice ($_SESSION['visited'],0,3);
        foreach ($_SESSION['visited'] as $value) {
            foreach ($items as $item) {
                if ($value == $item->id) {
            	    $f_Items[]= $item;
                }
	    }
        }
        return $f_Items;
    }
    
    public function search()
    {
        if (!empty(trim($_GET['s']))) {
            $query = $_GET['s'];
            $query = htmlspecialchars($query);
            $filter = [];
        if(isset($_GET['s'])) {
            $filter['search'] = $query;
        }
        if (isset($_GET['brand'])) {
            $filter['brand'] = $_GET['brand'];
        }
        if (isset($_GET['price'])) {
            $price = explode('-', $_GET['price']);
            $filter['priceMin'] = (int)$price[0];
            $filter['priceMax'] = (int)$price[1];
        }
        if ((!empty($_POST['price'])) || (!empty($_POST['price2']))) {
            $min = $this->model->listItems($filter = [], $fields = 'min')['min'];
            $max = $this->model->listItems($filter = [], $fields = 'max')['max'];
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
        $total = $this->model->listItems($filter, $fields = 'count', ['sort' => $sort]);
        $total = $total['count'];
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $pagination = $pagination->getHtml();
        
        $products = $this->model->listItems($filter, $fields = null, ['sort' => $sort], $perpage, $start);
        $brands = $this->model->findAll('brands');
            $this->setMeta('Поиск по: ' . $query);
            $this->set(compact('search', 'query', 'products','brands','pagination'));
            debug($_GET);
        }
    }
	
}




