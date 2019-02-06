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
    
    public function findAll($table='', $sql='')
    {
        $table?:$this->table;
        $stmt = $this->connect->prepare("SELECT * FROM $table $sql");
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
    
    public function findOne($table, $sql, $value)
    {
        $stmt = $this->connect->prepare("SELECT * FROM $table WHERE $sql");
        $stmt->bind_param('s', $value);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_row();
        return $data;
    }
    
    public function getSome($sql)
    {
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
    
    public function count($table, $sql, $id)
    {
        $stmt = $this->connect->prepare("SELECT COUNT(*) FROM $table WHERE $sql ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_row();
        return $data[0];
    }
    
    public function countAll()
    {
        $stmt = $this->connect->prepare("SELECT COUNT(*) FROM $this->table");
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_row();
        return $data[0];
    }
    
    public function createAlias($table, $sql, $str, $id){
        $str = $this->str2url($str);
        $res = $this->findOne($table, $sql, $str);
        if($res){
            $str = "{$str}-{$id}";
        }
        return $str;
    }
// можно перенести в functions - ?
    public  function str2url($str) {
        // переводим в транслит
        $str = $this->rus2translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "-"
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }

    public function rus2translit($string) {

        $converter = array(

            'а' => 'a',   'б' => 'b',   'в' => 'v',

            'г' => 'g',   'д' => 'd',   'е' => 'e',

            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',

            'и' => 'i',   'й' => 'y',   'к' => 'k',

            'л' => 'l',   'м' => 'm',   'н' => 'n',

            'о' => 'o',   'п' => 'p',   'р' => 'r',

            'с' => 's',   'т' => 't',   'у' => 'u',

            'ф' => 'f',   'х' => 'h',   'ц' => 'c',

            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',

            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',

            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',



            'А' => 'A',   'Б' => 'B',   'В' => 'V',

            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',

            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',

            'И' => 'I',   'Й' => 'Y',   'К' => 'K',

            'Л' => 'L',   'М' => 'M',   'Н' => 'N',

            'О' => 'O',   'П' => 'P',   'Р' => 'R',

            'С' => 'S',   'Т' => 'T',   'У' => 'U',

            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',

            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',

            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',

            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',

        );

        return strtr($string, $converter);

    }
     
}


