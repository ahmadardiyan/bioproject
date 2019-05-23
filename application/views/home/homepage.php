<?php //$this->load->view('partials/user/header')?>

<!-- Header -->
<header id="home">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('<?=base_url()?>assets/images/background2.jpg');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <?php //$this->load->view('partials/user/navbar')?>

    <!-- home wrapper -->
    <div class="home-wrapper">
        <div class="container">
            <div class="row">

                <!-- home content -->
                <div class="col-md-10 col-md-offset-1">
                    <div class="home-content">
                        <h1 class="white-text">We Are Creative Agency</h1>
                        <p class="white-text">Morbi mattis felis at nunc. Duis viverra diam non justo. In nisl.
                            Nullam sit amet magna in magna gravida vehicula. Mauris tincidunt sem sed arcu. Nunc
                            posuere.
                        </p>
                    </div>
                </div>
                <!-- /home content -->

            </div>
        </div>
    </div>
    <!-- /home wrapper -->

</header>
<!-- /Header -->

<?php $this->load->view('partials/user/about')?>

<?php $this->load->view('partials/user/portofolio')?>

<?php $this->load->view('partials/user/service')?>

<?php $this->load->view('partials/user/data_number')?>

<?php $this->load->view('partials/user/why_choose_us')?>

<?php $this->load->view('partials/user/testimonial')?>

<?php $this->load->view('partials/user/contact')?>


