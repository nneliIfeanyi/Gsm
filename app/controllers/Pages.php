<?php
  class Pages extends Controller {

    public $productModel;
    public $accessoryModel;
    public $phoneModel;
    public $partstModel;
    public function __construct(){
      $this->productModel = $this->model('Product');
      $this->partsModel = $this->model('Part');
      $this->phoneModel = $this->model('Phone');
      $this->accessoryModel = $this->model('Accessory');
    }
    

    //====INDEX PAGE VIEW DISPLAY
    public function index(){
      $products = $this->productModel->getProduct();
      $products1 = $this->accessoryModel->allAccessories();
      $products2 = $this->phoneModel->allphones();
      $products3 = $this->partsModel->allparts();

      $data = [
        'err' => '',
        'title' => 'All Categories',
        'description' => '',
        'products' => $products,
        'products1' => $products1,
        'products2' => $products2,
        'products3' => $products3
      ];
     
      $this->view('pages/index', $data);
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
          redirect('pages');
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
          flash('search_msg', 'No match found');
          redirect('pages');
        }
          
      }
     

      redirect('pages');
    }

    
  }