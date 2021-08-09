<!DOCTYPE html>
<html lang="en">
<head>
    <title>Satu Koneksi - Brought to you by the little ONE</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="icon" href="<?php echo base_url("assets/"); ?>/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url("assets/"); ?>/img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>/css/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>/css/responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>/css/camera.css" type="text/css" media="screen"> 
    <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>/css/style.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<style>
    .pagenation{
      float: left;
      width: 100%;
      color: #000;
      font-size: 25px;
      padding-top: 15px;
    }
    .pagenation a{
        color: #000;
    }
    .text-ty > a {
  float: left;
  font-size: 25px;
  margin-top: 30px;
  border-bottom: 1px solid #1e1e1e;
  padding: 0 0 10px 0;
  width: 100%;
}
.btn_{
    margin-top: 0 !important;
}
.indent-2{
    margin-bottom: 0 !important;
}
    </style>
    <script type="text/javascript" src="<?php echo base_url("assets/"); ?>/js/jquery.easing.1.3.js"></script>
    
	<script type="text/javascript" src="<?php echo base_url("assets/"); ?>/js/camera.js"></script>
     <link href="<?php echo base_url("assets/css/"); ?>/custume.css" rel="stylesheet" type="text/css" />

	<script>
      $(document).ready(function(){   
              jQuery('.camera_wrap').camera();
        });    
	</script>		
	<!--[if lt IE 8]>
  		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
  
  <!--[if (gt IE 9)|!(IE)]><!-->
  <script type="text/javascript" src="<?php echo base_url("assets/"); ?>/js/jquery.mobile.customized.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/"); ?>/js/bootstrap.js"></script>
  <!--<![endif]-->
  	<!--[if lt IE 9]>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/docs.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
  <![endif]-->
</head>

<body>
<!--==============================header=================================-->
<header class="p0">
    <div class="container">
    	<div class="row">
        	<div class="span12">
            	<div class="header-block clearfix">
                    <div class="clearfix header-block-pad">
                        <h1 class="brand"><a href="index.html"><img src="<?php echo base_url("assets/"); ?>/img/logo.png" alt=""></a><span></span></h1>
                    </div>
                    <div class="navbar navbar_ clearfix">
                        <div class="navbar-inner navbar-inner_">
                            <div class="container">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">MENU</a>                                                   
                                <div class="nav-collapse nav-collapse_ collapse">
                                    <ul class="nav sf-menu">
                                      <li class="active li-first">
                                      <a href="<?php echo base_url("welcome") ?>"><em class="hidden-phone"></em><span class="visible-phone">Home</span></a></li>
                                      <li><a href="<?php echo site_url("news/berita_all"); ?>">BERITA</a></li>
                                      <li class="sub-menu artikel"><a href="javascript:;">ARTIKEL</a>
                                        <ul class="sub-menu-acara-art">
                                              <?php
                                                $CI =& get_instance();
                                                $sql = $CI->db->query("SELECT * FROM kategori");
                                                foreach($sql->result_array() as $r):
                                              ?>
                                              <li><a href="<?php echo base_url("artikel/cat/$r[kategori_seo]"); ?>"><?php echo $r['nama_kategori'] ?></a></li>

                                              <?php endforeach; ?>
                                        </ul>
                                      </li>
                                      <li class="sub-menu-acara sub-menu"><a href="javascript:;">ACARA-ACARA</a>
                                        <ul class="sub-menu-acara-show">
                                            <li><a href="<?php echo base_url("acara"); ?>">List Acara</a></li>
                                            <li><a href="<?php echo base_url("tiket_online"); ?>">TIKET ONLINE</a></li>
                                            <li><a href="<?php echo base_url("konfirmasi"); ?>">KONFIRMASI</a></li>
                                        </ul>
                                      </li>
                                      <li><a href="<?php echo base_url("tanya_jawab"); ?>">TANYA JAWAB</a></li>
                                      <li><a href="<?php echo base_url("kontak"); ?>">KONTAK KAMI</a></li>
                                      <li><a href="<?php echo base_url("about"); ?>">TENTANG KAMI</a></li>
                                    </ul>
                                </div>
                              
                            </div>
                        </div>
                     </div>   
                </div>
            </div>
         </div>   
    </div>
    
    <div class="slider">
    <div class="camera_wrap">
        <?php
        $CI =& get_instance();
        $sql = $CI->db->query("SELECT * FROM slider limit 3");
        foreach($sql->result_array() as $s):
      ?>
        <div data-src="<?php echo base_url("slider/$s[gambar]"); ?>"></div>
      <?php endforeach; ?>
        
    </div>
	</div>

</header>

<section id="content" class="main-content">
  <div class="container">
   <?php echo $this->load->view($content); ?>   
  </div>
</section>
<footer>
   <div class="container">
    <div class="row">
    <div class="span8 float">
      	Copyright &copy;  2015  |   <a href="index-6.html">Privacy Policy</a> More <a rel="nofollow" href="satukoneksi.com" target="_blank">Satukoneksi.com</a>
      </div>
    </div>
   </div>
</footer>

</body>
</html>
<script>
	$(".sub-menu.artikel ").click(function(){
		//$(".nav-collapse_ .nav ul").show();
        $( ".nav-collapse_ .nav .sub-menu-acara-art" ).toggle( "normal", function() {
        // Animation complete.
      });
      $( ".nav-collapse_ .nav .sub-menu-acara-show" ).hide();
	});
    $(".sub-menu-acara").click(function(){
		//$(".nav-collapse_ .nav ul").show();
        $( ".nav-collapse_ .nav .sub-menu-acara-show" ).toggle( "normal", function() {
        // Animation complete.
      });
      $( ".nav-collapse_ .nav .sub-menu-acara-art" ).hide();
	});
    
</script>
<style>
	.hoverclass{
		display:block;
	}
</style>