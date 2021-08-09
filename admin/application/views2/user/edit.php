
<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body table-responsive">
<h2>Edit User</h2>
          <form method=POST action="<?php echo base_url() . 'users/edit/'.$edit_user['id_user']; ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
	          <tbody>
	          <tr>
	          	<td class='left'>Nama</td>      
	          	<td><input class="form-control" style="width:350px" type='text' name='nama' id="nama" value="<?php echo $edit_user['nama']; ?>" required></td>
	          </tr>
            
			  <tr>
	          	<td class='left'>Email</td>      
	          	<td><input class="form-control" style="width:350px" type='email' name='email' id="email" value="<?php echo $edit_user['email']; ?>" required></td>
	          </tr>
	           <tr>
	          	<td class='left'>Username</td>      
	          	<td><input class="form-control" style="width:350px" type='' readonly name='username' id="username" value="<?php echo $edit_user['id_user']; ?>" size=60 required></td>
	          </tr>
	          <tr>
	          	<td class='left'>Password</td>      
	          	<td><input class="form-control" style="width:350px" type='password' name='pass' id="pass"></td>
	          </tr>
			  <tr>
	          	<td class='left'>Level</td>      
	          	<td><select class="form-control" style="width:150px" name='level'>
					  <option <?php if($edit_user['level'] == "member "){ echo 'selected="selected"';} ?> value="member">Member</option>
					  <option <?php if($edit_user['level'] == "manager "){ echo 'selected="selected"';} ?> value="manager">Manager</option>
					  <option <?php if($edit_user['level'] == "admin "){ echo 'selected="selected"';} ?> value="admin">Admin</option>
					</select>
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
