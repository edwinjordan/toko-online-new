<!doctype html>
<html>

<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/data_table/assets/bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.css') ?>" />

    <style>
        body {
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <h2 style="margin-top:0px">Order</h2>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <!--            <?php echo anchor(site_url('kodepos/create'), 'Create', 'class="btn btn-primary"'); ?> -->
        </div>
    </div>


    <table data-toggle="table" data-url="<?php echo site_url('order/get_data_order'); ?>" data-search="true" data-show-refresh="true" data-show-toggle="true" class="table table-bordered table-striped table-hover" data-pagination="true">
        <thead>
            <tr>
                <th data-formatter="number_counter">No</th>
                <th data-field="id_order" data-sort-order="desc">ID Order</th>
                <th data-field="tgl_order">Tanggal Order</th>
                <th data-field="total_order">Total Order</th>

                <th data-field="nama_order">Nama</th>
                <th data-field="alamat_order">Alamat </th>
                <th data-field="tlp_order">Telp</th>
                <!-- <th  data-field="kode_pos_order">Kode Pos</th> -->
                <!-- <th  data-field="provinsi_order">Provinsi</th> -->
                <!-- <th  data-field="ongkir_order">Ongkir</th> -->
                <th data-formatter="opsi_all_order" data-field="id_order|status_order" data-width="200">Opsi</th>
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
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($order as $q) : ?>
        <tr>
            <td>
                <?php echo $no;
                $no++; ?>
            </td>
            <td>
                <?php echo $q['id_order']; ?>
            </td>
            <td>
                <?php echo $q['tgl_order']; ?>
            </td>
            <td>
                <?php echo $q['total_order']; ?>
            </td>
            <td>
                <?php echo $q['nama_order']; ?>
            </td>
            <td>
                <?php echo $q['alamat_order']; ?>
            </td>
            <td>
                <?php echo $q['tlp_order']; ?>
            </td>
            <td>
                <?php echo $q['kode_pos_order']; ?>
            </td>
            <td>
                <?php echo $q['provinsi_order']; ?>
            </td>
            <td>
                <?php echo $q['ongkir_order']; ?>
            </td>
            <td>
                <a class="btn btn-success"  href="<?php echo base_url() . 'order/detail/' . $q['id_order'] ?>">detail Order</a>
                <a class="btn btn-danger"  href="<?php echo base_url() . 'order/hapus/' . $q['id_order'] ?>">Hapus Order</a>
                <?php if ($q['status_order'] == 3) {
                ?>
                    <a class="btn btn-warning"  href="<?php echo base_url() . 'order/kirim/' . $q['id_order'] ?>">Kirim Order</a>
                    <?php  ?>
                <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
-->
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

    <section id="confirm"></section>
    <hr>
    <hr>
    <hr>
    <?php echo $this->session->flashdata('item'); ?>
    <!-- <div id="toolbar" class="btn-group">
		   <h3>Orderan Produk yang Sudah dikirim penjual</h3>
		</div> 
		
		<div class="table-responsive">
        <table data-toggle="table"
       data-url="<?php echo site_url('order/get_order_dikirim'); ?>"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
		class="table table-bordered table-striped table-hover"
       data-pagination="true"
       data-toolbar="#toolbar"
       >
        <thead>
        <tr>
            <th data-formatter="number_counter">No</th>
            <th data-field="id_order">ID Order</th>
            <th data-field="id_penjual">ID Penjual</th>
            <th data-field="nama_produk">Produk</th>
            <th data-field="jumlah_produk">Jumlah</th>
           
            <th data-field="nama_order">Nama Penerima</th>
            <th data-field="alamat_order">Alamat</th>
           <th  data-field="tlp_order">Telp</th>
           <th  data-field="kode_pos_order">Kode Pos</th>
           <th  data-field="provinsi_order">Provinsi</th>
           <th  data-field="ongkir_order">Ongkir</th>
            <th  data-field="tanggal_konfirmasi">Tanggal Konfirmasi</th>
            <th  data-field="tanggal_konfirmasi|pembayaran" data-formatter="status_pengiriman">Status</th>
     <th data-formatter="opsi_barang_dikirim"-->
    <!--           	data-field="id_detail_order|id_penjual|pembayaran"-->
    <!--           	data-width="300">Opsi</th>-->
    <!--    <th data-field="id_produk" data-formatter="action_produk" data-width="200">Aksi</th>
 -->

    </tr>
    </thead>
    </table>
    </div> -->
</body>

</html>