<section id="profile">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-xs-12">

                <!-- Bio Profile -->
                <div class="bio" style="margin-bottom:20px">

                    <!-- Foto Profile -->
                    <img class="img-responsive img-profile"
                        src="<?=base_url();?>assets/images/profile/<?= $member['foto']; ?>">

                    <!-- Bio -->
                    <div class="member-bio text-center">
                        <h3>
                            <?= $member['nama_member']?>
                        </h3>
                        <p>
                            <?= $member['deskripsi_member']?>
                        </p>
                    </div>
                    <hr>
                    <!-- Contact member -->
                    <div class="contact-member">

                        <p> <i class="fas fa-phone-square"></i> <?= $member['phone_member']?></p>

                        <p><i class="fas fa-envelope"></i> ahmadardiyanto23@gmail.com</p>
                        <p><i class="fas fa-map-marker-alt"></i> <?=$member['nama_kab']?></p>
                    </div>

                    <div class="text-center">
                        <a class="btn btn-default" href="<?=base_url()?>update-profile">
                            Edit Profile
                        </a>
                    </div>

                </div>

                <!-- Keahlian -->
                <div id="keahlian">

                    <h3>Skills</h3>
                    <hr>
                    <a href="<?=base_url()?>update-keahlian" class="btn btn-primary"
                        style="float:right; margin-top: -66px;"> Tambah Skills
                    </a>
                    <div class="row ">

                        <div id="keahlian-member"></div>

                    </div>

                </div>

                <div id="sertifikat">
                    <div class="content">
                        <h3>Sertifikat</h3>
                        <hr>
                        <a href="<?=base_url()?>sertifikat" class="btn btn-primary"
                            style="float:right; margin-top: -66px;"> Semua Sertifikat </a>

                        <?php if (!empty($sertifikat)) :?>
                        <?php foreach ($sertifikat as $s) : ?>

                        <div class="list-sertifikat" style="margin-bottom:15px">
                            <h4 style="margin-bottom:0px"><?= $s['nama_sertifikat']?></h4>
                            <p><?= $s['tahun']?></p>
                        </div>

                        <?php endforeach;?>
                        <?php else : ?>

                        <p>Not Found !</p>

                        <?php endif;?>

                    </div>
                </div>
            </div>


            <!-- portofolio -->
            <div class="col-md-8 col-xs-12">

                <div id="portofolio">
                    <div class="row" style="margin:20px 5px 10px 5px;">

                        <h3>Portofolio</h3>
                        <a href="create-portofolio" class="btn btn-primary" style="float:right; margin-top: -50px;">
                            Tambah
                            Porfolio </a>
                        <hr>

                    </div>

                    <div class="row text-center">

                        <?php if (!empty($portofolio)) :?>
                        <?php foreach ($portofolio as $p) : ?>

                        <div class="col-md-4 col-xs-6">
                            <div class="thumbnail">
                                <div class="caption text-center">

                                    <img class="img-responsive img-portofolio"
                                        src="<?= base_url();?>assets/images/profile/<?= $p['foto'];?>"
                                        style="height:190px;" />

                                    <h4 id="thumbnail-label"><a
                                            href="<?=base_url()?>detail-portofolio/<?=$p['id_portofolio']?>"><?= $p['judul'];?></a>
                                    </h4>

                                    <!-- <div class="thumbnail-description smaller"><?= $p['deskripsi'];?></div> -->

                                </div>
                            </div>
                        </div>


                        <?php endforeach;?>
                        <?php else : ?>

                        <p>Not Found !</p>

                        <?php endif;?>

                    </div>

                    <!-- end portofolio -->
                </div>

                <div id="pengalaman-kerja">
                    <div class="content">
                        <h3>Pengalaman Kerja</h3>
                        <a href="create-pengalaman-kerja" class="btn btn-primary"
                            style="float:right; margin-top: -50px;">
                            Tambah Pengalaman Kerja </a>
                        <hr>

                    </div>
                </div>

            </div>
        </div>
</section>