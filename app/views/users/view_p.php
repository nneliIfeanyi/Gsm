<?php require APPROOT . '/views/inc/header.php'; ?>

   
<!-- Open Content -->
<section class="bg-light">
<div class="container pb-5">
<div class="row">
<div class="col-lg-5 mt-2">
<div class="card mb-3">
<img class="card-img img-fluid" src="<?= URLROOT. '/'. $data['product']->img ?>" alt="Card image cap" id="product-detail">
</div>
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
<img class="card-img img-fluid" src="<?= URLROOT. $data['product']->img ?>" alt="Product Image 1">
</a>
</div>
<div class="col-4">
<a href="#">
<img class="card-img img-fluid" src="<?= URLROOT. $data['product']->img ?>" alt="Product Image 2">
</a>
</div>
<div class="col-4">
<a href="#">
<img class="card-img img-fluid" src="<?= URLROOT. $data['product']->img ?>" alt="Product Image 3">
</a>
</div>
</div>
</div>
<!--/.First slide-->

<!--Second slide
<div class="carousel-item">
<div class="row">
<div class="col-4">
<a href="#">
<img class="card-img img-fluid" src="assets/img/product_single_04.jpg" alt="Product Image 4">
</a>
</div>
<div class="col-4">
<a href="#">
<img class="card-img img-fluid" src="assets/img/product_single_05.jpg" alt="Product Image 5">
</a>
</div>
<div class="col-4">
<a href="#">
<img class="card-img img-fluid" src="assets/img/product_single_06.jpg" alt="Product Image 6">
</a>
</div>
</div>
</div>
Second slide-->

<!--Third slide
<div class="carousel-item">
<div class="row">
<div class="col-4">
<a href="#">
<img class="card-img img-fluid" src="assets/img/product_single_07.jpg" alt="Product Image 7">
</a>
</div>
<div class="col-4">
<a href="#">
<img class="card-img img-fluid" src="assets/img/product_single_08.jpg" alt="Product Image 8">
</a>
</div>
<div class="col-4">
<a href="#">
<img class="card-img img-fluid" src="assets/img/product_single_09.jpg" alt="Product Image 9">
</a>
</div>
</div>
</div>
Third slide-->
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
</div>
<!-- col end -->
<div class="col-lg-7 mt-5">
<div class="card">
<div class="card-body">
<h1 class="h3"><?= $data['product']->brand ?></h1>
<ul class="list-inline">
<li class="list-inline-item">
<h6>Model :</h6>
</li>
<li class="list-inline-item">
<p class="text-muted"><strong><?= $data['product']->model?></strong></p>
</li>
</ul>
<ul class="list-inline">
<li class="list-inline-item">
<h6>Condition :</h6>
</li>
<li class="list-inline-item">
<p class="text-muted"><strong><?= $data['product']->cond_tion ?></strong></p>
</li>
</ul>
<ul class="list-inline">
<li class="list-inline-item">
<h6>Description :</h6>
</li>
<li class="list-inline-item">
<p class="text-muted"><strong><?= $data['product']->description ?></strong></p>
</li>
</ul>
<ul class="list-inline">
<li class="list-inline-item">
<h6>Price :</h6>
</li>
<li class="list-inline-item">
<p class=""><strong>&#8358;<?= $data['product']->price ?>.00</strong></p>
</li>
</ul>
<p class="h3 py-2"></p>

<form action="<?php echo URLROOT; ?>/users/review" method="POST">
<input type="hidden" name="id" id="quantity" value="<?=$data['product']->id?>">
<input type="hidden" name="brand" value="<?=$data['product']->brand?>">
<input type="hidden" name="model" value="<?=$data['product']->model?>">
<input type="hidden" name="desc" value="<?=$data['product']->description?>">
<input type="hidden" name="picture" value="<?=$data['product']->img?>">
<input type="hidden" name="price" value="<?=$data['product']->price?>">
<input type="hidden" name="color" value="<?=$data['product']->color?>">
<input type="hidden" name="condition" value="<?=$data['product']->cond_tion?>">
<input type="hidden" name="user" value="<?=$_SESSION['user_name']?>">
<input type="hidden" name="u_id" value="<?=$_SESSION['user_id']?>">
<div class="row">
<div class="col-auto">
<ul class="list-inline pb-3">
<p>Select Quantity</p> 
<li class="list-inline-item text-right">
Quantity
<input type="number" id="quantity" name="quantity" style="width: 16%; border: 3px solid grey;border-radius:25%;" value="1" min="1" class="">
</li>
</ul>
</div>
<div class="col-auto">
<ul class="list-inline pb-3">
<p>Select Color</p> 
<li class="list-inline-item text-right">
<label for="red">Red</label>
<input type="radio" id="red" name="color" class="">
<label for="grey">Grey</label>
<input type="radio" id="grey" name="color" class="">
<label for="black">black</label>
<input type="radio" id="black" name="color" class="">
</li>
</ul>
</div>
</div>
<div class="row pb-3">
<div class="col d-grid">
<button type="submit" class="btn btn-success btn-lg">Buy now</button>
</div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
