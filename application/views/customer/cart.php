
  <!-- Begin Page Content -->
      <div class="col-lg-8 mx-auto py-5">

        <!-- Illustrations -->
        <div class="card shadow px-0 mb-5 mt-5" >
        <div class="px-4 px-lg-0">

  <div class="container text-white py-5 text-center">
    <h1 class="display-4">Shopping Cart</h1>
    </p>
  </div>
  <!-- End -->
  
  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
            <?= $this->session->flashdata('message'); ?>
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Total Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Action</div>
                  </th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($this->cart->contents() as $items): ?>
                  <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
              </thead>
              <tbody>
              <form method="post" action="<?php echo base_url().'Home/update_cart';?>" enctype="multipart/form-data">
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="<?= base_url().'/assets/products/'.$items['img'];?>"  width="100" alt="" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $items['name']; ?></a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: <?php echo $items['category']; ?></span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>RM <?php echo $this->cart->format_number($items['price']); ?></strong></td>
                 
                  <td class="border-0 align-middle"><input type="number" name="quantity" class="form-control" value="<?php echo $items['qty']; ?>" min="1" max="<?php echo $items['stocks']; ?>"/>
                  <span class="text-muted font-weight-normal font-italic d-block">Available Stocks: <?php echo $items['stocks']; ?></span>
                </td>
                <td class="border-0 align-middle"><strong>RM <?php echo $this->cart->format_number($items['subtotal']); ?></strong></td>
                  <td class="border-0 align-middle"><?= anchor('Home/Remove_cart/'.$items['rowid'],'<div class="btn btn-outline-danger">Remove</div>')?>
                  <?= anchor('Home/update_cart/'.$items['rowid'],'<button class="btn btn-outline-success" type="submit" >Update Qty</button>')?>
                </td>
                </tr>
                </form>
                <?php $i++; ?>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>
      <div class="row py-3 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-12">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <p class="font-italic mb-4">Tax and Service costs are calculated based on values you have entered.</p>
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>RM <?php echo $this->cart->format_number($this->cart->total()); ?></strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong class="text-success">Free</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax (5%)</strong><strong>RM <?php echo $this->cart->format_number($this->cart->total()*0.05); ?> </strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold">RM <?php echo $this->cart->format_number($this->cart->total()*0.05) + ($this->cart->total()); ?></h5>
              </li>
            </ul><a href="#" class="btn btn-danger rounded-pill py-2 btn-block">Procceed to checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
  </div>
  <!-- /.container-fluid -->

</div>
</html>
<!-- End of Main Content -->
<script src="./src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>
