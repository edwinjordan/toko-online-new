<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <center><img src="<?php echo base_url('assets/img/loader.gif'); ?>"></center>
    </div>
  </div>
</div>

<div class="modal bs-example-modal-sm" id="loading" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <center>
    <div class="modal-dialog modal-sm" role="document" style="margin-top: 17%;     ">
      <div class="modal-content" style="width: 42%;">
        <img src="<?php echo base_url('assets/img/loader.gif'); ?>">
        <p>Loading</p>
      </div>
    </div>
  </center>
</div>


<!-- catg header banner section -->
<section id="aa-catg-head-banner">
  <img src="<?php echo base_url() ?>assets/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
  <div class="aa-catg-head-banner-area">
    <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Checkout</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- / catg header banner section -->

<!-- Cart view section -->
<section id="checkout">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="checkout-area">
          <form name="form_checkout" id="form_checkout" action="<?php echo base_url() ?>user/order/simpan" method="POST">

            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">


                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">

                                <input type="text" name="fullname" placeholder="Full Name*" required>
                              </div>
                            </div>
                            <!-- <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Last Name*">
                              </div>
                            </div> -->
                          </div>
                          <!--  <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Company name">
                              </div>                             
                            </div>                            
                          </div> -->
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" name="email" placeholder="Email Address*" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" name="phone" placeholder="Phone*" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3" name="address" placeholder="Address*" required></textarea>
                              </div>
                            </div>
                          </div>
                          <input type="hidden" name="desprovince" value="1">

                          <input type="hidden" name="descity" value="1">
                          <input type="hidden" name="kodepos" value="1">
                          <!-- desprovince, descity, kodepos                                                         -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">

                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $subtotal = 0;
                        $berat = 0;
                        foreach ($cart as $c) {
                          $subtotal = $subtotal + $c['subtotal_belanja'];
                          $berat = $berat + $c['berat'];

                        ?>
                          <tr>
                            <td><?php echo $c['nama_produk'] ?><strong> x <?php echo $c['jumlah_produk'] ?></strong>
                              <p><?= $c['tgl_berangkat'] ?> - <?= $c['tgl_pulang'] ?></p>
                            </td>
                            <td>Rp. <?php echo $c['subtotal_belanja'] ?></td>
                          </tr>

                        <?php } ?>
                      </tbody>

                      <tfoot>
                        <tr>
                          <th>Total Belanja</th>
                          <td>Rp. <?php echo $subtotal ?></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="aa-payment-method">
                    <input type="hidden" name="provinsi" id='provinsi'>
                    <input type="hidden" name="kota" id='kota'>
                    <input type="hidden" name="id_jadwal" value="<?= $cart[0]['id_jadwal'] ?>">
                    <input type="hidden" name="berat" id="berat" value="<?php echo $berat ?>">
                    <input type="hidden" name="totalsimpan" id='totalsimpan' value="<?php echo $subtotal ?>">
                    <!--  <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">     -->
                    <input type="submit" value="Place Orderrrrrrrrrrrr" class="aa-browse-btn">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Cart view section -->

