<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="row">
    <div class="col-md-6 mb-5 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('register_success'); ?>
        <h2>Reset your password</h2>


        <a href="https://wa.me/<?= $data['user']->phone ;?>?text=use%20this%20link%20to%20resetYourPassword%20<?=URLROOT.'/'.'users'.'/'.'now_reset'?>" class="btn btn-success btn-block"><i class="fa fa-whatsapp fa-fw"></i>Send me a password reset link</a>
        
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
