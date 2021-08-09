<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body table-responsive">
	<h2>Ubah Produk</h2>
	<form method=POST action="<?php echo base_url() . 'produk/edit/' ?>" enctype="multipart/form-data">
		<table class='table table-hover'>
			<?php foreach($edit_produk->result_array() as $r): ?>
				<tbody>
					<tr>
						<td class='left'>Kode Produk</td>      
						<td>
							<input type=text name='kode_produk' id="kode" size=60 value="<?php echo $r['kode_produk']; ?>" required  class="form-control">
						</td>
					</tr>
					<tr>
						<td class='left'>Nama Produk</td>      
						<td>
							<input type=text name='nama_produk' id="nama_produk" size=60 value="<?php echo $r['nama_produk']; ?>" required class="form-control">
						</td>
					</tr>
					<tr>
						<td class='left'>Kategori</td>      
						<td>
							<select name="kategori_produk" class="form-control" required>
								<?php foreach ($kategori as $k): ?>
									<option value="<?php echo $k['id_kategori_produk'] ?>"><?php echo $k['nama_kategori_produk'] ?></option>
								<?php endforeach ?>	          		
							</select>
						</td>
					</tr>
					<tr>
						<td class='left'>Harga</td>      
						<td>
							<input type=text name='harga' id="harga" size=60  value="<?php echo $r['harga']; ?>" required class="form-control">
						</td>
					</tr>
					<tr>
						<td class='left'>Berat (g)</td>      
						<td>
							<input type=text name='berat' id="berat" size=60 value="<?php echo $r['berat'];?>" required class="form-control">
						</td>
					</tr>
					<tr>
						<td class='left'>Jumlah Stock</td>      
						<td>
							<input type=text name='jumlah' id="jumlah" size=10 value="<?php echo $r['jumlah_stok'];?>" required class="form-control">
						</td>
					</tr>
					<tr>
						<td class='left'>Deskripsi</td>      
						<td>
							<textarea type=text name='deskripsi' id="deskripsi" size=60 required class="form-control"><?php echo $r['deskripsi'];?></textarea>
						</td>
					</tr>
					<tr>
						<td class='left' colspan=2>
							<input type=hidden name='id_produk' id="nama" size=60 value="<?php echo $r['id_produk']; ?>" required readonly>
							<input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda">
							<input type="button" value="Batal" class="btn btn-success" onclick=self.history.back()>
						</td>
					</tr>
				</tbody>
			<?php endforeach; ?>
		</form>
	</form>
</table>
</form>
</div>
<script>
	$(document).ready(function(){
		$("#simpan_agenda").click(function(){
			//alert("Maap Judul Agenda Tidak Boleh Kosong!");
			var nama = $("#nama").val();
			var deskripsi = $("#deskripsi").val();
			var kota = $("#kota").val();
			var jenis = $("#jenis").val();
			if(nama == ""){
				alert("Maad Nama Tempat produk Tidak Boleh Kosong!");
				return false;
			}
			
		})
	});
</script>