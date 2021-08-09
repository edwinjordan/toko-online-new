<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/select2.min.css">
<script src="<?php echo base_url() ?>assets/sweetalert/sweetalert.min.js"></script>
<style>
	.size-204 {
		width: calc(100% - 105px);
	}
</style>	
<div class="single-sec">
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="<?= base_url('user/Home') ?>">Home</a></li>
			<li class="active">Detail Produk</li>
		</ol>
		<!-- start content -->
		<div class="col-md-12 det" style="margin-bottom: 80px;">
			<div class="single_left">
				<div class="grid images_3_of_2">
					<ul id="etalage">
						<li style="width: 300px;">
							<a href="">
								<?php if ($detail_produk[0]['foto_produk1'] == null) : ?>

								<?php else : ?>
									<img class="etalage_thumb_image" style="width:300px;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk1'] ?>" class="img-responsive" />
									<img class="etalage_source_image" style="width:300px;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk1'] ?>" class="img-responsive" title="" />
								<?php endif; ?>
							</a>
						</li>
						<li style="width: 300px;">
							<?php if ($detail_produk[0]['foto_produk2'] == null) : ?>

							<?php else : ?>
								<img class="etalage_thumb_image" style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk2'] ?>" class="img-responsive" />
								<img class="etalage_source_image" style="width:300px;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk2'] ?>" class="img-responsive" title="" />
							<?php endif; ?>
						<li style="width: 300px;">
							<?php if ($detail_produk[0]['foto_produk3'] == null) : ?>

							<?php else : ?>
								<img class="etalage_thumb_image" style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk3'] ?>" class="img-responsive" />
								<img class="etalage_source_image" style="width: contain; height: 250px; object-fit: cover;" src="<?= base_url() ?>assets/img/produk_penjual/<?= $detail_produk[0]['foto_produk3'] ?>" class="img-responsive" title="" />
							<?php endif; ?>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="single-right">
				<h3><?= $detail_produk[0]['nama_produk'] ?></h3>
				<div class="id">
					<h4>ID: <?= $detail_produk[0]['id_produk'] ?></h4>
					<h4>Berat Bersih: <?php echo $detail_produk[0]['berat_bersih'] ?> gram</h4>
					<?php if ($detail_produk[0]['jumlah_stok'] > 0) : ?>
						<h4>Stok: <?php echo $detail_produk[0]['jumlah_stok'] ?> items</h4>
					<?php else : ?>
						<h4>Stok: 0 items</h4>
					<?php endif; ?>
				</div>
				<div class="cost" style="margin-top: 20px;">
					<div class="prdt-cost">
						<ul>
							<li>
								<h4>Harga </h4>
							</li>
							<li class="active">Rp. <?= number_format($detail_produk[0]['harga'], 0, ',', '.') ?></li>
							<!-- <form method="POST" action="<?= base_url() ?>user/Home/keranjang_belanja"> -->
							<form id="formAksi">
								<input type="hidden" value="1" name="quantity">
								<input type="hidden" name="harga" value="<?php echo $detail_produk[0]['harga'] ?>">
								<input type="hidden" name="id_produk" value="<?php echo $detail_produk[0]['id_produk'] ?>">
								<input type="hidden" name="berat_kotor" value="<?php echo $detail_produk[0]['berat_kotor'] ?>">
								<input type="text" name="ip_number" value="<?php echo $this->session->userdata('id_kpesan'); ?>">
								<!-- <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Jumlah
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="quantity" id="stok">
                                        </select><div class="dropDownSelect2"></div> 
                                          
                                        </div>
                                    </div>
                                </div> -->
								<?php if ($detail_produk[0]['jumlah_stok'] <= 0) : ?>
									<button type="submit" disabled>Maaf produk sudah habis</button>
								<?php else : ?>
									<button type="button" id="btn_save" onclick="save()">Tambah ke keranjang</button>
								<?php endif; ?>
							</form>
						</ul>
					</div>

					<div class="clearfix"></div>
				</div>
				<div class="single-bottom1">
					<h6>Details</h6>
					<p class="prod-desc"><?= $detail_produk[0]['deskripsi'] ?></p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>

<script>
	var link = "<?php echo site_url('user/home')?>";
	function swal_berhasil() { swal("Ditambahkan ke keranjang !", "success"); }
    function swal_berhasil_delet() { swal("Barang Berhasil Di Hapus !", "success"); }
    function swal_berhasil_update() { swal("keranjang Belanja Telah Di Perbaharui !", "success"); }
    function swal_error(msg) { swal({ title:"ERROR", text: msg, type: "warning", closeOnConfirm: true});  }

	$(document).ready(function(){    
        detail_stok();
    });

	function detail_stok(){
        $('#stok').load("<?php echo base_url();?>user/home/load_stok/<?php echo $detail_produk[0]['id_produk'] ?>");
    }

	function save() {
            $('#btn_save').text('Saving...');
            $('#btn_save').attr('disabled', true);

            var url;
            url = link+"/keranjang_belanja";
            
            //tinyMCE.triggerSave();
            $.ajax({
                url: url,
                type: "POST",
                data: $('#formAksi').serialize(),
                dataType: "JSON",
                success: function(result) {
                    
                    swal_berhasil();
                    cek(); 
                    detail_stok(); 
                        //detail_cart(); 
                      
                }, error: function(jqXHR, textStatus, errorThrown) {
                    //var div = document.getElementById('detail_cart');
                     setTimeout(function(){
                        $('#btn_save').text('Tambah Ke Keranjang');
                        $('#btn_save').attr('disabled', false);
                       // document.getElementById('formAksi').reset();
                     }, 1000);
                     swal_berhasil(); 
                     //div.innerHTML='';
                     cek();
                     detail_stok(); 
                }
            });



    }
</script>	