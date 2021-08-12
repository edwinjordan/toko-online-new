<?php
//$sesi2 = session_id();
$this->load->model('toko_online_model');
$cart = $this->toko_online_model->get_keranjang_belanja(array('keranjang_belanja.id_keranjang_belanja' => $this->session->userdata('acak')));
$total = $this->toko_online_model->get_total('keranjang_belanja', array('id_keranjang_belanja' => $this->session->userdata('acak')), 'jumlah_produk', 'subtotal_belanja');
$jumlah = $this->toko_online_model->get_jumlah('keranjang_belanja', array('id_keranjang_belanja' => $this->session->userdata('acak')), 'jumlah_produk', 'berat_total');
$kategori = $this->toko_online_model->get_table('kategori_produk');
$logo = $this->toko_online_model->get_table('logo');
$sesi = $this->session->userdata('acak');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <script type='text/javascript' src="<?php echo base_url() ?>assets/js/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat|Raleway:400,200,300,500,600,700,800,900,100' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>

    <link href="<?= base_url() ?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />

    <link href="<?= base_url() ?>assets/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= base_url() ?>assets/css/invoice.css" rel='stylesheet' type='text/css' />
    <link href="<?= base_url() ?>assets/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?= base_url() ?>assets/css/etalage.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/form.css" rel="stylesheet" type="text/css" media="all" />

    <!-- Midtrans -->
    <script type="text/javascript" src="http://apps.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-WIXa4ZorDyT_Kxot"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="<?= base_url() ?>/asset/js/jquery.fancybox.pack.js"></script> -->


    <script type="text/javascript" src="<?= base_url() ?>assets/js/megamenu.js"></script>
    <script>
        $(document).ready(function() {
            $(".megamenu").megamenu();
        });
    </script>
    <script src="<?= base_url() ?>assets/js/menu_jquery.js"></script>
    <script src="<?= base_url() ?>assets/js/simpleCart.min.js"> </script>
    <script src="<?= base_url() ?>assets/js/responsiveslides.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.etalage.min.js"></script>
    <script src="<?php  echo base_url() ?>assets/js/star.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function() {
            // Slideshow 1
            $("#slider1").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
            });
        });

        jQuery(document).ready(function($) {
            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,
                source_image_width: 900,
                source_image_height: 1200,
                show_hint: true,
            });
        });
    </script>

</head>

<body>
    <!-- header -->
    <div class="top_bg">
        <div class="container">
            <div class="header_top-sec">

                <div class="top_left">

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="header_top">
        <div class="container">
            <div class="logo">
                <a href="<?= base_url('user/Home') ?>"><img src="<?= base_url() ?>assets/img/<?= $logo[0]['logo'] ?>" alt="" /></a>
            </div>
            <div class="header_right">

                <div class="cart box_1">
                    <a href="<?= base_url('cart') ?>">
                        <!-- <?php if ($cart != null) : ?>
                            <h3>Rp. <?= number_format($total[0]['total_harga'], 0, ',', '.'); ?> (<span id="simpleCart_quantity"><?= $total[0]['total_jumlah'] ?></span> items)<img src="<?= base_url() ?>assets/img/bag.png" alt=""></h3>
                        <?php else : ?>
                            <h3>Rp. 0,00 (<span id="simpleCart_quantity">0</span> items)<img src="<?= base_url() ?>assets/img/bag.png" alt=""></h3>
                        <?php endif; ?> -->
                        <h3>(<span id="simpleCart_quantity"></span> items)<img src="<?= base_url() ?>assets/img/bag.png" alt=""></h3>
                    </a>
                    <?php if ($cart != null) : ?>
                        <p><a href="<?php echo base_url() ?>user/home/remove_keranjang_belanja/<?= $cart[0]['id'] ?>" class="simpleCart_empty">Empty cart</a></p>
                    <?php endif; ?>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--cart-->

    <!------>
    <div class="mega_nav">
        <div class="container">
            <div class="menu_sec">
                <!-- start header menu -->
                <ul class="megamenu skyblue">
                    <li class="active grid"><a class="color2" href="<?= base_url('user/Home') ?>">Home</a></li>
                    <li class="grid"><a class="color2" href="#">PRODUK</a>
                        <div class="megapanel">
                            <div class="row">
                                <?php foreach ($kategori as $result) : ?>
                                    <div class="col1">
                                        <div class="h_nav" data-toogle="tooltip" data-placement="top" title="<?= strtoupper($result['nama_kategori_produk']) ?>">
                                            <h4><a href="<?= base_url($result['url_slug_kategori']) ?>"><?= substr($result['nama_kategori_produk'], 0, 15) ?></a></h4>
                                            <!-- </?php
                                        $barang = $this->toko_online_model->get_table_join_where_limit('produk', 'kategori_produk', 'produk.kategori_produk = kategori_produk.id_kategori_produk', array('id_kategori_produk' => $result['id_kategori_produk']), 'nama_produk', 'DESC');
                                    ?>
                                    <ul>
                                        <li><a href="</?= base_url('user/Home/produk/'.$result['id_kategori_produk'])?>">Lihat Semua</a></li>
                                        </?php foreach ($barang as $bar ) :?>
                                            <li><a href="</?= base_url('user/Home/detail/'.$bar['id_produk']) ?>"><?= substr($bar['nama_produk'], 0, 18) . " ..." ?></a></li>
                                        </?php endforeach;?>
                                    </ul>	 -->
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="row">
                                <div class="col2"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                                <div class="col1"></div>
                            </div>
                        </div>
                    </li>
                    <li><a class="color2" href="<?= base_url('user/Home/panduan') ?>">Cara Belanja</a></li>
                    <li><a class="color2" href="<?= base_url('user/order/konfirmasi_pembayaran') ?>">Konfirmasi Pembayaran</a></li>
                    <li><a class="color2" href="<?= base_url('user/Home/kontak') ?>">About</a></li>
                </ul>
                <div class="search">
                    <form method="post" action="<?php echo base_url('user/Home/cari_produk') ?>">
                        <input type="text" name="nama_produk" placeholder="Search...">
                        <input type="submit" value="">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Main Content -->
    <!-- <?php echo 'sess' . $this->session->userdata("admin_username") ?> -->
    <?php $this->load->view($content); ?>
    <!-- End Main Content -->

    <!-- Footer -->
    <!-- <div class="footer">
        <div class="container">
            <div class="copywrite">
                <p>Copyright � 2015 Furnyish Store All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
        </div>
    </div> -->
    <!-- End Footer -->
    <script>
        var link = "<?php echo site_url('user/home')?>";
        var acak = '<?php echo $this->session->userdata("id_kpesan"); ?>';
        console.log('acak', acak);

        $(document).ready(function() {  
            cek();
        }); 

        function cek(){
            $.ajax({
            url: link+"/cek_pesan",
            cache: false,
            success: function(msg){ 
            var idk = '<?php 
            $idk = $this->session->userdata('id_kpesan'); if (!empty($idk)) { echo $this->session->userdata("id_kpesan");}else{ echo "0";} ?>';  
              if(idk == 0){
                document.getElementById("simpleCart_quantity").className = "";
               //  document.getElementById("notifikasie").className = "";
              } else{
                //document.getElementById("notifikasi").className = "data-notify='2'";
                $('#simpleCart_quantity').html(msg);
                // document.getElementById("notifikasie").className = "data-notify='2'";
                // $('#notifikasie').html(msg);
                // $('#notife').html('"'+msg+'"');
              }
            }
            });
            //var waktu = setTimeout("cek()",4000);
       }
    </script>    
</body>

</html>