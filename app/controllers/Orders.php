<?php
  class Orders extends Controller {

    public $orderModel;

    public function __construct(){

        if(!$this->isLoggedIn()){
        //flash('login_success', 'You are Logged in.');
        redirect('users/login');
      }

      $this->orderModel = $this->model('Order');
    }
    

    public function cart(){
      $products = $this->orderModel->myCart();
           if (!empty($products)) {
      $data = [
            'title' => 'My Cart',
            'products' => $products
          ];
    }else{
       flash('cart_msg', 'Cart is empty');
      $data = [
            'title' => 'My Cart',
            'products' => $products
          ];
    }

     
      $this->view('orders/cart', $data);
    }


    //====
    public function processing(){
      $products = $this->orderModel->processing();
           if (!empty($products)) {
      $data = [
            'title' => 'Processing, Awaiting Delivery',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Processing, Awaiting Delivery',
            'products' => $products
          ];
    }

     
      $this->view('orders/processing', $data);
    }


     //====
    public function completed(){
     
      $products = $this->orderModel->completed();
          if (!empty($products)) {
      $data = [
            'title' => 'Delivered',
            'products' => $products
          ]; 
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Delivered',
            'products' => $products
          ];
    }


      $this->view('orders/completed', $data);
    }



    // Check Logged In
      public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
          return true;
        } else {
          return false;
        }
      }
    
  }