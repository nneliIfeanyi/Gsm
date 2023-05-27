<?php require APPROOT . '/views/inc/header.php'; ?>

    <!-- Start Content -->
    <div class="container py-3">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 text-center">About Us</h1>
               <!-- <ul class="list-unstyled templatemo-accordion ">
                    <li class="pb-1">
                        <a class="collapsed d-flex justify-content-between h4 text-decoration-none" href="#">
                            Who we are
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Know Us</a></li>
                        </ul>
                    </li>
                    <li class="pb-1">
                        <a class="collapsed d-flex justify-content-between h4 text-decoration-none" href="#">
                            Our Services
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Delivery Services</a></li>
                        </ul>
                    </li>
                    <li class="pb-1">
                        <a class="collapsed d-flex justify-content-between h4 text-decoration-none" href="#">
                            Promotions
                            <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul id="collapseThree" class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Discounts</a></li>
                        </ul>
                    </li>
                </ul>-->
            </div>

            <div class="col-lg-9 text-center">
                  <h2 class="text-success"> <?=$data['title']?></h2>
                    <p class="lead"><?=$data['description']?></p>
                
                <div class="m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                                <i class="text-light fa fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-4 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="<?php echo URLROOT; ?>/img/infinix.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-4 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="<?php echo URLROOT; ?>/img/samsung.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-4 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="<?php echo URLROOT; ?>/img/download.png" alt="Brand Logo"></a>
                                            </div>
                            
                                        </div>
                                    </div>
                                    <!--End First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-4 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="<?php echo URLROOT; ?>/img/oppo.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-4 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="<?php echo URLROOT; ?>/img/vivo.jpeg" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-4 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="<?php echo URLROOT; ?>/img/itel.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Second slide-->

                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                                <i class="text-light fa fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    <!--End Brands-->
</div>
</div>
  
<?php require APPROOT . '/views/inc/footer.php';?>