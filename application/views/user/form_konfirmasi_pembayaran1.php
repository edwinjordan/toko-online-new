<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?= base_url('user/Home') ?>">Home</a></li>
        <li class="active">Form Konfirmasi Pembayaran</li>
    </ol>
    <div class="row mb-invoice-3">
        <div class="col-md-12">
            <h3 style="margin-bottom:10px">ID Order : <?= $data_order[0]['id_order'] ?></h3>
            <h4 style="margin-bottom:10px">Informasi Pemesanan</h4>
            <table class="table ">
                <tr>
                    <th>Nama Penerima</td>
                    <td>: <?= $data_order[0]['nama_order'] ?></td>
                </tr>
                <tr>
                    <th>No Hp</td>
                    <td>: <?= $data_order[0]['tlp_order'] ?></td>
                </tr>
                <tr>
                    <th>Email</td>
                    <td>: <?= $data_order[0]['email_order'] ?></td>
                </tr>
                <tr>
                    <th>Alamat Penerima</td>
                    <td>: <?= $data_order[0]['alamat_order'] ?>, <?= $data_order[0]['kota'] ?>, <?= $data_order[0]['provinsi'] ?></td>
                </tr>
                <tr>
                    <th>Ekspedisi</td>
                    <td>: <?= strtoupper($data_order[0]['kurir']) ?> / <?= $data_order[0]['paket_kirim'] ?></td>
                </tr>
                <tr>
                    <th>Estimasi Pengiriman</td>
                    <td>: <?= $data_order[0]['lama_kirim'] ?> hari</td>
                </tr>
                <tr>
                    <th>Status Pembayaran</td>
                    <td>: <?= $status_order ?></td>
                </tr>
                <tr>
                    <td colspan=2>
                        <?php if ($data_order[0]['status_order'] == 4) : ?>
                            <a id="konfirmasi_barang" type="button" class="btn btn-block btn-success">Barang Sudah Sampai</a>
                        <?php elseif ($data_order[0]['status_order'] == 1) : ?>
                            <h5><span style="color: red;">*</span> Produk akan dikirim setelah Anda menyelesaikan pembayaran</h5>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row mb-invoice-3">
        <div class="col-md-12">
            <h3 style="margin-bottom:10px">Detail Barang</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Foto Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <?php if ($data_order[0]['status_order'] == 5) : ?>
                                <th scope="col">Opsi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_penjual as $penjual) : foreach ($penjual as $produk) : ?>
                                <tr>
                                    <td><?= ucwords($produk['nama_produk']) ?></td>
                                    <td><img src="<?php echo base_url() ?>assets/img/produk_penjual/<?= $produk['foto_produk1'] ?>" alt="img" width="180" height="180"></td>
                                    <td><?= number_format($produk['jumlah_produk'], 0, ',', '.') ?></td>
                                    <td>Rp. <?= number_format($produk['harga'], 0, ',', '.') ?></td>
                                    <?php if ($data_order[0]['status_order'] == 5) : ?>
                                        <td>
                                            <?php if ($produk['status_detail_komplain'] == 1) : ?>
                                                <a href="<?= base_url("user/order/komplain_barang/" . $produk['id_detail_order']) ?>" class="btn btn-success">Detail Komplain Barang</a>
                                            <?php else : ?>
                                                <a href="<?= base_url('user/order/komplain_barang/' . $produk['id_detail_order']) ?>" class="btn btn-success">Komplain</a>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                        <?php endforeach;
                        endforeach; ?>
                        <tr>
                            <th colspan=3 scope="col">Ongkir</th>
                            <!-- <td></td> -->
                            <td colspan=2>Rp. <?= number_format($data_order[0]['ongkir'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <th colspan=3>Total</th>
                            <!-- <td><?= number_format($data_order[0]['jumlah_order'], 0, ',', '.') ?></td> -->
                            <td colspan=2><strong>Rp. <?= number_format($data_order[0]['total_order'], 0, ',', '.') ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mb-invoice-3">
        <div class="col-md-12">
            <?php if (isset($transaksi[0]['id_order']) == null) : ?>
                <div class="mt-5 text-center">
                    <form id="payment-form" method="post" action="<?= site_url() ?>/midtrans/snap/finish">
                        <input type="hidden" name="result_type" id="result-type" value="">
                        <input type="hidden" name="result_data" id="result-data" value="">
                    </form>
                    <button id="pay_button" class="btn btn-primary">Bayar</button>
                </div>
            <?php else : ?>
                <h3 class="mt-3" style="margin-bottom:10px">Data Transaksi</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID Order</th>
                                <th scope="col">Total Bayar</th>
                                <th scope="col">Jenis Pembayaran</th>
                                <!-- <th scope="col">Bank</th> -->
                                <!-- // <th scope="col">VA Number</th> -->
                                <th scope="col">Waktu Transaksi</th>
                                <th scope="col">Status</th>
                                <?php if ($transaksi[0]['pdf_url'] != null) : ?>
                                    <th scope="col">Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $transaksi[0]['id_order'] ?></td>
                                <td>Rp<?= number_format($transaksi[0]['gross_amount'], 0, ',', '.') ?></td>
                                <td>
                                    <?php if ($transaksi[0]['payment_type'] == "bank_transfer") {
                                        echo "Bank Transfer";
                                    } else {
                                        echo $transaksi[0]['payment_type'];
                                    }
                                    ?>
                                </td>
                                <!-- // <td><?= strtoupper($transaksi[0]['bank']) ?></td> -->
                                <!-- // <td><?= $transaksi[0]['va_number'] ?></td> -->
                                <td><?= $transaksi[0]['transaction_time'] ?></td>
                                <td>
                                    <?php if ($transaksi[0]['status_code'] == 200) : ?>
                                        <label class="badge bg-success">Berhasil</label>
                                    <?php else : ?>
                                        <label class="basge bg-warning">Belum Bayar</label>
                                    <?php endif; ?>
                                </td>
                                <?php if ($transaksi[0]['pdf_url'] != null) : ?>
                                    <td><a href="<?= $transaksi[0]['pdf_url'] ?>" role="button" target="_blank" class="btn btn-primary">Download</a></td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function readURL(id, input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#' + id)
                    .attr('src', e.target.result)
                    .width(200)
                    .height(250);
            };

            reader.readAsDataURL(input.files[0]);
            $("#" + id).show();
        }
    }
</script>
<script>
    $('#konfirmasi_barang').click(function(event) {
        $.ajax({
            url: '<?= base_url() . 'user/order/konfirmasi_barang/' . $data_order[0]['id_order'] ?>',
            type: 'POST',
            success: function(result) {
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error get data from ajax');
            }
        })
    })
</script>

<script type="text/javascript">
    $('#pay_button').click(function(event) {
        event.preventDefault();
        // $(this).attr("disabled", "disabled");

        var id = '<?= $data_order[0]['id_order']; ?>'
        console.log('id', id);
        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>midtrans/Snap/token',
            data: {
                id: id
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>