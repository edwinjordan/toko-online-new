<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('toko_online_model');
	}

	public function index() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$id_user = $this->session->userdata('user_id');
			//$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$filter = ($this->input->post("select-filter")) ? $this->input->post("select-filter") : 0;
			$date1 = ($this->input->post("date1")) ? $this->input->post("date1") : 0;
			$date2 = ($this->input->post("date2")) ? $this->input->post("date2") : 0;
			$date = date_create($date2);
			$q = "SELECT * FROM `order`";
			$cek = 0;
			if ($date1 <= $date2) {
				if ($filter != 0) {
					$q = $q . " WHERE ";
					$q = $q . "status_order='" . $filter . "'";
					$cek++;
				}
				if ($date1 != 0) {
					if ($cek == 0) {
						$q = $q . " WHERE ";
					} else {
						$q = $q . " AND ";
					}
					$q = $q . "tgl_order>='" . $date1 . "'";
					$cek++;
				}
				if ($date2 != 0) {
					if ($cek == 0) {
						$q = $q . " WHERE ";
					} else {
						$q = $q . " AND ";
					}
					$q = $q . "tgl_order<='" . $date2 . "'";
				}
			}
			$data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$d['produk'] = $this->toko_online_model->get_special_limit('order', $data['page'], 10);
			$d['pagination'] = $this->pagination();
			$d['filter'] = $filter;
			$d['date1'] = date_create($date1);
			$d['date2'] = date_create($date2);
			$d['laporan'] = $this->db->query($q)->result_array();
			$d['statusOrder'] = $this->db->query("SELECT * FROM status_order")->result_array();
			$d['content'] = "laporan/laporan_view";
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

	public function page() {
		if ($this->session->userdata("logged_in") == TRUE) {
			//$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$filter = ($this->input->post("select-filter")) ? $this->input->post("select-filter") : 0;
			$date1 = ($this->input->post("date1")) ? $this->input->post("date1") : 0;
			$date2 = ($this->input->post("date2")) ? $this->input->post("date2") : 0;
			$date = date_create($date2);
			$q = "SELECT * FROM `order`";
			$cek = 0;
			if ($date1 <= $date2) {
				if ($filter != 0) {
					$q = $q . " WHERE ";
					$q = $q . "status_order='" . $filter . "'";
					$cek++;
				}
				if ($date1 != 0) {
					if ($cek == 0) {
						$q = $q . " WHERE ";
					} else {
						$q = $q . " AND ";
					}
					$q = $q . "tgl_order>='" . $date1 . "'";
					$cek++;
				}
				if ($date2 != 0) {
					if ($cek == 0) {
						$q = $q . " WHERE ";
					} else {
						$q = $q . " AND ";
					}
					$q = $q . "tgl_order<='" . $date2 . "'";
				}
			}
			$data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
			$d['produk'] = $this->cilinaya_model->get_special_limit('order', $data['page'], 10);
			$d['pagination'] = $this->pagination();
			$d['filter'] = $filter;
			$d['date1'] = date_create($date1);
			$d['date2'] = date_create($date2);
			$d['laporan'] = $this->db->query($q)->result_array();
			$d['statusOrder'] = $this->db->query("SELECT * FROM status_order")->result_array();
			$d['content'] = "laporan/laporan_view";
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

	function piutang() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$id_user = $this->session->userdata('user_id');
			//$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

			$d['content'] = "laporan/laporan_view";
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

	function get_ongkir_piutang() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$id_penjual = $this->session->userdata('user_id');
			$data = $this->db->query("SELECT * from ongkir_pembeli where id_penjual='$id_penjual' AND tagihan_admin!=0");
			echo json_encode($data->result_array());
		}else{
			redirect(base_url());
		}
	}

	function get_ongkir_pemasukan() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$id_penjual = $this->session->userdata('user_id');
			$data = $this->db->query("SELECT * from ongkir_pembeli where id_penjual='$id_penjual' AND tagihan_admin=0 AND pembayaran !=0");
			echo json_encode($data->result_array());
		}else{
			redirect(base_url());
		}
	}

	function pemasukan() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$id_user = $this->session->userdata('user_id');
			//$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

			$d['content'] = "laporan/laporan_view_pemasukan";
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

	function get_pemasukan(){
		if ($this->session->userdata("logged_in") == TRUE) {
			$id_penjual = $this->session->userdata('user_id');
			$data = $this->db->query("SELECT * from detail_order, produk WHERE detail_order.id_produk=produk.id_produk AND detail_order.id_penjual='$id_penjual' AND detail_order.no_resi!='' AND detail_order.pembayaran!=''");
			echo json_encode($data->result_array());
		}else{
			redirect(base_url());
		}
	}

	function get_piutang() {
		if ($this->session->userdata("logged_in") == TRUE) {
			$id_penjual = $this->session->userdata('user_id');
			$data = $this->db->query("SELECT * from detail_order, produk WHERE detail_order.id_produk=produk.id_produk AND detail_order.id_penjual='$id_penjual' AND detail_order.no_resi!='' AND detail_order.pembayaran=''");
			echo json_encode($data->result_array());
		}else{
			redirect(base_url());
		}
	}

	function pagination() {
		$this->load->library('pagination');
		$config = array();
		$config["base_url"] = base_url('laporan/page');
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

}
