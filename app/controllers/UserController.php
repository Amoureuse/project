<?php


namespace app\controllers;
use app\models\UserModel;

class UserController extends AppController {
    
    public function __construct($route) {
        parent::__construct($route);
        if(!isset($_SESSION['logged'])){
            redirect('/login');
        }
    }

    public function index(){
        $user = \project\Auth::getUser();
        $data=[
            'user'=>$user,
        ];
        $this->set($data);
    }
    
    public function edit(){
        $model= new UserModel();
        $user = \project\Auth::getUser();
        if(!empty($_POST)){
            $errors = [];
            if($errors){
                $oldData = [
                'username'=>$_POST['username'],
                ];
            splashMessage($errors,$oldData);
            }
        $fileType = substr($_FILES['path']['name'], strrpos($_FILES['path']['name'], '.')+1);
        $file = "images/avatar/". md5($user['id']). '.' . $fileType;
        move_uploaded_file($_FILES['path']['tmp_name'], $file);
        $username = isset($_POST['username'])?$_POST['username']:$user['username'];
        $password = isset($_POST['pass'])?password_hash($_POST['pass'], PASSWORD_DEFAULT):$user['pass'];
            if($fileType == 'png'){
            $avatar = md5($user['id']).'.png';
            }else{
            $avatar = md5($user['id']).'.jpg';
            }
        }
        if(isset($_POST['submit'])){
        $model->update($user['id'],$username,$password,$avatar);
        redirect('/user');
        }
        $data=[
            'user'=>$user,
        ];
        $this->set($data);
    }
        
}
