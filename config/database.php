<?php 
class Database {
    protected $host = 'localhost';
    protected $uname = 'root';
    protected $pwd = '';
    protected $db = 'db_iot';
    public $conn;

    public function __construct()
    {
        global $conn;

        try {

            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->uname, $this->pwd);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch (PDOException $err){

            echo $err->getMessage();

        }
    }
}




?>