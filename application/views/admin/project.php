<!-- Begin Page Content -->
<!--<div class="container-fluid"> -->

  <!-- Page Heading -->

  <div class="container-fluid">
    <?= form_error('user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newProjectModal">
        <i class="fas fa-plus fa-sm text-white-50">
        </i>
        Tambah Project
      </a>
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
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID Lowongan Kerja: activate to sort column ascending" style="width: 10px;">
                          Nama Lowongan Kerja
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
                          foreach($lowongan_kerja as $a):
                            $no++;
                            $id=$a['id_lowongan_kerja'];
                            $nama=$a['judul'];
                            $n_k=$a['nama_keahlian'];
                        ?>
                      <tr role="row" class="odd">
                        <td><?= $no;?></td>
                        <td><?= $id;?></td>
                        <td><?= $nama;?></td>
                        <td><?= $n_k;?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#UpdateProject<?= $id;?>"><i class="fas fa-edit"></i></a>
                          <a class="btn btn-danger btn-sm btn-hapus" href="" data-toggle="modal" data-target="#HapusProject<?= $id;?>"><i class="fas fa-trash"></i></a>
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

<!-- ============ MODAL ADD Project =============== -->
<div class="modal fade" id="newProjectModal" tabindex="-1" role="dialog" aria-labelledby="newProjectModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newProjectModalLabel">Add New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/simpan_projectt'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="id_lowongan_kerja" class="col-sm-2 col-form-label">ID Lowongan Kerja</label>
              <div class="col-sm-10">
                <select name="id_lowongan_kerja" class="form-control" required>
                  <option value="">-PILIH-</option>
                    <?php
                      foreach($list_lowongan_kerja as $lk):
                      $id_lk=$lk['id_lowongan_kerja'];
                      $nama_lk=$lk['judul'];
                    ?>
                    <option value="<?= $id_lk;?>"><?= $id_lk.". ".$nama_lk;?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label name="id_keahlian" class="col-sm-2 col-form-label">Keahlian</label>
              <div class="col-sm-10">
                <select name="id_keahlian" class="form-control" required>
                  <option value="">-PILIH-</option>
                    <?php
                      foreach($list_keahlian as $l):
                      $id_keahlian=$l['id_keahlian'];
                      $nama_keahlian=$l['nama_keahlian'];
                    ?>
                    <option value="<?= $id_keahlian;?>"><?= $id_keahlian.". ".$nama_keahlian;?></option>
                  <?php endforeach;?>
                </select>
                <!-- <input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="Kategori" required> -->
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
  $no=0;
    foreach($lowongan_kerja as $a):
      $no++;
      $id=$a['id_lowongan_kerja'];
      $id_k=$a['id_keahlian'];
  ?>

<!-- ============ MODAL UPDATE PROJECT=============== -->
<div class="modal fade" id="UpdateProject<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateProject">Update Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/update_projectt'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="id_lowongan_kerja" class="col-sm-2 col-form-label">ID Lowongan Kerja</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id_lowongan_kerja" name="id_lowongan_kerja" value="<?= $id; ?>" placeholder="ID Lowongan Kerja" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="id_keahlian" class="col-sm-2 col-form-label">Keahlian</label>
              <div class="col-sm-10">
                <select name="id_keahlian" class="form-control" value="<?= $id_k; ?>"required>
                  <option value="">-PILIH-</option>
                    <?php
                      foreach($list_keahlian as $l):
                      $id_keahlian=$l['id_keahlian'];
                      $nama_keahlian=$l['nama_keahlian'];
                    ?>
                    <option value="<?= $id_keahlian;?>"><?= $id_keahlian.". ".$nama_keahlian;?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="kode" value="<?= $id;?>">
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
    foreach($lowongan_kerja as $a):
      $no++;
      $id=$a['id_lowongan_kerja'];
      $id_k=$a['id_keahlian'];
  ?>

	<!--Modal Hapus PROJECT-->
  <div class="modal fade" id="HapusProject<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="HapusProject">Hapus Project</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form class="form-horizontal" action="<?= base_url().'admin/hapus_project'?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
               <input type="hidden" name="kode" value="<?= $id;?>"/>
                    <p>Apakah Anda yakin mau menghapus project <b><?= $id;?></b> ?</p>
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
