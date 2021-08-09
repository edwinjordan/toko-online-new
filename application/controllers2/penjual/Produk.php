<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('toko_online_model');
    }

    public function index() {
        if ($this->session->userdata("logged_in") == TRUE) {
            $id = $this->session->userdata("user_id");
            $where = array('produk.id_user' => $id);
            $on = "produk.kategori_produk = kategori_produk.id_kategori_produk";

            // $d['order'] = $this->cilinaya_model->page_query("`order`")->result_array();
            $d['content'] = "produk/produk_view";
            $d['tabel'] = $this->toko_online_model->get_table_join_where('produk', 'kategori_produk', $on, $where);
            $this->load->view('penjual/dashboard', $d);
            //$this->load->view('order/order_view');
        } else {
            $desk = base_url("user/home");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
        }
    }

    public function ajax_tabel() {

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
//            panggil dulu library datatablesnya

            $this->load->library('datatables_ssp');

//            atur nama tablenya disini
            $table = 'produk';

            // Table's primary key
            $primaryKey = 'id_produk';

            // Array of database columns which should be read and sent back to DataTables.
            // The `db` parameter represents the column name in the database, while the `dt`
            // parameter represents the DataTables column identifier. In this case simple
            // indexes

            $columns = array(
                array('db' => 'id_produk', 'dt' => 'id_produk'),
                array('db' => 'kode_produk', 'dt' => 'kode_produk'),
                array('db' => 'nama_produk', 'dt' => 'nama_produk'),
                array('db' => 'kategori_produk', 'dt' => 'kategori_produk'),
                array('db' => 'harga', 'dt' => 'harga'),
                array('db' => 'berat', 'dt' => 'berat'),
                array('db' => 'deskripsi', 'dt' => 'deskripsi'),
                array('db' => 'stok_produk', 'dt' => 'stok'),
                array('db' => 'jumlah_stok', 'dt' => 'jumlah'),
                array(
                    'db' => 'id_produk',
                    'dt' => 'foto',
                    'formatter' => function( $d ) {
                        return '<a href="' . site_url('produk/foto/' . $d) . '" class="btn btn-success">foto</a> ';
                    }
                ),
                array(
                    'db' => 'id_produk',
                    'dt' => 'aksi',
                    'formatter' => function( $d ) {
                        return '<a href="' . site_url('penjual/produk/edit_produk/' . $d) . '" class="btn btn-warning">edit</a>
					<a href="' . site_url('produk/hapus/' . $d) . '" class="btn btn-danger">hapus</a>  ';
                    }
                ),
            );
            // SQL server connection information
            $CI = & get_instance();
            $CI->load->database();
            $host = $CI->db->hostname;
            $user = $CI->db->username;
            $pass = $CI->db->password;
            $db = $CI->db->database;
            /////////////////////
            $sql_details = array(
                'user' => $user,
                'pass' => $pass,
                'db' => $db,
                'host' => $host
            );

            $data = Datatables_ssp::simple($_GET, $sql_details, $table, $primaryKey, $columns);
            echo json_encode($data);
        }
    }

    function add() {
        if ($this->session->userdata("logged_in") == TRUE) {
            $d['content'] = "produk/produk_add";
            $d['kategori'] = $this->toko_online_model->get_table('kategori_produk');
            $this->load->view('penjual/dashboard', $d);
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
        }
    }

    function edit_produk($id) {
        if ($this->session->userdata("logged_in") == TRUE) {
            $d['edit_produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'");
            $d['content'] = "produk/produk_edit";
            $d['kategori'] = $this->toko_online_model->get_table('kategori_produk');
            $this->load->view('penjual/dashboard', $d);
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
        }
    }

    function save() {
        if ($this->session->userdata("logged_in") == TRUE) {
            $today = date("ymd"); //digunakan untuk menentukan format tanggal dan juga memanggil data tanggal saat ini.

            $query = $this->db->query("SELECT max(id_produk) AS last FROM produk WHERE id_produk LIKE '%$today%'");
            $data = $query->result_array();
            $last_id_order = $data[0]['last']; // mengambil id order yang terakhir

            $last_no_urut = substr($last_id_order, 6, 4); //memecah string yang ada di id order terakhir untuk membedakan tanggal dengan id yang di buat increment
            $next_no_urut = $last_no_urut + 1;
            $next_id_produk = $today . sprintf('%04s', $next_no_urut); //menentukan huruf 'T' disetiap awal transaksi, di ikuti dengan tanggal sekarang, kemudian nomer id	
            $id_user = $this->session->userdata("user_id");
            $kode_produk = $this->input->post('kode_produk');
            $nama = $this->input->post('nama_produk');
            $kategori_produk = $this->input->post('kategori_produk');
            $harga = $this->input->post('harga');
            $berat = $this->input->post('berat');
            $deskripsi = $this->input->post('deskripsi');
            $jumlah = $this->input->post('jumlah');
            $stok = $this->input->post('stok');


            $id_menu = $this->toko_online_model->get_table_where('kategori_produk', array('id_kategori_produk' => $kategori_produk));
            if ($jumlah > 0) {
                $stok = 'Ada';
            } else {
                $stok = 'Kosong';
            }

            if (is_numeric($harga) AND is_numeric($berat)) {
                $data_insert = array(
                    'id_produk' => $next_id_produk,
                    'id_user' => $id_user,
                    'kode_produk' => $kode_produk,
                    'nama_produk' => $nama,
                    'id_menu' => $id_menu[0]['id_menu'],
                    'kategori_produk' => $kategori_produk,
                    'harga' => $harga,
                    'berat' => $berat,
                    'deskripsi' => $deskripsi,
                    'foto_produk1' => '',
                    'foto_produk2' => '',
                    'foto_produk3' => '',
                    'stok_produk' => $stok,
                    'jumlah_stok' => $jumlah
                );
                $insert = $this->toko_online_model->insert_table('produk', $data_insert);
                if ($insert) {
                    if ($_FILES['foto1']['name'] == "") {
                        $nama_foto1 = "default.PNG";
                    } else {
                        $foto1 = $_FILES['foto1']['name'];
                        $ext_foto1 = pathinfo($foto1, PATHINFO_EXTENSION);
                        $nama_foto1 = 'foto_' . $next_id_produk . '_1.' . $ext_foto1;
                        $config['upload_path'] = './assets/img/produk_penjual/';
                        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
                        $config['file_name'] = 'foto_' . $next_id_produk . '_1';
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('foto1');
                    }
                    if ($_FILES['foto2']['name'] == "") {
                        $nama_foto2 = "default.PNG";
                    } else {
                        $foto2 = $_FILES['foto2']['name'];
                        $ext_foto2 = pathinfo($foto2, PATHINFO_EXTENSION);
                        $nama_foto2 = 'foto_' . $next_id_produk . '_2.' . $ext_foto2;
                        $config['upload_path'] = './assets/img/produk_penjual/';
                        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
                        $config['file_name'] = 'foto_' . $next_id_produk . '_2';
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('foto2');
                    }

                    if ($_FILES['foto3']['name'] == "") {
                        $nama_foto3 = "default.PNG";
                    } else {
                        $foto3 = $_FILES['foto3']['name'];
                        $ext_foto3 = pathinfo($foto3, PATHINFO_EXTENSION);
                        $nama_foto3 = 'foto_' . $next_id_produk . '_3.' . $ext_foto3;
                        $config['upload_path'] = './assets/img/produk_penjual/';
                        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
                        $config['file_name'] = 'foto_' . $next_id_produk . '_3';
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('foto3');
                    }

                    $data_update = array(
                        'foto_produk1' => $nama_foto1,
                        'foto_produk2' => $nama_foto2,
                        'foto_produk3' => $nama_foto3
                    );
                    $update = $this->toko_online_model->update_table('produk', $data_update, array('id_produk' => $next_id_produk));
                }
                //redirect(base_url("produk"));
                // var_dump($today);
                // var_dump($hasil);
                // var_dump($data);
                // var_dump($last_no_urut);
                // var_dump($next_no_urut);
                // var_dump($next_id_produk);
                redirect('penjual/produk');
            } else {
                $d['content'] = "produk/produk_add_error";
                $this->load->view('penjual/dashboard', $d);
            }
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
        }
    }

    function edit() {
        if ($this->session->userdata("logged_in") == TRUE) {
            $id_produk = $this->input->post('id_produk');
            $kode_produk = $this->input->post('kode_produk');
            $nama = $this->input->post('nama_produk');
            $kategori_produk = $this->input->post('kategori_produk');
            $harga = $this->input->post('harga');
            $berat = $this->input->post('berat');
            $deskripsi = $this->input->post('deskripsi');
            $jumlah = $this->input->post('jumlah');
            $stok = $this->input->post('stok');

            $produk = $this->toko_online_model->get_table_where('produk', array('id_produk' => $id_produk));

            for ($i = 1; $i < 4; $i++) {
                if ($_FILES['foto' . $i]['name'] != "") {
                    if ($_FILES['foto' . $i]['name'] != $produk[0]['foto_produk' . $i]) {
                        if ($produk[0]['foto_produk' . $i] != "default.PNG") {
                            unlink('assets/img/produk_penjual/' . $produk[0]['foto_produk' . $i]);
                        }
                        // echo $_SERVER['DOCUMENT_ROOT'].'/toko_online/assets/img/produk_penjual/'.$produk[0]['foto_produk'.$i];

                        $config['upload_path'] = './assets/img/produk_penjual/';
                        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
                        $config['file_name'] = 'foto_' . $id_produk . '_' . $i;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('foto' . $i);

                        $foto = $_FILES['foto' . $i]['name'];
                        $ext_foto = pathinfo($foto, PATHINFO_EXTENSION);
                        $this->toko_online_model->update_table('produk', array('foto_produk' . $i => 'foto_' . $id_produk . '_' . $i . '.' . $ext_foto), array('id_produk' => $id_produk));
                    }
                }
            }

            if ($jumlah > 0) {
                $stok = 'Ada';
            } else {
                $stok = 'Kosong';
            }
            $this->db->query("
			UPDATE produk SET 
			kode_produk         = '$kode_produk',
			nama_produk      	= '$nama',
			kategori_produk 	= '$kategori_produk',
			harga		  	    = $harga,
			berat				= $berat,
			deskripsi			= '$deskripsi',
			stok_produk	    = '$stok',
			jumlah_stok	    = '$jumlah'
			WHERE id_produk = '$id_produk'");
            redirect(base_url("penjual/produk"));
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
        }
    }

    function hapus($id) {
        if ($this->session->userdata("logged_in") == TRUE) {
            $data = $this->toko_online_model->get_table_where('produk', array('id_produk' => $id));
            for ($i = 1; $i < 4; $i++) {
                if ($data[0]['foto_produk' . $i] != "default.PNG") {
                    unlink('assets/img/produk_penjual/' . $data[0]['foto_produk' . $i]);
                }
            }
            $d['hapus_produk'] = $this->toko_online_model->delete_table('produk', array('id_produk' => $id));
            redirect(base_url("penjual/produk"));
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
        }
    }

    function foto($id) {
        if ($this->session->userdata("logged_in") == TRUE) {
            $d['detail_produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'");
            $d['foto_produk'] = $this->db->query("SELECT * FROM produk w, foto_produk fw WHERE fw.id_produk = w.id_produk AND w.id_produk='$id'");
            $d['id_produk'] = $id;
            $d['content'] = "produk/produk_foto";
            $this->load->view('dashboard', $d);
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
        }
    }

    function foto_save() {
        if ($this->session->userdata("logged_in") == TRUE) {
            $id = $this->input->post("id");
            $namafile = $id . "_" . time();
            $config['upload_path'] = '../img_foto/produk/';
            $config['allowed_types'] = 'jpg|jpeg|png|bmp';
            $config['max_size'] = '2000';
            $config['file_name'] = $namafile . ".jpg";
            $foto = $config['file_name'];

            $this->upload->initialize($config);

            if (!$this->upload->do_upload()) {
                echo $this->upload->display_errors();
                die;
            } else {
                $this->db->query("INSERT INTO foto_produk(id_produk, foto_produk) VALUES ('$id', '$foto') ");
                redirect(base_url("produk/foto/$id"));
            }
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
        }
    }

    function foto_hapus() {
        if ($this->session->userdata("logged_in") == TRUE) {
            $id = $this->input->post("id");
            $id_produk = $this->input->post("id_produk");
            $namafile = $this->input->post("foto_produk");
            $d['hapus_produk'] = $this->db->query("DELETE FROM foto_produk WHERE id_foto_produk='$id'");

            $path = realpath(APPPATH . '../img_foto/produk');
            $hapus = $path . "/" . $namafile;

            unlink($hapus);
            redirect(base_url("produk/foto/$id_produk"));
        } else {
            $desk = base_url("");
            $msg = "Maaf Anda Belum Login.";
            echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
        }
    }

    function aa() {
        $d = $this->db->query("SELECT id_order, SUM(subtotal) as total FROM detail_order group by id_order")->result_array();
        foreach ($d as $key) {
            $this->db->query('UPDATE `order` SET total_order=' . $key['total'] . ' WHERE id_order=\'' . $key['id_order'] . '\'');
        }
    }

}
