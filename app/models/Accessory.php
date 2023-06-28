<?php
class Accessory {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }


 public function allAccessories(){
      $this->db->query("SELECT * FROM products WHERE category = 'accessories' ORDER BY id DESC");
        $results = $this->db->resultset();
  
        return $results;
    }

     public function charger(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'charger' ORDER BY id DESC ");
        $results = $this->db->resultset();
  
        return $results;
    }


     public function memory(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'external memory' ORDER BY id DESC ");
        $results = $this->db->resultset();
  
        return $results;
    }


     public function powers(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'power bank' ORDER BY id DESC ");
        $results = $this->db->resultset();
  
        return $results;
    }

     public function ba3(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'battery' ORDER BY id DESC ");
        $results = $this->db->resultset();
  
        return $results;
    }

     public function bluetooth(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'bluetooth device' ORDER BY id DESC ");
        $results = $this->db->resultset();
  
        return $results;
    }
}