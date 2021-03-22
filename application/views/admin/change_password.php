
<!-- Begin Page Content -->
<div class="col-lg-7 py-5 mx-auto">

<!-- Illustrations -->
<div class="card shadow mt-5 mb-0">
    <div class="card-header py-4">
        <h5 class="m-0 font-weight-bold text-dark ml-4"><?=$title;?></h5>
    </div>
    <div class="card-body py-5">
        <div class="row"> 
            <div class="mx-auto col-lg-7">
                <?= $this->session->flashdata('message');?>
                <form action="<?= base_url('admin/dashboard/change_password');?>" method="post">
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control form-password" id="current_password" name="current_password">
                        <?= form_error('current_password','<small class="text-danger pl-0">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="new_password1">New Password</label>
                        <input type="password" class="form-control form-password" id="new_password1" name="new_password1">
                        <?= form_error('new_password1','<small class="text-danger pl-0">','</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="new_password2">Repeat New Password</label>
                        <input type="password" class="form-control form-password" id="new_password2" name="new_password2">
                        <?= form_error('new_password2','<small class="text-danger pl-0">','</small>');?>
                    </div>
                    <div class="form-check ml-2">
                      <input type="checkbox" class="form-check-input form-checkbox">
                      <label class="form-check-label">Show Password</label>
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-outline-primary">Change Password</button>
                    </div>
                </form>
            </div>       
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

