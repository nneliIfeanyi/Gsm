<?php
class Product {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function add_product($data){
        $this->db->query('INSERT INTO products (brand,model,description,category,price,img,color,cond_tion,s_id,seller) VALUES(:brand,:model,:description,:category,:price,:img,:color,:condition,:user_id,:user_name)');
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':model', $data['model']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':img', $data['image']);
        $this->db->bind(':color', $data['color']);
        $this->db->bind(':condition', $data['condition']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':user_name', $data['user_name']);
        
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }


    // Update Post
    public function update($data){
      // Prepare Query
      $this->db->query('UPDATE products SET brand = :brand, model = :model, description = :des, price = :price, img = :image, color = :color WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':brand', $data['brand']);
      $this->db->bind(':model', $data['model']);
      $this->db->bind(':des', $data['description']);
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':image', $data['image']);
      $this->db->bind(':color', $data['color']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

     // Update without image
    public function update1($data){
      // Prepare Query
      $this->db->query('UPDATE products SET brand = :brand, model = :model, description = :des, price = :price, color = :color WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':brand', $data['brand']);
      $this->db->bind(':model', $data['model']);
      $this->db->bind(':des', $data['description']);
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':color', $data['color']);
      
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function deleteProduct($id){
        // Prepare Query
        $this->db->query('DELETE FROM products WHERE id = :id');
  
        // Bind Values
        $this->db->bind(':id', $id);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

    // Get All Products
    public function getProduct(){
        $this->db->query("SELECT * FROM products");
  
        $results = $this->db->resultset();
  
        return $results;
      }


      // Get Product By ID
    public function getById($id){
      $this->db->query("SELECT * FROM products WHERE id = :id");

      $this->db->bind(':id', $id);
      
      $row = $this->db->single();

      return $row;
    }


    }
