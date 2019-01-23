<?php


namespace project;

class Router {
   public static $routes = [];
   public static $route = [];
   
   public static function add($regexp, $route = []){
       $regexp = '#^'. $regexp . '$#';
       self::$routes[$regexp] = $route;
   }
   public static function getRoutes(){
       return self::$routes;
   }
    public static function getRoute(){
       return self::$route;
   }
    public static function matchRoute($url){ 
        foreach (self::$routes as $pattern => $route){
            if(preg_match($pattern, $url, $matches)){
                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                }else{
                    $route['prefix'] .= '\\';
                }
               self::$route = $route;
               return true;
            }
        }return false;
   }
   public static function dispatch($url){
       $url = self::removeQueryString($url);
       if(self::matchRoute($url)){
           $controller = 'app\controllers\\' . self::$route['prefix'] . 
           self::$route['controller'];
           if(class_exists($controller)){
               $cObj = new $controller(self::$route);
               $action = self::$route['action'];
               $cObj->$action();
               $cObj->getView();
           }else{
               throw new \Exception("Контроллер $controller не найден", 404);
           }   
       }else{
           throw new \Exception("Страница не найдена", 404); 
       }
   }
   
   protected static function removeQueryString($url){ 
       if($url){
           $params = explode('&', $url, 2);
           if(false === strpos($params[0], '=')){
               return rtrim($params[0],'/');
           }else{
               return '';
           }
       }
   }
}
