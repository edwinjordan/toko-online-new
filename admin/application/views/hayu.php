<div class="page-header">
  <h2>Chainned Dropdown</h2>
</div>
<div class="col-lg-12">
  <div class="panel panel-default">

    <div class="panel-heading">
      Thankyou harviacode.com
    </div>

    <div class="panel-body">
      <form class="form-group" method="post" role="form" action="#">
        <div class="col-sm-12">

          <div class="form-group">
            <!-- provinsi -->
            <label>Kota/Kab</label>
            <select id="kota" name="kota" class="form-control" required>
              <option value="" disabled selected hidden>pilih kota/kab</option>
              <?php foreach ($this->dropdown->kota() as $row) : ?>
                <option value="<?php echo $row['id_kota']; ?>">
                  <?php echo $row['nama_kota']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <!-- kota -->
            <label>Kecamatan</label>
            <select id="kecamatan" name="kecamatan" class="form-control" required>
              <option value="" disabled selected hidden>pilih kecamatan</option>
              <?php foreach ($this->dropdown->kecamatan() as $row) : ?>
                <option id="kecamatan" class="<?php echo $row['id_kota']; ?>" value="<?php echo $row['id_kecamatan']; ?>">
                  <?php echo $row['nama_kecamatan']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <!-- kecamatan -->
            <label>Kelurahan</label>
            <select id="kelurahan" name="kelurahan" class="form-control" required>
              <option value="" disabled selected hidden>pilih kelurahan</option>
              <?php foreach ($this->dropdown->kelurahan() as $row) : ?>
                <option id="kelurahan" class="<?php echo $row['id_kecamatan']; ?>" value="<?php echo $row['id_kelurahan']; ?>">
                  <?php echo $row['nama_kelurahan']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>