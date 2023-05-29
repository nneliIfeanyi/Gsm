<?php

class Users extends Controller{
    private $userModel;
    private $productModel;
    public function __construct(){
        $this->userModel = $this->model('User');
        $this->productModel = $this->model('Product');
      }
      
      public function register(){
              // Check if POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'img' => 'uploaded/avatar_guy.png',
          'name' => trim($_POST['name']),
          'phone' => trim($_POST['phone']),
          'address' => trim($_POST['address']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'level' => 'one',
          'name_err' => '',
          'phone_err' => '',
          'address_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];
         // Validate email
         if(empty($data['phone'])){
          $data['phone_err'] = 'Please enter a phone number';
          // Validate name
          if(empty($data['name'])){
            $data['name_err'] = 'Please enter a name';
          }
      } 

        // Validate password
        if(empty($data['password'])){
            $data['password_err'] = 'Please enter a password.';     
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must have atleast 6 characters.';
        }

        // Validate confirm password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password.';     
        } else{
            if($data['password'] != $data['confirm_password']){
                $data['confirm_password_err'] = 'Password do not match.';
            }
        }

       
            
         
        // Make sure errors are empty
        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
         
          if($this->userModel->findUserByPhone($data['phone'])){
            $data['phone_err'] = 'Phone number is already taken.';
            $this->view('users/register', $data);
          }else{

            // SUCCESS - Proceed to insert

          // Hash Password
          //$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          //Execute
          if($this->userModel->register($data)){
            // Redirect to login
            flash('register_success', 'You are now registered and can log in');
            redirect('users/login');
          } else {
            die('Something went wrong');
          }

          }  
        } else {
          // Load View
          $this->view('users/register', $data);
        }
      } else {
        // IF NOT A POST REQUEST

        // Init data
        $data = [
          'name' => '',
          'email' => '',
          'phone' => '',
          'address' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'phone_err' => '',
          'address_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        // Load View
        $this->view('users/register', $data);
      }
      }

  public function login(){
    if($this->isLoggedIn()){
        flash('login_success', 'You are Logged in.');
        redirect('pages');
      }
    // Check if POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
      $data = [       
        'phone' => trim($_POST['phone']),
        'password' => trim($_POST['password']),        
        'phone_err' => '',
        'password_err' => '',       
      ];

      // Check for email
      if(empty($data['phone'])){
        $data['phone_err'] = 'Please enter phone number.';
      }else if(empty($data['password'])){
        $data['password_err'] = 'Please enter password.';
      }else if(!$this->userModel->findUserByPhone($data['phone'])){
        $data['phone_err'] = 'This number is not registered.';
      } else {
        $loggedInUser = $this->userModel->login($data['phone'], $data['password']);
        if($loggedInUser){
          // User Authenticated!
          $this->createUserSession($loggedInUser);
          flash('login_success', 'You are Logged in.');
          redirect('admin');
         
        } else {
          $data['password_err'] = 'Password incorrect.';
          // Load View
          $this->view('users/login', $data);
        }
      }
      $this->view('users/login', $data);
      } else {
       // If NOT a POST

        // Init data
         $data = [
          'phone' => '',
          'password' => '',
          'phone_err' => '',
          'password_err' => '',
        ];

        // Load View
        $this->view('users/login', $data);
      };
      }

      public function login2(){
    if($this->isLoggedIn()){
        flash('login_success', 'You are Logged in.');
        redirect('pages');
      }
    // Check if POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
      $data = [       
        'phone' => trim($_POST['phone']),
        'password' => trim($_POST['password']),        
        'phone_err' => '',
        'password_err' => '',       
      ];

      // Check for email
      if(empty($data['phone'])){
        $data['phone_err'] = 'Please enter phone number.';
      }else if(empty($data['password'])){
        $data['password_err'] = 'Please enter password.';
      }else if(!$this->userModel->findUserByPhone($data['phone'])){
        $data['phone_err'] = 'This number is not registered.';
      } else {
        $loggedInUser = $this->userModel->login($data['phone'], $data['password']);
        if($loggedInUser){
          // User Authenticated!
          $this->createUserSession($loggedInUser);
          flash('login_success', 'You are Logged in.');
          redirect('pages');
         
        } else {
          $data['password_err'] = 'Password incorrect.';
          // Load View
          $this->view('users/login2', $data);
        }
      }
      $this->view('users/login2', $data);
      } else {
       // If NOT a POST

        // Init data
         $data = [
          'phone' => '',
          'password' => '',
          'phone_err' => '',
          'password_err' => '',
        ];

        // Load View
        $this->view('users/login2', $data);
      };
      }
  // Check Logged In
  public function isLoggedIn(){
    if(isset($_SESSION['user_id'])){
      return true;
    } else {
      return false;
    }
  }


  // Create Session With User Info
  public function createUserSession($user){
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email; 
    $_SESSION['user_name'] = $user->name;
    $_SESSION['address'] = $user->address;
    redirect('pages');
  }


  public function view_p($id){
    $products = $this->userModel->getProductById($id);
    $seller = $this->userModel->getUserById($products->s_id);
    $sellerGoods = $this->userModel->allSellerGoods($products->s_id);
    
    $data = [
      'product' => $products,
      'seller' => $seller,
      'sellerGoods' => $sellerGoods,
      
    ];
   
    $this->view('users/view_p', $data);
  }



    public function review(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
          'p_id' => trim($_POST['id']),
          'brand' => trim($_POST['brand']),
          'model' => trim($_POST['model']),
          'category' => trim($_POST['category']),
          'sub_category' => trim($_POST['sub_category']),
          'desc' => trim($_POST['desc']),
          'picture' => trim($_POST['picture']),
          'price' => trim($_POST['price']),
          'color' => trim($_POST['color']),
          'condition' => trim($_POST['condition']),
          'quantity' => trim($_POST['quantity']),
          'user_name' => $_SESSION['user_name'],
          'user_id' => $_SESSION['user_id'],
          'status' => '',
         
        ];


       if($this->productModel->addToCart($data)){
          flash('cart_success', 'Added to cart');
          redirect('users/review');
        } else {
          die('Something went wrong');
        }
       
      }

      $data = [

        
        
      ];

      $this->view('users/review', $data);
  }
    
    public function success(){

      
      $data = [
        
      ];

      $this->view('users/success', $data);
    }
  }
  
