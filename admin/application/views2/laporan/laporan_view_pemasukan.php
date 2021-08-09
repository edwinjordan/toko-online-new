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
        <h2 style="margin-top:0px">Laporan</h2>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 4px"  id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
</div>



<div id="toolbar" class="btn-group">
  <h3>Laporan Pemasukan</h3>
</div>

<table data-toggle="table"
       data-url="<?php echo site_url('laporan/get_pemasukan'); ?>"
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
            <th data-field="kode_produk">Kode Produk</th>
            <th data-field="nama_produk">Nama Produk</th>
           	  <th data-field="no_resi"   >Resi</th>
          
           <th 
            <th data-field="harga"
            data-align="right"
            >Harga</th>
            
            <th data-field="jumlah_produk">Jumlah</th>
            <th data-field="subtotal"   >Subtotal</th>
          
           <th 
           data-field="pembayaran"
          data-footer-formatter="total_pemasukan"
           >Jumlah Dibayar</th>
           
              <th 
           data-field="jumlah_pemasukan"
           data-footer-formatter="sumFormatter"
           data-align="left"
           >Jumlah Pemasukan</th>
     
         <!--    <th data-field="id_produk" data-formatter="action_produk" data-width="200">Aksi</th>
 -->

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