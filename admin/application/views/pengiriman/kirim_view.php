<?php echo $this->session->flashdata('item'); ?>

<div class="panel-group" id="accordionJamKirim" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordionJamKirim" href="#collapseJamKirim" aria-expanded="true" aria-controls="collapseOne">
                    Jam Pengiriman
                </a>
            </h4>
        </div>
        <div id="collapseJamKirim" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalJamKirim">
                    Tambah Jam Pengiriman
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modalJamKirim" tabindex="-1" role="dialog" aria-labelledby="myModalJamKirim">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url('pengiriman/tambah_jam_kirim') ?>">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalJamKirim">Tambah Jam Pengiriman</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputJamKirim" class="col-sm-2 control-label">Jam Pengiriman</label>
                                        <div class="col-sm-10">
                                            <input type="time" required="" class="form-control" name="jam_kirim">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputKetJam" class="col-sm-2 control-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="kec_kirim" placeholder="keterangan">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($jam_kirim as $key) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <?php
                                    $jam = strtotime($key['jam_kirim']);
                                    echo date('h:i A', $jam)
                                    ?>
                                </td>
                                <td><?php echo $key['keterangan'] ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a href="<?php echo base_url('pengiriman/delete_jam_kirim/' . $key['id_jam']) ?>" type="button" class="btn btn-danger" onclick="javascript: return confirm('Anda yakin ingin menghapus data Jam Pengiriman <?php echo date('h:i A', $jam) ?>?')">Hapus</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_jam<?php echo $i ?>">Edit</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="edit_jam<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="<?php echo base_url('pengiriman/edit_jam_kirim') ?>">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Edit Jam Pengiriman</h4>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" required="" class="form-control" name="id_jam" value="<?php echo $key['id_jam'] ?>">
                                                <div class="form-group">
                                                    <label for="editJam">Jam</label>
                                                    <input type="time" required="" class="form-control" name="jam_kirim" value="<?php echo $key['jam_kirim'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="editKetJam">Keterangan</label>
                                                    <input type="text" class="form-control" name="keterangan" value="<?php echo $key['keterangan'] ?>">
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

