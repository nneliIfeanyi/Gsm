<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light mt-2"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body bg-light mt-3">
        <h2>Add Post</h2>
        <p>Use the form below to create a review of our products and services and tell us how we can improve</p>
        <form action="<?php echo URLROOT; ?>/posts/add" method="post">
          <div class="form-group mb-2">
              <label>Title</label>
              <select name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                <option value="">Choose title</option>
                <option value="Very Poor">Very Poor</option>
                <option value="Poor">Poor</option>
                <option value="Satisfied">Satisfied</option>
                <option value="Very Satisfied">Very Satisfied</option>
              </select>
            
              <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>    
          <div class="form-group mb-1">
              <label>Body:<sup>*</sup></label>
              <textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Add some text..."><?php echo $data['body']; ?></textarea>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          <input type="submit" class="btn btn-success mt-2" value="Submit">
        </form>
      </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
