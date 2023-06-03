
<?php
class Admin extends Controller {
  public $productModel;
  public $userModel;

  public function __construct(){
      $this->productModel = $this->model('Product');
      $this->userModel = $this->model('User');
      if(!isset($_SESSION['user_id'])){
        redirect('users/login');
    }
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
     $uploadPath = "uploaded/";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      $fileName = basename($_FILES["picture"]["name"]);
      $fileName2 = basename($_FILES["picture2"]["name"]);
      $fileName3 = basename($_FILES["picture3"]["name"]);
      $db_image_file =  $uploadPath . $fileName; 
      $db_image_file2 =  $uploadPath . $fileName2; 
      $db_image_file3 =  $uploadPath . $fileName3;  
      $imageUploadPath = $uploadPath . $fileName; 
      $imageUploadPath2 = $uploadPath . $fileName2;
      $imageUploadPath3 = $uploadPath . $fileName3;
      $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
      $fileType2 = pathinfo($imageUploadPath2, PATHINFO_EXTENSION);
      $fileType3 = pathinfo($imageUploadPath3, PATHINFO_EXTENSION);  
         
      // Allow certain file formats 
      $allowTypes = array('jpg','png','jpeg'); 
      if(!in_array($fileType, $allowTypes) || !in_array($fileType2, $allowTypes) || !in_array($fileType3, $allowTypes)){ 
        
         flash('msg', 'INVALID IMAGE TYPE');
         redirect('admin/add');
         
          
      }else{ 
          $imageTemp = $_FILES["picture"]["tmp_name"];
          $imageTemp2 = $_FILES["picture2"]["tmp_name"];
          $imageTemp3 = $_FILES["picture3"]["tmp_name"]; 
           
          // Compress size and upload image 
          compressImage($imageTemp, $imageUploadPath, 9);
          compressImage($imageTemp2, $imageUploadPath2, 9);
          compressImage($imageTemp3, $imageUploadPath3, 9); 

          $data = [
            'user_id' => $_SESSION['user_id'],
            'user_name' => $_SESSION['user_name'],
            'category' => 'mobile phone',
            'sub_cate' => $_POST['sub_category'],
            'condition' => $_POST['condition'],
            'brand' => $_POST['brand'],
            'image' => $db_image_file,
            'image2' => $db_image_file2,
            'image3' => $db_image_file3,
            'description' => trim($_POST['description']),
            'model' => trim($_POST['model']),
            'price' => trim($_POST['price']),
            'color' => trim($_POST['color'])
          ];

          if($this->productModel->add_product($data)){
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
    $uploadPath = "uploaded/";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      $fileName = basename($_FILES["picture"]["name"]); 
      $db_image_file =  $uploadPath . $fileName; 
      $imageUploadPath = $uploadPath . $fileName; 
      $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
         
      // Allow certain file formats 
      $allowTypes = array('jpg','png','jpeg'); 
      if(!in_array($fileType, $allowTypes)){ 
        
         flash('msg', 'INVALID IMAGE TYPE');
         redirect('admin/add2');
         
          
      }else{ 
          $imageTemp = $_FILES["picture"]["tmp_name"]; 
           
          // Compress size and upload image 
          compressImage($imageTemp, $imageUploadPath, 9); 
          
      
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
        'descErr' => ''
      ]; 

      if ($access->level === 'two') {
       flash('msg', 'ACCESS DENIED');
       redirect('admin/add2');
      }elseif ($access->level === 'one') {
       flash('msg', 'ACCESS DENIED');
       redirect('admin/add2');
      }else{


      if($this->productModel->add_product2($data)){
      
        flash('success', 'Add Product Successfull');
        redirect('admin/show');
      } else {
        die('Something went wrong');
      }

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
    $uploadPath = "uploaded/";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      $fileName = basename($_FILES["picture"]["name"]); 
      $db_image_file =  $uploadPath . $fileName; 
      $imageUploadPath = $uploadPath . $fileName; 
      $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
         
      // Allow certain file formats 
      $allowTypes = array('jpg','png','jpeg'); 
      if(!in_array($fileType, $allowTypes)){ 
        
         flash('msg', 'INVALID IMAGE TYPE');
         redirect('admin/add2');
         
          
      }else{ 
          $imageTemp = $_FILES["picture"]["tmp_name"]; 
           
          // Compress size and upload image 
          compressImage($imageTemp, $imageUploadPath, 9); 
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
        'descErr' => ''
      ]; 

      if($this->productModel->add_product2($data)){
      
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
      $uploadPath = "uploaded/";
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
     
        $fileName = basename($_FILES["picture"]["name"]);
        $fileName2 = basename($_FILES["picture2"]["name"]);
        $fileName3 = basename($_FILES["picture3"]["name"]);
        if (!empty($fileName) && !empty($fileName2) && !empty($fileName3)) {
      
      $db_image_file =  $uploadPath . $fileName; 
      $db_image_file2 =  $uploadPath . $fileName2; 
      $db_image_file3 =  $uploadPath . $fileName3;  
      $imageUploadPath = $uploadPath . $fileName; 
      $imageUploadPath2 = $uploadPath . $fileName2;
      $imageUploadPath3 = $uploadPath . $fileName3;
      $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
      $fileType2 = pathinfo($imageUploadPath2, PATHINFO_EXTENSION);
      $fileType3 = pathinfo($imageUploadPath3, PATHINFO_EXTENSION);  
         
      // Allow certain file formats 
      $allowTypes = array('jpg','png','jpeg'); 
      if(!in_array($fileType, $allowTypes) || !in_array($fileType2, $allowTypes) || !in_array($fileType3, $allowTypes)){ 
        
         flash('msg', 'INVALID IMAGE TYPE');
         redirect('admin/edit/$id');
         
          
      }else{ 
          $imageTemp = $_FILES["picture"]["tmp_name"];
          $imageTemp2 = $_FILES["picture2"]["tmp_name"];
          $imageTemp3 = $_FILES["picture3"]["tmp_name"]; 
           
          // Compress size and upload image 
          compressImage($imageTemp, $imageUploadPath, 9);
          compressImage($imageTemp2, $imageUploadPath2, 9);
          compressImage($imageTemp3, $imageUploadPath3, 9); 

        $data = [
          'id' => $id,
          'category' => $_POST['category'],
          'condition' => $_POST['condition'],
          'brand' => $_POST['brand'],
          'image' => $db_image_file,
          'image2' => $db_image_file2,
          'image3' => $db_image_file3,
          'description' => trim($_POST['description']),
          'model' => trim($_POST['model']),
          'price' => trim($_POST['price']),
          'color' => trim($_POST['color']),
          
        ]; 
  
        if($this->productModel->update($data)){
          
          flash('success', 'Changes made Successfull');
          redirect('admin/show');
        } else {
          die('Something went wrong');
        }
      }
      }else{
          //NO IMAGE EDIT
        $data = [
          'id' => $id,
          'category' => $_POST['category'],
          'condition' => $_POST['condition'],
          'brand' => $_POST['brand'],
          'description' => trim($_POST['description']),
          'model' => trim($_POST['model']),
          'price' => trim($_POST['price']),
          'color' => trim($_POST['color']),
  
        ]; 
  
        if($this->productModel->update1($data)){
          flash('success', 'Changes made Successfull');
          redirect('admin/show');
        } else {
          die('Something went wrong');


        }

     
        }
        //===========================================================================
       }else {
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