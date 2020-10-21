
  <!--Main layout-->
  <main class="mt-1 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-10 bg-white rounded shadow-sm mb-5">
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body"  method="post"  action="<?= base_url('home/order_products');?>" autocomplete="off">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->
              <div class="md-form input-group pl-0 mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input readonly type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1" value="<?=$user['username'];?>">
              </div>

              <div class="md-form mb-4">
              <label for="address" class="ml-1">Full Name</label>
                <input type="text" id="address" class="form-control" value="<?=$user['name'];?>">
              </div>

              <!--email-->
              <div class="md-form mb-4">
              <label for="email" class="ml-1">Email</label>
                <input type="text" id="email" class="form-control" placeholder="eg: youremail@example.com" value="<?=$user['email'];?>">
              </div>

              <div class="md-form mb-4">
              <label for="delivery_note" class="ml-1">Devlivery Note (optional)</label>
                <input type="text" name="delivery_note" class="form-control"  placeholder="eg: left the items at the gate">
              </div>

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-lg-12 col-md-12 mb-1">

                 <!--address-->
                <div class="md-form mb-2">
                <label for="delivery_address" class="ml-1">Address</label>
                <input type="text" name="delivery_address" class="form-control" placeholder="eg: 1234 Main St" value="<?=$user['address'];?>">
                </div>

                </div>

                <!--Grid column-->
                <!--Grid column-->

              </div>
              <!--Grid row-->
              <hr>
              <label for="payment_method" class="ml-1">Please Select The Payment Method : </label>
              <div class="d-block my-1">
                <div class="custom-control custom-radio">
                  <input id="Bank" name="payment_method" type="radio" class="custom-control-input" value="Bank Transfer" checked required>
                  <label class="custom-control-label" for="Bank">Bank Transfer</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="M-Bank" name="payment_method" type="radio" class="custom-control-input" value="M-Banking" required>
                  <label class="custom-control-label" for="M-Bank">M-Banking</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="COD" name="payment_method" type="radio" class="custom-control-input" value="COD" required>
                  <label class="custom-control-label" for="COD">COD (Cash On Delivery)</label>
                </div>
              </div>
              <div class="Box1" style="display:none">
              <br><br>
              <div class="card">
                  <div class="card-header">
                  <Strong> Bank Transfer</Strong>
                  </div>
                  <div class="card-body">
                    <blockquote class="blockquote mb-0">
                      <p>If you choose the Bank Transfer method, make sure you make a transfer to the account number below :</p>
                      <div class="card w-50 mb-2">
                      <div class="card-body">
                      <img src="<?= base_url().'assets/img/b.png'?>"class="img-fluid" width="20%"><strong class="ml-3 mr-3"> 930 12434 9999</strong>
                      </div>
                    </div>
                    <p>The total amount that you have to transfer is as follows : <input readonly class="form-control w-50 mt-1" type="text" 
                    value="RM <?php echo $this->cart->format_number(($this->cart->total()*0.05) + $this->cart->total()); ?>">
                    <br><strong>We will verify your payment soon, and if within 24 hours the payment has not been made, the order will be canceled automatically.</strong>
                    </p>
                    </blockquote>
                  </div>
                </div>
                <br><br>
              </div>
              <div class="Box2" style="display:none">
              <br><br>
              <div class="card">
                  <div class="card-header">
                  <Strong>Mobile Banking</Strong>
                  </div>
                  <div class="card-body">
                    <blockquote class="blockquote mb-0">
                      <p>If you choose the Mobile Banking Transfer method, make sure you make a transfer to the account number below :</p>
                      <div class="card w-50 mb-2">
                      <div class="card-body">
                      <img src="<?= base_url().'assets/img/m.png'?>"class="img-fluid" width="20%"><strong class="ml-3"> 8835 3345 776 777</strong>
                      </div>
                    </div>
                    <p>The total amount that you have to transfer is as follows : <input readonly class="form-control w-50 mt-1" type="text" 
                    value="RM <?php echo $this->cart->format_number(($this->cart->total()*0.05) + $this->cart->total()); ?>">
                    <br><strong>We will verify your payment soon, and if within 24 hours the payment has not been made, the order will be canceled automatically.</strong>
                    </p>
                    </blockquote>
                  </div>
                </div>
                <br><br>
              </div>
              <div class="Box3" style="display:none">
              <br><br>
              <div class="card">
                  <div class="card-header">
                  <Strong> Cash On Delivery</Strong>
                  </div>
                  <div class="card-body">
                    <blockquote class="blockquote mb-0">
                    <img src="<?= base_url().'assets/img/c.png'?>"class="img-fluid mb-3" width="35%">
                      <p>You can place an order, then pay when the product has been received</p>
                    <p>The amount of money that needs to be prepared : <input readonly class="form-control w-50 mt-1" type="text" 
                    value="RM <?php echo $this->cart->format_number(($this->cart->total()*0.05) + $this->cart->total()); ?>">
                    <br><strong>Please make sure that address you entered is correct, and fill delivery note if products must be delivered at a specific location</strong>
                    </p>
                    </blockquote>
                  </div>
                </div>
                <br><br>
              </div>
              <input type="hidden" name="user_id" value="<?=$user['id'];?>">
              <input type="hidden" name="order_status1" value="On Process">
              <input type="hidden" name="order_status2" value="Awaiting Payment">
              <input type="hidden" name="total_price" value="<?php echo $this->cart->total()*0.05 + $this->cart->total(); ?>">
              <input type="hidden" name="total_items" value="<?php echo $this->cart->total_items();?>">
              <button class="add_cart btn btn-cart  rounded py-3 btn-block" type="submit">Continue to checkout</button>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart summary</span>
            <span class="badge badge-secondary badge-pill"><?php echo $this->cart->total_items();?></span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
          <?php $i = 1; ?>
                <?php foreach ($this->cart->contents() as $items): ?>
                  <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $items['name']; ?> (<?php echo $items['qty']; ?>)</h6>
                <small class="text-muted">Price per item : RM <?php echo $this->cart->format_number($items['price']); ?></small>
              </div>
              <span class="text-muted">RM <?php echo $this->cart->format_number($items['subtotal']); ?></span>
            </li>
            <?php $i++; ?>
              <?php endforeach; ?>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Tax (5%)</h6>
              </div>
              <span class="text-success">+ RM <?php echo $this->cart->format_number($this->cart->total()*0.05); ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (RM)</span>
              <strong><?php echo $this->cart->format_number(($this->cart->total()*0.05) + $this->cart->total()); ?></strong>
            </li>
          </ul>
          <!-- Cart -->
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
    </div>
    </div>
    </div>
    </div>
  </main>
  <!--Main layout-->
  <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<Script>
$('input[type="radio"]').click(function(){
        if($(this).attr("value")=="COD"){
            $(".Box3").show('fast');
            $(".Box2").hide('fast');
            $(".Box1").hide('fast');
        }
        if($(this).attr("value")=="Bank Transfer"){
            $(".Box1").show('fast');
            $(".Box3").hide('fast');
            $(".Box2").hide('fast');
        } 
        if($(this).attr("value")=="M-Banking"){
            $(".Box2").show('fast');
            $(".Box1").hide('fast');
            $(".Box3").hide('fast');
        }        
    });
$('input[type="radio"]').trigger('click');
</Script>