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
           /* .dataTables_wrapper .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                height: 40px;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:#dddddd;
            }*/
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">User</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
     <?php echo anchor(site_url('users/add'), 'Tambah User', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover" id="mytable">
            <thead>
                <tr>
                  <th>NO</th>
                    <th>Id User</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Verifikasi User( 0 / 1)</th>
 
                      <th><center>Aksi</center></th>
                </tr>
            </thead>
        </table>
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
                    "ajax": "<?php echo site_url('users/ajax_tabel'); ?>",
                    "columns": [
                        {
                            "data": null,
                            "class": "text-center",
                            "orderable": false
                        },         
                      //  {"data": ""},   
                        {"data": "id_user"},      
                        {"data": "nama"},
                        {"data": "email"},
                        {"data": "level"},
                        {"data": "aktif_user"},
                        {
                            "class": "text-center",
                            "data": "aksi"
                       
                        }

                        
                        // {
                        //     "class": "text-center",
                        //     "data": "hapus"
                       
                        // }

                    ],
                    "order": [[1, 'asc']],
                    "rowCallback": function (row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }

                });

            });
        </script>   
    </body>
</html>