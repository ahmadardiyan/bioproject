<!-- Nav -->
<nav id="nav" class="navbar">
    <div class="container">

        <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
                <a href="<?=base_url()?>home">
                    <img class="logo" src="<?=base_url()?>assets/images/logo.png" alt="logo">
                    <img class="logo-alt" src="<?=base_url()?>assets/images/logo-alt.png" alt="logo">
                </a>
            </div>
            <!-- /Logo -->

            <!-- Collapse nav button -->
            <div class="nav-collapse">
                <span></span>
            </div>
            <!-- /Collapse nav button -->
        </div>

        <!--  Main navigation  -->
        <ul class="main-nav nav navbar-nav navbar-right">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#service">Services</a></li>
            <li><a href="#pricing">Prices</a></li>
            <li><a href="#team">Team</a></li>
            <li class="has-dropdown dropdown-arrow"><a href="#blog">Cari</a>
                <ul class="dropdown">
                    <li><a href="blog-single.html">blog post</a></li>
                </ul>
            </li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="<?=base_url()?>cari-kerja">Cari Kerja</a></li>

            <li><a href="<?= base_url();?>login"> Login </a></li>

            <!-- <li class="has-dropdown">
                <a href="#" style="padding-top: 5px">
                    <img src="<?=base_url()?>assets/images/profile/<?= $member['foto'] ?>" alt="" class="img-circle"
                        width="40px">
                </a>
                <ul class="dropdown">
                    <li><a href="<?=base_url()?>member">Profile</a></li>
                    <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
                </ul>
            </li> -->

            

        </ul>
        <!-- /Main navigation -->

    </div>
</nav>
<!-- /Nav -->