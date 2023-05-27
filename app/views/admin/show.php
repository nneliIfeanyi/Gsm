<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">

    <div class="row">
    <?php include APPROOT . '/views/admin/inc.php' ?>
        <div class="col-md-9 mb-5 mx-auto">
            <div class="row">
            <div class="mt-2 text-center"><?= flash('success')?></div>
                <h4 class="display-6 text-center">All Products</h4>
                 <div class="mt-2 text-center"><?= flash('msg')?></div>
            <?php foreach($data['products'] as $product) : ?>
                 <div class="col-md-4">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0" height="140" src="<?php echo URLROOT . '/' . $product->img; ?>">
                        </div>
                        <div class="card-body">
                            <a href="shop-single.html" class="h3 text-decoration-none"><?php echo $product->brand . ' ' . $product->model; ?></a>
                    <!--<ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                        <li>M/L/X/XL</li>
                        <li class="pt-2">
                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                        </li>
                    </ul>
                    <ul class="list-unstyled d-flex justify-content-center mb-1">
                        <li>
                            <i class="text-warning fa fa-star"></i>
                            <i class="text-warning fa fa-star"></i>
                            <i class="text-warning fa fa-star"></i>
                            <i class="text-muted fa fa-star"></i>
                            <i class="text-muted fa fa-star"></i>
                        </li>
                    </ul>-->
                    <p class="text-center mb-0">&#8358;<?php echo $product->price; ?>.00</p>
                    <div class="row mb-2">
                        <div class="col">
                        <p class=" text-center"><a class="btn btn-success text-white" href="<?=URLROOT?>/admin/edit/<?=$product->id?>">Edit</a></p>
                        </div>
                        <div class="col">
                        <form class="pull-right" action="<?php echo URLROOT; ?>/admin/delete/<?php echo $product->id; ?>" method="post">
                        <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                        </div>
                    </div>
                    
                
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>