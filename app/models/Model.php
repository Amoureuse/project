<?php

namespace app\models;

use project\Database;

Class Model
{
    protected $connect;
    protected $pdoConnect;
    protected $table;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->connect = $db->connection; 
        $this->pdoConnect = $db->pdo;
    }

        public function delete($id)
    {
        $stmt = $this->pdoConnect->prepare("DELETE FROM $this->table WHERE id = ? ");
        $result = $stmt->execute($id);
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
    
    public function findAll($table='', $sql='')
    {
        $table?:$this->table;
        $stmt = $this->connect->prepare("SELECT * FROM $table $sql");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    
    public function find($table, $field)
    {
        $stmt = $this->connect->prepare("SELECT * FROM $table WHERE $field");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    
    public function findOne($table, $field, $value)
    {
        $stmt = $this->connect->prepare("SELECT * FROM $table WHERE $field");
        $stmt->bind_param('s', $value);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_row();
        return $data;
    }
    
    public function getColumnAsKey($field = false)
    {
        if ($field) {
            $sql = "SELECT code, title, symbol, value, base FROM currency ORDER BY base DESC";
        } else {
            $sql = "SELECT * FROM $this->table";
        }
        $stmt = $this->connect->prepare("$sql");
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $data = array();
        if ( !$rows ) {
            return $data;
        }
        foreach ( $rows as $row ) {
            if ( count( $row ) > 2 ) {
                $key   = array_shift( $row );
                $value = $row;
            } elseif ( count( $row ) > 1 ) {
                $key   = array_shift( $row );
                $value = array_shift( $row );
            } else {
                $key   = array_shift( $row );
                $value = $key;
            }
            $data[$key] = $value;
        }
        return $data;
    }
    
    public function countAll()
    {
        $stmt = $this->connect->prepare("SELECT COUNT(*) FROM $this->table");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_row();
        return $data[0];
    }
    
    public function createAlias($table, $field, $str, $id){
        $str = str2url($str);
        $res = $this->findOne($table, $field, $str);
        if($res){
            $str = "{$str}-{$id}";
        }
        return $str;
    }

     
}


