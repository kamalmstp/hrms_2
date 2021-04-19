<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $page; ?> <small><?= $title; ?></small></h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-xs-12 invoice-header">
                                <h1>
                                    <?= $pegawai->nama; ?>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target=".modal-add"><i class="fa fa-plus"></i> Add Keluarga</button>
                                    </div>
                                </h1>
                                <hr>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- start project list -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama Keluarga</th>
                                    <th>Status Hubungan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Telepon</th>
                                    <th>Email</th>
                                    <th style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($keluarga_pegawai as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td>
                                            <?php foreach ($hubkel as $h) {
                                                if ($row['hubkel_id'] == $h['hubkel_id']) {
                                                    echo $h['hubkel'];
                                                }
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($row['jenis_kelamin'] == 'L') {
                                                echo 'Laki-laki';
                                            } else {
                                                echo 'Perempuan';
                                            } ?>
                                        </td>
                                        <td><?= $row['telepon'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td>
                                            <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".modal-edit<?= $row['kel_peg_id'] ?>"><i class="fa fa-pencil"></i> Edit </button>
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".modal-del<?= $row['kel_peg_id'] ?>"><i class="fa fa-trash-o"></i> Delete </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- end project list -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form id="add" action="/pegawai/keluarga_save" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Data</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nama" name="nama" class="form-control col-md-7 col-xs-12" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hubkel">Hubungan Keluarga
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="hubkel" class="form-control col-md-7 col-xs-12" id="hubkel">
                                <option value="">--Piih Hubungan Keluarga--</option>
                                <?php foreach ($hubkel as $row) : ?>
                                    <option value="<?= $row['hubkel_id'] ?>"><?= $row['hubkel'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_kelamin">Jenis Kelamin
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="jenis_kelamin" class="form-control col-md-7 col-xs-12" id="jenis_kelamin">
                                <option value="">--Piih Jenis Kelamin--</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Tempat Lahir
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Tanggal Lahir
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenjang_pendidikan">Pendidikan Terakhir
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="jenjang_pendidikan" class="form-control col-md-7 col-xs-12" id="jenjang_pendidikan">
                                <option value="">--Piih Jenjang Pendidikan--</option>
                                <?php foreach ($jenjang_pendidikan as $row) : ?>
                                    <option value="<?= $row['jenj_pend_id'] ?>"><?= $row['jenjang_pendidikan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomor_telepon">Nomor Telepon
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="nomor_telepon" name="nomor_telepon" required class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="alamat" id="alamat" cols="30" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php foreach ($keluarga_pegawai as $row1) : ?>
    <div class="modal fade modal-edit<?= $row1['kel_peg_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form id="edit" action="/pegawai/keluarga_update" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Lengkap
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nama" value="<?= $row1['nama'] ?>" name="nama" class="form-control col-md-7 col-xs-12" required>
                                <input type="hidden" name="id" value="<?= $row1['kel_peg_id'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hubkel">Hubungan Keluarga
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="hubkel" class="form-control col-md-7 col-xs-12" id="hubkel">
                                    <option value="">--Piih Hubungan Keluarga--</option>
                                    <?php foreach ($hubkel as $row) : ?>
                                        <option value="<?= $row['hubkel_id'] ?>" <?php if ($row['hubkel_id'] == $row1['hubkel_id']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $row['hubkel'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_kelamin">Jenis Kelamin
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="jenis_kelamin" class="form-control col-md-7 col-xs-12" id="jenis_kelamin">
                                    <option value="">--Piih Jenis Kelamin--</option>
                                    <option value="L" <?php if ($row1['jenis_kelamin'] == 'L') {
                                                            echo 'selected';
                                                        } ?>>Laki-laki</option>
                                    <option value="P" <?php if ($row1['jenis_kelamin'] == 'P') {
                                                            echo 'selected';
                                                        } ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">Tempat Lahir
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="tempat_lahir" value="<?= $row1['tempat_lahir'] ?>" name="tempat_lahir" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Tanggal Lahir
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="tanggal_lahir" value="<?= $row1['tanggal_lahir'] ?>" name="tanggal_lahir" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenjang_pendidikan">Pendidikan Terakhir
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="jenjang_pendidikan" class="form-control col-md-7 col-xs-12" id="jenjang_pendidikan">
                                    <option value="">--Piih Jenjang Pendidikan--</option>
                                    <?php foreach ($jenjang_pendidikan as $row) : ?>
                                        <option value="<?= $row['jenj_pend_id'] ?>" <?php if ($row['jenj_pend_id'] == $row1['jenj_pend_id']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $row['jenjang_pendidikan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomor_telepon">Nomor Telepon
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="nomor_telepon" value="<?= $row1['telepon'] ?>" name="nomor_telepon" required class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="email" value="<?= $row1['email'] ?>" name="email" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control col-md-7 col-xs-12" name="alamat" id="alamat" cols="30" rows="3"><?= $row1['alamat'] ?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($keluarga_pegawai as $row2) : ?>
    <div class="modal fade modal-del<?= $row2['kel_peg_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form action="/pegawai/keluarga_del" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                    </div>
                    <div class="modal-body">

                        <p>Apakah anda yakin ingin menghapus <strong><?= $row2['nama'] ?></strong>?</p>
                        <input type="hidden" name="id" value="<?= $row2['kel_peg_id'] ?>">
                        <input type="hidden" name="pegawai_id" value="<?= $row2['pegawai_id'] ?>">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>