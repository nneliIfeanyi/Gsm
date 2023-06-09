
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
      $products = $this->productModel->getProduct();
      $data = [
        'title' => 'All Products',
        'products' => $products
      ];
   
    $this->view('admin/index', $data);
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


    //========================FOR ACCESSORIES
  public function add2(){
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

      if($this->productModel->add_product2($data)){
      
        flash('success', 'Add Product Successfull');
        redirect('admin/show');
      } else {
        die('Something went wrong');
      }

  }   

   //=======IF NOT A POST REQUEST==========//////
      }else{
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
        $this->view('admin/add2', $data);
        }
    }
//===============================ACCESSORIES ENDS========/////

    /*========================FOR PHONE PARTS

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
*/


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
          flash('success', 'Product Removed', 'alert alert-danger');
          redirect('admin/show');
          } else {
            die('Something went wrong');
          }
      } else {
        redirect('admin/show');
      }
    }





public function setting(){
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $data = [
      'id' => $_SESSION['user_id'],
      'name' => trim($_POST['name']),
      'phone' => trim($_POST['phone']),
      'address' => trim($_POST['address']),
    ]; 

    if ($this->userModel->edit_profile($data) ) {
      $_SESSION['user_phone'] = trim($_POST['phone']); 
      $_SESSION['user_name'] = trim($_POST['name']);
      $_SESSION['address'] = trim($_POST['address']);
     flash('success', 'Update saved');
     redirect('admin/setting');
    }

}else{ 

//NOT A POST REQUEST
 $user =$this->userModel->userLevel();
  $data = [
  'user' => $user,
   'nameErr' =>'',
   'phone_err' =>'',
   'address_err' =>'', 
  ];
   
  $this->view('admin/setting', $data);
}
}

public function update_pic(){
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $uploadPath = "pics/";
   $fileName = basename($_FILES["picture"]["name"]); 
    $db_image_file =  $uploadPath . $fileName; 
    $imageUploadPath = $uploadPath . $fileName; 
    $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
       
    // Allow certain file formats 
    $allowTypes = array('jpg','png','jpeg'); 

    if(!in_array($fileType, $allowTypes)){ 
      
       flash('msg', 'INVALID IMAGE TYPE');
       redirect('admin/setting');
       
        
    }else{ 
        $imageTemp = $_FILES["picture"]["tmp_name"]; 
         
        // Compress size and upload image 
        compressImage($imageTemp, $imageUploadPath, 9); 
        $data = [
          'id' => $_SESSION['user_id'],
           'image' => $db_image_file,
        ]; 

        if($this->userModel->edit_pic($data)){
        
          flash('success', 'Update Successfull');
          redirect('admin/setting');
        } else {
          die('Something went wrong');
        }

    }

    }else{ 

    //NOT A POST REQUEST
     $user =$this->userModel->userLevel();
      $data = [
      'user' => $user, 
      ];
       
      $this->view('admin/update_pic', $data);
    }
  }







  public function reset_pwd(){
       if (!isset($_SESSION['user_id'])) {
          redirect('pages');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
          $data = [     
            'id' => $_SESSION['user_id'],
            'password' => trim($_POST['password']),
            'password_err' => '',
          ];

           if(empty($data['password'])){
            $data['password_err'] = 'Please enter new password.';
            $this->view('admin/reset_pwd', $data);
          }elseif(strlen($data['password']) < 6 ){
            $data['password_err'] = 'Too short, must be more than 5 digits.';
            $this->view('admin/reset_pwd', $data);
          }else{

              $this->userModel->new_pass1($data);
                flash('success', 'Password saved');
                redirect('admin/setting');
          }

        }
      
      $data = [

        'password' => '',
        'password_err' => '',

      ];
     
      $this->view('admin/reset_pwd', $data);
    }

  public function logout(){

    unset($_SESSION['user_id']);
    unset($_SESSION['user_phone']); 
    unset($_SESSION['user_name']);
    unset($_SESSION['address']);
    session_destroy();
    redirect('users/login');

  }

}