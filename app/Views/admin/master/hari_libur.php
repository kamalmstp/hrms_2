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
                    <div class="x_title">
                        <h2><?= $title; ?></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-add"><i class="fa fa-plus"></i> Add </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Tanggal Libur</th>
                                    <th>Keterangan</th>
                                    <th style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($libur as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <?= $row['tgl_libur'] ?>
                                        </td>
                                        <td><?= $row['keterangan']; ?></td>
                                        <td>
                                            <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target=".modal-edit<?= $row['libur_id'] ?>"><i class="fa fa-pencil"></i> Edit </button>
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".modal-del<?= $row['libur_id'] ?>"><i class="fa fa-trash-o"></i> Delete </button>
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

            <form action="/admin/libur_save" method="post" class="form-horizontal form-label-left">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Add Data</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_libur">Tanggal Libur
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="tgl_libur" name="tgl_libur" class="form-control col-md-7 col-xs-12" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wajib">Keterangan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="keterangan" id="" cols="30" rows="5" class="form-control col-md-7 col-xs-12"></textarea>
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

<?php foreach ($libur as $row) : ?>
    <div class="modal fade modal-edit<?= $row['libur_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form action="/admin/libur_update" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode">Tanggal Libur
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="hidden" name="libur_id" value="<?= $row['libur_id'] ?>">
                                <input type="date" id="tgl_libur" name="tgl_libur" value="<?= $row['tgl_libur'] ?>" class="form-control col-md-7 col-xs-12" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="wajib">Keterangan
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="keterangan" id="" cols="30" rows="5" class="form-control col-md-7 col-xs-12"><?= $row['keterangan']; ?></textarea>
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

    <!-- Delete -->
    <div class="modal fade modal-del<?= $row['libur_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form action="/admin/libur_del" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                    </div>
                    <div class="modal-body">

                        <p>Apakah anda yakin ingin menghapus <strong><?= $row['tgl_libur'] ?></strong>?</p>
                        <input type="hidden" name="libur_id" value="<?= $row['libur_id'] ?>">

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