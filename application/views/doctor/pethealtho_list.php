
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
  
  <!-- Begin Page Content -->
  <?php date_default_timezone_set('Asia/Singapore');?>
  <div class="container">
      <?= $this->session->flashdata('message'); ?>
        <!-- Illustrations -->
        <div class="card shadow">
          <div class="card-header py-4">
          <h5 class="m-0 font-weight-bold text-dark ml-4"><?=$title;?></h5>
        </div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Service Order ID</th>
                    <th scope="col">Customer Address</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($serviceo)) :?>
                  <div class="alert alert-warning" role="alert">
                  There is no Pet Health order assign to you yet ^^
                </div>
                <?php endif; ?>
                <?php $i = 1; ?>
                <?php foreach ($serviceo as $so): ?>
                    <tr>
                    <td><?php echo $i; ?></td>
                    <td><?= $so->sorder_id; ?></td>
                    <td><?= $so->customer_address; ?></td>
                    <td><?= date('d F yy', $so->order_date);?></td>
                    <td><?= $so->order_status?></td>
                    <td><?= anchor('doctor/dashboard/view_reciept_service/' .$so->sorder_id,'<div class="btn btn-success"><i class="fas fa-search-plus" aria-hidden="true"></i>
                     </div>')?>
                     || <?= anchor('doctor/dashboard/complete/'.$so->sorder_id,'<div class="btn btn-warning"><i class="fas fa-check-circle"></i>
                      </div>')?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                </table>
                <?= $this->pagination->create_links();?>
                </div>
              </div>
              </div>
          </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

