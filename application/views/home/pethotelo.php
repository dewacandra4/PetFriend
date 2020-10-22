<!DOCTYPE html>
<html lang="en">
  
<body>
  <!-- Masthead -->
  <header class="masthead text-white text-center" style="background-image: url(<?= base_url().'/assets/img/bg-masterhead.jpg'?>);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12 mx-auto">
        <img src="<?= base_url().'/assets/services/service_icon_1.png'?>" class="img-fluid">
          <h1 class="text-white">Entrust Your Pets To PetFriend <br> For Us There is Only One Boss, Your Pet.
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
          There are many facilities that your pet will get in the standard room,<br>
            + wide playing field<br>
            + 1 Toy<br>
            + Breakfast and dinner<br>
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
          We also offer a Deluxe Room, with more facilities such as,<br>
            + wide playing field<br>
            + Swiming Pool (For dog)<br>
            + Sand Box (For cat)<br>
            + 2 Toy<br>
            + Room with AC<br>
            + Breakfast and dinner (Organic Food)<br>
            + Walk Session Every Morning<br>
            + Free Snack<br>
            <br>
            Price : RM 40.00 / Night (For Cat or Dog)
          </p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url(<?= base_url().'/assets/img/bg-showcase-3.jpg'?>);"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Easy to Use &amp; Customize</h2>
          <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Keuntungan -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
            <h3>Fully Responsive</h3>
            <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>Bootstrap 4 Ready</h3>
            <p class="lead mb-0">Featuring the latest build of the new Bootstrap 4 framework!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Easy to Use</h3>
            <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Ready to get started? Sign up now!</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
<style>
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

.call-to-action {
  position: relative;
  background-color: #343a40;
  background: url("../img/bg-masthead.jpg") no-repeat center center;
  background-size: cover;
  padding-top: 7rem;
  padding-bottom: 7rem;
}

.call-to-action .overlay {
  position: absolute;
  background-color: #212529;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  opacity: 0.3;
}

footer.footer {
  padding-top: 4rem;
  padding-bottom: 4rem;
}

</style>