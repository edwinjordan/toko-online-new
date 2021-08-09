<section class="panel">
  <header class="panel-heading">Lokasi Toko Anda</header>
  <div class="panel-body table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Provinsi</th>
          <th scope="col">Kota</th>
          <th scope="col">Alamat Lengkap</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($konten as $r) : ?>
          <tr>
            <td><?php echo $r['provinsi'] ?></td>
            <td><?php echo $r['kota'] ?></td>
            <td><?php echo $r['alamat'] ?></td>
            <td>
              <a href="<?php echo base_url("lokasi/edit_lokasi/$r[id_konten]") ?>" class="btn btn-success">Edit</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>