<?php
class Lokasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('cilinaya_model');
	}
	public function index()
	{
		if ($this->session->userdata("admin_username") != "") {
			$data['konten'] = $this->cilinaya_model->getKonten();
			$data['content'] = "lokasi/lokasi_view";
			$tema = $this->cilinaya_model->get_table('tema');
			$data['tema'] = $tema;
			$this->load->view('dashboard', $data);
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
                alert("' . $msg . '"); 
                location.href = "' . $desk . '"; 
                </script>';
		}
	}

	public function edit_lokasi()
	{
		$id_konten = array('id_konten' => "1");
		$data['provinsi'] = $this->cilinaya_model->getWhere('konten', $id_konten);
		$data['content'] = "lokasi/lokasi_edit";
		$tema = $this->cilinaya_model->get_table('tema');
		$data['tema'] = $tema;
		$this->load->view('dashboard', $data);
	}

	public function edit_data()
	{
		$id = $this->input->post('id_konten');
		$id_konten = array('id_konten' => $id);
		$data = $this->cilinaya_model->getWhere('konten', $id_konten);
		$namafile = "slider" . "_" . time();
		$config['upload_path'] = '../assets/img/slider/';
		$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
		$config['file_name'] = $namafile;
		$config['max_size'] = 5000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('gambar')) {
			echo $this->upload->display_errors();
			die;
		} else {
			unlink('../assets/img/' . $data[0]['gambar']);
			$get_name = $this->upload->data();


			$this->cilinaya_model->update('slider', $id_konten, array('gambar' => $get_name['file_name']));
			redirect('slider');
		}
	}
}
