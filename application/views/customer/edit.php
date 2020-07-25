
        <!-- Begin Page Content -->
        
        <div class="container rounded mt-5">
        <div class="card shadow">
        <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-dark"><?=$title;?></h5>
              </div>
    <div class="row">
    
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="<?=base_url('assets/dp/').$user['image'];?>" width="130"><span class="font-weight-bold"><?=$user['name'];?></span><span class="text-black-50">john_doe12@bbb.com</span><span>United States</span></div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                        <h6></h6>
                    </div>
                    <h6 class="text-right"></h6>
                </div>
                <div class="row mt-2">
                <label class="ml-3 mb-3" for="Username">Username : <?=$user['username'];?></label>
                    <div class="col-md-12"><input type="text" class="form-control"  placeholder="first name" value="<?=$user['name'];?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Email" value="john_doe12@bbb.com"></div>
                    <div class="col-md-6"><input type="text" class="form-control" value="+19685969668" placeholder="Phone number"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="address" value="D-113, right avenue block, CA,USA"></div>
                    <div class="col-md-6"><input type="text" class="form-control" value="USA" placeholder="Country"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" placeholder="Bank Name" value="Bank of America"></div>
                    <div class="col-md-6"><input type="text" class="form-control" value="043958409584095" placeholder="Account Number"></div>
                </div>
                <div class="mt-5 text-right"><button class="btn btn-outline-danger" type="button">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

