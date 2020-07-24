
        <!-- Begin Page Content -->
            <div class="col-lg-10 mx-auto">
            <?= $this->session->flashdata('message'); ?>

              <!-- Illustrations -->
             
  
              <div class="card shadow mb-4" >
                <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-dark"><?=$title;?></h5>
              </div>
                            <div class="row no-gutters">
                                <div class="col-md-4"></br>
                                <div class="card-body">
                                    <p class="card-text"><b>Username: </b><?=$user['username'];?></p></br>
                                    <p class="card-text"><b>Name          :</b> <?=$user['name'];?></p></br>
                                    <p class="card-text"><b>Email         : </b><?=$user['email'];?></p></br>
                                    <p class="card-text"><b>Phone Number  : </b><?=$user['phone'];?></p></br>
                                    <p class="card-text"><b>Address       : </b><?=$user['address'];?></p></br></br>
                                    <p class="card-text"><small class="text-muted"><b>Member since </b> <?= date('d F yy', $user['date_created']);?></small></p>
                                </div>
                                </div>
                                <div class="col-md-8"></br></br>
                                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<img class="img-profile rounded-circle" src="<?=base_url('assets/dp/').$user['image'];?>" class="card-img" alt="..."></br></br>
                                <p><strong> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Profile Picture</strong></p>
                                
                     
                   
              
              </div>
              </div>
              </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

