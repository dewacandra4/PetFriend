<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('home'); ?>">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url()?>assets/sbadmin/img/logo_wh.png" alt="PetFriend" width=100% height=60%>
        </div>
        <div class="sidebar-brand-text-dark mx-3">PetFriend</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <?php $uri=$this->uri->segment(1).'/'.$this->uri->segment(2);
      $uri2=$this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
      ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url('customer/dashboard');?>">
          <i class="fas fa-fw fa-heart"></i>
          <span>Hi, <?=$user['name'];?></span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        My Profile
      </div>

      <!-- Nav Item - Profile -->
      <li class="nav-item">
      <a class="nav-link" href="<?=base_url('customer/dashboard/profile');?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>

      <!-- Nav Item - Edit Profile -->

      <li class="nav-item">
      <a class="nav-link" href="<?=base_url('customer/dashboard/edit');?>">
          <i class="fas fa-fw fa-user-edit"></i>
          <span>Edit Profile</span></a>
      </li>
      <!-- Nav Item - Change password -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('customer/dashboard/change_password');?>">
          <i class="fas fa-fw fa-key"></i>
          <span>Change Password</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        My Order
      </div>
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('customer/dashboard/my_producto');?>">
          <i class="fas fa-fw fa-bone"></i>
          <span>Products Order</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('customer/dashboard/my_serviceo');?>">
          <i class="fas fa-fw fa-heart"></i>
          <span>Services Order</span></a>
      </li>
      
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        My Order History
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('customer/historyp');?>">
          <i class="fas fa-fw fa-bone"></i>
          <span>Products Order History</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('customer/historys');?>">
          <i class="fas fa-fw fa-heart"></i>
          <span>Services Order History</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$user['name'];?></span>
          <img class="img-profile rounded-circle" src="<?=base_url('assets/dp/'.$user['image']);?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?= base_url('customer/dashboard/profile');?>">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Profile
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item"  href="<?=base_url('auth/logout');?>">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
          </a>
        </div>
      </li>

    </ul>

  </nav>
  <!-- End of Topbar -->
