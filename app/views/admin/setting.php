<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="container py-5">
        <div class="row">

            <?php include APPROOT . '/views/admin/inc.php' ?>

            <div class="col-lg-9">
                <h2 class="text-center">My Profile</h2>
                <div class="row">

                    <div class="col mx-auto bg-light rounded">
                        <div class="col-4 px-4 bg-primary mx-auto my-3">
                        <img class="card-img rounded-circle" src="" style="height: 150px;">
                        </div>
                        <div class="px-5">
                            <label>Name:</label>
                            <input readonly class="form-control form-control-lg"  value="sky">
                        
                            <label>Phone</label>
                            <input readonly class="form-control form-control-lg" value="sky">
                        
                            <label>Email:</label>
                            <input readonly class="form-control form-control-lg" value="sky">
                        
                            <label>Business Address:</label>
                            <input readonly class="form-control form-control-lg"  value="sky">
                        
                            <label>Change Password:</label>
                            <input readonly class="form-control form-control-lg" value="sky">
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
