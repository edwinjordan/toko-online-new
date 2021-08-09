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
            <h2 style="margin-top:0px"><?php echo $komplain_barang[0]['jenis_komplain'] ?></h2>
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


<?php if ($konfirmasi_pengembalian_produk[0]['no_resi_ganti']=='') { ?>
  <a class="btn btn-primary"  style="margin-bottom:10px;"  href="#" data-toggle="modal" data-target="#order">Validasi Pengiriman Order</a>

<?php } ?>
    
  

                    
  <h3>Info kontak Pembeli</h3><hr>
   <div class="row">
   
     <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Id Order</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $order[0]['id_order']; ?>" style="    background-color: #fff;">
      </div>

    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $order[0]['nama_order']; ?>" style="    background-color: #fff;">
      </div>

    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Telp</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $order[0]['tlp_order']; ?>" style="    background-color: #fff;">
      </div>

    </div>
    
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Provinsi</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $order[0]['provinsi_order']; ?>" style="    background-color: #fff;">
      </div>

    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Kota</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $order[0]['kota_order']; ?>" style="    background-color: #fff;">
      </div>

    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Alamat Lengkap</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $order[0]['alamat_order']; ?>" style="    background-color: #fff;">
      </div>

    </div>
    
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Kode Pos</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $order[0]['kode_pos_order']; ?>" style="    background-color: #fff;">
      </div>

    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Produk yang di komplain</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $produk[0]['nama_produk']; ?>" style="    background-color: #fff;">
      </div>

    </div>


    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Jumlah Produk yang di komplain</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $komplain_barang[0]['jumlah_produk_komplain']; ?>" style="    background-color: #fff;">
      </div>

    </div>
   

    <?php if ($konfirmasi_pengembalian_produk[0]['no_resi_ganti']!="") { ?>
       <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Nomor Resi</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $konfirmasi_pengembalian_produk[0]['no_resi_ganti']; ?>" style="    background-color: #fff;">
      </div>

    </div>


    

    <?php } ?>
    
    
    
    
    
  
  </div>
	
 
	 <!-- Modal -->
                    <div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        
                        <form class="form-horizontal" method="post" action="<?php echo base_url("penjual/order/konfimasi_pengiriman_ulang")?>" >
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Validasi Pengiriman</h4>
                          </div>
                          <div class="modal-body">
                                <div class="well"><strong>Pastikan anda telah mengirimkan barang dan mencatat resi pengiriman</strong></div>
                                
                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">ID Order</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly="readonly" class="form-control" name="id_order" value="<?php echo $order[0]['id_order']; ?>">

                                   <input type="hidden" readonly="readonly" class="form-control" name="id_komplain" value="<?php echo $komplain_barang[0]['id_komplain']; ?>">
                                </div>
                              </div>
                             

                              
                                
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">No. Resi</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="resi" id="inputPassword3" placeholder="Nomor Resi" required="">
                                </div>
                              </div>
                             
                            
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                          
                          </form>
                        </div>
                      </div>
                    </div>
<ul class="pager">
    <li>
        
    </li>
</ul>
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