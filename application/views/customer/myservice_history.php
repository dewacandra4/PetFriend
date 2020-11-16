<div class="container mb-5">
<?php if (validation_errors()) : ?>
<div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
<?php endif; ?>
<?= $this->session->flashdata('message');?>
    <div class="card shadow px-0 mb-5 mt-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-dark text-center ml-4">Services Order History</h5>
        </div>
        <div class="card-body mb-5">
            <div class="table-responsive">
                <table id="table-bootstrap-services" class="table table-bordered table-hover" cellspacing="0" width="100%">
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
                            foreach($order as $service) {?>
                        <tr>
                            <td><?= ++$start?></td>
                            <td><?= $service['sorder_id']?></td>
                            <td><?= date('Y/m/d H:i:s', $service['order_date']);?></td>
                            <td><?= $service['order_status']?></td>
                            <td><?= $service['user_id']?></td>
                            <td><?= $service['payment_method']?></td>
                            <td>RM <?= $service['total_price']?></td>
                            <td>
                            <div class="text-center">
                                <div class="d-inline-flex p-0">
                                    <?= anchor('customer/historys/view_reciept_service/'.$service['sorder_id'],'<div class="btn btn-success"><i class="fa fa-info-circle" aria-hidden="true"></i>
                     Detail</div>')?>
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
    <br>
</div>
</div>

