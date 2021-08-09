<?php echo $this->session->flashdata('item'); ?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsepanduan" aria-expanded="true" aria-controls="collapseOne">
          Panduan
        </a>
      </h4>
    </div>
    <div id="collapsepanduan" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <form action="<?php echo base_url('profil/update_panduan/1') ?>" method="POST">
          <textarea name='panduan' class="ckeditor" style='width: 800px; height: 350px;'><?php echo $data3[0]->panduan ?></textarea>
          <br>
          <button type="submit" class="btn btn-primary" style="float:right;">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseakun" aria-expanded="true" aria-controls="collapseOne">
          Akun Bank
        </a>
      </h4>
    </div>
    <div id="collapseakun" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Tambah Akun
        </button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="form-horizontal" method="POST" action="<?php echo base_url('profil/tambah_akun_bank') ?>">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Tambah Akun Bank</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Bank</label>
                    <div class="col-sm-10">
                      <input type="text" required="" class="form-control" name="jenis_bank" placeholder="Jenis Bank">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Atas Nama</label>
                    <div class="col-sm-10">
                      <input type="text" required="" class="form-control" name="atas_nama_bank" placeholder="Atas Nama">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">No Rekening</label>
                    <div class="col-sm-10">
                      <input type="text" required="" class="form-control" name="no_rekening" placeholder="No Rekening">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Jenis Bank</th>
              <th>Atas Nama</th>
              <th>No Rekening</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            foreach ($data_bank as $key) { ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $key['jenis_bank'] ?></td>
                <td><?php echo $key['atas_nama_bank'] ?></td>
                <td><?php echo $key['no_rekening'] ?></td>
                <td>
                  <div class="btn-group" role="group" aria-label="...">
                    <a href="<?php echo base_url('profil/delete_akun/' . $key['id_data']) ?>" type="button" class="btn btn-danger" onclick="javascript: return confirm('Anda yakin ingin menghapus data akun bank <?php echo $key['jenis_bank'] ?>?')">Hapus</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_jam_kirim<?php echo $i ?>">Edit</button>
                  </div>
                </td>
              </tr>
              <!-- Modal -->
              <div class="modal fade" id="edit_jam_kirim<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form method="POST" action="<?php echo base_url('profil/edit_bank') ?>">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Akun Bank</h4>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" required="" class="form-control" name="id_data" value="<?php echo $key['id_data'] ?>">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Jenis Bank</label>
                          <input type="text" required="" class="form-control" name="jenis_bank" value="<?php echo $key['jenis_bank'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Atas Nama</label>
                          <input type="text" class="form-control" required="" name="atas_nama_bank" value="<?php echo $key['atas_nama_bank'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">No Rekening</label>
                          <input type="text" class="form-control" required="" name="no_rekening" value="<?php echo $key['no_rekening'] ?>">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php $i++;
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Contact
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url('profil/update_contact') ?>">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">No Telp</label>
            <div class="col-sm-10">
              <input type="number" name="telp" class="form-control" required="" id="inputEmail3" placeholder="No Telp" value="<?php echo $data[0]['no_telp'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-10">
              <textarea name="alamat" class="form-control" required=""><?php echo $data[0]['alamat'] ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" required="" placeholder="Email" value="<?php echo $data[0]['Email'] ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Alamat Order
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url('profil/update_asal_order') ?>">
          <section class="panel">
            <div class="panel-body table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <!-- <th scope="col">fasd</th> -->
                    <th>Alamat Lengkap</th>
                    <!-- <th scope="col">Aksi</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($data as $r) : ?>
                    <tr>
                      <td>
                        <input style="border:0; width:30rem" type="text" name="lbl_prov" value="<?php echo $r['nama_provinsi'] ?>"></input>
                      </td>
                      <td>
                        <input style="border:0; width:30rem" type="text" name="lbl_kota" value="<?php echo $r['nama_kota'] ?>"></input>
                      </td>
                      <td><?php echo $r['alamat'] ?></td>
                      <!-- <td>
                        <a href="<?php echo base_url("lokasi/edit_lokasi/$r[id_konten]") ?>" class="btn btn-success">Edit</a>
                      </td> -->
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </section>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="ml-2">Provinsi</label>
              <select name="provinsi" id="prov_tujuan" class="form-control" required oninvalid="this.setCustomValidity('Provinsi belum dipilih')" oninput="setCustomValidity('')">
                <option value="" disabled selected hidden>pilih provinsi</option>
              </select>
            </div>
            <!-- <input type="text" name="provinsi_asal" class="form-control" required="" id="inputEmail3" placeholder="Provinsi Asal" value="<?php echo $data[0]['provinsi'] ?>">            </div> -->
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="ml-2">Kota/Kab</label>
              <select name="kota_order" id="kota_tujuan" class="form-control" disabled required oninvalid="this.setCustomValidity('Kota belum dipilih')" oninput="setCustomValidity('')">
                <option value="<?php echo $data[0]['kota'] ?>" disabled selected hidden>pilih kota/kab</option>
              </select>
            </div>
          </div>
          <!-- <input type="text" name="kota_asal" class="form-control" required="" id="inputEmail3" placeholder="Kota Asal" value="<?php echo $data[0]['kota'] ?>"> -->

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function getLokasi() {
    var $op = $("#prov_asal"),
      $op1 = $("#prov_tujuan");

    $.getJSON("provinsi", function(data) {
      $.each(data, function(i, field) {

        $op.append('<option value="' + field.province_id + '">' + field.province_id + '</option>');
        $op1.append('<option value="' + field.province_id + '" nama_provinsi="' + field.province + '">' + field.province + '</option>');

      });

    });

  }
  getLokasi();


  $("#prov_tujuan").on("change", function(e) {
    e.preventDefault();
    var provinsi = $('option:selected', this).attr('nama_provinsi');
    var option = $('option:selected', this).val();
    $('#kota_tujuan option:gt(0)').remove();
    $('#kurir').val('');

    $("input[name=lbl_prov]").val(provinsi);

    if (option === '') {
      alert('null');
      $("#kota_tujuan").prop("disabled", true);
      $("#kurir").prop("disabled", true);
    } else {
      $("#kota_tujuan").prop("disabled", false);
      getKota(option);
    }
  });

  $("#kota_tujuan").on("change", function(e) {
    e.preventDefault();
    var kota = $('option:selected', this).attr('nama_kota');
    $('#kurir').val('');

    $("input[name=lbl_kota]").val(kota);
    // var prov = $('option:selected', this).val();

  });

  function getKota(idpro) {
    var $op = $("#kota_tujuan");

    $.getJSON("kota/" + idpro, function(data) {
      $.each(data, function(i, field) {

        $op.append('<option value="' + field.city_id + '"nama_kota="' + field.type + ' ' + field.city_name + '">' + field.type + ' ' + field.city_name + '</option>');

      });

    });

  }
</script>