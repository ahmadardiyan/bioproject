<!-- Begin Page Content -->


<div class="container-fluid">
  <?= form_error('user', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
  <?= $this->session->flashdata('message'); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#newCategoryModal">
    <i class="fas fa-plus fa-sm text-white-50">
    </i>
    Tambah Kategori
  </a>
</div>

<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered dataTable no-footer" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="font-size: 18px;">
                <thead>
                  <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending" style="width: 10px;">
                      No
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 10px;">
                      ID
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama Kategori: activate to sort column ascending" style="width: 43px;">
                      Nama Kategori Keahlian
                    </th>
                    <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 41px;">
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                      foreach($kategori_keahlian as $a):
                        $no++;
                        $id=$a['id_kategori'];
                        $nama=$a['nama_kategori_keahlian'];
                    ?>
                  <tr role="row" class="odd">
                    <td><?= $no;?></td>
                    <td><?= $id;?></td>
                    <td><?= $nama;?></td>
                    <td>
                      <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#UpdateCategory<?= $id;?>"><i class="fas fa-edit"></i></a>
                      <a class="btn btn-danger btn-sm btn-hapus" href="" data-toggle="modal" data-target="#HapusCategory<?= $id;?>"><i class="fas fa-trash"></i></a>
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
<!-- ============ MODAL ADD CATEGORY =============== -->
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newCategoryModalLabel">Add New Skills Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/simpan_category'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="form-group-row">
            <label class="col-sm-2 col-form-label" name="nama_kategori_keahlian">Kategori</label>
            <div class="col-sm-10">
                <input name="nama_kategori_keahlian" id="nama_kategori_keahlian" class="form-control" type="text" placeholder="Nama Kategori Keahlian">
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
    foreach($kategori_keahlian as $a):
      $no++;
      $id=$a['id_kategori'];
      $nama=$a['nama_kategori_keahlian'];
?>

<!-- ============ MODAL UPDATE CATEGORY =============== -->
<div class="modal fade" id="UpdateCategory<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdateCategory">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url().'admin/update_category'?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-2 col-form-label" >Kategori</label>
              <input name="nama_kategori_keahlian" value="<?= $nama;?>" class="form-control" type="text" placeholder="Kategori Keahlian" required>
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
        foreach($kategori_keahlian as $a):
            $no++;
            $id=$a['id_kategori'];
            $nama=$a['nama_kategori_keahlian'];
  ?>
	<!--Modal Hapus Post-->
        <div class="modal fade" id="HapusCategory<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="HapusCategory">Hapus Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <form class="form-horizontal" action="<?= base_url().'admin/hapus_category'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?= $id;?>"/>
                          <p>Apakah Anda yakin mau menghapus kategori <b><?= $nama;?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>
