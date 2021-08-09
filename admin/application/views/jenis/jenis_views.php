<section class="panel">
              <header class="panel-heading">
                  List Jenis Tempat Wisata
            </header>
            <div class="panel-body table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th colspan="6"><a class="btn btn-success" href="<?php echo base_url() . 'jenis/add/' ?>">Tambah Baru</a></th>
                  </tr>
                    <tr>
                      <th>#</th>
                      <th>Jenis</th>
                      <th>Deskripsi</th>
                      <th>Action</th>
                  </tr>
                  
              </thead>
              <tbody>
              <?php 
              	$no = 1;
              	foreach($jenis as $r): 
              ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $r['nama_jenis'] ?></td>
                  <td><?php echo $r['deskripsi_jenis'] ?></td>
                  <td>	
                    <a href="<?php echo base_url("jenis/edit_jenis/$r[id_jenis]") ?>" class="btn btn-success">Edit</a>
                  	<a href="<?php echo base_url("jenis/hapus/$r[id_jenis]") ?>" class="btn btn-danger">Hapus</a>
                  </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
          <?php echo $pagination; ?>
      </table>
  </div>
</section>