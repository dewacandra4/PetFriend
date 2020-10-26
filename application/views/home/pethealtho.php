<!DOCTYPE html>
<html lang="en">
  
<body>
<?php date_default_timezone_set('Asia/Singapore');?>
  <!-- Masthead -->
  <header class="masthead text-white text-center" style="background-image: url(<?= base_url().'/assets/img/vet.jpg'?>);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12 mx-auto">
        <img src="<?= base_url().'/assets/services/service_icon_2.png'?>" class="img-fluid">
          <h1 class="text-white">"Some superheroes dont't wear capes. they're called, VETERINARIANS"
            </h1>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
     <h2>Pet Health</h2> 
    <div class="container">
    <?php foreach ($services as $s) : ?>
    <p class="lead mb-0"><?= $s->description ?>
    <br>RM <?= $s->price ?> for veterinarians fee<br>
    </p>
    <br>
    <?php if(is_admin() == 1) :?>
  <?php elseif(is_admin() == 3) : ?>
    <?php elseif(is_admin() == null) : ?>
  <?php else : ?>
    <a href="#order" class="add_cart btn btn-cart  rounded py-3">Order Now</a>
    <?php endif; ?>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url(<?= base_url().'/assets/img/vet2.jpg'?>);"></div>
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url(<?= base_url().'/assets/img/vet3.jpg'?>);"></div>
      </div>
      <?php endforeach;?>
      <div class="row no-gutters">
      <div class="col-lg-6 my-auto showcase-text">
          <h2>Medical check up</h2>
          <p class="lead mb-0">
          After you place an order, the veterinarian you choose will go directly to your address, 
          for a medical check-up, so that your pet can immediately receive special treatment.
          </p>
        </div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Intensive Treatment</h2>
          <p class="lead mb-0">
          For a certain condition, intensive treatment will be carried out, with hospitalization, so that the pet can recover quickly.
          </p>
        </div>
      </div>
  </section>

  <section class="features-icons bg-light text-center">
     <h2>Our Veterinarians</h2> 
    <div class="container">
    <div class="table-responsive">
    <table class="table table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">VET ID</th>
      <th scope="col">Pic</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1?>
  <?php foreach ($veterinarian as $v): ?>
    <tr>
      <th scope="row"><?php echo $i;?></th>
      <td><?= $v->id?></td>
      <td><img src="<?= base_url().'/assets/dp/'.$v->image;?>" width="100"></td>
      <td><?= $v->name?>, PhD</td>
      <td><?= $v->email?></td>
    </tr>
    <?php $i++;?>
    <?php endforeach; ?>
    </tbody>
    </table>
    </div>
    </div>
  </section>

  <?php if(is_admin() == 1) :?>
  <?php elseif(is_admin() == 3) : ?>
  <?php elseif(is_admin() == null) : ?>
    <div class="alert alert-warning" role="alert">
      <h3 class="text-center">Please Log In before order pet health <i class="fa fa-frown-o" aria-hidden="true"></i></h3>
                </div>
  <?php else : ?>
  <section class="features-icons bg-white text-center" id="order" style="background-image: url(<?= base_url().'/assets/img/bg4.jpg'?>);">
  <h2>Order Form</h2> 
  <?php if($s->is_available == 0) :?>
                  <div class="alert alert-warning" role="alert"><h3>
                  We are so sorry, there is no available Veterinarian for now <i class="fa fa-frown-o" aria-hidden="true"></i></h3>
                </div>
    <?php else:?>
      <?= $this->session->flashdata('message'); ?>
    <div class="container">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-7">
                <div class="p-5">
                <h4><i class="fas fa-user-nurse"></i>
                Available VET : <?= $s->resource ?></h4> 
                <hr>
                  <div class="text-center">
                  </div>
                  <br>
                  <?=form_open_multipart('home/order_pethealth');?>
                  <div class="row">
                  <div class="col">
                    <div class="form-group">
                    <h5> <i class="fas fa-file-signature"></i>
                    Full Name :  </h5>
                    <input type="text" class="form-control" value="<?=$user['name'];?>" required>
                    </div>

                    <div class="form-group">
                    <h5> <i class="fas fa-at"></i>
                    Email :  </h5>
                    <input type="text" class="form-control" placeholder="eg: youremail@example.com" value="<?=$user['email'];?>" required>
                    </div>

                    </div>

                    <div class="col">
                    <div class="form-group">
                    <h5> <i class="fa fa-paw" aria-hidden="true"></i>
                    Select Pet Kind :  </h5>
                    <select class="form-control" name="pet_kind" required>
                    <option>Dog</option>
                    <option>Cat</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <h5> <i class="fas fa-user-nurse"></i>
                    Select VET (ID) :  </h5>
                    <select class="form-control" name="doc_id" required>
                    <?php foreach ($veterinarian as $v): ?>
                    <option><?=$v->id;?></option>
                    <?php endforeach; ?>
                    </select>
                    </div>

                    </div>
                    </div>

                    <div class="form-group">
                    <h5> <i class="fa fa-map-marker" aria-hidden="true"></i>
                    Address :  </h5>
                    <input type="text" name="customer_address" class="form-control" placeholder="eg: 1234 Main St" value="<?=$user['address'];?>" required>
                    </div>
                    
                    <div class="form-group">
                    <h5> <i class="fas fa-comments"></i>
                    Pet Complaint (Optional) :  </h5>
                    <textarea name="pet_complaint" rows="3" class="form-control"> </textarea>
                    </div>

                    <h5><i class="fas fa-file-alt"></i>
                    Attach diagnosis result (Optional) :  </h5>
                    <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="diagnosis_file" name="diagnosis_file">
                    <label class="custom-file-label" for="diagnosis_file">Choose File</label>
                    </div>

                    <br><br>
                      <input type="hidden" name="base_price" value="<?= $s->price ?>">
                      <input type="hidden" name="service_id" value="<?= $s->id ?>">
                      <input type="hidden" name="user_id" value="<?=$user['id'];?>">
                      <button type="submit" class="btn genric-btn danger-border circle btn-block">Order</button>
                    <br>
                  </form>
                </div>
              </div>
              <div class="col-lg-5 d-none d-lg-block"> <img class="rounded" src="<?= base_url()?>assets/img/order3.jpg" alt="beauty_dog" height="700px"></div>
            </div>
          </div>
          <?php endif; ?>
    </div>
  </section>
  <?php endif; ?>
</body>

</html>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

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