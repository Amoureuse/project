<?php

namespace app\controllers;

class Item
{
    public $id;
    public $name;
    public $price;
    public $count;
    public $disc;
    public $description;
    public $image;
    public $alias;

    public function __construct($item)
    {
        $this->id = $item['id'];
        $this->name = $item['name'];  
        $this->alias = $item['alias'];
        $this->count = $item['stock'];
        $this->disc = $item['disc'];
        $this->description = $item['description'];
        $this->price = (float)$item['price'];
        $this->image = $item['image'];
        $this->price = $this->getPrice($item['price']);
        $this->image = $this->noImage($item['image']);

    }

    protected function getPrice()
    {
        $price = round($this->price - ($this->price * $this->disc / 100));
        if ($this->count < 2) {
            $price = $this->price;
        }
        if ($this->count == 0) {
            $price = null;
        }
        return $price;        
    }
    
    protected function noImage()
    {
        $image = $this->image;
        if (!$this->image) {
            $image = "no-image.jpg";
        }
        return $image;
    }
}
