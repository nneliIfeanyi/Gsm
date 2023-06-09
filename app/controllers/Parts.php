<?php/*
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


    //====
    public function lcd(){
      $products = $this->partsModel->screen();
           if (!empty($products)) {
      $data = [
            'title' => 'Parts | screen',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Parts | screen',
            'products' => $products
          ];
    }

     
      $this->view('parts/lcd', $data);
    }


     //====
    public function panel(){
     
      $products = $this->partsModel->motherboard();
          if (!empty($products)) {
      $data = [
            'title' => 'Parts | Panel',
            'products' => $products
          ]; 
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Parts | Panel',
            'products' => $products
          ];
    }


      $this->view('parts/panel', $data);
    }



     //====
   public function downboard(){
    $products = $this->partsModel->downboard();
    if (!empty($products)) {
      $data = [
            'title' => 'Parts | Downboard',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Parts | Downboard',
            'products' => $products
          ];
    }
     
      $this->view('parts/downboard', $data);
    }



     //====
   public function camera(){
    $products = $this->partsModel->camera();
    if (!empty($products)) {
      $data = [
            'title' => 'Parts | Cameras',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Parts | Cameras',
            'products' => $products
          ];
    }
     
      $this->view('parts/camera', $data);
    }


    //====
   public function pwrflex(){
    $products = $this->partsModel->pwrflex();
    if (!empty($products)) {
      $data = [
            'title' => 'Parts | Power Flex',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Parts | Power Flex',
            'products' => $products
          ];
    }
     
      $this->view('parts/pwrflex', $data);
    }


    //====
   public function fingerprint(){
    $products = $this->partsModel->fingerprint();
    if (!empty($products)) {
      $data = [
            'title' => 'Parts | Finger Print',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Parts | Finger Print',
            'products' => $products
          ];
    }
     
      $this->view('parts/fingerprint', $data);
    }


    //====
   public function others(){
    $products = $this->partsModel->others();
    if (!empty($products)) {
      $data = [
            'title' => 'Batteries, Back cover, Frame, Srew, etc..',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Batteries, Back cover, Frame, Srew, etc..',
            'products' => $products
          ];
    }
     
      $this->view('parts/others', $data);
    }


    public function tools(){
    $products = $this->partsModel->tools();
    if (!empty($products)) {
      $data = [
            'title' => 'Repair Tools',
            'products' => $products
          ];
    }else{
       flash('success', 'No results found');
      $data = [
            'title' => 'Repair Tools',
            'products' => $products
          ];
    }
     
      $this->view('parts/tools', $data);
    }


    
  })*/