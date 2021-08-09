<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.3.min.js"></script> 
     <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <title>Online Shop | Penjual</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <!-- bootstrap 3.0.2 http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js-->
     <script>
            $(document).ready(function(){
              $('#myTable').DataTable({
                    "iDisplayLength": 10,
            "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
            });
              $('.dataTables_filter input').attr("placeholder", "Search");
              $('.dataTables_filter label').attr("","hide");
            });
  </script> 	   
  	   
    <link href="<?php echo base_url("assets"); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
    <!-- font Awesome -->
    <link href="<?php echo base_url("assets"); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="<?php echo base_url("assets"); ?>/css/style_penjual.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url("assets"); ?>/ckeditor/ckeditor.js"></script>
	<link href="<?php echo base_url("assets/css/ui.datepicker.css"); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("assets/css/ui.theme.css"); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("assets/css/ui.core.css"); ?>" rel="stylesheet" type="text/css" /><script src="<?php echo base_url("assets"); ?>/js/jquery.ui.draggable.js" type="text/javascript"></script>
	<script src="<?php echo base_url("assets/js/ui.datepicker.js"); ?>"></script>
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap-table/dist/bootstrap-table.min.css')?>">
    <script src="<?=base_url('assets/bootstrap-table/dist/bootstrap-table.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/app.js'); ?>" ></script>
    <script type="text/javascript">base_app="<?php echo base_url()?>"</script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style type="text/css">

          </style>
      </head>
      <body class="skin-black" style="background-color: #39435c;">
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
                                    <p>Hello,<?php echo $this->session->userdata("user_name") ?></p>

                                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                </div>
                            </div>
                            
                            <!-- /.search form -->
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                
                                <li class="">
                                    <a href="<?php echo base_url('penjual/produk');?>">
                                        <i class="fa fa-list"></i> <span>Produk Saya</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo base_url('penjual/order');?>">
                                        <i class="fa fa-list"></i> <span>Order</span>
                                    </a>
                                </li>
                                
                                  <li class="">
                                    <a href="<?php echo base_url('penjual/order/refund');?>">
                                        <i class="fa fa-list"></i> <span>Pengembalian Produk</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="<?php echo base_url('penjual/laporan/piutang');?>">
                                        <i class="fa fa-list"></i> <span>Laporan Piutang</span>
                                    </a>
                                </li>
                                
                                
                                 <li class="">
                                    <a href="<?php echo base_url('penjual/laporan/pemasukan');?>">
                                        <i class="fa fa-list"></i> <span>Laporan Pemasukan</span>
                                    </a>
                                </li>



                                <!-- <li class="">
                                    <a href="<?php echo base_url('laporan');?>">
                                        <i class="fa fa-list"></i> <span>Laporan Penjualan</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="<?php echo base_url('laporan');?>">
                                        <i class="fa fa-list"></i> <span>Laporan Keuangan</span>
                                    </a>
                                </li>

								<li class="">
                                    <a href="<?php echo base_url('profil');?>">
                                        <i class="fa fa-list"></i> <span>Profil</span>
                                    </a>
                                </li> -->
								<!-- <li class="">
                                    <a href="<?php echo base_url('kontak');?>">
                                        <i class="fa fa-list"></i> <span>Kontak</span>
                                    </a>
                                </li>
	
								<li class="">
                                    <a href="<?php echo base_url('testimonial');?>">
                                        <i class="fa fa-list"></i> <span>Testimonial</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo site_url('slider');?>">
                                        <i class="fa fa-list"></i> <span>Slider</span>
                                    </a>
                                </li>
                                 <li class="">
                                    <a href="<?php echo site_url('apriori');?>">
                                        <i class="fa fa-list"></i> <span>Apriori</span>
                                    </a>
                                </li> -->
                                <?php if($this->session->userdata("level") == "admin"){?>
                                <li class="">
                                    <a href="<?php echo base_url('users');?>">
                                        <i class="fa fa-list"></i> <span>User</span>
                                    </a>
                                </li>
                                <?php }?>
                                <li class="">
                                    <a href="<?php echo base_url('penjual/dashboard/logout');?>">
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

                     <?php $this->load->view($content); ?>   
                     
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy Elecomp Software House, 2016
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
    

       
        <!-- datepicker
        -->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        

        <script>
			jQuery( "#tgl_mulai" ).datepicker({ dateFormat: 'yy-mm-dd', minDate: 0 });
			jQuery( "#tgl_selesai" ).datepicker({ dateFormat: 'yy-mm-dd', minDate: 0 });
		</script>
   
</body>
</html>