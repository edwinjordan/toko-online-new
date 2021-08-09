<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Cilinaya_model');
	}
	public function index()
	{
		if ($this->session->userdata("admin_username") != "") {
			// $d['order'] = $this->cilinaya_model->page_query("`order`")->result_array();
			$d['content'] = "produk/produk_view";
			$tema = $this->cilinaya_model->get_table('tema');
			$d['tema'] = $tema;
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


	function get_produk_data()
	{
		if ($this->session->userdata("admin_username") != "") {
			$data = $this->cilinaya_model->get_produk_data('produk');
			echo json_encode($data->result_array());
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
		}
	}


	function add()
	{
		if ($this->session->userdata("admin_username") != "") {
			$tema = $this->cilinaya_model->get_table('tema');
			$data = array(
				'tema' => $tema
			);
			$data['kategori'] = $this->cilinaya_model->get_table('kategori_produk');
			$data['content'] = "produk/produk_add";
			$this->load->view('dashboard', $data);
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
		}
	}
	function edit_produk($id)
	{
		if ($this->session->userdata("admin_username") != "") {
			$data['kategori'] = $this->cilinaya_model->get_table('kategori_produk');
			$data['edit_produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'");
			$data['content'] = "produk/produk_edit";
			$this->load->view('dashboard', $data);
			$this->load->model('cilinaya_model');
			$tema = $this->cilinaya_model->get_table('tema');
			$data = array(
				'tema' => $tema
			);
			$this->load->view('dashboard', $data);
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
		}
	}

	function set_pajak()
	{

		$this->Cilinaya_model->update_table('produk', array('pajak' => $this->input->post('pajak')), array('id_produk' => $this->input->post('id_produk')));
		$this->session->set_flashdata('item', ' <div class="alert alert-success" role="alert"><strong>Pajak Untuk Produk ' . $this->input->post('nama_produk_pajak') . ' Berhasil di simpan</strong></div>');

		//redirect to home page
		redirect(base_url('produk'));
	}

	function set_pajak_all()
	{
		$this->Cilinaya_model->update_table_all('produk', array('pajak' => $this->input->post('pajak_semua_produk')));
		$this->session->set_flashdata('item', ' <div class="alert alert-success" role="alert"><strong>Pajak Untuk Semua Produk Berhasil di Ubah</strong></div>');

		//redirect to home page
		redirect(base_url('produk'));
	}

	public function save()
	{
		if ($this->session->userdata("admin_username") != "") {
			$today = date("ymd"); //digunakan untuk menentukan format tanggal dan juga memanggil data tanggal saat ini.
			$query = $this->db->query("SELECT max(id_produk) AS last FROM produk WHERE id_produk LIKE '%$today%'");
			$data = $query->result_array();
			$last_id_order 		= $data[0]['last']; // mengambil id order yang terakhir
			$last_no_urut  		= substr($last_id_order, 6, 4); //memecah string yang ada di id order terakhir untuk membedakan tanggal dengan id yang di buat increment
			$next_no_urut  		= $last_no_urut + 1;
			$next_id_produk 	= $today . sprintf('%04s', $next_no_urut); //menentukan huruf 'T' disetiap awal transaksi, di ikuti dengan tanggal sekarang, kemudian nomer id
			// $kode_produk 		= $this->input->post('kode_produk');
			$nama 				= $this->input->post('nama_produk');
			$kategori_produk	= $this->input->post('kategori_produk');
			$harga				= $this->input->post('harga');
			$berat_kotor		= $this->input->post('berat_kotor');
			$berat_bersih 		= $this->input->post('berat_bersih');
			$deskripsi			= $this->input->post('deskripsi');
			$jumlah				= $this->input->post('jumlah');
			$stok				= $this->input->post('stok');


			if ($jumlah > 0) {
				$stok = 'Ada';
			} else {
				$stok = 'Kosong';
			}

			$data = array(
				'id_produk' => $next_id_produk,
				// 'kode_produk' => $kode_produk,
				'nama_produk' => $nama,
				'kategori_produk' => $kategori_produk,
				'harga' => $harga,
				'berat_kotor' => $berat_kotor,
				'berat_bersih' => $berat_bersih,
				'deskripsi' => $deskripsi,
				'foto_produk1' => '',
				'foto_produk2' => '',
				'foto_produk3' => '',
				'stok_produk' => $stok,
				'jumlah_stok' => $jumlah,
			);
			$data = $this->cilinaya_model->insert_table('produk', $data);

			if ($data) {
				if ($_FILES['foto1']['name'] == "") {
					$nama_foto1 = "";
				} else {
					$foto1 = $_FILES['foto1']['name'];
					$ext_foto1 = pathinfo($foto1, PATHINFO_EXTENSION);
					$nama_foto1 = 'foto_' . $next_id_produk . '_1.' . $ext_foto1;
					$config['upload_path'] = '../assets/img/produk_penjual/';
					$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
					$config['file_name'] = 'foto_' . $next_id_produk . '_1';
					$config['max_size'] = 5000;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('foto1');
				}
				if ($_FILES['foto2']['name'] == "") {
					$nama_foto2 = "";
				} else {
					$foto2 = $_FILES['foto2']['name'];
					$ext_foto2 = pathinfo($foto2, PATHINFO_EXTENSION);
					$nama_foto2 = 'foto_' . $next_id_produk . '_2.' . $ext_foto2;
					$config['upload_path'] = '../assets/img/produk_penjual/';
					$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
					$config['file_name'] = 'foto_' . $next_id_produk . '_2';
					$config['max_size'] = 5000;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('foto2');
				}

				if ($_FILES['foto3']['name'] == "") {
					$nama_foto3 = "";
				} else {
					$foto3 = $_FILES['foto3']['name'];
					$ext_foto3 = pathinfo($foto3, PATHINFO_EXTENSION);
					$nama_foto3 = 'foto_' . $next_id_produk . '_3.' . $ext_foto3;
					$config['upload_path'] = '../assets/img/produk_penjual/';
					$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
					$config['file_name'] = 'foto_' . $next_id_produk . '_3';
					$config['max_size'] = 5000;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('foto3');
				}

				$data_update = array(
					'foto_produk1' => $nama_foto1,
					'foto_produk2' => $nama_foto2,
					'foto_produk3' => $nama_foto3
				);


				$update = $this->cilinaya_model->update_table('produk', $data_update, array('id_produk' => $next_id_produk));
			}
			// $data['content'] = "produk/produk_view";
			// $this->load->view('dashboard', $data);
			// $this->load->model('cilinaya_model');
			$tema = $this->cilinaya_model->get_table('tema');
			$data = array(
				'tema' => $tema
			);
			$data['content'] = "produk/produk_view";
			$this->load->view('dashboard', $data);
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
		}
	}

	function edit()
	{
		if ($this->session->userdata("admin_username") != "") {
			$id_produk  	= $this->input->post('id_produk');
			$kode_produk  	= $this->input->post('kode_produk');
			$kategori 		= $this->input->post('kategori_produk');
			$nama 			= $this->input->post('nama_produk');
			$harga	    	= $this->input->post('harga');
			$berat_bersih	= $this->input->post('berat_bersih');
			$berat_kotor	= $this->input->post('berat_kotor');
			$deskripsi		= $this->input->post('deskripsi');
			$jumlah			= $this->input->post('jumlah');
			$stok			= $this->input->post('stok');

			$produk = $this->cilinaya_model->get_table_where('produk', array('id_produk' => $id_produk));
			for ($i = 1; $i < 4; $i++) {
				if ($_FILES['foto' . $i]['name'] != "") {
					if ($_FILES['foto' . $i]['name'] != $produk[0]['foto_produk' . $i]) {
						if ($produk[0]['foto_produk' . $i] != "default.PNG") {
							unlink('assets/img/produk_penjual/' . $produk[0]['foto_produk' . $i]);
						}
						// echo $_SERVER['DOCUMENT_ROOT'].'/toko_online/assets/img/produk_penjual/'.$produk[0]['foto_produk'.$i];

						$config['upload_path'] = '../assets/img/produk_penjual/';
						$config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
						$config['file_name'] = 'foto_' . $id_produk . '_' . $i;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						$this->upload->do_upload('foto' . $i);

						$foto = $_FILES['foto' . $i]['name'];
						$ext_foto = pathinfo($foto, PATHINFO_EXTENSION);
						$this->cilinaya_model->update_table('produk', array('foto_produk' . $i => 'foto_' . $id_produk . '_' . $i . '.' . $ext_foto), array('id_produk' => $id_produk));
					}
				}
			}

			$this->db->query("
			UPDATE produk SET 
			kode_produk     = '$kode_produk',
			kategori_produk = '$kategori',
			nama_produk    	= '$nama',
			harga	        = '$harga',
			berat_bersih	= '$berat_bersih',
			berat_kotor		= '$berat_kotor',
			deskripsi		= '$deskripsi',
			stok_produk	    = '$stok',
			jumlah_stok	    = '$jumlah'
			WHERE id_produk = '$id_produk'");
			redirect(base_url("produk"));
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
		}
	}

	function hapus($id)
	{
		if ($this->session->userdata("admin_username") != "") {
			$d['hapus_produk'] = $this->db->query("DELETE FROM produk WHERE id_produk='$id'");
			redirect(base_url("produk"));
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
		}
	}

	function foto($id)
	{
		if ($this->session->userdata("admin_username") != "") {
			$data['detail_produk'] 	= $this->db->query("SELECT * FROM produk WHERE id_produk='$id'");
			$data['foto_produk'] 	= $this->db->query("SELECT * FROM produk w, foto_produk fw WHERE fw.id_produk = w.id_produk AND w.id_produk='$id'");
			$data['id_produk'] 		= $id;
			$data['content'] 			= "produk/produk_foto";
			$this->load->model('cilinaya_model');
			$tema = $this->cilinaya_model->get_table('tema');
			$data = array(
				'tema' => $tema
			);
			$this->load->view('dashboard', $data);
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
		}
	}
	function foto_save()
	{
		if ($this->session->userdata("admin_username") != "") {
			$id			= $this->input->post("id");
			$namafile	= $id . "_" . time();
			$config['upload_path'] 	= '../img_foto/produk/';
			$config['allowed_types']	= 'jpg|jpeg|png|bmp';
			$config['max_size']		= '2000';
			$config['file_name'] 		= $namafile . ".jpg";
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

	function foto_hapus()
	{
		if ($this->session->userdata("admin_username") != "") {
			$id 				= $this->input->post("id");
			$id_produk 	= $this->input->post("id_produk");
			$namafile 		= $this->input->post("foto_produk");
			$d['hapus_produk'] = $this->db->query("DELETE FROM foto_produk WHERE id_foto_produk='$id'");

			$path = realpath(APPPATH . '../img_foto/produk');
			$hapus =  $path . "/" . $namafile;

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

	function aa()
	{
		$d = $this->db->query("SELECT id_order, SUM(subtotal) as total FROM detail_order group by id_order")->result_array();
		foreach ($d as $key) {
			$this->db->query('UPDATE `order` SET total_order=' . $key['total'] . ' WHERE id_order=\'' . $key['id_order'] . '\'');
		}
	}

	function validasi($id)
	{
		if ($this->session->userdata("admin_username") != "") {
			$this->cilinaya_model->update_table('produk', array('validasi' => 1), array('id_produk' => $id));
			redirect('produk');
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $desk . '"; 
				</script>';
		}
	}
}
