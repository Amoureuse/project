<?php

namespace app\controllers;

use app\models\CartModel;
use \project\Auth;
use app\models\ItemModel;

class CartController extends AppController
{
    public function __construct($route) {
        parent::__construct($route);
        $this->model = new CartModel();
        $this->productModel = new ItemModel();
    }

    public function index()
    {
        $res = $this->model->readPdo([Auth::userID()]);
        $this->set(['res' =>$res]);
        $this->setMeta('Корзина');
    }

    public function add()
    {
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;
        if ($id) {
            $product = $this->productModel->readID($id);
            if (!$product) {
                return false;
            }
        }
        $data = [Auth::userID(), $product['id'], $qty, $product['price']];
        $this->model->createCart($data);
        if ($this->isAjax()) {
            $data = [
            'product' => $product,
            'quantity' => $qty,
        ];
            $this->loadView('cart_modal', $data);
        }
        
    }
    
    public function delete()
    {
        $id = (int)$_GET['item'];
        $this->model->delete([$id]);
        redirect();
    }
}
