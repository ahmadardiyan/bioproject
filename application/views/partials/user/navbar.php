	<nav id="top-bar" class="navbar-fixed-top animated-header">
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
						<label>BIO PROJECT</label>
						<!-- <img src="assets/images/logo.png" alt=""> -->
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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Categories <span
									class="caret"></span></a>
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

						<li><a href="<?= base_url();?>login"> Login </a></li>
						<!-- <li><img src="<?=base_url()?>assets/images/profile/img3.png" class="img-circle" width="50px"></li> -->

						<!-- Profil Image/Logout -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
								data-toggle="dropdown" style="padding: 0px">
								<img src="<?=base_url()?>assets/images/profile/<?= $member['foto_member'] ?>" alt="" class="img-circle"
									width="50px">
							</a>

							<div class="dropdown-menu dropdown-menu-right">
								<ul>
									<li><a href="<?php base_url()?>profile">Profile</a></li>
									<li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
								</ul>
							</div>

						</li>
						<!-- end Profil Image/Logout -->

					</ul>
				</div>
			</nav>

		</div>
	</nav>