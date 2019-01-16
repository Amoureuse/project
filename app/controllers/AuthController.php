<?php
namespace app\controllers;
use app\controllers\Controller;


class AuthController extends Controller{
    
    public function login(){
       $this->check();
        $this->view('auth', $this->data);
    }
      public function register(){
        $this->check();
        $this->view('register', $this->data);
        
    }
    public function logout(){
        unset($_SESSION['logged_user']);
        header("Location: http://myproject/");
    }
    public function check(){
        if(isset($_POST['submit_reg'])){
            $errors = array(); 
            if(trim($_POST['username']) == '' || (!ctype_alnum($_POST['username']))){
                 $errors[] = 'Некорректный логин!';
            }
            if(trim($_POST['email']) == ''){
                 $errors[] = 'Введите email!';
            }
            if($_POST['pass'] == ''){
                 $errors[] = 'Введите пароль!';
            }
            if($_POST['pass_2'] != $_POST['pass']){
                 $errors[] = 'Пароли не совпадают!';
            }
            if(empty($errors)){
            $this->writeUser();
                echo'<div style ="color:green;">Вы успешно зарегистрированы!'
            . '<a href="http://myproject/auth/login">Авторизуйтесь</a></div><hr>';
            }else{
                echo'<div style ="color:red;">' . array_shift($errors) .'</div><hr>';
            }
          }
        if(isset($_POST['submit_log'])){
            $user = $this->getUser();
            if(isset($user)){
                if(password_verify($_POST['pass'], $user['pass'])){
                    $_SESSION['logged_user'] = $user;
                    header("Location: http://myproject/");
                }else{
                    $errors[] = 'Неверный пароль!';
                } 
            }else{
                $errors[] = 'Пользователя не существует!';
            }
            if(!empty($errors)){
                echo'<div style ="color:red;">' . array_shift($errors) .'</div><hr>';
            }
        }  
        
    }
    
    public function writeUser(){
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        $stmt = $this->connect->prepare("INSERT INTO users (username,email, pass) VALUES (? ,? ,?)");
        $stmt->bind_param('sss',$username, $email, $password);
        $stmt->execute();
        $result = $stmt->insert_id;
        return true;
    }
    public function getUser(){
        $email = $_POST['email'];
        $stmt = $this->connect->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }
}
