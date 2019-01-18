<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;


class ItemModel extends Model{
    protected $table = 'items';
    
   public function get_arr_items(){
            $res = $this->connect->query("SELECT * FROM goods");
            $items =$res->fetch_all(MYSQLI_ASSOC);
            $itemsDataObj = [];
    
        foreach ($items as $item) {
            $itemsDataObj[] = new \app\controllers\Item($item);
            }
            return $itemsDataObj;
    }
    
    
}
