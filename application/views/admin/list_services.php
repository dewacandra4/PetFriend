<div class="container">
<?php if (validation_errors()) : ?>
<div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
<?php endif; ?>
<?= $this->session->flashdata('message');?>
    <div class="card shadow px-0 mb-5 mt-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-dark text-center ml-4">Servicess Order List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-bootstrap" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead class="text-center">
                        <tr>
                            <th>NO</th>
                            <th >Service Order Id</th>
                            <th >Order Date</th>
                            <th >Order Status</th>
                            <th >Customer Id</th>
                            <th >Payment Method</th>
                            <th >Total Price</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    
                        foreach($sorder as $services) {?>
                        <tr>
                            <td><?= ++$start?></td>
                            <td><?= $services['sorder_id']?></td>
                            <td><?= date('d F yy', $services['order_date']);?></td>
                            <td><?= $services['order_status']?></td>
                            <td><?= $services['user_id']?></td>
                            <td><?= $services['payment_method']?></td>
                            <td>RM <?= $services['total_price']?></td>
                            <td>
                                <div class="d-flex p-2">
                                    <?= anchor('admin/list_sorder/view_detail/'.$services['sorder_id'],'<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>')?>
                                    <a 
                                    href="javascript:;"
                                    data-sorder_id="<?php echo $services['sorder_id'] ?>"
                                    data-order_status="<?php echo $services['order_status'] ?>"
                                    data-toggle="modal" data-target="#confirm">
                                    <button class="btn btn-primary btn-sm text-light" data-toggle="modal" data-target="#ubah-data"> Confirm Payment</button></a>

                                    <a 
                                    href="javascript:;"
                                    data-order_id="<?php echo $services['sorder_id'] ?>"
                                    data-order_status="<?php echo $services['order_status'] ?>"
                                    data-toggle="modal" data-target="#complete">
                                    <button class="btn btn-success btn-sm text-light" data-toggle="modal" data-target="#edit-data"><i class="fas fa-check"></i></button></a>
                                </div>
                            </td>               
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




<!-- Modal -->
<?php 
    foreach($sorder as $services):
        $sorder_id= $services['sorder_id'];
        $order_status= $services['order_status'];
    ?>
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="modal"
  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal">Confirm Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form class="form-horizontal text-center" action="<?php echo base_url('admin/list_sorder/confirm_payment');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="order_status">Current Status</label>
                        <input class="form-control mb-4" type="text" id="order_status" name="order_status" disabled value="<?php echo $order_status;?>">
                    </div>
                        <div class="form-group">
                        <label for="order_status">Change Status</label>
                            <input type="hidden" id="sorder_id" name="sorder_id" value="<?php echo $sorder_id;?>">
                                <select class="browser-default custom-select mb-4" id="order_status" name="order_status" >
                                    <option value="" disabled selected>Choose Status</option>
                                    <option value="Awaiting Payment"  >Awaiting Payment</option>
                                    <option value="On Process" >On Process</option>
                                </select>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit"> Save&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php endforeach;?>
<?php 
    foreach($sorder as $services):
        $sorder_id= $services['sorder_id'];
        $order_status= $services['order_status'];
    ?>
<div class="modal fade" id="complete" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal">Complete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form class="form-horizontal text-center" action="<?php echo base_url('admin/list_sorder/confirm_payment');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="order_status">Current Status</label>
                        <input class="form-control mb-4" type="text" id="order_status" name="order_status" disabled value="<?php echo $order_status;?>">
                    </div>
                    <hr>
                        <div class="">
                            <p>Do you want to complete this order ?</p>
                            <input type="hidden" id="sorder_id" name="sorder_id" value="<?php echo $sorder_id;?>">
                            <select class="browser-default custom-select mb-4" id="order_status" name="order_status" disabled>
                                <option value="Order Complete" selected>Order Complete</option>
                            </select>
                        </div>
                            <button class="btn btn-success" type="submit"> Yes&nbsp;</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php endforeach;?>
<!-- END Modal edit -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?= base_url()?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#confirm').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)
 
            // Isi nilai pada field
            modal.find('#sorder_id').attr("value",div.data('sorder_id'));
            modal.find('#order_status').attr("value",div.data('order_status'));
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#complete').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)
 
            // Isi nilai pada field
            modal.find('#sorder_id').attr("value",div.data('sorder_id'));
            modal.find('#order_status').attr("value",div.data('order_status'));
        });
    });
</script>

