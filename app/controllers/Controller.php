<?php
namespace app\controllers;

Class Controller {
    public $data = [];
    public $connect;


    public function __construct() {
        $config = config('db');
        $db = \project\Database::getInstance($config);
        $this->connect = $db->connection;
    }

    public function cookie(){
        if(isset($_COOKIE['check'])){
            return true;}
    }
    public function view($template,$data){
		extract($data);
		include(ROOT . '/app/templates/' . $template . '.php');
	}
}
