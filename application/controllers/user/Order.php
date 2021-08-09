<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		// $this->load->model('dropdown');
		$this->load->model('toko_online_model');
		date_default_timezone_set("Asia/Jakarta");
		//         $data = $this->db->query("SHOW VARIABLES WHERE VARIABLE_NAME = 'event_scheduler'")->result_array();
		// 	    if ($data[0]['value'] = 'OFF') {
		// 			$this->db->query("SET GLOBAL event_scheduler = ON");
		// 		}
	}

	public function index()
	{
		echo "order_index";
	}

	public function konfirmasi_checkout()
	{

		// $pembeli = array(
		// 	'fullname'	=> $this->input->post('fullname'),
		// 	'email'		=> $this->input->post('email'),
		// 	'phone'		=> $this->input->post('phone'),
		// 	'address'	=> $this->input->post('kodepos'),
		// 	'provinsi'	=> $this->input->post('provinsi'),
		// 	'kota'		=> $this->input->post('kota')

		// 	);
		// $penjual = $this->toko_online_model->get_penjual_cart(array('keranjang_belanja.id_keranjang_belanja'=> $_SERVER['REMOTE_ADDR']));
		// $angka = 0;
		// foreach ($penjual as $p) {
		// 	$data_penjual[$angka] = $this->toko_online_model->get_table_where('user', array('id_user' => $p['id_user']));
		// 	$data_penjual[$angka]['ongkos_penjual'.$p['id_user']] = $this->input->post('ongkos_penjual'.$p['id_user']);
		// 	$data_penjual[$angka]['produk'] = $this->toko_online_model->get_produk_penjual_cart(array('keranjang_belanja.id_keranjang_belanja' =>  $_SERVER['REMOTE_ADDR'], 'produk.id_user' => $p['id_user']));
		// 	// print_r($data_penjual[$angka]['produk']);
		// 	// echo "<br><br><br>";

		// 	$angka++;
		// }
		// $data['pembeli'] = $pembeli;
		// $data['content'] = 'user/konfirmasi_checkout';
		// $data['data_penjual'] = $data_penjual;
		// $this->load->view('user/dashboard', $data);


	}

	public function simpan()
	{
		$event_id_max = 1000000000; //Menentukan nilai maksimal dari event id
		$get_event_id = $this->toko_online_model->get_table('tb_event'); //Mengambil event id
		$event_id = $get_event_id[0]['value'];
		$next_event_id = $event_id + 1;

		$today = date("ymd"); //digunakan untuk menentukan format tanggal dan juga memanggil data tanggal saat ini.
		$query = $this->db->query("SELECT max(id_order) AS last FROM `order` WHERE id_order LIKE '%$today%'");
		$data = $query->result_array();
		$last_id_order = $data[0]['last'];

		$last_no_urut  	= substr($last_id_order, 7, 3); //memecah string yang ada di id order terakhir untuk membedakan tanggal dengan id yang di buat increment
		$next_no_urut  	= $last_no_urut + 1;
		$next_id_order 	= "T" . $today . sprintf('%03s', $next_no_urut); //menentukan huruf 'T' disetiap awal transaksi, di ikuti dengan tanggal sekarang, kemudian nomer id
		$nama 			= $this->input->post('nama_lengkap');
		$phone 			= $this->input->post('no_hp');
		$provinsi 		= $this->input->post('nama_provinsi');
		$kota 			= $this->input->post('nama_kota');
		$alamat 		= $this->input->post('alamat_lengkap');
		$kurir 			= $this->input->post('kurir');
		$paket_kirim 	= $this->input->post('paket_kirim');
		$total 			= $this->input->post('total_harga');
		$jumlah 		= $this->input->post('total_jumlah');
		$ongkir			= $this->input->post('ongkir');
		$lama_kirim 	= $this->input->post('lama_kirim');
		$email			= $this->input->post('email');

		// $ongkir = $this->input->post('ongkir');

		// if ($kurir = 1 && $ongkir == 0) {
		// 	$total += 10000;
		// }

		$data_insert = array(
			'id_order'		=> $next_id_order,
			'tgl_order'		=> date("Y-m-d H-i-s"),
			'total_order'	=> $total,
			'jumlah_order'  => $jumlah,
			'status_order'	=> 1,
			'nama_order'	=> $nama,
			'tlp_order'		=> $phone,
			'provinsi'      => $provinsi,
			'kota'			=> $kota,
			'alamat_order'	=> $alamat,
			'kurir'  		=> $kurir,
			'paket_kirim'	=> $paket_kirim,
			'ongkir'		=> $ongkir,
			'lama_kirim'	=> $lama_kirim,
			'email_order'	=> $email
		);
		$insert_order = $this->toko_online_model->insert_table('order', $data_insert);
		if ($insert_order) {
			$data2 = $this->toko_online_model->get_table_where('order', array('id_order' => $next_id_order));
			foreach ($data2 as $key) {
				$total = $key['total_order'] + $key['ongkir'];
			}
			$dt2['total_order'] = $total;
			$this->toko_online_model->update_table('order', $dt2, array('id_order' => $next_id_order));

			$data_order = $this->toko_online_model->get_keranjang_belanja(array('keranjang_belanja.id_keranjang_belanja' => $this->session->userdata('acak')));
			foreach ($data_order as $d) {
				$where = array(
					'id_order' 		=> $next_id_order,
					'id_penjual'	=> $d['id_user'],
					'id_produk'		=> $d['id_produk']
				);
				$cek_data = $this->toko_online_model->get_table_where('detail_order', $where);
				if ($cek_data == null) {
					$data_produk = $this->toko_online_model->get_table_where('produk', array('id_produk' => $d['id_produk']));

					$data = array(
						'id_order'		=> $next_id_order,
						'id_penjual' 	=> $d['id_user'],
						'id_produk'		=> $d['id_produk'],
						'jumlah_produk'	=> $d['jumlah_produk'],
						'berat_produk'	=> $d['jumlah_produk'] * $d['berat_kotor'],
						'harga'			=> $d['harga_produk'],
						'subtotal'		=> $d['subtotal_belanja'],
					);
					$insert_data = $this->toko_online_model->insert_table('detail_order', $data);
					if ($insert_data) {
						$penjual = $this->toko_online_model->get_penjual_cart(array('keranjang_belanja.id_keranjang_belanja' => $this->session->userdata('random')));
						foreach ($penjual as $p) {
							$data = array(
								'id_order'		=> $next_id_order,
								'id_penjual'	=> $p['id_user'],
								'jasa_pengiriman' =>	'0'
							);
						}
						$data_ongkir = $this->toko_online_model->get_table_where("ongkir_pembeli", array('id_order' => $next_id_order));
						foreach ($data_ongkir as $key) {
							$total_ongkir = $key['ongkir'];
						}

						$where = array('id_keranjang_belanja' => $this->session->userdata('acak'));
						$delete_keranjang = $this->toko_online_model->delete_table('keranjang_belanja', $where);
					} else {
						$berhasil = 0;
					}
				}
			}

			redirect(base_url('user/order/konfirmasi_bayar/' . $next_id_order));
		} else {
			echo "Gagal, terjadi kesalahan";
		}
	}

	public function konfirmasi_pembayaran()
	{

		$data['content'] = 'user/konfirmasi_pembayaran1';
		$this->load->view('user/dashboard1', $data);
	}

	public function search_order()
	{
		$id_order = $this->input->post('id_order');
		$data_penjual = array();
		$angka = 0;
		$penjual = $this->toko_online_model->get_penjual_order(array('id_order' => $id_order));
		$data_order = $this->toko_online_model->get_table_where('order', array('id_order' => $id_order));
		$transaksi = $this->toko_online_model->get_table_where('transaksi_midtrans', array('id_order' => $id_order));
		if ($data_order != null || $penjual != null) {
			$timestamp = strtotime($data_order[0]['tgl_order']);
			if (time() - $timestamp > 90 * 60) {
				if (($data_order[0]['status_bayar']) == 1) {
					foreach ($penjual as $p) {
						$data_penjual[$angka] = $this->toko_online_model->get_order(array('id_order' => $id_order, 'id_penjual' => $p['id_penjual']));
						$angka++;
					}
					$data['data_penjual'] = $data_penjual;
					if ($data_order[0]['status_order'] == 1) {
						$data['status_order'] = "Belum melakukan pembayaran, Silahkan lakukan pembayaran";
					} elseif ($data_order[0]['status_order'] == 2) {
						$data['status_order'] = "Menunggu pengiriman, silahkan tunggu selama 2x24 jam";
					} elseif ($data_order[0]['status_order'] == 3) {
						$data['status_order'] = "Menunggu pengiriman, silahkan tunggu selama 2x24 jam";
					} elseif ($data_order[0]['status_order'] == 4) {
						$data['status_order'] = "Pesanan telah dikirim";
					} elseif ($data_order[0]['status_order'] == 5) {
						$data['status_order'] = "Pesanan telah diterima pembeli, terima kasih";
					}

					$data['content'] = 'user/form_konfirmasi_pembayaran1';
					$data['data_order'] = $data_order;
					$data['transaksi'] = $transaksi;
					$data['data_bank'] = $this->toko_online_model->get_table('data_bank');
					$this->load->view('user/dashboard1', $data);
				} else {
					$this->session->set_flashdata(
						'msg',
						'<div class="alert alert-danger text-center" role="alert">
							Waktu pembayaran sudah terlewat. Silahkan lakukan order lagi
						</div>'
					);
					$data['content'] = 'user/konfirmasi_pembayaran1';
					$this->load->view('user/dashboard1', $data);
				}
			} else {
				foreach ($penjual as $p) {
					$data_penjual[$angka] = $this->toko_online_model->get_order(array('id_order' => $id_order, 'id_penjual' => $p['id_penjual']));
					$angka++;
				}
				$data['data_penjual'] = $data_penjual;
				if ($data_order[0]['status_order'] == 1) {
					$data['status_order'] = "Belum melakukan pembayaran, Silahkan lakukan pembayaran";
				} elseif ($data_order[0]['status_order'] == 2) {
					$data['status_order'] = "Menunggu pengiriman, silahkan tunggu selama 2x24 jam";
				} elseif ($data_order[0]['status_order'] == 3) {
					$data['status_order'] = "Menunggu pengiriman, silahkan tunggu selama 2x24 jam";
				} elseif ($data_order[0]['status_order'] == 4) {
					$data['status_order'] = "Pesanan telah dikirim";
				} elseif ($data_order[0]['status_order'] == 5) {
					$data['status_order'] = "Pesanan telah diterima pembeli, terima kasih";
				}

				$data['content'] = 'user/form_konfirmasi_pembayaran1';
				$data['data_order'] = $data_order;
				$data['transaksi'] = $transaksi;
				$data['data_bank'] = $this->toko_online_model->get_table('data_bank');
				$this->load->view('user/dashboard1', $data);
			}
		} elseif ($id_order == null) {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-warning text-center" role="alert">
					Masukkan ID Order
				</div>'
			);
			$data['content'] = 'user/konfirmasi_pembayaran1';
			$this->load->view('user/dashboard1', $data);
		} else {
			$this->session->set_flashdata(
				'msg',
				'<div class="alert alert-danger text-center" role="alert">
					Id order yang anda masukan salah
				</div>'
			);
			$data['content'] = 'user/konfirmasi_pembayaran1';
			$this->load->view('user/dashboard1', $data);
		}
	}

	function konfirmasi_bayar($next_id_order = null)
	{
		$data['order'] = $this->toko_online_model->get_table_where('order', array('id_order' => $next_id_order));
		$data['detail_order'] = $this->toko_online_model->get_table_join_where('detail_order', 'produk', 'detail_order.id_produk = produk.id_produk', array('id_order' => $next_id_order));
		$data['bank'] = $this->db->query("select * from data_bank")->result_array();
		$data['content'] = "user/create_id_order1";
		$data['id_order'] = $next_id_order;
		$this->load->view('user/dashboard1', $data);
	}

	public function form_konfirmasi_pembayaran()
	{
		$id_order 		= $this->input->post('id_order');
		$tanggal_order 	= $this->input->post('tanggal_transfer');
		$nama_pemilik	= $this->input->post('nama_rekening');
		$no_rekening	= $this->input->post('no_rekening');
		$bank			= $this->input->post('bank_transfer');
		$total_transfer	= $this->input->post('total_transfer');

		$data_insert = array(
			'tgl_konfirmasi'	=> $tanggal_order,
			'id_order'			=> $id_order,
			'jumlah_bayar'		=> $total_transfer,
			'bank_bayar'		=> $bank,
			'rekening_bayar'	=> $no_rekening,
			'nama_bayar'		=> $nama_pemilik,
			'foto'				=> ''
		);

		$insert_konfirmasi_bayar = $this->toko_online_model->insert_table('konfirmasi_bayar', $data_insert);
		if ($insert_konfirmasi_bayar) {

			$image = $_FILES['bukti']['name'];
			$ext_img = pathinfo($image, PATHINFO_EXTENSION);
			$nama_img = 'transfer_' . $id_order . '_' . $ext_img;
			$config['upload_path'] = './assets/img/bukti_transfer/';
			$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
			$config['file_name'] = 'bukti_' . $nama_img;
			$config['max_size'] = 5000;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('bukti');
			$data_gambar = $this->upload->data();

			$data = array(
				'status_order' => 2,
			);
			$where = array('id_order' => $id_order);

			$update_status_order = $this->toko_online_model->update_table('order', $data, $where);
			$updt = $this->toko_online_model->update_table('konfirmasi_bayar', array('foto' => $data_gambar['file_name']), $where, $data);

			redirect('user/order/konfirmasi_pembayaran');
		} else {
			echo "<script>
				alert('Maaf, ada kesalahan pengisian Formulir');
				window.history.go(-1);

				</script>";
		}
	}

	public function konfirmasi_barang($id)
	{
		echo "order terkonfirmasi";
		$data = $this->toko_online_model->update_table('order', array('status_order' => 5, 'status_bayar' => 1), array('id_order' => $id));
		$this->toko_online_model->update_table('detail_order', array('pembayaran' => 1), array('id_order' => $id));
		echo json_encode($data);
	}

	public function komplain_barang($id_detail_order = null)
	{

		$data_order = $this->toko_online_model->get_table_where('detail_order', array('id_detail_order' => $id_detail_order));
		$user = $this->toko_online_model->get_table_where('user', array('id_user' => $data_order[0]['id_penjual']));
		$order = $this->toko_online_model->get_table_where('order', array('id_order' => $data_order[0]['id_order']));
		$produk = $this->toko_online_model->get_table_where('produk', array('id_produk' => $data_order[0]['id_produk']));
		$data_komplain = $this->toko_online_model->get_table_where('komplain_barang', array('id_detail_order' => $id_detail_order));
		// $id_detail_order= $this->input->post('id_detail_order');
		// $data_detail_order = $this->toko_online_model->get_order(array('id_detail_order' => $id_detail_order));
		// $data_order= $this->toko_online_model->get_table_where('order', array('id_order' => $data_detail_order[0]['id_order']));
		// $data_penjual = $this->toko_online_model->get_table_where('user', array('id_user' => $data_detail_order[0]['id_penjual']));


		$data = array(
			'data_order' => $data_order,
			'user'		=>	$user,
			'order'		=> $order,
			'produk'	=>	$produk,
			'komplain_barang' =>	$data_komplain
		);

		$data['content'] = 'user/komplain_barang1';
		$this->load->view('user/dashboard1', $data);
	}

	public function simpan_komplain_barang()
	{
		$id_detail_order = $this->input->post('id_detail_order');
		$id_penjual = $this->input->post('id_penjual');
		$pesan_komplain = $this->input->post('pesan_komplain');

		$jenis_komplain = $this->input->post('jenis_komplain');

		$jumlah_produk_komplain = $this->input->post('jumlah_produk_komplain');

		$data_insert = array(
			'id_detail_order'		=> $id_detail_order,
			'id_penjual'			=> $id_penjual,
			'pesan_komplain'		=> $pesan_komplain,
			'bukti_komplain'		=> '',
			'jumlah_produk_komplain' =>	$jumlah_produk_komplain,
			'jenis_komplain'		=>	$jenis_komplain,
			'tgl_komplain'			=>	date("Y-m-d")
		);

		$insert = $this->toko_online_model->insert_table('komplain_barang', $data_insert);
		if ($insert) {

			$foto1 = $_FILES['foto1']['name'];
			$ext_foto1 = pathinfo($foto1, PATHINFO_EXTENSION);
			$nama_foto_bukti = 'bukti_' . $id_detail_order . '_' . $ext_foto1;
			$config['upload_path'] = './assets/img/bukti_komplain/';
			$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
			$config['file_name'] = 'foto_' . $nama_foto_bukti;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload('foto1');
			$data_gambar = $this->upload->data();

			$where = array(
				'id_detail_order'		=> $id_detail_order,
				'id_penjual'			=> $id_penjual
			);
			$update = $this->toko_online_model->update_table('komplain_barang', array('bukti_komplain' =>  $data_gambar['file_name']), $where);


			$dtl = $this->toko_online_model->update_table('detail_order', array('status_detail_komplain' =>  1), array('detail_order.id_detail_order' => $id_detail_order));

			// $update_status_order = $this->toko_online_model->update_table('order',array('status_order' => 5) , array('id_order' => $id_order));
			// $update_status_pengiriman = $this->toko_online_model->update_table('detail_order',array('status_kirim' => 2) , array('id_order' => $id_order, 'id_penjual' => $id_penjual));
			// $cek_status_kirim = $this->toko_online_model->get_table_where('detail_order' , array('id_order' => $id_order , 'status_kirim' => 1));
			// if($cek_status_kirim == null){
			// 	 $update_status_order = $this->toko_online_model->update_table('order',array('status_order' => 5) , array('id_order' => $id_order));
			// }
		}
		$detail_order = $this->toko_online_model->get_order(array('detail_order.id_detail_order' => $id_detail_order));
		$get_penjual = $this->toko_online_model->get_table_where('user', array('id_user' => $id_penjual));
		$data = array(
			'id_order'		=> $detail_order[0]['id_order'],
			'detail_order'	=> $detail_order
		);

		$data['content'] = 'user/konfirmasi_pembayaran1';
		$this->load->view('user/dashboard1', $data);
	}

	public function refund_uang()
	{
		$id_detail_order = $this->input->post('id_detail_order');
		$data_detail_order = $this->toko_online_model->get_order(array('id_detail_order' => $id_detail_order));
		$data_order = $this->toko_online_model->get_table_where('order', array('id_order' => $data_detail_order[0]['id_order']));
		$data_penjual = $this->toko_online_model->get_table_where('user', array('id_user' => $data_detail_order[0]['id_penjual']));


		$data = array(
			'produk'			=> $data_detail_order,
			'data_order'		=> $data_order,
			'penjual'			=> $data_penjual
		);
		$data['content'] = 'user/refund_uang';
		$this->load->view('user/dashboard', $data);
	}

	public function simpan_refund_uang()
	{
		$id_detail_order	= $this->input->post('id_detail_order');
		$no_rekening		= $this->input->post('no_rekening');
		$atm				= $this->input->post('atm');
		$nama_penerima		= $this->input->post('nama_penerima');

		$data_insert = array(
			'id_detail_order'	=> $id_detail_order,
			'no_rekening'		=> $no_rekening,
			'ATM'				=> $atm,
			'nama_penerima'		=> $nama_penerima
		);

		$insert = $this->toko_online_model->insert_table('data_refund', $data_insert);
		if ($insert) {
			$this->toko_online_model->update_table('detail_order', array('status_kirim' => 3), array('id_detail_order' => $id_detail_order));
		}

		$data_order = $this->toko_online_model->get_order(array('id_detail_order' => $id_detail_order));
		$data = array(
			'no_rekening'	=> $no_rekening,
			'atm'			=> $atm,
			'nama_penerima'	=> $nama_penerima,
			'data_order'	=> $data_order,
			'content'		=> 'user/refund',
			'id_order'		=> $data_order[0]['id_order']
		);

		$this->load->view('user/dashboard', $data);
	}


	function konfirmasi_pengembalian_barang()
	{
		$data_insert = array(
			'id_komplain_barang'	=>	$this->input->post('id_komplain'),
			'id_detail_order'	=>	$this->input->post('id_detail_order'),
			'id_order'	=>	$this->input->post('id_order'),
			'no_rek' => $this->input->post('no_rek'),
			'jenis_bank' => $this->input->post('jenis_bank'),
			'nama_rek' => $this->input->post('nama_rek')

		);
		$insert = $this->toko_online_model->insert_table('konfirmasi_pengembalian_produk', $data_insert);
		$this->toko_online_model->update_table('komplain_barang', array('status_komplain' => "Disetujui dan Dalam Proses Pengiriman"), array('id_detail_order' => $this->input->post('id_detail_order')));

		redirect(base_url('user/order/komplain_barang/' . $this->input->post('id_detail_order')));
	}
}
