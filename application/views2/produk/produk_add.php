<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body table-responsive">
<h2>Tambah Produk</h2>
          <form method=POST action="<?php echo base_url() . 'penjual/produk/save/' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
	          <tbody>
	          <tr>
	          	<td class='left'>Kode Produk</td>      
	          	<td><input type=text name='kode_produk' id="kode" size=60 required></td>
	          </tr>
	          <tr>
	          	<td class='left'>Nama Produk</td>      
	          	<td><input type=text name='nama_produk' id="nama" size=60 required></td>
	          </tr>

	          <tr>
	          	<td class='left'>Kategori Produk</td>      
	          	<td>
	          		<select name="kategori_produk" required>
	          		<?php foreach ($kategori as $k): ?>
	          			<option value="<?php echo $k['id_kategori_produk'] ?>"><?php echo $k['nama_kategori_produk'] ?></option>
	          		<?php endforeach ?>
	          		
	          		</select>
	          	</td>
	          </tr>
            
			  <tr>
	          	<td class='left'>Harga</td>      
	          	<td><input type=text name='harga' id="harga" size=60 required></td>
	          </tr>
			  <tr>
	          	<td class='left'>Berat (g)</td>      
	          	<td><input type=text name='berat' id="berat" size=60 required></td>
	          </tr>
	          <tr>
	          	<td class='left'>Jumlah Stock</td>      
	          	<td><input type=text name='jumlah' id="jumlah" size=10 value="0" required></td>
	          </tr>
	          <tr>
	          	<td class='left'>Deskripsi</td>      
	          	<td><textarea name='deskripsi' id="deskripsi" rows="8" cols="55"> </textarea> </td>
			  </tr>
			  <tr>
	          	<td class='left'>foto 1 (foto_utama)</td>      
	          	<td><input type=file name='foto1' id="foto1" size=10 value="0" accept="image/*"></td>
			  </tr>
			  <tr>
	          	<td class='left'>foto 2</td>      
	          	<td><input type=file name='foto2' id="foto2" size=10 value="0" accept="image/*"></td>
			  </tr>
			  <tr>
	          	<td class='left'>foto 3</td>      
	          	<td><input type=file name='foto3' id="foto3" size=10 value="0" accept="image/*"></td>
			  </tr>
						
            
	          <tr>
	          	<td class='left' colspan=2>
		          	<input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda">
		          	<input type="button" value="Batal" class="btn btn-success" onclick=self.history.back()>
		         </td>
	          </tr>
	          </tbody>
          </table>
         </form>
</div>
