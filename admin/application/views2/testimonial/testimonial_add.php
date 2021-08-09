<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body table-responsive">
<h2>Tambah Testimonial</h2>
          <form method=POST action="<?php echo base_url() . 'testimonial/save/' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
	          <tbody>
	          <tr>
	          	<td class='left'>Pengirim Testimonial</td>      
	          	<td><input type=text name='pengirim' id="tema" size=60 required></td>
	          </tr>
	          <tr><td class='left'>Isi Testimonial</td>    
	          	<td> <input type=text name='isi' size=40 id="tempat" required></td>
	          </tr>
	          <td>Foto Pengirim </td>      
    	          <td> <input type=file name='userfile' width="30%" size=40 style="width: 30%"> 
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
          </table>
         </form>
</div>
