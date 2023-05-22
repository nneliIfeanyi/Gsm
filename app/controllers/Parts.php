<?php
  class Parts extends Controller {

    public $partsModel;
    public function __construct(){
      $this->partsModel = $this->model('Part');
    }
    

    public function index(){
      $products = $this->partsModel->allparts();
           if (!empty($products)) {
      $data = [
            'title' => 'All Parts',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'All Parts',
            'products' => $products
          ];
    }

     
      $this->view('parts/index', $data);
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