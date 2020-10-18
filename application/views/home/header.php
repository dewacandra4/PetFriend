<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>assets/img/logo_sm.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/owl.carousel.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/animate.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/style.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/default/css/style.css">
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <a href="<?=base_url('home'); ?>">
                                <img class="logo" src="<?= base_url()?>assets/img/logo_trans.png" alt="PetFriend" >
                            </a>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="<?=base_url('home/products');?>" class="scroll">Products</a></li>
                                        <li><a href="<?=base_url('home/services');?>" class="scroll">Services</a></li>
                                        <li><a href="#">Account <i class="fa fa-angle-down fa-5x" aria-hidden="true"></i></a>
                                            <ul class="submenu">
                                                <?php if (is_admin() == 1) : ?>
                                                    <li><a href="<?=base_url('admin/dashboard'); ?>">My Account</a></li>
                                                    <li><a href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                                                <?php elseif(is_admin() == 2) : ?>
                                                    <li><a href="<?= base_url('customer/dashboard'); ?>">My Account</a></li>
                                                    <li><a href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                                                <?php elseif(is_admin() == 3) : ?>
                                                    <li><a href="<?= base_url('doctor/dashboard'); ?>">My Account</a></li>
                                                    <li><a href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                                                <?php else : ?>
                                                    <li><a href="<?=base_url('auth/login'); ?>">Login</a></li>
                                                    <li><a href="<?=base_url('auth/registration'); ?>">Register</a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <form action="<?= base_url('Home/search');?>" method="post">
                                                <div class="input-group mx-1">
                                                    <input type="text"  class="form-control" id="keyword" name="keyword" placeholder="Search" autocomplete="off">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-default" type="submit">
                                                                <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form> 
                                        </li>
                                        <?php if (is_admin() == 2) : ?>
                                        <li>
                                            <a href="<?= base_url('Home/cart'); ?>" class="nav-link "><span class="fa fa-shopping-cart fa-2x"></span>[<span class="cart-item-total"><?php echo $this->cart->total_items();?></span>]</a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
