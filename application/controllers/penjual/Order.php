<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('toko_online_model');
		$this->load->library('session');
	}

	public function index() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$id_penjual = $this->session->userdata('user_id');
			//$d['order'] = $this->toko_online_model->get_where_special_limit('order',array('id_penjual' => $id_penjual),$data['page'],10);

			$d['order'] = $this->toko_online_model->get_table_joinn_where('order', 'detail_order', 'order.id_order=detail_order.id_order', array('detail_order.id_penjual' => $id_penjual, 'order.status_order >=' => 3));
			$d['pagination'] = $this->pagination();
			$d['content'] = "penjual/order_view";
			$d['items'] = 1;
			$this->load->view('penjual/dashboard', $d);
			//$this->load->view('order/order_view');
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
		}
	}

	function get_order_data() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$id_penjual = $this->session->userdata('user_id');
			$data = $this->toko_online_model->get_table_joinnn_where('order', 'detail_order', 'order.id_order=detail_order.id_order', array('detail_order.id_penjual' => $id_penjual, 'order.status_order >=' => 3));
			//$data=$this->db->query("SELECT *, SUM(detail_order.subtotal)  AS jumlah, SUM(ongkir_pembeli.ongkir)  AS jumlah_ongkir from `order`, detail_order, ongkir_pembeli where `order`.id_order=detail_order.id_order AND `order`.id_order=ongkir_pembeli.id_order AND detail_order.id_penjual='$id_penjual' AND order.status_order >= 3 group by `order`.id_order order by `order`.id_order")->result_array();
			echo json_encode($data);
		} else {
			redirect(base_url());
		}
	}

	public function page() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$d['order'] = $this->toko_online_model->get_special_limit('order', $data['page'], 10);
			$d['pagination'] = $this->pagination();
			$d['content'] = "order/order_view";
			$this->load->view('penjual/dashboard', $d);
			//$this->load->view('laporan/laporan_view');
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
		}
	}

	function pagination() {
		$this->load->library('pagination');
		$config = array();
		$config["base_url"] = base_url('order/page');
		$config["total_rows"] = $this->toko_online_model->get_table_rows('order');
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

	/* public function ajax_tabel()
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
	 } */

	function add() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$d['content'] = "order/order_add";
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

	function edit_order($id) {
		if ($this->session->userdata("logged_in") == TRUE) {
			$d['edit_order'] = $this->db->query("SELECT * FROM order WHERE id_order='$id'");
			$d['content'] = "order/order_edit";
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

	function konfirmasi() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$id = $this->input->post('id_order');
			$nama = $this->input->post('nama_bayar');
			$tgl = $this->input->post('tgl_bayar');
			$bank = $this->input->post('nama_bank');
			$total = $this->input->post('total_bayar');
			$rek = $this->input->post('rek_bayar');
			$this->db->query("
			INSERT INTO konfirmasi_bayar(id_order, tgl_konfirmasi, jumlah_bayar, bank_bayar, rekening_bayar, nama_bayar) 
			VALUES('$id','$tgl', '$total', '$bank','$rek','$nama')");

			$this->db->query("
			UPDATE `order` SET status_order = '3' WHERE id_order = '$id'");
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

	function edit() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama_order');
			$deskripsi = $this->input->post('desk_order');
			$stok = $this->input->post('stok');
			$harga_ecer = $this->input->post('harga_ecer');
			$harga_box = $this->input->post('harga_box');
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

	function hapus($id) {
		if ($this->session->userdata("logged_in") == TRUE) {
			$temp = $this->db->query("SELECT * FROM `detail_order` WHERE `id_order`=\"$id\"");
			if ($temp) {
				foreach ($temp->result_array() as $r):
				$this->db->query("UPDATE produk set jumlah_stok=jumlah_stok+" . $r['jumlah_produk'] . " WHERE id_produk=" . $r['id_produk']);
				endforeach;
				$this->db->query("DELETE FROM `detail_order` WHERE id_order=\"$id\"");
				$this->db->query("DELETE FROM `order` WHERE id_order=\"$id\"");
			}
			redirect("penjual/order/index/" . $this->session->userdata("user_id"));
		}else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
		}
	}

	function detail($id) {
		if ($this->session->userdata("logged_in") == TRUE) {
			$d['order'] = $this->db->query("SELECT * FROM `order` WHERE id_order='$id'")->result_array();
			$d['detail_order'] = $this->db->query("SELECT * FROM detail_order d, produk p WHERE id_order='$id' AND d.id_produk = p.id_produk")->result_array();
			$d['konfirmasi'] = $this->db->query("SELECT * FROM konfirmasi_bayar WHERE id_order='$id' LIMIT 1")->result_array();
			$d['id_order'] = $id;
			$d['content'] = "order/order_detail";
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

	function kirim($id) {
		if ($this->session->userdata("logged_in") == TRUE) {
			$this->db->query("
			UPDATE `order` SET status_order = '4' WHERE id_order = '$id'");
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

	function detail_barang($id_order = null) {
		if ($this->session->userdata("logged_in") == TRUE) {
			$id_penjual = $this->session->userdata('user_id');
			$d['info_kontak']=$this->toko_online_model->get_table_where('order', array('id_order' => $id_order));
			$d['info_ongkir']=$this->toko_online_model->get_table_where('ongkir_pembeli', array('id_order' => $id_order, 'id_penjual'=>$id_penjual));
			
			$d['order'] = $this->toko_online_model->get_table_join3_where('order', 'detail_order', 'produk', 'order.id_order=detail_order.id_order', 'detail_order.id_produk=produk.id_produk', array('detail_order.id_penjual' => $id_penjual, 'order.status_order >=' => 3, 'order.id_order' => $id_order));
			$d['id_order']=$id_order;
			$d['id_penjual']=$id_penjual;
			$data_ongkir=$this->toko_online_model->get_table_where("ongkir_pembeli",array('id_order'=>$id_order, 'id_penjual'=>$id_penjual));
			$sum_ongkir=0;
			foreach ($data_ongkir as $value) {
				$sum_ongkir=$sum_ongkir+$value['ongkir'];
				//echo "SSSSSSSSSSSSSSSSSSSSSs";
			}
			$d['sum_ongkir']=$sum_ongkir;
			$d['content'] = "penjual/detail_barang";
			$d['items'] = 1;
				
			$data_jumlah_barang=$this->db->query("SELECT COUNT(id_detail_order) AS jumlah_barang FROM `detail_order` WHERE id_order='$id_order' AND id_penjual='$id_penjual'")->result_array();
			$data_yang_sudah_dikirim=$this->db->query("SELECT COUNT(id_detail_order) AS jumlah_barang FROM `detail_order` WHERE id_order='$id_order' AND status_kirim=1 AND id_penjual='$id_penjual'")->result_array();


			if ($data_yang_sudah_dikirim[0]["jumlah_barang"] >= $data_jumlah_barang[0]["jumlah_barang"]) {
				$d['status_validasi']=false;
					
			}else{
				$d['status_validasi']=true;
			}
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

	function validasi_pengiriman() {

		if ($this->session->userdata("logged_in") == TRUE) {
			//$detail_order= $this->toko_online_model->get_table_where("detail_order",array('id_detail_order'=>  $this->input->post("id_detail_order")));
			//print_r($this->input->post());

			$data_update_detail = array(
                'no_resi' => $this->input->post("resi"),
                'tagihan'=>$this->input->post("jumlah_bayar"),
                'status_kirim'=>1
			);
			$this->toko_online_model->update_table("detail_order", $data_update_detail, array('id_detail_order' => $this->input->post("id_detail_order")));

			$get_id_order = $this->toko_online_model->get_table_where('detail_order', array('id_detail_order' => $this->input->post("id_detail_order")));

			$update_detail_pengiriman = $this->toko_online_model->update_table('detail_pengiriman', array('tanggal_kirim' => date("Y-m-d")), array('id_detail_order' => $this->input->post("id_detail_order")));

			$cek_status_kirim_all = $this->toko_online_model->get_table_where('detail_order', array('id_order' => $get_id_order[0]['id_order'], 'status_kirim' => 0));
			if($cek_status_kirim_all == null){
				$this->toko_online_model->update_table('order',array('status_order' => 4), array('id_order' => $get_id_order[0]['id_order']));
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
			redirect(base_url("penjual/order/detail_barang/" . $this->input->post("id_order")));
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
		}
	}

	function validasi_pengiriman_barang() {
		date_default_timezone_set("Asia/Jakarta");
		//print_r($this->input->post());
		$id_order=$this->input->post("id_order");
		$id_penjual=$this->input->post("id_penjual");
		$data_detail_order_t=$this->toko_online_model->get_table_where("detail_order",array('id_order'=>$id_order, 'id_penjual'=>$id_penjual));
		foreach ($data_detail_order_t as $value) {
			$sub_total_setelah_pajak=90 / 100 * $value['subtotal'];
			$data_update_detail = array(
                'no_resi' => $this->input->post("resi"),
                'tagihan'=>$value['subtotal_pajak'],
                'status_kirim'=>1
			);

			$this->toko_online_model->update_table("detail_order", $data_update_detail, array('id_detail_order' => $value['id_detail_order'] ));
			$update_detail_pengiriman = $this->toko_online_model->update_table('detail_pengiriman', array('tanggal_kirim' => date("Y-m-d")), array('id_detail_order' => $value['id_detail_order']));
		}

		$data_jumlah_barang=$this->db->query("SELECT COUNT(id_detail_order) AS jumlah_barang FROM `detail_order` WHERE id_order='$id_order'")->result_array();
		$data_yang_sudah_dikirim=$this->db->query("SELECT COUNT(id_detail_order) AS jumlah_barang FROM `detail_order` WHERE id_order='$id_order' AND status_kirim=1")->result_array();


		if ($data_yang_sudah_dikirim[0]["jumlah_barang"] >= $data_jumlah_barang[0]["jumlah_barang"]) {
			$this->toko_online_model->update_table('order',array('status_order' => 4), array('id_order' => $id_order));
				
		}
		$data_update_ongkir=array(
			'tagihan_admin'=>$this->input->post("ongkir")
		);
		$this->toko_online_model->update_table("ongkir_pembeli", $data_update_ongkir, array('id_order' => $id_order, 'id_penjual'=>$id_penjual ));

		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert">Pengiriman barang telah tervalidasi</div>');
		redirect(base_url("penjual/order/detail_barang/" . $this->input->post("id_order")));

			
	}

	function refund(){
		if ($this->session->userdata("logged_in") == TRUE) {

			$d['content'] = "order/order_refund";
			$this->load->view('penjual/dashboard', $d);
		}
	}

	function get_refund(){
		if($this->session->userdata("logged_in") == TRUE){
			$id_penjual = $this->session->userdata('user_id');
			$data=$this->db->query("SELECT * from klaim_detail_order, produk, komplain_barang WHERE klaim_detail_order.id_produk=produk.id_produk AND komplain_barang.id_detail_order=klaim_detail_order.id_detail_order AND klaim_detail_order.id_penjual='".$id_penjual."'");
			echo json_encode($data->result_array());
		}else{
			redirect(base_url());
		}
	}

	function get_pengembalian_produk()
	{
		if($this->session->userdata("logged_in") == TRUE){
			$id_penjual = $this->session->userdata('user_id');
			$data=$this->db->query("SELECT * from konfirmasi_pengembalian_produk, detail_order, `order`, komplain_barang, produk
		 where konfirmasi_pengembalian_produk.id_detail_order= detail_order.id_detail_order 
		 AND konfirmasi_pengembalian_produk.id_komplain_barang=komplain_barang.id_komplain
		  AND konfirmasi_pengembalian_produk.id_order=`order`.id_order
		  AND detail_order.id_produk=produk.id_produk AND konfirmasi_pengembalian_produk.status_sampai>0 AND detail_order.id_penjual='$id_penjual'
		  ");
			echo json_encode($data->result_array());
		}

	}

	function detail_pengembalian_produk($id_komplain_barang= null)
	{
		if($this->session->userdata("logged_in") == TRUE){

			$data['komplain_barang']=$this->toko_online_model->get_table_where('komplain_barang',array('id_komplain'=>$id_komplain_barang));
			$data['konfirmasi_pengembalian_produk']=$this->toko_online_model->get_table_where('konfirmasi_pengembalian_produk',array('id_komplain_barang' => $id_komplain_barang));

			$data['detail_order']=$this->toko_online_model->get_table_where('detail_order',array('id_detail_order'=>$data['konfirmasi_pengembalian_produk'][0]['id_detail_order']));

			$data['order']=$this->toko_online_model->get_table_where('order',array('id_order'=>$data['detail_order'][0]['id_order']));

			$data['produk']=$this->toko_online_model->get_table_where('produk',array('id_produk'=>$data['detail_order'][0]['id_produk']));


			// $data['produk']=$this->toko_online_model->get_table_where("produk", array('id_produk' => $data['detail_order'][0]['id_produk']);


			$data['content'] = "order/detail_refund";
		
			$this->load->view('penjual/dashboard', $data);
		}else{

		}

	}

	function konfimasi_pengiriman_ulang(){
		$data_update=array(
			'no_resi_ganti'=>	$this->input->post('resi'),
			'status_sampai'=>	2

		);
		$this->toko_online_model->update_table('konfirmasi_pengembalian_produk',$data_update,array('id_komplain_barang'=>$this->input->post('id_komplain')));

		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert">Pengiriman barang telah tervalidasi</div>');
		redirect(base_url("penjual/order/detail_pengembalian_produk/" . $this->input->post("id_komplain")));
	}

}
