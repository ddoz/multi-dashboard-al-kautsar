<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.4.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Multi Dashboard Application</title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=template('default')?>assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link href="<?=template('default')?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/datapicker/datepicker3.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
    <link href="<?=template('default')?>vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
  </head>
  <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      <div class="c-sidebar-brand d-lg-down-none">
        <img src="<?=base_url()?>assets/img/alkautsar.png" class="img-thumbnail" width="80" alt="">
      </div>
      <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard</a></li>
        <li class="c-sidebar-nav-title">SIMSIAK</li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>siswa/homesiswa">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
            </svg> Home Siswa</a></li>
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-cog"></use>
            </svg> Pengelolaan</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>siswa/kelolakelas" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-building"></use>
                </svg> Kelas</a></li>
              <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>siswa/kelolatahunakademik" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-building"></use>
                </svg> Tahun Akademik</a></li>
              <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>siswa/kelolasiswa" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg> Siswa</a></li>
              <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>siswa/kelolakeuangan" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-money"></use>
                </svg> Keuangan</a></li>
            
          </ul>
        </li>
        
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>siswa/laporansiswa">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-print"></use>
            </svg> Laporan Siswa</a></li>
            
        <li class="c-sidebar-nav-title">SINAI</li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>staff/homestaff">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
            </svg> Home Staff</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>staff/kelolastaff">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
            </svg> Pengelolaan</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>staff/laporanstaff">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-print"></use>
            </svg> Laporan</a></li>
            <li class="c-sidebar-nav-title">SIDMA</li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>dma/homedma">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
            </svg> Home DMA</a></li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-cog"></use>
            </svg> Pengelolaan</a>
          <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>dma/kelolabarang" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-building"></use>
                </svg> Barang</a></li>
              <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>dma/kelolagedung" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-building"></use>
                </svg> Gedung &amp; Ruangan</a></li>
              <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>dma/kelolalayanan" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg> Layanan</a></li>
              <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>dma/kelolaperbaikan" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-money"></use>
                </svg> Perbaikan</a></li>
              <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>dma/kelolateknisi" target="_top">
                <svg class="c-sidebar-nav-icon">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-money"></use>
                </svg> Teknisi</a></li>
            
          </ul>
        </li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>dma/laporandma">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-print"></use>
            </svg> Laporan</a></li>
        <!-- <li class="c-sidebar-nav-divider"></li> -->
        <li class="c-sidebar-nav-title">Setting</li>
        <?php if(isSuper()) { ?>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>setting/kelolaunitkerja">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-list"></use>
            </svg> Unit Kerja</a></li>
            
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="<?=base_url()?>setting/kelolauser">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-user"></use>
            </svg> User</a></li>
            <?php } ?>
      </ul>
      <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
    <div class="c-wrapper c-fixed-components">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
          <svg class="c-icon c-icon-lg">
            <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
          </svg>
        </button><a class="c-header-brand d-lg-none" href="#">
          <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="<?=template('default')?>assets/brand/coreui.svg#full"></use>
          </svg></a>
        <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
          <svg class="c-icon c-icon-lg">
            <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
          </svg>
        </button>
        <ul class="c-header-nav d-md-down-none">
          <li>Yayasan Al Kautsar Lampung | Anda Login Sebagai <b><?=ucfirst($this->session->userdata('nama'))?></b></li>
        </ul>
        <ul class="c-header-nav ml-auto mr-4">
          <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="c-avatar"><img class="c-avatar-img" src="<?=base_url()?>assets/img/user.svg" alt="user@email.com"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
              <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg> Profile</a><a class="dropdown-item" href="#">
                <svg class="c-icon mr-2">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                </svg> Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?=base_url()?>welcome/logout">
                <svg class="c-icon mr-2">
                  <use xlink:href="<?=template('default')?>vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                </svg> Logout</a>
            </div>
          </li>
        </ul>
        <div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <?=$breadcumb?>
        </div>
      </header>
      <div class="c-body">
        <main class="c-main">
          <?php $this->load->view($content);?>
        </main>
        