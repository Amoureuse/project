<?php
use project\Router;

Router::add('product/(?P<alias>[a-z0-9-]+)/?',  ['controller'=>'ProductController','action' =>'index']);
Router::add('category/(?P<alias>[a-z0-9-]+)/?',  ['controller'=>'CategoryController','action' =>'index']);

Router::add('',                    ['controller'=>'HomeController','action' =>'main']);
Router::add('cart',                ['controller'=>'CartController','action' =>'index']);
Router::add('cart/add',            ['controller'=>'CartController','action' =>'add']);
Router::add('cart/order',          ['controller'=>'CartController','action' =>'order']);
Router::add('cart/delete',         ['controller'=>'CartController','action' =>'delete']);
Router::add('show',                ['controller'=>'HomeController','action' =>'index']);
Router::add('home/search',         ['controller'=>'HomeController','action' =>'search']);
Router::add('currency/change',     ['controller'=>'CurrencyController','action' =>'change']);
Router::add('login',               ['controller'=>'AuthController','action' =>'login']);
Router::add('logout',              ['controller'=>'AuthController','action' =>'logout']);
Router::add('register',            ['controller'=>'AuthController','action' =>'register']);
Router::add('user',                ['controller'=>'UserController','action' =>'index']);
Router::add('user/edit',           ['controller'=>'UserController','action' =>'edit']);
Router::add('admin',               ['controller'=>'AdminController','action' =>'index',
    'prefix'=>'admin']);
Router::add('admin/category',      ['controller'=>'CategoryController','action' =>'index',
    'prefix'=>'admin']);
Router::add('admin/category/edit', ['controller'=>'CategoryController','action' =>'edit',
    'prefix'=>'admin']);
Router::add('admin/category/delete',['controller'=>'CategoryController','action' =>'delete',
    'prefix'=>'admin']);
Router::add('admin/delete',        ['controller'=>'AdminController','action' =>'delete',
    'prefix'=>'admin']);
Router::add('admin/index',         ['controller'=>'AdminController','action' =>'index',
    'prefix'=>'admin']);
Router::add('admin/add',           ['controller'=>'AdminController','action' =>'add',
    'prefix'=>'admin']);
Router::add('admin/edit',          ['controller'=>'AdminController','action' =>'edit',
    'prefix'=>'admin']);



