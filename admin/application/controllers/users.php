<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{


	// public function index()
	// {
	// 	if($this->session->userdata("logged_in") == TRUE){


	// 		$d['user'] = $this->cilinaya_model->page_query("user")->result_array();
	// 		$d['content'] = "user/user_view";
	// 		$this->load->view('dashboard',$d);
	// 	}else{
	// 		$desk = base_url("");
	// 		$msg = "Maaf Anda Belum Login.";
	// 		echo '<script type="text/javascript">
	// 		alert("' . $msg . '"); 
	// 		location.href = "' . $desk . '"; 
	// 		</script>';
	// 	}

	// }
	public function index()
	{
		if (($this->session->userdata("logged_in") == TRUE) && ($this->session->userdata("level") == "admin")) {
			// $d['order'] = $this->cilinaya_model->page_query("`order`")->result_array();
			$d['content'] = "user/view";
			$this->load->view('dashboard', $d);
			//$this->load->view('order/order_view');

		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
	 		alert("' . $msg . '"); 
	 		location.href = "' . $desk . '"; 
	 		</script>';
		}
	}

	public function ajax_tabel()
	{

		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		} else {
			//            panggil dulu library datatablesnya

			$this->load->library('datatables_ssp');

			//            atur nama tablenya disini
			$table = 'user';

			// Table's primary key
			$primaryKey = 'id_user';

			// Array of database columns which should be read and sent back to DataTables.
			// The `db` parameter represents the column name in the database, while the `dt`
			// parameter represents the DataTables column identifier. In this case simple
			// indexes

			$columns = array(
				array('db' => 'id_user', 'dt' => 'id_user'),
				array('db' => 'nama', 'dt' => 'nama'),
				array('db' => 'email', 'dt' => 'email'),
				array('db' => 'level', 'dt' => 'level'),
				array('db' => 'aktif_user', 'dt' => 'aktif_user'),
				array(
					'db' => 'id_user',
					'dt' => 'aksi',
					'formatter' => function ($d) {
						return '<a href="' . site_url('users/edit_user/' . $d) . '" class="btn btn-warning">edit</a>
                    <a href="' . site_url('users/hapus/' . $d) . '" class="btn btn-danger">hapus</a>
                    <a href="' . site_url('users/aktivasi/' . $d) . '" class="btn btn-success">aktivasi</a>
                     <a href="' . site_url('laporan/penjual/' . $d) . '" class="btn btn-info">Detail Keuangan</a>  ';
					}
				),
				//  array(
				//     'db' => 'foto',
				//     'dt' => 'aksi',
				//     'formatter' => function( $d ) {
				//     return '<a href="' . site_url('user/edit_user/' . $d) . '" class="btn btn-success">edit</a> ';
				//     }
				// ),
			);




			// SQL server connection information
			$CI = &get_instance();
			$CI->load->database();
			$host = $CI->db->hostname;
			$user = $CI->db->username;
			$pass = $CI->db->password;
			$db = $CI->db->database;
			/////////////////////
			$sql_details = array(
				'user' => $user,
				'pass' => $pass,
				'db' => $db,
				'host' => $host
			);

			$data = Datatables_ssp::simple($_GET, $sql_details, $table, $primaryKey, $columns);
			echo json_encode($data);
		}
	}

	function add()
	{
		if (($this->session->userdata("logged_in") == TRUE) && ($this->session->userdata("level") == "admin")) {
			$d['content'] = "user/add";
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
	function edit_user($id)
	{
		if (($this->session->userdata("logged_in") == TRUE) && ($this->session->userdata("level") == "admin")) {
			$query = $this->db->query("SELECT * FROM  `user` WHERE  `id_user` =  '$id'");

			foreach ($query->result_array() as $key => $value) {
				$d['edit_user'] = $value;
			}

			$d['content'] = "user/edit";
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

	function aktivasi($id)
	{
		if (($this->session->userdata("logged_in") == TRUE) && ($this->session->userdata("level") == "admin")) {
			$data = $this->cilinaya_model->get_table_where('user', array('id_user' => $id));
			if ($data[0]['aktif_user'] == 0) {
				$this->cilinaya_model->update_table('user', array('aktif_user' => 1), array('id_user' => $id));
			} else {
				$this->cilinaya_model->update_table('user', array('aktif_user' => 0), array('id_user' => $id));
			}

			redirect('users');
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
		if (($this->session->userdata("logged_in") == TRUE) && ($this->session->userdata("level") == "admin")) {

			$id_user  	= $this->input->post('username');
			$nama 		= $this->input->post('nama');
			$email		= $this->input->post('email');
			$level		= $this->input->post('level');
			$pass		= $this->input->post('pass');


			$this->db->query("
					INSERT INTO  `user`
						( `id_user` , `nama` , `email` , `level` , `status` , `foto` , `password` )
					VALUES 
						( '$id_user', '$nama',  '$email',  '$level',  '1', NULL , MD5('$pass'));
					");

			redirect(base_url("users"));
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}

	function edit()
	{
		if (($this->session->userdata("logged_in") == TRUE) && ($this->session->userdata("level") == "admin")) {
			$id_user  	= $this->input->post('username');
			$nama 		= $this->input->post('nama');
			$email		= $this->input->post('email');
			$level		= $this->input->post('level');
			$pass		= $this->input->post('pass');

			if ($pass != "") {
				$this->db->query("
				 UPDATE  `user` 
				 	SET  `nama` =  '$nama',
				 		 `email` =  '$email',
				 		 `level` = '$level',
				 		 `password` = MD5('$pass')
				 WHERE id_user = '$id_user'");
			} else {
				$this->db->query("
				 UPDATE  `k5057259_datakom`.`user` 
				 	SET  `nama` =  '$nama',
				 		 `email` =  '$email',
				 		 `level` = '$level'
				 WHERE id_user = '$id_user'");
			}

			redirect(base_url("users"));
		} else {
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
			</script>';
		}
	}

	function hapus($id)
	{
		if (($this->session->userdata("logged_in") == TRUE) && ($this->session->userdata("level") == "admin")) {
			$d['hapus_user'] = $this->db->query("DELETE FROM user WHERE id_user='$id'");
			redirect(base_url("users"));
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
