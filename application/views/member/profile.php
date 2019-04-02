<section id="blog-full-width">
    <div class="container">

        <?php $this->load->view('partials/user/head_profile');?>

        <!-- portofolio -->
        <div class="row text-center" style="margin:20px 5px;">
            <a href="create-portofolio" class="btn btn-primary"> Tambah Porfolio </a>
        </div>

        <div class="row">

            <?php foreach ($portofolio as $p) : ?>
            <div class="col-sm-4 col-xs-12">
                <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="600ms">
                    <div class="img-wrapper">
                        <img src="<?= base_url();?>assets/images/profile/<?= $p['foto'];?>" class="img-responsive" width="500px" height="500px">
                        <div class="overlay">
                            <div class="buttons">
                                <a rel="gallery" class="fancybox" href="<?= base_url();?>assets/images/profile/<?= $p['foto'];?>">Demo</a>
                                <a target="_blank" href="<?=base_url()?>detail-portofolio/<?= $p['id_portofolio']?>">Details</a>
                            </div>
                        </div>
                    </div>
                    <figcaption>
                        <h4><?= $p['judul'];?></h4>
                        <p><?= $p['deskripsi'];?>                        </p>
                    </figcaption>
                </figure>
            </div>
            <?php endforeach;?>

        </div>
        <!-- end portofolio -->

    </div>
</section>