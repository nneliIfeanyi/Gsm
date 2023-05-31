<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container p-2">
<p class="h5 lh-1">Welcome to <span class="text-success fw-bold">Stanvic</span> online shop</p>
</div>
<?php include APPROOT . '/views/inc/showcase.php'; ?>

    <!-- Start Content -->
<div class="container py-3">
    <div class="row">
<?php include APPROOT . '/views/inc/nav.php'; ?>
        <div class="col-lg-9">

    <div class="mx-auto mt-2 container text-center"><?php flash('login_success'); ?></div>
    <div class="mx-auto mt-2 container text-center"><?php flash('search_msg'); ?></div>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pt-1">
                        <li class="list-inline-item">
                            <h4 class="text-success"><?=$data['title']?></h4>
                        </li>
                    </ul>

                    <small class="fs-6"><span class="fw-bold fs-6">Search hint : </span><span class="fs-6">Just type in <span class="text-success">"Tecno"</span> for all Tecno products or <span class="text-success">"infinix"</span> or <span class="text-success">"samsung"</span> etc</span></small>
                </div>
                <div class="col-md-6 pb-4">
                    <?php include APPROOT . '/views/inc/search.php'; ?>
                </div>
            </div>

            <?php include APPROOT . '/views/inc/sample.php'; ?>
           
        </div>
    </div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
