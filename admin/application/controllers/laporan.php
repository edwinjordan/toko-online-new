<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata("admin_username") != "") {
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
	public function page()
	{
		if ($this->session->userdata("admin_username") != "") {
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


	function penjual($id)
	{
		if ($this->session->userdata("admin_username") != "") {
			$id_user = $id;
			//$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$d['user'] = $id;
			$d['no_rek'] = $this->db->query("SELECT * FROM user where id_user='$id'")->result_array();
			$d['content'] = "laporan/laporan_view_penjual";
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

	function get_ongkir_piutang($id_penjual = null)
	{
		if ($this->session->userdata("admin_username") != "") {

			$data = $this->db->query("SELECT * from ongkir_pembeli where id_penjual='$id_penjual' AND tagihan_admin!=0");
			echo json_encode($data->result_array());
		} else {
			redirect(base_url());
		}
	}

	function get_all_ongkir_piutang()
	{
		if ($this->session->userdata("admin_username") != "") {

			$data = $this->db->query("SELECT * from ongkir_pembeli WHERE tagihan_admin!=0");
			echo json_encode($data->result_array());
		} else {
			redirect(base_url());
		}
	}

	function get_all_ongkir_dibayar()
	{
		if ($this->session->userdata("admin_username") != "") {

			$data = $this->db->query("SELECT * from ongkir_pembeli WHERE tagihan_admin=0 AND pembayaran!=0");
			echo json_encode($data->result_array());
		} else {
			redirect(base_url());
		}
	}


	function get_piutang($id_penjual = null)
	{

		$data = $this->db->query("SELECT * from detail_order, produk, detail_pengiriman WHERE detail_order.id_produk=produk.id_produk AND detail_order.id_detail_order=detail_pengiriman.id_detail_order AND detail_order.id_penjual='$id_penjual' AND detail_order.no_resi!='' AND detail_order.pembayaran=''  order by detail_order.id_detail_order DESC");
		echo json_encode($data->result_array());
	}


	function pembayaran_penjual()
	{
		if ($this->session->userdata("admin_username") != "") {

			$d['content'] = "laporan/laporan_view_pembayaran_penjual";
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


	function get_pembayaran_penjual()
	{
		if ($this->session->userdata("admin_username") != "") {
			$data = $this->db->query("SELECT *, SUM(tagihan) AS jml_tagihan FROM `detail_order`, ongkir_pembeli WHERE detail_order.no_resi!='' AND detail_order.pembayaran='' AND ongkir_pembeli.id_order=detail_order.id_order AND ongkir_pembeli.id_penjual=detail_order.id_penjual GROUP BY detail_order.id_penjual");
			echo json_encode($data->result_array());
		} else {
			redirect(base_url());
		}
	}

	function get_pembayaran_penjual_sudah_bayar()
	{
		if ($this->session->userdata("admin_username") != "") {
			$data = $this->db->query("SELECT * FROM `detail_order` WHERE detail_order.no_resi!='' AND detail_order.pembayaran!='' ");
			echo json_encode($data->result_array());
		} else {
			redirect(base_url());
		}
	}


	function pagination()
	{
		$this->load->library('pagination');
		$config = array();
		$config["base_url"] = base_url('laporan/page');
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

	function konfirmasi_pembayaran_penjual($id_penjual)
	{
		$data = $this->db->query("UPDATE detail_order SET pembayaran=tagihan WHERE detail_order.id_penjual='$id_penjual' AND detail_order.no_resi!='' AND detail_order.pembayaran=''");
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Pembayaran telah di konfirmasikan ke ' . $id_penjual . '</strong></div>');
		redirect(base_url('laporan/pembayaran_penjual'));
		//echo $id_penjual;
	}

	function konfirmasi_pembayaran_resi($id_detail_order, $id_penjual, $str = null)
	{

		$data_detail = $this->db->query("SELECT * from detail_order where id_detail_order=$id_detail_order");
		$data_detail = $data_detail->result_array();
		$pemasukan = $data_detail[0]['subtotal'] - $data_detail[0]['tagihan'];
		//echo $id_detail_order;
		$data = $this->db->query("UPDATE detail_order SET pembayaran=tagihan WHERE detail_order.id_detail_order=$id_detail_order");
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Pembayaran telah di konfirmasikan ke ' . $id_penjual . '</strong></div>');

		$this->db->query("INSERT INTO `pemasukan` (`id_detail_order`, `jumlah_pemasukan`) VALUES ( '$id_detail_order', '$pemasukan')");

		$id_adm = $this->session->userdata('admin_name');
		$this->cilinaya_model->insert_table('log_aktivitas', array('id_user' => $id_adm, 'aktivitas' => "Mengkonfirmasi pembayaran ke penjual $id_penjual dengan dengan ID detail order $id_detail_order"));
		if (is_null($str)) {
			redirect(base_url('laporan/penjual/' . $id_penjual));;
		} else {
			redirect(base_url('order#confirm'));
		}

		//echo $id_penjual;
	}


	function pemasukan()
	{
		if ($this->session->userdata("admin_username") != "") {

			$d['content'] = "laporan/laporan_view_pemasukan";
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

	function get_pemasukan()
	{
		if ($this->session->userdata("admin_username") != "") {
			//$data=$this->db->query("SELECT * from pemasukan, detail_order, produk WHERE detail_order.id_produk=produk.id_produk AND detail_order.id_detail_order=pemasukan.id_detail_order");
			$data = $this->db->query("SELECT * FROM `order` where status_order = '5'");
			echo json_encode($data->result_array());
		} else {
			redirect(base_url());
		}
	}
}
