
        <!-- Begin Page Content -->
        
        <div class="container rounded mt-5">
        <div class="card shadow">
        <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-dark"><?=$title;?></h5>
              </div>
    <div class="row">
    
        <div class="col-md-4 border-right">
        <?=form_open_multipart('customer/edit');?>
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="img-thumbnail rounded-circle text-center mt-5" src="<?=base_url('assets/dp/').$user['image'];?>" width="190px">
            <span></br>
            <input type="file" id="image" name="image">
           </span>
           </div>
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
                    <div class="col-md-12"><input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?=$user['name'];?>">
                    <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?=$user['email'];?>">
                    <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                    <div class="col-md-6"><input type="text" class="form-control" id="phone" name="phone" value="<?=$user['phone'];?>" placeholder="Phone Number">
                    <?= form_error('phone','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><input type="text" class="form-control"  id="address" name="address" placeholder="Address" value="<?=$user['address'];?>">
                    <?= form_error('address','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
                </div>
                <div class="mt-5 text-right"><button class="btn btn-outline-danger" type="submit">Save Profile</button></div>
            </div>
        </div>
        </form>
        
    </div>
    
</div>
</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->