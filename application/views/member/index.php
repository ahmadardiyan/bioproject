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

                <!-- Skills -->
                <div id="skills">

                    <h3>Skills</h3>
                    <hr>
                    <a href="#" class="btn btn-primary" style="float:right; margin-top: -66px;"> Tambah Skills
                    </a>
                    <div class="row text-center">

                        <?php if (!empty($skills)) : ?>
                        <?php foreach ($skills as $skill) : ?>

                        <div class="col">
                            <p class="label label-default"><?=$skill['nama_keahlian'];?></p>
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
                    <div class="row" style="margin:20px 5px;">

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
                                    <div >
                                        <img class="img-responsive img-portofolio" src="<?= base_url();?>assets/images/profile/<?= $p['foto'];?>"
                                            style="height:190px;background-size: cover;text-align: center;	position: relative;" />
                                    </div>
                                    <h4 id="thumbnail-label"><a href="#" target="_blank"><?= $p['judul'];?></a></h4>
                                    <!-- <div class="thumbnail-description smaller"><?= $p['deskripsi'];?></div> -->
                                </div>
                            </div>
                        </div>


                        <?php endforeach;?>
                        <?php else : ?>

                        <p>Not Found !</p>

                        <?php endif;?>

                        <?php //foreach ($portofolio as $p) : ?>
                        <!-- <div class="col-sm-4 col-xs-12">
                            <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="600ms">
                                <div class="img-wrapper">
                                    <img src="<?= base_url();?>assets/images/profile/<?= $p['foto'];?>"
                                        class="img-responsive" width="500px" height="500px">
                                    <div class="overlay">
                                        <div class="buttons">
                                            <a rel="gallery" class="fancybox"
                                                href="<?= base_url();?>assets/images/profile/<?= $p['foto'];?>">Demo</a>
                                            <a target="_blank"
                                                href="<?=base_url()?>detail-portofolio/<?= $p['id_portofolio']?>">Details</a>
                                        </div>
                                    </div>
                                </div>
                                <figcaption>
                                    <h4><?= $p['judul'];?></h4>
                                    <p><?= $p['deskripsi'];?> </p>
                                </figcaption>
                            </figure>
                        </div> -->
                        <?php //endforeach;?>

                    </div>

                    <!-- end portofolio -->
                </div>
            </div>
        </div>
</section>