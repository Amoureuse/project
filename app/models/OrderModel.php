<?php

namespace app\models;

use project\Auth;

class OrderModel extends Model
{
    protected $table = 'orders';
    
    public function createOrder($data, $products)
    {
        $stmt = $this->pdoConnect->prepare("INSERT INTO $this->table (user_id, phone, adress, recipient) VALUES (?, ?, ?, ?)");
        $stmt->execute($data);
        $order_id = $this->pdoConnect->lastInsertId();
        $this->createOrderProduct($order_id, $products);
        return $order_id;
    }
    
    public function createOrderProduct($order_id, $products)
    {
        $data = '';
        $stmt = $this->pdoConnect->prepare("INSERT INTO order_product (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($products as $key => $product) {
            $data = [$order_id, $product['product_id'], $product['quantity'], $product['price']];
            $stmt->execute($data);
        }
        
    }
    
    
}
