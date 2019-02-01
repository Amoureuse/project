<?php

namespace app\controllers;

use app\models\UserModel;
use project\Auth;

class UserController extends AppController
{
    use TValidation;
    
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model= new UserModel();
        if (!(Auth::userID())) {
            memUrl($_SERVER['REQUEST_URI']);
            redirect('/login');
        }
    }

    public function index()
    {
        $user = Auth::getUser();
        $data=[
            'user'=>$user,
        ];
        $this->set($data);
    }
    
    public function edit()
    {
        $user = Auth::getUser();
        if (!empty($_POST)) {
            $errors = $this->validation($user);
            if ($errors !== true) {
                $data = [
                    'username'=>$_POST['username'],
                ];
                oldData($data);
                splashMessage($errors['0'], 'alert-danger');
                redirect('/user/edit');
            }
            if (!empty($_FILES['path']['name'])) {
                if ($this->filesValid() !== true) {
                    splashMessage($this->filesValid(),'alert-danger');
                    redirect('/user/edit');
                }
                $fileType = pathinfo($_FILES['path']['name']);
                $fileType = $fileType['extension'];
                $file = "images/avatar/". md5($user['id']). '.' . $fileType;
                move_uploaded_file($_FILES['path']['tmp_name'], $file);
                $avatar = md5($user['id']). '.' . $fileType;
                splashMessage('Файл успешно загружен', 'alert-success');
            } else {
                $avatar = null;
            }
            $username = (!empty($_POST['username'])) ? $_POST['username'] : $user['username'];
            $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        }
        if (isset($_POST['submit'])) {
            $this->model->update($user['id'], $username, $password, $avatar);
            
        }
        $data=[
            'user'=>$user,
        ];
        $this->set($data);
    }
        
}