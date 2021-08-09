<section class="panel">
              <header class="panel-heading">
                  List Testimonial
            </header>
            <div class="panel-body table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th colspan="6"><a class="btn btn-success" href="<?php echo base_url() . 'testimonial/add/' ?>">Tambah Baru</a></th>
                  </tr>
                    <tr>
                      <th>#</th>
                      <th>Pengirim</th>
                      <th><center>Isi Testimonial</center></th>
                      <th colspan="2"><center>Aksi</center></th>
                  </tr>
                  
              </thead>
              <tbody>
              <?php 
              	$no = 1;
              	foreach($testimonial_list as $r): 
              ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $r['pengirim_testimonial'] ?></td>
                  <td><?php echo $r['deskripsi_testimonial'] ?></td>
                  <td width="5%"><a href="<?php echo base_url("testimonial/edit_testimonial/$r[id_testimonial]") ?>" class="btn btn-success">Edit</a></td>
				  <td width="7%">
					<form method=POST action="<?php echo base_url() . 'testimonial/hapus/' ?>">
									<input type="hidden" name="id" value="<?php echo $r['id_testimonial'] ?>" >
									<input type="hidden" name="foto_testimonial" value="<?php echo $r['foto_testimonial'] ?>" >
									<input type="submit" class="btn btn-danger" value="Hapus" />
								</form>
                  </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
          <?php echo $pagination; ?>
      </table>
  </div>
</section>