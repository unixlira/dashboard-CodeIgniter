<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>DevLira | OM30</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url('plugins/fontawesome-free/css/all.min.css')?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('dist/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Bem Vindo</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('/')?>" class="brand-link">
      <img src="<?=base_url('dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ADM Alunos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('dist/img/euhack.png')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?=base_url('/')?>" class="d-block">José Roberto Lira</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">      
					<li class="nav-header">ADMINISTRAÇÂO</li>
					<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Alunos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
						<li class="nav-item">
                <a href="<?=base_url()?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Alunos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('alunos/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar Alunos</p>
                </a>
							</li>
            </ul>
					</li>
					<li class="nav-header"></li>
					<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Uniformes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
						<li class="nav-item">
                <a href="<?=base_url('uniformes')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listar Uniformes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('uniformes/create')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cadastrar Uniformes</p>
                </a>
							</li>
            </ul>
					</li>


					<li class="nav-header">RELATÓRIOS</li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>relatorio" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Gerar CSV</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
