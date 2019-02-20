<?php

namespace app\controllers\admin;

use app\controllers\AppController;
use app\models\CategoryModel;
use project\App;

class CategoryController extends AppController
{
    public $layout = 'admin';


    public function index()
    {
        $this->setMeta("Список категорий");
    }
    
    public function delete()
    {
        $model = new CategoryModel();
        $id = $this->getRequestID();
        $child = $model->count('category', 'parent_id = ?', $id);
        $errors = '';
        if ($child) {
            $errors .= "Невозможно удалить, есть дочерние категории";
        }
        $product = $model->count('goods', 'category_id = ?', $id);
        if ($product) {
            $errors .= "Невозможно удалить, в категории находятся товары";
        }
        if ($errors) {
            splashMessage($errors, 'alert-danger');
            redirect();
        }
        $model->delete($id);
        redirect();
        
    }
    
    public function edit()
    {
        $model = new CategoryModel();
        if (!empty($_POST)) {
            $data = $_POST;
            if (!empty($_POST['id'])) {
                $id = $this->getRequestID(false);
                $model->updateCategory($id, $data);
                $alias = $model->createAlias('category', 'alias = ?', $data['name'], $id);
                $model->updateCategoryAlias($id, ['alias' => $alias]);
                redirect();
            } else {
                if ($id = $model->createCategory($data)) {
                    $alias = $model->createAlias('category', 'alias = ?', $data['name'], $id);
                    $model->updateCategoryAlias($id, ['alias' => $alias]);
                }
            }
            redirect();
        }
        if (isset($_GET['id'])) {
            $id = $this->getRequestID();
            $category = $model->readID($id);
            App::$app->setProperty('parent_id', $category['parent_id']);
            $this->set(['category' => $category]);
        }
        $this->setMeta('Редактирование категории');
    }
    
    public function getRequestID($get = true, $id = 'id')
    {
        if ($get) {
            $data = $_GET;
        } else {
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;
        if (!$id) {
            throw new \Exception('Страница не найдена', 404);
        }
        return $id;
    }
}
