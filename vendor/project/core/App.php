<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace project;


class App {
    public function __construct() {
        $query = trim($_SERVER['QUERY_STRING'],'/');
        session_start();
        new ErrorHandler();
        debug(Router::dispatch($query));
        
    }
}
