<?php

namespace project;

use app\models\ItemModel;

class Csv
{
    public static function writeCsv($file, $row_delimiter = PHP_EOL)
    {
        $model = new ItemModel();
        $items = $model->listItems();
        $fp = fopen($file, 'w');
        foreach ($items as $item) {
            if (is_object($item)) {
                $item = (array) $item;
            }   
        }
        $firstRow = implode(';', array_keys($item));
        fwrite($fp, $firstRow . $row_delimiter);
        foreach ($items as $item) {
            if ( is_object($item)){
                $item = (array) $item;
            }
            $row = implode(';', array_values($item));
            fwrite($fp, $row . $row_delimiter);
        }
        fclose($fp);
    }
    
    public static function readCsv($file)
    {                     
        $fp = file($file, FILE_IGNORE_NEW_LINES);
        $key = explode(';', $fp[0]);                    
        $valueStr = array_slice($fp, 1, count($fp));
        foreach ($valueStr as $val) {       
            $value = explode(';', $val);                
            $items[] = array_combine($key, $value);       
        }                                                           
        return $items;
    }

}

