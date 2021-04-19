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
                                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target=".modal-add"><i class="fa fa-plus"></i> Add Pendidikan</button>
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
                                    <th>File</th>
                                    <th>Jabatan</th>
                                    <th>Unit Kerja</th>
                                    <th>TMT Jabatan</th>
                                    <th>Nomor SK</th>
                                    <th style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($jabatan as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td></td>
                                        <td><?= $row['nama_jabatan'] ?><br><small>Status : <?php if ($row['status'] == '1') {
                                                                                                echo 'Aktif';
                                                                                            } else {
                                                                                                echo 'Non Aktif';
                                                                                            } ?></small></td>
                                        <td><?= $row['satker_id'] ?></td>
                                        <td>
                                            <?= $row['tmt_jabatan'] ?>
                                        </td>
                                        <td><?= $row['nomor_sk'] ?></td>
                                        <td>
                                            <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".modal-edit<?= $row['jab_peg_id'] ?>"><i class="fa fa-pencil"></i> Edit </button>
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".modal-del<?= $row['jab_peg_id'] ?>"><i class="fa fa-trash-o"></i> Delete </button>
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

            <form action="/admin/jab_pegawai_save" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Data</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jabatan">Nama Jabatan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="jabatan" name="jabatan" class="form-control col-md-7 col-xs-12" required>
                            <input type="hidden" name="pegawai_id" value="<?= $pegawai->pegawai_id ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tmt_jabatan">TMT Jabatan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="tmt_jabatan" name="tmt_jabatan" class="form-control col-md-7 col-xs-12" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_sk">Tanggal SK
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="tanggal_sk" name="tanggal_sk" class="form-control col-md-7 col-xs-12" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomor_sk">Nomor SK
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nomor_sk" name="nomor_sk" class="form-control col-md-7 col-xs-12" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="satker">Satuan Kerja
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="satker" class="form-control col-md-7 col-xs-12" id="satker" required>
                                <option value="">--Piih Satuan Kerja--</option>
                                <?php foreach ($satker as $row) : ?>
                                    <option value="<?= $row['satker_id'] ?>"><?= $row['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="keterangan" id="" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status Jabatan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="status" class="form-control col-md-7 col-xs-12" id="">
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">File
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="file" name="file" class="form-control col-md-7 col-xs-12">
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

<?php foreach ($jabatan as $row1) : ?>
    <div class="modal fade modal-edit<?= $row1['jab_peg_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form action="/admin/jab_pegawai_update" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jabatan">Nama Jabatan
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="jabatan" name="jabatan" value="<?= $row1['nama_jabatan'] ?>" class="form-control col-md-7 col-xs-12" required>
                                <input type="hidden" name="pegawai_id" value="<?= $row1['pegawai_id'] ?>">
                                <input type="hidden" name="id" value="<?= $row1['jab_peg_id'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tmt_jabatan">TMT Jabatan
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="tmt_jabatan" value="<?= $row1['tmt_jabatan'] ?>" name="tmt_jabatan" class="form-control col-md-7 col-xs-12" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_sk">Tanggal SK
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="tanggal_sk" value="<?= $row1['tanggal_sk'] ?>" name="tanggal_sk" class="form-control col-md-7 col-xs-12" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomor_sk">Nomor SK
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nomor_sk" value="<?= $row1['nomor_sk'] ?>" name="nomor_sk" class="form-control col-md-7 col-xs-12" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="satker">Satuan Kerja
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="satker" class="form-control col-md-7 col-xs-12" id="satker" required>
                                    <option value="">--Piih Satuan Kerja--</option>
                                    <?php foreach ($satker as $row) : ?>
                                        <option value="<?= $row['satker_id'] ?>" <?php if ($row['satker_id'] == $row1['satker_id']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $row['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control col-md-7 col-xs-12" name="keterangan" id="" cols="30" rows="3"><?= $row1['keterangan'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status Jabatan
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="status" class="form-control col-md-7 col-xs-12" id="">
                                    <option value="1" <?php if ($row1['status'] == 1) {
                                                            echo 'selected';
                                                        } ?>>Aktif</option>
                                    <option value="0" <?php if ($row1['status'] == 0) {
                                                            echo 'selected';
                                                        } ?>>Non Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">File
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="file" name="file" class="form-control col-md-7 col-xs-12">
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

    <div class="modal fade modal-del<?= $row1['jab_peg_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form action="/admin/jab_pegawai_del" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                    </div>
                    <div class="modal-body">

                        <p>Apakah anda yakin ingin menghapus <strong><?= $row1['nama_jabatan'] ?></strong>?</p>
                        <input type="hidden" name="id" value="<?= $row1['jab_peg_id'] ?>">
                        <input type="hidden" name="pegawai_id" value="<?= $row1['pegawai_id'] ?>">

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