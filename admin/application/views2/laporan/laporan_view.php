<!doctype html>
<html>
<head>
    <title></title>
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
        <h2 style="margin-top:0px">Laporan</h2>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 4px"  id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
</div>
<div>
    <form method="POST" action="<?php echo site_url()."laporan";?>">
        <table>
            <tr>
                <td colspan="3">
                    FILTER
                </td>
            </tr>
            <tr>
                <td>
                    Status Order
                </td>
                <td colspan="3">
                    <select id="select-filter" name="select-filter">
                        <option <?php if($filter=="0"){echo "selected";} ?> value="0">Semua</option>
                        <?php foreach ($statusOrder as $s): ?>
                            <option <?php if($filter==$s['id_status']){echo "selected";} ?> value="<?php echo $s['id_status'];?>"><?php echo $s['desk_status']?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Periode
                </td>
                <td>
                    <input name="date1" type="date" value="<?php 
                    if($date1!='0'){
                        echo date_format($date1, 'Y-m-d');
                    }
                    ?>">
                </td>
                <td>
                    S/d
                </td>
                <td>
                    <input name="date2" type="date" value="<?php 
                    if($date2!='0'){
                        echo date_format($date2, 'Y-m-d');
                    }
                    ?>">
                </td>
            </tr>
            <tr>
                <td colspan="4" align="right">
                    <input type="submit" name="submit" value="Filter">
                </td>
            </tr>
        </table>
    </form>
</div>
<table class="table table-bordered table-striped table-hover" id="mytable">
    <thead>
        <tr>
            <th>NO</th>
            <th>Tanggal Order</th>
            <th>ID Order</th>
            <th>Status Order</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $no=1;
        foreach ($laporan as $q): ?>
        <tr>
            <td>
                <?php echo $no;$no++;?>
            </td>
            <td>
                <?php echo $q['tgl_order'];?>
            </td>
            <td>
                <?php echo $q['id_order'];?>
            </td>
            <td>
                <?php 
                    foreach ($statusOrder as $s):
                        if($q['status_order']==$s['id_status']){ 
                            echo $s['desk_status'];
                        }
                    endforeach;
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
<ul class="pager">
    <li>
    <?php echo $pagination; ?>
    </li>
</ul>
<script src="<?php echo base_url('assets/data_table/assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/data_table/assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.js') ?>"></script>
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