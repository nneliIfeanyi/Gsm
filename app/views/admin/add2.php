<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="mx-auto mt-2 container text-center"><?php flash('msg'); ?></div>
<?php

    //Level one validate
    if ($data['access']->level === 'one') {
        ?>
        <div class="container pt-3">
        <div class="row">
        <?php include APPROOT . '/views/admin/inc.php' ?>
        <div class="col-md-9 mb-5 mx-auto">
             <div class="card mx-auto" style="height: 90px; width: 90px;">
            <img class="card-img" src="<?= URLROOT?>/img/denied.png">
            </div>
        <h2 class="text-center mt-2">ACCESS DENIED</h2>
        <?php 

      //Level one validate ends
      
      //Level two validate  
    }elseif ($data['access']->level === 'two') {
        ?>
        <div class="container pt-3">
        <div class="row">
        <?php include APPROOT . '/views/admin/inc.php' ?>
        <div class="col-md-9 mb-5 mx-auto">
            <div class="card mx-auto" style="height: 90px; width: 90px;">
            <img class="card-img" src="<?= URLROOT?>/img/denied.png">
            </div>
        <h2 class="text-center mt-2">ACCESS DENIED</h2>
        <?php 

        //Level two validate ends

        //Level three validate
    }else{
        ?>
        <div class="container pt-3">
        <div class="row">
        <?php include APPROOT . '/views/admin/inc.php' ?>
        <div class="col-md-9 mb-5 mx-auto">

        <h2 class="text-center mt-2">Add Phone Accessories</h2>
        <div class="card card-body bg-light mt-3">
      <p>Please use the form below to add product for sell</p>
      <form action="<?php echo URLROOT; ?>/admin/add2" method="post" enctype="multipart/form-data">
         <div class="form-group" >
            <label>Category</label><br>
            <select class="custom-select" name="sub_category">
                <option value="charger">Chargers</option>
                <option value="external memory">Memory Card</option>
                <option value="bluetooth device">Bluetooth Devices</option>
                <option value="power bank">Power Banks</option>
                <option value="battery">Battery</option>
            </select>
        </div>
        <div class="form-group">
            <label>Brand name</label>
            <input type="text" name="brand" class="form-control form-control-lg <?php echo (!empty($data['brand_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['brand']; ?>">
            <span class="invalid-feedback"><?php echo $data['brand_err']; ?></span>
        </div> 
        <div class="form-group">
            <label>Model</label>
            <input type="text" name="model" class="form-control form-control-lg <?php echo (!empty($data['model_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['model']; ?>">
            <span class="invalid-feedback"><?php echo $data['model_err']; ?></span>
        </div> 
        <div class="form-group">
            <label>description</label>
            <input type="text" name="description" class="form-control form-control-lg <?php echo (!empty($data['desc_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['description']; ?>">
            <span class="invalid-feedback"><?php echo $data['desc_err']; ?></span>
        </div>
        <div class="form-group">
            <label>Condition:</label><br>
            <select name="condition">
                <option value="brandnew">Brand New</option>
                <option value="UKused">London Used</option>
                <option value="secondhand">2nd Hand</option>
            </select>
        </div>
        <div class="form-group">
            <label>Color:</label>
            <input type="text" name="color" class="form-control form-control-lg" value="<?php echo $data['color']; ?>">
        </div>     
        
        <div class="form-group mb-2">
            <label>Price</label>
            <input type="number" name="price" class="form-control form-control-lg <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>">
            <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
        </div>

        <div class="form-group">
            <label>Product Pic</label>
            <input type="file" name="picture" class="form-control form-control-lg" >
        </div>   

        <div class="form-row text-center">
          <div class="col mt-2">
            <input type="submit" class="btn btn-success btn-block" value="Proceed">
          </div>
        </div>
      </form>
    </div>
    <?php
    }

?>
  </div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>