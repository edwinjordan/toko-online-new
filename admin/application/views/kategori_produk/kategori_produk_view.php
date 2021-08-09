<section class="panel">
  <header class="panel-heading">
    Daftar Kategori Produk (Submenu)
  </header>
  <div class="panel-body table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th colspan="6"><a class="btn btn-success" href="<?php echo base_url() . 'kategori_produk/add/' ?>">Tambah Kategori Produk</a></th>
        </tr>
        <tr>
          <th>No</th>
          <th>Nama Kategori Produk</th>
          <th>Title</th>
          <th>Meta Description</th>
          <th>Meta Keywords</th>
          <th>Aksi</th>
        </tr>

      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($kategori_produk as $p) :
        ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $p['nama_kategori_produk'] ?></td>
            <td><?php echo $p['title_kategori_produk'] ?></td>
            <td><?php echo $p['meta_description_kategori_produk'] ?></td>
            <td><?php echo $p['meta_keywords_kategori_produk'] ?></td>
            <td>
              <a href="<?php echo base_url("kategori_produk/edit_kategori_produk/$p[id_kategori_produk]") ?>" class="btn btn-success">Edit</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <?php echo $pagination; ?>
    </table>
  </div>
</section>