<?php
  class Category {
    // DB Stuff
    private $conn;
    private $table = 'categories';

    // Properites
    public $id;
    public $name;
    public $created_at;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get categories
    public function read() {
      // Create query
      $query = 'SELECT
        id,
        name,
        created_at
      FROM
        ' . $this->table . '
      ORDER BY 
        created_at DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Exectue query
      $stmt->execute();
      
      return $stmt;
    }

    
    public function read_single() {
      // Create Query
      $query = 'SELECT
        id,
        name,
        created_at
      FROM 
        ' . $this->table . ' 
      WHERE
        id = ?
      LIMIT 0,1';

      // Prepare Statement
      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->id = $row['id'];
      $this->name = $row['name'];
      $this->created_at = $row['created_at'];
    }
    
    // Create Post
    public function create() {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET id = :id, name = :name, created_at = :created_at';
        
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->created_at = htmlspecialchars(strip_tags($this->created_at));

      // Bind data
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':created_at', $this->created_at);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s. \n", $stmt->error);

      return false;
    }
        // Update Post
    public function update() {
      // Create query
      $query = 'UPDATE ' . $this->table . '
      SET id = :id, name = :name, created_at = :created_at
      WHERE id = :id'; //NEED To ASk ABOUT FORMATING 
        
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->created_at = htmlspecialchars(strip_tags($this->created_at));

      // Bind data
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':created_at', $this->created_at);

 

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s. \n", $stmt->error);

      return false;
    }
    
    public function delete() {
      // Create query
      $query = 'Delete FROM ' . $this->table . ' WHERE id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);
      return false;
    }
  }