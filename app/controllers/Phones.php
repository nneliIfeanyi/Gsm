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
    public function new(){
      $products = $this->phoneModel->brandNew();
           if (!empty($products)) {
      $data = [
            'title' => 'All Brand New',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'All Brand New',
            'products' => $products
          ];
    }

     
      $this->view('phones/new', $data);
    }


     //====LONDON USED PHONES PAGE VIEW DISPLAY
    public function londonused(){
     
      $products = $this->phoneModel->londonused();
          if (!empty($products)) {
      $data = [
            'title' => 'London Used',
            'products' => $products
          ]; 
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'London Used',
            'products' => $products
          ];
    }


      $this->view('phones/londonused', $data);
    }



     //====SECOND HAND PAGE VIEW DISPLAY
   public function secondhand(){
    $products = $this->phoneModel->secondhand();
    if (!empty($products)) {
      $data = [
            'title' => 'Second Hand Phones',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Second Hand Phones',
            'products' => $products
          ];
    }
     
      $this->view('phones/secondhand', $data);
    }


    
  }