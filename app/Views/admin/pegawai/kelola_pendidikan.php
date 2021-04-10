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
                                <?php foreach ($jenjang_pendidikan as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <?= $row['jenjang_pendidikan'] ?>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".modal-edit<?= $row['jenj_pend_id'] ?>"><i class="fa fa-pencil"></i> Edit </button>
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".modal-del<?= $row['jenj_pend_id'] ?>"><i class="fa fa-trash-o"></i> Delete </button>
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

            <form action="/admin/kelola_pendidikan_save" method="post" class="form-horizontal form-label-left">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Data</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan">Nama Pendidikan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="pendidikan" name="pendidikan" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan">Nama Institusi Penyelenggara
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="pendidikan" name="pendidikan" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan">Jenis Pendidikan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- <input type="text" id="pendidikan" name="pendidikan" class="form-control col-md-7 col-xs-12"> -->
                            <select name="jenis_pendidikan" class="form-control col-md-7 col-xs-12" id="">
                                <option value="">--Piih Jenis Pendidikan--</option>
                                <?php foreach ($jenis_pendidikan as $row) : ?>
                                    <option value="<?= $row['jenis_pend_id'] ?>"><?= $row['jenis_pendidikan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan">Jenjang Pendidikan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- <input type="text" id="pendidikan" name="pendidikan" class="form-control col-md-7 col-xs-12"> -->
                            <select name="jenis_pendidikan" class="form-control col-md-7 col-xs-12" id="">
                                <option value="">--Piih Jenjang Pendidikan--</option>
                                <?php foreach ($jenjang_pendidikan as $row) : ?>
                                    <option value="<?= $row['jenj_pend_id'] ?>"><?= $row['jenjang_pendidikan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan">Tanggal Ijazah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="pendidikan" name="pendidikan" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan">Tahun Lulus
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="pendidikan" name="pendidikan" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan">Nomor Ijazah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="pendidikan" name="pendidikan" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan">Keterangan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="keterangan" id="" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pendidikan">Upload Fila Ijazah
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="pendidikan" name="pendidikan" class="form-control col-md-7 col-xs-12">
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

<?= $this->endSection(); ?>