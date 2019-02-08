<?php 

namespace app\controllers\admin;

use app\controllers\AppController;
use app\models\ItemModel;
use project\Auth;
use project\Pagination;

Class AdminController extends AppController
{
    public $layout = 'admin';
    
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
        $perpage = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $total = $this->model->countAll();
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();
        $pagination = $pagination->getHtml();
        $items = $this->model->get_arr_items($start,$perpage);
        $data = [
            'items'=> $items,
            'pag'=>$pagination
            ];    
        $this->setMeta('Панель управления');
        $this->set($data);      
    }
    
    public function add()
    {
        if (isset($_POST['add_product'])) {
            if ($_POST['name'] != '') {
                $data = [
                    'name'=>$_POST['name'],
                    'description'=>'',
                    'price'=>'',
                    'stock'=>'',
                    'disc'=>'',
                    'image'=>'',
                ];
                $this->model->addProduct($data);
            }    
        }
        $this->setMeta('Редактирование товара');
    }
 
    public function edit()
    {
        if (isset($_POST['edit_product'])) {
            if ($_POST['name'] != '') {
                $data = [
                    'name'=>$_POST['name'],
                    'description'=>'',
                    'price'=>'',
                    'stock'=>'',
                    'disc'=>'',
                    'image'=>'',
                ];
                $this->model->updateProduct($data);
            }   
        }
    }
    
    public function delete()
    {
        $id = (int)$_GET['id'];
        $this->model->delete([$id]);
        redirect();
    }

}   



