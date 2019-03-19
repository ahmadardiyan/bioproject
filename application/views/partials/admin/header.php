<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap core CSS-->
	<link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template-->
	<link href="<?= base_url() ?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<!-- Page level plugin CSS-->
	<link href="<?= base_url() ?>assets/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url() ?>assets/css/sb-admin.css" rel="stylesheet">

	<title>
		<?=$judul?>
	</title>

</head>

<body id="page-top">

	<?php $this->load->view("partials/admin/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("partials/admin/sidebar.php") ?>

		<div id="content-wrapper">
			
			<div class="container-fluid">