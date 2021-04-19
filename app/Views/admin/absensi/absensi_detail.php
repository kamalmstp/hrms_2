<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3><?= $page; ?> </h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= $title; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-9 col-xs-12">
                            <div class="profile_title">
                                <div class="col-md-6">
                                    <form action="/admin/jns_pegawai_save" method="post" class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <div class="col-md-3 col-sm-3">
                                                <select class="form-control" name="bulan" id="bulan">
                                                    <option value="">Januari</option>
                                                    <option value="">Februari</option>
                                                    <option value="">Maret</option>
                                                    <option value="">April</option>
                                                    <option value="">Mei</option>
                                                    <option value="">Juni</option>
                                                    <option value="">Juli</option>
                                                    <option value="">Agustus</option>
                                                    <option value="">September</option>
                                                    <option value="">Oktober</option>
                                                    <option value="">November</option>
                                                    <option value="">Desember</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <select class="form-control" name="tahun" id="tahun">
                                                    <?php for ($i = 2010; $i < 2030; $i++) {
                                                        echo '<option value="">' . $i . '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daftar Absensi Pada Bulan <strong><?= $bulan; ?> - <?= $tahun; ?></strong></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="fingerprint_table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>sidik_id</th>
                                    <th>date</th>
                                    <th>time</th>
                                    <th>state</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#fingerprint_table').DataTable({
            "order": [],
            "serverSide": true,
            "ajax": {
                url: "/admin/isi_detail/<?= $pegawai->sidik_id ?>",
                type: "POST"
            }
        });
    });
</script>
<?= $this->endSection(); ?>