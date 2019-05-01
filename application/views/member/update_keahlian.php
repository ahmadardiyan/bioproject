<section id="update-keahlian">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-xs-12">

                <!-- Skills -->
                <div id="keahlian">

                    <h3>Skills</h3>
                    <hr>

                    <form action="" method="post">
                        <div id="select-keahlian-member" style="display:inline-block;"></div>
                        <button type="submit" class="btn btn-primary text-center"
                            style="margin-top:10px;">Submit</button>
                    </form>

                </div>
            </div>

            <div class="col-md-8 col-xs-12 ">
                <div class="content">
                    <h3>Daftar Skills</h3>
                    <hr>

                    <!-- daftar keahlian (select) -->
                    <div class="row">
                        <!-- kategori keahlian -->
                        <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1">
                            <select class="form-control" name="kategori-keahlian" id="kategori-keahlian"></select>
                        </div>

                        <!-- list keahlian -->
                        <!-- <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1" id="list-keahlian"></div> -->
                        <!-- <small class="form-text text-danger"><?=form_error('skill[]')?></small> -->

                        <form action="" method="post" class="text-center">

                            <div class="col-md-10 col-xs-10 col-md-offset-1 col-xs-offset-1" id="list-keahlian"></div>

                                <button type="submit" class="btn btn-primary" style="margin-top:10px;">Submit</button>

                        </form>
                    </div>

                    <div class="row text-center">

                    </div>

                    <hr>
                </div>
            </div>

        </div>
    </div>
</section>