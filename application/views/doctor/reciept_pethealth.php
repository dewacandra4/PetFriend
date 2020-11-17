<?php date_default_timezone_set('Asia/Singapore');?>
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
        <?php foreach ($serviceo as $soi): ?>
            <div class="receipt bg-white p-3 rounded"><img width="160" src="<?= base_url()?>assets/img/logo_trans.png" alt="PetFriend">
                <h4 class="mt-2 mb-3">Pet Health Order Status : <a> <?=$soi->order_status?><a></h4>
                <?php if ($soi->order_status == "Awaiting Payment") : ?>
                <h6 class="name">Hello <?=$user['name'];?>,</h6><span class="fs-20 text-black-50"> Please make a payment to this Bank account :</span>
                <br>
                <?php if ($soi->payment_method == "Bank Transfer") : ?>
                <div class="card mt-2 mb-2">
                      <div class="card-body-responsive">
                      <img src="<?= base_url().'assets/img/b.png'?>"class="img-fluid mb-2 mt-2" width="6%"><strong> 930 12434 9999</strong>
                      </div>
                    </div>
                <?php endif; ?>
                <?php if ($soi->payment_method == "M-Banking") : ?>
                <div class="card mt-2 mb-2">
                      <div class="card-body-responsive">
                      <img src="<?= base_url().'assets/img/m.png'?>"class="img-fluid mb-2 mt-2" width="6%"><strong>8835 3345 776 777</strong>
                      </div>
                    </div>
                <?php endif; ?>
                <?php else : ?>
                <h6 class="name">Hello <?=$user['name'];?>,</h6><span class="fs-20 text-black-50"> Here is the detail of Pet Health Order that assign to you :</span>
                <?php endif; ?>
                <hr>
                <div class="d-flex flex-row justify-content-between align-items-center order-details">
                    <div><span class="d-block fs-12">Order date</span><span class="font-weight-bold"><i class="fa fa-calendar" aria-hidden="true"></i>
                    <?= date('d F yy', $soi->order_date);?></span></div>
                    <div><span class="d-block fs-12">Service Order ID</span><span class="font-weight-bold">#<?=$soi->sorder_id?></span></div>
                    <div><span class="d-block fs-12">Payment method</span><span class="font-weight-bold"><?=$soi->payment_method?></span>
                    <?php if ($soi->payment_method == "Bank Transfer") : ?>
                    <img class="ml-1 mb-1" src="<?= base_url().'assets/img/b.png'?>" width="20"></div>
                    <?php endif; ?>
                    <?php if ($soi->payment_method == "COD") : ?>
                    <img class="ml-1 mb-1" src="<?= base_url().'assets/img/c.png'?>" width="20"></div>
                    <?php endif; ?>
                    <?php if ($soi->payment_method == "M-Banking") : ?>
                    <img class="ml-1 mb-1" src="<?= base_url().'assets/img/m.png'?>" width="20"></div>
                    <?php endif; ?>
                    <div><span class="d-block fs-12">Customer's Address</span><span class="font-weight-bold"><i class="fa fa-map-marker" aria-hidden="true"></i>
                    <?=$soi->customer_address?></span></div>
                </div>
                <?php endforeach; ?>
                <hr>

            <!-- PET HEALTH -->
            <?php if ($soi->service_id == 2) : ?>
                <?php foreach ($pethealth as $ps): ?>
                <?php foreach ($vete as $v): ?>
                <!-- Count Price -->
                <?php
                $price= $guest['price'];
                $tax=$price*0.05;
                $total = $tax + $price;
                ?> 
                <div class="d-flex justify-content-between align-items-center product-details">
                <div>
                <br>
                <h5 class="my-0"><strong>Order Info : </strong></h5><br>
                <medium class="text-muted"><i class="fas fa-paw"></i> Pet : <?= $ps->pet_kind;?></medium><br>
                <?php if ($ps->pet_complaint == ""||$ps->pet_complaint == " ") : ?>
                <medium class="text-muted"><i class="fas fa-comments"></i> Pet Complaint : - </medium><br>
                <?php else : ?>
                <medium class="text-muted"><i class="fas fa-comments"></i> Pet Complaint :</medium><br>
                <div class="card">
                <div class="card-body">
                <?php echo nl2br($ps->pet_complaint);?>
                </div>
                </div>
                <hr>
                <?php endif; ?>
              </div>
                </div>
                <div class="mt-5 amount row">
                    <div class="d-flex justify-content-center col-md-6 "></div>
                    <div class="col-md-6">
                        <div class="billing">
                            <div class="d-flex justify-content-between"><span>Subtotal</span><span class="font-weight-bold">RM <?php echo number_format($price,2)."<br>";?></span></div>
                            <div class="d-flex justify-content-between mt-2"><span>Tax (5%)</span><span class="font-weight-bold text-success">+RM <?php echo number_format($tax,2)."<br>";?> </span></div>
                            <hr>
                            <div class="d-flex justify-content-between mt-1"><span class="font-weight-bold">Total</span><span class="font-weight-bold">
                                RM <?php echo number_format($total,2)."<br>";?></span></div>
                        </div>
                    </div>
            </div>
            <?php if (!$ps->diagnosis_file == null) : ?>
            <br><br><h6 class="text-muted"><i class="fas fa-file-alt"></i> Diagnosis File : 
            <?= anchor('doctor/dashboard/download/'.$ps->diagnosis_file,'<div class="btn btn-success"><i class="fas fa-download"></i> Download</div>')?></h6>
            <?php endif; ?>
            <br>
            <?php endforeach; ?> 
            <?php endforeach; ?> 
            <div class="alert alert-warning">
            <p> Total price <strong> RM <?php echo number_format($total,2);?></strong>
            is only a fee for veterinarians, for the cost of treatment and care will vary depending on the type of treatment</p>
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
