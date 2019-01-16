<?php 
namespace app\controllers\admin;

Class AdminController extends \app\controllers\Controller{

    public function index(){
        $model = new \app\models\Model();
        $items = $model->get_arr_items();
        $data = [
            'items'=> $items,
            ];    
        $this->view('admin/index',$data);
    }
    
    public function add(){
        if(isset($_POST['add_product'])){
            if($_POST['name'] != ''){
            $this->addProduct();
            }    
        }
        $this->view('admin/add', $this->data);
    }
 
    public function edit(){
        if(isset($_POST['edit_product'])){
            if($_POST['name'] != ''){
            $this->updateProduct();
            }    
        }
        $this->view('admin/edit', $this->data);
    }
    public function addProduct(){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $disc = $_POST['disc'];
        $image = $_POST['image'];
        $stmt = $this->connect->prepare("INSERT INTO goods (name,description, price, stock,disc,image) VALUES (? ,? ,?,?,?,?)");
        $stmt->bind_param('ssdiis',$name,$description,$price,$stock,$disc,$image);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result; 
    }
    
    public function updateProduct(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $disc = $_POST['disc'];
        $image = $_POST['image'];
        $stmt = $this->connect->prepare("UPDATE goods SET name = ?,description = ?, price = ?, stock = ?,disc = ?,image = ? WHERE id = $id");
        $stmt->bind_param('ssdiis',$name,$description,$price,$stock,$disc,$image);
        $stmt->execute();
        return true; 
    }
}   

     ?>

