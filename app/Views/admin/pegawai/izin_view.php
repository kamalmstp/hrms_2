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
                        <h2>Nama Pegawai : <?= $pegawai->nama; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Nama Izin</th>
                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Lama Izin</th>
                                    <th>File</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($izin_pegawai as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['jenis_izin'] . " - " . $row['nama_izin']; ?></td>
                                        <td><?= date('d F Y', strtotime($row['tanggal_awal'])); ?></td>
                                        <td><?= date('d F Y', strtotime($row['tanggal_akhir'])); ?></td>
                                        <td><?= $row['lama']; ?> Hari</td>
                                        <td>
                                            <?php if ($row['file'] == '') {
                                                echo '<i>empty</i>';
                                            } else { ?>
                                                <a target="_blank" href="/admin/file_izin_download/<?= $row['izin_pegawai_id']; ?>" type="button" class="btn btn-info btn-round"> <i class="fa fa-download"></i> </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($row['status'] == 'Diterima') { ?>
                                                <button class="btn btn-success btn-round btn-xs"><?= $row['status']; ?></button>
                                            <?php } elseif ($row['status'] == 'Menunggu') { ?>
                                                <button class="btn btn-warning btn-round btn-xs"><?= $row['status']; ?></button>
                                            <?php } else { ?>
                                                <button class="btn btn-danger btn-round btn-xs"><?= $row['status']; ?></button>
                                            <?php } ?>
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

<?= $this->endSection(); ?>