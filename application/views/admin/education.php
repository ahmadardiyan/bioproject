<!-- Begin Page Content -->
<!--<div class="container-fluid"> -->

  <!-- Page Heading -->

  <div class="container-fluid">
    <?= form_error('user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newEducationModal">
        <i class="fas fa-plus fa-sm text-white-50">
        </i>
        Tambah Education
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
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" style="width: 10px;">
                          No
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID Pendidikan: activate to sort column ascending" style="width: 10px;">
                          ID Pendidikan
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 43px;">
                          Username
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama Universitas: activate to sort column ascending" style="width: 74px;">
                          Nama Universitas
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Gelar: activate to sort column ascending" style="width: 48px;">
                          Gelar
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Program Studi: activate to sort column ascending" style="width: 48px;">
                          Program Studi
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tahun Mulai: activate to sort column ascending" style="width: 48px;">
                          Tahun Mulai
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Tahun Selesai: activate to sort column ascending" style="width: 48px;">
                          Tahun Selesai
                        </th>
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 41px;">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=0;
                          foreach($pendidikan as $a):
                            $no++;
                            $id=$a['id_pendidikan'];
                            $username=$a['username'];
                            $nama=$a['nama_univ'];
                            $gelar=$a['gelar'];
                            $prodi=$a['prodi'];
                            $tm=$a['tahun_mulai'];
                            $ts=$a['tahun_selesai'];
                        ?>
                      <tr role="row" class="odd">
                        <td><?= $no;?></td>
                        <td><?= $id;?></td>
                        <td><?= $username;?></td>
                        <td><?= $nama;?></td>
                        <td><?= $gelar;?></td>
                        <td><?= $prodi;?></td>
                        <td><?= $tm;?></td>
                        <td><?= $ts;?></td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#UpdatePendidikan<?= $id;?>"><i class="fas fa-edit"></i></a>
                          <a class="btn btn-danger btn-sm btn-hapus" href="" data-toggle="modal" data-target="#HapusPendidikan<?= $id;?>"><i class="fas fa-trash"></i></a>
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

<!-- ============ MODAL ADD EDUCATION =============== -->
<div class="modal fade" id="newEducationModal" tabindex="-1" role="dialog" aria-labelledby="newEducationModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newEducationModalLabel">Add New Education</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/simpan_education'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="id_user" class="col-sm-2 col-form-label">ID User</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id_user" name="id_user" placeholder="ID User" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="nama_univ" class="col-sm-2 col-form-label">Nama Universitas</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_univ" name="nama_univ" placeholder="Nama Universitas" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="gelar" class="col-sm-2 col-form-label">Gelar</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="gelar" name="gelar" placeholder="Gelar" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="prodi" class="col-sm-2 col-form-label">Program Studi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Program Studi" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tahun_mulai" class="col-sm-2 col-form-label">Tahun Mulai</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tahun_mulai" name="tahun_mulai" placeholder="Tahun Mulai" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tahun_selesai" class="col-sm-2 col-form-label">Tahun Selesai</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tahun_selesai" name="tahun_selesai" placeholder="Tahun Selesai" required>
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
    foreach($pendidikan as $a):
      $no++;
      $id=$a['id_pendidikan'];
      $id_user=$a['id_user'];
      $nama=$a['nama_univ'];
      $gelar=$a['gelar'];
      $prodi=$a['prodi'];
      $tm=$a['tahun_mulai'];
      $ts=$a['tahun_selesai'];
  ?>

<!-- ============ MODAL UPDATE SERVICE=============== -->
<div class="modal fade" id="UpdatePendidikan<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdatePendidikan">Update Pendidikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/update_education';?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group row">
              <label name="id_user" class="col-sm-2 col-form-label">ID User</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="id_user" name="id_user" placeholder="ID User" value="<?= $id_user; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="nama_univ" class="col-sm-2 col-form-label">Nama Universitas</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_univ" name="nama_univ" placeholder="Nama Universitas" value="<?= $nama; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="gelar" class="col-sm-2 col-form-label">Gelar</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="gelar" name="gelar" placeholder="Gelar" value="<?= $gelar; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="prodi" class="col-sm-2 col-form-label">Program Studi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Program Studi" value="<?= $prodi; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tahun_mulai" class="col-sm-2 col-form-label">Tahun Mulai</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tahun_mulai" name="tahun_mulai" placeholder="Tahun Mulai" value="<?= $tm; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label name="tahun_selesai" class="col-sm-2 col-form-label">Tahun Selesai</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="tahun_selesai" name="tahun_selesai" placeholder="Tahun Selesai" value="<?= $ts; ?>" required>
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
    foreach($pendidikan as $a):
      $no++;
      $id=$a['id_pendidikan'];
      $id_user=$a['id_user'];
      $nama=$a['nama_univ'];
      $gelar=$a['gelar'];
      $prodi=$a['prodi'];
      $tm=$a['tahun_mulai'];
      $ts=$a['tahun_selesai'];
  ?>

	<!--Modal Hapus EDUCATION-->
  <div class="modal fade" id="HapusPendidikan<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="HapusPortofolio">Hapus Pendidikan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <form class="form-horizontal" action="<?= base_url().'admin/hapus_education'?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
               <input type="hidden" name="kode" value="<?= $id;?>"/>
                    <p>Apakah Anda yakin mau menghapus data ini ?</p>
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
