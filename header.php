<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    E-DOUANES SYSTEM
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>


<?php 
  include_once'navbar.php';
?>
<div class="sidebar" data-color="orange">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            E-
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Douanes
            </a>
            
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
            <li>
                <a href="dashboard.php">
                <i class="now-ui-icons design_app"></i>
                <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="usermanager.php">
                <i class="now-ui-icons education_atom"></i>
                <p>Gestion Utilisateurs</p>
                </a>
            </li>
            <li>
                <a href="itemdouanemanger.php">
                <i class="now-ui-icons location_map-big"></i>
                <p>Gestion tarifs douaniers</p>
                </a>
            </li>
            <li>
                <a href="gestionclient.php">
                <i class="now-ui-icons ui-1_bell-53"></i>
                <p>Gestions Clients</p>
                </a>
            </li>
            <li>
                <a href="cotationmanager.php">
                <i class="now-ui-icons users_single-02"></i>
                <p>Gestion Cotation</p>
                </a>
            </li>
            <li>
                <a href="facturation.php">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p>Gestion Facturation</p>
                </a>
            </li>
            <li>
                <a href="chainelogistique.php">
                <i class="now-ui-icons text_caps-small"></i>
                <p>Chaîne logistique</p>
                </a>
            </li>
            <li>
                <a href="settings.php">
                <i class="now-ui-icons text_caps-small"></i>
                <p>Paramètres système</p>
                </a>
            </li>
            </ul>
        </div>
    </div>
    <div class="main-panel" id="main-panel">
       
        <!-- End Navbar -->
        
        <!-- <div class="panel-header panel-header-lg">
            <canvas id="bigDashboardChart"></canvas>
        </div>  -->
    </div>