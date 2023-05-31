<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="mx-auto"><?php flash('login_success'); ?></div>
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

           <?php include APPROOT . '/views/inc/nav.php'; ?>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <h2 class="text-success"><?=$data['title']?></h2>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="mt-2 text-center"><?= flash('success')?></div>
                </div>

                <?php include APPROOT . '/views/inc/sample.php'; ?>

            </div>
        </div>
    </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
