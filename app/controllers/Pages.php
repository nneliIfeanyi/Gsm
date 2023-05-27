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
        'title' => 'All Categories',
        'products' => $products
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

    
  }