<div class="panel-body table-responsive">
	<h2>Tambah Slider</h2>
    <form method=POST action="<?php echo base_url() . 'slider/add_data' ?>" enctype="multipart/form-data">
        <table class='table table-hover'>
	    	<tbody>
	        	<tr>
	        		<td class='left'>Pilih Gambar</td>      
	          		<td><input type=file class="form-control" name='slider' id="judul" size=60 required></td>
	          	</tr>
	          	<tr>
		          	<td class='left' colspan=2>
			          	<input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda">
			          	<input type="button" value="Batal" class="btn btn-danger" onclick=self.history.back()>
				    </td>
	          	</tr>
	        </tbody>
        </table>
    </form>
</div>