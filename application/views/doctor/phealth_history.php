
  <!-- Custom fonts for this template-->
  <link href="<?= base_url()?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?= base_url()?>assets/css/mdb.min.css" rel="stylesheet">


  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>assets/img/logo_sm.png">
  <!-- Custom styles for this template-->
  <link href="<?= base_url()?>assets/sbadmin/css/sb-admin-2.css" rel="stylesheet">
  <link href="<?= base_url()?>assets/css/addons/datatables.min.css" rel="stylesheet">

<div class="container mb-5">
<?php if (validation_errors()) : ?>
<div class="alert alert-danger text-center alert-dismissible fade show" role="alert"><?= validation_errors(); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>                
<?php endif; ?>
<?= $this->session->flashdata('message');?>
    <div class="card shadow px-0 mb-5 mt-5" >
        <div class="card-header py-4">
            <h5 class="m-0 font-weight-bold text-dark text-center ml-4">Pet Health Order History</h5>
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
                            <th >Customer Address</th>
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
                            <td><?= $service['customer_address']?></td>
                            <td><?= $service['payment_method']?></td>
                            <td>RM <?= $service['total_price']?></td>
                            <td>
                            <div class="text-center">
                                <div class="d-inline-flex p-0">
                                <?= anchor('doctor/dashboard/view_reciept_service/' .$service['sorder_id'],'<div class="btn btn-success"><i class="fas fa-search-plus" aria-hidden="true"></i>
                     </div>')?>
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




