
<!-- Begin Page Content -->
<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
	<div class="row">

		<!-- Member Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-bottom-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1" style="font-size: 17px">Jumlah Data Member</div>
							<?php
								$query=$this->db->query("SELECT * FROM member");
								$jml=$query->num_rows();
							?>
							<div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px"><?= $jml; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-3x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Company Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-bottom-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 17px">Jumlah Data Company</div>
							<?php
									$query=$this->db->query("SELECT * FROM perusahaan");
									$jml=$query->num_rows();
							?>
							<div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px"><?= $jml; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-building fa-3x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content Row -->
	<div class="row">

  <!-- Skills Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 17px">Jumlah Data Keahlian</div>
            <?php
                $query=$this->db->query("SELECT * FROM list_keahlian");
                $jml=$query->num_rows();
            ?>
            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px"><?= $jml; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-network-wired fa-3x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Skills Category Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 17px">Jumlah Data Kategori Keahlian</div>
            <?php
                $query=$this->db->query("SELECT * FROM kategori_keahlian");
                $jml=$query->num_rows();
            ?>
            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px"><?= $jml; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-briefcase fa-3x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Portofolio Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 17px">Jumlah Data Portofolio</div>
            <?php
                $query=$this->db->query("SELECT * FROM portofolio");
                $jml=$query->num_rows();
            ?>
            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px"><?= $jml; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-file-alt fa-3x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

	<!-- Project Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1" style="font-size: 17px">Jumlah Data Project</div>
            <?php
                $query=$this->db->query("SELECT * FROM lowongan_kerja");
                $jml=$query->num_rows();
            ?>
            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px"><?= $jml; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-chalkboard-teacher fa-3x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

	<!-- Education Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 17px">Jumlah Data Pendidikan</div>
            <?php
                $query=$this->db->query("SELECT * FROM pendidikan");
                $jml=$query->num_rows();
            ?>
            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px"><?= $jml; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-graduation-cap fa-3x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

	<!-- Certificate Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="font-size: 17px">Jumlah Data Sertifikat</div>
            <?php
                $query=$this->db->query("SELECT * FROM sertifikat");
                $jml=$query->num_rows();
            ?>
            <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px"><?= $jml; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-certificate fa-3x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

	<!-- Pengalaman Kerja Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 17px">Jumlah Data PEngalaman Kerja</div>
						<?php
								$query=$this->db->query("SELECT * FROM pengalaman_kerja");
								$jml=$query->num_rows();
						?>
						<div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 25px"><?= $jml; ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-briefcase fa-3x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>

</div>

	<!-- Content Row -->
