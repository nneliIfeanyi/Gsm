<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="mx-auto"><?php flash('login_success'); ?></div>
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

           <?php include APPROOT . '/views/phones/inc.php' ?>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <h2 class="text-success"><?=$data['title']?></h2>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pb-4">
                        <div class="d-flex">
                            <select class="form-control">
                                <option>Search</option>
                                <option>A to Z</option>
                                <option>Item</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-2 text-center"><?= flash('success')?></div>
                </div>
                <div class="row">
                <?php foreach($data['products'] as $product) : ?>
                    <div class="col-6 col-md-3">
                        <div class="card mb-3 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="<?php echo URLROOT . '/' . $product->img; ?>" >
                            </div>
                            <div class="card-body lh-1 fs-6">
                            <a href="<?=URLROOT?>/users/view_p/<?=$product->id?>" class="h3 text-decoration-none">
                                 <p class="text-center mb-0">&#8358;<?php echo $product->price; ?>.00</p>
                                <?php echo $product->brand . ' ' . $product->model; ?>
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
                               
                            </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
