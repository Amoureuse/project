<?php

namespace app\models;

use project\Auth;

class CartModel extends Model
{
    protected $table = 'goods';
    
    public function addToCart($data)
    {
        $this->createCart($data);
    }
    
    public function createCart($data)
    {
        extract($data);
        $stmt = $this->connect->prepare("INSERT INTO cart (user_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('iiii', $user_id, $product_id, $quantity, $price);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result; 
    }
    
    public function join($id, $sql)
    {
        $stmt = $this->connect->prepare("$sql");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    
}
