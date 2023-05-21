<?php
  class Accessories extends Controller {

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


    
  }