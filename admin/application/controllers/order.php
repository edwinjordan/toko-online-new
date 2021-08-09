<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cilinaya_model');
	}
	public function index()
	{
		if ($this->session->userdata("admin_username") != "") {
			$data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$d['order'] = $this->cilinaya_model->get_special_limit('order', $data['page'], 17);
			$d['pagination'] = $this->pagination();
			$d['content'] = "order/order_view";
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

	function get_data_detail_ongkir($id_order = null)
	{
		$data = $this->db->query("SELECT * from ongkir_pembeli where id_order='$id_order'")->result_array();
		echo json_encode($data);
	}

	function get_data_order()
	{
		if ($this->session->userdata("admin_username") != "") {
			$data = $this->cilinaya_model->get_table_desc("order", "id_order");
			echo json_encode($data);
		} else {
			redirect(base_url());
		}
	}

	function get_order_dikirim()
	{
		if ($this->session->userdata("admin_username") != "") {
			$data = $this->db->query("SELECT * FROM detail_order d, produk p, detail_pengiriman dp,`order`  WHERE d.no_resi!='' AND d.id_produk = p.id_produk AND dp.id_detail_order=d.id_detail_order AND `order`.id_order=d.id_order order by d.id_order DESC")->result_array();
			echo json_encode($data);
		} else {
			redirect(base_url());
		}
	}

	public function page()
	{
		if ($this->session->userdata("admin_username") != "") {
			$data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$d['order'] = $this->cilinaya_model->get_special_limit('order', $data['page'], 10);
			$d['pagination'] = $this->pagination();
			$d['content'] = "order/order_view";
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

	function pagination()
	{
		$this->load->library('pagination');
		$config = array();
		$config["base_url"] = base_url('order/page');
		$config["total_rows"] = $this->cilinaya_model->get_table_rows('order');
		$config["per_page"] = 10;
		$config['uri_segment'] = 5;

		//pagination customization using bootstrap styles
		$config['full_tag_open'] = '<div class="pagination pagination-centered"><ul class="page_test">'; // I added class name 'page_test' to used later for jQuery
		$config['full_tag_close'] = '</ul></div><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		return $this->pagination->create_links();
	}

	/*public function ajax_tabel()
	 {

	 if (!$this->input->is_ajax_request()) {
		exit('No direct script access allowed');
		} else {
		//            panggil dulu library datatablesnya

		$this->load->library('datatables_ssp');

		//            atur nama tablenya disini
		$table = 'order';

		// Table's primary key
		$primaryKey = 'id_order';

		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes

		$columns = array(
		array('db' => 'id_order', 'dt' => 'DT_RowId'),
		array('db' => 'tgl_order', 'dt' => 'tgl_order'),
		array('db' => 'total_order', 'dt' => 'total_order'),
		array('db' => 'status_order', 'dt' => 'status_order'),
		array('db' => 'nama_order', 'dt' => 'nama_order'),
		array('db' => 'alamat_order', 'dt' => 'alamat_order'),
		array('db' => 'tlp_order', 'dt' => 'tlp_order'),
		array('db' => 'kode_pos_order', 'dt' => 'kode_pos_order'),
		array('db' => 'provinsi_order', 'dt' => 'provinsi_order'),
		array('db' => 'ongkir_order', 'dt' => 'ongkir_order'),
		array(
		'db' => 'id_order',
		'dt' => 'aksi',
		'formatter' => function( $d ) {
		return '<a href="' . site_url('order/detail/' . $d) . '" class="btn btn-success">Detail Order</a><br><a href="' . site_url('order/hapus/' . $d) . '" class="btn btn-danger">Hapus Order</a> ';
		}
		),
		);

		// SQL server connection information
		$CI =& get_instance();
		$CI->load->database();
		$host=$CI->db->hostname;
		$user=$CI->db->username;
		$pass=$CI->db->password;
		$db=$CI->db->database;
		/////////////////////
		$sql_details = array(
		'user' => $user,
		'pass' => $pass,
		'db' => $db,
		'host' => $host
		);

		$data = Datatables_ssp::complex($_GET, $sql_details, $table, $primaryKey, $columns,null, "`id_order` LIKE 'T%' OR `id_order` LIKE 'P%'");
		echo json_encode($data);
		}
		}*/


	function add()
	{
		if ($this->session->userdata("admin_username") != "") {
			$d['content'] = "order/order_add";
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
	function edit_order($id)
	{
		if ($this->session->userdata("admin_username") != "") {
			$d['edit_order'] = $this->db->query("SELECT * FROM order WHERE id_order='$id'");
			$d['content'] = "order/order_edit";
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

	public function kirim($id)
	{
		if ($this->session->userdata("admin_username") != "") {
			//$detail_order= $this->toko_online_model->get_table_where("detail_order",array('id_detail_order'=>  $this->input->post("id_detail_order")));
			//print_r($this->input->post());

			$data_update_detail = array(
				'no_resi' => $this->input->post("resi"),
				'status_kirim' => 1
			);
			$this->cilinaya_model->update_table("detail_order", $data_update_detail, array('id_order' => $id));

			$get_id_order = $this->cilinaya_model->get_table_where('detail_order', array('id_order' => $id));
			foreach ($get_id_order as $order) {
				$id_detail_prngiriman = $order['id_detail_order'];
				$update_detail_pengiriman = $this->cilinaya_model->update_table('detail_pengiriman', array('tanggal_kirim' => date("Y-m-d")), array('id_detail_order' => $id_detail_prngiriman));
			}
			// var_dump($id_detail_prngiriman);die;
			// var_dump($get_id_order);die;

			$cek_status_kirim_all = $this->cilinaya_model->get_table_where('detail_order', array('id_order' => $get_id_order[0]['id_order'], 'status_kirim' => 0));
			if ($cek_status_kirim_all == null) {
				$this->cilinaya_model->update_table('order', array('status_order' => 4), array('id_order' => $get_id_order[0]['id_order']));
			}

			// $this->toko_online_model->update_table('detail_pengiriman', array('status'), $where);

			$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert">Pengiriman barang telah tervalidasi</div>');

			//            $produk= $this->toko_online_model->get_table_where("produk",array('id_produk'=>  $this->input->post("id_produk")));
			//
			//            var_dump($produk);
			//
			//
			//            $data_stok=$produk[0]['jumlah_stok']-$this->input->post("jumlah_produk");
			//            $data_update_produk = array(
			//                'jumlah_stok' => $data_stok
			//            );
			//
			//            $data_update_produk['jumlah_terjual']=$produk[0]['jumlah_terjual']+$this->input->post("jumlah_produk");
			//            if ($data_stok==0){
			//                $data_update_produk['stok_produk']='Kosong';
			//            }
			//
			//            $this->toko_online_model->update_table("produk", $data_update_produk, array('id_produk' => $this->input->post("id_produk")));

			//redirect to order list
			redirect(base_url("order"));
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
				alert("' . $msg . '"); 
				location.href = "' . $desk . '"; 
			</script>';
		}
	}

	function konfirmasi()
	{
		if ($this->session->userdata("admin_username") != "") {
			$id 	= $this->input->post('id_order');
			$nama 	= $this->input->post('nama_bayar');
			$tgl		= $this->input->post('tgl_bayar');
			$bank 	= $this->input->post('nama_bank');
			$total	= $this->input->post('total_bayar');
			$rek		= $this->input->post('rek_bayar');
			// $this->db->query("
			// INSERT INTO konfirmasi_bayar(id_order, tgl_konfirmasi, jumlah_bayar, bank_bayar, rekening_bayar, nama_bayar)
			// VALUES('$id','$tgl', '$total', '$bank','$rek','$nama')");

			$this->db->query("UPDATE `order` SET status_order = '3' WHERE id_order = '$id'");
			$detail_order = $this->cilinaya_model->get_table_where('detail_order', array('id_order' => $id));
			$today = date("Y-m-d");
			foreach ($detail_order as $detail) {
				$data_insert = array(
					'id_detail_order'		=> $detail['id_detail_order'],
					'tanggal_konfirmasi'	=> $today,
					'status_kadaluarsa'		=> 0
				);
				$this->cilinaya_model->insert_table('detail_pengiriman', $data_insert);
			}

			// echo $today;
			$detail_order = $this->db->query("SELECT * from detail_order where id_order='$id'");
			$detail_order = $detail_order->result_array();

			foreach ($detail_order as $value) {

				$t_data_produk = $this->db->query("SELECT * from produk where id_produk=" . $value["id_produk"]);
				$t_data_produk = $t_data_produk->result_array();
				$stok = $t_data_produk[0]["jumlah_stok"] - $value["jumlah_produk"];
				$tambah_data = $value["jumlah_produk"];
				$this->db->query("UPDATE produk set jumlah_stok=$stok, jumlah_terjual=jumlah_terjual+$tambah_data WHERE id_produk=" . $value["id_produk"]);

				if ($stok < 1) {
					$this->db->query("UPDATE produk set stok_produk='Kosong' WHERE id_produk=" . $value["id_produk"]);
				}
			}

			$id_adm = $this->session->userdata('admin_name');
			$this->cilinaya_model->insert_table('log_aktivitas', array('id_user' => $id_adm, 'aktivitas' => "Mengkonfirmasi pembayaran order dengan ID order $id"));
			redirect('order/detail/' . $id);
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
			$id = $this->input->post('id');
			$nama 		= $this->input->post('nama_order');
			$deskripsi	= $this->input->post('desk_order');
			$stok 		= $this->input->post('stok');
			$harga_ecer	= $this->input->post('harga_ecer');
			$harga_box	= $this->input->post('harga_box');
			$harga_paket = $this->input->post('harga_paket');

			$this->db->query("
			UPDATE order SET 
			nama_order      = '$nama',
			deskripsi_order = '$deskripsi',
			harga_paket		  = '$harga_paket',
			harga_box		  = '$harga_box',
			harga_ecer		  = '$harga_ecer',
			stok_order		  = '$stok'
			WHERE id_order  = '$id'");
			redirect(base_url("order"));
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
			$temp = $this->db->query("SELECT * FROM `detail_order` WHERE `id_order`=\"$id\"");
			if ($temp) {
				foreach ($temp->result_array() as $r) :
					$this->db->query("UPDATE produk set jumlah_stok=jumlah_stok+" . $r['jumlah_produk'] . " WHERE id_produk=" . $r['id_produk']);
				endforeach;
				$this->db->query("DELETE FROM `detail_order` WHERE id_order=\"$id\"");
				$this->db->query("DELETE FROM `order` WHERE id_order=\"$id\"");
			}
			redirect(base_url("order"));
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
		}
	}

	function detail($id)
	{
		if ($this->session->userdata("admin_username") != "") {
			$d['order'] 	= $this->db->query("SELECT * FROM `order` WHERE id_order='$id'")->result_array();
			$d['detail_order'] 	= $this->db->query("SELECT * FROM detail_order d, produk p, detail_pengiriman dp WHERE d.id_order='$id' AND d.id_produk = p.id_produk AND d.id_detail_order=dp.id_detail_order")->result_array();
			$d['konfirmasi'] 	= $this->db->query("SELECT * FROM konfirmasi_bayar WHERE id_order='$id' LIMIT 1")->result_array();
			$d['id_order'] 		= $id;
			$d['content'] 			= "order/order_detail";

			$d['detail_order2'] 	= $this->db->query("SELECT * FROM detail_order d, produk p WHERE d.id_order='$id' AND d.id_produk = p.id_produk ")->result_array();
			//$data_penjual="SELECT DISTINCT(`id_penjual`) AS penjual FROM `detail_order` WHERE `id_order`='T170116001'";
			//var_dump($d['detail_order']);

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

	function detail_pembayaran($id_penjual = null)
	{
		//echo $id_penjual;
	}

	function pembatalan_transaksi()
	{
		$id_detail_order = $this->input->post('id_detail_order_klaim');
		//$data_komplain=$this->Ciliniya_model->get_table_where("komplain_barang",array('id_detail_order'=>$id_detail_order));
		$data_komplain = $this->db->query("SELECT * from komplain_barang WHERE id_detail_order=" . $id_detail_order)->result_array();
		$data_lama = $this->Cilinaya_model->get_table_where("detail_order", array('id_detail_order' => $id_detail_order));
		$data_kurang_pajak = $data_lama[0]['harga_pajak'] * $data_komplain[0]['jumlah_produk_komplain'];
		$data_kurang = $data_lama[0]['harga'] * $data_komplain[0]['jumlah_produk_komplain'];

		$this->db->query("update detail_order set jumlah_produk=jumlah_produk-" . $data_komplain[0]['jumlah_produk_komplain'] . " ,subtotal=subtotal-" . $data_kurang . " ,subtotal_pajak=subtotal_pajak-" . $data_kurang_pajak . " WHERE id_detail_order=" . $id_detail_order);
		if ($data_lama[0]['pembayaran'] != 0) {
			$this->db->query("update detail_order set pembayaran=pembayaran-$data_kurang_pajak where id_detail_order=$id_detail_order");
		}
		if ($data_lama[0]['tagihan'] != 0) {
			$this->db->query("update detail_order set tagihan=tagihan-$data_kurang_pajak where id_detail_order=$id_detail_order");
		}
		if ($data_pemasukan = $this->Cilinaya_model->get_table_where('pemasukan', array('id_detail_order' => $id_detail_order))) {

			$data_kurang_pemasukan = ($data_lama[0]['harga'] - $data_lama[0]['harga_pajak']) * $data_komplain[0]['jumlah_produk_komplain'];
			$this->db->query("update pemasukan set jumlah_pemasukan=jumlah_pemasukan-" . $data_kurang_pemasukan . " WHERE id_detail_order=" . $id_detail_order);
		}




		$data_lama = $this->Cilinaya_model->get_table_where("detail_order", array('id_detail_order' => $id_detail_order));


		$this->db->query("UPDATE `produk` SET jumlah_stok=jumlah_stok+" . $data_komplain[0]['jumlah_produk_komplain'] . ", jumlah_terjual=jumlah_terjual-" . $data_komplain[0]['jumlah_produk_komplain'] . " WHERE id_produk=" . $data_lama[0]['id_produk']);
		$this->db->query("UPDATE komplain_barang SET status_dana_kembali=1 where id_detail_order=$id_detail_order");


		$data_update = $data_lama[0];
		$data_update['keterangan'] = $this->input->post("keterangan_klaim");

		$this->Cilinaya_model->insert_table("klaim_detail_order", $data_update);

		$data_detail_pengiriman = $this->Cilinaya_model->get_table_where('detail_pengiriman', array('id_detail_order' => $id_detail_order));
		$data_update_pengiriman = $data_detail_pengiriman[0];
		$update_total_order = $data_update['subtotal'];
		$this->Cilinaya_model->insert_table("t_detail_pengiriman", $data_update_pengiriman);
		$this->db->query("UPDATE `order` set total_order=total_order-" . $update_total_order . ", grand_total_order=grand_total_order-" . $update_total_order . " WHERE id_order='" . $data_update['id_order'] . "'");

		//$this->Cilinaya_model->delete_table("detail_pengiriman",array('id_detail_order'=>$id_detail_order));
		//$this->Cilinaya_model->delete_table("detail_order",array("id_detail_order"=>$id_detail_order));
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Pembatalan telah di konfirmasikan ke ' . $this->input->post("id_penjual_klaim") . '</strong></div>');
		redirect(base_url('order/komplain/'));
	}
	function pengembalian_dana()
	{;
	}

	function refund()
	{
		$d['content'] = "order/refund";
		$tema = $this->cilinaya_model->get_table('tema');
		$d['tema'] = $tema;
		$this->load->view('dashboard', $d);
	}
	function komplain()
	{
		$d['content'] = "order/refund";
		$tema = $this->cilinaya_model->get_table('tema');
		$d['tema'] = $tema;
		$this->load->view('dashboard', $d);
	}

	function get_komplain()
	{
		$data = $this->db->query("SELECT * from komplain_barang, detail_order,produk,`order` where komplain_barang.id_detail_order=detail_order.id_detail_order AND detail_order.id_produk=produk.id_produk AND detail_order.id_order=`order`.id_order order by komplain_barang.id_komplain DESC")->result_array();
		echo json_encode($data);
	}

	function get_refund()
	{
		if ($this->session->userdata("admin_username") != "") {
			$data = $this->db->query("SELECT * from klaim_detail_order, produk WHERE klaim_detail_order.id_produk=produk.id_produk");
			echo json_encode($data->result_array());
		} else {
			redirect(base_url());
		}
	}

	function konfirmasi_ongkir($id_ongkir = null, $id_penjual)
	{
		$this->db->query("UPDATE `ongkir_pembeli` SET pembayaran=tagihan_admin WHERE id_ongkir=$id_ongkir");
		$this->db->query("UPDATE `ongkir_pembeli` SET tagihan_admin=0 WHERE id_ongkir=$id_ongkir");
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Konfirmasi Ongkir Berhasil</strong></div>');

		$id_adm = $this->session->userdata('admin_nama');
		$this->cilinaya_model->insert_table('log_aktivitas', array('id_user' => $id_adm, 'aktivitas' => "Mengkonfirmasi pembayaran ongkir penjual $id_penjual dengan ID ongkir $id_ongkir"));
		redirect(base_url('laporan/penjual/' . $id_penjual));
	}

	function konfirmasi_komplain($id_komplain = null)
	{
		//echo $id_komplain;
		$this->Cilinaya_model->update_table('komplain_barang', array('status_komplain' => 'Disetujui'), array('id_komplain' => $id_komplain));
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Komplain Telah Berhasil Disetujui</strong></div>');
		redirect(base_url('order/komplain/'));
	}

	function get_konfirmasi_refund_pembeli()
	{
		if ($this->session->userdata("admin_username") != "") {
			$data = $this->db->query('SELECT * from konfirmasi_pengembalian_produk, detail_order, `order`, komplain_barang, produk
				WHERE konfirmasi_pengembalian_produk.id_detail_order= detail_order.id_detail_order 
				AND konfirmasi_pengembalian_produk.id_komplain_barang=komplain_barang.id_komplain
				AND konfirmasi_pengembalian_produk.id_order=`order`.id_order
				AND detail_order.id_produk=produk.id_produk')->result_array();
			echo json_encode($data);
		}
	}

	function konfirmasi_refund_penjual($id_komplain = null)
	{
		if ($this->session->userdata("admin_username") != "") {
			$this->Cilinaya_model->update_table('konfirmasi_pengembalian_produk', array('status_sampai' => 1), array('id_komplain_barang' => $id_komplain));
			$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Pengembalian Barang Telah Dikirim</strong></div>');
			redirect(base_url('order/komplain/'));
		} else {
		}
	}
}
