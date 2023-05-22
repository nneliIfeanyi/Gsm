<?php
  class Accessories extends Controller {

    public $accessoriesModel;
    public function __construct(){
      $this->accessoriesModel = $this->model('Accessory');
    }
    

    //====INDEX PAGE VIEW DISPLAY
    public function index(){
      $products = $this->accessoriesModel->allAccessories();
      $data = [
        'title' => 'All Accessories',
        'products' => $products
      ];
     
      $this->view('accessories/index', $data);
    }


    
  }