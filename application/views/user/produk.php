<!DOCTYPE html>
<html lang="en">

 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="<?php echo base_url()?>assets/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <?php $nama_menu = $this->toko_online_model->get_table_where('menu', array('id_menu' => $id_menu)); ?>
        <h2><?php echo $nama_menu[0]['nama_menu'] ?></h2>
        <ol class="breadcrumb">
        <?php $nama_kategori = $this->toko_online_model->get_table_where('kategori_produk', array('id_menu' => $id_menu)); ?>
        <?php foreach ($nama_kategori as $kat): ?>
            <?php if ($kat['id_kategori_produk'] == $id_kategori_produk): ?>
                <li class="active"><?php echo $kat['nama_kategori_produk'] ?></li>
              <?php else: ?>
                <li><?php echo $kat['nama_kategori_produk'] ?></li>
            <?php endif ?>
          
                    
            
        <?php endforeach ?>
         
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <?php foreach ($produk as $p): ?>
                  
                
                <!-- start single product item -->
                <li>
                  <figure>
                    <a class="aa-product-img" href="<?php echo base_url() ?>user/home/produk_detail/<?php echo $p['id_produk'] ?>"><img src="<?php echo base_url()?>assets/img/produk_penjual/<?php echo $p['foto_produk1'] ?>" width="250" height="300" alt="<?php echo $p['nama_produk']; ?>"></a>
                    <a class="aa-add-card-btn"href="<?php echo base_url() ?>user/home/produk_detail/<?php echo $p['id_produk'] ?>">Detail</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $p['nama_produk'] ?></a></h4>
                      <span class="aa-product-price">Rp.<?php echo $p['harga'] ?></span><span class="aa-product-price"></span>
                      <p class="aa-product-descrip"><?php echo $p['deskripsi'] ?></p>
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                                          
                  </div>
                  <!-- product badge -->
                  
                </li>
                <?php endforeach ?>                       
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
                                          <img src="<?php echo base_url()?>assets/img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="<?php echo base_url()?>assets/img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="<?php echo base_url()?>assets/img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="<?php echo base_url()?>assets/img/view-slider/thumbnail/polo-shirt-4.png">
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
            <div class="aa-product-catg-pagination">

            <?php echo $halaman; ?>
            
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
                 <h3>Category</h3>
                  
              <?php 
                
                $kat = $this->toko_online_model->get_table_where('kategori_produk', array('id_menu' => $id_menu));
                foreach ($kat as $k) {
               ?>
                 

              <ul class="aa-catg-nav">
                <li class="active"><a href="<?php echo base_url('user/home/produk/'.$this->uri->segment(4).'/'.$k['id_kategori_produk']); ?>"><?php echo $k['nama_kategori_produk'] ?></a></li>
              </ul>
              <?php } ?>
            </div>
            <!-- single sidebar -->
            
           
            
            <!-- single sidebar -->
            
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->



  
</html>