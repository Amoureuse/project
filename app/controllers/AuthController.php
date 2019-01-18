
<?php
namespace app\controllers;
use app\controllers\AppController;


class AuthController extends AppController{
    protected $model;
    
    public function __construct() {
        $this->model = new \app\models\UserModel();
    }

    public function login(){
        if(!empty($_POST)){
            $email = $_POST['email'];
            $user = $this->model->read(['email' => $email]);
            if(!$user){
               redirect('/login') ;
            }
            if(password_verify($_POST['pass'], $user['pass'])){
                $_SESSION['logged_user'] = $user['id'];
                redirect('/');
            }else{
                redirect('/login'); 
            }
        }else{
        $this->view('auth', $data=[]);
        }
    }
      public function register(){
        if(!empty($_POST)){
            $errors = $this->checkRegister();
            var_dump($errors);
            if($errors !== true){
                $oldData = [
                    'email' => $_POST['email'],
                    'username'=>$_POST['username']
                ];
            redirect('/register');
            }else{
            $data = $_POST;
            $userId = $this->model->create($data);
            $_SESSION['logged_user'] = $userId;
            redirect('/');
          }
        }else{
          $this->view('register', $data=[]);  
        }
    }
    
    public function logout(){
        unset($_SESSION['logged_user']);
        redirect('/');
    }
    public function checkRegister(){
        if(isset($_POST['submit_reg'])){
            $errors = array(); 
            $email = $_POST['email'];
            $user = $this->model->read(['email' => $email]);
            var_dump($user);
            if(isset($user['email'])){
                $errors[] = 'Пользователь с таким email существует';
            }
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
        }
        if(empty($errors)){
                return true;
        }else{
                return $errors;
        }
    }
    
}
