<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="mx-auto container text-center"><?php flash('login_success'); ?></div>

<?php include APPROOT . '/views/inc/showcase.php'; ?>
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-3">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-2">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            SmartPhones
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="<?=URLROOT?>/phones/new">Brand New</a></li>
                            <li><a class="text-decoration-none" href="<?=URLROOT?>/phones/secondhand">2ndHand</a></li>
                            <li><a class="text-decoration-none" href="<?=URLROOT?>/phones/londonused">London Used</a></li>
                        </ul>
                    </li>
                    <li class="pb-2">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Accessories
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Chargers</a></li>
                            <li><a class="text-decoration-none" href="#">Bluetooth Devices</a></li>
                            <li><a class="text-decoration-none" href="#">Power Bank</a></li>
                            <li><a class="text-decoration-none" href="#">Tripods</a></li>
                            <li><a class="text-decoration-none" href="#">Memory Card</a></li>
                        </ul>
                    </li>
                    <li class="pb-2">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Repair Parts
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">LCD</a></li>
                            <li><a class="text-decoration-none" href="#">Batteries</a></li>
                            <li><a class="text-decoration-none" href="#">Working Panels</a></li>
                            <li><a class="text-decoration-none" href="#">Cameras</a></li>
                            <li><a class="text-decoration-none" href="#">Sim Tray</a></li>
                            <li><a class="text-decoration-none" href="#">Back Cover</a></li>
                            <li><a class="text-decoration-none" href="#">Power Switch</a></li>
                            <li><a class="text-decoration-none" href="#">Down Boards</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

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
                </div>
                <div class="row">
                <?php foreach($data['products'] as $product) : ?>
                    <div class="col-6 col col-md-3">
                        <div class="card mb-3 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="<?php echo URLROOT . '/' . $product->img; ?>" style="height 80px;">
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
