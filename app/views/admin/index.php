<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container p-2">
<h2 class="h5">Welcome  <span class="text-success"><?=$_SESSION['user_name']?></span></h2>
<!--<p class="fs-6">A platform built for the people, not profits</p>-->
</div>
    <div class="container py-3">
        <div class="row">

            <?php include APPROOT . '/views/admin/inc.php' ?>

            <div class="col-lg-9 text-center">
                
                <p class="text-center h2">Showcase your products for sale</p>
            </div>
        </div>
    </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
