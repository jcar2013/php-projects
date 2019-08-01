<?php
  class Database {
    // DB Params
    private $host     = 'localhost';
    private $db_name  = "php_read_myblog";
    private $username = 'root';
    private $password = '';
    private $conn;

    // DB fucntion. sets up the connection 
    public function connect() {
      $this->conn = null; // Is the this used to acces the $conn outside the 

      try {
        $this->conn = new PDO('mysql:host=' . $this->host. ';dbname=' . $this->db_name, $this->username, $this->password); //defines the DB connection
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //??
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage(); // if it fail it uses the PDO attr to fetch the errors
      }

      return $this->conn;// allows you to call the database from another location
    }
  }