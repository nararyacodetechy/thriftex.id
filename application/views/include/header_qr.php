<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php
    $title_show = 'Thriftex - Legit Check & Authentic';
    $description = 'Thriftex - Temukan Keaslian Produk Anda dengan Mudah dan Cepat di Situs Legit Check Kami. Cek Kredibilitas dan Otentisitas Barang Branded Anda sekarang.';
    $img = base_url('assets/logo.jpeg');
    if($this->uri->segment(1) == ''){
        $title_show = 'Thriftex - Legit Check & Authentic';
        $description = 'Thriftex - Temukan Keaslian Produk Anda dengan Mudah dan Cepat di Situs Legit Check Kami. Cek Kredibilitas dan Otentisitas Barang Branded Anda sekarang.';
        $img = base_url('assets/logo.jpeg');
    }else{
        if(isset($page_title)){
            $title_show = $page_title.' - Thriftex.id';
        }
        if(isset($description_page)){
            $description = $description_page;
        }
        if(isset($img_page)){
            $img = $img_page;
        }
    }
    ?>
    <title><?= $title_show ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="google-site-verification" content="LJQFrrpKjyEj7HfR1mIoog_zfcQbxWGTYCOu08wefDg" />
    <meta name="description" content="<?= $description ?>" >
    <meta property="og:title" content="<?= $title_show ?>"/>
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<?= $description ?>" />
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:image" content="<?= base_url('assets/logo.jpeg') ?>" />

    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('assets/ico/apple-icon-57x57.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/ico/apple-icon-180x180.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= base_url('assets/ico/android-icon-192x192.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/ico/favicon-16x16.png') ?>">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_asst('assets/front/styles/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_asst('assets/front/styles/style.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_asst('assets/front/fonts/css/fontawesome-all.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_asst('assets/front/styles/slick.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_asst('assets/front/styles/slick-theme.css') ?>">
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
        <div class="header header-fixed header-logo-center center-xy">
            <!-- <a href="<?= createurl('/') ?>" class="header-title"><img class="logo main_logo" id="main_logo" src="<?= base_url('assets/logo.jpeg') ?>" alt=""></a> -->
            <!-- <a href="#" data-menu="menu-sidebar-left-6" class="header-icon center-xy header-icon-1"><i class="fa-solid fa-bars font-18 color-gray-dark"></i></a> -->
            <?php
            if($is_home == false){ ?>
                <a href="<?= $page_full_url ?>" class="header-icon center-xy header-icon-1"><svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="24" height="24" fill="white"/><path d="M18 12L6 12M6 12L11 17M6 12L11 7" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
            <?php } ?>
            <a href="<?= createurl('/') ?>" class=" center-xy header-icon-4" style="width: auto;right: 13px;"><h1 style="font-size: 20px;"><?= $page_title ?></h1></a>
        </div>
            
        <div class="page-content " style="padding-top: 80px;">