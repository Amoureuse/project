<?php 
	function config($type) {
    $all_config = [
        'db' => [
            'host' => 'localhost', 'user' => 'root', 'password' => '', 'db' => 'shop'
        ],
        'pdo' => [
            'dsn' => 'mysql:host = localhost;dbname=gb;charset=utf8',
            'user'=>'root',
            'password'=>'',
        ]
    ];
    $result = $all_config[$type];
    return $result;
}

