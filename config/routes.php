<?php
use project\Router;

Router::add('',['controller'=>'HomeController','action' =>'index']);
Router::add('auth/login',['controller'=>'AuthController','action' =>'login']);
Router::add('auth/logout',['controller'=>'AuthController','action' =>'logout']);
Router::add('register',['controller'=>'AuthController','action' =>'register']);
Router::add('admin',['controller'=>'AdminController','action' =>'index',
    'prefix'=>'admin']);
Router::add('admin/index',['controller'=>'AdminController','action' =>'index',
    'prefix'=>'admin']);
Router::add('admin/add',['controller'=>'AdminController','action' =>'add',
    'prefix'=>'admin']);
Router::add('admin/edit',['controller'=>'AdminController','action' =>'edit',
    'prefix'=>'admin']);


