 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="<?php echo base_url() ?>assets/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Konfirmasi Pembayaran</h2>
        <!-- <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Wishlist</li>
        </ol> -->
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
      <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
              <div id="content">
                <h3 ><b>ID Order: <?php echo $id_order ?></b></h3>
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    <b > Ditagihkan Kepada: </b>
                    <address>
                      Atas Nama: <?php echo $order[0]['nama_order']; ?>
                      <br>Alamat: <?php echo $order[0]['alamat_order']; ?>                                          
                      <br>Phone: <?php echo $order[0]['tlp_order']; ?>
                      <br>Email: <?php echo $order[0]['email_order']; ?>
                    </address>
                  </div>
                </div>
                <p><b>Berikut merupakan detail order<b></p>
                <table class="table table-striped">
                  <thead>
                      <tr>
                        <th>Nama Produk</th>
                        <th>Jumlah Produk</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($detail_order as $key){ ?>
                      <tr>
                        <td><strong><?php echo $key['nama_produk'] ?></strong></td>
                        <td><?php echo $key['jumlah_produk'] ?></td>
                        <td><?php echo $key['subtotal'] ?></td>
                      </tr>                
                      <?php } ?>
                      <tr>
                        <td>&nbsp;</th>
                        <td><b>Jumlah Tagihan<b></td>
                        <td ><?php echo $order[0]['grand_total_order']; ?></td>
                      </tr>         
                    </tbody>
                </table>
                <h3> Silahkan Melakukan pembayaran ke salah satu  rekening yang tersedia berikut ini:</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Jenis Bank</th>
                      <th>No Rekening</th>
                      <th>Atas nama</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($bank as $key){?>
                    <tr>
                      <td><strong><?php echo $key['jenis_bank'] ?></strong></td>
                      <td><?php echo $key['no_rekening'] ?></td>
                      <td><?php echo $key['atas_nama_bank'] ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <p  ><span style="color: red">*</span> Setelah Melakukan pembayaran silahkan konfirmasikan ke menu konfirmasi order</p>
              </div>
              <div id="editor"></div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 

<!-- <button id="cmd">generate PDF</button> -->
 <script src="<?php echo base_url('assets/pdfjs/dist/jspdf.debug.js') ?>"></script>
  <script src="<?php echo base_url('assets/pdfjs/libs/html2pdf.js') ?>"></script>
  <script>


var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};


    doc.fromHTML($('#content').html(), 15, 15);
    doc.save('Blonjobu-Order-<?php echo $id_order ?>.pdf');






    
        var pdf = new jsPDF('p', 'pt', 'letter');

        pageHeight= pdf.internal.pageSize.height;

        // Before adding new content
        y = 500 // Height position of new content
        if (y >= pageHeight)
        {
          pdf.addPage();
          y = 0 // Restart height position
        }
      

        
        var canvas = pdf.canvas;
   
        // var width = 400;
        html2pdf(document.getElementById("print"), pdf, function(pdf) {
              
                pdf.save('Test.pdf');

               //var div = pdfument.createElement('pre');
               //div.innerText=pdf.output();
               //pdfument.body.appendChild(div);
            }
        );


        //window.location = "http://www.facebook.com";
    </script>
   
 <!-- / Cart view section



