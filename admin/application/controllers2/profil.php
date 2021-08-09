<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

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
	public function __construct(){
		parent::__construct();
		
	}
	public function index()
	{
		if($this->session->userdata("logged_in") == TRUE){
			$page=$this->uri->segment(4);
	      	$limit=10;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;	
			
			$d['profil'] = $this->db->query("SELECT deskripsi_profil FROM profil");
			
			$config['base_url'] = base_url() . 'profil/index/';
			$config['total_rows'] = $this->db->get("profil")->num_rows();
			$config['per_page']   = $limit;
			$config['uri_segment'] = 4; 
			
			$this->pagination->initialize($config);
			$d['pagination']=$this->pagination->create_links();
			
			$d['content'] = "profil/profil_view";
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
	
	function save(){
		if($this->session->userdata("logged_in") == TRUE){
			$deskripsi	= $this->input->post('deskripsi_profil');
			$this->db->query("
				 UPDATE profil SET 
				 deskripsi_profil = '$deskripsi'");
			redirect(base_url("profil"));  
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
		
		
	}

	public function show_profil(){
		$this->load->model('cilinaya_model');
		$data_contact=$this->cilinaya_model->get_table_where('konten',array('id_konten'=>1));
		$data = array(
						'content' => 'profil/about_us',
						'data1'	  => $this->cilinaya_model->get_all_tentang(),
						'data2'   => $this->cilinaya_model->get_all_aturan(),
						'data3'   => $this->cilinaya_model->get_all_panduan(),
						'data'	=>	$data_contact			
		);
		$this->load->view('dashboard', $data);
	}

	public function show_profil_id($id){
		$this->load->model('cilinaya_model');
		$data = array(
						'content'	=> 'profil/edit_konten',
						'result'	=> $this->cilinaya_model->select_konten_id($id),						
					);
		$this->load->view('dashboard', $data);
	}

	public function show_aturan_id($id){
		$this->load->model('cilinaya_model');
		$data = array(
						'content'	=> 'profil/edit_aturan',
						'result'	=> $this->cilinaya_model->select_aturan_id($id),						
					);
		$this->load->view('dashboard', $data);
	}


	public function save_profil(){
		$this->load->model('cilinaya_model');
		$data = array(
						'content' => 'profil/add_profil'
					);
		$this->load->view('dashboard', $data);		
		
	}
	public function save_add()
	{
		$this->load->model('cilinaya_model');
		$data = array(
						'tentang' 	=> $this->input->post('deskripsi'),
						'aturan'	=> $this->input->post('aturan')
					);
		$this->cilinaya_model->insert_konten($data);
	}

	public function update_konten($id)
	{
		$this->load->model('cilinaya_model');
		$this->cilinaya_model->update_konten($id);
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>About Us Berhasil di Perbarui</strong></div>');
		redirect('profil/show_profil');
	}
	
	function update_contact(){
		$this->load->model('cilinaya_model');
		$data=array(
			'no_telp'=>$this->input->post('telp'),
			'alamat'=>$this->input->post('alamat'),
			'Email'=>$this->input->post('email')
		);
		$this->cilinaya_model->update_table('konten',$data,array('id_konten'=>1));
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Kontak Berhasil di Perbarui</strong></div>');
		redirect('profil/show_profil');
		
	
	}

	public function update_aturan($id)
	{
		$this->load->model('cilinaya_model');
		$this->cilinaya_model->update_aturan($id);
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Kontak Berhasil di Perbarui</strong></div>');
		redirect('profil/show_profil');
	}
	
	public function update_panduan($id)
	{
		$this->load->model('cilinaya_model');
		$this->cilinaya_model->update_panduan($id);
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Kontak Berhasil di Perbarui</strong></div>');
		redirect('profil/show_profil');
	}



	public function null_konten($id)
	{
		$this->load->model('cilinaya_model');
		$this->cilinaya_model->null_konten($id);
	}
	
	

}
