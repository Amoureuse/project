<?php

header("Content-type: text/html; charset=utf-8");

require_once dirname(__DIR__) . '/config/init.php';
require_once ROOT . '/config/config.php';
require_once ROOT . '/config/routes.php';
require_once ROOT . '/vendor/project/core/function.php';

$config = config('db');
$db = \project\Database::getInstance($config);
$connect = $db->connection;
new project\App();

?>



