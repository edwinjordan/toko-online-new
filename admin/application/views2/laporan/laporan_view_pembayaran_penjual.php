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




<div id="toolbar" class="btn-group">
   <h3>Pembayaran produk/barang ke penjual</h3>
    
</div>
<table data-toggle="table"
       data-url="<?php echo site_url('laporan/get_pembayaran_penjual'); ?>"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
		 data-toolbar="#toolbar"
       data-pagination="true"
       >
        <thead>
        <tr>
            <th data-formatter="number_counter">No</th>
            <th data-field="id_penjual">ID Penjual</th>
             <th data-field="subtotal">Total Yang Masuk</th>
            <th data-field="jml_tagihan">Total Produk yang harus dibayar</th>
             <th data-field="ongkir">Ongkir</th>
           
           <th data-formatter="opsi_pembayaran_penjual" data-field="id_penjual">Opsi</th>
         <!--    <th data-field="id_produk" data-formatter="action_produk" data-width="200">Aksi</th>
 -->

        </tr>
        </thead>
    </table>

<hr><hr>
	
<div id="toolbar3" >
<h3>Pembayaran Untuk Ongkir</h3>
</div>

<table data-toggle="table"
       data-url="<?php echo site_url('laporan/get_all_ongkir_piutang/'); ?>"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
		data-toolbar="#toolbar3"
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
	

<hr><hr><hr>
 <div class="row" style="margin-bottom: 10px">
    <div class="col-md-12">
        <h2 style="margin-top:0px">Laporan yang sudah dibayar</h2>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 4px"  id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
</div>
<div id="toolbar2" class="btn-group">
   <h3>Laporan yang sudah dibayar ke penjual</h3>
    
</div>
<table data-toggle="table"
       data-url="<?php echo site_url('laporan/get_pembayaran_penjual_sudah_bayar'); ?>"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
		data-toolbar="#toolbar2"
       data-pagination="true"
       >
        <thead>
        <tr>
            <th data-formatter="number_counter">No</th>
            <th data-field="id_penjual">ID Penjual</th>
            
            <th data-field="id_order">ID Order</th>
            <th data-field="no_resi">Resi</th>
            <th data-field="pembayaran">Total yang sudah dibayar</th>
            
          
           
          
        </tr>
        </thead>
    </table>


<hr>


	
<div id="toolbar4" >
<h3>Ongkir yang sudah dibayar</h3>
</div>

<table data-toggle="table"
       data-url="<?php echo site_url('laporan/get_all_ongkir_dibayar/'); ?>"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
		data-toolbar="#toolbar4"
       data-pagination="true"
       >
        <thead>
        <tr>
            <th data-formatter="number_counter">No</th>
            <th data-field="id_order">ID Order</th>
             <th data-field="id_penjual">ID Penjual</th>
            <th data-field="ongkir">Ongkos Kirim</th>
            <th data-field="id_ongkir|id_penjual" data-formatter="" >Opsi</th>
            

        </tr>
        </thead>
    </table>
	





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