
  <!-- Begin Page Content -->
      <div class="col-lg-7 mx-auto py-5">
      <?= $this->session->flashdata('message'); ?>

        <!-- Illustrations -->
        <div class="card shadow px-0 mb-5 mt-5" >
          <div class="card-header py-4">
          <h5 class="m-0 font-weight-bold text-dark ml-4"><?=$title;?></h5>
        </div>
            <div class="row py-5 pl-lg-5">
              <div class="col-md-5">
                <div class="card-body">
                    <p class="card-text"><b>Username</b>: <?=$user['username'];?></p></br>
                    <p class="card-text"><b>Name</b>: <?=$user['name'];?></p></br>
                    <p class="card-text"><b>Email</b>: <?=$user['email'];?></p></br>
                    <p class="card-text"><b>Phone Number</b>: <?=$user['phone'];?></p></br>
                    <p class="card-text"><b>Address</b>: <?=$user['address'];?></p></br>
                    <p class="card-text"><small class="text-muted"><b>Member since </b> <?= date('d F yy', $user['date_created']);?></small></p>
                </div>
              </div>
              <div class="col-md-5 mt-4 text-center">
                <img class="img-thumbnail rounded-circle mx-auto" style="max-width:90%;" src="<?=base_url('assets/dp/').$user['image'];?>" alt="..."></br></br>
                <p class="text-center"><strong>Profile Picture</strong></p>
              </div>
          </div>
        </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

