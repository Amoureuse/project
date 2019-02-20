<?php 

namespace project;

class Database
{
    public $pdo;
    public $connection;
    public static $_instance;

    public static function getInstance($config = [])
    {
        if (static::$_instance === null) {
            static::$_instance = new static($config);
        }
        return static::$_instance;
    }

    private function __construct($config)
    {
        $this->connection = new \mysqli($config['host'], $config['user'], $config['password'], $config['db']);
        $this->connection->set_charset("utf8");
        if ($this->connection->connect_errno) {
            printf($this->connection->connect_error);
            die();
        }
        $this->pdo = new \PDO(
                "mysql:host = " . $config['host'] . ";dbname=" . $config['db'] . ";charset=utf8",
                $config['user'],
                $config['password'],
                [\PDO::ATTR_ERRMODE=> \PDO::ERRMODE_EXCEPTION,\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC]);
    }
}
