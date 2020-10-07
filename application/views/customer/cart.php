
  <!-- Begin Page Content -->
      <div class="col-lg-8 mx-auto py-5">

        <!-- Illustrations -->
        <div class="card shadow px-0 mb-5 mt-5" >
        <div class="px-4 px-lg-0">

  <div class="container text-white py-5 text-center">
  <h2 class="mt-4">Shopping Cart</h2>
<p class="text-center">The following items are items that you have put in the cart, 
<br>select "Update Qty" button to update the quantity and recalculate the cost</p>
    </p>
  </div>
  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-10 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
            <?= $this->session->flashdata('message'); ?>
              <thead>
                <tr>
                  <th scope="col" class="border 1 card-header back-head text-light">
                    <div class="p-2 px-3 align-middle text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border 1 card-header back-head text-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border 1 card-header back-head text-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border 1 card-header back-head text-light">
                    <div class="py-2 text-uppercase">Total Price</div>
                  </th>
                  <th scope="col" class="border 1 card-header back-head text-light">
                    <div class="py-2 text-uppercase">Action</div>
                  </th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($this->cart->contents() as $items): ?>
                  <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="<?= base_url().'/assets/products/'.$items['img'];?>" width="100" alt="" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="<?=base_url('Home/detail_product/'.$items['id']);?>" class="text-dark d-inline-block align-middle"><?php echo $items['name']; ?></a>
                        </h5><span class="text-muted font-weight-normal font-italic d-block">Category: <?php echo $items['category']; ?></span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle pd-3"><strong>RM <?php echo $this->cart->format_number($items['price']); ?></strong></td>
                  <form action="<?php echo base_url().'Home/update_cart';?>" method="post" enctype="multipart/form-data">
                  <td class="border-0 align-middle">
                    <input type="number" name="quantity" placeholder="Available : <?php echo $items['stocks']; ?>" class="form-control" value="" min="1" max="<?php echo $items['stocks']; ?>" required>
                  <input type="hidden" name="rowid" class="form-control" value="<?php echo $items['rowid']; ?>">
                  <span class="text-muted font-bold font-weight-bold font-italic d-block">You currently order : <?php echo $items['qty']; ?> Item(s) </span>
                </td>
                <td class="border-0 align-middle"><strong>RM <?php echo $this->cart->format_number($items['subtotal']); ?></strong></td>
                  <td class="border-0 align-middle"><?= anchor('Home/Remove_cart/'.$items['rowid'],'<div class="btn btn-outline-danger">Remove</div>')?>
                  <button type="submit" class="btn btn-outline-success">Update Qty</button>
                </form>
                </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <?php if(empty($this->cart->contents())) :?>
                  <div class="alert alert-warning" role="alert">
                  There is no items in your cart, if you like to check our available products click <a href="<?=base_url('home/products');?>" class="alert-link">Here</a>
                </div>
          <!-- End -->
        </div>
      </div>
                <?php else:?>
      <div class="row py-3 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-12">
          <div class="card-header back-head text-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <p class="font-italic mb-4">Tax and Service costs are calculated based on values you have entered.</p>
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>RM <?php echo $this->cart->format_number($this->cart->total()); ?></strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong class="text-success">Free</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax (5%)</strong><strong>RM <?php echo $this->cart->format_number($this->cart->total()*0.05); ?> </strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold">RM <?php echo $this->cart->format_number(($this->cart->total()*0.05) + $this->cart->total()); ?></h5>
              </li>
            </ul><a href="<?= base_url('home/check_out'); ?>" class="add_cart btn btn-cart  rounded py-3 btn-block">Procceed to checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
  </div>
  <?php endif; ?>
  <!-- /.container-fluid -->

</div>
</html>
<!-- End of Main Content -->
<script src="./src/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>
