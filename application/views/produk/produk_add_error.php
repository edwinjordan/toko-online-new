<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body table-responsive">
<div class="alert alert-danger">
  <strong>Input salah!</strong> Sesuaikan input dengan contoh yang ada di form!.
</div>
<?php var_dump($error)?>
<h2>Tambah Produk</h2>
          <form method=POST action="<?php echo base_url() . 'produk/save/' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
	          <tbody>
	          <tr>
	          	<td class='left'>Nama Produk</td>      
	          	<td><input type=text name='nama_produk' id="nama" size=60 placeholder="Nama Produk" required></td>
	          </tr>
            
			  <tr>
	          	<td class='left'>Harga</td>      
	          	<td><input type=text name='harga' id="harga" size=60 placeholder="Inputkan Angka" required></td>
	          </tr>
			  <tr>
	          	<td class='left'>Berat (g)</td>      
	          	<td><input type=text name='berat' id="berat" size=60 placeholder="Inputkan Angka" required></td>
	          </tr>
	          <tr>
	          	<td class='left'>Deskripsi</td>      
	          	<td><textarea name='deskripsi' id="deskripsi" rows="8" cols="55"> </textarea></td>
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
