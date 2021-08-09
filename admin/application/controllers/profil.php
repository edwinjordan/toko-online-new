<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		if ($this->session->data_admin("admin_username") != "") {
			$page = $this->uri->segment(4);
			$limit = 10;
			if (!$page) :
				$offset = 0;
			else :
				$offset = $page;
			endif;

			$d['profil'] = $this->db->query("SELECT deskripsi_profil FROM profil");
			
			$config['base_url'] = base_url() . 'profil/index/';
			$config['total_rows'] = $this->db->get("profil")->num_rows();
			$config['per_page']   = $limit;
			$config['uri_segment'] = 4;

			$this->pagination->initialize($config);
			$d['pagination'] = $this->pagination->create_links();

			$d['content'] = "pengiriman/profil_view";
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
		if ($this->session->data_admin("admin_username") != "") {
			$deskripsi	= $this->input->post('deskripsi_profil');
			$this->db->query("
				 UPDATE profil SET 
				 deskripsi_profil = '$deskripsi'");
			redirect(base_url("profil"));
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}

	public function show_profil()
	{
		$this->load->model('cilinaya_model');
		$data_bank = $this->cilinaya_model->get_table('data_bank');
		$data_contact = $this->cilinaya_model->get_table_where('konten', array('id_konten' => 1));
		$data = array(
			'content' => 'profil/about_us',
			'data1'	  => $this->cilinaya_model->get_all_tentang(),
			'data2'   => $this->cilinaya_model->get_all_aturan(),
			'data3'   => $this->cilinaya_model->get_all_panduan(),
			'data'	=>	$data_contact,
			'data_bank' =>	$data_bank
		);
		$tema = $this->cilinaya_model->get_table('tema');
		$data['tema'] = $tema;
		$this->load->view('dashboard', $data);
	}


	function tambah_akun_bank()
	{
		$this->cilinaya_model->insert_table('data_bank', $this->input->post());
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Akun Bank Berhasil di tambah</strong></div>');
		redirect('profil/show_profil');
	}

	function delete_akun($id_data = null)
	{
		$this->cilinaya_model->delete_table('data_bank', array('id_data' => $id_data));
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Akun Bank Berhasil di hapus</strong></div>');
		redirect('profil/show_profil');
	}

	function edit_bank()
	{
		$data['jenis_bank'] = $this->input->post('jenis_bank');
		$data['atas_nama_bank'] = $this->input->post('atas_nama_bank');
		$data['no_rekening'] = $this->input->post('no_rekening');
		$this->cilinaya_model->update_table('data_bank', $data, array('id_data' => $this->input->post('id_data')));
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Akun Bank Berhasil di perbarui</strong></div>');
		redirect('profil/show_profil');
	}


	public function show_profil_id($id)
	{
		$this->load->model('cilinaya_model');
		$data = array(
			'content'	=> 'profil/edit_konten',
			'result'	=> $this->cilinaya_model->select_konten_id($id),
		);
		$tema = $this->cilinaya_model->get_table('tema');
		$data['tema'] = $tema;
		$this->load->view('dashboard', $data);
	}

	public function show_aturan_id($id)
	{
		$this->load->model('cilinaya_model');
		$data = array(
			'content'	=> 'profil/edit_aturan',
			'result'	=> $this->cilinaya_model->select_aturan_id($id),
		);
		$tema = $this->cilinaya_model->get_table('tema');
		$data['tema'] = $tema;
		$this->load->view('dashboard', $data);
	}


	public function save_profil()
	{
		$this->load->model('cilinaya_model');
		$data = array(
			'content' => 'profil/add_profil'
		);
		$tema = $this->cilinaya_model->get_table('tema');
		$data['tema'] = $tema;
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

	function update_contact()
	{
		$this->load->model('cilinaya_model');
		$data = array(
			'no_telp' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat'),
			'Email' => $this->input->post('email')
		);
		$this->cilinaya_model->update_table('konten', $data, array('id_konten' => 1));
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

	function update_asal_order()
	{
		$this->load->model('cilinaya_model');
		$data = array(
			'nama_provinsi' => $this->input->post('lbl_prov'),
			'nama_kota' => $this->input->post('lbl_kota'),
			'provinsi' => $this->input->post('provinsi'),
			'kota' => $this->input->post('kota_order'),
		);
		$this->cilinaya_model->update_table('konten', $data, array('id_konten' => 1));
		$this->session->set_flashdata('item', '<div class="alert alert-info" role="alert"><strong>Kontak Berhasil di Perbarui</strong></div>');
		redirect('profil/show_profil');
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

	function _api_ongkir($data)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			//CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
			//CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
			CURLOPT_URL => "http://api.rajaongkir.com/starter/" . $data,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				/* masukan api key disini*/
				"key: 8b273fb86a0e6550ac4b20b1104cfa48"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return  $err;
		} else {
			return $response;
		}
	}


	public function provinsi()
	{

		$provinsi = $this->_api_ongkir('province');
		$data = json_decode($provinsi, true);
		echo json_encode($data['rajaongkir']['results']);
	}

	public function kota($provinsi = "")
	{
		if (!empty($provinsi)) {
			if (is_numeric($provinsi)) {
				$kota = $this->_api_ongkir('city?province=' . $provinsi);
				$data = json_decode($kota, true);
				echo json_encode($data['rajaongkir']['results']);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

}
