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
    
    public function count($table, $field, $id)
    {
        $stmt = $this->connect->prepare("SELECT COUNT(*) FROM $table WHERE $field");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_row();
        return $data[0];
    }
    
    public function readCat($alias)
    {
        $stmt = $this->pdoConnect->prepare("SELECT * FROM $this->table WHERE alias = ?");
        $stmt->execute([$alias]);
        $result = $stmt->fetch();
        return $result; 
    }
    
    
}