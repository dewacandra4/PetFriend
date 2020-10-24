
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
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Service Order ID</th>
                    <th scope="col">Service</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($serviceo)) :?>
                  <div class="alert alert-warning" role="alert">
                  There is no order yet, if you like to order our service click <a href="<?=base_url('home/services');?>" class="alert-link">Here</a>
                </div>
                <?php endif; ?>
                <?php $i = 1; ?>
                <?php foreach ($serviceo as $so): ?>
                    <tr>
                    <td><?php echo $i; ?></td>
                    <td><?= $so->sorder_id; ?></td>
                    <td><?= $so->name; ?></td>
                    <td><?= date('d F yy', $so->order_date);?></td>
                    <td><?= $so->order_status?></td>
                    <td><?= anchor('customer/dashboard/view_reciept_service/' .$so->sorder_id,'<div class="btn btn-success"><i class="fa fa-info-circle" aria-hidden="true"></i>
                     Detail</div>')?>
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

