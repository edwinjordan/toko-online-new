<!doctype html>
<html>
<head>
    
    <link rel="stylesheet" href="<?php echo base_url('assets/data_table/assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.css') ?>"/>

    <style>
        body{
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <h2 style="margin-top:0px">order</h2>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
           <!--            <?php echo anchor(site_url('kodepos/create'), 'Create', 'class="btn btn-primary"'); ?> -->
       </div>
   </div>
 
<div id="toolbar2" class="btn-group">
  <h3>Produk Yang sudah di kembalikan</h3>
</div>

<table data-toggle="table"
       data-url="<?php echo base_url('penjual/order/get_refund'); ?>"
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
            <th data-field="no_resi"   >Resi</th>
            <th data-field="keterangan"   >Keterangan</th>
          
         
           
            
     

        </tr>
        </thead>
    </table>

<hr>

    <div id="toolbar3" class="btn-group">
  <h3>Permintaan Pergantian Barang</h3>
</div>

<table data-toggle="table"
       data-url="<?php echo base_url('penjual/order/get_pengembalian_produk'); ?>"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
        data-show-footer="true"
       data-pagination="true"
        data-toolbar="#toolbar3"
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
            <th data-field="jumlah_produk_komplain">Jumlah</th>
            <th data-field="no_resi"   >Resi</th>
            <th data-field="id_komplain_barang" data-formatter="opsi_pengembalian_produk"   >Opsi</th>
          
         
           
            
     

        </tr>
        </thead>
    </table>






        <!--
        <script src="<?php echo base_url('assets/data_table/assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/data_table/assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.js') ?>"></script>
         <script type="text/javascript">
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
                    "ajax": "<?php echo site_url('order/ajax_tabel'); ?>",
                    "columns": [
                        {
                            "data": null,
                            "class": "text-center",
                            "orderable": false
                        },        
                        {"data": "DT_RowId"},                
                        {"data": "tgl_order"},
                        {"data": "total_order"},
                        {"data": "nama_order"},
                        {"data": "alamat_order"},
                        {"data": "tlp_order"},
                        {"data": "kode_pos_order"},
                        {"data": "provinsi_order"},
                        {"data": "ongkir_order"},
                        {
                            "class": "text-center",
                            "data": "aksi"
                        }
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