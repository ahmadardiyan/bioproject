<section id='company'>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div id="bio-company">
                    <div class="content">
                        <!-- Foto Profile -->
                        <img class="img-responsive img-profile" src="<?=base_url();?>assets/images/profile/company.png">

                        <!-- Bio -->
                        <div class="member-bio text-center">
                            <h3>
                                Perusahaan XYZ
                            </h3>
                            <p>
                                sebuah start up bergerak dibidang jasa kuliner
                            </p>
                        </div>
                        <hr>
                        <!-- Contact member -->
                        <div class="contact-member">

                            <p><i class="fas fa-phone-square"></i> (021)123456789 </p>
                            <p><i class="fas fa-envelope"></i> companyxyz@xyz.com</p>
                            <p><i class="fas fa-map-marker-alt"></i> Yogyakarta </p>
                        </div>

                        <div class="text-center">
                            <a class="btn btn-primary" href="#">
                                Detail Profile
                            </a>
                            <a class="btn btn-default" href="#">
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xs-12">
                <div id="lowongan-kerja">
                    <div class="content">
                        <h3>Daftar Lowongan Kerja</h3>
                        <hr>
                        <a href="create-lowongan-kerja" class="btn btn-primary" style="float:right; margin-top: -66px;">
                            Tambah Lowongan
                            Kerja </a>

                        <div class="row text-center">

                            <?php foreach($loker as $l) : ?>
                            <a href="<?=base_url()?>detail-lowongan-kerja/<?=$l['id_lowongan_kerja']?>">
                                <div class="col-md-4 col-xs-6">
                                    <div class="thumbnail">
                                        <div class="caption text-center">

                                            <h4 id="thumbnail-label"><?= $l['judul']?></h4>

                                            <div class="thumbnail-description smaller">
                                                <p><?=$l['deskripsi']?></p>
                                            </div>

                                            <hr style="margin-bottom:10px">

                                            <p style="text-align:left"><?=$l['tipe_kerja']?></p>
                                            <p style="float:right ; margin-top:-32px "> <?=date('Y-m-d' , strtotime($l['created_at']))?></p>

                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php endforeach;?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>