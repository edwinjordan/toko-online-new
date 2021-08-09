<section class="panel">
              <header class="panel-heading">
                  Daftar Menu
            </header>
            <div class="panel-body table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th colspan="6"><a class="btn btn-success" href="<?php echo base_url() . 'menu/add/' ?>">Tambah Baru</a></th>
                  </tr>
                    <tr>
                      <th>No</th>
                      <th>Nama Menu</th>
                      <th>Title</th>
                      <th>Meta Description</th>
                      <th>Meta Keywords</th>
                      <th>Keterangan</th>
                      <th width="10%"><center>Aksi</center></th>
                      
                  </tr>
                  
              </thead>
              <tbody>
              <?php 
              	$no = 1;
              	foreach($menu as $m): 
              ?>
              <tr>
              		<td><?php echo $no++ ?></td>
                  	<td><?php echo $m['nama_menu'] ?></td>
                    <td><?php echo $m['title_menu'] ?></td>
                    <td><?php echo $m['meta_description_menu'] ?></td>
                    <td><?php echo $m['meta_keywords_menu'] ?></td>
                  	<td>
                  		<label class="label <?php 
							if($m['aktif_menu']==0) echo 'label-danger'; 
							else if($m['aktif_menu']==1) echo 'label-success'; 
											?>"
                        >
												
						<?php 
							if($m['aktif_menu']==0) echo 'Tidak Aktif';
							else if($m['aktif_menu']==1) echo 'Aktif';					
						?>
                                                
                        </label>
                  	</td>
                  	<td align="center">
                  		<a href="<?php echo base_url("menu/menu_edit/$m[id_menu]") ?>" class="btn btn-success">Edit</a>
                  	</td>
              </tr>
              <?php endforeach; ?>
          </tbody>
          <?php echo $pagination; ?>
      </table>
  </div>
</section>