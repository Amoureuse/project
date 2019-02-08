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
//
//$search = [
//    'brand_id' => 2,
//    'category_id' => 3
//];
//
//function select($search)
//{
//    $config = config('pdo');
//    $db = \project\Database::getInstance($config);
//    $connect = $db->pdo;
//    $criteria = [];
//    $params = [];
//    foreach($search as $field => $value) {
//        $criteria[] = "$field = :$field";
//        $params[$field] = $value;
//    }
//    $sql = " WHERE " . implode(' AND ', $criteria) ?: '';
//    $sql = "SELECT * FROM goods" . $sql;
//    var_dump($sql);
//    $stmt = $connect->prepare($sql);
//    $stmt->execute($params);
//    $data = $stmt->fetchAll();
//    return $data;
//}
//debug(select($search));
//?>



