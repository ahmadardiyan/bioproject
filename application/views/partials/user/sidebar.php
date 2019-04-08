<div class="col-md-4">
    <div class="sidebar" style="padding-top: 10px">

        <div class="author widget" style="margin-bottom:20px">
            <img class="img-responsive" src="<?=base_url();?>assets/images/author/author-bg.jpg">
            <div class="author-body text-center">
                <div class="author-img">

                    <img src="<?=base_url();?>assets/images/profile/<?= $member['foto']; ?>">

                    <!-- <img src="<?=base_url();?>assets/images/profile/img3.png"> -->
                </div>
                <div class="author-bio">
                    <h3>
                        <?= $member['nama_member']?>
                    </h3>
                    <p>
                        <?= $member['deskripsi_member']?>
                    </p>
                </div>

                <div class="text-center">
                    <a class="btn btn-default" href="<?=base_url()?>update-profile">
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <div class="categories widget">
            <!-- <h3 class="widget-head">Categories</h3> -->
            <ul>
                <li>
                    <a href="member">Portofolio</a> <span class="badge">5</span>
                </li>
                <li>
                    <a href="about">About</a>
                </li>
            </ul>
        </div>

    </div>
</div>