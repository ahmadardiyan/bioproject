
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800"><?= $title; ?></h1>

          <!-- Page Heading -->



          <div class="d-sm-flex align-items-center justify-content-between mb-4">

						<div class="card mb-3 col-lg-8">
						  <div class="row no-gutters">
						    <div class="col-md-4">
						      <img src="<?= base_url('assets/images/profile/') . $user['image']; ?>" class="card-img">
						    </div>
						    <div class="col-md-8">
						      <div class="card-body">
						        <h5 class="card-title"><?= $user['firstname']. " ". $user['lastname']; ?></h5>
						        <p class="card-text"><?= $user['email']; ?></p>
						        <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
						      </div>
						    </div>
						  </div>
						</div>
          </div>
        </div>
