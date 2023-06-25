<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="row">
    <div class="col-md-6 mb-5 mx-auto">
      <div class="card card-body  mt-3">
        <img src="<?php echo URLROOT; ?>/img/errands.png" style="height: 100px;width: 150px;">
        <h2 class="">Send us to market</h2>

        <?php if (!empty($_POST['body'])) {
          ?>

          <a href="https://wa.me/8122321931?text=<?= $data['msg']; ?>" class="btn btn-success btn-block"><i class="fa fa-whatsapp fa-fw"></i>Continue on whatsapp</a>

          <?php
        }else{

          flash('msg');
          ?>
          <a href="<?=URLROOT;?>/pages" class="btn btn-success btn-block"><i class="fa fa-backward fa-fw"></i>Go Back</a>

          <?php

        }
        
        ?>
          
      </div>
    </div> 
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
