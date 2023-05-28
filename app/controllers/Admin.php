
<?php
class Admin extends Controller {
  public $productModel;
  public $userModel;

  public function __construct(){
      $this->productModel = $this->model('Product');
       $this->userModel = $this->model('User');
  }

   //======================

   public function index(){
 if(!isset($_SESSION['user_id'])){
    redirect('users/login');
    }else{
      $access = $this->userModel->userLevel();
      $products = $this->productModel->getProduct();
      $data = [
        'title' => 'All Products',
         'access' => $access,
        'products' => $products
      ];
   
    $this->view('admin/index', $data);
    }
    
  }
  //======================



  //============
  public function show(){
    $access = $this->userModel->userLevel();
    $products = $this->productModel->getUserProduct();
    if (empty($products)) {
      flash('msg', 'You dont have any product yet for sale');
    }
    $data = [
      'title' => 'All Products',
      'access' => $access,
      'products' => $products,
      'user_id' => $_SESSION['user_id']
    ];
   
    $this->view('admin/show', $data);
  }


//======================

  public function add(){
     $access = $this->userModel->userLevel();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      $image_file = $_FILES['picture']['name'];
      $file_nameArr = explode(".", $image_file);
      $extension = end($file_nameArr);
      $ext = strtolower($extension);
      $unique_name = rand(1100, 999).rand(100, 999).'.'.$ext;
      $db_image_file = "uploaded/".$unique_name;
      $image_folder = "uploaded/".$unique_name;
      $data = [
        'user_id' => $_SESSION['user_id'],
        'user_name' => $_SESSION['user_name'],
        'category' => 'smartphone',
        'sub_cate' => $_POST['sub_category'],
        'condition' => $_POST['condition'],
        'brand' => $_POST['brand'],
        'image' => $db_image_file,
        'description' => trim($_POST['description']),
        'model' => trim($_POST['model']),
        'price' => trim($_POST['price']),
        'color' => trim($_POST['color']),
        'priceErr' => '',
        'nameErr' => '',
        'imgErr' => '',
        'descErr' => '',
        'move'  =>  move_uploaded_file($_FILES['picture']['tmp_name'],$image_folder)
      ]; 

      if ($access->level == 'two' || 'one' && $_POST['sub_category'] == 'ios') {
       flash('msg', 'Only level 3 users can post iphones');
       redirect('admin/add');
      }elseif ($access->level == 'two' || 'one' && $_POST['condition'] == 'brandnew') {
       flash('msg', 'Only level 3 users can post Brandnew phones');
       redirect('admin/add');
      }else{


      if($this->productModel->add_product($data)){
        move_uploaded_file($_FILES['picture']['tmp_name'],$image_folder);
        flash('success', 'Add Product Successfull');
        redirect('admin/show');
      } else {
        die('Something went wrong');
      }

      }
   
      }else{
        if(!isset($_SESSION['user_id'])){
          redirect('users/login');
        }
       
        $data = [
          'access' => $access,
          'category' => '',
          'condition' => '',
          'model' => '',
          'color' => '',
          'description' => '',
          'price' => '',
          'brand' => '',
          'priceErr' => '',
          'nameErr' => '',
          'descErr' => '',
          'imgErr' => ''

          
        ]; 

        //Load View
        $this->view('admin/add', $data);
        }
    }
//===============================


    //========================FOR ACCESSORIES
  public function add2(){
    $access = $this->userModel->userLevel();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      $image_file = $_FILES['picture']['name'];
      $file_nameArr = explode(".", $image_file);
      $extension = end($file_nameArr);
      $ext = strtolower($extension);
      $unique_name = rand(1100, 999).rand(100, 999).'.'.$ext;
      $db_image_file = "uploaded/".$unique_name;
      $image_folder = "uploaded/".$unique_name;
      $data = [
        'user_id' => $_SESSION['user_id'],
        'user_name' => $_SESSION['user_name'],
        'category' => 'accessories',
        'sub_cate' => $_POST['sub_category'],
        'condition' => $_POST['condition'],
        'brand' => $_POST['brand'],
        'image' => $db_image_file,
        'description' => trim($_POST['description']),
        'model' => trim($_POST['model']),
        'price' => trim($_POST['price']),
        'color' => trim($_POST['color']),
        'priceErr' => '',
        'nameErr' => '',
        'imgErr' => '',
        'descErr' => '',
        'move'  =>  move_uploaded_file($_FILES['picture']['tmp_name'],$image_folder)
      ]; 

      if ($access->level == 'two' || 'one') {
       flash('msg', 'ACCESS DENIED');
       redirect('admin/add2');
      }else{


      if($this->productModel->add_product($data)){
        move_uploaded_file($_FILES['picture']['tmp_name'],$image_folder);
        flash('success', 'Add Product Successfull');
        redirect('admin/show');
      } else {
        die('Something went wrong');
      }

      }
   

   //=======IF NOT A POST REQUEST==========//////
      }else{
        if(!isset($_SESSION['user_id'])){
          redirect('users/login');
        }
        $data = [
          'access' => $access,
          'category' => '',
          'condition' => '',
          'model' => '',
          'color' => '',
          'description' => '',
          'price' => '',
          'brand' => '',
          'priceErr' => '',
          'nameErr' => '',
          'descErr' => '',
          'imgErr' => ''

          
        ]; 

        //Load View
        $this->view('admin/add2', $data);
        }
    }
