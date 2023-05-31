<?php
class Phone {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }


 public function allphones(){
      $this->db->query("SELECT * FROM products WHERE category = 'smartphone'");
        $results = $this->db->resultset();
  
        return $results;
    }


     // Get Product By Brand new
    public function android(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'android device' ");
        $results = $this->db->resultset();
  
        return $results;
    }


     // Get Product By second hand
    public function iphones(){
      $this->db->query("SELECT * FROM products WHERE brand = 'ios device' ");
        $results = $this->db->resultset();
  
        return $results;
    }



     // Get Product By london used
    public function button(){
      $this->db->query("SELECT * FROM products WHERE sub_cate = 'feature phone' ");
        $results = $this->db->resultset();
  
        return $results;
    }


}