<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
.cssmarquee {
height: 50px;
overflow:hidden;
position: relative;
}
.cssmarquee h1 {
font-size: .7em;
position: absolute;
width: 100%;
height: 100%;
margin: 0;
line-height: 50px;
text-align: left;
transform:translateX(100%);
animation: cssmarquee 12s linear infinite;
}
@keyframes cssmarquee {
0% {
transform: translateX(100%);
}
100% {
transform: translateX(-100%);
}
}
</style>
 
<div class="cssmarquee">
<h1 class="text-success"><i class="fa fa-truck fa-s"></i>&nbsp;Free delivery only on Fridays for orders made before Friday...</h1>
</div>
   
<!-- Open Content -->
<section class="">
<div class="container pb-3">
<div class="row">
<div class="col-lg-5 mt-2">
<div class="card mb-2">
<img class="card-img img-fluid" src="<?= URLROOT. '/'. $data['product']->img ?>" id="product-detail">
</div>

<?php if (!empty($data['product']->img2) && !empty($data['product']->img3)) :?>
<div class="row">
        <!--Start Controls-->
        <div class="col-1 align-self-center">
            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                <i class="text-dark fa fa-chevron-left"></i>
                <span class="sr-only">Previous</span>
            </a>
        </div>
        <!--End Controls-->
        <!--Start Carousel Wrapper-->
        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
            <!--Start Slides-->
            <div class="carousel-inner product-links-wap" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-4">
                            <a href="#">
                                <img class="card-img" src="<?= URLROOT. '/'. $data['product']->img ?>" alt="Product Image 1" style="height: 100px;">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#">
                                <img class="card-img" src="<?= URLROOT. '/'. $data['product']->img2 ?>" alt="Product Image 2" style="height: 100px;">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#">
                                <img class="card-img" src="<?= URLROOT. '/'. $data['product']->img3 ?>" alt="Product Image 3" style="height: 100px;">
                            </a>
                        </div>
                    </div>
                </div>

                <!--/.First slide-->
            </div>
            <!--End Slides-->
        </div>
        <!--End Carousel Wrapper-->
        <!--Start Controls-->
        <div class="col-1 align-self-center">
            <a href="#multi-item-example" role="button" data-bs-slide="next">
                <i class="text-dark fa fa-chevron-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--End Controls-->
    </div>
<?php endif;?>
</div>


<div class="col-lg-7 mt-2">
<div class="card">
<div class="card-body lh-1">
<h1 class="h3"><?= $data['product']->brand ?></h1>
<ul class="list-inline lh-1">
<li class="list-inline-item">
<h6>Model :</h6>
</li>
<li class="list-inline-item">
<p class="text-muted"><strong><?= $data['product']->model?></strong></p>
</li>
</ul>
<ul class="list-inline lh-1">
<li class="list-inline-item">
<h6>Category :</h6>
</li>
<li class="list-inline-item">
<p class="text-muted"><strong><?= $data['product']->category?></strong></p>
</li>
</ul>
<ul class="list-inline lh-1">
<li class="list-inline-item">
<h6>Sub_Category :</h6>
</li>
<li class="list-inline-item">
<p class="text-muted"><strong><?= $data['product']->sub_cate?></strong></p>
</li>
</ul>
<ul class="list-inline lh-1">
<li class="list-inline-item">
<h6>Condition :</h6>
</li>
<li class="list-inline-item">
<p class="text-muted"><strong><?= $data['product']->cond_tion ?></strong></p>
</li>
</ul>
<ul class="list-inline lh-1">
<li class="list-inline-item">
<h6>Description :</h6>
</li>
<li class="list-inline-item">
<p class="text-muted"><strong><?= $data['product']->description ?></strong></p>
</li>
</ul>
<ul class="list-inline lh-1">
<li class="list-inline-item">
<h6>Color :</h6>
</li>
<li class="list-inline-item">
<p class="text-muted"><strong><?= $data['product']->color ?></strong></p>
</li>
</ul>
<ul class="list-inline">
<li class="list-inline-item">
<h6>Price :</h6>
</li>
<li class="list-inline-item">
<p class="text-success fw-bold"><strong>&#8358;<?= $data['product']->price ?>.00</strong></p>
</li>
</ul>
</div>
</div>
<div class=" bg-light mb-3">
<p class="lead fw-bold px-3">Seller Info</p> 
<div class="row">
<div class="col-4 px-4">
<img class="card-img rounded-circle" src="<?= URLROOT. '/'. $data['seller']->img ?>" style="height: 70px;">
</div>
<div class="col-8 lh-1 p-2 mb-2">
<p class="text-success text-muted"><?= $data['seller']->name ?></p>
<p class="fs-6"><i class="fa fa-map-marker fa-sm"></i> <?= $data['seller']->address ?>.</p>
<p class="fs-6"><i class="fa fa-truck fa-sm"></i> Delivery services available</p>
</div>
</div>

<div class="row">
<div class="col d-grid">
<a href="https://wa.me/8122321931?text=I%20am%20interested%20in%20buying%20this%20<?=URLROOT.'/'.'users'.'/'.'view_p'.'/'.$data['product']->id?>" class="btn btn-success btn-block"><i class="fa fa-whatsapp fa-fw"></i>Whatsapp</a>
</div>
<div class="col d-grid">
<a href="tel:08122321931" class="btn btn-outline-success btn-block"><i class="fa fa-phone fa-fw"></i>Call Now</a>
</div>
</div>

</div>
</div>
    




<div class="mt-3">
<p class="lead h4 text-center fw-bold py-2">Other Products By <span class="text-success"><?= $data['seller']->name ?></span></p> 
 <div class="row">
    <?php foreach($data['sellerGoods'] as $product) : ?>
        <div class="col-6 col-md-3">
            <div class="card mb-3 product-wap rounded-0">
                <div class="card rounded-0">
                    <img class="card-img rounded-0" src="<?php echo URLROOT . '/' . $product->img; ?>" style="height :90px;">
                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                        <ul class="list-unstyled">
                            <li><a class="btn btn-success text-white" href="<?=URLROOT?>/users/view_p/<?=$product->id?>">More</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body lh-1 fs-6">
                <a href="<?=URLROOT?>/users/view_p/<?=$product->id?>" class="h3 text-decoration-none">
                    <?php echo $product->brand . ' ' . $product->model; ?>
                    <p class="badge bg-secondary fs-6"><?=$product->cond_tion?></p>
                     <p class="text-center text-success"><b>&#8358;<?php echo $product->price; ?>.00</b></p>
                </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
 </div>
</div>

 <?php include APPROOT . '/views/inc/nav.php'; ?>
      <div class="py-3 col-lg-9 bg-light mb-3">
        <div class="row text-center">
            <div class="col-lg-6 m-auto">
                <img src="<?php echo URLROOT; ?>/img/cart.png" style="height: 100px;width: 150px;filter: invert(5.9%);">
                <h1 class="h2 mt-2">We Run Errands</h1>
                 <p>
                    Couldn't find what you are looking for? Send us to the market.
                </p>
                <form action="<?php echo URLROOT; ?>/users/errands" class="form-inline" method="post">
                   
                 <div class="form-group mb-3">
                      <textarea name="body" class="form-control form-control-lg" placeholder="your message here..."></textarea>
                  </div>
                      <input type="submit" class="btn btn-success btn-block" value="Submit">
                </form>
            </div>
            </div>
        </div>
</div>
</div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
