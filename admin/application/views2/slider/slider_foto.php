<section class="panel">
	  <header class="panel-heading">
		  <h4>Foto Produk <?php foreach ($detail_slider->result_array() as $detail): echo $detail['judul']; endforeach?></h4>
	</header>
<div class="panel-body table-responsive">
			  <?php
			  		$cekGambar = $detail_slider->result();
					if(empty($cekGambar[0]->gambar)){
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
						foreach($detail_slider->result_array() as $r):
						?>
						<td width="25%">
							<?php if($r['gambar']){ ?><img src="<?php echo base_url().'img_foto/slider/'.$r['gambar']; ?>" height="100px"><?php } ?> <br/><br/>
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
		  <strong>Ubah Foto</strong>
		  <form method=POST action="<?php echo site_url('slider/foto_save'); ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
	          <tbody>
	          <tr> 
	          	<td><input type='file' name='userfile' size=60><input type='hidden' name='id' value="<?php  echo $id_slider ?>"><br/><h5><b><i >Ukuran file 1600 x 627px</i></b></h5><br /><input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda"></td>
	          </tr>
         </form>
		 </table>
</div>
</section>