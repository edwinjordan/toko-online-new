<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Online Shop | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <!-- bootstrap 3.0.2 http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js-->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "iDisplayLength": 10,
                "aLengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ]
            });
            $('.dataTables_filter input').attr("placeholder", "Search");
            $('.dataTables_filter label').attr("", "hide");
        });
    </script>


    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->

    <!-- Theme style -->
    <link href="<?php echo base_url("assets"); ?>/css/style_penjual.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url("assets"); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
    <!-- font Awesome -->
    <link href="<?php echo base_url("assets"); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url("assets"); ?>/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo base_url("assets"); ?>/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url("assets"); ?>/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="<?php echo base_url("asset"); ?>/ckeditor/ckeditor.js"></script>
    <link href="<?php echo base_url("assets/css/ui.datepicker.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/ui.theme.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/ui.core.css"); ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url("assets"); ?>/js/jquery.ui.draggable.js" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/ui.datepicker.js"); ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap-table/dist/bootstrap-table.min.css') ?>">
    <script src="<?= base_url('assets/bootstrap-table/dist/bootstrap-table.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
    <script type="text/javascript">
        base_app = "<?php echo base_url() ?>"
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

    <style type="text/css">

    </style>
</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="index.html" class="logo">
            Online Shop
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left info">
                        <p>Hello, Administrator</p>

                        <a href="#"><i class="fa fa-circle text-success"></i> Online <?php echo $tema ?></a>
                    </div>
                </div>

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="">
                        <a href="<?php echo site_url('Menu'); ?>">
                            <i class="fa fa-list"></i> <span>Menu</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url('kategori_produk'); ?>">
                            <i class="fa fa-list"></i> <span>Kategori Produk</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url('order'); ?>">
                            <i class="fa fa-list"></i> <span>Order</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url('produk'); ?>">
                            <i class="fa fa-list"></i> <span>Produk</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="<?php echo site_url('laporan/pembayaran_penjual'); ?>">
                            <i class="fa fa-list"></i> <span>Pembayaran Penjual</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url('order/komplain'); ?>">
                            <i class="fa fa-list"></i> <span>Komplain Produk</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="<?php echo site_url('laporan/pemasukan'); ?>">
                            <i class="fa fa-list"></i> <span>Laporan Pemasukan</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="<?php echo site_url('tema'); ?>">
                            <i class="fa fa-list"></i> <span>Tema</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="<?php echo site_url('profil/show_profil'); ?>">
                            <i class="fa fa-list"></i> <span>Pengaturan Konten</span>
                        </a>
                    </li>

                    <?php if ($this->session->userdata("level") == "admin") { ?>
                        <li class="">
                            <a href="<?php echo site_url('users'); ?>">
                                <i class="fa fa-list"></i> <span>User</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="">
                        <a href="<?php echo site_url('welcome/logout'); ?>">
                            <i class="fa fa-list"></i> <span>Logout</span>
                        </a>
                    </li>


                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <aside class="right-side">

            <!-- Main content -->
            <section class="content">

                <?php echo $this->load->view($content); ?>

                <!-- row end -->
            </section><!-- /.content -->
            <div class="footer-main">
                Copyright &copy Cilinaya, 2016
            </div>
        </aside><!-- /.right-side -->

    </div><!-- ./wrapper -->


    <!-- jQuery 2.0.2 -->


    <!-- jQuery UI 1.10.3 -->
    <script src="<?php echo base_url("assets"); ?>/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url("assets"); ?>/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url("assets"); ?>/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <script src="<?php echo base_url("assets"); ?>/js/plugins/chart.js" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/ui.datepicker.js"); ?>"></script>
    <!-- datepicker
        -->
    <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
    <!-- iCheck -->
    <script src="<?php echo base_url("assets"); ?>/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- calendar -->
    <script src="<?php echo base_url("assets"); ?>/js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

    <!-- Director App -->
    <script src="<?php echo base_url("assets"); ?>/js/Director/app.js" type="text/javascript"></script>

    <!-- Director dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url("assets"); ?>/js/Director/dashboard.js" type="text/javascript"></script>

    <!-- Director for demo purposes -->
    <script type="text/javascript">
        $('input').on('ifChecked', function(event) {
            // var element = $(this).parent().find('input:checkbox:first');
            // element.parent().parent().parent().addClass('highlight');
            $(this).parents('li').addClass("task-done");
            console.log('ok');
        });
        $('input').on('ifUnchecked', function(event) {
            // var element = $(this).parent().find('input:checkbox:first');
            // element.parent().parent().parent().removeClass('highlight');
            $(this).parents('li').removeClass("task-done");
            console.log('not');
        });
    </script>
    <script>
        jQuery("#tgl_mulai").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
        jQuery("#tgl_selesai").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    </script>
    <script>
        $('#noti-box').slimScroll({
            height: '400px',
            size: '5px',
            BorderRadius: '5px'
        });

        $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
            checkboxClass: 'icheckbox_flat-grey',
            radioClass: 'iradio_flat-grey'
        });
    </script>
    <script type="text/javascript">
        $(function() {
            "use strict";
            //BAR CHART
            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data, {
                responsive: true,
                maintainAspectRatio: false,
            });

        });
        // Chart.defaults.global.responsive = true;
    </script>
</body>

</html>