<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
.cssmarquee {
height: 50px;
overflow: hidden;
position: relative;
}
.cssmarquee h1 {
font-size: 1.2em;
position: absolute;
width: 100%;
height: 100%;
margin: 0;
line-height: 50px;
text-align: center;
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
<h1>Welcome to <span class="text-success"><?=SITENAME?></span> GSM market</h1>
</div>

<?php include APPROOT . '/views/inc/showcase.php'; ?>

    <!-- Start Content -->
<div class="container py-3">
    <div class="row">

        <div class="col">

            <div class="row">

                <div class="col-12 col-md-6">
                    <ul class="list-inline shop-top-menu pt-1">
                        <li class="list-inline-item">
                            <h4 class="text-success"><?=$data['title']?></h4>
                        </li>
                    </ul>
                </div>
               
                <div class="col-12 col-md-6">
                    <?php include APPROOT . '/views/inc/search.php'; ?>
                </div>
                

                <div class="mx-auto mt-2 container text-center"><?php flash('success'); ?></div>
                <div class="mx-auto mt-2 container text-center"><?php flash('search_msg'); ?></div>
            </div>

            <?php include APPROOT . '/views/inc/sample.php'; ?>
            <div class="col-12 mb-2">
             <a href="<?php echo URLROOT; ?>/pages/uploads" style="width: 100%;" class="btn btn-block btn-success">View More</a>
            </div>
        </div>

            <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h2">Categories of The Month</h1>
                <!--<p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>-->
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 ">
                <a href="<?php echo URLROOT; ?>/phones/iphones"><img src="<?php echo URLROOT; ?>/img/fones3.jpg" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">iPhones</h5>
                <p class="text-center"><a href="<?php echo URLROOT; ?>/phones/iphones" class="btn btn-success">Go Shop</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 ">
                <a href="<?php echo URLROOT; ?>/accessories/power"><img src="<?php echo URLROOT; ?>/img/pwr2.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Power Banks</h2>
                <p class="text-center"><a href="<?php echo URLROOT; ?>/accessories/power" class="btn btn-success">Go Shop</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 ">
                <a href="<?php echo URLROOT; ?>/accessories/bluetooth"><img src="<?php echo URLROOT; ?>/img/pods.png" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Ear Pods</h2>
                <p class="text-center"><a href="<?php echo URLROOT; ?>/accessories/bluetooth" class="btn btn-success">Go Shop</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->

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



<?php require APPROOT . '/views/inc/footer.php'; ?>
