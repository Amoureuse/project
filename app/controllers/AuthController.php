
<?php
namespace app\controllers;



class AuthController extends AppController{
    protected $model;
    
    public function __construct($route) {
        parent::__construct($route);
        $this->model = new \app\models\UserModel();
    }

    public function login(){
        if(!empty($_POST)){
            $email = $_POST['email'];
            $user = $this->model->read(['email' => $email]);
            if(!$user){
               $error = "Пользователя с таким email не существует";
               splashMessage($error);
               redirect('/login') ;
            }
            if(password_verify($_POST['pass'], $user['pass'])){
                \project\Auth::login($user['id']);
                if(\project\Auth::isAdmin()){
                    redirect('/admin');
                }
                redirect('/');
            }else{
                $oldData = [
                    'email' => $_POST['email']
                ];
                oldData($oldData);
                $error="Неверный пароль";
                splashMessage($error);
                redirect('/login'); 
            }
        }
            $this->setMeta('Авторизация');
        
    }
      public function register(){
        if(!empty($_POST)){
            $errors = $this->checkRegister();
            if($errors !== true){
                $oldData = [
                    'email' => $_POST['email'],
                    'username'=>$_POST['username']
                ];
                oldData($oldData);
                splashMessage($errors[0]);
            redirect('/register');
            }
            $data = $_POST;
            $userId = $this->model->create($data);
            \project\Auth::login($userId);
        }else{
            $this->setMeta('Регистрация');
        }
    }
    
    public function logout(){
        \project\Auth::logout();
    }
    public function checkRegister(){
        if(isset($_POST['submit_reg'])){ 
            $email = $_POST['email'];
            $user = $this->model->read(['email' => $email]);
            
            if(trim($_POST['username']) == '' || (!ctype_alnum($_POST['username']))){
                 $errors[] = 'Некорректный логин!';
            }
            if(trim($_POST['email']) == ''){
                 $errors[] = 'Введите email!';
            }
            if(isset($user['email'])){
                $errors[] = 'Пользователь с таким email существует';
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
