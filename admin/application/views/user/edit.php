
<div class="panel-body table-responsive">
	<h2>Edit User</h2>
    <form method=POST action="<?php echo base_url() . 'user/edit_user_data' ?>">
        <table class='table table-hover'>
	        <tbody>
	          	<tr>
	          		<td class='left'>Username</td>      
	          		<td><input class="form-control" style="width:350px" type='text' name='nama' value="<?php echo $user[0]['admin_username']; ?>" required></td>
	          	</tr>            
			  	<tr>
	          		<td class='left'>Password</td>      
	          		<td><input class="form-control" style="width:350px" type='password' name='pass' value="<?php echo $user[0]['admin_view_password']; ?>" required></td>
	          	</tr>
	          	<tr>
	          		<td class='left' colspan=2>
					  	<input type="hidden" name="id" value="<?= $user[0]['id_admin']?>">
		          		<input type="submit" value="Simpan" class="btn btn-success" id="simpan_agenda">
		          		<input type="button" value="Batal" class="btn btn-danger" onclick=self.history.back()>
		         	</td>
	          	</tr>
	        </tbody>
        </table>
    </form>
</div>
