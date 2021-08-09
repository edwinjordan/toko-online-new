<html>
  <?php 
  if ($this->session->flashdata('msg_cart')) {
    $msg = $this->session->flashdata('msg_cart');
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }?>
  <!-- catg header banner section -->

  <section id="aa-catg-head-banner">

   <img src="<?php echo base_url()?>assets/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">

   <div class="aa-catg-head-banner-area">

     <div class="container">

      <div class="aa-catg-head-banner-content">

        <h2>Cart Page</h2>

        <ol class="breadcrumb">

          <li><a href="<?= base_url('user/home')?>">Home</a></li>                   

          <li class="active">Cart</li>

        </ol>

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

           <div class="cart-view-table">

             <form action="<?php echo base_url()?>user/home/update_keranjang_belanja" method="POST">

                    <?php if($cart != null){

                        ?>

                          <input type="hidden" name="id_keranjang_belanja" value="<?php echo $cart[0]['id_keranjang_belanja'] ?>">

                        <?php

                      } ?>

                      

               <div class="table-responsive">

                  <table class="table">

                    <thead>

                      <tr>
                        <th>Hapus</th>

                        <th>Image</th>

                        <th>Product</th>

                        <th>Price</th>

                        <!-- <th>Quantity</th> -->

                        <th>Total</th>

                      </tr>

                    </thead>

                    <tbody>

                    <?php 

                    $total = 0;

                    foreach ($cart as $c) {

                        

                      $total = $total + $c['subtotal_belanja'];

                      ?>



                        <input type="hidden" name="id_produk[<?php echo $c['id_produk'] ?>]" value="<?php echo $c['id_produk'] ?>">



                        <tr>

                        <td><a class="remove" href="<?php echo base_url() ?>user/home/remove_keranjang_belanja/<?php echo $c['id'] ?>"><fa class="fa fa-close"></fa></a></td>

                        <td><a href="<?php echo base_url() ?>user/home/produk_detail/<?php echo $c['id_produk'] ?>"><img src="<?php echo base_url()?>assets/img/produk_penjual/<?php echo $c['foto_produk1'] ?>" width="250" height="300" alt="img"></a></td>

                        <td><a class="aa-cart-title" href="<?php echo base_url() ?>user/home/produk_detail/<?php echo $c['id_produk'] ?>"><?php echo $c['nama_produk'] ?></a>
                        <p><?=$c['tgl_berangkat']?> - <?=$c['tgl_pulang']?></p></td>

                        <td><?php echo $c['harga_produk'] ?></td>

                        <!-- <td> -->

                        <!-- <select name="quantity[<?php echo $c['id_produk'] ?>]"> -->

                          <?php

                            // for ($i=1; $i <= $c['jumlah_stok'] ; $i++) { 

                            //   if($i == $c['jumlah_produk']){

                                ?>

                                  <!-- <option selected value="<?php echo $i ?>"><?php echo $i ?></option> -->

                                <?php

                              // }

                              // else{

                                ?>

                                  <!-- <option value="<?php echo $i ?>"><?php echo $i ?></option> -->

                                <?php

                              // }

                            // }

                           ?>

                        </select>

                       <!--  <input class="aa-cart-quantity" type="number" name="quantity[<?php echo $c['id_produk'] ?>]" value="<?php echo $c['jumlah_produk'] ?>"> -->

                        </!-->

                        <td><?php echo $c['subtotal_belanja'] ?></td>

                      </tr>

                      <?php

                    } ?>

                      

                      

                      <tr>

                        <td colspan="6" class="aa-cart-view-bottom">

                          <!-- <div class="aa-cart-coupon"> -->

                            <!-- <input class="aa-coupon-code" type="text" placeholder="Coupon">

                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon"> -->

                          <!-- </div> -->

                          <!-- <input class="aa-cart-view-btn" type="submit" value="Update Cart"> -->

                        </td>

                      </tr>

                      </tbody>

                  </table>

                </div>

             </form>

             <!-- Cart Total view -->

             <div class="cart-view-total">

               <h4>Cart Totals</h4>

               <table class="aa-totals-table">

                 <tbody>

                   <tr>

                     <th>Total</th>

                     <td><?php echo "Rp.".$total ?></td>

                   </tr>

                 </tbody>

               </table>

               <a href="<?php echo base_url() ?>user/home/checkout" class="aa-cart-view-btn">Proceed to Checkout</a>

             </div>

           </div>

         </div>

       </div>

     </div>

   </div>

 </section>

 <!-- / Cart view section -->





  <!-- Subscribe section -->

  <section id="aa-subscribe">

    <div class="container">

      <div class="row">

        <div class="col-md-12">

          <div class="aa-subscribe-area">

            <h3>Subscribe our newsletter </h3>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>

            <form action="" class="aa-subscribe-form">

              <input type="email" name="" id="" placeholder="Enter your Email">

              <input type="submit" value="Subscribe">

            </form>

          </div>

        </div>

      </div>

    </div>

  </section>

  <!-- / Subscribe section -->



</html>