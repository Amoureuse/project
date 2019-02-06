<?php

namespace app\controllers;

class CurrencyController extends AppController{
    
    public function change()
    {
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
        if ($currency) {
            $currencies = \project\App::$app->getProperty('currencies');
            foreach ($currencies as $k=>$v) {
                if ($k === $_GET['curr']){
                    setcookie('currency', $currency, time() +3600*24, '/');
                }
            }  
        }
        redirect();
    }
}
