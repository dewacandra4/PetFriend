
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
            <?= $this->session->flashdata('message'); ?>
            <?=form_open_multipart('customer/dashboard/upload_proofs');?>
                <div class="alert alert-success" role="alert">
                Upload the Payment Proof for service order with order id: #<?=$sorder_id;?>
                </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="payment_proofs">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div><br><br>
                    <input type="hidden" name="sorder_id" value="<?=$sorder_id;?>">
                    <button class="btn btn-success" type="submit"><i class="fas fa-file-upload"></i> Upload</button>
                    </form>
            </div>       
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

