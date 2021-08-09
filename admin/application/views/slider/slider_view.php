<section class="panel">
  <header class="panel-heading">Daftar Slider</header>
  <div class="panel-body table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th colspan="6">
            <a class="btn btn-success" href="<?php echo base_url() . 'slider/add_slider/' ?>">Tambah Slider</a>
            <a class="btn btn-primary" href="<?php echo base_url() . 'slider/edit_logo/' ?>">Edit Logo</a>
          </th>
        </tr>
        <tr>
          <th>No</th>
          <th>Gambar</th>
        </tr>            
      </thead>
      <tbody>
        <?php $no = 1; foreach($slider as $r): ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td>	
            <img src="<?= dirname(base_url()) ?>/assets/img/slider/<?= $r['gambar'] ?>" alt="img" width=auto height=200px>
          <td>	
            <a href="<?php echo base_url("slider/edit_slider/$r[id_slider]") ?>" class="btn btn-success">Edit</a>
            <a href="<?php echo base_url("slider/delete_slider/$r[id_slider]") ?>" class="btn btn-danger">Hapus</a>
          </td>
				</tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>