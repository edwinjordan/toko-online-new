<!doctype html>
<html>

<head>
  <title>harviacode.com - codeigniter crud generator</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/data_table/assets/bootstrap/css/bootstrap.min.css') ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.css') ?>" />
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap-table/dist/bootstrap-table.min.css') ?>">
  <!-- Latest compiled and minified Locales -->
  <script src="<?= base_url('assets/bootstrap-table/dist/bootstrap-table.min.js') ?>"></script>
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
      <h2 style="margin-top:0px">Produk</h2>
    </div>
    <div class="col-md-4 text-center">
      <div style="margin-top: 4px" id="message">
        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
      </div>
    </div>
    <div class="col-md-4 text-right">
      <?php echo anchor(site_url('produk/add'), 'Tambah produk', 'class="btn btn-primary"'); ?>
    </div>
  </div>
  <!-- Button trigger modal -->
  <!-- <button type="hidden" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
    Setting Pajak Untuk Semua Produk
  </button> -->

  <!-- Modal -->
  <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="form-horizontal" method="post" action="<?php echo base_url('produk/set_pajak_all') ?>">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Setting Pajak</h4>
          </div>
          <div class="modal-body">
            <div class="well">Perhatian!! Dengan mengatur pajak pada menu ini, maka semua pajak pada produk akan diubah</div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Prosentasi Pajak</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="pajak_semua_produk" name="pajak_semua_produk" placeholder="Pajak">
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
  </div> -->

  <table class="table table-bordered table-striped table-hover" data-toggle="table" data-url="<?php echo site_url('produk/get_produk_data'); ?>" data-search="true" data-show-refresh="true" data-show-toggle="true" data-pagination="true">
    <thead>
      <tr>
        <th data-formatter="number_counter">No</th>
        <th data-field="id_produk" data-sort-order="DESC">ID Produk</th>
        <!-- <th data-field="kode_produk">Kode Produk</th> -->
        <th data-field="nama_produk">Nama Produk</th>
        <th data-field="nama_kategori_produk">Kategori Produk</th>
        <th data-field="harga">Harga</th>
        <th data-field="berat_bersih">Berat Bersih</th>
        <th data-field="berat_kotor">Berat Kotor</th>
        <th data-field="deskripsi">Deskripsi</th>
        <th data-field="jumlah_stok">Stok</th>
        <th class="text-center" data-field="id_produk | nama_produk" data-formatter="action_produk" data-width="150">Opsi</th>
      </tr>
    </thead>
  </table>
  <!-- Modal -->
  <!-- <div class="modal fade" id="modal_pajak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="post" action="<?php echo base_url('produk/set_pajak') ?>">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Penentuan Pajak</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id_produk" id="id_produk_pajak" value="">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Produk</label>
              <input type="text" class="form-control" id="nama_produk_pajak" name="nama_produk_pajak" readonly="readonly" value="">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Prosentasi Pajak</label>
              <input type="text" class="form-control" id="pajak" name="pajak" required="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div> -->


  <script src="<?php echo base_url('assets/data_table/assets/js/jquery-1.11.2.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/data_table/assets/datatables/jquery.dataTables.js') ?>"></script>
  <script src="<?php echo base_url('assets/data_table/assets/datatables/dataTables.bootstrap.js') ?>"></script>

  <script type="text/javascript">
    function number_counter(value, row, index) {
      return index + 1;
    }

    function action_produk(value, row, index) {
      var hapus = "<?= base_url("produk/hapus/") ?>/" + row.id_produk;
      var edit = "<?= base_url("produk/edit_produk/") ?>/" + row.id_produk;
      return '<div class="btn-group" role="group" aria-label="..."> <a href="' + hapus + '" class="btn btn-danger">Hapus</a>  <a href="' + edit + '" class="btn btn-success">Edit</div>'
    }

    function set_modal(id_produk, nama_produk) {
      console.log('<button onclick="set_modal(\'' + id_produk + '\',\'' + nama_produk + '\')" class="btn btn-warning" >');

      $("#id_produk_pajak").val(id_produk);
      $("#nama_produk_pajak").val(nama_produk);
      $("#modal_pajak").modal('show');
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function() {

      $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
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
        "columns": [{
            "data": null,
            "class": "text-center",
            "orderable": false
          },
          //  {"data": ""},   
          {
            "data": "id_produk"
          },
          {
            "data": "nama_produk"
          },
          {
            "data": "kode_produk"
          },
          {
            "data": "nama_kategori_produk"
          },
          {
            "data": "harga"
          },
          {
            "data": "berat"
          },
          {
            "data": "deskripsi"
          },
          {
            "data": "stok"
          },
          {
            "data": "jumlah"
          },
          {
            "class": "text-center",
            "data": "foto"
          },
          {
            "class": "text-center",
            "data": "aksi"
          }
          // {
          //  "class": "text-center",
          //  "data": "hapus"
          // }
        ],
        "order": [
          [1, 'asc']
        ],
        "rowCallback": function(row, data, iDisplayIndex) {
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