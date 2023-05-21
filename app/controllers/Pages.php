<?php
  class Pages extends Controller {

    public $productModel;
    public function __construct(){
      $this->productModel = $this->model('Product');
    }
    

    //====INDEX PAGE VIEW DISPLAY
    public function index(){
      $products = $this->productModel->getProduct();
      $data = [
        'title' => 'GSM',
        'products' => $products
      ];
     
      $this->view('pages/index', $data);
    }


     //====ABOUT PAGE VIEW DISPLAY
    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'An eCommerce website for smartPhones, repairs and accessories.'
      ];

      $this->view('pages/about', $data);
    }



     //====MARKET PAGE VIEW DISPLAY
   public function market(){
    $data = [
      'title' => 'UNDER CONSTRUCTION',
      'description' => 'This page is still under construction.'
    ];
      $this->view('pages/market', $data);
    }


     //====CONTACT PAGE VIEW DISPLAY
   public function contact(){
    $data = [
      'title' => 'UNDER CONSTRUCTION',
      'description' => 'This page is still under construction.'
    ];
      $this->view('pages/contact', $data);
    }

    
  }