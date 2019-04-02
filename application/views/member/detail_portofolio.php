<section id="blog-full-width">
    <div class="container">

        <?php $this->load->view('partials/user/head_profile');?>

		<div class="row detail-portofolio mt-5">
			<div class="col-lg-6 text-center ">
				<img src="<?=base_url();?>assets/images/profile/<?=$portofolio['foto']?>"
					alt="<?=$portofolio['foto']?>" class="img-fluid">
			</div>
			<div class="col-lg-5 text-center">
				<h3><?=$portofolio['judul']?></h3>
				<p><?=$portofolio['deskripsi']?></p>
				<!-- tambah kategori -->

				<!-- tambah comment mungkin -->

				<a href="<?=base_url()?>edit-portofolio/<?= $portofolio['id_portofolio']?>" class="btn btn-success">Edit Portofolio</a>
				<a href="<?=base_url()?>delete-portofolio/<?= $portofolio['id_portofolio']?>" class="btn btn-danger"  onclick="return confirm('Anda yakin ingin menghapus portofolio anda ?');">Delete</a>
				<a href="<?=base_url()?>profile" class="btn btn-primary">Kembali</a>
			</div>
		</div>

	</div>
</section>
<!-- end container -->