<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<div class="row">
  <div class="col-md-6 mb-5 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2 class="text-center">Update Profile</h2>
      <div class="text-center"><?= flash('success');?></div>
      <div class="text-center"><?= flash('msg');?></div>
      <div class="mx-auto">
       <a href="<?php echo URLROOT; ?>/admin/update_pic"><img src="<?= URLROOT.'/'.$data['user']->img;?>" style="height: 170px;border-radius: 50%;"></a>
      </div>
      <form action="<?php echo URLROOT; ?>/admin/setting" method="post">
        <div class="form-group mb-2">
            <label class="text-muted fs-6">Name:<sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user']->name; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div> 
        <div class="form-group mb-2">
            <label class="text-muted fs-6">Whatsapp no:<sup>*</sup></label>
            <input type="number" name="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user']->phone; ?>">
            <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
        </div> 
        <div class="form-group mb-4">
            <label class="text-muted fs-6">Address:<sup>*</sup></label>
            <input type="text" name="address" class="form-control form-control-lg <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['user']->address; ?>">
            <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
        </div>    
        

        <div class="form-row mt-2">
          <div class="col mb-2">
            <input type="submit" class="btn btn-success btn-block" value="Update">
        
            <a href="<?php echo URLROOT; ?>/admin/reset_pwd" class="btn pull-right">Click to reset your password</a>
          </div>
          <div class="col">
            <a href="<?php echo URLROOT; ?>/admin" class="btn btn-light btn-block">Go Back</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>