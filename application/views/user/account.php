 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="<?php echo base_url() ?>assets/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">

            <?php echo $this->session->flashdata('item'); ?>
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <form action="<?php echo base_url() ?>user/home/login" method="POST" class="aa-login-form">
                  <label for="">Username or Email address<span>*</span></label>
                   <input type="text" name="username" placeholder="Username or email">
                   <label for="">Password<span>*</span></label>
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit" class="aa-browse-btn">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 <form action="<?php echo base_url() ?>user/home/register" method="POST" class="aa-login-form">
                    <label for="">Username<span>*</span></label>
                    <input type="text" name="username" placeholder="Username" required="">
                    <label for="">Email address<span>*</span></label>
                    <input type="text" name="email" placeholder="email" required="">
                    <label for="">Nama Lengkap<span>*</span></label>
                    <input type="text" name="nama" placeholder="nama lengkap" required="">
                    <label for="">Password<span>*</span></label>
                    <input type="password" name="password" placeholder="Password" required="">
                    <label for="">Provinsi<span>*</span></label>
                    <select class="form-control" name="desprovince" id="desprovince"  required >
                          <option> -- Pilih Provinsi -- </option>
                    </select>
                    <label for="">Kota<span>*</span></label>
                   <select class="form-control" name="descity" id="descity" required >
                          <option>-- Pilih Kota --</option>
                    </select>



                     <label for="">No Rekening<span>*</span></label>
                    <input type="text" name="no_rek_user" placeholder="No Rekening" required="">


                       <label for="">Nama Pemilik Rekening<span>*</span></label>
                    <input type="text" name="nama_rek_user" placeholder="Nama Pemilik Rekening" required="">

                       <label for="">Bank<span>*</span></label>
                    <input type="text" name="bank_rek_user" placeholder="Bank" required="">

                    <input type="hidden" name="provinsi" id='provinsi'>
                    <input type="hidden" name="kota" id='kota'>
                    <button type="submit" class="aa-browse-btn">Register</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

  <!-- footer -->  
  <footer id="aa-footer">
  
    <!-- footer-bottom -->
    

<script type = "text/javascript">

$(document).ready(function(){
  loadProvinsi('#desprovince');
  $('#desprovince').change(function(){
    $('#descity').show();
    var idprovince = $('#desprovince').val();
    loadCity(idprovince,'#descity');
    $('#provinsi').val(getSelectedText('desprovince'));
  });
});

$('#descity').change(function(){
    $('#kota').val(getSelectedText('descity'));
  });
  
function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);

    if (elt.selectedIndex == -1)
        return null;
  var  selected = elt.options[elt.selectedIndex].text;
    return selected;
}


function loadProvinsi(id){

  $.ajax({
    url: '<?php echo base_url("user/ongkir/showprovince");?>',
    dataType:'json',
    success:function(response){
      $(id).html('');
      province = '';
        province = '<option> -- Pilih Provinsi-- </option>';
        province = province + '';
        $(id).append(province);
        
        $.each(response['rajaongkir']['results'], function(i,n){
          province = '<option value="'+n['province_id']+'">'+n['province']+'</option>';
          province = province + '';
          $(id).append(province);
        });
    },
    error:function(){
      alert('ERROR ! Check your internet connection');
      //$(id).html('ERROR');
    }
  });
}

function loadCity(idprovince,id){
  $.ajax({
    url: '<?php echo base_url("user/ongkir/showcity/");?>'+'/'+idprovince,
    dataType:'json',
    data:{province:idprovince},
    success:function(response){
      $(id).html('');
      city = '';

        city = '<option >-- Pilih Kota --</option>';
        city = city + '';
        $(id).append(city);
        $.each(response['rajaongkir']['results'], function(i,n){
          city = '<option value="'+n['city_id']+'">'+n['city_name']+'</option>';
          city = city + '';
          $(id).append(city);
        });
    },
    error:function(){
      $(id).html('ERROR');
    }
  });
}






</script>