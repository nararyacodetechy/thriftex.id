<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Thriftex.id</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="google-site-verification" content="LJQFrrpKjyEj7HfR1mIoog_zfcQbxWGTYCOu08wefDg" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('assets/ico/apple-icon-57x57.png') ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('assets/ico/apple-icon-60x60.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('assets/ico/apple-icon-72x72.png') ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/ico/apple-icon-76x76.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('assets/ico/apple-icon-114x114.png') ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('assets/ico/apple-icon-120x120.png') ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('assets/ico/apple-icon-144x144.png') ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('assets/ico/apple-icon-152x152.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/ico/apple-icon-180x180.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= base_url('assets/ico/android-icon-192x192.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/ico/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/ico/favicon-96x96.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/ico/favicon-16x16.png') ?>">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_asst('assets/front/styles/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_asst('assets/front/styles/style.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_asst('assets/front/fonts/css/fontawesome-all.min.css') ?>">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CZVCXHDPH1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-CZVCXHDPH1');
    </script>
</head>
<body class="theme-light" data-highlight="highlight-dark" data-gradient="body-default">
    <div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    <input type='hidden' id="base_urls" value="<?= base_url() ?>"/>
    <input type='hidden' id="version" value="<?= app_version() ?>"/>
    <div id="page">
        <div class="header header-fixed header-logo-center">
            <a href="<?= base_url() ?>" class="header-title"><img class="logo main_logo" id="main_logo" src="<?= base_url('assets/logo.jpeg') ?>" alt=""></a>
            <a href="#" data-menu="menu-sidebar-left-6" class="header-icon center-xy header-icon-1"><i class="fa-solid fa-bars font-18 color-gray-dark"></i></a>
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
            
        <div class="page-content header-clear-large">