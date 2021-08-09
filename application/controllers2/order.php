<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function index($id_penjual)
	{    	
		if($this->session->userdata("logged_in") == TRUE){
			$data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$d['order'] = $this->toko_online_model->get_special_limit('order',array('id_penjual' => $id_penjual),$data['page'],10);
			$d['pagination']=$this->pagination();
			$d['content'] = "order/order_view";
			$this->load->view('dashboard',$d);
       //$this->load->view('order/order_view');

		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
	}
}

public function page()
	{
		if($this->session->userdata("logged_in") == TRUE){
			$data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$d['order'] = $this->cilinaya_model->get_special_limit('order',$data['page'],10);
			$d['pagination']=$this->pagination();
			$d['content'] = "order/order_view";
			$this->load->view('dashboard',$d);
       //$this->load->view('laporan/laporan_view');

		}else{
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


function add(){
	if($this->session->userdata("logged_in") == TRUE){
		$d['content'] = "order/order_add";
		$this->load->view('dashboard',$d);
	}else{
		$desk = base_url("");
		$msg = "Maaf Anda Belum Login.";
		echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
}
}
function edit_order($id){
	if($this->session->userdata("logged_in") == TRUE){
		$d['edit_order'] = $this->db->query("SELECT * FROM order WHERE id_order='$id'");
		$d['content'] = "order/order_edit";
		$this->load->view('dashboard',$d);
	}else{
		$desk = base_url("");
		$msg = "Maaf Anda Belum Login.";
		echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
}
}

function konfirmasi(){
	if($this->session->userdata("logged_in") == TRUE){
		$id 	= $this->input->post('id_order');
		$nama 	= $this->input->post('nama_bayar');
		$tgl		= $this->input->post('tgl_bayar');
		$bank 	= $this->input->post('nama_bank');
		$total	= $this->input->post('total_bayar');
		$rek		= $this->input->post('rek_bayar');
		$this->db->query("
			INSERT INTO konfirmasi_bayar(id_order, tgl_konfirmasi, jumlah_bayar, bank_bayar, rekening_bayar, nama_bayar) 
			VALUES('$id','$tgl', '$total', '$bank','$rek','$nama')");

		$this->db->query("
			UPDATE `order` SET status_order = '3' WHERE id_order = '$id'");
		redirect(base_url("order"));  
	}else{
		$desk = base_url("");
		$msg = "Maaf Anda Belum Login.";
		echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
}


}

function edit(){
	if($this->session->userdata("logged_in") == TRUE){
		$id = $this->input->post('id');
		$nama 		= $this->input->post('nama_order');
		$deskripsi	= $this->input->post('desk_order');
		$stok 		= $this->input->post('stok');
		$harga_ecer	= $this->input->post('harga_ecer');
		$harga_box	= $this->input->post('harga_box');
		$harga_paket= $this->input->post('harga_paket');

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

	}else{
		$desk = base_url("");
		$msg = "Maaf Anda Belum Login.";
		echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
}
}

function hapus($id){
	if($this->session->userdata("logged_in") == TRUE){
		$temp = $this->db->query("SELECT * FROM `detail_order` WHERE `id_order`=\"$id\"");
		if($temp){
			foreach ($temp->result_array() as $r):
				$this->db->query("UPDATE produk set jumlah_stok=jumlah_stok+".$r['jumlah_produk']." WHERE id_produk=".$r['id_produk']);
			endforeach;
		$this->db->query("DELETE FROM `detail_order` WHERE id_order=\"$id\"");
		$this->db->query("DELETE FROM `order` WHERE id_order=\"$id\"");
		}
		redirect(base_url("order"));
	}else{
		$desk = base_url("");
		$msg = "Maaf Anda Belum Login.";
		echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
}
}

function detail($id){
	if($this->session->userdata("logged_in") == TRUE){
		$d['order'] 	= $this->db->query("SELECT * FROM `order` WHERE id_order='$id'")->result_array();
		$d['detail_order'] 	= $this->db->query("SELECT * FROM detail_order d, produk p WHERE id_order='$id' AND d.id_produk = p.id_produk")->result_array();
		$d['konfirmasi'] 	= $this->db->query("SELECT * FROM konfirmasi_bayar WHERE id_order='$id' LIMIT 1")->result_array();
		$d['id_order'] 		= $id;
		$d['content'] 			= "order/order_detail";
		$this->load->view('dashboard',$d);
	}else{
		$desk = base_url("");
		$msg = "Maaf Anda Belum Login.";
		echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
}
}
function kirim($id){
	if($this->session->userdata("logged_in") == TRUE){
		$this->db->query("
			UPDATE `order` SET status_order = '4' WHERE id_order = '$id'");		
		redirect(base_url("order"));
	}else{
		$desk = base_url("");
		$msg = "Maaf Anda Belum Login.";
		echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
}
}
}