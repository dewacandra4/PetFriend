<!DOCTYPE html>
<html lang="en">
  
<body>
<?php date_default_timezone_set('Asia/Singapore');?>
  <!-- Masthead -->
  <header class="masthead text-white text-center" style="background-image: url(<?= base_url().'/assets/img/bg-masterhead.jpg'?>);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12 mx-auto">
        <img src="<?= base_url().'/assets/services/service_icon_1.png'?>" class="img-fluid">
          <h1 class="text-white">Entrust Your Pets To PetFriend <br> "For Us There is Only One Boss, Your Pet."
            </h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
     <h2>Pet Hotel</h2> 
    <div class="container">
    <?php foreach ($services as $s) : ?>
    <p class="lead mb-0"><?= $s->description ?>
    <br>We provide various types of room types, with prices starting from RM <?= $s->price ?> / Night</p>
    <br>
    <?php if(is_admin() == 1) :?>
  <?php elseif(is_admin() == 3) : ?>
  <?php else : ?>
    <a href="#order" class="add_cart btn btn-cart  rounded py-3">Book Now</a>
    <?php endif; ?>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url(<?= base_url().'/assets/img/bg-showcase-1.jpg'?>);"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Standar Room</h2>
          <p class="lead mb-0">
          Base Price for the standard room, with facilities such as : <br><br>
            + Wide Playing Field<br>
            + Breakfast and Dinner<br>
            + Room with AC<br>
            + Free Snack<br>
            <br>
            Price : RM <?= $s->price ?> / Night (For Cat or Dog)
          </p>
        </div>
      </div>
      <?php endforeach;?>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url(<?= base_url().'/assets/img/bg-showcase-2.jpg'?>);"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Deluxe Room</h2>
          <p class="lead mb-0">
          Pay additional RM 10.00 for Deluxe Room, with more facilities such as : <br><br>
            + Wide Playing Field<br>
            + Swiming Pool (For dog)<br>
            + Sand Box (For cat)<br>
            + Room with AC and Medium Size Bed<br>
            + Breakfast and Dinner (Organic Food)<br>
            + Walk Session Every Morning<br>
            + Free Snack<br>
            <br>
            Price : RM <?= $s->price + 10 ?>.00 / Night (For Cat or Dog)
          </p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url(<?= base_url().'/assets/img/bg-showcase-3.jpg'?>);"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Royale Room</h2>
          <p class="lead mb-0">
          Pay additional RM 20.00 for Royale Room, with more facilities such as : <br><br>
            + Individual Playing Field<br>
            + Swiming Pool (For dog)<br>
            + Sand Box (For cat)<br>
            + Room with AC and Big Size Bed<br>
            + Breakfast, Lunch and Dinner (Organic Food)<br>
            + Walk Session Every Morning and Pet Salon<br>
            + Free Snack<br>
            <br>
            Price : RM <?= $s->price + 20 ?>.00 / Night (For Cat or Dog)
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Keuntungan -->
  <?php if(is_admin() == 1) :?>
  <?php elseif(is_admin() == 3) : ?>
  <?php else : ?>
  <section class="features-icons bg-white text-center" id="order" style="background-image: url(<?= base_url().'/assets/img/bg2.jpg'?>);">
  <h2>Booking Form</h2> 
  <?php if($s->is_available == 0) :?>
                  <div class="alert alert-warning" role="alert"><h3>
                  We are so sorry, there is no available room for now <i class="fa fa-frown-o" aria-hidden="true"></i></h3>
                </div>
    <?php else:?>
    <div class="container">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-7">
                <div class="p-5">
                <h4><i class="fa fa-suitcase" aria-hidden="true"></i>
                Total Available Slot : <?= $s->resource ?></h4> 
                <hr>
                  <div class="text-center">
                  </div>
                  <br>
                  <form method="post" action="<?= base_url('Home/check_out_hotel')?>" class="user">
                  <div class="row">

                    <div class="col">
                    <div class="form-group">
                    <h5><i class="fa fa-calendar" aria-hidden="true"></i>
                    Check-in Date: </h5>
                    <input type="date" class="form-control " id="fromDate" name="check-in" placeholder="From Date" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    </div>

                    <div class="col">
                    <div class="form-group">
                    <h5> <i class="fa fa-moon-o" aria-hidden="true"></i>
                    How Many Night : </h5>
                    <input type="number" name="days" id="days" class="form-control" value="" min="1" required>
                    </div>
                    </div>

                    </div>

                    <div class="form-group">
                    <h5> <i class="fa fa-paw" aria-hidden="true"></i>
                    Select Pet Kind :  </h5>
                    <select class="form-control" name="petkind">
                    <option>Dog</option>
                    <option>Cat</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <h5> <i class="fa fa-joomla" aria-hidden="true"></i>
                    Select Room Type :  </h5>
                    <select class="form-control" name="roomtype">
                    <option>Royale</option>
                    <option>Deluxe</option>
                    <option>Standard</option>
                    </select>
                    </div>

                    <br>
                      <input type="hidden" name="base_price" value="<?= $s->price ?>">
                      <input type="hidden" name="service_id" value="<?= $s->id ?>">
                      <button type="submit" class="btn genric-btn danger-border circle btn-block">Book</button>
                    <br>
                  </form>
                </div>
              </div>
              <div class="col-lg-5 d-none d-lg-block"> <img class="rounded" src="<?= base_url()?>assets/img/Order.jpg" alt="beauty_dog" height="500px"></div>
            </div>
          </div>
          <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>
</body>

</html>

<style>
html {
  scroll-behavior: smooth;
}
body {
  font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-weight: 700;
}

header.masthead {
  position: relative;
  background-color: #343a40;
  background: url("../img/bg-masthead.jpg") no-repeat center center;
  background-size: cover;
  padding-top: 8rem;
  padding-bottom: 8rem;
}

header.masthead .overlay {
  position: absolute;
  background-color: #212529;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  opacity: 0.3;
}

header.masthead h1 {
  font-size: 2rem;
}

@media (min-width: 768px) {
  header.masthead {
    padding-top: 12rem;
    padding-bottom: 12rem;
  }
  header.masthead h1 {
    font-size: 3rem;
  }
}

.showcase .showcase-text {
  padding: 3rem;
}

.showcase .showcase-img {
  min-height: 30rem;
  background-size: cover;
}

@media (min-width: 768px) {
  .showcase .showcase-text {
    padding: 7rem;
  }
}

.features-icons {
  padding-top: 7rem;
  padding-bottom: 7rem;
}

.features-icons .features-icons-item {
  max-width: 20rem;
}

.features-icons .features-icons-item .features-icons-icon {
  height: 7rem;
}

.features-icons .features-icons-item .features-icons-icon i {
  font-size: 4.5rem;
}

.features-icons .features-icons-item:hover .features-icons-icon i {
  font-size: 5rem;
}

.testimonials {
  padding-top: 7rem;
  padding-bottom: 7rem;
}

.testimonials .testimonial-item {
  max-width: 18rem;
}

.testimonials .testimonial-item img {
  max-width: 12rem;
  box-shadow: 0px 5px 5px 0px #adb5bd;
}
</style>