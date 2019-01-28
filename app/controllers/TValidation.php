<?php


namespace app\controllers;


trait TValidation
{
    
    public function validation($user)
    {
        if (isset($_POST['submit'])) {
            if (trim($_POST['username']) == '') {
                $errors[] = 'Введите имя пользователя!';
            }
            if (strlen($_POST['username'] < 4)) {
                $errors[] = 'Имя пользователя должно содержать не менее 4-х символов!';
            }
            if (isset($user['username'])) {
                $errors[] = 'Пользователь с таким именем существует';
            }
            if (trim($_POST['email']) == '') {
                $errors[] = 'Введите email!';
            }
            if (isset($user['email'])) {
                $errors[] = 'Пользователь с таким email существует';
            }
            if ($_POST['pass'] == '') {
                $errors[] = 'Введите пароль!';
            }
            if (strlen($_POST['pass'] < 6)) {
                $errors[] = 'Пароль должен содержать не менее 6-ти символов!';
            }
            if ($_POST['pass_2'] != $_POST['pass']) {
                $errors[] = 'Пароли не совпадают!';
            }
        }
        
        if (empty($errors)) {
                return true;
        } else {
                return $errors;
        }
    }
    
    public function filesValid(){
        if (isset($_FILES)) {
            $imageinfo =  getimagesize($_FILES['path']['tmp_name']);
                if ($imageinfo == false) {
                    $error = 'Вы можете загружать только jpg, png, gif файлы';
                }
            if ($_FILES['path']['error'] == 1) {
                $error = 'Файл превышает допустимый размер';
            }
            if ($_FILES['path']['error'] == 2) {
                $error = '';
            }
        }
        if (empty($error)) {
            return true;
        } else {
            return $error;
        }
    }
    
}
