<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}
	function check_login()
	{
		$data = array(
			'admin_username' => $this->input->post('username', TRUE),
			'admin_password' => md5($this->input->post('pass', TRUE))
		);

		$this->load->model('model_user'); // load model_user
		$cek_login = $this->model_user->where($data);
		//	print_r($this->db->last_query());

		if ($cek_login->num_rows() > 0) {
			$sql = $cek_login->result_array();

			$items = array();
			foreach ($sql as $key) {
				$items = $key;
			}
			// print_r($items);
			$this->session->set_userdata($items);

			$_SESSION['ses_kcfinder'] = array();
			$_SESSION['ses_kcfinder']['disabled'] = false;
			$_SESSION['ses_kcfinder']['uploadURL'] = "../content_upload";

			$this->session->set_flashdata('data', '<div class="alert alert-success">Berhasil Masuk</div>');
			redirect('dashboard');
		} else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

	function logout()
	{
		//$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}
}
