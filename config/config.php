<?php 
	function config($type) {
    $all_config = [
        'db' => [
            'host' => getenv('DB_HOST'), 'user' => getenv('DB_USER'), 'password' => getenv('DB_PASSWORD'), 'db' => getenv('DB_BASE')
        ],
        'pdo' => [
            'dsn' => 'mysql:host =' . getenv('DB_HOST') . ';dbname='. getenv('DB_BASE') . ';charset=utf8',
            'user'=>getenv('DB_USER'),
            'password'=>getenv('DB_PASSWORD'),
        ]
    ];
    $result = $all_config[$type];
    return $result;
}

