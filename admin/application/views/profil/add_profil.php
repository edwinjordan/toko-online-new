<div class="box-body">
                <?=form_open('profil/save_add',['class'=>'form-horizontal'] ); ?>
                   <div>
                      <?=validation_errors() ?>
                  </div>
                   <table class='table table-hover'>
                    <tbody>
                    Tentang
                    <tr>
                      <td> <textarea name='deskripsi' class="ckeditor" style='width: 800px; height: 350px;'><?php set_value('deskripsi') ?></textarea></td>
                    </tr>
                    Aturan
                    <tr>
                      <td> <textarea name='aturan' class="ckeditor" style='width: 800px; height: 350px;'><?php set_value('aturan') ?></textarea></td>
                    </tr>
                    
                    <tr>
                      <td colspan=2>
                        <button type="submit" class="btn btn-info">Tambah</button>
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
      