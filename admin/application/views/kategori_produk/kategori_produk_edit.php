<div class="panel-body table-responsive">
<h2>Edit Kategori Produk</h2>
	<?php foreach($kategori_produk as $p): ?>
          <form method="POST" action="<?php echo base_url() . 'kategori_produk/edit_kategori_produk_save/' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
          <tbody>
          <tr>
               <td width=150>Nama Kategori Produk</td>     
               <td> 
               <input type="hidden" name="id_kategori_produk" value="<?php echo $p['id_kategori_produk'] ?>">
               <input type=text name="nama_kategori_produk" class="form-control" size=60  style="width: 800px" value="<?php echo $p['nama_kategori_produk'] ?>">     
               </td>
          </tr>
          <tr>
               <td width=150>Title</td>       
               <td> 
               <input type=text name='title' class="form-control" size=60  style="width: 800px" value="<?php echo $p['title_kategori_produk'] ?>">
               </td>
          </tr>
          <tr>
               <td width=150>Meta Description</td>     
               <td> 
               <input type=text name='meta_description' class="form-control" size=60  style="width: 800px" value="<?php echo $p['meta_description_kategori_produk'] ?>">
               </td>
          </tr>
          <tr>
               <td width=150>Meta Keywords</td>    
               <td> 
               <input type=text name='meta_keywords' class="form-control" size=60  style="width: 800px" value="<?php echo $p['meta_keywords_kategori_produk'] ?>">     
               </td>
          </tr>
    <?php endforeach; ?>
          <tr>
               <td colspan=2>
                    <input type=submit value=Simpan class="btn btn-success">
                    <input type=button value=Batal class="btn btn-danger" onclick=self.history.back()>  
               </td>
          </tr>
          </form>
          <tr>
               <td colspan=2>
               		<?php
               		if($p['aktif_kategori_produk']==0){
						$status="aktifkan";
					?>
                    	<form action="<?php echo site_url('kategori_produk/edit_status/'.$status); ?>" method="post">
               			<input type="hidden" name='id_kategori_produk' value="<?php echo $p['id_kategori_produk'] ?>">
                    	<br />Ubah Status: <input type=submit value="Aktifkan" class="btn btn-success" >
                        </form>	
                    <?php
                    }else if($p['aktif_kategori_produk']==1){
						$status="nonaktifkan";
					?>
                    	<form action="<?php echo site_url('kategori_produk/edit_status/'.$status); ?>" method="post">
               			<input type="hidden" name='id_kategori_produk' value="<?php echo $p['id_kategori_produk'] ?>">
                    	<br />Ubah Status: <input type=submit value="Nonaktifkan" class="btn btn-danger" >
                        </form>	
                    <?php
					}
					?>
            		
               </td>
          </tr>
          </tbody>
          </table> 
     
</div>