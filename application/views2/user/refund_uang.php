
 
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
                        <td><?php echo $data_order[0]['nama_order'] ?></td>
                      </tr>
                      <tr>
                        <td><strong>Alamat Penerima</strong></td>
                        <td><?php echo $data_order[0]['alamat_order'] ?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><?php echo $data_order[0]['kode_pos_order'] ?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><?php echo $data_order[0]['kota_order'] ?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><?php echo $data_order[0]['provinsi_order'] ?></td>
                      </tr>
                      <tr>
                        <td><strong>Telepon</strong></td>
                        <td><?php echo $data_order[0]['tlp_order'] ?></td>
                      </tr>
                      <tr>
                        <td><strong>Email</strong></td>
                        <td><?php echo $data_order[0]['email_order'] ?></td>
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
                <h3>Penjual:<?php echo $penjual[0]['nama'] ?></h3>
                 
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
                    <tbody>
                    <tr>
                        <td><a href="#"><img src="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $produk[0]['foto_produk1'] ?>" alt="img" width="250" height="300"></a></td>
                        <td><?php echo $produk[0]['nama_produk'] ?></td>
                        <td><?php echo $produk[0]['harga'] ?></td>
                        <td><?php echo $produk[0]['jumlah_produk'] ?></td>
                        <td><?php echo $produk[0]['subtotal'] ?></td>
                    </tr>
                    
                   
                      </tbody>
                </table>
             
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
                <div class="aa-myaccount-login">
                <h4>Form Refund Uang</h4>
                 <form action="<?php echo base_url() ?>user/order/simpan_refund_uang" method="POST" class="aa-login-form" enctype="multipart/form-data">
                  <input type="hidden" name="id_detail_order" value="<?php echo $produk[0]['id_detail_order'] ?>">
                  <label for="">No. Rekening Penerima<span>*</span></label>
                  <input type="text" name='no_rekening' size=10>
                  <label for="">ATM Penerima<span>*</span></label>
                  <input type="text" name='atm'  size=10>
                  <label for="">Nama Penerima<span>*</span></label>
                  <input type="text" name='nama_penerima' size=10>
                  <p><strong>* Mohon di cek kembali sebelum di kirim, semua kesalahan inputan,bukan tanggung jawab kami</strong></p>
                    <button type="submit" class="aa-browse-btn">Kirim</button>
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>

 <!-- / Cart view section -->