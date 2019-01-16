<?php 
namespace project;

class Database{
	public $connection;
	public static $_instance;

	 public static function getInstance($config = []) {
        if(null === static::$_instance) {
            static::$_instance = new static($config);
        }
        return static::$_instance;
    }

    private function __construct($config){
        $this->connection = new \mysqli($config['host'], $config['user'], $config['password'], $config['db']);
        $this->connection->set_charset("utf8");
        if ($this->connection->connect_errno)
        {
            printf($this->connection->connect_error);
            die();
        }
    }
    }
?>
