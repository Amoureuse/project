<?php

namespace app\models;

use app\controllers\Item;

class ItemModel extends Model
{
    protected $table = 'goods';
    
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
    /**
     * Filtered selection from database.
     * 
     * @param array $filter
     * @param string $fields
     * @param string $order
     * @param int $limit
     * @param int $offset
     * @return array of objects Item
     */
    public function listItems($filter = [], $fields = null, $order = null, $limit = null, $offset = null)
    {
        if(!$fields) {
            $fields = ['*'];
        }   
        $sql = " FROM $this->table ";
        
        if (!empty($filter)) {
            $sql = $sql. ' WHERE ';
            if (key_exists('ids', $filter)) {
                $ids = explode(',', $filter['ids']);
                $in = join(',', array_fill(0, count($ids), '?'));
                $sql .= " category_id IN ({$filter['ids']}) AND";
            }
            if (key_exists('brand', $filter)) {
                $sql .= ' brand_id = ? AND';
            }
            if (key_exists('priceMin', $filter) || key_exists('priceMax', $filter)) {
                $sql .= " price BETWEEN ? AND ? AND";
            }
            if (key_exists('alias', $filter)) {
                $sql .= ' alias = ? AND';
            }
            if (key_exists('search', $filter)) {
                $sql .= " name LIKE '%" . $filter['search'] . "%' AND";
            }
            $sql = rtrim($sql, 'AND');
        }
        
        if ($fields) {
            switch ($fields)
            {
                case 'count';
                $sql = 'SELECT COUNT(*) AS count'.$sql;
                break;
            
                case 'min';
                $sql = 'SELECT MIN(price) AS min'.$sql;
                break;
                
                case 'max';
                $sql = 'SELECT MAX(price) AS max'.$sql;
                break;
            
                default :
                $sql = 'SELECT ' .join(",", $fields) .$sql;
                break;
            }
        }
        
        if ($order['sort']) {
            $sql .= " ORDER BY {$order['sort']}";
        }
        if ($limit) {
            $sql .= " LIMIT $limit ";
            if ($offset) {
                $sql .= " OFFSET $offset ";
            }
        }
        $stmt = $this->pdoConnect->prepare($sql);
        debug($sql);
        $params = [];
        if (!empty($filter)) {
              
            foreach($filter as $field => $value) {
                if ($field != 'ids' && $field != 'search') {
                    $params[] = $value;
                }
            }
        }
        $stmt->execute($params);
        $data = $stmt->fetchAll();
        
        if ($fields == 'count' || $fields == 'min' || $fields == 'max') {
            return $data[0];
        }
        $items = [];
        foreach ($data as $item) {
            $items[] = new Item($item);
        }
        return $items;
    }
    
}
