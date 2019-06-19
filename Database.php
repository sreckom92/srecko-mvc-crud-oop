<?php

class Database
{
    
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "srecko_projekat_baza";
    private $conn;
	
	private static $instance = null;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->username,$this->password);
    }

    public static function getInstance()
    {
        if(!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

}