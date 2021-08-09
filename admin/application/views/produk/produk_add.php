	<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
	<div class="panel-body ">
		<h2>Tambah Produk</h2>
		<form method=POST action="<?php echo base_url() . 'produk/save' ?>" enctype="multipart/form-data">
			<div class="table-responsive">
				<table class='table'>
					<tbody>
						<!-- <tr>
							<td class='left'>Kode Produk</td>
							<td><input type=text name='kode_produk' id="kode" class="form-control" required></td>
						</tr> -->
						<tr>
							<td class='left'>Nama Produk</td>
							<td><input type=text name='nama_produk' id="nama" class="form-control" required placeholder="nama produk"></td>
						</tr>

						<tr>
							<td class='left'>Kategori Produk</td>
							<td>
								<select name="kategori_produk" class="form-control" required>
									<?php foreach ($kategori as $k) : ?>
										<option value="" disabled selected hidden>pilih kategori produk</option>
										<option value="<?php echo $k['id_kategori_produk'] ?>"><?php echo ucwords($k['nama_kategori_produk']) ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr>
							<td class='left'>Harga</td>
							<td><input type=number min=1 name='harga' id="harga" class="form-control" required placeholder="harga produk"></td>
						</tr>
						<tr>
							<td class='left'>Berat Bersih (g)</td>
							<td><input type=number min=1 name='berat_bersih' id="berat" class="form-control" required placeholder="berat bersih"></td>
						</tr>
						<tr>
							<td class='left'>Berat Kotor (g)</td>
							<td><input type=number min=1 name='berat_kotor' id="berat" class="form-control" required placeholder="berat kotor"></td>
						</tr>
						<tr>
							<td class='left'>Jumlah Stok</td>
							<td><input type=number min=1 name='jumlah' id="jumlah" class="form-control" required placeholder="stok"></td>
						</tr>
						<tr>
							<td class='left'>Deskripsi</td>
							<td><textarea name='deskripsi' id="deskripsi" rows="8" cols="55" class="form-control" placeholder="deskripsi produk"> </textarea> </td>
						</tr>
						<tr>
							<td class='left'>Foto 1 (foto utama)</td>
							<td>
								<input type=file name='foto1' id="foto1" size=10 value="0" accept="image/*" onchange="readURL('ft1',this);">
								<img id="ft1" style="display: none;" src="#" alt="your image" />
							</td>

						</tr>
						<tr>
							<td class='left'>Foto 2</td>
							<td>
								<input type=file name='foto2' id="foto2" size=10 value="0" accept="image/*" onchange="readURL('ft2',this);">
								<img id="ft2" style="display: none;" src="#" alt="your image" />
							</td>
						</tr>
						<tr>
							<td class='left'>Foto 3</td>
							<td>
								<input type=file name='foto3' id="foto3" size=10 value="0" accept="image/*" onchange="readURL('ft3',this);">
								<img id="ft3" style="display: none;" src="#" alt="your image" />
							</td>
						</tr>

						<tr>
							<td class='left' colspan=2>
								<input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda">
								<input type="button" value="Batal" class="btn btn-success" onclick=self.history.back()>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</form>
	</div>

	<script>
		function readURL(id, input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#' + id)
						.attr('src', e.target.result)
						.width(150)
						.height(200);
				};

				reader.readAsDataURL(input.files[0]);
				$("#" + id).show();
			}
		}
	</script>