<script type="text/javascript">
  function confirm_check() {
    var data = true;
    <?php foreach ($penjual as $p) { ?>

      console.log($("#jenis_layanan_ongkir<?php echo $p[0]['id_user'] ?>").val());
      if ($("#jenis_layanan_ongkir<?php echo $p[0]['id_user'] ?>").val() == "") {
        data = false;
      }

    <?php  } ?>

    if (data) {

      return true;
    } else {
      alert("Harap Lengkapi data yang di sediakan");
      return false;
    }


  }
  $(document).ready(function() {
    loadProvinsi('#desprovince');
    $('#desprovince').change(function() {
      $('#descity').show();
      var idprovince = $('#desprovince').val();
      loadCity(idprovince, '#descity');
      $('#provinsi').val(getSelectedText('desprovince'));
    });
  });

  $('#descity').change(function() {
    $('#kota').val(getSelectedText('descity'));
  });

  function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);

    if (elt.selectedIndex == -1)
      return null;
    var selected = elt.options[elt.selectedIndex].text;
    return selected;
  }


  function loadProvinsi(id) {

    $.ajax({
      url: '<?php echo base_url("user/ongkir/showprovince"); ?>',
      dataType: 'json',
      success: function(response) {
        $(id).html('');
        province = '';
        province = '<option> -- Pilih Provinsi-- </option>';
        province = province + '';
        $(id).append(province);

        $.each(response['rajaongkir']['results'], function(i, n) {
          province = '<option value="' + n['province_id'] + '">' + n['province'] + '</option>';
          province = province + '';
          $(id).append(province);
        });
      },
      error: function() {
        alert('ERROR ! Check your internet connection');
        //$(id).html('ERROR');
      }
    });
  }

  function loadCity(idprovince, id) {
    $.ajax({
      url: '<?php echo base_url("user/ongkir/showcity/"); ?>' + '/' + idprovince,
      dataType: 'json',
      data: {
        province: idprovince
      },
      success: function(response) {
        $(id).html('');
        city = '';

        city = '<option >-- Pilih Kota --</option>';
        city = city + '';
        $(id).append(city);
        $.each(response['rajaongkir']['results'], function(i, n) {
          city = '<option value="' + n['city_id'] + '">' + n['city_name'] + '</option>';
          city = city + '';
          $(id).append(city);
        });
      },
      error: function() {
        $(id).html('ERROR');
      }
    });
  }

  function cekHarga(trigger) {
    var origin = $('#oricity' + trigger).val();
    var destination = $('#descity').val();
    var weight = $('#berat' + trigger).val();
    var courier = $('#service' + trigger).val();
    var pelapak = $('#pelapak').val();

    var jenis_layanan = $("#jenis_layanan_ongkir" + trigger);

    jenis_layanan.val("");

    $("#loading").modal('show');

    console.log('<?php echo base_url("user/ongkir/cost"); ?>' + '?origin=' + origin + '?destination=' + destination + '?weight=' + weight + '?courier=' + courier + '?trigger=' + trigger);
    //var jenis_layanan=$("#jenis_layanan_ongkir"+trigger);
    $.ajax({
      url: '<?php echo base_url("user/ongkir/cost"); ?>' + '?origin=' + origin + '?destination=' + destination + '?weight=' + weight + '?courier=' + courier + '?trigger=' + trigger,
      data: {
        origin: origin,
        destination: destination,
        weight: weight,
        courier: courier,
        trigger: trigger
      },
      success: function(response) {
        $('#resultsbox' + trigger).html(response);
        $("#loading").modal('hide');


      },
      error: function() {
        //$('#resultsbox'+trigger).html('ERROR');
        $("#loading").modal('hide');
      }
    });
  }


  function pilihOngkir(id_penjual, kurir) {
    var jenis_layanan = $("#jenis_layanan_ongkir" + id_penjual);
    var radios = document.getElementsByName('tarif');
    var tarif, totaltarif;
    var total = <?php echo $subtotal ?>;
    var totalberat = <?php echo $berat; ?>;
    for (var i = 0, length = radios.length; i < length; i++) {
      if (radios[i].checked) {
        tarif = radios[i].value;
        totaltarif = parseInt(tarif);
        total = parseInt(total) + parseInt(totaltarif);
        $('#ongkoskirim' + id_penjual).html('');
        // $('#totalakhir').html('');
        $('#ongkoskirim' + id_penjual).html("Rp. " + totaltarif);
        $('#ongkos_penjual' + id_penjual).html("Rp. " + totaltarif);
        $('#ongkos_penjual' + id_penjual).val(totaltarif);
        //      $('#totalsimpan').val(total);
        //      $('#totalsimpan').val(total);
        //      $('#totalsimpan').val(total);
        $('#ongkos').val(totaltarif);

        jenis_layanan.val("");
        jenis_layanan.val(kurir);
        // $('#totalakhir').html("Rp. "+total);
        // for (var prop in obj) {
        //      $('#totalakhir').html("Rp. "+total);
        // }
      }
    }
  }


  function format1(n, currency) {
    return currency + " " + n.toFixed(2).replace(/./g, function(c, i, a) {
      return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    });
  }
</script>