//===============================ACCESSORIES ENDS========/////

    //========================FOR PHONE PARTS

  public function add3(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      $image_file = $_FILES['picture']['name'];
      $file_nameArr = explode(".", $image_file);
      $extension = end($file_nameArr);
      $ext = strtolower($extension);
      $unique_name = rand(1100, 999).rand(100, 999).'.'.$ext;
      $db_image_file = "uploaded/".$unique_name;
      $image_folder = "uploaded/".$unique_name;
      $data = [
        'user_id' => $_SESSION['user_id'],
        'user_name' => $_SESSION['user_name'],
        'category' => 'parts',
        'sub_cate' => $_POST['sub_category'],
        'condition' => $_POST['condition'],
        'brand' => $_POST['brand'],
        'image' => $db_image_file,
        'description' => trim($_POST['description']),
        'model' => trim($_POST['model']),
        'price' => trim($_POST['price']),
        'color' => trim($_POST['color']),
        'priceErr' => '',
        'nameErr' => '',
        'imgErr' => '',
        'descErr' => '',
        'move'  =>  move_uploaded_file($_FILES['picture']['tmp_name'],$image_folder)
      ]; 

      if($this->productModel->add_product($data)){
        move_uploaded_file($_FILES['picture']['tmp_name'],$image_folder);
        flash('success', 'Add Product Successfull');
        redirect('admin/show');
      } else {
        die('Something went wrong');
      }
   
      }else{
        if(!isset($_SESSION['user_id'])){
          redirect('users/login');
        }
        $access = $this->userModel->userLevel();
        $data = [
          'access' => $access,
          'category' => '',
          'condition' => '',
          'model' => '',
          'color' => '',
          'description' => '',
          'price' => '',
          'brand' => '',
          'priceErr' => '',
          'nameErr' => '',
          'descErr' => '',
          'imgErr' => ''

          
        ]; 

        //Load View
        $this->view('admin/add3', $data);
        }
    }
//===============================


    //====================== Edit Product
    public function edit($id){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $image_file = $_FILES['picture']['name'];
        $file_nameArr = explode(".", $image_file);
        $extension = end($file_nameArr);
        $ext = strtolower($extension);
        $unique_name = rand(1100, 999).rand(100, 999).'.'.$ext;
        $db_image_file = "uploaded/".$unique_name;
        $image_folder = "uploaded/".$unique_name;
        $data = [
          'user_id' => $_SESSION['user_id'],
          'user_name' => $_SESSION['user_name'],
          'category' => $_POST['category'],
          'condition' => $_POST['condition'],
          'brand' => $_POST['brand'],
          'image' => $db_image_file,
          'description' => trim($_POST['description']),
          'model' => trim($_POST['model']),
          'price' => trim($_POST['price']),
          'color' => trim($_POST['color']),
          'priceErr' => '',
          'nameErr' => '',
          'imgErr' => '',
          'descErr' => '',
          'move'  =>  move_uploaded_file($_FILES['picture']['tmp_name'],$image_folder)
        ]; 
  
        if($this->productModel->add_product($data)){
          move_uploaded_file($_FILES['picture']['tmp_name'],$image_folder);
          flash('success', 'Add Product Successfull');
          redirect('admin/show');
        } else {
          die('Something went wrong');
        }
     
        }
        //===========================================================================
       else {
        // Get post from model
        $products = $this->productModel->getById($id);
        $access = $this->userModel->userLevel();

        // Check for owner
        if($products->s_id != $_SESSION['user_id']){
          redirect('admin/show');
        }
       $data = [
          'product' => $products,
          'access' => $access,
           
          ]; 

        $this->view('admin/edit', $data);
      }
    }


    //==================== Delete

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Execute
        if($this->productModel->deleteProduct($id)){
          // Redirect to login
          flash('success', 'Post Removed');
          redirect('admin/show');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('admin/show');
      }
    }





public function setting(){
 if(!isset($_SESSION['user_id'])){
    redirect('users/login');
    }else{
      $access = $this->userModel->userLevel();
      $user = $this->userModel->getUserById2();
      $data = [
        'title' => 'My Profile',
        'access' => $access,
        'user' => $user
      ];
   
    $this->view('admin/setting', $data);
    }
    
  }

  public function logout(){
     if(isset($_SESSION['user_id'])){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_name']);
      //unset($_SESSION['user_id']);
      session_destroy();
      redirect('users/login');
      }

      $data = [
         'phone' => '',
          'password' => '',
          'phone_err' => '',
          'password_err' => '',

      ];

      $this->view('users/login', $data);

  }

}