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

     public function charger(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'chargers' ");
        $results = $this->db->resultset();
  
        return $results;
    }


     public function memory(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'memory' ");
        $results = $this->db->resultset();
  
        return $results;
    }


     public function powers(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'power' ");
        $results = $this->db->resultset();
  
        return $results;
    }

     public function ba3(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'batteries' ");
        $results = $this->db->resultset();
  
        return $results;
    }

     public function bluetooth(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'bluetooth' ");
        $results = $this->db->resultset();
  
        return $results;
    }
}