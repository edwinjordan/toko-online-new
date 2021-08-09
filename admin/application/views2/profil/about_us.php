<?php echo $this->session->flashdata('item'); ?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsepanduan" aria-expanded="true" aria-controls="collapseOne">
          Panduan
        </a>
      </h4>
    </div>
    <div id="collapsepanduan" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <form action="<?php echo base_url('profil/update_panduan/1') ?>" method="POST">
          <textarea name='panduan' class="ckeditor" style='width: 800px; height: 350px;'><?php echo $data3[0]->panduan ?></textarea>
          <br>
          <button type="submit" class="btn btn-primary" style="float:right;">Save</button>
        </form>
      </div>
    </div>
  </div>
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            About Us
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <form action="<?php echo base_url('profil/update_konten/1') ?>" method="POST">
            <textarea name='deskripsi' class="ckeditor" style='width: 800px; height: 350px;'><?php echo $data1[0]->tentang ?></textarea>
            <br>
            <button type="submit" class="btn btn-primary" style="float:right;">Save</button>
          </form>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Aturan Umum
          </a>
        </h4>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <form action="<?php echo base_url('profil/update_aturan/1') ?>" method="POST">
            <textarea name='aturan' class="ckeditor" style='width: 800px; height: 350px;'><?php echo $data2[0]->aturan ?></textarea>
            <br>
            <button type="submit" class="btn btn-primary" style="float:right;">Save</button>
          </form>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Contact
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <form class="form-horizontal" method="post" action="<?php echo base_url('profil/update_contact') ?>">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">No Telp</label>
              <div class="col-sm-10">
                <input type="number" name="telp" class="form-control" required="" id="inputEmail3" placeholder="No Telp" value="<?php echo $data[0]['no_telp'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <textarea name="alamat" class="form-control" required=""><?php echo $data[0]['alamat'] ?></textarea>

              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" required="" placeholder="Email" value="<?php echo $data[0]['Email'] ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>