
  <!-- Begin Page Content -->
  <?php date_default_timezone_set('Asia/Singapore');?>
  <div class="col-lg-9 mx-auto py-5">
      <?= $this->session->flashdata('message'); ?>

        <!-- Illustrations -->
        <div class="card shadow px-0 mb-5 mt-5" >
          <div class="card-header py-4">
          <h5 class="m-0 font-weight-bold text-dark ml-4"><?=$title;?></h5>
        </div>
                <div class="card-body">
                <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Order ID</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Payment Due Date</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($producto)) :?>
                  <div class="alert alert-warning" role="alert">
                  There is no order yet, if you like to check our available products click <a href="<?=base_url('home/products');?>" class="alert-link">Here</a>
                </div>
                <?php endif; ?>
                <?php $i = 1; ?>
                <?php foreach ($producto as $po): ?>
                    <tr>
                    <td><?php echo $i; ?></td>
                    <td><?= $po->order_id?></td>
                    <td><?= date('d F yy', $po->order_date);?> || <?= date('H:i:s', $po->order_date);?></td>
                    <td><?= $po->order_status?></td>
                    <?php if($po->order_status == "On Process") :?>
                      <td>Paid</td>
                      <?php else : ?>
                        <?php $stop_date = date('d F yy H:i:s', $po->order_date);
                      $stop_date2 = date('d F yy', strtotime($stop_date . ' +1 day'));
                      $stop_date3 = date('H:i:s', strtotime($stop_date . ' +1 day'));?>
                      <td><?php echo $stop_date2; ?> || <?php echo $stop_date3; ?></td>
                    <?php endif; ?>
                    <td><?= anchor('customer/dashboard/view_reciept/'.$po->order_id,'<div class="text-info">Detail</div>')?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                </table>
                </div>
              </div>
          </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

