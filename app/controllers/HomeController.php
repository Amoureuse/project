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
    
    public function index()
    {
        if ((isset($_POST['check'])) and (isset($_POST['on']))) {
            setcookie('check','yes', time() +3600*24*365);
    	    header("Location: /");
    	    die;
        }
        $user = Auth::getUser();
        
        $perpage = 3;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $total = $this->model->countAll();
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $items = $this->model->get_arr_items($start, $perpage);
        
        $data = [
            'items'=> $items,
            'lastViewItems'=> $this->recViewed ($items),
            'cookieOk' => $this->cookie(),
            'user' => $user,
            'pagination' => $pagination
        ]; 
        
        $this->setMeta('Все товары');
        $this->set($data);
    
    }
    
    public function main()
    {
        $brands = $this->model->findAll('brands', 'LIMIT 0,3');
        $news = $this->model->find('goods', "new = '1'");
        $this->setMeta('Главная');
        $this->set(['brands'=>$brands, 'news'=>$news, 'user' =>Auth::getUser()]);
        
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
	
}




