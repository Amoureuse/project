<?php


namespace app\controllers;


trait TValidation
{
    
    public function validation($user)
    {
        if (isset($_POST['submit'])) {
            if (($_POST['pass_user']) == '') {
                $errors[] = 'Вы не ввели свой текущий пароль!';
            }
            if (!password_verify($_POST['pass_user'], $user['pass'])) {
                $errors[] = 'Введённый вами пароль не совпадает с текущим паролем!';
            }
            if ((trim($_POST['username'])) == '') {
                $errors[] = 'Введите имя пользователя!';
            }
            if ((strlen($_POST['username'])) < 4) {
                $errors[] = 'Имя пользователя должно содержать не менее 4-х символов!';
            }
            if (($_POST['pass']) == '') {
                $errors[] = 'Введите пароль';;
            }
            if ((strlen($_POST['pass'])) < 6) {
                $errors[] = 'Пароль должен содержать не менее 6-ти символов!';
            }
            if (!empty($_POST['pass'])) {
                if ($_POST['pass_2'] != $_POST['pass']) {
                $errors[] = 'Пароли не совпадают!';
                }
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
