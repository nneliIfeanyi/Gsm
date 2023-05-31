<?php
class Part {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }


 public function allparts(){
      $this->db->query("SELECT * FROM products WHERE category = 'parts'");
        $results = $this->db->resultset();
  
        return $results;
    }

 public function screen(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'screen' ");
        $results = $this->db->resultset();
  
        return $results;
    }

 public function motherboard(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'panel' ");
        $results = $this->db->resultset();
  
        return $results;
    }

 public function downboard(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'downboard' ");
        $results = $this->db->resultset();
  
        return $results;
    }

    public function camera(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'camera' ");
        $results = $this->db->resultset();
  
        return $results;
    }


    public function fingerprint(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'fingerprint' ");
        $results = $this->db->resultset();
  
        return $results;
    }

    public function pwrflex(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'powerflex' ");
        $results = $this->db->resultset();
  
        return $results;
    }

    public function others(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'others' ");
        $results = $this->db->resultset();
  
        return $results;
    }

    public function tools(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'tools' ");
        $results = $this->db->resultset();
  
        return $results;
    }
}