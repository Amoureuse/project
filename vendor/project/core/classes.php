<?php 
$goods = fopen(__DIR__ .'/../assets/file/goods.csv', 'r') or die('Ошибка подключения к файлу..');
  function readCSV($goods){
        while (!feof($goods) ) {
            $result[] = fgetcsv($goods, 0, ";");
        }
        return $result;
        fclose($goods);
        
    }
 $goods = readCSV($goods);
 array_pop($goods);
?>
