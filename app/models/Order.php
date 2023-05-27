<?php
class Order {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }


 public function myCart(){
      $this->db->query("SELECT * FROM cart WHERE user_id = :id");
      $this->db->bind(':id', $_SESSION['user_id']);

      $results = $this->db->resultset();
  
        return $results;
    }


     // 
    public function processing(){
      $this->db->query("SELECT * FROM cart WHERE status = 'processing' ");
        $results = $this->db->resultset();
  
        return $results;
    }


     // 
    public function completed(){
      $this->db->query("SELECT * FROM cart WHERE status = 'completed' ");
        $results = $this->db->resultset();
  
        return $results;
    }

}