<?php
class Database{
    private $host = 'localhost';
    private $username = 'root';
    private $password= '';
    private $db = 'simple_library_db';
    
    protected $conn;

    public function connect(){
        $this->conn = new PDO("/mysql:host$this->;db=$this->db",$this->username, $this->password);
        
        return $this->conn;
    } 
}

