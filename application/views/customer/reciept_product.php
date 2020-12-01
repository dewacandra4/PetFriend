<?php date_default_timezone_set('Asia/Singapore');?>
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
        <?php foreach ($producto_orderid as $poi): ?>
            <div class="receipt bg-white p-3 rounded"><img width="160" src="<?= base_url()?>assets/img/logo_trans.png" alt="PetFriend">
                <h4 class="mt-2 mb-3">Your order Status : <a> <?=$poi->order_status?><a></h4>
                <?php if ($poi->order_status == "Awaiting Payment") : ?>
                <h6 class="name">Hello <?=$user['name'];?>,</h6><span class="fs-20 text-black-50"> Please make a payment to this Bank account :</span>
                <br>
                <?php if ($poi->payment_method == "Bank Transfer") : ?>
                <div class="card mt-2 mb-2">
                      <div class="card-body-responsive">
                      <img src="<?= base_url().'assets/img/b.png'?>"class="img-fluid mb-2 mt-2" width="6%"><strong> 930 12434 9999</strong>
                      </div>
                    </div>
                <?php endif; ?>
                <?php if ($poi->payment_method == "M-Banking") : ?>
                <div class="card mt-2 mb-2">
                      <div class="card-body-responsive">
                      <img src="<?= base_url().'assets/img/m.png'?>"class="img-fluid mb-2 mt-2" width="6%"><strong>8835 3345 776 777</strong>
                      </div>
                    </div>
                <?php endif; ?>
                <?php else : ?>
                <h6 class="name">Hello <?=$user['name'];?>,</h6><span class="fs-20 text-black-50"> Here is the detail of your order :</span>
                <?php endif; ?>
                <hr>
                <div class="d-flex flex-row justify-content-between align-items-center order-details">
                    <div><span class="d-block fs-12">Order date</span><span class="font-weight-bold"><i class="fa fa-calendar" aria-hidden="true"></i>
                    <?= date('d F yy', $poi->order_date);?></span></div>
                    <div><span class="d-block fs-12">Product Order ID</span><span class="font-weight-bold">#<?=$poi->order_id?></span></div>
                    <div><span class="d-block fs-12">Payment method</span><span class="font-weight-bold"><?=$poi->payment_method?></span>
                    <?php if ($poi->payment_method == "Bank Transfer") : ?>
                    <img class="ml-1 mb-1" src="<?= base_url().'assets/img/b.png'?>" width="20"></div>
                    <?php endif; ?>
                    <?php if ($poi->payment_method == "COD") : ?>
                    <img class="ml-1 mb-1" src="<?= base_url().'assets/img/c.png'?>" width="20"></div>
                    <?php endif; ?>
                    <?php if ($poi->payment_method == "M-Banking") : ?>
                    <img class="ml-1 mb-1" src="<?= base_url().'assets/img/m.png'?>" width="20"></div>
                    <?php endif; ?>
                    <div><span class="d-block fs-12">Shipping Address</span><span class="font-weight-bold"><i class="fa fa-map-marker" aria-hidden="true"></i>
                    <?=$poi->delivery_address?></span></div>
                </div>
                <?php endforeach; ?>
                <hr>
                <?php $subtotal = 0; ?>
                <?php foreach ($producto_detail as $pod): ?>
                <div class="d-flex justify-content-between align-items-center product-details">
                    <div class="d-flex flex-row product-name-image"><img class="rounded" src="<?= base_url().'/assets/products/'.$pod->img?>" width="80">
                        <div class="d-flex flex-column justify-content-between ml-2">
                            <div><span class="d-block font-weight-bold p-name"><?=$pod->product_name?></span><span class="fs-13">Order Quantity : <?=$pod->order_qty?></span></div>
                        </div>
                    </div>
                    <div class="product-price">
                        <span class="fs-17">RM <?=$pod->total_price?></span>
                    </div>
                </div>
                <?php $subtotal = $pod->total_price + $subtotal; ?>
                <?php endforeach; ?>
                <div class="mt-5 amount row">
                    <div class="d-flex justify-content-center col-md-6 "></div>
                    <div class="col-md-6">
                        <div class="billing">
                            <div class="d-flex justify-content-between"><span>Subtotal</span><span class="font-weight-bold">RM <?php echo number_format($subtotal,2)."<br>";?></span></div>
                            <div class="d-flex justify-content-between mt-2"><span>Shipping fee</span><span class="font-weight-bold text-success">Free</span></div>
                            <?php $tax = $subtotal * 0.05; ?>
                            <div class="d-flex justify-content-between mt-2"><span>Tax</span><span class="font-weight-bold text-success">+RM <?php echo number_format($tax,2)."<br>";?> </span></div>
                            <hr>
                            <?php $total = $subtotal + $tax; ?>
                            <div class="d-flex justify-content-between mt-1"><span class="font-weight-bold">Total</span><span class="font-weight-bold">
                                RM <?php echo number_format($total,2)."<br>";?></span></div>
                        </div>
                    </div>
            </div>
            <?php if ($poi->order_status == "Awaiting Payment") : ?>
            <?php $stop_date = date('d F yy H:i:s', $poi->order_date);
            $stop_date2 = date('d F yy H:i:s', strtotime($stop_date . '+1 day'));?>
            <br><br>
            <div class="alert alert-warning">
            <p> If the payment has not been made, the order will be canceled in: <strong id="demo"></strong>
            <p> You can send the bank transfer evidence to: <strong>Petfriend2@gmail.com</strong>
            </p>
            </div> 
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
</div>

<style>
body {
    background-color: #eee
}

.fs-12 {
    font-size: 12px
}

.fs-15 {
    font-size: 15px
}

.name {
    margin-bottom: -2px
}

.product-details {
    margin-top: 13px
}
</style>

<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<Script>
// Set the date we're counting down to
var countDownDate =  new Date("<?php echo $stop_date2;?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML =  hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
    

  }
}, 1000);
</Script>
