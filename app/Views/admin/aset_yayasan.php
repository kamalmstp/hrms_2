<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Assets</a></li>
              <li class="breadcrumb-item active"><?=$title?></li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="card-title">Company Assets List</h3>
                  </div>
                  <div class="col-md-6">
                    <button type="button" data-toggle="modal" data-target="#modal-aset" class="btn btn-primary float-sm-right">Add Jabatan</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Assets Name</th>
                    <th>Quantity</th>
                    <th>File</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1; 
                      foreach ($aset as $row): ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$row['nama']?></td>
                      <td><?=$row['jumlah']?></td>
                      <td><?=$row['file']?></td>
                      <td>
                          <a data-toggle="modal" data-target="#modal-edit<?=$row['aset_yayasan_id']?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                          <a data-toggle="modal" data-target="#modal-del<?=$row['aset_yayasan_id']?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="modal-aset">
        <div class="modal-dialog">
          <div class="modal-content">
          <?=form_open_multipart('save_asetc', array('method'=>'post'));?>
            <div class="modal-header">
              <h4 class="modal-title">Add Company Assets</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaaset">Aset Name *</label>
                    <input type="text" class="form-control" name="nama" id="namaaset" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Quantity *</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" required>
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control" name="doc" id="file">
                </div>
                <div class="form-group">
                    <label for="ket">Description</label>
                    <textarea name="keterangan" id="ket" class="form-control" cols="30" rows="2"></textarea>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?=form_close();?>
          </div>
        </div>
      </div>

    <?php foreach ($aset as $data): ?>
    <div class="modal fade" id="modal-edit<?=$data['aset_yayasan_id']?>">
        <div class="modal-dialog">
          <div class="modal-content">
          <?=form_open_multipart('update_jabatan', array('method'=>'post'));?>
            <div class="modal-header">
              <h4 class="modal-title">Edit Company Assets</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaaset">Name</label>
                    <input type="hidden" name="aset_yayasan_id" value="<?=$data['aset_yayasan_id'] ?>">
                    <input type="text" class="form-control" name="nama" id="namaaset" value="<?=$data['nama']?>" required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Quantity</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?=$data['jumlah']?>" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="2"><?=$data['keterangan']?></textarea>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?=form_close();?>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal-del<?=$data['aset_yayasan_id']?>">
        <div class="modal-dialog">
          <div class="modal-content">
              <form action="del_jabatan" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Delete Assets</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus <strong><?=$data['nama']; ?></strong>
                <input type="hidden" name="aset_yayasan_id" value="<?=$data['aset_yayasan_id']; ?>">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Delete</button>
            </div>
            </form>
          </div>
        </div>
    </div>
    <?php endforeach; ?>