<?php
class Product {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function add_product($data){
        $this->db->query('INSERT INTO products (brand,model,description,category,sub_cate,price,img,img2,img3,color,cond_tion,s_id) VALUES(:brand,:model,:description,:category,:sub_cate,:price,:img,:img2,:img3,:color,:condition,:user_id)');
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':model', $data['model']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':category', $data['category']);
         $this->db->bind(':sub_cate', $data['sub_cate']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':img', $data['image']);
        $this->db->bind(':img2', $data['image2']);
        $this->db->bind(':img3', $data['image3']);
        $this->db->bind(':color', $data['color']);
        $this->db->bind(':condition', $data['condition']);
        $this->db->bind(':user_id', $data['user_id']);
        
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }


    public function add_product2($data){
        $this->db->query('INSERT INTO products (brand,model,description,category,sub_cate,price,img,color,cond_tion,s_id) VALUES(:brand,:model,:description,:category,:sub_cate,:price,:img,:color,:condition,:user_id)');
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':model', $data['model']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':category', $data['category']);
         $this->db->bind(':sub_cate', $data['sub_cate']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':img', $data['image']);
        $this->db->bind(':color', $data['color']);
        $this->db->bind(':condition', $data['condition']);
        $this->db->bind(':user_id', $data['user_id']);
        
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }


    // Update Post
    public function update($data){
      // Prepare Query
      $this->db->query('UPDATE products SET brand = :brand, model = :model, description = :des, price = :price, img = :image, img2 = :image2, img3 = :image3, color = :color WHERE id = :id');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':brand', $data['brand']);
      $this->db->bind(':model', $data['model']);
      $this->db->bind(':des', $data['description']);
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':image', $data['image']);
      $this->db->bind(':image2', $data['image2']);
      $this->db->bind(':image3', $data['image3']);
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
        $this->db->query("SELECT * FROM products ORDER BY id DESC LIMIT 8");
  
        $results = $this->db->resultset();
  
        return $results;
      }

       // Get All Products
    public function getAllProduct(){
        $this->db->query("SELECT * FROM products ORDER BY id DESC");
  
        $results = $this->db->resultset();
  
        return $results;
      }

 // Get per user Products
    public function getUserProduct(){
        $this->db->query("SELECT * FROM products WHERE s_id = :id ORDER BY id DESC");
        $this->db->bind(':id', $_SESSION['user_id']);
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


    public function addToCart($data){
        $this->db->query('INSERT INTO cart (p_id,brand,model,description,category,sub_cate,price,img,color,cond_tion,quantity,user_id,user_name) VALUES(:id,:brand,:model,:description,:category,:sub_cate,:price,:img,:color,:condition,:quantity,:user_id,:user_name)');
        $this->db->bind(':id', $data['p_id']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':model', $data['model']);
        $this->db->bind(':description', $data['desc']);
        $this->db->bind(':category', $data['category']);
         $this->db->bind(':sub_cate', $data['sub_category']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':img', $data['picture']);
        $this->db->bind(':color', $data['color']);
        $this->db->bind(':condition', $data['condition']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':user_name', $data['user_name']);
        
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }

         public function search_result($data){
            $this->db->query(" SELECT * FROM products WHERE brand = :search_text OR model = :search_text OR category = :search_text OR sub_cate = :search_text ");

            $this->db->bind(':search_text', $data['search_text']);
            $results = $this->db->resultset();
  
        return $results;
      }


        // Get All Users or Sellers
    public function allUsers(){
        $this->db->query("SELECT * FROM users ORDER BY id DESC ");
  
        $results = $this->db->resultset();
  
        return $results;
      }


    }
