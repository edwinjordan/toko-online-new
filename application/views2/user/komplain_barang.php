 


  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="<?php echo base_url() ?>assets/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Konfirmasi Penerimaan</h2>
        <h3>Id Order: <?php echo $data_order[0]['id_order'] ?></h3>
        <!-- <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Wishlist</li>
        </ol> -->
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">

     <div class="row">
      <div class="col-md-12">

         <div class="cart-view-area">



         <?php if (isset($komplain_barang[0]['id_detail_order'])) {
           # code...
         if($komplain_barang[0]['status_komplain']=='Belum Ditangani'){ ?>

             <div class="alert alert-warning" role="alert"><strong>Komplain barang Menunggu Persetujuan Admin</strong></div>
          <?php }elseif ($komplain_barang[0]['status_komplain']=='Disetujui') { ?>
            <div class="alert alert-info" role="alert"><strong>Komplain <?php echo $komplain_barang[0]['jenis_komplain']; ?> Telah disetujui, silahkan mengirimkan produk yang telah Di komplain ke alamat gudang kami dan isikan formulir pengembalian produk yang telah di sediakan</strong></div>
         <?php  } elseif ($komplain_barang[0]['status_komplain']=='Disetujui dan Dalam Proses Pengiriman') { ?>
            <div class="alert alert-success" role="alert"><strong>Komplain <?php echo $komplain_barang[0]['jenis_komplain']; ?> Telah disetujui, Silahkan Untuk Ditunggu</strong></div>
         <?php }

         } ?>
           <div class="cart-view-table aa-wishlist-table">
            
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr class="cart_menu">
              
                        <h4 class="title">ID Order Anda: <?php echo $data_order[0]['id_order']?></h4>
                        <h4 class="title">Informasi Pengiriman</h4>
                      </tr>
                    </thead>
                    <thead>
                      <tr>
                        <td><strong>Nama Penerima</strong></td>
                        <td><?php echo $order[0]['nama_order'] ?></td>
                      </tr>
                      <tr>
                        <td><strong>Alamat Penerima</strong></td>
                        <td><?php echo $order[0]['alamat_order'] ?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><?php echo $order[0]['kode_pos_order'] ?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><?php echo $order[0]['kota_order'] ?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><?php echo $order[0]['provinsi_order'] ?></td>
                      </tr>
                      <tr>
                        <td><strong>Telepon</strong></td>
                        <td><?php echo $order[0]['tlp_order'] ?></td>
                      </tr>
                      <tr>
                        <td><strong>Email</strong></td>
                        <td><?php echo $order[0]['email_order'] ?></td>
                      </tr>

                     
                    </thead>
                  
                  </table>
                </div>
             </form>             
           </div>
         </div>
       </div>
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
           <h2></h2>
             
             <div class="table-responsive">
             <?php 
             $angka = 0;
             // print_r($data_penjual);
              ?>
                <h3>Penjual:<?php echo $user[0]['nama'] ?></h3>
                 
                  <table class="table">
                    <thead>
                      <tr>
                       
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                <?php 
                $total_perpenjual = 0;
                ?>
                    <tbody>
                    <tr>
                        <td><a href="#"><img src="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $produk[0]['foto_produk1'] ?>" alt="img" width="250" height="300"></a></td>
                        <td><?php echo $produk[0]['nama_produk'] ?></td>
                        <td><?php echo $produk[0]['harga'] ?></td>
                        <td><?php echo $data_order[0]['jumlah_produk'] ?></td>
                        <td><?php echo $data_order[0]['subtotal'] ?></td>
                    </tr>
                    
                <?php 
                $total_perpenjual = $total_perpenjual + $data_order[0]['subtotal'];
                ?>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $total_perpenjual ?></td>
                    </tr>        
                      </tbody>
                </table>
                <?php if ($data_order[0]['status_kirim'] == 1): ?>
                    <h4><strong>No.Resi: <?php echo $data_order[0]['no_resi'] ?></strong></h4>
                     
                <?php endif ?>
             <?php $angka++;?>
             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section



 <!-- Cart view section -->


 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">

               <?php if (isset($komplain_barang[0]['id_detail_order'])) {?>

               <?php if ($komplain_barang[0]['status_komplain']=='Disetujui') { ?>
                <h4>Form Konfirmasi Pengembalian Produk</h4>
                <form method="POST" action="<?php echo base_url('user/order/konfirmasi_pengembalian_barang'); ?>" >

                  <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_order"  value="<?php echo $data_order[0]['id_order']; ?>">
                   <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_detail_order"  value="<?php echo $data_order[0]['id_detail_order']; ?>">

                    <input type="hidden" class="form-control" id="exampleInputEmail1" name="id_komplain"  value="<?php echo $komplain_barang[0]['id_komplain']; ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" readonly="" value="<?php echo $user[0]['nama']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Produk Yang di Komplain</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_produk" readonly="" value="<?php echo $produk[0]['nama_produk'] ; ?>">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="jumlah_produk" readonly="" value="<?php echo $komplain_barang[0]['jumlah_produk_komplain'] ; ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">No Resi</label>
                    <input type="text" class="form-control" name="no_resi" required="" >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">No Rekening</label>
                    <input type="text" class="form-control" name="no_rek" required="" >
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Bank</label>
                    <input type="text" class="form-control" name="jenis_bank" required="" >
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pemilik Rekening</label>
                    <input type="text" class="form-control" name="nama_rek" required="" >
                  </div>
                 
                  
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
                             <?php } ?>

               <?php }else{ ?>
                <div class="aa-myaccount-login">
                <h4>Form Konfirmasi Komplain Barang</h4>
                 <form action="<?php echo base_url() ?>user/order/simpan_komplain_barang" method="POST" class="aa-login-form" enctype="multipart/form-data">
                  <input type="hidden" name="id_detail_order" value="<?php echo $data_order[0]['id_detail_order'] ?>">
                  <input type="hidden" name="id_penjual" value="<?php echo $user[0]['id_user'] ?>">

                   <label for="">Jenis Komplain<span>*</span></label><br>
                  <select class="form-control" required="" name="jenis_komplain" >
                    <option value="" disabled="" selected="">-Silahakan Pilih-</option>
                    <option value="Pergantian Produk" >Pergantian Produk</option>
                    <option value="Pengembalian Dana" >Pengembalian Dana</option>

                  </select>

                   <label for="">Jumlah Barang Yang Di komplain<span>*</span></label><br>
                  <input type="number" name="jumlah_produk_komplain" class="form-control">


                  <label for="">Pesan Komplain<span>*</span></label><br>
                  <textarea rows="7" name="pesan_komplain" class="form-control" required=""></textarea><br>



                  <label for="">Bukti foto (MAX 1 MB)<span>*</span></label>
                  <input type=file name='foto1' id="foto1" size=10 value="0" accept="image/*" >
                 
                    <button type="submit" class="aa-browse-btn">Konfirmasi</button>
                  </form>
                </div>


                <?php } ?>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>

 <!-- / Cart view section -->