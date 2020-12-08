<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-green sidebar sidebar-dark accordion" id="accordionSidebar">

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
        <a class="nav-link" href="<?=base_url('doctor/dashboard');?>">
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
      <li class="nav-item <?php if($uri2=='doctor/dashboard/profile'){ echo 'active';}?>">
      <a class="nav-link" href="<?=base_url('doctor/dashboard/profile');?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span></a>
      </li>

      <!-- Nav Item - Edit Profile -->

      <li class="nav-item <?php if($uri2 =='doctor/dashboard/edit'){ echo 'active';}?>">
      <a class="nav-link" href="<?=base_url('doctor/dashboard/edit');?>">
          <i class="fas fa-fw fa-user-edit"></i>
          <span>Edit Profile</span></a>
      </li>
      <!-- Nav Item - Change password -->
      <li class="nav-item <?php if($uri2=='doctor/dashboard/change_password'){ echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('doctor/dashboard/change_password');?>">
          <i class="fas fa-fw fa-key"></i>
          <span>Change Password</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Diseases 
      </div>
      <!-- Nav Item - Charts -->
      <li class="nav-item <?php if($uri=='doctor/manage_diseases'){ echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('doctor/manage_diseases');?>">
          <i class="fas fa-fw fa-book-medical"></i>
          <span>Data Diseases</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Symptoms
      </div>
      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($uri=='doctor/manage_sympt'){ echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('doctor/manage_sympt');?>">
          <i class="fas fa-fw fa-notes-medical"></i>
          <span>Symptoms</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Data CF
      </div>
      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($uri=='doctor/manage_cf'){ echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('doctor/manage_cf');?>">
          <i class="fas fa-fw fa-calculator"></i>
          <span>CF Value</span></a>
      </li>
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Diagnosis History 
      </div>

      <li class="nav-item <?php if($uri=='doctor/history_diagnosis'){ echo 'active';}?>">
        <a class="nav-link" href="<?=base_url('doctor/history_diagnosis');?>">
          <i class="fas fa-fw fa-heart"></i>
          <span>Diagnosis Result History</span></a>
      </li>
       <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Order 
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('doctor/dashboard/pethealth_list');?>">
          <i class="fas fa-fw fa-heart"></i>
          <span>Pet Health Order List</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('doctor/dashboard/history_phealth');?>">
          <i class="fas fa-fw fa-heart"></i>
          <span>Pet Health Order History</span></a>
      </li>
      <!-- Divider
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Chat
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('chat');?>">
          <i class="fas fa-fw fa-bone"></i>
          <span>Chat</span></a>
      </li> -->
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
