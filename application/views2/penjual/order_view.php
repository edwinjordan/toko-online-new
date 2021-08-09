<!doctype html>
<html>
<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/data_table/assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.css') ?>"/>

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
    
    
<table 
    class="table table-bordered table-striped table-hover"
    data-toggle="table"
       data-url="<?php echo site_url('penjual/order/get_order_data'); ?>"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"

       data-pagination="true"
       
   
       >
        <thead>
        <tr>
            <th data-formatter="number_counter">No</th>
            <th data-field="id_order"
                data-sortable="true"
           
                >ID Order</th>
            <th data-field="tgl_order">Tanggal Order</th>
            <th data-field="nama_order">Nama Penerima</th>
           
            <th data-field="alamat_order">Alamat</th>
            <th data-field="provinsi_order">Provinsi</th>
            <th data-field="tlp_order">Telp</th>
            <th  data-field="kode_pos_order">Kode Pos</th>
           <th data-formatter="action_penjual_order" data-field="id_order">Opsi</th>
         <!--    <th data-field="id_produk" data-formatter="action_produk" data-width="200">Aksi</th>
 -->

        </tr>
        </thead>
    </table>
    
<!--    
   <table class="table table-bordered table-striped table-hover" id="mytable">
    <thead>
        <tr>
            <th>NO</th>
            <th>ID Order</th>
            <th>Tanggal Order</th>
            <th>Total order</th>
            <th>Nama Penerima</th>
            <th>Alamat Order</th>
            <th>Telp Order</th>
            <th>KodePos Order</th>
            <th>Provinsi Order</th>
            <th>Ongkir Order</th>
            <th>Resi Pengiriman</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($items)){ ?>
        <?php $no=1; foreach ($order as $q):?>
        <tr>
            <td>
                <?php echo $no;$no++;?>
            </td>
            <td>
                <?php echo $q['id_order'];?>
            </td>
            <td>
                <?php echo $q['tgl_order'];?>
            </td>
            <td>
                <?php echo $q['jumlah'];?>
            </td>
            <td>
                <?php echo $q['nama_order'];?>
            </td>
            <td>
                <?php echo $q['alamat_order'];?>
            </td>
            <td>
                <?php echo $q['tlp_order'];?>
            </td>
            <td>
                <?php echo $q['kode_pos_order'];?>
            </td>
            <td>
                <?php echo $q['provinsi_order'];?>
            </td>
            <td>
                <?php echo $q['ongkir_order'];?>
            </td>
            <td>
                <?php echo $q['no_resi'];?>
            </td>
            <td>
                <a class="btn btn-success"  href="<?php echo base_url('penjual/order/detail_barang/'.$q['id_order'])?>">Detail Barang</a>
                <a class="btn btn-danger"  href="<?php echo base_url() . 'penjual/order/hapus/'.$q['id_order'] ?>">Hapus Order</a>
               
                </td>
            </tr>
        <?php endforeach; }?>
    </tbody>
</table>-->

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