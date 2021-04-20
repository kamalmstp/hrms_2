<?php $session = session() ?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><img src="/images/logo-xs.png" alt=""> <span>HRMS</span></a>
        </div>

        <div class="clearfix"></div>

        <?php if ($session->get('pegawai_id') == NULL) { ?>
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="/images/img.jpg" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2>Administrator</h2>
                </div>
            </div>
        <?php } else { ?>
            <?php
            $db = \Config\Database::connect();
            $id = $session->get('pegawai_id');
            $user = $db->query("SELECT * FROM pegawai WHERE pegawai_id = " . $id)->getRow();
            ?>
            <div class="profile clearfix">
                <div class="profile_pic">
                    <?php if (!empty($user->gambar)) { ?>
                        <img src="/images/user/<?= $user->gambar ?>" alt=" ..." class="img-circle profile_img">
                    <?php } else { ?>
                        <img src="/images/user.png" alt="..." class="img-circle profile_img">
                    <?php } ?>
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2><?= $user->nama; ?></h2>
                </div>
            </div>
        <?php } ?>
        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="/"><i class="fa fa-home"></i> Home </a>
                    </li>
                    <!-- <li><a href="/pegawai/profile"><i class="fa fa-user"></i> Profile </a>
                    </li> -->
                    <li><a href="/pegawai/pendidikan/"><i class="fa fa-graduation-cap"></i> Pendidikan</a></li>
                    <li><a href="/pegawai/keluarga/"><i class="fa fa-group"></i> Keluarga</a></li>
                    <li><a><i class="fa fa-archive"></i> Izin <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/pegawai/daftar_izin">Daftar Izin</a></li>
                            <li><a href="/pegawai/ajukan_izin">Ajukan Izin</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-table"></i> Inventaris <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/pegawai/data_inventaris">Data Inventaris</a></li>
                            <li><a href="/pegawai/add_peminjaman">Add Peminjaman</a></li>
                            <li><a href="/pegawai/riwayat_peminjaman">Riwayat Peminjaman</a></li>
                        </ul>
                    </li>
                    <!-- <li><a><i class="fa fa-table"></i> Inventaris <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Inventaris Pegawai</a></li>
                            <li><a href="#">Data Inventaris</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>