<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIPK</title>
  <link rel="icon" href="<?php echo base_urL('assets/img/icon.png');?>" type="image/ico">
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url ('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url ('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('../sipk');?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-tree"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIPK </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($this->uri->segment(2)==""){echo "active";}?>">
        <a class="nav-link" href="<?php echo base_url ('');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <?php if ($this->m_login->hak_akses($this->session->userdata('nip_pengguna')) == 2) { ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan Keluhan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if($this->uri->segment(2)=="lihat_laporan"){echo "active";}?> 
      <?php if($this->uri->segment(2)=="lapor_keluhan"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Keluhan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="<?php echo base_url ('admin/lapor_keluhan');?>">Laporkan Keluhan</a>
            <a class="collapse-item" href="<?php echo base_url ('admin/lihat_laporan');?>">Lihat Keluhan Operator</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Kelola Kategori
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if($this->uri->segment(2)=="tambah_kategori"){echo "active";}?> 
      <?php if($this->uri->segment(2)=="lihat_kategori"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Kelola Kategori</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url ('admin/tambah_kategori');?>">Tambah Kategori</a>
            <a class="collapse-item" href="<?php echo base_url ('admin/lihat_kategori');?>">Lihat Kategori</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Kelola Pengguna
      </div>
      <li class="nav-item <?php if($this->uri->segment(2)=="lihat_laporan"){echo "active";}?> 
      <?php if($this->uri->segment(2)=="lapor_keluhan"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-users"></i>
          <span>Kelola Pengguna</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('admin/lihat_pengguna'); ?>">Kelola Pengguna</a>
            <a class="collapse-item" href="<?php echo base_url('admin/lihat_ktp_pengguna'); ?>">Kelola KTP Pengguna</a>
            <a class="collapse-item" href="<?php echo base_url('admin/lihat_user'); ?>">Kelola User</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <?php } ?>
      <?php if ($this->m_login->hak_akses($this->session->userdata('nip_pengguna')) == 1) { ?>
        <hr class="sidebar-divider">
      <!-- kepalaphh -->
      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan Keluhan
      </div>
      <li class="nav-item <?php if($this->uri->segment(2)=="lihat_laporan"){echo "active";}?> 
      <?php if($this->uri->segment(2)=="lapor_keluhan"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-cog"></i>
          <span>Keluhan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('kepalaphh/lapor_keluhan'); ?>">Laporan Keluhan </a>
            <a class="collapse-item" href="<?php echo base_url('kepalaphh/lihat_laporan'); ?>">Lihat Keluhan Operator</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Kelola Kategori
      </div>
      <li class="nav-item <?php if($this->uri->segment(2)=="tambah_kategori"){echo "active";}?> 
      <?php if($this->uri->segment(2)=="lihat_kategori"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Kelola Kategori</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url ('kepalaphh/tambah_kategori');?>">Tambah Kategori</a>
            <a class="collapse-item" href="<?php echo base_url ('kepalaphh/lihat_kategori');?>">Lihat Kategori</a>
          </div>
        </div>
      </li>
<hr class="sidebar-divider">
 <div class="sidebar-heading">
        Kelola Pengguna
      </div>
      <li class="nav-item <?php if($this->uri->segment(2)=="lihat_laporan"){echo "active";}?> 
      <?php if($this->uri->segment(2)=="lapor_keluhan"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Kelola Pengguna</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('kepalaphh/lihat_pengguna'); ?>">Kelola Pengguna</a>
            <a class="collapse-item" href="<?php echo base_url('kepalaphh/lihat_ktp_pengguna'); ?>">Kelola KTP Pengguna</a>
            <a class="collapse-item" href="<?php echo base_url('kepalaphh/lihat_user'); ?>">Kelola User</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Cetak Laporan
      </div>
      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if($this->uri->segment(2)=="cetak_laporan_keluhan"){echo "active";}?>">
        <a class="nav-link" href="<?php echo base_url('kepalaphh/cetak_laporan_keluhan')?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Cetak Laporan Keluhan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <?php } ?>
      </br>
      </br>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->