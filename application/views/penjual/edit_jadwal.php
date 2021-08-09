<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body table-responsive">
<h2>Tambah Jadwal</h2>
          <form method=POST action="<?php echo base_url() . 'penjual/produk/action_update_jadwal' ?>" enctype="multipart/form-data">
          <input type="hidden" name="id_produk" value="<?=$pre->id_produk?>">
          <input type="hidden" name="id_jadwal" value="<?=$pre->id_jadwal?>">
          <table class='table table-hover'>
	          <tbody>
	          <tr>
	          	<td class='left'>Tanggal Berangkat</td>      
	          	<td><input type=date name='tgl_berangkat' value="<?=$pre->tgl_berangkat?>"id="kode" size=60 required></td>
	          </tr>
	          <tr>
	          	<td class='left'>Tanggal Pulang</td>      
	          	<td><input type=date name='tgl_pulang' value="<?=$pre->tgl_pulang?>" id="nama" size=60 required></td>
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
<script >
	
	function readURL(id,input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+id)
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
            $("#"+id).show();
        }
    }
</script>