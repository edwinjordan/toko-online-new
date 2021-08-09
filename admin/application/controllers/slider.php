<?php
class slider extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('cilinaya_model');
	}
	public function index()
	{
		if ($this->session->userdata("admin_username") != "") {
			$data['slider'] = $this->cilinaya_model->getSlider();
			$data['content'] = "slider/slider_view";
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

	public function add_slider()
	{
		$data['content'] = "slider/slider_add";
		$tema = $this->cilinaya_model->get_table('tema');
		$data['tema'] = $tema;
		$this->load->view('dashboard', $data);
	}

	public function add_data()
	{
		$slider = $_FILES['slider']['name'];
		$namafile = "slider" . "_" . time();
		$config['upload_path'] = '../assets/img/slider/';
		$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
		$config['file_name'] = $namafile;
		$config['max_size'] = 5000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('slider')) {
			echo $this->upload->display_errors();
			die;
		} else {
			$get_name = $this->upload->data();
			$insert = $this->cilinaya_model->inputData('slider', array('gambar' => $get_name['file_name']));
			if ($insert != 0) {
				redirect('slider');
			}
		}
	}

	public function edit_logo()
	{
		$id_slider = array('id_logo' => 1);
		$data['img'] = $this->cilinaya_model->getWhere('logo', $id_slider);
		$data['content'] = "slider/logo_edit";
		$tema = $this->cilinaya_model->get_table('tema');
		$data['tema'] = $tema;
		$this->load->view('dashboard', $data);
	}

	public function edit_data_logo()
	{
		$id_logo = array('id_logo' => 1);
		$data = $this->cilinaya_model->getWhere('logo', $id_logo);
		$namafile = "logo" . "_" . time();
		$config['upload_path'] = '../assets/img/';
		$config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
		$config['file_name'] = $namafile;
		$config['max_size'] = 5000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('logo')) {
			echo $this->upload->display_errors();
			die;
		} else {
			unlink('../assets/img/' . $data[0]['logo']);
			$get_name = $this->upload->data();
			$this->cilinaya_model->update('logo', $id_logo, array('logo' => $get_name['file_name']));
			redirect('slider');
		}
	}

	public function edit_slider($id)
	{
		$id_slider = array('id_slider' => $id);
		$data['img'] = $this->cilinaya_model->getWhere('slider', $id_slider);
		$data['content'] = "slider/slider_edit";
		$tema = $this->cilinaya_model->get_table('tema');
		$data['tema'] = $tema;
		$this->load->view('dashboard', $data);
	}

	public function edit_data()
	{
		$id = $this->input->post('id_slider');
		$id_slider = array('id_slider' => $id);
		$data = $this->cilinaya_model->getWhere('slider', $id_slider);
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


			$this->cilinaya_model->update('slider', $id_slider, array('gambar' => $get_name['file_name']));
			redirect('slider');
		}
	}

	public function delete_slider($id)
	{
		$id_slider = array('id_slider' => $id);
		$data = $this->cilinaya_model->getWhere('slider', $id_slider);
		$this->db->query("DELETE FROM slider WHERE id_slider='$id'");
		unlink('../assets/img/' . $data[0]['gambar']);
		redirect(base_url("slider"));
	}
}
