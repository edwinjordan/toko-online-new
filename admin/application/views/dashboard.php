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

    <link href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.css'); ?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/jquery/jquery-1.12.0.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery/jquery.chained.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.js'); ?>"></script>


    <script type="text/javascript">
        $("#kecamatan").chained("#kota");
        $("#kelurahan").chained("#kecamatan");
    </script>

    <script src="https://kit.fontawesome.com/29e279195e.js" crossorigin="anonymous"></script>



    <!-- Theme style -->
    <link href="<?php echo base_url("assets"); ?>/css/style_penjual.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets"); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
    <link href="<?php echo base_url("assets"); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets"); ?>/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets"); ?>/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets"); ?>/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/ui.datepicker.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/ui.theme.css"); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/sidebar.css"); ?>">
    <link href="<?php echo base_url("assets/css/ui.core.css"); ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url("assets"); ?>/js/jquery.ui.draggable.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap-table/dist/bootstrap-table.min.css') ?>">

    <script src="<?= base_url('assets/bootstrap-table/dist/bootstrap-table.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("asset"); ?>/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url("assets/js/ui.datepicker.js"); ?>"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
    <script type="text/javascript">
        base_app = "<?php echo base_url() ?>"
    </script>

    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <!-- Load file library jQuery melalui CDN -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

</head>

<?php foreach ($tema as $key) { ?>

    <body class="<?php echo $key['nama_tema'] ?> clearfix">
        <header class="header">
            <a href="#" class="logo">Online Shop</a>
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- <a href="#" class="navbar-btn sidebar-toggle navbar-toggler" data-toggle="collapse" data-target="#sidebar" role="button"> -->
                <button href="#" class="navbar-btn sidebar-toggle" id="sidebarCollapse" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <div class="backdrop" style="display: none;"></div>
            <aside class="left-side sidebar-offcanvas" id="sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left info">
                            <p>Hello, Administrator</p>
                            <a href="#"><em class="fa fa-circle text-success"></em> Online </a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="mt-5">
                            <a href="<?php echo site_url('user'); ?>">
                                <em class="fas fa-user" style="margin-left: 3px;"></em> <span style="margin-left: 6px;"> User</span>
                            </a>
                        </li>
                        <li class="">
                            <a href=" <?php echo site_url('slider'); ?>">
                                <em class="fas fa-tv"></em> <span style="margin-left: 5px;">Slider & Logo</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo site_url('kategori_produk'); ?>">
                                <em class="fas fa-layer-group" style="margin-left: 2px;"></em> <span style="margin-left: 6px;"> Kategori Produk</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo site_url('order'); ?>">
                                <em class="fas fa-shopping-cart" style="margin-left: 1px;"></em> <span style="margin-left: 6px;">Order</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo site_url('produk'); ?>">
                                <em class="fas fa-ring" style="margin-left: 3px;"></em> <span style="margin-left: 6px;">Produk</span>
                            </a>
                        </li>
                        <!-- <li class="">
                            <a href="<?php echo site_url('lokasi'); ?>">
                                <em class="fas fa-map-marker-alt" style="margin-left: 5px;"></em> <span style="margin-left: 8px;">Lokasi</span>
                            </a>
                        </li> -->
                        <li class="">
                            <a href="<?php echo site_url('order/komplain'); ?>">
                                <em class="fas fa-comment-dots" style="margin-left: 3px;"></em> <span style="margin-left: 7px;">Komplain Produk</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo site_url('laporan/pemasukan'); ?>">
                                <em class="fas fa-newspaper" style="margin-left: 2px;"></em> <span style="margin-left: 6px;">Laporan Pemasukan</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo site_url('profil/show_profil'); ?>">
                                <em class="fas fa-cogs" style="margin-left: 2px;"></em> <span style="margin-left: 4px;">Pengaturan Konten</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo site_url('tema/show_tema'); ?>">
                                <em class="fas fa-palette" style="margin-left: 4px;"></em> <span style="margin-left: 5px;">Tema</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo site_url('welcome/logout'); ?>">
                                <em class="fa fa-sign-out" style="margin-left: 4px;"></em> <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <aside class="right-side">
                <!-- Main content -->
                <section class="content" id="content">
                    <?php echo $this->load->view($content); ?>
                </section>
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

        <script>
            if ($(window).width() <= 992) {
                if ($('#sidebar').hasClass('collapsed')) {
                    $('.backdrop').hide()
                } else {
                    $('.backdrop').show()
                }
            } else {
                $('.backdrop').hide()
            }
            $(document).on('click', '.sidebar-toggle', () => {
                $('#sidebar').toggleClass('collapsed')
                if ($(window).width() <= 992) {
                    $('.backdrop').toggle()
                } else {
                    $('.backdrop').hide()
                }
            })
            $(document).on('click', '.backdrop', () => {
                $('#sidebar').addClass('collapsed')
                $('.backdrop').hide()
            })
        </script>
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
<?php } ?>

</html>