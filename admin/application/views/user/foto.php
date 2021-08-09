<section class="panel">
	  <header class="panel-heading">
		  <h4>Foto Produk <?php foreach ($detail_produk->result_array() as $detail): echo $detail['nama_produk']; endforeach?></h4>
	</header>
<div class="panel-body table-responsive">
			  <?php
					if(empty($foto_produk)){
					?><td>
							Belum ada foto untuk tempat produk ini.
					</td>
			 <?php
					} else{
					?>
					
 <table class='table table-hover'>
	          <tbody>
			  <tr>
			  <?php
						$counter = 1;
						foreach($foto_produk->result_array() as $r):
						?>
						<td width="25%">
								<?php if($r['foto_produk']){ ?><img src="<?php echo base_url().'img_foto/produk/'.$r['foto_produk']; ?>" height="100px"><?php } ?> <br/><br/>
								<form method=POST action="<?php echo base_url() . 'produk/foto_hapus/' ?>">
									<input type="hidden" name="id" value="<?php echo $r['id_foto_produk'] ?>" >
									<input type="hidden" name="id_produk" value="<?php echo $r['id_produk'] ?>" >
									<input type="hidden" name="foto_produk" value="<?php echo $r['foto_produk'] ?>" >
									<input type="submit" class="btn btn-danger" value="Hapus" />
								</form>
						</td>
			  <?php 
					if(($counter % 4) == 0) echo "</tr>";
					$counter++;
					endforeach;
				}
				?>
	          </tbody>
          </table>
		  <hr>
		  <strong>Tambah Foto</strong>
		  <form method=POST action="<?php echo base_url() . 'produk/foto_save/' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
	          <tbody>
	          <tr> 
	          	<td><input type='file' name='userfile' size=60><input type='hidden' name='id' value="<?php  echo $id_produk ?>" required><br/><h5><b><i >Ukuran file 400 x 533px, maksimal 2mb</i></b></h5><br /><input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda"></td>
	          </tr>
         </form>
		 </table>
</div>
</section>