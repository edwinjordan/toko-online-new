<div class="panel-body table-responsive">
	<?php foreach($edit_foto as $e): ?>
          <table class='table table-hover'>
          <tbody>
          <tr>
               <td colspan="2"><h2>Ganti Foto</h2></td>
          </tr>
          <form method="POST" action="<?php echo base_url() . 'admin/produk/edit_foto_save/' ?>" enctype="multipart/form-data">
          <tr>
               <td>Foto Album</td>      
               <td> 
                    <?php if($e['foto_produk'] != ""): ?>
                         <img src="<?php echo base_url("./img_foto/produk/".$e['foto_produk']); ?>" width="180px"/>
                    <?php endif; ?>
               		<input type="hidden" name='id_produk' value="<?php echo $e['id_produk'] ?>">
               		<input type="hidden" name='id_foto_produk' value="<?php echo $e['id_foto_produk'] ?>">
                    <input type="hidden" name="foto_produk" value="<?php echo $e['foto_produk'] ?>" />
               </td>
          </tr>
          <tr>
               <td>Ganti Gambar</td>      
               <td> <input type=file name='userfile[]' width="30%" size=40 style="width: 30%"> 
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
               
         
          </tbody>
          </table>
     <?php endforeach; ?>
</div>