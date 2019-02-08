<?php

namespace app\models;

use app\controllers\Item;

class ItemModel extends Model
{
    protected $table = 'goods';
    
    public function get_arr_items($start, $perpage)
    {
        $res = $this->connect->query("SELECT * FROM $this->table LIMIT $start, $perpage");
        $items =$res->fetch_all(MYSQLI_ASSOC);
        $itemsDataObj = [];
        foreach ($items as $item) {
            $itemsDataObj[] = new Item($item);
        }
        return $itemsDataObj;
    }
    
    public function addProduct($data)
    {
        extract($data);
        $stmt = $this->connect->prepare("INSERT INTO goods (name, description, price, stock, disc, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssdiis', $name, $description, $price, $stock, $disc, $image);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result; 
    }
    
    public function updateProduct($id, $data)
    {
        extract($data);
        $stmt = $this->connect->prepare("UPDATE goods SET name = ?, description = ?, price = ?, stock = ?, disc = ?, image = ? WHERE id = $id");
        $stmt->bind_param('ssdiis', $name, $description, $price, $stock, $disc, $image);
        $stmt->execute();
        return true; 
    }
    
    public function listItems($filter = [], $fields = null, $order = null, $limit = false, $offset = false)
    {
        if(!$fields) {
            $fields = ['*'];
        }
        if (!$order) {
            $order = '';
        }
        
        $sql = " FROM $this->table ";
        
        if (!empty($filter)) {
            $sql = $sql. ' WHERE ';
            if (key_exists('cat', $filter)) {
                $sql .= ' category_id = ? AND';
            }
            if (key_exists('priceM', $filter)) {
                $sql .= ' price < ? AND';
            }
//            if (key_exists('ids', $filter)) {
//                $sql .= ' id IN ?';
//                $filter['ids'] = "(". join(",", $filter['ids']) .")";
//            }
        }
        if (!empty($order)) {
            $sql .= ' ORDER BY ';
            if (in_array('cat', $order)) {
                $sql .= ' category_id ';
            }
            if (in_array('price', $order)) {
                $sql .= ' price ';
                if (in_array('d', $order)) {
                    $sql .= 'DESC';
                }
            } 
        }
        if ($limit) {
            $sql .= " LIMIT $limit ";
            if ($offset) {
                $sql .= " OFFSET $offset ";
            }
        }
        
        if ($fields) {
            if ($fields == 'count') {
                $sql = 'SELECT COUNT(*) '.$sql;
            } else {
                $sql = 'SELECT ' .join(",", $fields) .$sql;
            }
        }
        $stmt = $connect->prepare($sql);
        $array_of_values = [];
        if (!empty($filter)) {
            foreach ($filter as $key => $fl) {
                $array_of_values[] = $fl;
            }
        }
        $stmt->execute($array_of_values);
        $data = $stmt->fetchAll();
        return $data;
    }
    
}
