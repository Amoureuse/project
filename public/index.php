<?php

header("Content-type: text/html; charset=utf-8");
require_once dirname(__DIR__) . '/config/init.php';
require_once ROOT . '/config/routes.php';
require_once ROOT . '/vendor/project/core/function.php';
require_once ROOT . '/config/config.php';
	if((isset($_POST['check'])) and (isset($_POST['on']))){
		setcookie('check','yes', time() +3600*24*365);
    	header("Location: index.php");
    	die; }
    if((isset($_POST['auth'])) && ($_POST['auth']) == "ADMIN"){
    	header("Location: http://myproject/admin/index.php");
    }
new project\App();

//$param['page'] = isset($_GET['page']) ? $_GET['page'] : 'home';
//$param['act'] = isset($_GET['act']) ? $_GET['act'] : 'index';
//$name = $param['page'];
//$act = $param['act'];
//
//$routes = [    
//    ['url' => 'home/index', 'do' => 'HomeController/index'],
//    ['url' => 'auth/login', 'do' => 'AuthController/index'],
//    ['url' => 'auth/register', 'do' => 'AuthController/register'],   
//];
//
//$route = array_filter($routes, function ($el) use($name, $act) {
//    return $el['url'] == $name.'/'.$act;
//});
//$route = (array_values($route))[0];
//list($contoller, $action) = explode('/', $route['do']);
//$c = new $contoller();
//$c->$action();
?>



