<div class="container mb-5">
<?php if (validation_errors()) : ?>
<div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
<?php endif; ?>
<?= $this->session->flashdata('message');?>
<?= $this->session->flashdata('error');?>
    <div class="card shadow px-0 mb-5 mt-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-dark text-center ml-4">Products Order List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-bootstrap" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead class="text-center">
                        <tr>
                            <th>NO</th>
                            <th >Product Order Id</th>
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
                    
                        foreach($order as $product) {?>
                        <tr>
                            <td><?= ++$start?></td>
                            <td><?= $product['order_id']?></td>
                            <td><?= date('Y/m/d H:i:s', $product['order_date']);?></td>
                            <td><?= $product['order_status']?></td>
                            <td><?= $product['user_id']?></td>
                            <td><?= $product['payment_method']?></td>
                            <td>RM <?= $product['total_price']?></td>
                            <td>
                            <div class="text-center">
                                <div class="d-inline-flex p-0">
                                    <?= anchor('admin/list_order/view_detail/'.$product['order_id'],'<div class="btn btn-deep-orange btn-sm text-light"><i class="fas fa-search-plus"></i></div>')?>
                                    <a 
                                        href="javascript:;"
                                        data-order_id="<?php echo $product['order_id'] ?>"
                                        data-order_status="<?php echo $product['order_status'] ?>"
                                        data-toggle="modal" data-target="#confirm">
                                        <button class="btn btn-primary btn-sm text-light" data-toggle="modal" data-target="#ubah-data"> Confirm</button></a>
                                    <a 
                                        href="javascript:;"
                                        data-order_id="<?php echo $product['order_id'] ?>"
                                        data-order_status2="<?php echo $product['order_status'] ?>"
                                        data-toggle="modal" data-target="#complete">
                                        <button class="btn btn-success btn-sm text-light" data-toggle="modal" data-target="#edit-data"><i class="fas fa-check"></i></button></a>
                                </div>
                            </div>
                            </td>               
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<?php 
    foreach($order as $pro):
        $order_id= $pro['order_id'];
        $order_status= $pro['order_status'];
    ?>
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <div class="modal-content">
            <div class="modal-header text-white  d-flex justify-content-center bg-primary">
                <h5 class="modal-title" id="modal">Confirm Order</h5>
            </div>
                <form class="form-horizontal text-center" action="<?php echo base_url('admin/list_order/confirm_order');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="order_status">Current Status</label>
                        <input class="form-control mb-4" type="text" id="order_status" name="order_status" disabled value="<?php echo $order_status;?>">
                    </div>
                        <div class="form-group">
                        <label for="order_status">Change Status</label>
                        <input type="hidden" id="order_id" name="order_id" value="<?php echo $order_id;?>">
                            <select class="browser-default custom-select mb-4" id="order_status" name="order_status" >
                                <option value="" disabled selected>Choose Status</option>
                                <option value="On Process" >On Process</option>
                                <option value="Awaiting Payment"  >Awaiting Payment</option>
                            </select>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit"> Save&nbsp;</button>
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
    foreach($order as $pro):
        $order_id= $pro['order_id'];
        $order_status= $pro['order_status'];
?>


<!--Modal: modalPush-->
<div class="modal fade" id="complete" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content text-center">
        <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-success">
                <p class="heading"><strong>Complete The Order</strong></p>
            </div>

        <!--Body-->
            <div class="modal-body">

                <i class="fas fa-check fa-5x text-success animated jackInTheBox mb-4"></i>
                <div class="form-group ">
                    <div class="text-center">
                        <form action="<?php echo base_url('admin/list_order/complete_order');?>" method="post">
                            <p>Do you want to complete this order ID#<strong id="order_id"><?php echo $order_id;?></strong>?</p>
                            <input type="hidden" id="order_id" name="order_id" value="<?php echo $order_id;?>"> 
                        
                    </div>
                </div>
            
            <hr/>
            <!--Footer-->
            
            <div class="text-center">
                <button class="btn btn-success" type="submit"> Yes&nbsp;</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel</button>
            </div>
            </div>
            </form>
        </div>
        <!--/.Content-->
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
            modal.find('#order_id').attr("value",div.data('order_id'));
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
            modal.find('#order_id').attr("value",div.data('order_id'));
            modal.find('#order_id').html(div.data('order_id'));
            modal.find('#order_status2').attr("value",div.data('order_status'));
        });
    });
</script>
</div>