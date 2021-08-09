<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
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

			$d['kontak'] = $this->db->query("SELECT deskripsi_kontak FROM kontak");

			$config['base_url'] = base_url() . 'kontak/index/';
			$config['total_rows'] = $this->db->get("kontak")->num_rows();
			$config['per_page']   = $limit;
			$config['uri_segment'] = 4;

			$this->pagination->initialize($config);
			$d['pagination'] = $this->pagination->create_links();

			$d['content'] = "kontak/kontak_view";
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

	function save()
	{
		if ($this->session->userdata("logged_in") == TRUE) {
			$deskripsi	= $this->input->post('deskripsi_kontak');
			$this->db->query("
				 UPDATE kontak SET 
				 deskripsi_kontak = '$deskripsi'");
			redirect(base_url("kontak"));
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
