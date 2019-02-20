<?php

namespace app\controllers;

use app\models\ItemModel;
use app\models\ImageModel;

class ProductController extends AppController
{
    public function index()
    {
        $model = new ItemModel();
        $alias = $this->route['alias'];
        $data = $model->listItems($filter = ['alias' => $alias]);
        $product = $data[0];
        if (!$product) {
            throw new \Exception('Страница не найдена', 404);
        }
        $imageModel = new ImageModel();
        $galery = $imageModel->readImage(['product_id' => $product->id]);
        $this->setMeta($product->name);
        $this->set(['product' => $product, 'images' => $galery]);
    }
}
