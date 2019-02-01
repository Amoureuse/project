<?php
namespace app\controllers;

use app\models\UserModel;
use project\Auth;

class AuthController extends AppController
{
    use TValidation;
    
    public function __construct($route)
    {
        parent::__construct($route);
        $this->model = new UserModel();
        
    }

    public function login()
    {
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $user = $this->model->read($email);
            if (!$user) {
               $error = "Пользователя с таким email не существует";
               splashMessage($error,'alert-danger');
               redirect('/login') ;
            }
            if (password_verify($_POST['pass'], $user['pass'])) {
                Auth::login($user['id']);
                if (Auth::isAdmin()) {
                    redirect('/admin');
                }
                $url = memUrl();
                if (!empty ($url)) {
                    redirect($url); 
                } else {
                    redirect('/'); 
                }              
            } else {
                $oldData = [
                    'email' => $_POST['email']
                ];
                $error="Неверный пароль";
                oldData($oldData);
                splashMessage($error,'alert-danger');
                redirect('/login'); 
            }
        }
        
        $this->setMeta('Авторизация');
        
    }
    
    public function register()
    {
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $user = $this->model->read($email);
            $errors = $this->validation($user);
            if ($errors !== true) {
                $oldData = [
                    'email' => $_POST['email'],
                    'username'=>$_POST['username']
                ];
                splashMessage($errors[0],'alert-danger');
                oldData($oldData);
                redirect('/register');
            }
            $data = $_POST;
            $username = $data['username'];
            $email = $data['email'];
            $password = password_hash($data['pass'], PASSWORD_DEFAULT);
            $userId = $this->model->create($username, $email, $password);
            Auth::login($userId);
            redirect('/');
        }
        
        $this->setMeta('Регистрация');
       
    }
    
    public function logout()
    {
        Auth::logout();
        redirect('/');
    }
    
    
}
