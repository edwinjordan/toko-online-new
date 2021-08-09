<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body table-responsive">
<h2>Ubah Testimonial</h2>
          <form method=POST action="<?php echo base_url() . 'testimonial/edit/' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
		  
          <?php foreach($edit_testimonial->result_array() as $r): 
          	?>
				<input type=hidden name='id' value="<?php echo $r['id_testimonial']?>">
	          <tbody>
	          <tr>
	          	<td class='left'>Pengirim Testimonial</td>      
	          	<td><input type=text name='pengirim' id="tema" size=60 value="<?php echo $r['pengirim_testimonial']?>" required></td>
	          </tr>
	          <tr><td class='left'>Isi Testimonial</td>    
	          	<td> <input type=text name='isi' size=40 id="tempat" value="<?php echo $r['deskripsi_testimonial']?>" required></td>
	          </tr>
	          <td>Foto Pengirim </td>      
    	          <td><?php if($r['foto_testimonial'] != ""): ?>
    	          		
	          		<img src="<?php echo base_url("img_foto/testimonial/$r[foto_testimonial]") ?>" width="180px"/>
	          	<?php endif; ?>
	          	<br/><input type=file name='userfile' style="width: 30%"> 
    	          gambar harus berukuran: 2mb</td></tr>
    	          </td>
              </tr>
	          <tr>
	          	<td class='left' colspan=2>
		          	<input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda">
		          	<input type="button" value="Batal" class="btn btn-success" onclick=self.history.back()>
		         </td>
	          </tr>
	          </tbody>
			  <?php endforeach?>
          </table>
         </form>
</div>
