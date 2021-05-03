<?php $session = session() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title; ?> | HRMS </title>

    <!-- Bootstrap -->
    <link type="text/css" href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link type="text/css" href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link type="text/css" href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link type="text/css" href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link type="text/css" href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- PNotify -->
    <link type="text/css" href="/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link type="text/css" href="/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link type="text/css" href="/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link type="text/css" href="/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link type="text/css" href="/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link type="text/css" href="/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link type="text/css" href="/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link type="text/css" href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link type="text/css" href="/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link type="text/css" href="/build/css/custom.min.css" rel="stylesheet">

    <link type="text/css" href="/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link type="text/css" href="/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $("button").click(function() {
                alert("jQuery is working perfectly.");
            });
        });
    </script> -->
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?= $this->include('layout/nav' . $session->get('role')) ?>

            <!-- top navigation -->
            <?= $this->include('layout/top_nav') ?>
            <!-- /top navigation -->

            <!-- page content -->
            <?= $this->renderSection('content') ?>
            <!-- /page content -->

            <!-- footer content -->
            <?= $this->include('layout/footer') ?>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script type="text/javascript" src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script type="text/javascript" src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script type="text/javascript" src="/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script type="text/javascript" src="/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Chart.js -->
    <script type="text/javascript" src="/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script type="text/javascript" src="/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script type="text/javascript" src="/vendors/Flot/jquery.flot.js"></script>
    <script type="text/javascript" src="/vendors/Flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="/vendors/Flot/jquery.flot.time.js"></script>
    <script type="text/javascript" src="/vendors/Flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script type="text/javascript" src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script type="text/javascript" src="/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script type="text/javascript" src="/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script type="text/javascript" src="/vendors/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="/vendors/pnotify/dist/pnotify.js"></script>
    <script type="text/javascript" src="/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script type="text/javascript" src="/vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!-- iCheck -->
    <script type="text/javascript" src="/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script type="text/javascript" src="/vendors/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script type="text/javascript" src="/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script type="text/javascript" src="/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script type="text/javascript" src="/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script type="text/javascript" src="/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script type="text/javascript" src="/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script type="text/javascript" src="/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script type="text/javascript" src="/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script type="text/javascript" src="/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script type="text/javascript" src="/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script type="text/javascript" src="/vendors/starrr/dist/starrr.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script type="text/javascript" src="/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script type="text/javascript" src="/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script type="text/javascript" src="/vendors/jszip/dist/jszip.min.js"></script>
    <script type="text/javascript" src="/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="/vendors/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script type="text/javascript" src="/build/js/custom.min.js"></script>
    <?php
    $success = $session->getFlashdata('success');
    $error = $session->getFlashdata('error');
    $warning = $session->getFlashdata('warning');
    $info = $session->getFlashdata('info');

    if (empty($session->getFlashdata())) { ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.ui-pnotify').remove();
            });
        </script>
    <?php } elseif (!empty($success)) { ?>
        <script>
            $(document).ready(function() {
                $('.ui-pnotify').remove();
            });
            $(function() {
                var animate_in = $("#animate_in").val(),
                    animate_out = $("#animate_out").val();
                new PNotify({
                    title: "Berhasil !",
                    text: "<?= $success ?>",
                    type: "success",
                    styling: "bootstrap3",
                    animate: {
                        animate: true,
                        in_class: "bounceInLeft",
                        out_class: "slideOutUp"
                    }
                });
            });
        </script>
    <?php } elseif (!empty($error)) { ?>
        <script>
            $(document).ready(function() {
                $('.ui-pnotify').remove();
            });
            $(function() {
                var animate_in = $("#animate_in").val(),
                    animate_out = $("#animate_out").val();
                new PNotify({
                    title: "Gagal !",
                    text: "<?= $error ?>",
                    type: "error",
                    styling: "bootstrap3",
                    animate: {
                        animate: true,
                        in_class: "bounceInLeft",
                        out_class: "slideOutUp"
                    }
                });
            });
        </script>
    <?php } elseif (!empty($warning)) { ?>
        <script>
            $(document).ready(function() {
                $('.ui-pnotify').remove();
            });
            $(function() {
                var animate_in = $("#animate_in").val(),
                    animate_out = $("#animate_out").val();
                new PNotify({
                    title: "Peringatan !",
                    text: "<?= $warning ?>",
                    type: "warning",
                    styling: "bootstrap3",
                    animate: {
                        animate: true,
                        in_class: "bounceInLeft",
                        out_class: "slideOutUp"
                    }
                });
            });
        </script>
    <?php } elseif (!empty($info)) { ?>
        <script>
            $(document).ready(function() {
                $('.ui-pnotify').remove();
            });
            <?php foreach ($info as $i) : ?>
                $(function() {
                    var animate_in = $("#animate_in").val(),
                        animate_out = $("#animate_out").val();
                    new PNotify({
                        title: "Peringatan !",
                        text: "<?= esc($i) ?>",
                        type: "info",
                        styling: "bootstrap3",
                        animate: {
                            animate: true,
                            in_class: "bounceInLeft",
                            out_class: "slideOutUp"
                        }
                    });
                });
            <?php endforeach; ?>
        </script>
    <?php }; ?>
</body>

</html>