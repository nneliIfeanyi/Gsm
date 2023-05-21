<?php
class Admin extends Controller {
  public $productModel;

  public function __construct(){
      $this->productModel = $this->model('Product');
  }

   //======================

   public function index(){
    $products = $this->productModel->getProduct();
    $data = [
      'title' => 'All Products',
      'products' => $products
    ];
   
    $this->view('admin/index', $data);
  }

  //======================

  public function show(){
    $products = $this->productModel->getProduct();
    $data = [
      'title' => 'All Products',
      'products' => $products
    ];
   
    $this->view('admin/show', $data);
  }


//======================

  public function add(){
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
   
      }else{
        if(!isset($_SESSION['user_id'])){
          redirect('users/login');
        }
        $data = [
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

        // Check for owner
        if($products->s_id != $_SESSION['user_id']){
          redirect('admin/show');
        }
       $data = [
          'product' => $products,
           
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
}