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
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending" style="width: 10px;">
                          No
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 10px;">
                          ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID Project: activate to sort column ascending" style="width: 10px;">
                          ID Project
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Keahlian: activate to sort column ascending" style="width: 43px;">
                          Keahlian
                        </th>
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 41px;">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=0;
                          foreach($project as $a):
                            $no++;
                            $i_d=$a['id'];
                            $id=$a['id_project'];
                            $id_k=$a['id_keahlian'];
                        ?>
                      <tr role="row" class="odd">
                        <td><?= $no;?></td>
                        <td><?= $i_d;?></td>
                        <td><?= $id;?></td>
                        <td><?= $id_k;?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#UpdateProject" <?= $i_d;?>><i class="fas fa-edit"></i></a>
                          <a class="btn btn-danger btn-sm btn-hapus" href="" data-toggle="modal" data-target="#HapusProject" <?= $i_d;?>><i class="fas fa-trash"></i></a>
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
    foreach($project as $a):
      $no++;
      $i_d=$a['id'];
      $id=$a['id_project'];
      $id_k=$a['id_keahlian'];
  ?>

<!-- ============ MODAL UPDATE PROJECT=============== -->
<div class="modal fade" id="UpdateProject <?= $i_d;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateProject">Update Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/update_project'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="nama_keahlian" class="col-sm-2 col-form-label">ID Project</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_keahlian" name="nama_keahlian" value="<?= $id; ?>" placeholder="Project" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="id_kategori" class="col-sm-2 col-form-label">Keahlian</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="<?= $id_k; ?>" placeholder="Keahlian" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="kode" value="<?= $i_d;?>">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>

<?php endforeach;?>

<?php
  $no=0;
    foreach($project as $a):
      $no++;
      $i_d=$a['id'];
      $id=$a['id_project'];
      $id_k=$a['id_keahlian'];
  ?>

	<!--Modal Hapus PROJECT-->
        <div class="modal fade" id="HapusProject<?= $i_d;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="HapusProject">Hapus Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <form class="form-horizontal" action="<?= base_url().'admin/hapus_project'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?= $i_d;?>"/>
                          <p>Apakah Anda yakin mau menghapus service <b><?= $title;?></b> ?</p>
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
