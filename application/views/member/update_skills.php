<!-- blog full-width -->
<section id="blog-full-width">

    <div class="container">
        <div class="row">

            <?php $this->load->view('partials/user/sidebar');?>

            <!-- edit profile -->
            <div class="row">
                <div class="col-md-6 col-xs-10 col-md-offset-1 col-xs-offset-1">

                    <h3>Skills</h3>
                    <hr>
                    <form action="" method="post">

                        <!-- daftar keahlian (select) -->
                        <div class="row">
                            <select class="form-control" name="kategori-keahlian" id="kategori-keahlian"></select>
                        </div>

                        <!-- checkbox subkeahlian -->
                        <div class="row">
                            <div id="list-keahlian"></div>
                        </div>

                        <div class="row text-center">
                            <button type="submit" class="btn btn-primary text-center"
                                style="margin-top:10px">Submit</button>
                        </div>
                    </form>
                    <hr>
                </div>

            </div>
        </div>
    </div>

</section>
<!-- end blog full-width -->