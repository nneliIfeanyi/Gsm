<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="row">
  <div class="col-md-6 mb-5 mx-auto">
   
    <div class="card text-center card-body bg-light mt-5">
       <div><?=flash('cart_success')?></div>
      <h2 class="text-success fw-bold">Success</h2>
      <p class="fs-5">You have successfully added to your cart</p>
      
        <div class="row">
          <div class="col my-2">
            <a href="<?=URLROOT?>/orders/cart" class="btn btn-success btn-lg">View cart</a>
          </div>
       
          <div class="col my-2">
            <a href="<?=URLROOT?>/pages/index" class="btn btn-success btn-lg">Shop more</a>
          </div>
        </div>
    </div>
  </div>
</div>
</div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>