<?php require APPROOT . '/views/inc/header.php'; ?>

<?php

    //Level one validate
    if ($data['access']->level === 'one' && $this->userModel->posted()) {
        ?>
        <div class="container pt-3">
        <div class="row">
        <?php include APPROOT . '/views/admin/inc.php' ?>
        <div class="col-md-9 mb-5 mx-auto">

        <h2 class="text-center mt-2">u can no more add post</h2>
        <?php 

      //Level one validate ends
      
      //Level two validate  
    }elseif ($data['access']->level === 'two') {

        ?>
        <div class="container pt-3">
        <div class="row">
        <?php include APPROOT . '/views/admin/inc.php' ?>
        <div class="col-md-9 mb-5 mx-auto">

        <div><?=flash('msg')?></div>
        <h2 class="text-center mt-2">Add Phone</h2>
        <div class="card card-body bg-light mt-3">
      <p>Please use the form below to add product for sell</p>
      <form action="<?php echo URLROOT; ?>/admin/add" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Category</label><br>
            <select class="custom-select" name="sub_category">
                <option value="" disabled>iPhone</option>
                <option value="android">Android</option>
                <option value="others">others</option>
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
                <option value="" disabled>Brand New</option>
                <option value="londonused">London Used</option>
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

        //Level two validate ends

        //Level three validate
    }else{
        ?>
        <div class="container pt-3">
        <div class="row">
        <?php include APPROOT . '/views/admin/inc.php' ?>
        <div class="col-md-9 mb-5 mx-auto">

        <h2 class="text-center mt-2">Add Phone</h2>
        <div class="card card-body bg-light mt-3">
      <p>Please use the form below to add product for sell</p>
      <form action="<?php echo URLROOT; ?>/admin/add" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Category</label><br>
            <select class="custom-select" name="sub_category">
                <option value="ios">iPhone</option>
                <option value="android">Android</option>
                <option value="others">others</option>
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
                <option value="londonused">London Used</option>
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