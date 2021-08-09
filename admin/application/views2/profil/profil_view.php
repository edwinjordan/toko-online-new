<div class="panel-body table-responsive">
<h2>Profil</h2>
		  <?php foreach($profil->result_array() as $r): ?>
          <form method=POST action="<?php echo base_url() . 'profil/save' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
          <tbody>
          <tr>
          	<td> <textarea name='deskripsi_profil' class="ckeditor" style='width: 800px; height: 350px;'><?php echo $r['deskripsi_profil'] ?></textarea></td>
          </tr>
          <tr>
          	<td colspan=2>
	          	<input type=submit value=Simpan class="btn btn-success">
	          	<input type=button value=Batal class="btn btn-success" onclick=self.history.back()>	
          	</td>
          </tr>
          </tbody>
          </table>
          </form>
		  <?php endforeach?>
</div>