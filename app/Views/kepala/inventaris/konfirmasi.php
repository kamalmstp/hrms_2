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
                            <!-- <a href="/kepala/add_peminjaman" type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add </a> -->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Barang</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Lokasi Peminjaman</th>
                                    <th>Keperluan</th>
                                    <th>Bukti</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($peminjaman as $row) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_pegawai'] ?></td>
                                        <td><?= $row['nama_barang'] ?></td>
                                        <td><?= $row['tanggal_pinjam'] ?></td>
                                        <td><?= $row['lokasi_pinjam'] ?></td>
                                        <td><?= $row['keperluan'] ?></td>
                                        <td><?php if ($row['foto'] == '') {
                                                echo '<i>empty</i>';
                                            } else { ?>
                                                <a target="_blank" href="/images/peminjaman/<?= $row['foto']; ?>" type="button" class="btn btn-info btn-round"> <i class="fa fa-download"></i> </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-round" data-toggle="modal" data-target=".modal-acc<?= $row['peminjaman_id'] ?>"><i class="fa fa-check"></i></button>
                                            <button type="button" class="btn btn-danger btn-round" data-toggle="modal" data-target=".modal-dis<?= $row['peminjaman_id'] ?>"><i class="fa fa-close"></i></button>
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

<?php foreach ($peminjaman as $row) : ?>
    <div class="modal fade modal-acc<?= $row['peminjaman_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form action="/kepala/peminjaman_approve" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Terima Peminjaman</h4>
                    </div>
                    <div class="modal-body">

                        <p>Terima Peminjaman dari <strong><?= $row['nama_pegawai'] ?></strong> ?</p>
                        <input type="hidden" name="peminjaman_id" value="<?= $row['peminjaman_id'] ?>">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Terima</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade modal-dis<?= $row['peminjaman_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form action="/kepala/peminjaman_reject" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Tolak Peminjaman</h4>
                    </div>
                    <div class="modal-body">

                        <p>Tolak Peminjaman dari <strong><?= $row['nama_pegawai'] ?></strong> ?</p>
                        <input type="hidden" name="peminjaman_id" value="<?= $row['peminjaman_id'] ?>">

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