<?php


namespace app\controllers;


class UserController extends AppController {
        
    public function index(){
        if(!isset($_SESSION['logged'])){
            redirect('/login');
        }
        
    }
}
