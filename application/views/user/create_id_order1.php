<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>

<!-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> -->


<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?= base_url('user/Home') ?>">Home</a></li>
        <li class="active">Detail Pembelian</li>
    </ol>
    <div id="content" class="mb-invoice-3">
        <div class="mb-invoice-2">
            <div class="row-invoice-head">
                <div class="col-invoice-2">
                    <h4 style="margin-top: 8px;">ID ORDER</h4><br>
                    <h2 style="margin-left: 15px;" id="copy"><?= $id_order ?></h2>
                    <button class="btn btn-primary" style="margin-left: 30px" onclick="copyToClipboard('#copy')">Copy ID</button>
                    <button onClick="download_pdf()" class="btn btn-primary" style="margin-left: 30px">Download</button>

                </div>
                <div class="col-invoice-2">
                </div>
            </div>
            <div class="row-invoice-body">
                <div class="col-invoice-1 mb-invoice-1">
                    <h4>Nama Pembeli</h4>
                </div>
                <div class="col-invoice-2 mb-invoice-1">
                    <p>
                        : <?= $order[0]['nama_order'] ?>
                    </p>
                </div>
            </div>
            <div class="row-invoice-body">
                <div class="col-invoice-1 mb-invoice-1">
                    <h4>Alamat</h4>
                </div>
                <div class="col-invoice-2 mb-invoice-1">
                    <p>
                        : <?= $order[0]['alamat_order'] ?>, <?= $order[0]['kota'] ?>, <?= $order[0]['provinsi'] ?>
                    </p>
                </div>
            </div>
            <div class="row-invoice-body">
                <div class="col-invoice-1 mb-invoice-1">
                    <h4>Email</h4>
                </div>
                <div class="col-invoice-2 mb-invoice-1">
                    <p>
                        : <?= $order[0]['email_order'] ?>
                    </p>
                </div>
            </div>
            <div class="row-invoice-body">
                <div class="col-invoice-1 mb-invoice-1">
                    <h4>No HP</h4>
                </div>
                <div class="col-invoice-2 mb-invoice-1">
                    <p>
                        : <?= $order[0]['tlp_order'] ?>
                    </p>
                </div>
            </div>
            <div class="row-invoice-body">
                <div class="col-invoice-1 mb-invoice-1">
                    <h4>Ekspedisi</h4>
                </div>
                <div class="col-invoice-2 mb-invoice-1">
                    <p>
                        : <?= strtoupper($order[0]['kurir']) ?> (<?= $order[0]['paket_kirim'] ?>)
                    </p>
                </div>
            </div>
            <div class="row-invoice-body">
                <div class="col-invoice-1 mb-invoice-1">
                    <h4>Lama Pengiriman</h4>
                </div>
                <div class="col-invoice-2 mb-invoice-1">
                    <p>
                        : <?= $order[0]['lama_kirim'] ?> hari
                    </p>
                </div>
            </div>
            <div class="row-invoice-body">
                <div class="col-invoice-3">
                    <h5><br><span style="color: red;">*</span> Produk akan dikirim setelah Anda menyelesaikan transaksi pembayaran</h5>
                </div>
            </div>
        </div>
        <h3 style="margin-bottom:18px">Detail Pemesanan</h3>
        <table class="table table-bordered" style="margin-bottom:50px">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Produk</th>
                    <th scope="col" class="text-center">Jumlah Produk</th>
                    <th scope="col" class="text-center">Berat Bersih / Items</th>
                    <th scope="col" class="text-center">Harga Produk</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detail_order as $detail) : ?>
                    <tr>
                        <td class="text-center"><?= $detail['nama_produk'] ?></td>
                        <td class="text-center"><?= $detail['jumlah_produk'] ?> items</td>
                        <td class="text-center"><?= $detail['berat_bersih'] ?> gram</td>
                        <td class="text-center">Rp. <?= number_format($detail['harga'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <th class="text-center">Ongkir</th>
                    <th></th>
                    <th></th>
                    <td class="text-center">Rp. <?= number_format($order[0]['ongkir'], 0, ',', '.')  ?></td>
                </tr>
                <tr>
                    <th class="text-center">Total Belanja</th>
                    <th></th>
                    <th></th>
                    <td class="text-center"><b>Rp. <?= number_format($order[0]['total_order'], 0, ',', '.') ?></b></td>
                </tr>
            </tbody>
        </table>
        <!-- <h3 style="margin-bottom:18px">Lakukan Pembayaran Ke Rekening Berikut</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Bank</th>
                    <th scope="col" class="text-center">No Rekening</th>
                    <th scope="col" class="text-center">Nama</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bank as $bnk) : ?>
                    <tr>
                        <td class="text-center"><?= $bnk['jenis_bank'] ?></td>
                        <td class="text-center"><?= $bnk['no_rekening'] ?></td>
                        <td class="text-center"><?= $bnk['atas_nama_bank'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table> -->
        <h5><span style="color:red">*</span>Lanjutkan ke konfirmasi Pembayaran dengan memasukkan kode ID Order</h5>
        <h5 style="margin-top:14px; margin-bottom: 30px"><span style="color:red;">*</span>Apabila pembayaran tidak dilakukan dalam 90 menit maka pesanan anda akan dihapus</h5>
        <div class="text-center mb-5">
            <form action="<?= base_url() ?>user/order/search_order/" method="POST">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <div class="form-group">
                            <input type="hidden" name="id_order" value="<?= $id_order ?>" class="form-control" required>
                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/pdfjs/dist/jspdf.debug.js') ?>"></script>
<script src="<?php echo base_url('assets/pdfjs/libs/html2pdf.js') ?>"></script>
<script>
    function download_pdf() {
        // var doc = new jsPDF();
        // var specialElementHandlers = {
        //     '#editor': function (element, renderer) {
        //         return true;
        //     }
        // };

        // doc.fromHTML($('#content').html(), 15, 15);
        // doc.save('Blonjobu-Order-<?php echo $id_order ?>.pdf');
        var pdf = new jsPDF('p', 'pt', 'letter');
        pdf.addHTML($('#ElementYouWantToConvertToPdf')[0], function() {
            pdf.save('Blonjobu-Order-<?php echo $id_order ?>.pdf');
        });
    }

    var pdf = new jsPDF('p', 'pt', 'letter');

    pageHeight = pdf.internal.pageSize.height;

    // Before adding new content
    y = 500 // Height position of new content
    if (y >= pageHeight) {
        pdf.addPage();
        y = 0 // Restart height position
    }

    var canvas = pdf.canvas;

    // var width = 400;
    html2pdf(document.getElementById("print"), pdf, function(pdf) {

        pdf.save('Test.pdf');

        //var div = pdfument.createElement('pre');
        //div.innerText=pdf.output();
        //pdfument.body.appendChild(div);
    });


    //window.location = "http://www.facebook.com";
</script>

<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
</script>

<script type="text/javascript">
    $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        $.ajax({
            url: '<?= site_url() ?>/midtrans/snap/token',
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