<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title)? $title: 'Title-' ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
  <!-- <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/product') ?>">Footware Collection</a>
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link mx-2" href="<?= base_url('product/add') ?>"><i class="fas fa-heart pe-2"></i>Add Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="<?= base_url('cart') ?>"><i class="fas fa-plus-circle pe-2"></i>Cart</a>
          </li>
          <li class="nav-item ms-3">
            <a class="btn btn-danger btn-rounded" href="<?= base_url('auth/logout') ?>">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
<!-- Navbar -->
<header>
  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="<?= base_url('/'); ?>">Footware Collection</a>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
              <a class="nav-link mx-2" href="<?= base_url('product/add') ?>"><i class="fas fa-heart pe-2"></i>Add Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="<?= base_url('cart') ?>"><i class="fas fa-shopping-cart pe-2"></i>Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="<?= base_url('auth/thankyou') ?>"><i class="fas fa-shopping-cart pe-2"></i>Thank you</a>
            </li>
            <li class="nav-item ms-3">
              <a class="btn btn-danger btn-rounded" href="<?= base_url('auth/logout') ?>">Logout</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

