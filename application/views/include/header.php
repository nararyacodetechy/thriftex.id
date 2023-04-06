<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Thriftex.id</title>
<link rel="stylesheet" type="text/css" href="<?= get_template_directory_asst('assets/front/styles/bootstrap.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= get_template_directory_asst('assets/front/styles/style.css') ?>">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= get_template_directory_asst('assets/front/fonts/css/fontawesome-all.min.css') ?>">
</head>
<body class="theme-light" data-highlight="highlight-dark" data-gradient="body-default">
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
<input type='hidden' id="base_urls" value="<?= base_url() ?>"/>
<input type='hidden' id="version" value="<?= app_version() ?>"/>
<div id="page">
    <div class="header header-fixed header-logo-center">
        <a href="<?= base_url() ?>" class="header-title"><img class="logo" src="<?= base_url('assets/logo.jpeg') ?>" alt=""></a>
        <!-- <a href="#" data-back-button class="header-icon center-xy header-icon-1"><i class="fas fa-arrow-left"></i></a> -->
        <a href="#" data-menu="menu-sidebar-left-6" class="header-icon center-xy header-icon-1"><i class="fa-solid fa-bars font-18 color-gray-dark"></i></a>
        <!-- <a href="#" data-toggle-theme class="header-icon center-xy header-icon-4"><i class="fas fa-lightbulb"></i></a> -->
        <!-- <i class="fa font-12 fa-home gradient-green rounded-m color-white p-2 "></i> -->
        <!-- <a href="#" data-menu="menu-register-1" class="header-icon center-xy header-icon-4"><img src="<?= base_url() ?>assets/front/images/pictures/faces/3s.png" width="30" class="rounded-circle mb-n1"></a> -->
        <?php
        if($this->session->userdata('login') == true){
        ?>
            <a href="<?= base_url('profile') ?>" class="header-icon center-xy header-icon-4"> <i class="fa-regular fa-circle-user font-25 icon-gray"></i> </a>
        <?php
        }else{
            ?>
            <a href="#" data-menu="menu-login-1" class="header-icon center-xy header-icon-4"> <i class="fa-regular fa-circle-user font-25 icon-gray"></i> </a>
            <?php
        }
        ?>
    </div>

    <!-- <div id="footer-bar" class="footer-bar-1">
        <a href="<?= base_url() ?>" class="active-nav"><i class="fa fa-home"></i><span>Home</span></a>
        <a href="index-components"><i class="fa fa-star"></i><span>Features</span></a>
        <a href="index-pages.html"><i class="fa fa-heart"></i><span>Pages</span></a>
        <a href="index-search.html"><i class="fa fa-search"></i><span>Search</span></a>
        <a href="#" data-menu="menu-settings"><i class="fa fa-cog"></i><span>Settings</span></a>
    </div> -->
        
    <div class="page-content header-clear-large">