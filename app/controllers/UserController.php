<?php


namespace app\controllers;
use app\models\UserModel;

class UserController extends AppController {
    
    public function __construct($route) {
        parent::__construct($route);
        $model= new UserModel();
        if (!(\project\Auth::userID())) {
            memUrl();
            redirect('/login');
        }
        if (isset($_SESSION['url'])) {
            unset($_SESSION['url']);
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
        
        $user = \project\Auth::getUser();
        if (!empty($_POST)) {
            $errors = [];
            if ($errors) {
                $data = [
                    'username'=>$_POST['username'],
                ];
                oldData($data);
                splashMessage($errors);
            }
            if (!empty($_FILES['path']['name'])) {
                $fileType = pathinfo($_FILES['path']['name']);
                $fileType = $fileType['extension'];
                $file = "images/avatar/". md5($user['id']). '.' . $fileType;
                move_uploaded_file($_FILES['path']['tmp_name'], $file);
                $avatar = md5($user['id']). '.' . $fileType;
            } else {
                $avatar = null;
            }
            $username = (!empty($_POST['username'])) ? $_POST['username'] : $user['username'];
            $password = (!empty($_POST['pass'])) ? password_hash($_POST['pass'], PASSWORD_DEFAULT) : $user['pass'];
        }
        if (isset($_POST['submit'])) {
            $model->update($user['id'],$username,$password,$avatar);
            redirect('/user');
        }
        $data=[
            'user'=>$user,
        ];
        $this->set($data);
    }
        
}
