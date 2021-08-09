<!-- Slider -->
<div class="content">
	<div class="container">
		<div class="slider">
			<ul class="rslides" id="slider1">
				<?php
				$slider = $this->toko_online_model->get_table('slider');
				foreach ($slider as $slide) :
				?>
					<li><img src="<?= base_url() ?>assets/img/slider/<?= $slide['gambar'] ?>" alt="slider"></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
<!-- End Slider -->

<!-- Content -->
<?php foreach ($kategori as $result) : ?>
	<div class="top-sellers">
		<div class="container">
			<?php
			$produk = $this->toko_online_model->get_table_join_where_limit('produk', 'kategori_produk', 'produk.kategori_produk = kategori_produk.id_kategori_produk', array('id_kategori_produk' => $result['id_kategori_produk']), 'id_produk', 'RANDOM');
			if ($produk != null) :
			?>
				<br>
				<h3><?= $result['nama_kategori_produk'] ?></h3>
				<div class="seller-grids mb-invoice-3">
					<?php foreach ($produk as $prod) : ?>
						<div class="col-md-3 seller-grid">
							<a href="<?= base_url('user/Home/detail/' . $prod['id_produk']) ?>">
								<img style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $prod['foto_produk1'] ?>" alt="" />
							</a>
							<h4>
								<a href="<?= base_url('user/Home/detail/' . $prod['id_produk']) ?>"><?= substr($prod['nama_produk'], 0, 20) . "...." ?></a>
							</h4>
							<!-- <span>ID: DB4790</span> -->
							<p>Rp. <?= number_format($prod['harga'], 0, ',', '.') ?></p>
							<div class="item-info">
								<div class="color 2">
									<a href="<?= base_url('user/Home/detail/' . $prod['id_produk']) ?>" style="color: white;">Beli</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<div class="clearfix"></div>
					<center>
						<div class="item-info"><a href="<?= base_url('user/home/produk/' . $prod['kategori_produk']) ?>" style="color:white;">Lihat Semua</a></div>
						<center>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endforeach; ?>
<!-- End Content -->