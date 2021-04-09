<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3><?= $title; ?></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= $title ?></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <a href="/admin/add_izin" type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="4%">No</th>
                                    <th>Nama Izin</th>
                                    <th>Nama Pegawai</th>
                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Lama Izin</th>
                                    <th>Keterangan</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($izin_pegawai as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['jenis_izin'] . " - " . $row['nama_izin']; ?></td>
                                        <td><?= $row['nama_pegawai']; ?></td>
                                        <td><?= date('d F Y', strtotime($row['tanggal_awal'])); ?></td>
                                        <td><?= date('d F Y', strtotime($row['tanggal_akhir'])); ?></td>
                                        <td><?= $row['lama']; ?> Hari</td>
                                        <td><?= $row['keterangan']; ?></td>
                                        <td>
                                            <?php if ($row['file'] == '') {
                                                echo '<i>empty</i>';
                                            } else { ?>
                                                <a target="_blank" href="/file/izin/<?= $row['file']; ?>" type="button" class="btn btn-info btn-round"> <i class="fa fa-download"></i> </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target=".modal-acc<?= $row['izin_pegawai_id'] ?>"><i class="fa fa-check"></i></button>
                                            <button type="button" class="btn btn-danger btn-round" data-toggle="modal" data-target=".modal-dis<?= $row['izin_pegawai_id'] ?>"><i class="fa fa-close"></i></button>
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
</div>

<?php foreach ($izin_pegawai as $row) : ?>
    <div class="modal fade modal-acc<?= $row['izin_pegawai_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form action="/admin/konfirmasi_izin_approve" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Terima Izin</h4>
                    </div>
                    <div class="modal-body">

                        <p>Terima Izin dari <strong><?= $row['nama_pegawai'] ?></strong> ?</p>
                        <input type="hidden" name="izin_pegawai_id" value="<?= $row['izin_pegawai_id'] ?>">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Terima</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade modal-dis<?= $row['izin_pegawai_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form action="/admin/konfirmasi_izin_reject" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Tolak Izin</h4>
                    </div>
                    <div class="modal-body">

                        <p>Tolak Izin dari <strong><?= $row['nama_pegawai'] ?></strong> ?</p>
                        <input type="hidden" name="izin_pegawai_id" value="<?= $row['izin_pegawai_id'] ?>">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tolak</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection(); ?>