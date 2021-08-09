<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Cilinaya_model');
	}
	public function index()
	{
		if($this->session->userdata("logged_in") == TRUE){
			// $d['order'] = $this->cilinaya_model->page_query("`order`")->result_array();
			$d['content'] = "produk/produk_view";
			$this->load->view('dashboard',$d);
			//$this->load->view('order/order_view');

		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
		}
	}


	function get_produk_data(){
		if($this->session->userdata("logged_in") == TRUE){
			$data=$this->db->query("SELECT * from produk order BY id_produk DESC");
			echo json_encode($data->result_array());
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
		}

	}


	function add(){
		if($this->session->userdata("logged_in") == TRUE){
			$d['content'] = "produk/produk_add";
			$d['kategori'] = $this->cilinaya_model->get_table('kategori_produk');
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
	function edit_produk($id){
		if($this->session->userdata("logged_in") == TRUE){
			$d['edit_produk'] = $this->db->query("SELECT * FROM produk WHERE id_produk='$id'");
			$d['content'] = "produk/produk_edit";
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

	function set_pajak(){

		$this->Cilinaya_model->update_table('produk',array('pajak'=>$this->input->post('pajak')),array('id_produk'=>$this->input->post('id_produk')));
		$this->session->set_flashdata('item',' <div class="alert alert-success" role="alert"><strong>Pajak Untuk Produk '.$this->input->post('nama_produk_pajak').' Berhasil di simpan</strong></div>');
			
		//redirect to home page
		redirect(base_url('produk'));
	}

	function set_pajak_all(){
		print_r($this->input->post());
		$this->Cilinaya_model->update_table_all('produk',array('pajak'=>$this->input->post('pajak_semua_produk')));
		$this->session->set_flashdata('item',' <div class="alert alert-success" role="alert"><strong>Pajak Untuk Semua Produk Berhasil di Ubah</strong></div>');
			
		//redirect to home page
		redirect(base_url('produk'));
	}

	function save(){
		if($this->session->userdata("logged_in") == TRUE){
			$today = date("ymd"); //digunakan untuk menentukan format tanggal dan juga memanggil data tanggal saat ini.
			$query = "SELECT max(id_produk) AS last FROM produk WHERE id_produk LIKE '%$today%'";
			$hasil = mysql_query($query);
			$data = mysql_fetch_array($hasil);
			$last_id_order = $data['last']; // mengambil id order yang terakhir

			$last_no_urut  = substr($last_id_order, 6, 4); //memecah string yang ada di id order terakhir untuk membedakan tanggal dengan id yang di buat increment
			$next_no_urut  = $last_no_urut + 1;
			$next_id_produk = $today.sprintf('%04s', $next_no_urut); //menentukan huruf 'T' disetiap awal transaksi, di ikuti dengan tanggal sekarang, kemudian nomer id
			$kode_produk= $this->input->post('kode_produk');
			$nama 		= $this->input->post('nama_produk');
			$kategori_produk = $this->input->post('kategori_produk');
			$harga		= $this->input->post('harga');
			$berat		= $this->input->post('berat');
			$deskripsi	= $this->input->post('deskripsi');
			$jumlah		= $this->input->post('jumlah');
			$stok		= $this->input->post('stok');
			if($jumlah>0){
				$stok='Ada';
			}else{
				$stok='Kosong';
			}

			if (is_numeric($harga) AND is_numeric($berat))
			{
				$this->db->query("
					INSERT INTO produk(id_produk,kode_produk, nama_produk,kategori_produk, harga, berat, deskripsi, stok_produk,jumlah_stok) 
					VALUES('$next_id_produk','$kode_produk','$nama', '$kategori_produk', '$harga', '$berat', '$deskripsi', '$stok', '$jumlah')");
				//redirect(base_url("produk"));
				// var_dump($today);
				// var_dump($hasil);
				// var_dump($data);
				// var_dump($last_no_urut);
				// var_dump($next_no_urut);
				// var_dump($next_id_produk);
				$d['content'] = "produk/produk_view";
				$this->load->view('dashboard',$d);
			}
			else {
				$d['content'] = "produk/produk_add_error";
				$this->load->view('dashboard',$d);
			}
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
			alert("' . $msg . '"); 
			location.href = "' . $desk . '"; 
		</script>';
		}


	}

	function edit(){
		if($this->session->userdata("logged_in") == TRUE){
			$id_produk  = $this->input->post('id_produk');
			$kode_produk  = $this->input->post('kode_produk');
			$nama 		= $this->input->post('nama_produk');
			$harga	    = $this->input->post('harga');
			$berat		= $this->input->post('berat');
			$deskripsi		= $this->input->post('deskripsi');
			$jumlah		= $this->input->post('jumlah');
			$stok		= $this->input->post('stok');
			if($jumlah>0){
				$stok='Ada';
			}else{
				$stok='Kosong';
			}
			$this->db->query("
			UPDATE produk SET 
			kode_produk          = '$kode_produk',
			nama_produk      	= '$nama',
			harga		  	    = $harga,
			berat				= $berat,
			deskripsi				= '$deskripsi',
			stok_produk	    = '$stok',
			jumlah_stok	    = '$jumlah'
			WHERE id_produk = '$id_produk'");
			redirect(base_url("produk"));

		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
		}
	}

	function hapus($id){
		if($this->session->userdata("logged_in") == TRUE){
			$d['hapus_produk'] = $this->db->query("DELETE FROM produk WHERE id_produk='$id'");
			redirect(base_url("produk"));
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
		}
	}

	function foto($id){
		if($this->session->userdata("logged_in") == TRUE){
			$d['detail_produk'] 	= $this->db->query("SELECT * FROM produk WHERE id_produk='$id'");
			$d['foto_produk'] 	= $this->db->query("SELECT * FROM produk w, foto_produk fw WHERE fw.id_produk = w.id_produk AND w.id_produk='$id'");
			$d['id_produk'] 		= $id;
			$d['content'] 			= "produk/produk_foto";
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
	function foto_save(){
		if($this->session->userdata("logged_in") == TRUE){
			$id			= $this->input->post("id");
			$namafile	= $id."_".time();
			$config['upload_path'] 	= '../img_foto/produk/';
			$config['allowed_types']	= 'jpg|jpeg|png|bmp';
			$config['max_size']		= '2000';
			$config['file_name'] 		= $namafile.".jpg";
			$foto = $config['file_name'];

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload())
			{
				echo $this->upload->display_errors(); die;
			}
			else
			{
				$this->db->query("INSERT INTO foto_produk(id_produk, foto_produk) VALUES ('$id', '$foto') ");
				redirect(base_url("produk/foto/$id"));
			}
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
		}
	}

	function foto_hapus(){
		if($this->session->userdata("logged_in") == TRUE){
			$id 				= $this->input->post("id");
			$id_produk 	= $this->input->post("id_produk");
			$namafile 		= $this->input->post("foto_produk");
			$d['hapus_produk'] = $this->db->query("DELETE FROM foto_produk WHERE id_foto_produk='$id'");

			$path = realpath(APPPATH . '../img_foto/produk');
			$hapus =  $path."/".$namafile;

			unlink($hapus);
			redirect(base_url("produk/foto/$id_produk"));
		}else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
		}
	}

	function aa(){
		$d = $this->db->query("SELECT id_order, SUM(subtotal) as total FROM detail_order group by id_order")->result_array();
		foreach ($d as $key ) {
			$this->db->query('UPDATE `order` SET total_order='.$key['total'].' WHERE id_order=\''.$key['id_order'].'\'');
		}
	}

	function validasi($id){
		if($this->session->userdata("logged_in") == TRUE){
			$this->cilinaya_model->update_table('produk',array('validasi' => 1),array('id_produk' => $id));
			redirect('produk');
		}
		else{
			$desk = base_url("");
			$msg = "Maaf Anda Belum Login.";
			echo '<script type="text/javascript">
		alert("' . $msg . '"); 
		location.href = "' . $desk . '"; 
	</script>';
		}
	}
}