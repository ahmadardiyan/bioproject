<section id="blog-full-width">
    <div class="container">
        <div class="row">

            <?php $this->load->view('partials/user/sidebar');?>

            <!-- edit profile -->
            <div class="row">
                <div class="col-md-7">

                    <form action="" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id_user" value="<?=$member['id_user'];?>">
                        <input type="hidden" name="foto_lama" value="<?=$member['foto'];?>">

                        <div class="form-group">
                            <label for="nama_member">Nama</label>
                            <input type="text" class="form-control" id="nama_member" name="nama_member"
                                value="<?=$member['nama_member'];?>" readonly>
                            <small class="form-text text-danger"><?=form_error('nama_member')?></small>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi_member">Tentang Saya</label>
                            <textarea class="form-control" id="deskripsi_member" name="deskripsi_member" cols="30"
                                rows="3"><?=$member['deskripsi_member'];?></textarea>
                            <small class="form-text text-danger">
                                <?=form_error('deskripsi_member')?></small>
                        </div>

                        <div class="form-group">
                            <label for="gender_member">Jenis Kelamin</label> <br>
                            <label class="radio-inline">
                                <input type="radio" name="gender_member" id="inlineRadio1" value="Laki-laki"> Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="gender_member" id="inlineRadio2" value="Perempuan"> Perempuan
                            </label>
                            <small class="form-text text-danger"><?=form_error('gender_member')?></small>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="<?=$member['tempat_lahir'];?>">
                            <small class="form-text text-danger"><?=form_error('tempat_lahir')?></small>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control tanggal mb-2" name="tanggal_lahir" id="tanggal_lahir"
                                value="<?= date('d-m-Y' , strtotime($member['tanggal_lahir']));?>">
                            <small class="form-text text-danger"><?=form_error('tanggal_lahir')?></small>
                        </div>

                        <div class="form-group">
                            <label for="phone_member">Telphone</label>
                            <input type="text" class="form-control" id="phone_member" name="phone_member"
                                value="<?=$member['phone_member'];?>">
                            <small class="form-text text-danger"><?=form_error('phone_member')?></small>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" cols="30"
                                rows="3"> <?=$member['alamat'];?> </textarea>
                            <small class="form-text text-danger">
                                <?=form_error('alamat')?></small>
                        </div>

                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="provinsi">Provinsi</label>
                                        <select class="form-control" name="provinsi" id="provinsi"></select>
                                        <small class="form-text text-danger">
                                            <?=form_error('provinsi')?></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kabupaten">Kabupaten</label>
                                        <select class="form-control" name="kabupaten" id="kabupaten"></select>
                                        <small class="form-text text-danger">
                                            <?=form_error('kabupaten')?></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <select class="form-control" name="kecamatan" id="kecamatan"></select>
                                        <small class="form-text text-danger">
                                            <?=form_error('kecamatan')?></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="foto">Foto Profile</label><br>
                            <img class="img-thumbnail" src="<?=base_url();?>assets/images/profile/<?=$member['foto']?>"
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