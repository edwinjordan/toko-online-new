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
        <h2 style="margin-top:0px">Pembayaran</h2>
        
        
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 4px"  id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        
        	
        </div>
    </div>
</div>


<div class="well">
<p>ID Penjual : <?php echo $no_rek[0]['id_user']?></p>
<p>No Rekening : <?php echo $no_rek[0]['no_rek_user']?></p>
<p>Nama Pemilik Rekening : <?php echo $no_rek[0]['nama_rek_user']?></p>
<p>Jenis Bank : <?php echo $no_rek[0]['bank_rek_user']?></p>
</div>
<div id="toolbar" class="btn-group">
   <h3>Pembayaran Untuk Barang/Produk</h3>
    
</div>

<table data-toggle="table"
       data-url="<?php echo site_url('laporan/get_piutang/'.$user); ?>"
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
           
            <th data-field="nama_produk">Nama Produk</th>
           
            <th data-field="harga"
            data-align="right"
            >Harga</th>
            <th data-field="jumlah_produk">Jumlah</th>
            <th data-field="no_resi">Resi</th>
             <th data-field="tanggal_konfirmasi">Tgl Konfirmasi</th>
           <th  data-field="subtotal"
           data-footer-formatter="TotalFormatter"
           data-align="right"
           data-width="400"
           >Hutang Sebelum pajak</th>
            <th data-field="tanggal_konfirmasi" data-formatter="dateSubstraction">Jumlah Hari</th>
           <th 
           data-field="tagihan"
           data-footer-formatter="sumFormatter"
           data-align="left"
           >Sub Total bayar</th>
           <th data-field="id_order | nama_produk | id_detail_order | id_penjual" data-formatter="opsi_pembayaran_penjual_resi">Opsi</th>
         <!--    <th data-field="id_produk" data-formatter="action_produk" data-width="200">Aksi</th>
 -->

        </tr>
        </thead>
    </table>


<hr>

<div id="toolbar2" >
<h3>Pembayaran Untuk Ongkir</h3>
</div>

<table data-toggle="table"
       data-url="<?php echo site_url('laporan/get_ongkir_piutang/'.$user); ?>"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
		data-toolbar="#toolbar2"
       data-pagination="true"
       >
        <thead>
        <tr>
            <th data-formatter="number_counter">No</th>
            <th data-field="id_order">ID Order</th>
             <th data-field="id_penjual">ID Penjual</th>
            <th data-field="ongkir">Ongkos Kirim</th>
            <th data-field="id_ongkir|id_penjual" data-formatter="opsi_bayar_ongkir" >Opsi</th>
            

        </tr>
        </thead>
    </table>



<!-- Modal -->
<div class="modal fade" id="modal_konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        <div class="well">Pastikan sudah mentransfer sesuai dengan jumlah yang harus di bayarkan</div>
      
      	<h3>Apakah anda yakin ingin melakukan konfirmasi pembayaran ke penjual ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <a href="<?php echo base_url('laporan/konfirmasi_pembayaran_penjual/'.$user)?>" type="button" class="btn btn-success">  <i class="glyphicon glyphicon-ok"></i> Konfirmasi</a>
      </div>
    </div>
  </div>
</div>




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
		    <label for="exampleInputPassword1">Nama Barang</label>
		    <input type="text" class="form-control" id="nama_barang_klaim" name="nama_barang_klaim" readonly="readonly">
		  </div>
		  
		   <div class="form-group">
		    <label for="exampleInputPassword1">Keterangan</label>
		    <textarea name="keterangan_klaim" class="form-control" rows="3"></textarea>
		  </div>
		  
		     <div class="form-group">
		    <label for="exampleInputPassword1">Biaya Tambahan</label>
		    <input type="number" class="form-control" id="biaya_tambahan" name="biaya_tambahan" >
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
function batal(id_order,id_detail_order, id_penjual, nama_produk){
	$("#modal_batal").modal('show');
	console.log(id_order);

	$("#id_order_klaim").val(id_order);
	$("#id_detail_order_klaim").val(id_detail_order);
	$("#id_penjual_klaim").val(id_penjual);
	$("#nama_barang_klaim").val(nama_produk);
}
</script>


<script src="<?php echo base_url('assets/data_table/assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/data_table/assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">
    


</script>


        <!-- <script type="text/javascript">
            $(document).ready(function () {
 
                $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };
 
                var t = $('#mytable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo site_url('laporan/ajax_tabel'); ?>",
                    "columns": [
                        {
                            "data": null,
                            "class": "text-center",
                            "orderable": false
                        },
                        {"data": 'tgl_order'},        
                        {"data": 'DT_RowId'},               
                        {"data": 'status_order'},
                        {"data": 'status_kirim'}
                    ],
                    "order": [[2, 'desc']],
                    "rowCallback": function (row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script> -->
    </body>
    </html>