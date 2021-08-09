<div class="panel-body table-responsive">

<h2>Tambah Menu</h2>

          <form method="POST" action="<?php echo base_url() . 'Menu/save' ?>" enctype="multipart/form-data">

          <table class='table table-hover'>

          <tbody>

          <tr>

	          <td width=150>Nama Menu</td>     

	          <td> <input type="text" name='nama_menu' class="form-control" size=60  style="width: 800px"></td>

          </tr>

          

          <tr>

               <td width=150>Title</td>       

               <td> 

               <input type=text name='title' class="form-control" size=60  style="width: 800px" >

               </td>

          </tr>

          <tr>

               <td width=150>Meta Description</td>     

               <td> 

               <input type=text name='meta_description' class="form-control" size=60  style="width: 800px" >

               </td>

          </tr>

          <tr>

               <td width=150>Meta Keywords</td>    

               <td> 

               <input type=text name='meta_keywords' class="form-control" size=60  style="width: 800px" >     

               </td>

          </tr>

          <tr>

	         <td>Foto Menu</td>      

	         <td> <input type="file" name="userfile[]" width="30%" size=40 style="width: 30%"></td>

          </tr>

          <tr>

              <td></td>      

              <td>Ket: Format Gambar: jpg, png, gif. Maksimal size: 2MB.</td>

          </tr>

          

          <tr>

          	<td colspan=2>

	          	<input type=submit value=Simpan class="btn btn-success">

	          	<input type=button value=Batal class="btn btn-danger" onclick=self.history.back()>	

          	</td>

          </tr>

          </tbody>

          </table>

          </form>

</div>