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


}