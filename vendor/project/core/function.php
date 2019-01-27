<?php
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
    
function splashMessage($error=[], $oldData=[]){
        $_SESSION['error'] = $error;
        $_SESSION['form_data'] = $oldData;
} 



