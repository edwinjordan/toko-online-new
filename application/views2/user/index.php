<?php 
  function __construct(){
    parent::__construct();
      $this->load->helper(array('form', 'url'));
      $this->load->model('toko_online_model');
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
         <ul class="seq-canvas">
            <!-- single slide item -->
              <!-- single slide item -->
            <?php 
            $i=0;
            foreach ($data_slider as $key): ?>

            <?php if($i<3) {?>
            <li>
              <div class="seq-model">
              <div data-seq style="border-bottom: 1px solid #ffd900;background-position: center center;background-size: cover; width:100%;height:500px;background-image:url('<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $key['foto_produk1'] ?>')"></div>
              <!--   <img data-seq src="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $key['foto_produk1'] ?>" height="400"  /> -->
              </div>
              <div class="seq-title">
                <h2 data-seq><?php echo $key['nama_produk']; ?></h2>                
                <a data-seq href="<?php echo base_url('user/home/produk_detail/'.$key['id_produk']); ?>" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <?php } ?>
            <?php endforeach ?>
                           
          </ul>
        <!-- slider navigation btn -->
<!--
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
-->
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!--  -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#men" data-toggle="tab">Terbaru</a></li>
                    <li><a href="#women" data-toggle="tab">Termurah</a></li>
                    
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start terbaru product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">
                      <?php foreach ($terbaru as $t) {
                        # code...
                       ?>
                        <!-- start single product item -->
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
                              <a class="aa-add-card-btn" href="<?php echo base_url() ?>user/home/produk_detail/<?php echo $t['id_produk'] ?>" >Detail</a>
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

                        <?php } ?>
                        
                      </ul>
                     <!--  <a class="aa-browse-btn" href="#">Browse all Items <span class="fa fa-long-arrow-right"></span></a> -->
                    </div>
                    <!-- /terbaru product category -->
                    <!-- start termurah product category -->
                    <div class="tab-pane fade" id="women">
                      <ul class="aa-product-catg">
                      <?php foreach ($termurah as $murah) {
                        # code...
                      ?>
                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="<?php echo base_url() ?>user/home/produk_detail/<?php echo $murah['id_produk'] ?>">
                              

                                    <img src="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $murah['foto_produk1'] ?>" height="300" width="250" alt="polo shirt img">
                            </a>
                            <a class="aa-add-card-btn"href="<?php echo base_url() ?>user/home/produk_detail/<?php echo $murah['id_produk'] ?>">Detail</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="#"><?php echo $murah['nama_produk'] ?></a></h4>
                              <span class="aa-product-price">Rp.<?php echo $murah['harga'] ?></span><span class="aa-product-price"></span>
                            </figcaption>
                          </figure>                         
                          <div class="aa-product-hvr-content">
                                                      
                          </div>
                          <!-- product badge -->
                          <span class="aa-badge aa-sale" href="#">SALE!</span>
                        </li>

                      <?php } ?>
                                       
                      </ul>
                    </div>
                  
                  </div>
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
                                          <a class="simpleLens-lens-image" data-lens-image="<?php echo base_url() ?>assets/img/view-slider/large/polo-shirt-1.png">
                                              <img src="<?php echo base_url() ?>assets/img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                          </a>
                                      </div>
                                  </div>
                                  <div class="simpleLens-thumbnails-container">
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="<?php echo base_url() ?>assets/img/view-slider/large/polo-shirt-1.png"
                                         data-big-image="<?php echo base_url() ?>assets/img/view-slider/medium/polo-shirt-1.png">
                                          <img src="<?php echo base_url() ?>assets/img/view-slider/thumbnail/polo-shirt-1.png">
                                      </a>                                    
                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="<?php echo base_url() ?>assets/img/view-slider/large/polo-shirt-3.png"
                                         data-big-image="<?php echo base_url() ?>assets/img/view-slider/medium/polo-shirt-3.png">
                                          <img src="<?php echo base_url() ?>assets/img/view-slider/thumbnail/polo-shirt-3.png">
                                      </a>

                                      <a href="#" class="simpleLens-thumbnail-wrapper"
                                         data-lens-image="<?php echo base_url() ?>assets/img/view-slider/large/polo-shirt-4.png"
                                         data-big-image="<?php echo base_url() ?>assets/img/view-slider/medium/polo-shirt-4.png">
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
                  </div><!-- / quick view modal -->              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <!-- / Subscribe section -->

 
</html>