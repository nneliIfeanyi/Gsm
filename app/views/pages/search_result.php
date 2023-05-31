<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container p-2">
<p class="h5 lh-1">Welcome to <span class="text-success fw-bold">Stanvic</span> Gsm-village</p>
<!--<p class="fs-6">A platform built for the people, not profits</p>-->
</div>
<?php include APPROOT . '/views/inc/showcase.php'; ?>

    <!-- Start Content -->
<div class="container py-3">
    <div class="row">
<?php include APPROOT . '/views/inc/nav.php'; ?>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-2 pt-1">
                        <li class="list-inline-item">
                            <h2 class="text-success"><?=$data['title']?></h2>
                        </li>
                    </ul>
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
