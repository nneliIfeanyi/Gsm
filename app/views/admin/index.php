<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="container py-5">
        <div class="row">

            <?php include APPROOT . '/views/admin/inc.php' ?>

            <div class="col-lg-9 text-center">
                <h2>Welcome  <span class="text-success"><?=$_SESSION['user_name']?></span></h2>
                <p>Showcase your products for sale</p>
            </div>
        </div>
    </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
