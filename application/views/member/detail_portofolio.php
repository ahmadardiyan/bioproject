<section id="detail-portofolio">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
				<div class="row " style=" margin-top: 20px;margin-bottom: 20px; background-color: white; padding: 15px">

					<div class="col-md-4 text-center ">
						<img src="<?=base_url();?>assets/images/profile/<?=$portofolio['foto']?>"
							alt="<?=$portofolio['foto']?>" class="img-responsive img-portofolio"
							style="height:300px;">
					</div>
					<div class="col-md-7" style="">
						<h3><?=$portofolio['judul']?></h3>
						<small>uploaded <?= date('d-m-Y' , strtotime($portofolio['created_at']));?></small>
						<p><?=$portofolio['deskripsi']?></p>
						<!-- tambah kategori -->

						<a href="<?=base_url()?>edit-portofolio/<?= $portofolio['id_portofolio']?>"
							class="btn btn-success">Edit
							Portofolio</a>
						<a href="<?=base_url()?>delete-portofolio/<?= $portofolio['id_portofolio']?>"
							class="btn btn-danger"
							onclick="return confirm('Anda yakin ingin menghapus portofolio anda ?');">Delete</a>
						<a href="<?=base_url()?>member" class="btn btn-primary">Kembali</a>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>