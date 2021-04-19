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
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Jenjang</th>
                                    <th>Institusi</th>
                                    <th>Tahun Lulus</th>
                                    <th style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($pendidikan_pegawai as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <?php if ($row['file'] == null) { ?>
                                                <p><i>Kosong</i></p>
                                            <?php } else { ?>
                                                <a target="_blank" href="/admin/ijazah_download/<?= $row['pend_peg_id']; ?>" type="button" class="btn btn-info btn-round btn-xs"> <i class="fa fa-download"></i> Unduh</a>
                                            <?php } ?>
                                        </td>
                                        <td><?= $row['nama_pendidikan'] ?></td>
                                        <td><?= $row['jenis_pendidikan'] ?></td>
                                        <td>
                                            <?= $row['jenjang_pendidikan'] ?>
                                        </td>
                                        <td><?= $row['penyelenggara'] ?></td>
                                        <td><?= $row['tahun_lulus'] ?></td>
                                        <td>
                                            <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".modal-edit<?= $row['pend_peg_id'] ?>"><i class="fa fa-pencil"></i> Edit </button>
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".modal-del<?= $row['pend_peg_id'] ?>"><i class="fa fa-trash-o"></i> Delete </button>
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

            <form id="add" action="/pegawai/pendidikan_save" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Data</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pendidikan">Nama Pendidikan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nama_pendidikan" name="nama_pendidikan" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penyelenggara">Nama Institusi Penyelenggara
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="penyelenggara" name="penyelenggara" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_pendidikan">Jenis Pendidikan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="jenis_pendidikan" class="form-control col-md-7 col-xs-12" id="jenis_pendidikan">
                                <option value="">--Piih Jenis Pendidikan--</option>
                                <?php foreach ($jenis_pendidikan as $row) : ?>
                                    <option value="<?= $row['jenis_pend_id'] ?>"><?= $row['jenis_pendidikan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenjang_pendidikan">Jenjang Pendidikan
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_ijazah">Tanggal Ijazah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="tanggal_ijazah" name="tanggal_ijazah" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_lulus">Tahun Lulus
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="tahun_lulus" name="tahun_lulus" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomor_ijazah">Nomor Ijazah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="nomor_ijazah" name="nomor_ijazah" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="keterangan" id="keterangan" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Upload Fila Ijazah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="file" name="gambar" class="form-control col-md-7 col-xs-12">
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

<?php foreach ($pendidikan_pegawai as $row) : ?>
    <div class="modal fade modal-edit<?= $row['pend_peg_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form id="edit" action="/pegawai/pendidikan_update" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pendidikan">Nama Pendidikan
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nama_pendidikan" value="<?= $row['nama_pendidikan'] ?>" name="nama_pendidikan" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" name="id" value="<?= $row['pend_peg_id'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="penyelenggara">Nama Institusi Penyelenggara
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="penyelenggara" value="<?= $row['penyelenggara'] ?>" name="penyelenggara" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis_pendidikan">Jenis Pendidikan
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="jenis_pendidikan" class="form-control col-md-7 col-xs-12" id="jenis_pendidikan">
                                    <option value="">--Piih Jenis Pendidikan--</option>
                                    <?php foreach ($jenis_pendidikan as $row2) : ?>
                                        <option value="<?= $row2['jenis_pend_id'] ?>" <?php if ($row2['jenis_pend_id'] == $row['jenis_pend_id']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $row2['jenis_pendidikan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenjang_pendidikan">Jenjang Pendidikan
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="jenjang_pendidikan" class="form-control col-md-7 col-xs-12" id="jenjang_pendidikan">
                                    <option value="">--Piih Jenjang Pendidikan--</option>
                                    <?php foreach ($jenjang_pendidikan as $row3) : ?>
                                        <option value="<?= $row3['jenj_pend_id'] ?>" <?php if ($row3['jenj_pend_id'] == $row['jenj_pend_id']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $row3['jenjang_pendidikan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_ijazah">Tanggal Ijazah
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="tanggal_ijazah" value="<?= $row['tanggal_ijazah'] ?>" name="tanggal_ijazah" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_lulus">Tahun Lulus
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="tahun_lulus" value="<?= $row['tahun_lulus'] ?>" name="tahun_lulus" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nomor_ijazah">Nomor Ijazah
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="nomor_ijazah" value="<?= $row['nomor_ijazah'] ?>" name="nomor_ijazah" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control col-md-7 col-xs-12" name="keterangan" id="keterangan" cols="30" rows="3"><?= $row['keterangan'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="file">Upload Fila Ijazah
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="file" name="gambar1" class="form-control col-md-7 col-xs-12">
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
<?php endforeach; ?>

<?php foreach ($pendidikan_pegawai as $row1) : ?>
    <div class="modal fade modal-del<?= $row1['pend_peg_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form action="/pegawai/pendidikan_del" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                    </div>
                    <div class="modal-body">

                        <p>Apakah anda yakin ingin menghapus <strong><?= $row1['nama_pendidikan'] ?></strong>?</p>
                        <input type="hidden" name="id" value="<?= $row1['pend_peg_id'] ?>">
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