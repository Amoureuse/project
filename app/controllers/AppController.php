<?php
namespace app\controllers;

use project\base\Controller;
use project\App;
use app\widgets\currency\Currency;

Class AppController extends Controller
{
    
    protected $model;
    
    public function __construct($route) {
        parent::__construct($route);
       App::$app->setProperty('currencies', Currency::getCurrencies());
       App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));
    }

    public function view($template, $data)
    {
        extract($data);
        include(ROOT . '/app/templates/' . $template . '.php');
    }
    
}
