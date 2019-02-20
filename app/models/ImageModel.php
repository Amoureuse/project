<?php

namespace app\models;

class ImageModel extends Model
{
   protected $table = 'images';
   
    public function readImage($fields= [])
    {
        $sql = "SELECT image FROM $this->table";
        if (!empty($fields)) {
            $criteria = [];
            $params = [];
            foreach($fields as $field => $value) {
                $criteria[] = "$field = :$field";
                $params[$field] = $value;
            }
            $sql = $sql . " WHERE " . implode(' AND ', $criteria) ?: '';
        }
        $stmt = $this->pdoConnect->prepare($sql);
        $stmt->execute($params);
        $data = $stmt->fetchAll();
        return $data;
    }
   
}
