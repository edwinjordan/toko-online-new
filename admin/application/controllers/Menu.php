<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Menu extends CI_Controller
{



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



			$table		= 'menu';

			$order_by	= 'id_menu';

			$d['menu'] = $this->cilinaya_model->page_query($table, $order_by, $limit, $offset);



			$config['base_url'] = base_url() . 'admin/menu/index/';

			$config['total_rows'] = $this->db->get("menu")->num_rows();

			$config['per_page']   = $limit;

			$config['uri_segment'] = 4;



			$this->pagination->initialize($config);

			$d['pagination'] = $this->pagination->create_links();



			$d['content'] = "menu/menu_view";
			$tema = $this->cilinaya_model->get_table('tema');
			$d['tema'] = $tema;
			$this->load->view('dashboard', $d);
		} else {

			$url = base_url("");

			$msg = "Maaf Anda Belum Login.";

			echo '<script type="text/javascript">

				alert("' . $msg . '"); 

				location.href = "' . $url . '"; 

				</script>';
		}
	}



	function add()
	{

		if ($this->session->userdata("logged_in") == TRUE) {

			$d['content'] = "menu/menu_add";

			$table	= 'menu';

			$d['menu'] = $this->cilinaya_model->get_table($table);
			$tema = $this->cilinaya_model->get_table('tema');
			$d['tema'] = $tema;
			$this->load->view('dashboard', $d);
		} else {

			$url = base_url("");

			$msg = "Maaf Anda Belum Login.";

			echo '<script type="text/javascript">

				alert("' . $msg . '"); 

				location.href = "' . $url . '"; 

				</script>';
		}
	}


	function save()
	{

		if ($this->session->userdata("logged_in") == TRUE) {

			$nama_menu		= $this->input->post("nama_menu");

			$title		= $this->input->post("title");

			$meta_description		= $this->input->post("meta_description");

			$meta_keywords		= $this->input->post("meta_keywords");

			$aktif_menu   	= 1;

			$foto_menu		= $nama_menu . "_foto.jpg";



			$this->upload->initialize(array(

				"allowed_types" => "jpg|jpeg|png",

				"file_name"		=> array($foto_menu),

				"max_size"		=> 1000,

				"upload_path"   => "./img_foto/menu/"
			));

			if (!$this->upload->do_multi_upload("userfile")) {

				echo $this->upload->display_errors();
				die;
			} else {

				$gambar = $this->upload->get_multi_upload_data();

				$foto_menu	= $gambar[0]['file_name'];

				$data = array(

					'nama_menu'		=> $nama_menu,

					'title_menu'		=> $title,

					'meta_description_menu'		=> $meta_description,

					'meta_keywords_menu'		=> $meta_keywords,

					'foto_menu'		=> $foto_menu,

					'aktif_menu'	=> $aktif_menu

				);

				$table = 'menu';



				$this->cilinaya_model->insert_table($table, $data);

				$id_adm = $this->session->userdata('admin_name');

				$this->cilinaya_model->insert_table('log_aktivitas', array('id_user' => $id_adm, 'aktivitas' => "Menambah Menu $nama_menu"));



				//echo "sukses";

				redirect('Menu');

				/*echo $foto_menu;*/
			}
		} else {

			$url = base_url("");

			$msg = "Maaf Anda Belum Login.";

			echo '<script type="text/javascript">

				alert("' . $msg . '"); 

				location.href = "' . $url . '"; 

				</script>';
		}
	}



	function menu_edit($id_menu)
	{

		if ($this->session->userdata("logged_in") == TRUE) {

			$table				= 'menu';

			$where				= array('id_menu' => $id_menu);

			$d['edit_menu']		= $this->cilinaya_model->get_table_where($table, $where);

			$d['content'] 		= "menu/menu_edit";

			$tema = $this->cilinaya_model->get_table('tema');
			$d['tema'] = $tema;
			$this->load->view('dashboard', $d);
		} else {

			$url = base_url("");

			$msg = "Maaf Anda Belum Login.";

			echo '<script type="text/javascript">

				alert("' . $msg . '"); 

				location.href = "' . $url . '"; 

				</script>';
		}
	}



	function edit()
	{

		if ($this->session->userdata("logged_in") == TRUE) {

			$id_menu		= $this->input->post("id_menu");

			$nama_menu		= $this->input->post("nama_menu");

			$title		= $this->input->post("title");

			$meta_description		= $this->input->post("meta_description");

			$meta_keywords		= $this->input->post("meta_keywords");



			$data = array(

				'nama_menu'		=> $nama_menu,

				'title_menu'		=> $title,

				'meta_description_menu'		=> $meta_description,

				'meta_keywords_menu'		=> $meta_keywords

			);

			$table	= 'menu';

			$where	= array('id_menu' => $id_menu);



			$this->cilinaya_model->update_table($table, $data, $where);

			$id_adm = $this->session->userdata('admin_name');

			$this->cilinaya_model->insert_table('log_aktivitas', array('id_user' => $id_adm, 'aktivitas' => "Mengedit Menu $nama_menu"));

			redirect('Menu');
		}
	}



	function edit_foto()
	{

		if ($this->session->userdata("logged_in") == TRUE) {

			$id_menu		= $this->input->post("id_menu");

			$foto_menu		= $this->input->post("foto_menu");



			if (file_exists('./img_foto/menu/' . $foto_menu)) {

				$do = unlink('./img_foto/menu/' . $foto_menu);
			} else {
			}

			$this->upload->initialize(array(

				"allowed_types" => "jpg|jpeg|png",

				"file_name"		=> array($foto_menu),

				"max_size"		=> 1000,

				"upload_path"   => "./img_foto/menu/"
			));

			if (!$this->upload->do_multi_upload("userfile")) {

				echo "gagal";
			} else {

				$gambar = $this->upload->get_multi_upload_data();

				$foto_menu = $gambar[0]['file_name'];

				$data = array(

					'foto_menu'	=> $foto_menu

				);

				$table	= 'menu';

				$where	= array('id_menu' => $id_menu);



				$this->cilinaya_model->update_table($table, $data, $where);



				redirect(base_url('Menu/'), "refresh");
			}
		} else {

			$url = base_url("");

			$msg = "Maaf Anda Belum Login.";

			echo '<script type="text/javascript">

				alert("' . $msg . '"); 

				location.href = "' . $url . '"; 

				</script>';
		}
	}





	function edit_status_menu($status)
	{

		if ($this->session->userdata("logged_in") == TRUE) {

			$id_menu = $this->input->post("id_menu");



			if ($status == "aktifkan") {

				$aktif_menu = 1;
			} else if ($status == "nonaktifkan") {

				$aktif_menu = 0;
			}



			$table	= 'menu';

			$data	= array(

				'aktif_menu'	=> $aktif_menu

			);

			$where	= array(

				'id_menu'	=> $id_menu

			);



			$this->cilinaya_model->update_table($table, $data, $where);



			redirect(base_url('Menu/menu_edit/' . $id_menu));
		} else {

			$url = base_url("");

			$msg = "Maaf Anda Belum Login.";

			echo '<script type="text/javascript">

				alert("' . $msg . '"); 

				location.href = "' . $url . '"; 

				</script>';
		}
	}
}
