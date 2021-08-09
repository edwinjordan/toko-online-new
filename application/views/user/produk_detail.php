<!DOCTYPE html>
<html lang="en">




<!-- product category -->
<section id="aa-product-details">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-product-details-area">
          <div class="aa-product-details-content">
            <div class="row">
              <!-- Modal view slider -->
              <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="aa-product-view-slider">
                  <div id="demo-1" class="simpleLens-gallery-container">
                    <div class="simpleLens-container">
                      <div class="simpleLens-big-image-container"><a class="simpleLens-lens-image"><img src="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $produk_detail[0]['foto_produk1'] ?>" class="simpleLens-big-image"></a></div>
                    </div>
                    <div class="simpleLens-thumbnails-container">

                      <?php if ($produk_detail[0]['foto_produk1'] != null) { ?>

                        <a data-big-image="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $produk_detail[0]['foto_produk1'] ?>" class="simpleLens-thumbnail-wrapper" href="#" width="250" height="300">
                          <img src="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $produk_detail[0]['foto_produk1'] ?>" width="45" height="55">
                        </a>

                      <?php } ?>

                      <?php if ($produk_detail[0]['foto_produk2'] != null) { ?>
                        <a data-big-image="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $produk_detail[0]['foto_produk2'] ?>" class="simpleLens-thumbnail-wrapper" href="#" width="250" height="300">
                          <img src="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $produk_detail[0]['foto_produk2'] ?>" width="45" height="55">
                        </a>
                      <?php } ?>

                      <?php if ($produk_detail[0]['foto_produk3'] != null) { ?>
                        <a data-big-image="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $produk_detail[0]['foto_produk3'] ?>" class="simpleLens-thumbnail-wrapper" href="#" width="250" height="300">
                          <img src="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $produk_detail[0]['foto_produk3'] ?>" width="45" height="55">
                        </a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal view content -->
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="aa-product-view-content">
                  <h3><?php echo $produk_detail[0]['nama_produk'] ?></h3>
                  <h3><b>Harga</b></h3>
                  <div class="aa-prod-view-bottom">
                    <p>Rp. <?php echo $produk_detail[0]['harga'] ?></p>
                  </div>
                  <h3><b>Deskripsi</b></h3>
                  <div class="aa-prod-view-bottom">
                    <p><?php echo $produk_detail[0]['deskripsi'] ?></p>
                  </div>
                  <h3><b>Jadwal Keberangkatan</b></h3>
                  <!-- <h3><b>Jumlah</b></h3> 
                    <div class="aa-prod-view-bottom"> -->
                  <form method="POST" action="<?php echo base_url() ?>user/home/keranjang_belanja">
                    <div class="aa-prod-quantity">
                      <div class="aa-prod-view-bottom">
                        <select class="form-control" name="id_jadwal" id="">
                          <?php $pre = $this->db->where('id_produk', $id)->get('jadwal')->result(); ?>
                          <?php foreach ($pre as $press => $o) { ?>
                            <option value="<?= $o->id_jadwal ?>"><?= $o->tgl_berangkat ?> - <?= $o->tgl_pulang ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <input type="hidden" id="" value="1" name="quantity">
                      <?php
                      // for ($i=1; $i <= $produk_detail[0]['jumlah_stok'] ; $i++) { 
                      //   if($i == 1){
                      //  
                      ?>
                      <!-- //   <option selected value="<?php echo $i ?>"><?php echo $i ?></option> -->
                      <?php
                      //  }
                      //  else{
                      //   
                      ?>
                      <!-- //    <option value="<?php echo $i ?>"><?php echo $i ?></option> -->
                      <?php
                      //  }
                      // }
                      ?>
                      <!-- <option selected="1" value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option> -->
                      <!-- </select> -->

                      <input type="hidden" name="harga" value="<?php echo $produk_detail[0]['harga'] ?>">
                      <input type="hidden" name="id_produk" value="<?php echo $produk_detail[0]['id_produk'] ?>">
                      <input type="hidden" name="ip_number" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                      <!--  <p class="aa-prod-category">
                        Category: <a href="#">Polo T-Shirt</a>
                      </p> -->
                    </div>
                </div>
                <br>
                <button type="submit" class="aa-add-to-cart-btn">Add To Cart</button>



                </form>
              </div>
            </div>
          </div>
        </div>



        <!-- Related product -->
        <div class="aa-product-related-item">
          <h3>Latest Products</h3>
          <ul class="aa-product-catg aa-related-item-slider">
            <!-- start single product item -->

            <?php
            $i = 1;
            foreach ($terbaru as $t) {
              if ($i < 5) {
                # code...
            ?>

                <li>
                  <figure>
                    <a class="aa-product-img" href="<?php echo base_url() ?>user/home/produk_detail/<?php echo $t['id_produk'] ?>">


                      <img src="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $t['foto_produk1'] ?>" height="300" width="250" alt="polo shirt img">


                    </a>
                    <form id="cart" method="POST" action="<?php echo base_url() ?>user/home/keranjang_belanja">
                      <input type="hidden" name="harga" value="<?php echo $t['harga'] ?>">
                      <input type="hidden" name="id_produk" value="<?php echo $t['id_produk'] ?>">
                      <input type="hidden" name="ip_number" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
                      <input type="hidden" name="quantity" value="1">
                      <a class="aa-add-card-btn" href="<?php echo base_url() ?>user/home/produk_detail/<?php echo $t['id_produk'] ?>">Detail</a>
                    </form>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $t['nama_produk'] ?></a></h4>
                      <span class="aa-product-price">Rp.<?php echo $t['harga'] ?></span><span class="aa-product-price"></span>
                    </figcaption>
                  </figure>
                  <div class="aa-product-hvr-content">


                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                <!-- start single product item -->
            <?php }
              $i++;
            } ?>

          </ul>
          <!-- quick view modal -->
          <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="row">
                    <!-- Modal view slider -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="aa-product-view-slider">
                        <div class="simpleLens-gallery-container" id="demo-1">
                          <div class="simpleLens-container">
                            <div class="simpleLens-big-image-container">
                              <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                <img src="<?php echo base_url() ?>assets/img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                              </a>
                            </div>
                          </div>
                          <div class="simpleLens-thumbnails-container">
                            <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-1.png" data-big-image="img/view-slider/medium/polo-shirt-1.png">
                              <img src="<?php echo base_url() ?>assets/img/view-slider/thumbnail/polo-shirt-1.png">
                            </a>
                            <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-3.png" data-big-image="img/view-slider/medium/polo-shirt-3.png">
                              <img src="<?php echo base_url() ?>assets/img/view-slider/thumbnail/polo-shirt-3.png">
                            </a>

                            <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-4.png" data-big-image="img/view-slider/medium/polo-shirt-4.png">
                              <img src="<?php echo base_url() ?>assets/img/view-slider/thumbnail/polo-shirt-4.png">
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal view content -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="aa-product-view-content">
                        <h3>T-Shirt</h3>
                        <div class="aa-price-block">
                          <span class="aa-product-view-price">$34.99</span>
                          <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                        <h4>Size</h4>
                        <div class="aa-prod-view-size">
                          <a href="#">S</a>
                          <a href="#">M</a>
                          <a href="#">L</a>
                          <a href="#">XL</a>
                        </div>
                        <div class="aa-prod-quantity">
                          <form action="">
                            <select name="" id="">
                              <option value="0" selected="1">1</option>
                              <option value="1">2</option>
                              <option value="2">3</option>
                              <option value="3">4</option>
                              <option value="4">5</option>
                              <option value="5">6</option>
                            </select>
                          </form>
                          <p class="aa-prod-category">
                            Category: <a href="#">Polo T-Shirt</a>
                          </p>
                        </div>
                        <div class="aa-prod-view-bottom">
                          <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                          <a href="#" class="aa-add-to-cart-btn">View Details</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div>
          <!-- / quick view modal -->
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- / product category -->




</html>