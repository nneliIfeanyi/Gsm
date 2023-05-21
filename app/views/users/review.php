<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container p-3">
<div class="row">
<div class="col d-grid">
<ul class="list-group">
<li class="list-group-item p-2 active display-3" aria-current="true">Comfirm Shipping Detail</li>
<ul class="list-inline">
<li class="list-inline-item">
<h6>Name :</h6>
</li>
<li class="list-inline-item">
<p class="h3 py-2">Nneli Ifeanyi</p>
</li>
</ul>

<ul class="list-inline">
<li class="list-inline-item">
<h6>Phone number :</h6>
</li>
<li class="list-inline-item">
<p class="h3 py-2">Nneli Ifeanyi</p>
</li>
</ul>

<ul class="list-inline">
<li class="list-inline-item">
<h6>Address :</h6>
</li>
<li class="list-inline-item">
<p class="h3 py-2">Nneli Ifeanyi</p>
</li>
</ul>

</ul>

<div class="row pb-3">
<div class="col d-grid">
<a href="<?php echo URLROOT; ?>/users/view_p/<?= $data['id']?>" class="btn btn-success btn-lg">No, there's a mistake</a>
</div>
<div class="col d-grid">
<button type="submit" class="btn btn-success btn-lg">Yes it's me</button>
</div>
</div>
</div>
</div>
</div>





<?php require APPROOT . '/views/inc/footer.php'; ?>