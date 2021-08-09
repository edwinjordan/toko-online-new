<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body table-responsive">
<h2>Tambah Jenis</h2>
          <form method=POST action="<?php echo base_url() . 'jenis/save/' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
	          <tbody>
	          <tr>
	          	<td class='left'>Nama Jenis</td>      
	          	<td><input type=text name='nama_jenis' id="tema" size=60></td>
	          </tr>
              <tr>
	          	<td class='left'>Deskripsi Jenis</td>      
	          	<td><input type=text name='desk_jenis' id="tema" size=60></td>
	          </tr>
	          <tr>
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
<script>
	$(document).ready(function(){
		$("#simpan_agenda").click(function(){
			//alert("Maap Judul Agenda Tidak Boleh Kosong!");
			var tema = $("#tema").val();
			if(tema == ""){
				alert("Maaf Nama jenis Tidak Boleh Kosong!");
				return false;
			}
		})
	});
</script>