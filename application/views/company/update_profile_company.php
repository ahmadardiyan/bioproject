<?php if(validation_errors()){ ?>
		<div>
			<?= validation_errors(); ?>
		</div>
		<?php }
				if($this->session->flashdata('message')){
		?>
		<div>
			<?= $this->session->flashdata('message'); ?>
		</div>
        <?php	} ?>
        
<section id="update-profile">
    <div class="container">
        <div class="row">

            <!-- edit profile -->

            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1"
                style="margin-top:20px;background-color:white">

                <div class="row" style="margin:20px 5px;">

                    <h2>Profile Company</h2>

                    <hr>
                </div>

                <div class="row" style="margin:20px 5px;">
                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id_user" value="<?=$company['id_user'];?>">
                        <input type="hidden" name="foto_lama" value="<?=$company['logo_perusahaan'];?>">

                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan"
                                value="<?=$company['nama_perusahaan'];?>">
                            <small class="form-text text-danger"><?=form_error('nama_perusahaan')?></small>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Tentang Perusahaan</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" cols="30"
                                rows="3"><?=$company['deskripsi_perusahaan'];?></textarea>
                            <small class="form-text text-danger">
                                <?=form_error('deskripsi')?></small>
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <textarea class="form-control" id="website" name="website" cols="30"
                                rows="3"><?=$company['website_perusahaan'];?></textarea>
                            <small class="form-text text-danger">
                                <?=form_error('website')?></small>
                        </div>

                        <div class="form-group">
                            <label for="phone">Telphone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="<?=$company['phone'];?>">
                            <small class="form-text text-danger"><?=form_error('phone')?></small>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" cols="30"
                                rows="3"> <?=$company['alamat_perusahaan'];?> </textarea>
                            <small class="form-text text-danger">
                                <?=form_error('alamat')?></small>
                        </div>

                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select class="form-control" name="provinsi" id="provinsi"></select>
                            <small class="form-text text-danger">
                                <?=form_error('provinsi')?></small>
                        </div>

                        <div class="form-group">
                            <label for="kabupaten">Kabupaten/Kota</label>
                            <select class="form-control" name="kabupaten" id="kabupaten"></select>
                            <small class="form-text text-danger">
                                <?=form_error('kabupaten')?></small>
                        </div>

                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <select class="form-control" name="kecamatan" id="kecamatan"></select>
                            <small class="form-text text-danger">
                                <?=form_error('kecamatan')?></small>
                        </div>


                        <div class="form-group">
                            <label for="foto">Logo Perusahaan</label><br>
                            <img class="img-thumbnail" src="<?=base_url();?>assets/images/profile/<?=$company['logo_perusahaan']?>"
                                width="100px" height="100px">
                            <input type="file" class="form-control-file" id="foto" name="foto">
                            <small class="form-text text-danger">
                                <?=form_error('foto')?>
                            </small>
                        </div>

                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>