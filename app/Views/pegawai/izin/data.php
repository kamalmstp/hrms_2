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
                            <a href="/pegawai/ajukan_izin" type="button" class="btn btn-success"><i class="fa fa-plus"></i> Ajukan Izin </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="4%">No</th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>