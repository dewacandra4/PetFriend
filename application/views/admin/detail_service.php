<?php date_default_timezone_set('Asia/Singapore');?>
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
        <?php foreach ($serviceo as $soi): ?>
            <div class="receipt bg-white p-3 rounded"><img width="160" src="<?= base_url()?>assets/img/logo_trans.png" alt="PetFriend">
                <h4 class="mt-2 mb-3">Order Status :  <?php if($soi->order_status == "Awaiting Payment"){
                    echo '<strong class="text-warning"> Awaiting Payment </strong>';
                }elseif($soi->order_status == "On Process"){
                    echo '<strong class="text-success"> On Process </strong>';
                }
                elseif($soi->order_status == "Order Complete"){
                    echo '<strong class="text-success"> Order Complete </strong>';
                }
                elseif($soi->order_status == "Cancelled"){
                    echo '<strong class="text-danger"> Cancelled </strong>';
                }
                ?></h4>
                
                <h6 class="name">Customer Name: <?=$customer['name'];?>,</h6>
                <span class="fs-20 text-black-50">Customer ID: <strong><?=$customer['id'];?></strong></span>
                <hr>
                <div class="d-flex flex-row justify-content-between align-items-center order-details">
                    <div><span class="d-block fs-12">Order date</span><span class="font-weight-bold"><i class="fa fa-calendar" aria-hidden="true"></i>
                    <?= date('d F Y', $soi->order_date);?></span></div>
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

                <!-- PET HOTEL -->
                <?php if ($soi->service_id == 1) : ?>
                <?php foreach ($pethotel as $ph): ?>
                <!-- get days -->
                <?php $ci = strtotime(date('d F Y',$ph->check_in));
                $co = strtotime(date('d F Y',$ph->check_out));
                $days = $co-$ci;
                ?>
                <!-- Count Price -->
                <?php
                if($ph->room_type =="Deluxe") 
                {
                    $price= $guest['price'] + 10;
                }
                if($ph->room_type =="Royale") 
                {
                    $price= $guest['price'] + 20;
                }
                if($ph->room_type =="Standard") 
                {
                    $price= $guest['price'];
                }
                $sub_total= $price * round($days/(60 * 60 * 24));
                $tax=$sub_total*0.05;
                $discount = $sub_total*0.15;
                if($guest['rep'] >=4)
                {
                    $total = ($tax + $sub_total) - $discount;
                }
                else{
                    $total = $tax + $sub_total;
                }
                ?> 
                <div class="d-flex justify-content-between align-items-center product-details">
                <div>
                <br>
                <h3 class="my-0"><i class="fa fa-cube" aria-hidden="true"></i> <?= $ph->room_type; ?> Room</h3><br>
                <medium class="text-muted"><i class="fas fa-paw"></i> Pet : <?= $ph->pet_kind;?></medium><br>
                <medium class="text-muted"><i class="fas fa-money-check-alt"></i> Price per Night :  RM <?= number_format($price,2,",",".")?></medium><br>
                <medium class="text-muted"><i class="fas fa-clock"></i> Duration :  <?php echo round($days/(60 * 60 * 24)); ?> Night </medium><br>
                <medium class="text-muted"><i class="fas fa-calendar-check"></i> Check In : <?= date('d F Y',$ph->check_in);?></medium><br>
                <medium class="text-muted"><i class="fas fa-calendar-times"></i> Check Out : <?= date('d F Y', $ph->check_out);?></medium>
                <?php if ($soi->order_status == "Order Complete" || $soi->order_status == "On Process"  ) : ?>
                <hr>
                <br><h5 class="text-muted"><i class="fas fa-money-check"></i> Total Price : <?php echo number_format($total,2);?>  </h5>
                </div>
                <?php endif; ?>
              </div>
                <?php if ($soi->order_status == "Awaiting Payment") : ?>
              <div class="product-price">
                        <span class="fs-17">RM <?php echo number_format($sub_total,2)?></span>
                    </div>
                </div>
                <div class="mt-5 amount row">
                    <div class="d-flex justify-content-center col-md-6 "></div>
                    <div class="col-md-6">
                        <div class="billing">
                            <div class="d-flex justify-content-between"><span>Subtotal</span><span class="font-weight-bold">RM <?php echo number_format($sub_total,2)."<br>";?></span></div>
                            <div class="d-flex justify-content-between mt-2"><span>Tax (5%)</span><span class="font-weight-bold text-success">+RM <?php echo number_format($tax,2)."<br>";?> </span></div>
                            <?php if($guest['rep'] >=4) :?>
                            <div class="d-flex justify-content-between mt-2"><span>Repeater Guset Discount (15%)</span><span class="font-weight-bold text-danger">-RM <?=number_format($discount,2,",",".")."<br>";?> </span></div>
                            <?php endif; ?>
                            <hr>
                            <div class="d-flex justify-content-between mt-1"><span class="font-weight-bold">Total</span><span class="font-weight-bold">
                                RM <?php echo number_format($total,2)."<br>";?></span></div>
                        </div>
                    </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php if ($soi->order_status == "Awaiting Payment") : ?>
            <?php $stop_date = date('d F Y H:i:s', $soi->order_date);
            $stop_date2 = date('d F Y H:i:s', strtotime($stop_date . '+30 minutes'));?>
            <br><br>
            <div class="alert alert-warning">
            <p> If the payment has not been made, the order will be canceled in: <strong id="demo"></strong></p>
            </div> 
            <?php endif; ?>
            <?php endif; ?>

            <!-- PET SALON -->
            <?php if ($soi->service_id == 3) : ?>
                <?php foreach ($petsalon as $ps): ?>
                <!-- Count Price -->
                <?php
                $price= $guest['price'];
                if($ps->service_type =="All in One") 
                {
                    $price= $guest['price'] + 5;
                }
                $sub_total= $price;
                $tax=$sub_total*0.05;
                $total = $tax + $sub_total;
                ?> 
                <div class="d-flex justify-content-between align-items-center product-details">
                <div>
                <br>
                <h3 class="my-0"><i class="fas fa-pump-medical"></i> <?= $ps->service_type; ?></h3><br>
                <medium class="text-muted"><i class="fas fa-paw"></i> Pet : <?= $ps->pet_kind;?></medium><br>
                <medium class="text-muted"><i class="fas fa-money-check-alt"></i> Price :  RM <?= number_format($price,2,",",".")?></medium><br>
              </div>
              <div class="product-price">
                        <span class="fs-17">RM <?php echo number_format($sub_total,2)?></span>
                    </div>
                </div>
                <div class="mt-5 amount row">
                    <div class="d-flex justify-content-center col-md-6 "></div>
                    <div class="col-md-6">
                        <div class="billing">
                            <div class="d-flex justify-content-between"><span>Subtotal</span><span class="font-weight-bold">RM <?php echo number_format($sub_total,2)."<br>";?></span></div>
                            <div class="d-flex justify-content-between mt-2"><span>Tax (5%)</span><span class="font-weight-bold text-success">+RM <?php echo number_format($tax,2)."<br>";?> </span></div>
                            <hr>
                            <div class="d-flex justify-content-between mt-1"><span class="font-weight-bold">Total</span><span class="font-weight-bold">
                                RM <?php echo number_format($total,2)."<br>";?></span></div>
                        </div>
                    </div>
            </div>
            <?php endforeach; ?> 
            <?php endif; ?>

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
                <h6 class="my-0"><strong>Responsible Veterinarian : </strong></h6><br>
                <img src="<?= base_url().'/assets/dp/'.$v->image;?>" width="100"> <br><br>
                <medium class="text-muted"><i class="fas fa-file-signature"></i> Name : <?= $v->name;?>,PhD</medium><br>
                <medium class="text-muted"><i class="fas fa-at"></i> Email : <?= $v->email;?></medium><br>
                <medium class="text-muted"><i class="fas fa-id-card-alt"></i> VET ID : <?= $ps->doc_id;?></medium><br>
                <medium class="text-muted"><i class="fas fa-money-check-alt"></i> Price :  RM <?= number_format($price,2,",",".")?></medium><br>
                <hr>
                <h6 class="my-0"><strong>Order Info : </strong></h6><br>
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
            <?= anchor('customer/dashboard/download/'.$ps->diagnosis_file,'<div class="btn btn-success"><i class="fas fa-download"></i> Download</div>')?></h6>
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