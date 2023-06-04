<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="row">
    <div class="col-md-6 mb-5 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('register_success'); ?>
        <h2>Reset your password</h2>
        <p>Please input your registered whatsapp number</p>
        <form action="<?php echo URLROOT; ?>/users/pwd_reset" method="post">
          <div class="form-group">
              <label>Phone:<sup>*</sup></label>
              <input type="number" name="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone']; ?>">
              <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
          </div>    
          <div class="form-row mt-2">
            <div class="col-6 mb-2">
               <input type="submit" class="btn btn-success btn-block" value="Send">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Return to login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
