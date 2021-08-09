<div class="panel-body table-responsive">
     <h2>Tambah Kategori Produk</h2>
     <form method="POST" action="<?php echo base_url() . 'kategori_produk/save' ?>" enctype="multipart/form-data">
          <table class='table table-hover'>
               <tbody>
                    <tr>
                         <td width=150>Nama Kategoriiiiii Produk</td>
                         <td> <input type="text" name='nama_kategori_produk' class="form-control" size=60 style="width: 800px"></td>
                    </tr>
                    <tr>
                         <td width=150>Title</td>
                         <td>
                              <input type=text name='title' class="form-control" size=60 style="width: 800px">
                         </td>
                    </tr>
                    <tr>
                         <td width=150>Meta Description</td>
                         <td>
                              <input type=text name='meta_description' class="form-control" size=60 style="width: 800px">
                         </td>
                    </tr>
                    <tr>
                         <td width=150>Meta Keywords</td>
                         <td>
                              <input type=text name='meta_keywords' class="form-control" size=60 style="width: 800px">
                         </td>
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