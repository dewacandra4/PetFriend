<body class="bg-gradient-danger">

  <div class="container pb-5 pt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-7">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h2 text-gray-900 mb-5">Login</h1>
                  </div>
                  <br>
                  <?php echo $this->session->flashdata('message')?>
                  <form method="post" action="<?= base_url('auth/login')?>" class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username..."> 
                      <?php echo form_error('username', '<div class="text-danger small ml-2">','</div>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user form-password" id="password" name="password" placeholder="Password">
                      <?php echo form_error('password', '<div class="text-danger small ml-2">','</div>'); ?>
                    </div>
                    <!-- <div class="form-check ml-2">
                      <input type="checkbox" class="form-check-input form-checkbox">
                      <label class="form-check-label">Show Password</label>
                    </div> -->
                    <div class="form-check form-switch">
                      <input class="form-check-input form-checkbox" type="checkbox" id="flexSwitchCheckDefault">
                      <label class="form-check-label" for="flexSwitchCheckDefault">Show Password</label>
                    </div>
                    <br>
                      <button type="submit" class="btn genric-btn danger-border circle  btn-block"> Login</button>
                    <br>
                  </form>
                  <div class="text-center">
                    <p class="small">Don't have an account ?<p>
                    <a href="<?= base_url('auth/registration')?>">Create an Account here !</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 d-none d-lg-block"> <img class="rounded" src="<?= base_url()?>assets/img/beauty_dog.png" alt="beauty_dog" height="585px"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>