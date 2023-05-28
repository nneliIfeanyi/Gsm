<?php

class User{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    
    // Add User / Register
    public function register($data){
        // Prepare Query
        $this->db->query('INSERT INTO users (name,phone,address,password,level) 
        VALUES (:name, :phone, :address, :password, :level)');
  
        // Bind Values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':level', $data['level']);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      
    // Find USer BY phone
    public function findUserByPhone($phone){
        $this->db->query("SELECT * FROM users WHERE phone = :phone");
        $this->db->bind(':phone', $phone);
  
        $row = $this->db->single();
  
        //Check Rows
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
      }


       public function posted(){
        $this->db->query("SELECT * FROM products WHERE seller = :name AND category = 'smartphone' ");
        $this->db->bind(':name', $_SESSION['user_name']);
  
        $row = $this->db->single();
  
        //Check Rows
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
        
      }


          // Find USer BY level
    public function userLevel(){
        $this->db->query("SELECT * FROM users WHERE name = :name");
        $this->db->bind(':name', $_SESSION['user_name']);
  
        $row = $this->db->single();
        return $row;
      }


          // Login / Authenticate User
    public function login($phone, $password){
        $this->db->query("SELECT * FROM users WHERE phone = :phone");
        $this->db->bind(':phone', $phone);
  
        $row = $this->db->single();
        if($password == $row->password){
          
          return $row;
        } else {
          return false;
        }
      }
  

  
      // Get Product By ID
    public function getProductById($id){
      $this->db->query("SELECT * FROM products WHERE id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }

      // Get User By ID
    public function getUserById2(){
      $this->db->query("SELECT * FROM products WHERE s_id = :id");

      $this->db->bind(':id', $_SESSION['user_id']);
      
      $row = $this->db->single();

      return $row;
    }

 
          // Find User By ID
    public function getUserById($id){
      $this->db->query("SELECT * FROM users WHERE id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }


    public function allSellerGoods($id){
      $this->db->query("SELECT * FROM products WHERE s_id = :id");
      $this->db->bind(':id', $id);

      $row = $this->db->resultset();

      return $row;
    }


    public function orders($data){
      // Prepare Query
      $this->db->query('INSERT INTO orders () 
      VALUES ()');

      // Bind Values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':phone', $data['phone']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':password', $data['password']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    
}