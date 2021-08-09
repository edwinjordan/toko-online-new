<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following desk
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/desks.html
	 */

	public function index()
	{
		if ($this->session->userdata("logged_in") == TRUE) {
			$page = $this->uri->segment(4);
			$limit = 10;
			if (!$page) :
				$offset = 0;
			else :
				$offset = $page;
			endif;

			$d['info'] = $this->db->query("SELECT deskripsi_info FROM informasi");

			$config['base_url'] = base_url() . 'info/index/';
			$config['total_rows'] = $this->db->get("informasi")->num_rows();
			$config['per_page']   = $limit;
			$config['uri_segment'] = 4;

			$this->pagination->initialize($config);
			$d['pagination'] = $this->pagination->create_links();

			$d['content'] = "informasi/informasi";
			$this->load->model('cilinaya_model');
			$tema = $this->cilinaya_model->get_table('tema');
			$d = array(
				'tema' => $tema
			);
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

	function save()
	{
		if ($this->session->userdata("logged_in") == TRUE) {
			$deskripsi	= $this->input->post('deskripsi_info');
			$this->db->query("
				 UPDATE informasi SET 
				 deskripsi_info = '$deskripsi'");
			redirect(base_url("informasi"));
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
