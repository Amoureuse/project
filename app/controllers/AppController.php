<?php
namespace app\controllers;

use project\base\Controller;


Class AppController extends Controller {
   

    public function cookie(){
        if(isset($_COOKIE['check'])){
            return true;}
    }
    public function view($template,$data){
		extract($data);
		include(ROOT . '/app/templates/' . $template . '.php');
	}
}
