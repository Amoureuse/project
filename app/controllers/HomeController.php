<?php
namespace app\controllers;
use app\controllers\AppController;

Class HomeController extends AppController{

  public function index(){	
  
    $model = new \app\models\ItemModel();
    $items = $model->get_arr_items();
    $data = [
      'items'=> $items,
      'lastViewItems'=> $this->recViewed ($items),
      'cookieOk' => $this->cookie(),
        ];
    $this->view('home', $data);  
  }

  public function __construct(){
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





