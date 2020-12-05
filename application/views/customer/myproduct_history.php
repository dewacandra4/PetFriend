<div class="container mb-5">
<?php if (validation_errors()) : ?>
<div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
<?php endif; ?>
<?= $this->session->flashdata('message');?>
    <div class="card shadow px-0 mb-5 mt-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-dark text-center ml-4">My Products Order History</h5>
        </div>
        <div class="card-body mb-5">
            <div class="table-responsive">
                <table id="table-bootstrap-history" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead class="text-center">
                        <tr>
                            <th>NO</th>
                            <th >Product Order Id</th>
                            <th >Order Date</th>
                            <th>Delivery Date</th>
                            <th >Finish Date</th>
                            <th >Order Status</th>
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
                            <td><?= date('Y-m-d H:i:s', $product['order_date']);?></td>
                            <td><?php 
                            if(empty(($product['delivery_date'])))
                            {
                                echo "-";
                            }
                            else
                            {
                                echo date('Y-m-d H:i:s', $product['delivery_date']);
                            }
                            ?></td>
                            <td><?php 
                            if($product['finish_date'] == 0)
                            {
                                echo "-";
                            }
                            else
                            {
                                echo $product['finish_date'];
                            }
                            ?></td>
                            <td><?= $product['order_status']?></td>
                            <td>RM <?= $product['total_price']?></td>
                            <td>
                            <div class="text-center">
                                <div class="d-inline-flex p-0">
                                    <?= anchor('customer/historyp/view_reciept/'.$product['order_id'],'<div class="btn btn-success"><i class="fa fa-info-circle" aria-hidden="true"></i>
                     Detail</div>')?>
                     <?php if($product['order_status']=="Cancelled") : ?>
                     <?= anchor('customer/historyp/re_order/'.$product['order_id'],'<div class="btn btn-warning"><i class="fa fa-shopping-basket" aria-hidden="true"></i>
                     Re-Order</div>')?>
                     <?php endif?>
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

