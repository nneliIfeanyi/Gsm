<?php
  class Phones extends Controller {

    public $phoneModel;
    public function __construct(){
      $this->phoneModel = $this->model('Phone');
    }
    

    public function index(){
      $products = $this->phoneModel->allphones();
           if (!empty($products)) {
      $data = [
            'title' => 'All Phones',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'All Phones',
            'products' => $products
          ];
    }

     
      $this->view('phones/index', $data);
    }


    //====BRAND NEW PHONES VIEW DISPLAY
    public function android(){
      $products = $this->phoneModel->android();
           if (!empty($products)) {
      $data = [
            'title' => 'Android Phones',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Android Phones',
            'products' => $products
          ];
    }

     
      $this->view('phones/android', $data);
    }


     //====LONDON USED PHONES PAGE VIEW DISPLAY
    public function iphones(){
     
      $products = $this->phoneModel->iphones();
          if (!empty($products)) {
      $data = [
            'title' => 'iPhones',
            'products' => $products
          ]; 
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'iPhones',
            'products' => $products
          ];
    }


      $this->view('phones/iphones', $data);
    }



     //====SECOND HAND PAGE VIEW DISPLAY
   public function others(){
    $products = $this->phoneModel->button();
    if (!empty($products)) {
      $data = [
            'title' => 'Button Phones',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Button Phones',
            'products' => $products
          ];
    }
     
      $this->view('phones/others', $data);
    }


    
  }