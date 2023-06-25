<?php
  class Pages extends Controller {

    public $productModel;
    public function __construct(){
      $this->productModel = $this->model('Product');
    }
    

    //====INDEX PAGE VIEW DISPLAY
    public function index(){
      if (!empty($products = $this->productModel->getProduct())) {
      
        $data = [
          'err' => '',
          'title' => 'Recent Uploads',
          'description' => '',
          'products' => $products,
        ];

      }else{

       flash('success', 'Your products will appear here');
       $data = [
          'err' => '',
          'title' => 'All Categories',
          'description' => '',
          'products' => $products,
        ];
      }

      $this->view('pages/index', $data);
    }


    public function shop(){
      if (!empty($products = $this->productModel->getAllProduct())) {
      
        $data = [
          'err' => '',
          'title' => 'All Categories',
          'description' => '',
          'products' => $products,
        ];

      }else{

       flash('success', 'Your products will appear here');
       $data = [
          'err' => '',
          'title' => 'All Categories',
          'description' => '',
          'products' => $products,
        ];
      }

      $this->view('pages/shop', $data);
    }
    


     //====ABOUT PAGE VIEW DISPLAY
    public function about(){
      $data = [
        'title' => 'Under Construction',
        'description' => 'This view is still under construction.'
      ];

      $this->view('pages/about', $data);
    }




    public function search_result(){

      if ($_SERVER['REQUEST_METHOD'] == 'GET' ) {
        
         $data = [
          'search_text' => trim($_GET['search']),
        ];

        if (empty($data['search_text'])) {
          redirect('pages/shop');
        }

        if ($products = $this->productModel->search_result($data)) {
          
          $data = [
            'title' => 'Search Results',
            'products' => $products
          ];
         $this->view('pages/search_result', $data);
        }else{

           $data = [
            'title' => 'Search Results'
            
          ];
          flash('search_msg', 'No match found, type "samsung" for all samsung phones, or "infinix" for all infinix phones etc');
          redirect('pages/shop');
        }
          
      }
     

      redirect('pages/shop');
    }

    
  }