<?php

namespace app\models;

use app\controllers\Item;

class ItemModel extends Model
{
    protected $table = 'items';
    
    public function get_arr_items()
    {
        $res = $this->connect->query("SELECT * FROM goods");
        $items =$res->fetch_all(MYSQLI_ASSOC);
        $itemsDataObj = [];
        foreach ($items as $item) {
            $itemsDataObj[] = new Item($item);
        }
        return $itemsDataObj;
    }
    
    public function addProduct($name, $description, $price, $stock, $disc, $image=null)
    {
        $stmt = $this->connect->prepare("INSERT INTO goods (name, description, price, stock, disc, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssdiis', $name, $description, $price, $stock, $disc, $image);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result; 
    }
    
    public function updateProduct($id, $name, $description, $price, $stock, $disc, $image=null)
    {
        $stmt = $this->connect->prepare("UPDATE goods SET name = ?, description = ?, price = ?, stock = ?, disc = ?, image = ? WHERE id = $id");
        $stmt->bind_param('ssdiis', $name, $description, $price, $stock, $disc, $image);
        $stmt->execute();
        return true; 
    }
    
    
}
