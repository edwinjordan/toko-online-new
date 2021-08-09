<?php 
  $id     = $result->id_konten;
  if ($this->input->post('is_submit')) {
      $deskripsi             = set_value('tentang');
      $aturan                = set_value('aturan');
      } else {
      $deskripsi             = $result->tentang;
      $aturan                = $result->aturan;
      
  }
 ?>
    <!-- Main content -->
        <section class="content">
             
           
        
                <?=form_open('profil/update_konten/'.$id,['class'=>'form-horizontal'] ); ?>
           
                     
                   <table class='table table-hover'>
                    <tbody>
                    Tentang
                    <tr>
                      <td> <textarea name='deskripsi' class="ckeditor" style='width: 800px; height: 350px;'><?php echo $deskripsi ?> </textarea></td>
                    </tr>
                    
                    <tr>
                      <td colspan=2>
                        <button type="submit" class="btn btn-info">Update</button>
                        <input type=button value=Batal class="btn btn-success" onclick=self.history.back()> 
                      </td>
                    </tr>
                     </div>
                    </div><!-- /.box-body -->
                  <!-- <div class="box-footer">
                    <button type="submit" class="btn btn-default">Batal</button>
                    <button type="submit" class="btn btn-info">Tambah</button>
                  </div> --><!-- /.box-footer -->
                  <?php form_close(); ?>
               
   
          
        </section><!-- /.content -->
    
      