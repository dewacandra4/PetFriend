
        <!-- Begin Page Content -->
            <div class="col-lg-10 mx-auto">
<!-- Approach -->
<div class="card shadow mb-4">
                  <!-- Card Header - Accordion -->
                  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary text-center">Status information</h6>
                  </a>
                  <!-- Card Content - Collapse -->
                  <div class="collapse show" id="collapseCardExample" style="" data-parent="#accordion">
                    <div class="card-body text-center">

                      <div class="row mx-auto">
                        <!-- product order Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-3">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Products Order Pending</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $order?> Order(s)</div>
                                  
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-receipt fa-2x text-gray-300"></i>
                                </div>
                                <a class="btn btn-primary " href="<?=base_url('admin/list_order');?>"><i class="fas fa-arrow-right"></i> </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Services Order Card  -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Services Order Pending</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sorder?> Order(s)</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-receipt fa-2x text-gray-300"></i>
                                </div>
                                <a class="btn btn-danger " href="<?=base_url('admin/list_sorder');?>"><i class="fas fa-arrow-right"></i> </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- product Total Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Product</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalP?> Item(s)</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fab fa-product-hunt fa-2x text-gray-300"></i>
                                </div>
                                <a class="btn btn-warning " href="<?=base_url('admin/manage_products');?>"><i class="fas fa-arrow-right"></i> </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Total Sold Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Products Sold</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_sold?> Item(s)</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fa fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                                <a class="btn btn-success " href="<?=base_url('admin/manage_products');?>"><i class="fas fa-arrow-right"></i> </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              <!-- Illustrations -->
              <div id="accordion">
                <div class="card shadow mb-4" >
                  <div class="card-header py-3 border-bottom-primary " >
                  <a href="#collapseDashboard" class="d-block card-header py-3"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h6 class="m-2 font-weight-normal text-primary text-center ">Welcome Back, <strong><?=$user['name'];?></strong> !</h6>
                  </a>
                  </div>
                  <div class="collapse show" id="collapseOne" style="">
                    <div class="card-body">
                      <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-0" style="width: 45rem;" src="<?= base_url()?>assets/img/welcome.png" alt="">
                      </div>
                      <div class="dropdown-divider"></div>
                      <h6 class="text-center font-weight-bold">Welcome to the admin dashboard. In this page you can view your profile information, change your profile and password, manage services and products, and see the list of order on the right sidebar.</h6>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
</div>
      </div>
      <!-- End of Main Content -->

