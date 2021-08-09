<!doctype html>
<html>
<head>
    <title></title>
   <!-- Latest compiled and minified CSS -->


    <style>
        body{
            padding: 15px;
        }
    </style>
</head>
<body>

<?php echo $this->session->flashdata('item'); ?>
   <div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <h2 style="margin-top:0px">Komplain</h2>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 4px"  id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="myModal_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
              <img id="img_komplain" src="" class="img-responsive" alt="">
      
    </div>
  </div>
</div>


<div id="toolbar" class="btn-group">
  <h3>Permintaan Komplain</h3>
</div>

<table data-toggle="table"
       data-url="<?php echo site_url('order/get_komplain'); ?>"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
		data-show-footer="true"
       data-pagination="true"
        data-toolbar="#toolbar"
       >
        <thead>
        <tr>
            <th data-formatter="number_counter"
            
            >No</th>
            <th data-field="id_order">ID Order</th>
            <th data-field="id_penjual">ID Penjual</th>
            <th data-field="nama_produk">Produk</th>
            <th data-field="jumlah_produk_komplain">Jumlah</th>
           
   
           
            <th data-field="no_resi"   >Resi</th>
            <th data-field="nama_order"   >Nama</th>
            <th data-field="tlp_order"   >Telp</th>
             <th data-field="jenis_komplain"   >Jenis</th>
            <th data-field="pesan_komplain"   >Komplain</th>
               <th data-field="status_komplain" >Status</th>
            <th data-field="bukti_komplain" data-formatter="bukti_image" data-width="300" >Bukti</th>
             <th data-field="id_komplain | status_komplain" data-formatter="opsi_komplain" >Opsi</th>
          
       

        </tr>
        </thead>
    </table>


<script type="text/javascript">
	
</script>


<div id="toolbar2" class="btn-group">
  <h3>Produk yang telah disetujui Dan Telah dikirim</h3>
</div>

<table data-toggle="table"
       data-url="<?php echo site_url('order/get_konfirmasi_refund_pembeli'); ?>"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
		data-show-footer="true"
       data-pagination="true"
        data-toolbar="#toolbar2"
       >
        <thead>
        <tr>
            <th data-formatter="number_counter"
            
            >No</th>
            <th data-field="id_order">ID Order</th>
            <th data-field="kode_produk">Kode Produk</th>
            <th data-field="nama_produk">Nama Produk</th>
           
            <th data-field="harga"
            data-align="right"
            >Harga</th>
            <th data-field="jumlah_produk_komplain">Jumlah</th>
            <th data-field="no_resi_pengembalian"   >Resi Pembeli</th>
          
           <th 
           data-field="jenis_komplain"
      
           >Komplain</th>
           
           
           <th 
           data-field="no_resi_ganti"
      
           >Resi Penjual</th>
           
              <th 
           data-field="id_komplain | jenis_komplain | status_sampai | id_order | nama_produk | id_detail_order | id_penjual  | jumlah_produk_komplain | status_dana_kembali"
   			data-formatter="opsi_refund"
           data-align="left"
           >Opsi</th>
     

        </tr>
        </thead>
    </table>











<script src="<?php echo base_url('assets/data_table/assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/data_table/assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.js') ?>"></script>





<!-- Modal -->
<div class="modal fade" id="modal_batal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <form method="POST" action="<?php echo base_url('order/pembatalan_transaksi')?>" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pembatalan Order</h4>
      </div>
      <div class="modal-body">
       	<div class="well">Pastikan Sudah mengembalikan sejumlah pengembalian biaya yang sesuai ke pembeli</div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Id Order</label>
		    <input type="text" class="form-control" id="id_order_klaim" name="id_order_klaim" readonly="readonly">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Id Detail Order</label>
		    <input type="text" class="form-control" id="id_detail_order_klaim" name="id_detail_order_klaim" readonly="readonly">
		  </div>
		  
		   <div class="form-group">
		    <label for="exampleInputPassword1">Id Penjual</label>
		    <input type="text" class="form-control" id="id_penjual_klaim" name="id_penjual_klaim" readonly="readonly">
		  </div>
		  
		  
		   <div class="form-group">
		    <label for="exampleInputPassword1">Nama Produk</label>
		    <input type="text" class="form-control" id="nama_barang_klaim" name="nama_barang_klaim" readonly="readonly">
		  </div>
		  
		  
		    <div class="form-group">
		    <label for="exampleInputPassword1">Jumlah Produk</label>
		    <input type="text" class="form-control" id="jumlah_barang_klaim" name="jumlah_barang_klaim" readonly="readonly">
		  </div>
		  
		  
		   <div class="form-group">
		    <label for="exampleInputPassword1">Keterangan</label>
		    <textarea name="keterangan_klaim" class="form-control" rows="3"></textarea>
		  </div>
		  
		  
		  
		 
		 
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      	</form>
      
    </div>
  </div>
</div>

<script type="text/javascript">
function batal(id_order,id_detail_order, id_penjual, nama_produk, jumlah_produk){
	$("#modal_batal").modal('show');
	console.log(jumlah_produk);

	$("#id_order_klaim").val(id_order);
	$("#id_detail_order_klaim").val(id_detail_order);
	$("#id_penjual_klaim").val(id_penjual);
	$("#jumlah_barang_klaim").val(jumlah_produk);
	$("#nama_barang_klaim").val(nama_produk);
}
</script>


    </body>
    </html>