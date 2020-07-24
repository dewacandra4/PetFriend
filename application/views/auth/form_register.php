<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url()?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url()?>assets/sbadmin/css/sb-admin-2.css" rel="stylesheet">

</head>
<body class="bg-gradient-danger">

<div class="container">
    <div class="card o-hidden border-0 shadow-lg mt-lg-5 mb-lg-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('auth/registration');?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?=set_value('name');?>">
                    <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="Address" value="<?=set_value('address');?>"><?= form_error('address','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control form-control-user" id="phone" name="phone" placeholder="Phone Number" value="<?=set_value('phone');?>"><?= form_error('phone','<small class="text-danger pl-3">','</small>'); ?>
                </div>    
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?=set_value('email');?>">
                  <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?=set_value('username');?>"><?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-danger btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <h5>Already have an account ?</h5>
                <a class="medium" href="<?=base_url('auth/login');?>">Login here!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url()?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url()?>assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url()?>assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url()?>assets/sbadmin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url()?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url()?>assets/sbadmin/js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url()?>assets/sbadmin/js/demo/chart-pie-demo.js"></script>

</body>

</html>
