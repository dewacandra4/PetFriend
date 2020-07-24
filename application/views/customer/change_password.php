
<!-- Begin Page Content -->
<div class="col-lg-10 py-5 mx-auto">

<!-- Illustrations -->
<div class="card shadow ml-2 mt-2 mb-0">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-dark"><?=$title;?></h5>
    </div>
    <div class="card-body py-5">
        <div class="text-center">
        </div>
        <div class="row mb-2"> 
            <div class="mx-auto col-lg-10">
                <?= $this->session->flashdata('message');?>
                <form action="<?= base_url('customer/change_password');?>" method="post">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        <?= form_error('current_password','<small class="text-danger pl-0">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="new_password1">New Password</label>
                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                        <?= form_error('new_password1','<small class="text-danger pl-0">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="new_password2">Repeat New Password</label>
                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                        <?= form_error('new_password2','<small class="text-danger pl-0">','</small>');?>
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-outline-danger">Change Password</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

