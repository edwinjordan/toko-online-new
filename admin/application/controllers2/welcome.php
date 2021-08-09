<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	function check_login(){
		$username = addslashes($this->input->post("username"));
		$pass = addslashes(md5($this->input->post("pass")));
		
		$log = $this->db->query("SELECT * FROM user WHERE id_user ='$username' && password = '$pass'");
		$num_log = $log->num_rows();
		if($num_log > 0){
			foreach($log->result_array() as $r){
				if (strtolower($r['level']) == "member"){
					$url = base_url("");
					$msg = "Maaf Data Anda Tidak memiliki hak akses.";
					echo '<script type="text/javascript">
					alert("' . $msg . '"); 
					location.href = "' . $url . '"; 
					</script>';
				} else  {
					$this->session->set_userdata('logged_in',TRUE);
					$this->session->set_userdata('admin_name', $r['nama']);
					$this->session->set_userdata('level', $r['level']);

					$_SESSION['ses_kcfinder']=array();
					$_SESSION['ses_kcfinder']['disabled'] = false;
					$_SESSION['ses_kcfinder']['uploadURL'] = "../content_upload";		
					redirect(site_url("dashboard"));   
				}
			}
		}else{
				$url = base_url("");
				$msg = "Maaf Data Anda Tidak Ditemukan.";
				echo '<script type="text/javascript">
				alert("' . $msg . '"); 
				location.href = "' . $url . '"; 
				</script>';
		}
		
	}
    function logout(){
    $this->session->unset_userdata('logged_in');
    $this->session->sess_destroy();
    redirect('','refresh');
    }
}
