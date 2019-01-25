<?php 
namespace app\controllers\admin;

Class AdminController extends \app\controllers\AppController{
    
    public function __construct($route) {
        parent::__construct($route);
        if(!\project\Auth::isAdmin()){
            redirect('/');
        }
    }

    public function index(){
        $model = new \app\models\ItemModel();
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
        $this->view('admin/add', $data=[]);
    }
 
    public function edit(){
        if(isset($_POST['edit_product'])){
            if($_POST['name'] != ''){
            $this->updateProduct();
            }    
        }
        $this->view('admin/edit', $data=[]);
    }
    public function addProduct($name,$description,$price,$stock,$disc,$image=null){
        $stmt = $this->connect->prepare("INSERT INTO goods (name,description, price, stock,disc,image) VALUES (? ,? ,?,?,?,?)");
        $stmt->bind_param('ssdiis',$name,$description,$price,$stock,$disc,$image);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result; 
    }
    
    public function updateProduct($id,$name,$description,$price,$stock,$disc,$image=null){
        $stmt = $this->connect->prepare("UPDATE goods SET name = ?,description = ?, price = ?, stock = ?,disc = ?,image = ? WHERE id = $id");
        $stmt->bind_param('ssdiis',$name,$description,$price,$stock,$disc,$image);
        $stmt->execute();
        return true; 
    }
}   

     ?>

