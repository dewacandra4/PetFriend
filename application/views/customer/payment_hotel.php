
  <!--Main layout-->
  <main class="mt-1 pt-4">
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>
      <?php date_default_timezone_set('Asia/Singapore');?>
      <?php $sub_total=  $book['price'] * $book['days'];
              $tax=$sub_total*0.05;
              $total = $tax + $sub_total;?>
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
                    value="RM <?=number_format($total,2,",",".");?>">
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
                    value="RM <?=number_format($total,2,",",".");?>">
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
                      <p>You can book a room, then pay when you check-in</p>
                    <p>The amount of money that needs to be prepared : <input readonly class="form-control w-50 mt-1" type="text" 
                    value="RM <?=number_format($total,2,",",".");?>">
                    <br><strong>If you check in after 2.00 pm it will be counted as the 2nd night</strong>
                    </p>
                    </blockquote>
                  </div>
                </div>
                <br><br>
              </div>
              <input type="hidden" name="user_id" value="<?=$user['id'];?>">
              <input type="hidden" name="order_status1" value="On Process">
              <input type="hidden" name="order_status2" value="Awaiting Payment">
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
            <span class="text-muted">Book Detail summary</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h4 class="my-0"><?php echo $book['room_type']; ?> Room (<?php echo $book['pet_kind']; ?>)</h4><br>
                <small class="text-muted">Price per Night : <?php echo $book['price']; ?> RM </small><br>
                <small class="text-muted">Duration :  <?php echo $book['days']; ?> Night </small><br>
                <small class="text-muted">Check In : <?= date('d F yy',$book['check_in']);?></small><br>
                <?php $stop_date = date('d F yy',$book['check_in']);
                $days =$book['days'];
                $stop_date2 = date('d F yy', strtotime($stop_date . ' +'.$book['days'].'day'));
                ?>
                <small class="text-muted">Check Out : <?php echo $stop_date2;?></small>
              </div>
              <span class="text-muted">RM <?=number_format($sub_total,2,",",".");?> </span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Tax and Service (5%)</h6>
              </div>
              <span class="text-success">+ RM <?=number_format($tax,2,",",".");?>  </span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total <?=number_format($total,2,",",".");?> (RM)</span>
              <strong></strong>
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