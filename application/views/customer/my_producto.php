
  <!-- Begin Page Content -->
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
                    <th scope="col">Order ID</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($producto as $po): ?>
                    <tr>
                    <td><?php echo $i; ?></td>
                    <td><?= $po->order_id?></td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
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

