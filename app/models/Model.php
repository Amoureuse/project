<?php
namespace app\models;
use project\Database;
Class Model{
     public function get_arr_items(){
            $config = config('db');
            $product = Database::getInstance($config);
            $product_connect = $product->connection;

            $res = $product_connect->query("SELECT * FROM goods");
            $items =$res->fetch_all(MYSQLI_ASSOC);
            $itemsDataObj = [];
    
        foreach ($items as $item) {
            $itemsDataObj[] = new Item($item);
            }
            return $itemsDataObj;
    }
     
}
Class Item {
    public $id;
    public $name;
    public $price;
    public $count;
    public $disc;
    public $description;
    public $image;

       public function __construct($item){
            $this->id = $item['id'];
            $this->name = $item['name'];            
            $this->count = $item['stock'];
            $this->disc = $item['disc'];
            $this->description = $item['description'];
            $this->price = (float)$item['price'];
            $this->image = $item['image'];
            $this->price = $this->getPrice($item['price']);
            $this->image = $this->noImage($item['image']);

        }

        protected function getPrice(){
        $price = $this->price - ($this->price * $this->disc / 100);
            if($this->count < 2){
                $price = $this->price;
            }if($this->count == 0){
                $price = "нет на складе";
            }
            return $price;        
        }
        protected function noImage(){
        	$image = $this->image;
        	if(!$this->image){
        		$image = "https://d.radikal.ru/d25/1812/7f/085c50292c42.png";
        	}return $image;
        }
}

