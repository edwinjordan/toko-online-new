<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
<div class="panel-body table-responsive">
<h2>Tambah User</h2>
          <form method=POST action="<?php echo base_url() . 'users/save/' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
	          <tbody>
	          <tr>
	          	<td class='left'>Nama</td>      
	          	<td><input class="form-control" style="width:350px" type='text' name='nama' id="nama" size=60 required></td>
	          </tr>
            
			  <tr>
	          	<td class='left'>Email</td>      
	          	<td><input class="form-control" style="width:350px" type='email' name='email' id="email" size=60 required></td>
	          </tr>
	           <tr>
	          	<td class='left'>Username</td>      
	          	<td><input class="form-control" style="width:350px" type='text' name='username' id="username" size=60 required></td>
	          </tr>
	          <tr>
	          	<td class='left'>Password</td>      
	          	<td><input class="form-control" style="width:350px" type='password' name='pass' id="pass" size=60 required></td>
	          </tr>
			  <tr>
	          	<td class='left'>Level</td>      
	          	<td><select class="form-control" style="width:150px" name='level'>
					  <option selected="selected" value="member">Member</option>
					  <option value="manager">Manager</option>
					  <option value="admin">Admin</option>
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
