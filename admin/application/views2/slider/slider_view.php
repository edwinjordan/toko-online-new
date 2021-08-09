<section class="panel">
              <header class="panel-heading">
                  Daftar Slider
            </header>
            <div class="panel-body table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th colspan="6"><a class="btn btn-success" href="<?php echo base_url() . 'slider/add/' ?>">Tambah Baru</a></th>
                  </tr>
                    <tr>
                      <th>#</th>
                      <th>Judul</th>
                      <th>isi</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                  </tr>
                  
              </thead>
              <tbody>
              <?php 
              	$no = 1;
              	foreach($slider as $r): 	
              ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $r['judul'] ?></td>
                  <td><?php echo $r['isi'] ?></td>
                  <td>	
                    <a href="<?php echo base_url("slider/foto/$r[id_slider]") ?>" class="btn btn-default">Foto</a></td>
                  <td>	
                    <a href="<?php echo base_url("slider/edit_slider/$r[id_slider]") ?>" class="btn btn-success">Edit</a>
                  	<a href="<?php echo base_url("slider/hapus/$r[id_slider]") ?>" class="btn btn-danger">Hapus</a>
                  </td>
				</tr>
              <?php endforeach; ?>
          </tbody>
          <?php echo $pagination; ?>
      </table>
  </div>
</section>