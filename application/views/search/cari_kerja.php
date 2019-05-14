<section id="cari-kerja">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 text-center" style="margin-bottom:0px">
                <div class="content">
                    <form class="form-inline">

                        <div class="form-group">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="sel1">
                                <option>Tipe Kerja</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="sel1">
                                <option>Lokasi</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="sel1">
                                <option>Kategori Keahlian</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control" id="sel1">
                                <option>Keahlian</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <!-- <button class="btn btn-primary" type="submit">Search</button> -->
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