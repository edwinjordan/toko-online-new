var base_app = "http://localhost/project/admins/";

function base_url(url) {
	return base_app + url;
}


function pajak(value, row, index){
	return value+"%";
}
function number_counter(value, row, index) {
	return index + 1;
}

function piutang_jml(value, row, index) {
	var jml = 90 / 100 * value;
	return jml;

}

function opsi_all_order(value, row, index) {
	var data_return = '<div class="btn-group" role="group" aria-label="..."> <a href="'
			+ base_url("order/detail/" + row.id_order)
			+ '" type="button" class="btn btn-success">Detail Order</a><a href="'
			+ base_url("order/hapus/" + row.id_order)
			+ '" type="button" class="btn btn-danger">Hapus</a> ';

	// if (row.status_order == 3) {
	// data_return += '<a href="' + base_url("order/kirim/" + row.id_order)
	// + '" type="button" class="btn btn-warning">Kirim Order</a>';
	// }
	data_return += '</div>';

	return data_return;
}

function opsi_pembayaran_penjual(value, row, index) {

	var data_return = '<a href="' + base_url("laporan/penjual/" + value)
			+ '" type="button" class="btn btn-success">Detail & bayar</a>';

	return data_return;
}

function sumFormatter(data) {
	field = this.field;
	return data.reduce(function(sum, row) {
		return sum + (+row[field]);
	}, 0);
}
function TotalFormatter(data) {
	return "<b>Total</b>";
}

function opsi_pembayaran_penjual_resi(value, row, index) {

	var data_return = '<a  onclick="javascript: return confirm(\'Anda yakin ingin mengkonfirmasi pembayaran ?\')" href="'
			+ base_url("laporan/konfirmasi_pembayaran_resi/"
					+ row.id_detail_order + '/' + row.id_penjual)
			+ '" type="button" class="btn btn-success">Konfirmasi</a>';

	return data_return;
}

function total_pemasukan() {
	return "<b>Total Pemasukan</b>";
}

function dateSubstraction(value, row, index) {
	var date = value.split("-");
	var data_return = getDayDelta(date[0], date[1], date[2]);

	return data_return;
}

function getDayDelta(incomingYear, incomingMonth, incomingDay) {
	var incomingDate = new Date(incomingYear, incomingMonth - 1, incomingDay), today = new Date(), delta;
	// EDIT: Set time portion of date to 0:00:00.000
	// to match time portion of 'incomingDate'
	today.setHours(0);
	today.setMinutes(0);
	today.setSeconds(0);
	today.setMilliseconds(0);

	// Remove the time offset of the current date
	today.setHours(0);
	today.setMinutes(0);

	delta = today - incomingDate;

	return Math.round(delta / 1000 / 60 / 60 / 24);
}

function status_pengiriman(value, row, index) {
	var date = row.tanggal_konfirmasi.split("-");
	var selisih = getDayDelta(date[0], date[1], date[2]);
	var data_return = '';
	if (selisih > 4 || row.pembayaran!=0) {
		data_return = '<span class="label label-success">Pengiriman telah diterima</span>'

	} else {
		data_return = '<span class="label label-primary">Dalam Proses Pengiriman</span>'

	}
	return data_return;
}

function opsi_barang_dikirim(value, row, index) {
	var data_return='';
	if (row.pembayaran=="0") {
		 data_return = '<a href="' + base_url("laporan/konfirmasi_pembayaran_resi/" + row.id_detail_order+"/"+row.id_penjual+"/order")
			+ '" type="button" class="btn btn-success">Konfirmasi Pembayaran</a>';

	};
	
	return data_return;

}


function opsi_bayar_ongkir(value, row, index) {
	return '<a href="'+base_url("order/konfirmasi_ongkir/"+row.id_ongkir+"/"+row.id_penjual)+'"  onclick="javascript: return confirm(\'Anda yakin ingin mengkonfirmasi pembayaran Ongkos Kirim?\')" type="button" class="btn btn-success">Bayar Ongkir</a>';
}

function bukti_image(value, row, index){
	return '<img onclick="show_image(\''+value+'\');" src="'+base_url('../assets/img/bukti_komplain/'+value)+'" class="img-responsive" alt="" width="75">';
}

function show_image(value){
	//console.log("../tokoonline/assets/img/bukti_komplain/"+img);
	$("#img_komplain").attr("src", base_url('../assets/img/bukti_komplain/'+value));
	$("#myModal_image").modal('show');
}

function opsi_komplain(value, row, index){
	value=row.id_komplain;
	var data_return='';
	if (row.status_komplain=='Belum Ditangani') {
		data_return='<div class="btn-group" role="group" aria-label="..."> <a onclick="javascript: return confirm(\'Anda yakin ingin menyutujui komplain barang?\')"  href="'+base_url('order/konfirmasi_komplain/'+value)+'" type="button" class="btn btn-primary">Setujui</a> </div>';
	}
	return data_return;
}

function opsi_refund(value, row, index){
	
	var data_return='';
	if (row.jenis_komplain=='Pergantian Produk') {
		if (row.status_sampai==1) {
			data_return='Pergantian Produk Sudah Dikirim';
		}else{
			data_return='<a class="btn btn-primary" onclick="javascript: return confirm(\'Anda yakin ingin mengkonfirmasi ke penjual?\')" href="'+base_url('order/konfirmasi_refund_penjual/'+row.id_komplain)+'" role="button">Kirim Pergantian Produk</a>';
		}
	}else if (row.jenis_komplain=='Pengembalian Dana') {
		
		if(row.status_dana_kembali==0){
		data_return='<button onclick="batal(\''
			+ row.id_order
			+ '\',\''
			+ row.id_detail_order
			+ '\',\''
			+ row.id_penjual
			+ '\',\''
			+ row.nama_produk
			+  '\',\''
			+ row.jumlah_produk_komplain
			+ '\');" type="button" class="btn btn-warning">Batalkan Transaksi</button>';
		}
	}
	return data_return;
}



function pembatalan_order(value, row, index) {

	var data_return = '<div class="btn-group" role="group" aria-label="..."><a  onclick="javascript: return confirm(\'Anda yakin ingin mengkonfirmasi pembayaran ?\')" href="'
			+ base_url("laporan/konfirmasi_pembayaran_resi/"
					+ row.id_detail_order + '/' + row.id_penjual)
			+ '" type="button" class="btn btn-success">Konfirmasi</a><button onclick="batal(\''
			+ row.id_order
			+ '\',\''
			+ row.id_detail_order
			+ '\',\''
			+ row.id_penjual
			+ '\',\''
			+ row.nama_produk
			+  '\',\''
			+ row.jumlah_produk_komplain
			+
			'\');" type="button" class="btn btn-warning">Batalkan Transaksi</button><div>';

	return data_return;
	console.log(data_return);
}
