<div class="cart_main" style="margin-bottom:80px;">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('user/Home') ?>">Home</a></li>
            <li class="active">Cart</li>
        </ol>
        <?php
        if ($this->session->flashdata('cart')) {
            $msg = $this->session->flashdata('cart');
            echo $msg;
        }
        ?>
        <div class="cart-items">
            <h2>Keranjang belanja (<?php if ($total[0]['total_jumlah'] == null) {
                                        echo '0';
                                    } else {
                                        echo $total[0]['total_jumlah'];
                                    } ?>)</h2>
            <?php foreach ($cart as $ca) : ?>
                <div class="cart-header">
                    <a class="close1" href="<?php echo base_url() ?>user/home/remove_keranjang_belanja/<?php echo $ca['id'] ?>"></a>
                    <div class="cart-sec">
                        <div class="cart-item cyc">
                            <img src="<?= base_url() ?>assets/img/produk_penjual/<?= $ca['foto_produk1'] ?>" />
                        </div>
                        <div class="cart-item-info">
                            <h3><?= $ca['nama_produk'] ?><span>Id: <?= $ca['id_produk'] ?></span></h3>
                            <h4><span>Rp. </span><?= number_format($ca['harga'], 0, ',', '.') ?></h4>
                            <p class="qty">Jumlah Barang: <?= $ca['jumlah_produk'] ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="cart-total">
            <div class="price-details">
                <h3>Harga</h3>
                <!-- <span>Total</span> -->
                <!-- <span class="total">Rp. <?= number_format($total[0]['total_harga'], 0, ',', '.') ?></span> -->
                <div class="clearfix"></div>
            </div>
            <h4 class="last-price">TOTAL</h4>
            <span class="total final">Rp. <?= number_format($total[0]['total_harga'], 0, ',', '.') ?></span>
            <div class="clearfix"></div>
            <a class="order" href="<?= base_url('cart/shipment') ?>">Lanjutkan</a>
        </div>
    </div>
</div>
</div>