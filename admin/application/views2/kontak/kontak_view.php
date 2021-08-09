<div class="panel-body table-responsive">
<h2>Kontak Kami</h2>
		  <?php foreach($kontak->result_array() as $r): ?>
          <form method=POST action="<?php echo base_url() . 'kontak/save' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
          <tbody>
          <tr>
          	<td> <textarea name='deskripsi_kontak' class="ckeditor" style='width: 800px; height: 350px;'><?php echo $r['deskripsi_kontak'] ?></textarea></td>
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