	
<header id="top-bar" class="navbar-fixed-top animated-header">
	<div class="container">
		<div class="navbar-header">
			<!-- responsive nav button -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!-- /responsive nav button -->

			<!-- logo -->
			<div class="navbar-brand">
				<a href="home">
					<img src="assets/images/logo.png" alt="">
				</a>
			</div>
			<!-- /logo -->

		</div>
		<!-- main menu -->
		<nav class="collapse navbar-collapse navbar-left" role="navigation">
			<div class="main-menu">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="#about">About </a></li>
					<li><a href="#howitworks"> How It Works</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Categories <span class="caret"></span></a>
						<div class="dropdown-menu">
							<ul>
								<li><a href="#">Latest</a></li>
								<li><a href="#">Most Populart</a></li>
								<li><a href="#"> Most Viewed</a></li>
							</ul>
						</div>
					</li>
					<li><a href="#footer"> Contact</a></li>
				</ul>
			</div>
		</nav>

		<nav class="collapse navbar-collapse navbar-right" role="navigation">
			<div class="main-menu">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?= base_url();?>login"> Sign in </a></li>
					<li><a href="<?= base_url();?>logout"> Sign Out </a></li>
				</ul>
			</div>
		</nav>

		<!-- Profil Image/Logout -->
		<!-- <ul class="navbar-nav collapse navbar-collapse navbar-right ml-auto">
			<li class="nav-item dropdown no-arrow">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
				 aria-expanded="false">
					<img src="<?=base_url()?>assets/images/profile/img3.png" alt="" class="rounded-circle">
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
				</div>
			</li>
		</ul> -->
		<!-- end Profil Image/Logout -->
		
		<!-- /main nav -->
	</div>
</header>