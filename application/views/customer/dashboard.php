
        <!-- Begin Page Content -->
            <div class="col-lg-10 mx-auto">

              <!-- Illustrations -->
              <div class="card shadow mb-4" >
                <div class="card-header py-3" >
                  <h6 class="m-2 font-weight-normal text-danger text-center">Welcome Back, <strong><?=$user['name'];?></strong> !</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-0" style="width: 45rem;" src="<?= base_url()?>assets/img/welcome.png" alt="">
                  </div>
                  <div class="dropdown-divider"></div>
                  <h6 class="text-center font-weight-bold">Welcome to the customer dashboard. In this page you can view your profile information, change your profile and password, and see your order on the right sidebar.</h6>
                </div>
              </div>
              <!-- Approach -->
              <div class="card shadow mb-4" >
                <div class="card-header py-3" >
                  <h6 class="m-0 font-weight-bold text-danger">More Information</h6>
                </div>
                <div class="card-body">
                <?php if (!$info1 == null) :?>
                <h6><Strong>Product Order Information : </Strong></h6>
                  <p class="alert alert-warning alert-dismissible fade show" role="alert">Currently You Have : <Strong><?=$info1;?></Strong> Product Order(s) to be paid,
                   please check My Product Order for more detailed information ^^</p>
                <?php endif;?>
                <?php if (!$info2 == null) :?>
                <h6><Strong>Service Order Information : </Strong></h6>
                  <p class="alert alert-warning alert-dismissible fade show" role="alert">Currently You Have : <Strong><?=$info2;?></Strong> Service Order(s) to be paid,
                   please check My Service Order for more detailed information ^^</p>
                <?php endif;?>
                </div>
                </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

