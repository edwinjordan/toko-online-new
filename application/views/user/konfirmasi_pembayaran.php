  <?php
  if ($this->session->flashdata('msg')) {
    $msg = $this->session->flashdata('msg');
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }?>

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Masukkan Id Order Anda </h3>
            
            <form action="<?php echo base_url() ?>user/order/search_order" method="POST" class="aa-subscribe-form">
              <input type="text" name="id_order" id="" placeholder="Id Ordermu" style="width:100%">
              <input type="submit" value="Search">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->