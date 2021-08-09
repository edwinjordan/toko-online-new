<!doctype html>
<html>

<head>
    <title></title>
    <!-- Latest compiled and minified CSS -->


    <style>
        body {
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
            <div style="margin-top: 4px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
    </div>



    <div id="toolbar" class="btn-group">
        <h3>Laporan Pemasukan</h3>
    </div>

    <table data-toggle="table" data-url="<?php echo site_url('laporan/get_pemasukan'); ?>" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-footer="true" data-pagination="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th data-formatter="number_counter">No</th>
                <th data-field="id_order">ID Order</th>
                <th data-field="tgl_order">Tanggal Order</th>
                <th data-field="total_order">Total Order</th>

                <th data-field="nama_order">Nama</th>
                <th data-field="alamat_order">Alamat</th>
                <th data-field="tlp_order">Telp</th>
                <th data-field="jumlah_order">Jumlah</th>
                <!-- <th data-field="subtotal"   >Subtotal</th> -->

                <th data-field="total_order" data-footer-formatter="">Jumlah Pemasukan</th>


            </tr>
        </thead>
    </table>











    <script src="<?php echo base_url('assets/data_table/assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/data_table/assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.js') ?>"></script>

</body>

</html>