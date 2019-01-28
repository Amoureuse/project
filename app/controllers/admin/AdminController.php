<?php 

namespace app\controllers\admin;

use app\controllers\AppController;
use app\models\ItemModel;
use project\Auth;

Class AdminController extends AppController
{

    public function __construct($route)
    {
        parent::__construct($route);
        if (!Auth::isAdmin()) {
            redirect('/');
        }
        $this->model = new ItemModel();
    }

    public function index()
    {
        $items = $this->model->get_arr_items();
        $data = [
            'items'=> $items,
            ];    
        $this->view('admin/index',$data);
    }
    
    public function add()
    {
        if (isset($_POST['add_product'])) {
            if ($_POST['name'] != '') {
                $this->addProduct();
            }    
        }
        $this->view('admin/add', $data=[]);
    }
 
    public function edit()
    {
        if (isset($_POST['edit_product'])) {
            if ($_POST['name'] != '') {
                $this->updateProduct();
            }   
        }
        $this->view('admin/edit', $data=[]);
    }

}   



