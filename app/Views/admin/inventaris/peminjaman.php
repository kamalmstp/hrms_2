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
                            <a href="/admin/add_peminjaman" type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add </a>
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
                                    <th>Tanggal Selesai</th>
                                    <th>Lokasi Peminjaman</th>
                                    <th>Keperluan</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
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
                                        <td><?= date('l, d-m-Y', strtotime($row['tanggal_pinjam'])) ?></td>
                                        <td><?php if ($row['tanggal_kembali'] == NULL) {
                                                echo '';
                                            } else {
                                                echo date('l, d-m-Y', strtotime($row['tanggal_kembali']));
                                            } ?></td>
                                        <td><?= $row['lokasi_pinjam'] ?></td>
                                        <td><?= $row['keperluan'] ?></td>
                                        <td><?php if ($row['foto'] == '') {
                                                echo '<i>empty</i>';
                                            } else { ?>
                                                <a target="_blank" href="/images/peminjaman/<?= $row['foto']; ?>" type="button" class="btn btn-info btn-round"> <i class="fa fa-download"></i> </a>
                                            <?php } ?>
                                        </td>
                                        <td><?php if ($row['status'] == 'Diterima') {
                                                echo '<span class="label label-info">Diterima</span><hr>
                                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target=".modal-return' . $row['peminjaman_id'] . '">Pengembalian </button>';
                                            } elseif ($row['status'] == 'Ditolak') {
                                                echo '<span class="label label-danger">Ditolak</span>';
                                            } elseif ($row['status'] == 'Menunggu') {
                                                echo '<span class="label label-warning">Menunggu</span>';
                                            } else {
                                                echo '<span class="label label-success">Selesai</span>';
                                            } ?>
                                        </td>
                                        <td>
                                            <a href="/admin/edit_peminjaman/<?= $row['peminjaman_id']; ?>" class="btn btn-warning btn-xs" type="button"><i class="fa fa-pencil"></i> Edit</a>
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".modal-del<?= $row['peminjaman_id'] ?>"><i class="fa fa-trash-o"></i> Delete </button>
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
    <div class="modal fade modal-del<?= $row['peminjaman_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form action="/admin/peminjaman_del" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                    </div>
                    <div class="modal-body">

                        <p>Apakah anda yakin ingin menghapus Data ?</p>
                        <input type="hidden" name="peminjaman_id" value="<?= $row['peminjaman_id'] ?>">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade modal-return<?= $row['peminjaman_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <form action="/admin/peminjaman_return" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Pengembalian</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_kembali">Tanggal Pengembalian
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="hidden" name="peminjaman_id" value="<?= $row['peminjaman_id'] ?>">
                                <input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


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