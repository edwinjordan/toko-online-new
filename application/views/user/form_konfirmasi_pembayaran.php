<!-- catg header banner section -->
<section id="aa-catg-head-banner">
  <img src="<?php echo base_url() ?>assets/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
  <div class="aa-catg-head-banner-area">
    <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Konfirmasi Pembayaran</h2>
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

                      <h4 class="title">ID Order Anda: <?php echo $data_order[0]['id_order'] ?></h4>
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
                      <td><strong>Kode Pos</strong></td>
                      <td><?php echo $data_order[0]['kode_pos_order'] ?></td>
                    </tr>
                    <tr>
                      <td><strong>Kota<strong></td>
                      <td><?php echo $data_order[0]['kota_order'] ?></td>
                    </tr>
                    <tr>
                      <td><strong>Provinsi</strong></td>
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
                    <tr>
                      <td><strong>Status</strong></td>
                      <td><?php echo $status_order ?></td>
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
            <h2>Detail Barang</h2>

            <div class="table-responsive">
              <?php
              $angka = 0;
              // print_r($data_penjual);
              foreach ($data_penjual as $penjual) : ?>
                <h3>Penjual : <?php echo $penjual[0]['nama'] ?></h3>

                <table class="table">
                  <thead>
                    <tr>

                      <th></th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <?php
                  $total_perpenjual = 0;
                  foreach ($penjual as $produk) : ?>
                    <tbody>
                      <tr>
                        <td><a href="#"><img src="<?php echo base_url() ?>assets/img/produk_penjual/<?php echo $produk['foto_produk1'] ?>" alt="img" width="250" height="300"></a></td>
                        <td><?php echo $produk['nama_produk'] ?></td>
                        <td><?php echo $produk['harga'] ?></td>
                        <td><?php echo $produk['jumlah_produk'] ?></td>
                        <td><?php echo $produk['subtotal'] ?></td>

                        <?php if ($produk['status_detail_komplain'] == 1) { ?>
                          <td><a href="<?php echo base_url("user/order/komplain_barang/" . $produk['id_detail_order']); ?>" class="btn btn-success">Detail Komplain Barang</a></td>
                        <?php } else { ?>
                          <td><a href="<?php echo base_url("user/order/komplain_barang/" . $produk['id_detail_order']); ?>" class="aa-browse-btn">Komplain Barang</a></td>
                        <?php } ?>

                        <!--  <td>
                        <?php if ($produk['status_kirim'] < 3) { ?>
                          <form method="POST" action="<?php echo base_url() ?>user/order/komplain_barang">
                            <input type="hidden" name="id_detail_order" value="<?php echo $produk['id_detail_order'] ?>">
                            <button type="submit" class="aa-browse-btn">Komplain Barang</button>
                          </form>
                        <?php } ?>
                        <?php if ($produk['status_kirim'] ==  2) { ?>
                          <form method="POST" action="<?php echo base_url() ?>user/order/refund_uang">
                            <input type="hidden" name="id_detail_order" value="<?php echo $produk['id_detail_order'] ?>">
                            <button type="submit" class="aa-browse-btn">Refund Uang</button>
                          </form>
                        <?php
                        }
                        ?>
                         <?php if ($produk['status_kirim'] ==  3) { ?>
                          <p>Proses refund uang</p>
                        <?php
                          }
                        ?>

        
                         <?php if ($produk['status_kirim'] ==  4) { ?>
                          <p>Refund telah dilakukan</p>
                        <?php
                          }
                        ?>
                        </td> -->
                      </tr>

                    <?php
                    $total_perpenjual = $total_perpenjual + $produk['subtotal'];
                  endforeach ?>
                    <tr>
                      <td><strong>Total</strong></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><?php echo $total_perpenjual ?></td>
                    </tr>
                    </tbody>
                </table>
                <?php if ($penjual[0]['status_kirim'] == 1) : ?>
                  <h4><strong>No.Resi: <?php echo $penjual[0]['no_resi'] ?></strong></h4>
                <?php endif ?>
              <?php $angka++;
              endforeach ?>
              <br>
              <br>
              <table class="table">
                <thead>
                  <tr>
                    <th>Total</th>
                    <th><?php echo $data_order[0]['total_order'] ?></th>
                  </tr>
                  <tr>
                    <th>Ongkir</th>
                    <th><?php echo $data_order[0]['ongkir_order'] ?></th>
                  </tr>
                  <tr>
                    <th>Grand Total</th>
                    <th><?php echo $data_order[0]['grand_total_order'] ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- / Cart view section



 <!-- Cart view section -->

<?php if ($data_order[0]['status_order'] == 1) { ?>
  <section id="aa-myaccount">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-myaccount-area">
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                  <h4>Form Konfirmasi Pembayaran</h4>
                  <form action="<?php echo base_url() ?>user/order/form_konfirmasi_pembayaran" method="POST" class="aa-login-form">
                    <input type="hidden" name="id_order" value="<?php echo $data_order[0]['id_order'] ?>">
                    <label for="">Tanggal Transfer<span>*</span></label>
                    <input type="date" name="tanggal_transfer" placeholder="Tanggal Transfer" required>
                    <label for="">Nama Pemilik Rekening Transfer<span>*</span></label>
                    <input type="text" name="nama_pemilik" placeholder="nama pemilik" required>
                    <label for="">Nomor Rekening Transfer<span>*</span></label>
                    <input type="text" name="no_rekening" placeholder="nomor rekening" required>
                    <label for="">Bank Transfer<span>*</span></label>
                    <input type="text" name="bank" placeholder="bank transfer" required>
                    <label for="">Total Transfer<span>*</span></label>
                    <input type="text" name="total_transfer" placeholder="total transfer" required>
                    <button type="submit" class="aa-browse-btn">Konfirmasi</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
<!-- / Cart view section -->