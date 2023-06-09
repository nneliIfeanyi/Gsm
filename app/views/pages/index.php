<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container p-2">
<p class="h5">Welcome to <span class="text-success fw-bold"><?=SITENAME?></span> GSM market</p>
</div>
<?php include APPROOT . '/views/inc/showcase.php'; ?>

    <!-- Start Content -->
<div class="container py-3">
    <div class="row">
<?php include APPROOT . '/views/inc/nav.php'; ?>
        <div class="col-lg-9">

            <div class="row">
                <small class="fs-6"><span class="fw-bold fs-6">Search hint : </span><span class="fs-6">Just type in <span class="text-success">Apple</span> for all Apple products or <span class="text-success">infinix</span> or <span class="text-success">samsung</span> etc</span></small>
               
                <div class="col-12 py-3">
                    <?php include APPROOT . '/views/inc/search.php'; ?>
                </div>
                <div class="col-12">
                    <ul class="list-inline shop-top-menu pt-1">
                        <li class="list-inline-item">
                            <h4 class="text-success"><?=$data['title']?></h4>
                        </li>
                    </ul>
                </div>

                <div class="mx-auto mt-2 container text-center"><?php flash('success'); ?></div>
                <div class="mx-auto mt-2 container text-center"><?php flash('search_msg'); ?></div>
            </div>

            <?php include APPROOT . '/views/inc/sample.php'; ?>
           
        </div>
    </div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
