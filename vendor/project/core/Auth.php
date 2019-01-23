<?php



namespace project;


class Auth {
    public static $user=[];
    
    
    public static function login($id){
       $_SESSION['logged'] = $id;
    }
    
    public static function logout(){
        unset($_SESSION['logged']);
        redirect('/');
    }
    
    public static function getUser(){
        $model = new \app\models\Model('users');
        $id = self::userID();
        self::$user = $model->readID($id);
        return self::$user;
    }

    public static function userID(){
        if(isset($_SESSION['logged'])){
        return $_SESSION['logged'];
        }return false;
   }
    
    public static function isAdmin(){
        if(self::getUser() && self::$user['role'] == 'admin'){ 
            return true;
        }return false;
        }
        
    
}
