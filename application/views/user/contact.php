<div class="top-sellers" style="margin-bottom:80px;">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('user/Home') ?>">Home</a></li>
            <li class="active">About</li>
        </ol>
        <div class="row">
            <div class="text-left">
                <p style="font-size: 21px;"> <?php echo $data; ?></p>
                <div>
                    <?php
                    $kontak_footer = $this->toko_online_model->get_table('konten');
                    ?>
                    <h3>Contact Us</h3>
                    <div class="text-center">
                        <p> <?php echo $kontak_footer[0]['alamat'] ?></p>
                        <p><span class="fas fa-phone"></span><?php echo $kontak_footer[0]['no_telp'] ?></p>
                        <p><span class="fas fa-envelope"></span><?php echo $kontak_footer[0]['Email'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>