<?php
namespace app\controllers;

use project\base\Controller;

Class AppController extends Controller
{
    
    protected $model;

    public function view($template, $data)
    {
        extract($data);
        include(ROOT . '/app/templates/' . $template . '.php');
    }
    
}
