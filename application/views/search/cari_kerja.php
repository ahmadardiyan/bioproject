<section id="cari-kerja">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 text-center" style="margin-bottom:0px">
                <div class="content">
                    <form class="form-inline">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search" name=keyword width="100%">
                                        <!-- <button class="btn btn-primary" type="submit">Search</button> -->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" >
                                        <select class="form-control" id="sel1" name="tipe_kerja" width="100%" >
                                            <option value="">Tipe Kerja</option>
                                            <option value="Full Time">Full Time
                                            <option>
                                            <option value="Part Time">Part Time
                                            <option>
                                            <option value="Remote">Remote
                                            <option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="kategori-keahlian"
                                        id="kategori-keahlian" width="100%"></select>
                                </div>
                                <div class="col-md-3" >
                                    <select class="form-control" name="list-keahlian-select"
                                        id="list-keahlian-select" width="100%"></select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="content">
                    <div class="row">
                        <?php foreach($loker as $l) : ?>
                        <a href="<?=base_url()?>detail-lowongan-kerja/<?=$l['id_lowongan_kerja']?>">
                            <div class="col-md-3 col-xs-6">
                                <div class="thumbnail">
                                    <div class="caption text-center">

                                        <h4 id="thumbnail-label"><?= $l['judul']?></h4>

                                        <div class="thumbnail-description smaller">
                                            <p><?=$l['deskripsi']?></p>
                                        </div>

                                        <hr style="margin-bottom:10px">

                                        <p style="text-align:left"><?=$l['tipe_kerja']?></p>
                                        <p style="float:right ; margin-top:-32px ">
                                            <?=date('Y-m-d' , strtotime($l['created_at']))?></p>

                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>