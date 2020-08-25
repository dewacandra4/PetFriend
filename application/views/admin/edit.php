
        <!-- Begin Page Content -->
        
        <div class="container rounded mt-5 mb-4">
        <div class="card shadow">
        <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-dark"><?=$title;?></h5>
              </div>
    <div class="row">
    
        <div class="col-md-4 border-right">
        <?=form_open_multipart('admin/dashboard/edit');?>
            <div class="d-flex flex-column align-items-center p-3 py-2">
                <img class="img-thumbnail rounded-circle text-center mt-5"  style="max-width:200px; height:200px;" src="<?=base_url('assets/dp/').$user['image'];?>" >
                <!-- <div class="text-center">
                    <input type="file" id="image" name="image">
                </div> -->
                <p></p>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
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
                    <label class="ml-3 mb-3" for="Username"><strong>Username : </strong><?=$user['username'];?></label>
                    <label class="ml-3 mb-3" for="Email"><strong>Email : </strong><?=$user['email'];?></label>
                    </div>
                    <div class="row mt-3">
                    <div class="col-md-12"><input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?=$user['name'];?>">
                        <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 fix2"><input type="text" class="form-control fix" id="phone" name="phone" value="<?=$user['phone'];?>" placeholder="Phone Number">
                        <?= form_error('phone','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><input type="text" class="form-control"  id="address" name="address" placeholder="Address" value="<?=$user['address'];?>">
                        <?= form_error('address','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                    </div>
                    <div class="mt-5 text-right"><button class="btn btn-outline-primary" type="submit">Save Profile</button></div>
                </div>
            </div>
        </form>
        
    </div>
    
</div>
</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->