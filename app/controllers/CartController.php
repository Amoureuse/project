<?php

namespace app\controllers;

use app\models\CartModel;
use \project\Auth;

class CartController extends AppController
{
    public function index()
    {
        $model = new CartModel();
        $res = $model->join(Auth::userID(), "SELECT c.*, g.name FROM cart AS c JOIN goods AS g ON c.product_id = g.id WHERE c.user_id = ?");
        $this->set(['res' =>$res]);
    }

    public function add()
    {
        $model = new CartModel();
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        if ($id) {
            $product = $model->readID($id);
            if (!$product) {
                return false;
            }
        }
        $data = [
            'user_id' => Auth::userID(),
            'product_id' => $product['id'],
            'quantity' => $qty,
            'price'=> $product['price']
        ];
        $model->addToCart($data);
        if ($this->isAjax()) {
            $data = [
            'product' => $product,
            'quantity' => $qty,
        ];
            $this->loadView('cart_modal', $data);
        }
        
    }
}
