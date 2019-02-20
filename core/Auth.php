<?php

namespace project;

use app\models\UserModel;

class Auth
{
    public static $user = [];
    
    public static function login($id)
    {
       $_SESSION['logged'] = $id;
    }
    
    public static function logout()
    {
        unset($_SESSION['logged']);
    }
    
    public static function getUser()
    {
        $model = new UserModel();
        $id = self::userID();
        if (!$id) {
            return false;
        }
        if (!self::$user) {
            self::$user = $model->readID($id);   
        }
        return self::$user;
    }

    public static function userID()
    {
        if (isset($_SESSION['logged'])) {
            return $_SESSION['logged'];
        }
        return false;
    }
    
    public static function isAdmin()
    {
        if (self::getUser()) {
            if (self::$user['role'] == 'admin') { 
                return true;  
            } 
        }
        return false;
    }
 
}
