<?php

namespace app\models;


class CategoryModel extends Model
{
    protected $table = 'category';
    
    public function createCategory($data)
    {
        extract($data);
        $stmt = $this->connect->prepare("INSERT INTO $this->table (name, parent_id) VALUES (?, ?)");
        $stmt->bind_param('si', $name, $parent_id);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result; 
    }
    
    public function updateCategoryAlias($id, $data)
    {
        extract($data);
        $stmt = $this->connect->prepare("UPDATE $this->table SET alias =? WHERE id=$id");
        $stmt->bind_param('s', $alias);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result; 
    }
    
    public function updateCategory($id, $data)
    {
        extract($data);
        $stmt = $this->connect->prepare("UPDATE $this->table SET name =?, parent_id=? WHERE id=$id");
        $stmt->bind_param('si', $name, $parent_id);
        $stmt->execute();
        $result = $stmt->insert_id;
        return $result; 
    }
}