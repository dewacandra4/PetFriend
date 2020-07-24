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
    <!-- <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/flaticon.css"> -->
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/animate.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/anipat/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
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
                            <div class="logo">
                                <a href="index.html">
                                    <img src="<?= base_url()?>assets/img/logo_trans.png" alt="PetFriend" width=90% height=50%>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a  href="<?=base_url('home'); ?>">home</a></li>
                                        <li><a href="about.html">Products</a></li>
                                        <li><a href="service.html">Services</a></li>
                                        <li><a href="#">Account <i class="fa fa-angle-down fa-5x" aria-hidden="true"></i></a>
                                            <ul class="submenu">
                                                <li><a href="<?=base_url('auth/login'); ?>">Login</a></li>
                                                <li><a href="<?=base_url('auth/registration'); ?>">Register</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
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
