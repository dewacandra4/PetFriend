<div class="container">
<?php if (validation_errors()) : ?>
<div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
<?php endif; ?>
<?= $this->session->flashdata('message');?>
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
                            <td><?= date('d F yy', $product['order_date']);?></td>
                            <td><?= $product['order_status']?></td>
                            <td><?= $product['user_id']?></td>
                            <td><?= $product['payment_method']?></td>
                            <td>RM <?= $product['total_price']?></td>
                            <td>
                                <div class="d-flex p-2">
                                    <?= anchor('admin/list_order/view_detail/'.$product['order_id'],'<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>')?>
                                    <a 
                                        href="javascript:;"
                                        data-order_id="<?php echo $product['order_id'] ?>"
                                        data-order_status="<?php echo $product['order_status'] ?>"
                                        data-toggle="modal" data-target="#confirm">

                                        <button class="btn btn-primary btn-sm text-light" data-toggle="modal" data-target="#ubah-data"> Confirm Payment</button>
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
    foreach($order as $product):
        $order_id= $product['order_id'];
        $order_status= $product['order_status'];
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
            <form class="form-horizontal text-center" action="<?php echo base_url('admin/list_order/confirm_payment');?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="order_status">Current Status</label>
                    <input class="form-control mb-4" type="text" id="order_status" name="order_status" disabled value="<?php echo $order_status;?>">
                </div>
                    <div class="form-group">
                    <label for="order_status">Change Status</label>
                        <input type="hidden" id="order_id" name="order_id" value="<?php echo $order_id;?>">
                            <select class="browser-default custom-select mb-4" id="order_status" name="order_status" >
                                <option value="" disabled selected>Choose option</option>
                                <option value="Awaiting Payment"  >Awaiting Payment</option>
                                <option value="On Process" >On Process</option>
                                <option value="Payment Complete">Payment Complete</option>
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
</div>