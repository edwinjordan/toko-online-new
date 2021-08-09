<section class="panel">
	<header class="panel-heading">
		<h4>Detail Order #<?php echo $id_order; ?></h4>
	</header>
	<div class="panel-body table-responsive">
		<div class="col-sm-6">
			<h4>Informasi Penerima</h4>
			<table class='table table-hover'>
				<?php
				$status;
				foreach ($order as $o) : ?>
					<tr>
						<td><strong>Nama Pemesan</strong></td>
						<td> : </td>
						<td><?php echo $o['nama_order'] ?></td>
					</tr>
					<tr>
						<td><strong>Alamat Pemesan</strong></td>
						<td> : </td>
						<td><?php echo $o['alamat_order'] ?></td>
					</tr>
					<!-- <tr><td colspan=2></td><td> echo $o['provinsi_order']?></td></tr>
			<tr><td colspan=2></td><td>< echo $o['kode_pos_order']?></td></tr> -->
					<tr>
						<td><strong>No Hp Pemesan</strong></td>
						<td> : </td>
						<td><?php echo $o['tlp_order'] ?></td>
					</tr>
					<tr>
						<td><strong>Kurir yang dipakai</strong></td>
						<td> : </td>
						<td><?php echo $o['kurir'] ?></td>
					</tr>
					<tr>
						<td><strong>Dikirim Pukul</strong></td>
						<td> : </td>
						<td><?php if (strlen($o['jam_kirim']) > 1) {
								echo $o['jam_kirim'];
							} else {
								echo '0' . $o['jam_kirim'];
							} ?></td>
					</tr>
					<tr>
						<td><strong>Ongkir</strong></td>
						<td> : </td>
						<td>Rp. <?php echo number_format($o['ongkir'], 0, ',', '.') ?></td>
					</tr>
					<tr>
						<td><strong>Total Belanja</strong></td>
						<td> : </td>
						<td>Rp. <?php echo number_format($o['total_order'], 0, ',', '.') ?></td>
					</tr>
					<!-- <tr><td><strong>Total Ongkir</strong></td><td> : </td><td>Rp echo $o['ongkir_order']?></td></tr> -->
				<?php
					$status = $o['status_order'];
				endforeach;
				//var_dump($status); 
				?>
			</table>
		</div>
		<?php if ($status == "2") { ?>
			<div class="col-sm-6">
				<h4>Konfirmasi Pembayaran</h4>
				<table class='table table-hover'>
					<form method="post" action="<?php echo base_url() . 'order/konfirmasi' ?>">

						<?php foreach ($konfirmasi as $k) : ?>
							<tr>
								<td><strong>Tanggal Transfer</strong></td>
								<td><input type="text" name="tgl_bayar" id="tgl_mulai" value="<?php echo $k['tgl_konfirmasi'] ?>" disabled></td>
							</tr>
							<tr>
								<td><strong>Nama Transfer</strong></td>
								<td><input type="text" name="nama_bayar" value="<?php echo $k['nama_bayar'] ?>" disabled></td>
							</tr>
							<tr>
								<td><strong>Bank Transfer</strong></td>
								<td><input type="text" name="nama_bank" value="<?php echo $k['bank_bayar'] ?>" disabled></td>
							</tr>
							<tr>
								<td><strong>Rekening Transfer</strong></td>
								<td><input type="text" name="rek_bayar" value="<?php echo $k['rekening_bayar'] ?>" disabled></td>
							</tr>
							<tr>
								<td><strong>Total Transfer</strong></td>
								<td><input type="text" name="total_bayar" value="Rp. <?php echo number_format($k['jumlah_bayar'], 0, ',', '.') ?>" disabled></td>
							</tr>
							<tr>
								<td><strong>Bukti Transfer</strong></td>
								<td><img src="<?= dirname(base_url()) ?>/assets/img/bukti_transfer/<?= $k['foto'] ?>" alt="img" width=auto height=200px></td>
							</tr>

							<input type="hidden" value="<?php echo $id_order ?>" name="id_order">
							<tr>
								<td colspan=2><input type="submit" value="Konfirmasi" class="btn btn-success">
								<td>
							</tr>
						<?php endforeach ?>
					</form>
				</table>
			</div>
		<?php } else if ($status >= 3) { ?>
			<div class="col-sm-6">
				<h4>Konfirmasi Pembayaran</h4>
				<table class='table table-hover'>
					<?php foreach ($konfirmasi as $k) : ?>
						<tr>
							<td><strong>Tanggal Transfer</strong></td>
							<td><?php echo $k['tgl_konfirmasi'] ?></td>
						</tr>
						<tr>
							<td><strong>Nama Transfer</strong></td>
							<td><?php echo $k['nama_bayar'] ?></td>
						</tr>
						<tr>
							<td><strong>Bank Transfer</strong></td>
							<td><?php echo $k['bank_bayar'] ?></td>
						</tr>
						<tr>
							<td><strong>Rekening Transfer</strong></td>
							<td><?php echo $k['rekening_bayar'] ?></td>
						</tr>
						<tr>
							<td><strong>Total Transfer</strong></td>
							<td>Rp. <?php echo number_format($k['jumlah_bayar'], 0, ',', '.') ?></td>
						</tr>
						<tr>
							<td><strong>&nbsp;</strong></td>
							<td><span class="label label-success">Sudah Dibayar</span></td>
						</tr>
					<?php endforeach ?>
				</table>
			</div>
		<?php } ?>
		<br />
		<div class="col-sm-12">
			<div style="display: flex">
				<h4>Daftar Order</h4>
				<?php if ($detail_order[0]['status_kirim'] == 0 && $status >= 3) : ?>
					<a href="<?= base_url() . 'order/kirim/' . $id_order ?>" style="margin: auto; margin-right:0;" class="btn  btn-success">Kirim</a>
				<?php endif; ?>
			</div>
			<table class='table table-hover'>
				<tbody>
					<tr>
						<th>#</th>
						<th>Nama Produk</th>
						<th>Jumlah Produk</th>
						<th>Harga</th>
						<!-- <th>Harga Satuan Setelah Pajak</th> -->
						<th>Subtotal</th>
						<!-- <th>Subtotal Setelah Pajak</th> -->
						<!-- <th>Status</th>
				<th>Resi Pengiriman</th> -->
						<th>Opsi</th>
					</tr>

					<?php
					$counter = 1;

					foreach ($detail_order as $d) :
						if ($d['status_kirim'] == 0) {
							$Status_pengiriman = '<span class="label label-danger">Belum dikirim</span>';
						} elseif ($d['status_kirim'] == 1) {
							//								$start_date = new DateTime($d['tanggal_konfirmasi']);
							//								$end_date = new DateTime($today);
							//								$interval = $start_date->diff($end_date);

							if ($d['pembayaran'] != 0) {
								$Status_pengiriman = '<span class="label label-success"> Barang Telah diterima</span>';
							} else {
								$Status_pengiriman = '<span class="label label-success">Dalam proses pengiriman</span>';
							}
						}
					?>
						<tr>
							<td><?php echo $counter; ?></td>
							<td><?php echo $d['nama_produk'] ?></td>
							<td><?php echo $d['jumlah_produk'] ?></td>
							<td>Rp. <?php echo number_format($d['harga'], 0, ',', '.') ?></td>
							<!-- <td><?php echo $d['harga_pajak'] ?></td> -->
							<td>Rp. <?php echo number_format($d['subtotal'], 0, ',', '.') ?></td>
							<!-- <td><?php echo $d['subtotal_pajak'] ?></td> -->
							<td><?php echo $Status_pengiriman ?></td>
						</tr>


						<?php
						$counter++;
					endforeach;

					if ($counter == 1) {
						foreach ($detail_order2 as $d) { ?>
							<tr>
								<td><?php echo $counter ?></td>
								<td><?php echo $d['nama_produk'] ?></td>
								<td><?php echo $d['jumlah_produk'] ?></td>
								<td><?php echo $d['harga'] ?></td>
								<td><?php echo $d['harga_pajak'] ?></td>
								<td><?php echo $d['subtotal'] ?></td>
								<td><?php echo $d['subtotal_pajak'] ?></td>
								<!-- <td>< echo $Status_pengiriman?></td> -->
								<!-- <td>< echo $d['no_resi']?></td> -->
							</tr>

					<?php }
					}
					?>
				</tbody>
			</table>

			<!-- <div id="toolbar" >
<h4>Detail Ongkir</h4>
</div>          
            
<table data-toggle="table"
       data-url="<?php echo site_url('order/get_data_detail_ongkir/' . $id_order); ?>"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
       data-show-footer="true"
		class="table table-bordered table-striped table-hover"
       data-pagination="true"
       data-toolbar="#toolbar"
       >
        <thead>
        <tr>
            <th data-formatter="number_counter">No</th>
            <th data-field="id_penjual"
             
            >ID Penjual</th>
            
             <th data-field="jasa_pengiriman"
             data-footer-formatter="TotalFormatter"
            >Jasa Pengiriman</th>
           
           <th  data-footer-formatter="sumFormatter"
           	data-field="ongkir"
           	data-width="300">Opsi</th>
         <!--    <th data-field="id_produk" data-formatter="action_produk" data-width="200">Aksi</th>
 -->

			</tr>
			</thead>
			</table><!-- -->


		</div>
	</div>
</section>

<pre>