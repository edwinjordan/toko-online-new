<div class="panel-body table-responsive">

<h2>Edit Menu</h2>

	<?php foreach($edit_menu as $e): ?>

          <form method="POST" action="<?php echo base_url() . 'Menu/edit/' ?>" enctype="multipart/form-data">

          <table class='table table-hover'>

          <tbody>

          <tr>

               <td width=150>Nama Menu</td>     

               <td> 

               <input type="hidden" name='id_menu' value="<?php echo $e['id_menu'] ?>">

               <input type=text name='nama_menu' class="form-control" size=60  style="width: 800px" value="<?php echo $e['nama_menu'] ?>">

               </td> 

          </tr>

          <tr>

               <td width=150>Title</td>       

               <td> 

               <input type=text name='title' class="form-control" size=60  style="width: 800px" value="<?php echo $e['title_menu'] ?>">

               </td>

          </tr>

          <tr>

               <td width=150>Meta Description</td>     

               <td> 

               <input type=text name='meta_description' class="form-control" size=60  style="width: 800px" value="<?php echo $e['meta_description_menu'] ?>">

               </td>

          </tr>

          <tr>

               <td width=150>Meta Keywords</td>    

               <td> 

               <input type=text name='meta_keywords' class="form-control" size=60  style="width: 800px" value="<?php echo $e['meta_keywords_menu'] ?>">     

               </td>

          </tr>

          <tr>

               <td colspan=2>

                    <input type=submit value=Simpan class="btn btn-success">

                    <input type=button value=Batal class="btn btn-danger" onclick=self.history.back()>  

               </td>

          </tr>

          </form>

        

		  <tr>

        		<td colspan="2"><h2>Edit Gambar Menu</h2></td>

          </tr>

          

          <form method="POST" action="<?php echo base_url() . 'Menu/edit_foto/' ?>" enctype="multipart/form-data">

          <tr>

               <td>Foto Menu</td>      

               <td> 

                    <?php if($e['foto_menu'] != ""): ?>

                         <img src="<?php echo base_url("./img_foto/menu/".$e['foto_menu']); ?>" width="180px"/>

                    <?php endif; ?>

               		<input type="hidden" name='id_menu' value="<?php echo $e['id_menu'] ?>">

                    <input type="hidden" name="foto_menu" value="<?php echo $e['foto_menu'] ?>" />

               </td>

           </tr>

          <tr>

               <td>Ganti Gambar</td>      

               <td> <input type="file" name='userfile[]' width="30%" size=40 style="width: 30%"> 

          </tr>

          <tr>

              <td></td>      

              <td>Ket: Format Gambar: jpg, png, gif. Maksimal size: 2MB.</td>

          </tr>

          <tr>

               <td colspan=2>

                    <input type=submit value=Upload class="btn btn-success">

                    <input type=button value=Batal class="btn btn-danger" onclick=self.history.back()>  

               </td>

          </tr>

          </form>

          

		  <tr>

        		<td colspan="2"><h2>Edit Aktif Menu</h2></td>

          </tr>

          <tr>

               <td colspan=2>

               		<?php

               		if($e['aktif_menu']==0){

						$status="aktifkan";

					?>

                    	<form action="<?php echo site_url('Menu/edit_status_menu/'.$status); ?>" method="post">

               			<input type="hidden" name='id_menu' value="<?php echo $e['id_menu'] ?>">

                    	<br />Ubah Status: &nbsp;&nbsp;<input type=submit value="Aktifkan" class="btn btn-success" >

                        </form>	

                    <?php

                    }else if($e['aktif_menu']==1){

						$status="nonaktifkan";

					?>

                    	<form action="<?php echo site_url('Menu/edit_status_menu/'.$status); ?>" method="post">

               			<input type="hidden" name='id_menu' value="<?php echo $e['id_menu'] ?>">

                    	<br />Ubah Status: &nbsp;&nbsp;<input type=submit value="Nonaktifkan" class="btn btn-danger" >

                        </form>	

                    <?php

					}

					?>

            		

               </td>

          </tr>

          </tbody>

          </table>

     <?php endforeach; ?>

</div>