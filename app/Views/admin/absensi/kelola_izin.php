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
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_1" id="all-tab" role="tab" data-toggle="tab" aria-expanded="true">Semua</a>
                                </li>
                                <?php foreach ($izin_jenis as $izin) : ?>
                                    <li role="presentation" class=""><a href="#tab_content<?= $izin['izin_jenis_id'] ?>" role="tab" id="tab<?= $izin['izin_jenis_id'] ?>" data-toggle="tab" aria-expanded="false"><?= $izin['nama'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_1" aria-labelledby="all-tab">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="4%">No</th>
                                                <th>Nama Izin</th>
                                                <th>Nama Pegawai</th>
                                                <th>Tanggal Awal</th>
                                                <th>Tanggal Akhir</th>
                                                <th>Lama Izin</th>
                                                <th>File</th>
                                                <th>Status</th>
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
                                                    <td>
                                                        <a href="/admin/kelola_izin_edit/<?= $row['izin_pegawai_id']; ?>" class="btn btn-warning btn-xs" type="button"><i class="fa fa-pencil"></i> Edit</a>
                                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".modal-del<?= $row['izin_pegawai_id'] ?>"><i class="fa fa-trash-o"></i> Delete </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php foreach ($izin_jenis as $izin1) : ?>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content<?= $izin1['izin_jenis_id'] ?>" aria-labelledby="tab<?= $izin['izin_jenis_id'] ?>">
                                        <table id="datatable<?= $izin1['izin_jenis_id'] ?>" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="4%">No</th>
                                                    <th>Nama Izin</th>
                                                    <th>Nama Pegawai</th>
                                                    <th>Tanggal Awal</th>
                                                    <th>Tanggal Akhir</th>
                                                    <th>Lama Izin</th>
                                                    <th>File</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $izin_peg_model = new \App\Models\IzinPegawaiModel(); ?>
                                                <?php
                                                $i = 1;
                                                $izin_peg = $izin_peg_model->get_izin($izin1['izin_jenis_id'])->getResultArray();
                                                ?>
                                                <?php foreach ($izin_peg as $row) : ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $row['jenis_izin'] . " - " . $row['nama_izin']; ?></td>
                                                        <td><?= $row['nama_pegawai']; ?></td>
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
                                                        <td>
                                                            <a href="/admin/kelola_izin_edit/<?= $row['izin_pegawai_id']; ?>" class="btn btn-warning btn-xs" type="button"><i class="fa fa-pencil"></i> Edit</a>
                                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=".modal-del<?= $row['izin_pegawai_id'] ?>"><i class="fa fa-trash-o"></i> Delete </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php foreach ($izin_pegawai as $row) : ?>
    <div class="modal fade modal-del<?= $row['izin_pegawai_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <form action="/admin/izin_pegawai_del" method="post" class="form-horizontal form-label-left">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                    </div>
                    <div class="modal-body">

                        <p>Apakah anda yakin ingin menghapus Data ?</p>
                        <input type="hidden" name="izin_pegawai_id" value="<?= $row['izin_pegawai_id'] ?>">

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
<?php foreach ($izin_jenis as $row1) : ?>
    <script>
        $(document).ready(function() {
            $('#datatable<?= $row1['izin_jenis_id'] ?>').DataTable();
        });
    </script>
<?php endforeach; ?>
<?= $this->endSection(); ?>