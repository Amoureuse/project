<?php

namespace app\models;

use project\Auth;

class CartModel extends Model
{
    protected $table = 'cart';
    
    public function createCart($data)
    {
        $stmt = $this->pdoConnect->prepare("INSERT INTO $this->table (user_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute($data);
        $id = $this->pdoConnect->lastInsertId();
        return $id; 
    }
    
    public function readPdo($id)
    {
        $stmt = $this->pdoConnect->prepare("SELECT c.*, g.name FROM $this->table AS c JOIN goods AS g ON c.product_id = g.id WHERE c.user_id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();
        return $result;    
    }
    
    public function deleteCart($user_id)
    {
        $stmt = $this->pdoConnect->prepare("DELETE FROM $this->table WHERE user_id = ? ");
        $result = $stmt->execute([$user_id]);
        return $result;
    }
    
}
