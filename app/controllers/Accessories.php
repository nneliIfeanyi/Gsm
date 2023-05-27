<?php
  class Accessories extends Controller {

    public $accessoriesModel;
    public function __construct(){
      $this->accessoriesModel = $this->model('Accessory');
    }
    

    //====INDEX PAGE VIEW DISPLAY 

public function index(){
      $products = $this->accessoriesModel->allAccessories();
           if (!empty($products)) {
      $data = [
            'title' => 'Accessories',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Accessories',
            'products' => $products
          ];
    }

     
       $this->view('accessories/index', $data); 
    }


       //====INDEX PAGE VIEW DISPLAY 

public function chargers(){
      $products = $this->accessoriesModel->charger();
           if (!empty($products)) {
      $data = [
            'title' => 'All Chargers',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'All Chargers',
            'products' => $products
          ];
    }

     
       $this->view('accessories/chargers', $data); 
    }



    public function memories(){
      $products = $this->accessoriesModel->memory();
           if (!empty($products)) {
      $data = [
            'title' => 'Memories',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Memories',
            'products' => $products
          ];
    }

     
       $this->view('accessories/memories', $data); 
    }


    public function power(){
      $products = $this->accessoriesModel->powers();
           if (!empty($products)) {
      $data = [
            'title' => 'Power Banks',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Power Banks',
            'products' => $products
          ];
    }

     
       $this->view('accessories/power', $data); 
    }



   public function bluetooth(){
      $products = $this->accessoriesModel->bluetooth();
           if (!empty($products)) {
      $data = [
            'title' => 'Bluetooth Devices',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Bluetooth Devices',
            'products' => $products
          ];
    }

     
       $this->view('accessories/bluetooth', $data); 
    }



  public function battery(){
      $products = $this->accessoriesModel->ba3();
           if (!empty($products)) {
      $data = [
            'title' => 'Batteries',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Batteries',
            'products' => $products
          ];
    }

     
       $this->view('accessories/battery', $data); 
    }


    
  }