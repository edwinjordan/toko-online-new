<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body table-responsive">
<h2>Ubah Slider</h2>
          <form method=POST action="<?php echo base_url() . 'slider/edit/' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
		  <?php foreach($edit_slider->result_array() as $r): ?>
	          <tbody>
	          <tr>
	          	<td class='left'>Nama Slider</td>      
	          	<td><input type=text name='judul_slider' id="judul" size=60 value="<?php echo $r['judul']; ?>"></td>
				<input type=hidden name='id' id="id_slider" size=60 value="<?php echo $r['id_slider']; ?>">
	          </tr>
              <tr>
	          	<td class='left'>Isi</td>      
	          	<td><input type=text name='isi_slider' id="isi" size=60  value="<?php echo $r['isi']; ?>"></td>
	          </tr>
	          <tr>
	          	<td class='left' colspan=2>
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
			var judul = $("#judul").val();
			var isi = $("#isi").val();
			if(judul == ""){
				alert("Maad Nama Tempat produk Tidak Boleh Kosong!");
				return false;
			}
			
		})
	});
</script>