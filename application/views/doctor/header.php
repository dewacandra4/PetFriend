<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=$title;?></title>

   <!-- Custom fonts for this template-->
  <link href="<?= base_url()?>assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="<?= base_url()?>assets/default/css/style.css">
  <!-- Material Design Bootstrap -->
  <link href="<?= base_url()?>assets/css/mdb.min.css" rel="stylesheet">

  <!-- Datatable cdn NP -->
  <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url()?>assets/img/logo_sm.png">
  <!-- Custom styles for this template-->
  <link href="<?= base_url()?>assets/sbadmin/css/sb-admin-2.css" rel="stylesheet">
  <!-- <link href="<?= base_url()?>assets/css/addons/datatables2.min.css" rel="stylesheet"> -->

  <!-- JS -->
  <script src="<?= base_url()?>assets/js/date-eu.js"></script>
  <script src="<?= base_url()?>assets/js/addons/datatables.min.js"></script>
  <script src="http://code.jquery.com/jquery-2.0.3.min.js" data-semver="2.0.3" data-require="jquery"></script>
  <!--DataTables P-->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" /> -->
  <!--Daterangepicker -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  


</head>
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button.current, 
.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
    color: white !important;
    border: 1px solid #32a860!important;
    background-color: #32a860!important;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #32a860), color-stop(100%, #32a860))!important;
    background: -webkit-linear-gradient(top, #32a860 0%, #32a860 100%)!important;
    background: -moz-linear-gradient(top, #32a860 0%, #32a860 100%)!important;
    background: -ms-linear-gradient(top, #32a860 0%, #32a860 100%)!important;
    background: -o-linear-gradient(top, #32a860 0%, #32a860 100%)!important;
    background: linear-gradient(to bottom, #32a860 0%, #32a860 100%)!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  background: #f2f5f2;
  color: black!important;
  border-radius: #e6e8e6 0px !important; 
  border: 1px #e6e8e6 solid;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:active {
  background: #f2f5f2;
  color: black!important;
} 
</style>
