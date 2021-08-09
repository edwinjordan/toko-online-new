<div class="panel-body">
	<h2>Edit Data Lokasi</h2>
	<form method=POST action="<?php echo base_url() . 'lokasi/edit_data' ?>" enctype="multipart/form-data">
		<table class='table table-hover'>
			<thead>
				<tr>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>

				<tr>
					<td>
						<label>Provinsi</label>
						<input class="form-control" style="width: 50%;" type=text name='provinsi' id="provinsi" required>
					</td>
				</tr>
				<tr>
					<td>
						<label>Kota/Kab</label>
						<input class="form-control" style="width: 50%;" type=text name='kota' id="kota" required>
					</td>
				</tr>
				<tr>
					<td>
						<label>Alamat Lengkap</label>
						<input class="form-control" style="width: 50%;" type=text-area name='alamat' id="alamat" required>
					</td>
				</tr>
				<tr>
					<td colspan=2>
						<input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda">
						<input type="button" value="Batal" class="btn btn-danger" onclick=self.history.back()>
					</td>
				</tr>

			</tbody>
		</table>
	</form>

</div>