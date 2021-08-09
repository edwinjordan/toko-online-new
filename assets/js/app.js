/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var base_app="http://localhost/project/toko_online/";

function base_url(url){
    return base_app+url;
}

function SorterDesc(a, b) {
    if (a < b) return 1;
    if (a > b) return -1;
    return 0;
}



function number_counter(value, row, index) {
    return index + 1;
}


function piutang_jml(value, row, index) {
    var jml = 90 / 100 * value;
    return jml;

}


//penjual
function action_penjual_order(value, row, index){
    return '<a href="'+base_url("penjual/order/detail_barang/"+value)+'" class="btn btn-info" >Detail Barang</a>' ;
}


function sumFormatter(data){
	 field = this.field;
	    return data.reduce(function(sum, row) { 
	        return sum + (+row[field]);
	    }, 0);
}
// function TotalFormatter(data){
// 	 return "<b>Total Pemasukan</b>";
// }

function opsi_pengembalian_produk(value, row, index) {
   return '<a href="'+base_url("penjual/order/detail_pengembalian_produk/"+value)+'" class="btn btn-info" >Detail Barang</a>' ;
}