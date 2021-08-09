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
            <h2 style="margin-top:0px">Order</h2>
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


<?php if ($status_validasi) { ?>
    <a class="btn btn-primary"  style="margin-bottom:10px;"  href="#" data-toggle="modal" data-target="#order">Validasi Pengiriman Order</a>
  
<?php } ?>
                    
  <h3>Info kontak Pembeli</h3><hr>
   <div class="row">
   
    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $info_kontak[0]['nama_order']; ?>" style="    background-color: #fff;">
      </div>

    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Telp</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $info_kontak[0]['tlp_order']; ?>" style="    background-color: #fff;">
      </div>

    </div>
    
    <!-- <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Provinsi</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<echo $info_kontak[0]['provinsi_order']; ?>" style="    background-color: #fff;">
      </div> -->

    <!-- </div> -->
    <!-- <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Kota</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<echo $info_kontak[0]['kota_order']; ?>" style="    background-color: #fff;">
      </div>

    </div> -->

    <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Alamat Lengkap</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<?php echo $info_kontak[0]['alamat_order']; ?>" style="    background-color: #fff;">
      </div>

    </div>
    
    <!-- <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Kode Pos</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="< $info_kontak[0]['kode_pos_order']; ?>" style="    background-color: #fff;">
      </div>

    </div> -->


    <!-- <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Jasa Ongkir Yang Digunakan</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="< echo $info_ongkir[0]['jasa_pengiriman']; ?>" style="    background-color: #fff;">
      </div>

    </div>


     <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Biaya Ongkir Yang Ditetapkan</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="< echo $info_ongkir[0]['ongkir']; ?>" style="    background-color: #fff;">
      </div>

    </div>

    <if ($order[0]['no_resi']!="") { ?>
       <div class="col-md-4">
      <div class="form-group">
        <label for="exampleInputEmail1">Nomor Resi</label>
        <input type="email" class="form-control" id="exampleInputEmail1" readonly="" value="<$order[0]['no_resi']; ?>" style="    background-color: #fff;">
      </div>

    </div> -->

    <!-- <} ?> -->
    
    
    
    
    
  
  </div>
	
   <br>
   <table class="table table-bordered table-striped table-hover" id="mytable">
    <thead>
        <tr>
            <th>NO</th>
            <th>ID Order</th>
            <th>Tanggal Order</th>
            <th>Nama Produk</th>
            <th>Jumlah Produk</th>
            <th>Harga @Produk</th>
             <th>Sub Total</th>
             <th>Sub Total Pajak</th>
           
             <!-- <th>Resi</th> -->
            <th>Opsi</th>
            
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($items)){ $total_bayar=0; ?>
        
        <?php $no=1; foreach ($order as $q):?>
        <?php 
        $prosentasi_total_pajak=100-$q['pajak'];
        $sub_total_setelah_pajak=ceil($prosentasi_total_pajak / 100 * $q['subtotal']);
        $total_bayar=$total_bayar+$sub_total_setelah_pajak;
        
        ?>
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
                <?php echo $q['nama_produk'];?>
            </td>

             <td>
                <?php echo $q['jumlah_produk'];?>
            </td>

             <td>
                <?php echo $q['harga'];?>
            </td>
            
              <td>
                <?php echo $q['subtotal'];?>
            </td>
            
             <td>
                <?php echo $sub_total_setelah_pajak;?>
            </td>
           
            <!-- <td> -->
                <!-- < echo $q['no_resi'];?> -->
            <!-- </!--> 
            <td>
              
                 <?php if($q['no_resi']==""){
                    ?>
<!--                    <a class="btn btn-warning"  href="#" data-toggle="modal" data-target="#order<?php echo $q['id_detail_order']?>">Validasi Pengiriman Order</a>-->
                   


                    <!-- Modal -->
                    <div class="modal fade" id="order<?php echo $q['id_detail_order']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        
                        <form class="form-horizontal" method="post" action="<?php echo base_url("penjual/order/validasi_pengiriman")?>" >
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Konfirmasi Pesanan</h4>
                          </div>
                          <div class="modal-body">
                                <div class="well"><strong>Pastikan data benar</strong></div>
                                
                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">ID Order</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly="readonly" class="form-control" name="id_order" value="<?php echo $q['id_order']?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">ID Penjual</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly="readonly" class="form-control" name="id_penjual" value="<?php echo $q['id_penjual']?>">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">ID Detail Order</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly="readonly" class="form-control" name="id_detail_order" value="<?php echo $q['id_detail_order']?>">
                                </div>
                              </div>
                                
                               <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">ID Produk</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly="readonly" class="form-control" name="id_produk" value="<?php echo $q['id_produk']?>">
                                </div>
                              </div>
                                
                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Produk</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly="readonly" class="form-control" name="jumlah_produk" value="<?php echo $q['jumlah_produk']?>">
                                </div>
                              </div>
                                
                                  <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Bayar setelah Pajak</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly="readonly" class="form-control" name="jumlah_bayar" value="<?php echo $sub_total_setelah_pajak?>">
                                </div>
                              </div>
                                
                              <!-- <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">No. Resi</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="resi" id="inputPassword3" placeholder="Nomor Resi">
                                </div>
                              </div> -->
                              
                              
                             
                            
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                          
                          </form>
                        </div>
                      </div>
                    </div>
                   
                    <?php ;} ?>
                </td>
            </tr>
        <?php endforeach; }?>
    </tbody>
</table>




	 <!-- Modal -->
                    <div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        
                        <form class="form-horizontal" method="post" action="<?php echo base_url("penjual/order/validasi_pengiriman_barang")?>" >
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Validasi Pengiriman</h4>
                          </div>
                          <div class="modal-body">
                                <div class="well"><strong>Pastikan anda telah mengirimkan barang dan mencatat resi pengiriman</strong></div>
                                
                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">ID Order</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly="readonly" class="form-control" name="id_order" value="<?php echo $id_order?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">ID Penjual</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly="readonly" class="form-control" name="id_penjual" value="<?php echo $id_penjual?>">
                                </div>
                              </div>

								
								<div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Ongkir yang di tentukan</label>
                                <div class="col-sm-10">
                                  <input type="text" readonly="readonly" class="form-control" name="ongkir" value="<?php echo $sum_ongkir; ?>">
                                </div>
                              </div>
                              
                               <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Pemasukan Setelah Pajak</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="total_pendapatan" id="inputPassword3" value="<?php echo $total_bayar?>" readonly="readonly">
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