<div class="panel-group" id="accordionDaerahKirim" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordionDaerahKirim" href="#collapseDaerahKirim" aria-expanded="true" aria-controls="collapseOne">
                    Daerah Pengiriman
                </a>
            </h4>
        </div>
        <div id="collapseDaerahKirim" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDaerahKirim">
                    Tambah Daerah Pengiriman
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modalDaerahKirim" tabindex="-1" role="dialog" aria-labelledby="myModalDaerahKirim">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url('pengiriman/tambah_daerah_kirim') ?>">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalDaerahKirim">Tambah Daerah Pengiriman</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kota/Kab</label>
                                        <div class="col-sm-9">
                                            <select id="kota" name="id_kota" class="form-control" required>
                                                <option value="" disabled selected hidden>pilih kota/kab</option>
                                                <?php foreach ($this->dropdown->kota() as $row) : ?>
                                                    <option value="<?php echo $row['id_kota']; ?>">
                                                        <?php echo $row['nama_kota']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="nama_kota" name="kota_kirim" class="form-control" style="visibility: hidden;" required>
                                                <?php foreach ($this->dropdown->kota() as $row) : ?>
                                                    <option id="nama_kota" class="<?php echo $row['id_kota']; ?>" value="<?php echo $row['nama_kota']; ?>">
                                                        <?php echo $row['nama_kota']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kecamatan</label>
                                        <div class="col-sm-9">
                                            <select id="kecamatan" name="id_kec" class="form-control" required>
                                                <option value="" disabled selected hidden>pilih kecamatan</option>
                                                <?php foreach ($this->dropdown->kecamatan() as $row) : ?>
                                                    <option id="kecamatan" class="<?php echo $row['id_kota']; ?>" value="<?php echo $row['id_kecamatan']; ?>">
                                                        <?php echo $row['nama_kecamatan']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                                <input type="hidden" value="<?php echo $row['nama_kecamatan'] ?>" name="kec_kirim">
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="nama_kec" name="kec_kirim" class="form-control" style="visibility: hidden;" required>
                                                <?php foreach ($this->dropdown->kecamatan() as $row) : ?>
                                                    <option id="nama_kec" class="<?php echo $row['id_kecamatan']; ?>" value="<?php echo $row['nama_kecamatan']; ?>">
                                                        <?php echo $row['nama_kecamatan']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Kelurahan</label>
                                        <div class="col-sm-9">
                                            <select id="kelurahan" name="id_kel" class="form-control col-sm-3" required>
                                                <option value="" disabled selected hidden>pilih kelurahan</option>
                                                <?php foreach ($this->dropdown->kelurahan() as $row) : ?>
                                                    <option id="kelurahan" class="<?php echo $row['id_kecamatan']; ?>" value="<?php echo $row['id_kelurahan']; ?>">
                                                        <?php echo $row['nama_kelurahan']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            <select id="nama_kel" name="kel_kirim" class="form-control" style="visibility: hidden;" required>
                                                <?php foreach ($this->dropdown->kelurahan() as $row) : ?>
                                                    <option id="nama_kel" class="<?php echo $row['id_kelurahan']; ?>" value="<?php echo $row['nama_kelurahan']; ?>">
                                                        <?php echo $row['nama_kelurahan']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputKurir" class="col-sm-2 control-label">Kurir</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kurir" placeholder="kurir" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputOngkir" class="col-sm-2 control-label">Ongkir</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="ongkir" placeholder="ongkir" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <script src="<?php echo base_url('assets/jquery/jquery-1.12.0.js'); ?>"></script>
                <script src="<?php echo base_url('assets/jquery/jquery.chained.js'); ?>"></script>
                <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.js'); ?>"></script>

                <script type="text/javascript">
                    $("#kecamatan").chained("#kota");
                    $("#nama_kota").chained("#kota");
                    $("#nama_kec").chained("#kecamatan");
                    $("#kelurahan").chained("#kecamatan");
                    $("#nama_kel").chained("#kelurahan");
                </script>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalTambahKota">
                    Tambah Kota
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modalTambahKota" tabindex="-1" role="dialog" aria-labelledby="myModalTambahKota">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url('pengiriman/tambah_kota_kirim') ?>">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalTambahKota">Tambah Kota</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputKota" class="col-sm-2 control-label">Kota</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_kota" placeholder="nama kota" required>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="inputProv" class="col-sm-2 control-label">Provinsi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="provinsi" placeholder="provinsi">
                                        </div>
                                    </div> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalTambahKec">
                    Tambah Kecamatan
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modalTambahKec" tabindex="-1" role="dialog" aria-labelledby="myModalTambahKec">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url('pengiriman/tambah_kec_kirim') ?>">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalTambahKec">Tambah Kecamatan</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputKota" class="col-sm-2 control-label">Kota</label>
                                        <div class="col-sm-10">
                                            <select name="id_kota_fk" id="id_kota_fk" class="form-control" required>
                                                <option value="" disabled selected hidden>pilih kota</option>
                                                <?php foreach ($kota as $kot) : ?>
                                                    <option value="<?= $kot['id_kota'] ?>"><?= $kot['nama_kota'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputKec" class="col-sm-2 control-label">Kecamatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_kecamatan" placeholder="nama kecamatan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalTambahKel">
                    Tambah Kelurahan
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modalTambahKel" tabindex="-1" role="dialog" aria-labelledby="myModalTambahKel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url('pengiriman/tambah_kel_kirim') ?>">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalTambahKel">Tambah Kelurahan</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputKota2" class="col-sm-2 control-label">Kota/Kab</label>
                                        <div class="col-sm-10">
                                            <select name="" id="kota_kirim" class="form-control" required>
                                                <option value="" disabled selected hidden>pilih kota/kab</option>
                                                <?php foreach ($kota as $kot) : ?>
                                                    <option value="<?= $kot['id_kota'] ?>"><?= $kot['nama_kota'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputKec2" class="col-sm-2 control-label">Kecamatan</label>
                                        <div class="col-sm-10">
                                            <select name="kec_kirim" id="id_kecamatan_fk" class="form-control" required>
                                                <option value="" disabled selected hidden>pilih kecamatan</option>
                                                <?php foreach ($kecamatan as $kec) : ?>
                                                    <option value="<?= $kec['id_kecamatan'] ?>"><?= $kec['nama_kecamatan'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputKel2" class="col-sm-2 control-label">Kelurahan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_kelurahan" placeholder="nama kelurahan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kota/Kab</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Kelurahan</th>
                            <th scope="col">Kurir</th>
                            <th scope="col">Ongkir</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($daerah_kirim as $key) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $key['kota_kirim'] ?></td>
                                <td><?php echo $key['kec_kirim'] ?></td>
                                <td><?php echo $key['kel_kirim'] ?></td>
                                <td><?php echo $key['kurir'] ?></td>
                                <td>Rp. <?php echo number_format($key['ongkir'], 0, ',', '.')  ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                        <a href="<?php echo base_url('pengiriman/delete_daerah_kirim/' . $key['id_daerah_kirim']) ?>" type="button" class="btn btn-danger" onclick="javascript: return confirm('Anda yakin ingin menghapus Data Daerah Pengiriman No. <?php echo $i ?>?')">Hapus</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_daerah_kirim<?php echo $i ?>">Edit</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="edit_daerah_kirim<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="<?php echo base_url('pengiriman/edit_daerah_kirim') ?>">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Edit Daerah Pengiriman</h4>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" required="" class="form-control" name="id_daerah_kirim" value="<?php echo $key['id_daerah_kirim'] ?>">
                                                <div class="form-group">
                                                    <label for="editKotaKirim">Kota/Kab</label>
                                                    <select class="form-control" name="kota_kirim" required>
                                                        <option value="<?php echo $key['kota_kirim'] ?>"><?php echo $key['kota_kirim'] ?></option>
                                                        <?php foreach ($kota as $kot) : ?>
                                                            <option value="<?= $kot['nama_kota'] ?>"><?= $kot['nama_kota'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editKecKirim">Kecamatan</label>
                                                    <select class="form-control" name="kec_kirim" required>
                                                        <option value="<?php echo $key['kec_kirim'] ?>"><?php echo $key['kec_kirim'] ?></option>
                                                        <?php foreach ($kecamatan as $kec) : ?>
                                                            <option value="<?= $kec['nama_kecamatan'] ?>"><?= $kec['nama_kecamatan'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editKelKirim">Kelurahan</label>
                                                    <select class="form-control" name="kel_kirim" required>
                                                        <option value="<?php echo $key['kel_kirim'] ?>"><?php echo $key['kel_kirim'] ?></option>
                                                        <?php foreach ($kelurahan as $kel) : ?>
                                                            <option value="<?= $kel['nama_kelurahan'] ?>"><?= $kel['nama_kelurahan'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editKurir">Kurir</label>
                                                    <input type="text" class="form-control" name="kurir" value="<?php echo $key['kurir'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="editOngkir">Ongkir</label>
                                                    <input type="text" class="form-control" name="ongkir" value="<?php echo $key['ongkir'] ?>">
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
                        <?php
                            $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $("#kota_kirim").change(function() {

        // variabel dari nilai combo box kendaraan
        var id_kota = $("#kota_kirim").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/daerah_kirim/get_kec",
            method: "POST",
            data: {
                id_kota: id_kota
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_kecamatan + '>' + data[i].nama_kecamatan + '</option>';
                }
                $('#kec_kirim').html(html);

            }
        });
    });

    $("#kec_kirim").change(function() {

        // variabel dari nilai combo box kendaraan
        var id_merk = $("#kec_kirim").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url: "<?php echo base_url(); ?>/daerah_kirim/get_kel",
            method: "POST",
            data: {
                id_kecamatan: id_kecamatan
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id_kelurahan + '>' + data[i].nama_kelurahan + '</option>';
                }
                $('#kel_kirim').html(html);

            }
        });
    });
</script>