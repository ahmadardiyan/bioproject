<!-- Begin Page Content -->
<!--<div class="container-fluid"> -->

  <!-- Page Heading -->

  <div class="container-fluid">
    <?= form_error('user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> 
    </div>

    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-bordered dataTable no-footer" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="font-size: 13px;">
                    <thead>
                      <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" style="width: 10px;">
                          No
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID Portofolio: activate to sort column ascending" style="width: 10px;">
                          ID Portofolio
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 43px;">
                          Username
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Judul: activate to sort column ascending" style="width: 74px;">
                          Judul
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Deskripsi: activate to sort column ascending" style="width: 48px;">
                          Deskripsi
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Foto: activate to sort column ascending" style="width: 74px;">
                          Foto
                        </th>
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 41px;">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=0;
                          foreach($portofolio as $a):
                            $no++;
                            $id=$a['id_portofolio'];
                            $username=$a['username'];
                            $judul=$a['judul'];
                            $deskripsi=$a['deskripsi'];
                            $foto=$a['foto'];
                        ?>
                      <tr role="row" class="odd">
                        <td><?= $no;?></td>
                        <td><?= $id;?></td>
                        <td><?= $username;?></td>
                        <td><?= $judul;?></td>
                        <td><?= $deskripsi;?></td>
                        <td><img src="<?= base_url('/assets/images/profile/').$foto;?>" class="rounded mx-auto" style="width:100px;"></td>
                        <td>
                          <a class="btn btn-danger btn-sm btn-hapus" href="" data-toggle="modal" data-target="#HapusPortofolio<?= $id;?>"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->

<!-- Modal -->

<?php
  $no=0;
    foreach($portofolio as $a):
      $no++;
      $id=$a['id_portofolio'];
      $id_user=$a['id_user'];
      $judul=$a['judul'];
      $deskripsi=$a['deskripsi'];
      $foto=$a['foto'];
  ?>
	<!--Modal Hapus PORTOFOLIO-->
  <div class="modal fade" id="HapusPortofolio<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="HapusPortofolio">Hapus Portofolio</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form class="form-horizontal" action="<?= base_url().'admin/hapus_portofolio'?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
               <input type="hidden" name="kode" value="<?= $id;?>"/>
                    <p>Apakah Anda yakin mau menghapus portofolio <b><?= $judul;?></b> ?</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
              </div>
              </form>
          </div>
      </div>
  </div>
	<?php endforeach;?>
