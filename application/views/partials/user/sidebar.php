<div class="col-md-4">
    <div class="sidebar">

        <!-- Search -->
        <!-- <div class="search widget">
                        <form action="" method="get" class="searchform" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"> <i class="ion-search"></i> </button>
                                </span>
                            </div>
                        </form>
                    </div> -->
        <!-- End Search -->

        <div class="author widget">
            <img class="img-responsive" src="<?=base_url();?>assets/images/author/author-bg.jpg">
            <div class="author-body text-center">
                <div class="author-img">

                    <img src="<?=base_url();?>assets/images/profile/<?= $member['foto_member']; ?>">

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
            </div>
        </div>
        
        <!-- <div class="categories widget">
            <h3 class="widget-head">Categories</h3>
            <ul>
                <li>
                    <a href="">Audio</a> <span class="badge">1</span>
                </li>
                <li>
                    <a href="">Gallery</a> <span class="badge">2</span>
                </li>
                <li>
                    <a href="">Image</a> <span class="badge">4</span>
                </li>
                <li>
                    <a href="">Standard</a> <span class="badge">2</span>
                </li>
                <li>
                    <a href="">Status</a> <span class="badge">3</span>
                </li>
            </ul>
        </div>

        <div class="recent-post widget">
            <h3>Recent Posts</h3>
            <ul>
                <li>
                    <a href="#">Corporate meeting turns into a photoshooting.</a><br>
                    <time>16 May, 2015</time>
                </li>
                <li>
                    <a href="#">Statistics,analysis. The key to succes.</a><br>
                    <time>15 May, 2015</time>
                </li>
                <li>
                    <a href="#">Blog post without image, only text.</a><br>
                    <time>14 May, 2015</time>
                </li>
                <li>
                    <a href="#">Blog post with audio player. Share your creations.</a><br>
                    <time>14 May, 2015</time>
                </li>
                <li>
                    <a href="#">Blog post with classic Youtbube player.</a><br>
                    <time>12 May, 2015</time>
                </li>
            </ul>
        </div> -->

    </div>
</div>