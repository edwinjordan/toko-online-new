<div class="top-sellers" style="margin-bottom:80px;">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?= base_url('user/Home') ?>">Home</a></li>
            <li class="active">Konfirmasi Pembayaran</li>
        </ol>
        <?php
        if ($this->session->flashdata('msg')) {
            $msg = $this->session->flashdata('msg');
            echo $msg;
        }
        ?>
        <br>
        <h3>Konfirmasi Pembayaran</h3>
        <form action="<?= base_url() ?>user/order/search_order/" method="POST">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="form-group">
                        <input type="text" name="id_order" placeholder="Masukan Id Order" class="form-control text-center mb-invoice-2" required>
                        <button type="submit" class="btn btn-block btn-success">Cari</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
</div>