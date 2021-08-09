<?php 
  $menu = $this->toko_online_model->get_table_where('menu', array('aktif_menu' => 1));
  $cart = $this->toko_online_model-> get_keranjang_belanja(array('keranjang_belanja.id_keranjang_belanja'=> $_SERVER['REMOTE_ADDR']));

  $quantity = 0;
  foreach ($cart as $c) {
    $quantity = $quantity + $c['jumlah_produk'];
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Jevera Shop | Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Font awesome -->
    <link href="<?php echo base_url() ?>assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="<?php echo base_url() ?>assets/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="<?php echo base_url() ?>assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 
   <!-- wpf loader Two -->
    <!-- <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div>  -->
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                

                <!-- start currency -->
               
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><a href="<?php echo base_url() ?>user/order/konfirmasi_pembayaran">Konfirmasi Order</a></p>
                </div>
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-user"></span><a href="" data-toggle="modal" data-target="#login-modal">Login</a></p>
                </div>
               
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <div class="aa-header-bottom-area">
              <a href="<?php echo base_url(); ?>"><img style="width: 214px;margin-top: -8px;" src="<?php echo base_url("assets/img/logocart.png")?>"    ></a> 
             
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="<?php echo base_url()?>user/home/cart">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify"><?php echo $quantity ?></span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                <?php 
                    $total = 0;
                    foreach ($cart as $c) {
                    $total = $total + $c['subtotal_belanja'];
                  ?>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $c['foto_produk1'] ?>" height="150" width="150" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#"><?php echo $c['nama_produk'] ?></a></h4>
                        <p><?php echo $c['jumlah_produk'].'x'.$c['subtotal_belanja'] ?></p>
                      </div>
                      <a class="aa-remove-product" href="<?php echo base_url() ?>user/home/remove_keranjang_belanja/<?php echo $c['id'] ?>"><span class="fa fa-times"></span></a>
                    </li>
                  <?php
                    # code...
                  } ?>
                
                    
                    <!-- <li>
                      <a class="aa-cartbox-img" href="#"><img src="<?php echo base_url() ?>assets/img/woman-small-1.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>  -->                   
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        <?php echo 'Rp.'.$total ?>
                      </span>
                    </li>
                  </ul>
                  <?php 
                    if($cart !=  null){
                      ?>
                         <a class="aa-cartbox-checkout aa-primary-btn" href="<?php echo base_url() ?>user/home/checkout">Checkout</a>
                      <?php
                    }
                   ?>
                 
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
            
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url() ?>user/home">Home</a></li>
              <?php foreach ($menu as $m) {
                  $kategori = $this->toko_online_model->get_table_where('kategori_produk', array('id_menu' => $m['id_menu']));
                  if($kategori != null){
              ?>
              <li><a href="#"><?php echo $m['nama_menu'] ?> <span class="caret"></span></a>

                <ul class="dropdown-menu">
                  <?php foreach ($kategori as $k) {
                    ?>
                     <li><a href="<?php echo base_url() ?>user/home/produk/<?php echo $k['id_menu'] ?>/<?php echo $k['id_kategori_produk'] ?>"><?php echo $k['nama_kategori_produk'] ?></a></li>
                    <?php
                  } ?>                
                 
                  
                </ul>
              </li>
              <?php 
                }
                else{
                 ?>
                  <li><a href="#"><?php echo $m['nama_menu'] ?></a>
                 <?php
                }
              } ?>
             
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  
  <?php 
    $this->load->view($content);
   ?>

  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    
                    <li><a href="<?php echo base_url("user/home/about"); ?>">About Us</a></li>


                       <li><a href="<?php echo base_url("user/home/aturan"); ?>">Aturan Umum</a></li>
                     <li><a href="<?php echo base_url("user/home/panduan"); ?>">Panduan</a></li>
          
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>jevera@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="<?php echo base_url() ?>user/home/login" method="POST">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" name="username" placeholder="Username">
            <label for="">Password<span>*</span></label>
            <input type="password" name="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="<?php echo base_url('user/home/account') ?>">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    

  <!-- jQuery library -->
  

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/nouislider.js"></script>
  
  <!-- Custom js -->
  <script src="<?php echo base_url() ?>assets/js/custom.js"></script> 

  </body>
</html>