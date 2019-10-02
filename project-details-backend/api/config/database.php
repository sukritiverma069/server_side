<?php
class Database{
 
    // specify your own database crendential
    private $host = "localhost";
    private $db_name = "99acresdb3";
    private $username = "dbuser2";
    private $password = "dbpassword2";
    public $conn;
 
    // get the database connection
    public function getConnection(){
        
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "could not get database connection";
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>