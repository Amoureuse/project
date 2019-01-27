<?php
function memUrl(){
    $_SESSION['url'] = $_SERVER['REQUEST_URI'];    
}
//возврат url по имени маршрута;
function routeName($name){
    $routes = [
	['name'=>'home','url' => '', 'do'=>'Home/index'],
	['name'=>'login','url' => '/auth/login', 'do'=>'Auth/login'],
	['name'=>'register','url' => '/auth/register', 'do'=>'Auth/register']
	];
    foreach ($routes as $route) {
	if($route['name']==$name){
            return $newRoute = $route['url'];
	}
    }
}
// присвоение гет параметров к маршруту;
function route($name,$params=[]){
    $nameRoute = routeName($name) . '?';
	if($params == []){
            return rtrim($nameRoute,'?');//если параметров нет, обрезаем "?" и возвращаем url
	}
    foreach ($params as $key => $value) {
	$nameRoute .= $key . '=' . $value . '&';//добавляем указанные параметры к маршруту;
    }
    return rtrim($nameRoute, '&');//возвращаем url с параметрами, обрезая последний амперсант &;
}

function limitStr($str, $n = 20) {
    $array = explode(' ' , $str);
    $result = ''; // = пустая строка для добавления элементов масива пошагово.
    foreach ($array as $word) {
        $result .= ' ' . $word;
        if(strlen($result) >= $n){
            $string = $result . ' ...';
            break;
        }else{
            $string = $result;
        }
    }
    return $string;
}

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
} 

function redirect($str){
    header("Location:" . "$str" );
    exit;
}
    
function splashMessage($data = false, $class = 'info')
    {
        if($data) {
            $_SESSION['error'] = $data;
            $_SESSION['error_class'] = $class;
        } else {
            $message['data'] = $_SESSION['error'];
            $message['class'] = $_SESSION['error_class'];
            $_SESSION['error'] = '';
            $_SESSION['error_class'] = '';
            return $message;
        }
    }
function oldData($data = false){
    if($data){
        $_SESSION['form_data'] = $data;
    } else {
        $oldData = $_SESSION['form_data'];
        $_SESSION['form_data'] = '';
        return $oldData;
    }
    
}



