<?php
namespace app\controllers;

Class HomeController extends AppController{

  public function index(){	
    $model = new \app\models\ItemModel('users');
    $items = $model->get_arr_items();
    $user = \project\Auth::getUser($model);
    $data = [
      'items'=> $items,
      'lastViewItems'=> $this->recViewed ($items),
      'cookieOk' => $this->cookie(),
        'user' => $user,
        ]; 
    $this->setMeta('Главная страница');
    $this->set($data);
    
  }

  public function __construct($route){
    parent::__construct($route);
    if (!isset($_SESSION['visited'])) {
            $_SESSION['visited'] = array();          
        }
  }
  public function recViewed ($items){
      $f_Items = [];
      if(isset($_GET['id'])){
      array_unshift($_SESSION['visited'], $_GET['id']);}
    
    $_SESSION['visited'] = array_unique($_SESSION['visited']);
    $_SESSION['visited'] = array_slice ($_SESSION['visited'],0,3);
    foreach ($_SESSION['visited'] as $value) {
        foreach ($items as $item){
            if ($value == $item->id){
            	 $f_Items[]= $item;
            }
	}
    }return $f_Items;
} 


	
}




