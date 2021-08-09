<?php echo $this->session->flashdata('item'); ?>

<div class="panel-group" id="accordionTema" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordionTema" href="#collapseTema" aria-expanded="true" aria-controls="collapseOne">
                    Tema
                </a>
            </h4>
        </div>
        <div id="collapseTema" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead><br>
                    <tbody>
                        <?php
                        foreach ($tema as $key) { ?>
                            <tr>
                                <td>
                                    <strong>
                                        <?php
                                        if ($key['nama_tema'] == 'skin-blue') {
                                            echo 'Light';
                                        } else {
                                            echo 'Dark';
                                        }
                                        ?>
                                    </strong><br>
                                    <?php if ($key['nama_tema'] == 'skin-blue') {
                                        $gbr1 = "light1.png";
                                        $gbr2 = "light2.png";
                                    } else {
                                        $gbr1 = "dark1.png";
                                        $gbr2 = "dark2.png";
                                    }
                                    ?>
                                    <div>
                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/<?= $gbr1 ?>" alt="img" width=50px height=50px>
                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/<?= $gbr2 ?>" alt="img" width=50px height=50px>
                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/teks.png" alt="img" width=50px height=50px>
                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/warna1.png" alt="img" width=50px height=50px>
                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/warna2.png" alt="img" width=50px height=50px>
                                    </div></br>

                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="...">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ganti_tema<?php echo $i ?>">Ganti Tema</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="ganti_tema<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="<?php echo base_url('tema/edit_tema') ?>">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Ganti Tema</h4>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" required="" class="form-control" name="id_tema" value="<?php echo $key['id_tema'] ?>">
                                                <div class="form-group ">
                                                    <label for="editJam">Tema</label>
                                                    <p><input type='radio' name='nama_tema' value='skin-blue' <?php if ($key['nama_tema'] == 'skin-blue') echo 'checked' ?> /> Light</p>
                                                    <div>
                                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/light1.png" alt="img" width=50px height=50px>
                                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/light2.png" alt="img" width=50px height=50px>
                                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/teks.png" alt="img" width=50px height=50px>
                                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/warna1.png" alt="img" width=50px height=50px>
                                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/warna2.png" alt="img" width=50px height=50px>
                                                    </div></br>
                                                    <img src="<?= dirname(base_url()) ?>/assets/img/light_background.png" alt="img" width=auto height=200px><br><br>
                                                    <p><input type='radio' name='nama_tema' value='skin-black' <?php if ($key['nama_tema'] == 'skin-black') echo 'checked' ?> /> Dark</p>
                                                    <div>
                                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/dark1.png" alt="img" width=50px height=50px>
                                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/dark2.png" alt="img" width=50px height=50px>
                                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/teks.png" alt="img" width=50px height=50px>
                                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/warna1.png" alt="img" width=50px height=50px>
                                                        <img style="border:1px solid #f1f2f7; border-radius:15%;" src="<?= base_url() ?>../assets/img/warna2.png" alt="img" width=50px height=50px>
                                                    </div></br>
                                                    <img src="<?= dirname(base_url()) ?>/assets/img/dark_background.png" alt="img" width=auto height=200px>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Ganti Tema</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>