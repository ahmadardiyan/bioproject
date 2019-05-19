<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title><?=$title?></title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" />

  <!-- Owl Carousel -->
  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.css" />
  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/owl.theme.default.css" />

  <!-- Magnific Popup -->
  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css" />

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">


  <!-- Custom stylesheet -->
  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

  <?php $this->load->view('partials/user/navbar')?>

  <div class="container">
    <!-- FlashData Notifikasi Berhasil-->
    <?php if ($this->session->flashdata('flash-message')): ?>
    <div class="alert alert-success alert-dismissible show" role="alert" style="margin-top:15px; margin-bottom:-2px">
      Pesanan <strong>berhasil</strong>
      <?=$this->session->flashdata('flash-message');?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif;?>

    <!-- FlashData Notifikasi Gagal Cari-->
    <?php if ($this->session->flashdata('cari-pesanan')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?=$this->session->flashdata('cari-pesanan');?> <strong>kosong</strong>!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif;?>

  </div>