    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <h2 style="margin-top:0px">User</h2>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px" id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <!-- <?php echo anchor(site_url('users/add'), 'Tambah User', 'class="btn btn-primary"'); ?> -->
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover" id="mytable">
        <thead>
            <tr>
                <!-- <th>NO</th> -->
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
            </tr>
            <?php
            $no = 0;
            foreach ($user as $usr) : $no++ ?>
                <tr>
                    <!-- <td><?= $no ?></td> -->
                    <td>
                        <?= $usr['admin_username'] ?>
                    </td>
                    <td>
                        <?= $usr['admin_password'] ?>
                    </td>
                    <td>
                        <a href="<?= base_url('user/edit_user/' . $usr['id_admin']) ?>" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </thead>
    </table>