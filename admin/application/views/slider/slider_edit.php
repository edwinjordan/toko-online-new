<div class="panel-body table-responsive">
	<h2>Ubah Slider</h2>
	<form method=POST action="<?php echo base_url() . 'slider/edit_data' ?>" enctype="multipart/form-data">
		<table class='table table-hover'>
			<tbody>
				<tr>
					<td class='left'>Pilih Gambar</td>
					<td>
						<input class="form-control" type=file name='gambar' id="gambar" size=10 value="0" accept="image/*" onchange="readURL('gb',this);" required>
						<br><img id="gb" src="<?= dirname(base_url()) ?>/assets/img/slider/<?php echo $img[0]['gambar']; ?>" alt="your image" width=auto height=200px />
					</td>
				</tr>
				<tr>
					<td class='left' colspan=2>
						<input type=hidden name='id_slider' id="id_slider" size=60 value="<?php echo $img[0]['id_slider']; ?>">
						<input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda">
						<input type="button" value="Batal" class="btn btn-danger" onclick=self.history.back()>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>

<script>
	function readURL(id, input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#' + id)
					.attr('src', e.target.result)
					.width(auto)
					.height(200);
			};

			reader.readAsDataURL(input.files[0]);
			$("#" + id).show();
		}
	}
</script>