<?php
namespace app\models;
use project\Database;
Class Model{
    protected $connect;
    protected $table;
    


    public function __construct() {
        $db = Database::getInstance();
        $this->connect = $db->connection;;
    }
    public function delete($id) {
        $stmt = $this->connect->prepare("DELETE FROM $this->table WHERE id = ? ");
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        return $result;
    }
    
     
}
