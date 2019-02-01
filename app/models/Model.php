<?php

namespace app\models;

use project\Database;

Class Model
{
    protected $connect;
    protected $table;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->connect = $db->connection;  
    }
    
    public function delete($id)
    {
        $stmt = $this->connect->prepare("DELETE FROM $this->table WHERE id = ? ");
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        return $result;
    }
    
    public function readID($id)
    {
        $stmt = $this->connect->prepare("SELECT * FROM $this->table WHERE id = ? ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return $data;
    }
    
    public function findAll($table='')
    {
        $table?:$this->table;
        $stmt = $this->connect->prepare("SELECT * FROM $table");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    
    public function find($table, $sql)
    {
        $stmt = $this->connect->prepare("SELECT * FROM $table WHERE $sql");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
     
}


