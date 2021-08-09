<?php 
  $id     = $result->id_konten;
  if ($this->input->post('is_submit')) {
      $aturan                = set_value('aturan');
      } else {
      $aturan                = $result->aturan;
      
  }
 ?>
    <!-- Main content -->
        <section class="content">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="row">
               
              <div class="box-body">
                <?=form_open('profil/update_aturan/'.$id,['class'=>'form-horizontal'] ); ?>
                   <div>
                      <?=validation_errors() ?>
                  </div>
                   <table class='table table-hover'>
                    <tbody>
                    Tentang
                    <tr>
                      <td> <textarea name='aturan' class="ckeditor" style='width: 800px; height: 350px;'><?php echo $aturan ?> </textarea></td>
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
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      