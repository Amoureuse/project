<?php

namespace app\controllers;

use app\models\CategoryModel;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'category';
    protected $attrs = [];
    protected $prepend = '';
    
    public function __construct($options= [])
    {
        $this->tpl = ROOT . 'templates/menu/menu.php';
        $this->getOptions($options);
        $this->run();
    }
    
    protected function getOptions($options)
    {
        foreach ($options as $k=>$v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }
    
    protected function run()
    {
        $model = new CategoryModel();
        if (!$this->menuHtml) {
            $this->data = $model->getColumnAsKey();
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
        }
        
        $this->output();
    }
    
    protected function output()
    {
        $attrs = '';
        if(!empty($this->attrs)){
            foreach($this->attrs as $k => $v){
                $attrs .= " $k = '$v' ";
            }
        }
        echo "<{$this->container} class ='{$this->class}', $attrs>";
        echo $this->menuHtml;
        echo $this->prepend;
        echo "</{$this->container}>";
    }
    
    protected function getTree()
    {
        $tree = [];
        $data = $this->data;
        foreach ($data as $id=>&$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }
    
    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTempl($category, $tab, $id);
        }
        return $str;
    }
    
    protected function catToTempl($category, $tab, $id)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();        
    }
}
