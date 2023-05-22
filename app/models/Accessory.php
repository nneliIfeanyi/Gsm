<?php
class Accessory {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }


 public function allAccessories(){
      $this->db->query("SELECT * FROM products WHERE category = 'accessories'");
        $results = $this->db->resultset();
  
        return $results;
    }

/*
     // Get Product By Brand new
    public function brandNew(){
      $this->db->query("SELECT * FROM products WHERE cond_tion = 'brandnew'");
        $results = $this->db->resultset();
  
        return $results;
    }


     // Get Product By second hand
    public function secondhand(){
      $this->db->query("SELECT * FROM products WHERE cond_tion = 'secondhand'");
        $results = $this->db->resultset();
  
        return $results;
    }



     // Get Product By london used
    public function londonused(){
      $this->db->query("SELECT * FROM products WHERE cond_tion = 'londonused'");
        $results = $this->db->resultset();
  
        return $results;
    }
*/

}