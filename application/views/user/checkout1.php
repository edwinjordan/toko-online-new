<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" />



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->



<div class="single-sec">

    <div class="container">

        <ol class="breadcrumb">

            <li><a href="<?= base_url('user/Home') ?>">Home</a></li>

            <li class="active">Checkout</li>

        </ol>

        <!-- start content -->

        <form action="<?= base_url('user/order/simpan') ?>" method="post">

            <div class="row">

                <div class="col">

                    <div class="mt-2">

                        <div class="form-row">

                            <div class="form-group col-md-12">

                                <label class="ml-2">Nama Lengkap</label>

                                <input name="nama_lengkap" type="text" class="form-control" placeholder="nama lengkap" required oninvalid="this.setCustomValidity('Nama Lengkap belum diisi')" oninput="setCustomValidity('')">

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">

                                <label class="ml-2">No Hp</label>

                                <input name="no_hp" type="number" class="form-control" placeholder="no hp" required oninvalid="this.setCustomValidity('Nomor HP belum diisi')" oninput="setCustomValidity('')">

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">

                                <label class="ml-2">Email</label>

                                <input name="email" type="email" class="form-control" placeholder="email" required oninvalid="this.setCustomValidity('Email belum sesuai')" oninput="setCustomValidity('')">

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">

                                <label class="ml-2">Provinsi</label>

                                <select name="provinsi" id="prov_tujuan" class="form-control" required oninvalid="this.setCustomValidity('Provinsi belum dipilih')" oninput="setCustomValidity('')">

                                    <option value="" disabled selected hidden>pilih provinsi</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">

                                <label class="ml-2">Kota/Kab</label>

                                <select name="kota_order" id="kota_tujuan" class="form-control" disabled required oninvalid="this.setCustomValidity('Kota belum dipilih')" oninput="setCustomValidity('')">

                                    <option value="" disabled selected hidden>pilih kota/kab</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">

                                <label class="ml-2">Alamat Lengkap</label>

                                <textarea name="alamat_lengkap" class="form-control" placeholder="isi alamat dengan lengkap" required oninvalid="this.setCustomValidity('Alamat Lengkap belum diisi')" oninput="setCustomValidity('')"></textarea>

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">

                                <label class="ml-2">Ekspedisi</label>

                                <select name="kurir" id="kurir" class="form-control" disabled required oninvalid="this.setCustomValidity('ekspedisi belum dipilih')" oninput="setCustomValidity('')">

                                    <option value="" disabled selected hidden>pilih ekspedisi</option>

                                    <option value="jne">JNE</option>

                                    <option value="tiki">TIKI</option>

                                    <option value="pos">POS Indonesia</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-row mb-5">

                            <div class="form-group col-md-12">

                                <label class="ml-2">Paket Pengiriman</label>

                                <select name="paket_kirim" id="paket_kirim" class="form-control" disabled required oninvalid="this.setCustomValidity('layanan pengiriman belum dipilih')" oninput="setCustomValidity('')">

                                    <option value="" disabled selected hidden>pilih paket pengiriman</option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <div class="mt-0">

                                <p class="text-center"><strong>INFORMASI PRODUK</strong></p>

                                <table class="table table-bordered">

                                    <thead>

                                        <tr>

                                            <th scope="col" class="text-center">Produk</th>

                                            <th scope="col" class="text-center">Items</th>

                                            <th scope="col" class="text-center">Berat Bersih/Item</th>

                                            <th scope="col" class="text-center">Total</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php foreach ($cart as $keranjang) : ?>

                                            <tr>

                                                <td class="text-center"><?= ucwords(substr($keranjang['nama_produk'], 0, 15)) ?>..</td>

                                                <td class="text-center"><?= $keranjang['jumlah_produk'] ?> item</td>

                                                <td class="text-center"><?= $keranjang['berat_bersih'] ?> gram</td>

                                                <!-- <td class="text-center"><?= $jumlah_berat ?></td> -->

                                                <td class="text-center">Rp. <?= number_format($keranjang['subtotal_belanja'], 0, ',', '.') ?></td>

                                                <!-- <input type="hidden" value="<?= $jumlah_berat ?>"> -->

                                            </tr>



                                        <?php endforeach; ?>

                                        <tr>

                                            <th scope="col" class="text-center">Total Belanja</th>

                                            <td class="text-center"><b><?= $total[0]['total_jumlah'] ?> item</b></td>

                                            <!-- <td class="text-center"><b><?= $jumlah[0]['total_berat'] ?> gram</b></td> -->

                                            <td class="text-center" colspan="2"><b>Rp. <?= number_format($total[0]['total_harga'], 0, ',', '.') ?></b></td>

                                        </tr>

                                        <tr>

                                            <td colspan=4>

                                                <input type="hidden" id="nama_provinsi" name="nama_provinsi">

                                                <input type="hidden" id="nama_kota" name="nama_kota">

                                                <input type="hidden" id="ongkir" name="ongkir">

                                                <input type="hidden" id="lama_kirim" name="lama_kirim">

                                                <input name="total_harga" type="hidden" value="<?= $total[0]['total_harga'] ?>">

                                                <input name="total_jumlah" type="hidden" value="<?= $total[0]['total_jumlah'] ?>">

                                                <button id="btn_beli" type="submit" class="btn btn-success btn-block">Beli</button>

                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                                <!-- <div id="tampil"></div> -->

                            </div>

                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>

            </div>

        </form>

    </div>

    <div class="clearfix"></div>

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

        var option = $('option:selected', this).val();

        var nama_prov = $('option:selected', this).attr('nama_provinsi');

        $('#kota_tujuan option:gt(0)').remove();

        $('#kurir').val('');



        if (option === '') {

            alert('null');

            $("#kota_tujuan").prop("disabled", true);

            $("#kurir").prop("disabled", true);

        } else {

            $("#kota_tujuan").prop("disabled", false);

            getKota(option);

            document.getElementById("nama_provinsi").value = nama_prov;

        }

    });



    function getKota(idpro) {

        var $op = $("#kota_tujuan");



        $.getJSON("kota/" + idpro, function(data) {

            $.each(data, function(i, field) {





                $op.append('<option value="' + field.city_id + '" nama_kota="' + field.type + ' ' + field.city_name + '">' + field.type + ' ' + field.city_name + '</option>');



            });



        });



    }



    $("#kota_tujuan").on("change", function(e) {

        e.preventDefault();

        var option = $('option:selected', this).val();

        var nama_kota = $('option:selected', this).attr('nama_kota');

        $('#kurir').val('');



        if (option === '') {

            alert('null');

            $("#kurir").prop("disabled", true);

        } else {

            $("#kurir").prop("disabled", false);

            document.getElementById("nama_kota").value = nama_kota;

        }

    });



    <?php foreach ($konten as $kon) : ?>



        <?php $kota_asal = $kon['id_kota'] ?>



        $("#kurir").on("change", function(e) {

            e.preventDefault();

            var option = $('option:selected', this).val();

            $('#paket_kirim option:gt(0)').remove();

            $('#paket_kirim').val('');



            var origin = '<?php echo $kota_asal ?>';

            var des = $("#kota_tujuan").val();

            var qty = '<?= $jumlah[0]['total_berat'] ?>';



            if (qty === '0' || qty === '') {

                alert('berat kosong');

            } else if (option === '') {

                alert('null');

                $("#paket_kirim").prop("disabled", true);

            } else {

                getOrigin(origin, des, qty, option);

                $("#paket_kirim").prop("disabled", false);

                // document.getElementById("nama_ekspedisi").value = option;

            }

        });



    <?php endforeach ?>





    function getOrigin(origin, des, qty, cour) {

        var $op = $("#paket_kirim");

        var $opt = $("#tampil");

        var i, n, x, y = "";



        $.getJSON("tarif/" + origin + "/" + des + "/" + qty + "/" + cour, function(data) {

            $.each(data, function(i, field) {



                for (i in field.costs) {



                    for (n in field.costs[i].cost) {



                        x += '<option value="' + field.costs[i].service + ' - ' + field.costs[i].description + '" ongkir="' + field.costs[i].cost[n].value + '" lama_kirim="' + field.costs[i].cost[n].etd + '">' + field.costs[i].service + ' - ' + field.costs[i].description + ' - Rp.' + field.costs[i].cost[n].value + ' - ' + field.costs[i].cost[n].etd + ' Hari' + '</option > ';



                        y += "<p class='mb-0'><b>" + field.costs[i].service + "</b> : " + field.costs[i].description + "</p>";



                        y += "Biaya Ongkir : Rp. " + field.costs[i].cost[n].value;

                        y += "<br> Waktu Pengiriman : " + field.costs[i].cost[n].etd + " hari"

                    }



                }



                $op.append(x);



                $opt.html(y);



            });

        });

    }



    // function getOrigin(origin, des, qty, cour) {

    //     var $opt = $("#tampil");

    //     var z = y += "<p class='mb-0'><b>" + field.costs[i].service + "</b> : " + field.costs[i].description + "</p>";

    //     $opt.html(y);

    // }





    $("#paket_kirim").on("change", function(e) {

        e.preventDefault();

        var option = $('option:selected', this).val();

        var ongkir = $('option:selected', this).attr('ongkir');

        var lama_kirim = $('option:selected', this).attr('lama_kirim');



        if (option === '') {

            alert('null');

        } else {

            document.getElementById("ongkir").value = ongkir;

            document.getElementById("lama_kirim").value = lama_kirim;

        }

    });

</script>



<script src="<?php echo base_url('assets/jquery/jquery-1.12.0.js'); ?>"></script>

<script src="<?php echo base_url('assets/jquery/jquery.chained.js'); ?>"></script>

<script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.js'); ?>"></script>