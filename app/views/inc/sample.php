<div class="row">
    <?php foreach($data['products'] as $product) : ?>
        <div class="col-6 col-md-3 col-lg-3">
            <div class="card mb-3 product-wap rounded-0">
                <div class="card rounded-0">
                    <img class="card-img rounded-0" src="<?php echo URLROOT . '/' . $product->img; ?>" style="height :118px;">
                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                        <ul class="list-unstyled">
                            <li><a class="btn btn-success text-white" href="<?=URLROOT?>/users/view_p/<?=$product->id?>">More</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body lh-1 fs-6">
                <a href="<?=URLROOT?>/users/view_p/<?=$product->id?>" class="h3 text-decoration-none">
                    <?php echo $product->brand . ' ' . $product->model; ?><br><span class="fs-6 text-muted"><?php echo $product->sub_cate?></span>
                    <p class="bg-secondary  badge fs-6"><?=$product->cond_tion .'_'.  $product->color?></p>

                     <p class="text-center text-success"><b>&#8358;<?php echo $product->price; ?>.00</b></p>
                </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>