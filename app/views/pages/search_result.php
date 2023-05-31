<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container p-2">

    <div class="row">
        <div class="col-md-6">
            <ul class="list-inline shop-top-menu pb-2 pt-1">
                <li class="list-inline-item">
                    <h4 class="text-success"><?=$data['title']?></h4>
                </li>
            </ul>
        </div>
        <div class="col-md-6 pb-4">
           <?php include APPROOT . '/views/inc/search.php'; ?>
        </div>
    </div>

            <?php include APPROOT . '/views/inc/sample.php'; ?>
           
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
