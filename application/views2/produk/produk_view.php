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
                <h2 style="margin-top:0px">produk</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
               <?php echo anchor(base_url('penjual/produk/add'), 'Tambah produk', 'class="btn btn-primary"'); ?>
           </div>
       </div>
       <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
              <th>NO</th>
              <th>ID Produk</th>
              <th>Kode Produk</th>
              <th>Nama Produk</th>
              <th>Kategori Produk</th>
              <!-- <th width="25%">Deskripsi</th> -->
              <th>Harga</th>
              <!-- <th>Kategori</th> -->
              <th>Berat</th>
              <th>Deskripsi</th>
              <th>Status</th>
              <th>Jumlah</th>
              <th>Foto</th>
              <th>Validasi</th>
              <th><center>Aksi</center></th>
          </tr>
          <?php $i = 1; ?>
          <?php foreach ($tabel as $t): ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $t['id_produk'] ?></td>
              <td><?php echo $t['kode_produk'] ?></td>
              <td><?php echo $t['nama_produk'] ?></td>
              <td><?php echo $t['nama_kategori_produk'] ?></td>
              <td><?php echo $t['harga'] ?></td>
              <td><?php echo $t['berat'] ?></td>
              <td><?php echo $t['deskripsi'] ?></td>
              <td><?php echo $t['stok_produk'] ?></td>
              <td><?php echo $t['jumlah_stok'] ?></td>
              <td><?php echo $t['foto_produk1'] ?></td>
              <td>
              <?php 
                if($t['validasi'] == 1){
                 echo "Tervalidasi";
                }
                else{
                  echo "Belum Tervalidasi";
                }
               ?>
              </td>
              <td><a href="<?php echo base_url('penjual/produk/edit_produk/' . $t['id_produk']) ?>" class="btn btn-warning">edit</a>
          <a href="<?php echo base_url('penjual/produk/hapus/' . $t['id_produk'])  ?> " class="btn btn-danger">hapus</a></td>
            </tr>
          <?php $i++;endforeach ?>
      </thead>
  </table>
  <script src="<?php echo base_url('assets/data_table/assets/js/jquery-1.11.2.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/data_table/assets/datatables/jquery.dataTables.js') ?>"></script>
  <script src="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.js') ?>"></script>
 <!--  <script type="text/javascript">
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
            "ajax": "<?php echo site_url('produk/ajax_tabel'); ?>",
            "columns": [
            {
                "data": null,
                "class": "text-center",
                "orderable": false
            },         
                      //  {"data": ""},   
                      {"data": "id_produk"},
                      {"data": "kode_produk"},      
                      {"data": "nama_produk"},
                      {"data": "kategori_produk"},
                      {"data": "harga"},
                      {"data": "berat"},
                      {"data": "deskripsi"},
                      {"data": "stok"},
                      {"data": "jumlah"},

                       // {"data": "stok"},
                       
                       {
                        "class": "text-center",
                        "data": "foto"

                    },

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
</script>    -->
</body>
</html>