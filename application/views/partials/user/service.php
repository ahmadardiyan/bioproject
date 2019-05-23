<!-- Service -->
<!-- Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero. -->
<div id="service" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">What we offer</h2>
            </div>
            <!-- /Section header -->
            <?php
                foreach($service as $a):
                  $icon=$a['icon'];
                  $title=$a['title'];
                  $deskripsi=$a['deskripsi'];
              ?>
            <!-- service -->
            <div class="col-md-4 col-sm-6">

                <div class="service">
                  <i class="<?= $icon; ?>"></i>
                  <h3><?= $title; ?></h3>
                  <p><?= $deskripsi; ?></p>
                </div>
            </div>
            <!-- /service -->

          <?php endforeach ?>
            <!-- /service -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<!-- /Service -->
