<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?= base_url('user/Home')?>">Home</a></li>
		<li class="active">Form Komplain</li>
    </ol>
    <?php if (isset($komplain_barang[0]['id_detail_order'])) :?>
        <?php if($komplain_barang[0]['status_komplain']=='Belum Ditangani') :?>
             <div class="alert alert-warning" role="alert"><strong>Komplain barang Menunggu Persetujuan Admin</strong></div>
        <?php elseif ($komplain_barang[0]['status_komplain']=='Disetujui') :?>
            <div class="alert alert-info" role="alert"><strong>Komplain <?php echo strtolower($komplain_barang[0]['jenis_komplain']); ?> telah disetujui<br> Silahkan mengirimkan produk yang telah di komplain ke alamat gudang kami dan isikan formulir pengembalian produk yang telah di sediakan</strong></div>
        <?php elseif ($komplain_barang[0]['status_komplain']=='Disetujui dan Dalam Proses Pengiriman') :?>
            <div class="alert alert-success" role="alert"><strong>Komplain <?php echo strtolower($komplain_barang[0]['jenis_komplain']); ?> telah disetujui, Silahkan Untuk Ditunggu</strong></div>
    <?php endif; endif;?>

    <div class="row mb-invoice-3">
        <div class="col-md-12">
            <h3 style="margin-bottom:10px">Detail Barang</h3>
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Foto Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $produk[0]['nama_produk'] ?></td>
                            <td><img src="<?php echo base_url() ?>assets/img/produk_penjual/<?= $produk[0]['foto_produk1'] ?>" alt="img" width="180" height="180"></td>
                            <td><?= number_format($data_order[0]['jumlah_produk'],0,',','.') ?></td>
                            <td>Rp. <?= number_format($data_order[0]['subtotal'],0,',','.') ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row mb-invoice-3">
        <div class="col-md-6">
        <?php if (isset($komplain_barang[0]['id_detail_order'])) :?>
            <?php if ($komplain_barang[0]['status_komplain']=='Disetujui') :?>
            <h4 class="mb-invoice-2">Form Konfirmasi Pengembalian Produk</h4>
            <form method="POST" action="<?php echo base_url('user/order/konfirmasi_pengembalian_barang'); ?>" >
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" readonly="" value="<?php echo $order[0]['nama_order']; ?>">
                </div>
                <div class="form-group">
                    <label>Produk yang di komplain</label>
                    <input type="text" class="form-control" name="nama_produk" readonly="" value="<?php echo $produk[0]['nama_produk'] ; ?>">
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" class="form-control" name="jumlah_produk" readonly="" value="<?php echo $komplain_barang[0]['jumlah_produk_komplain'] ; ?>">
                </div>
                <div class="form-group">
                    <label>Nama Pemilik Rekening</label>
                    <input type="text" class="form-control" name="nama_rek" required="" >
                </div>
                <div class="form-group">
                    <label>No Rekening</label>
                    <input type="text" class="form-control" name="no_rek" required="" >
                </div>
                <div class="form-group">
                    <label>Jenis Bank</label>
                    <input type="text" class="form-control" name="jenis_bank" required="" >
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_order"  value="<?php echo $data_order[0]['id_order']; ?>">
                    <input type="hidden" class="form-control" name="id_detail_order"  value="<?php echo $data_order[0]['id_detail_order']; ?>">
                    <input type="hidden" class="form-control" name="id_komplain"  value="<?php echo $komplain_barang[0]['id_komplain']; ?>">
                    <button class="btn btn-block btn-success" type="submit">Kirim</button>
                </div>
            </form>
        <?php endif; else : ?>
        <form action="<?= base_url('user/order/simpan_komplain_barang') ?>" method="POST" enctype="multipart/form-data">
            <div class="row mb-invoice-3">
                <div class="col-md-12">
                    <h3 class="mb-invoice-2 ">Form Komplain Barang</h3>
                    <div class="form-group">
                        <label>Jenis Komplain</label>
                        <select name="jenis_komplain" class="form-control" required>
                            <option value="" disabled="" selected="">-Silahakan Pilih-</option>
                            <option value="Pergantian Produk" >Pergantian Produk</option>
                            <option value="Pengembalian Dana" >Pengembalian Dana</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Barang Yang Dikomplain</label>
                        <input type="number" min=0 max="<?= $data_order[0]['jumlah_produk'] ?>" name="jumlah_produk_komplain" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pesan Komplain</label>
                        <textarea rows="7" name="pesan_komplain" class="form-control" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>Bukti Foto (MAX 1 MB)</label>
                        <input class="form-control" type=file name='foto1' id="foto1" accept="image/*" >
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_order" value="<?php echo $data_order[0]['id_order'] ?>">
                        <input type="hidden" name="id_detail_order" value="<?php echo $data_order[0]['id_detail_order'] ?>">
                        <button class="btn btn-block btn-success" type="submit">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
        <?php endif; ?>
        </div>
    </div>
</div>

<script>
  $('#konfirmasi_barang').click(function (event) {
    $.ajax({
        url: '<?= base_url().'user/order/konfirmasi_barang/'.$data_order[0]['id_order'] ?>',
        type: 'POST',
        success: function (result) {
            location.reload();
        },error: function (jqXHR, textStatus, errorThrown) {
    		console.log('Error get data from ajax');
	    }
    })
  })
</script>