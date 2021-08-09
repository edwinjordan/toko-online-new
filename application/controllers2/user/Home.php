<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
		  $this->load->model('toko_online_model');
		  $this->load->library('session');
	}

	public function index()
	{	

		// $data['menu'] =$this->toko_online_model->get_table_where('menu', array('aktif_menu' => 1));
		$data['terbaru'] = $this->toko_online_model->get_produk('terbaru');
		$data['termurah'] = $this->toko_online_model->get_produk('termurah');

		$data['data_slider']	= $this->toko_online_model->get_produk('terbaru');
		$data['content'] = 'user/index';
		$this->load->view('user/dashboard' , $data);
		// echo $_SERVER['REMOTE_ADDR'];


	}

	public function produk($menu,$id_kategori_produk,$offset=0)
	{	
		  $this->load->library('pagination');
		// $data['menu'] =$this->toko_online_model->get_table_where('menu', array('aktif_menu' => 1));
		
		$data['id_menu'] = $menu;
		$data['id_kategori_produk'] = $id_kategori_produk;
		$data['content'] = 'user/produk';




		$config['base_url'] = base_url().'/user/home/produk/'.$menu.'/'.$id_kategori_produk;
        $config['total_rows'] = $this->toko_online_model->get_count_result_where($id_kategori_produk,'produk');

        $config['per_page'] = 6; /*Jumlah data yang dipanggil perhalaman*/
        $config['uri_segment'] = 6; /*data selanjutnya di parse diurisegmen 3*/
           /*Class bootstrap pagination yang digunakan*/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
           $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
           $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
           $config['next_tag_open'] = "<li>";
           $config['next_tagl_close'] = "</li>";
           $config['prev_tag_open'] = "<li>";
           $config['prev_tagl_close'] = "</li>";
           $config['first_tag_open'] = "<li>";
           $config['first_tagl_close'] = "</li>";
           $config['last_tag_open'] = "<li>";
           $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
            
        $data['halaman'] = $this->pagination->create_links();


        $data['produk'] = $this->toko_online_model->get_where_limmi($id_kategori_produk,$config['per_page'],$offset);




		$this->load->view('user/dashboard',$data);
	}

	public function produk_detail($id_produk)
	{	
		// $data['menu'] =$this->toko_online_model->get_table_where('menu', array('aktif_menu' => 1));
		$data['terbaru'] = $this->toko_online_model->get_produk('terbaru');
		$data['produk_detail'] = $this->toko_online_model->get_table_where('produk', array('id_produk' => $id_produk));
		$data['content'] = 'user/produk_detail';
		$this->load->view('user/dashboard',$data);
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass = md5($password);

		$log = $this->db->query("SELECT * FROM user WHERE id_user ='$username' && password = '$pass'");
		$num_log = $log->num_rows();

		if($num_log != 0){
			$check = $this->toko_online_model->get_table_where('user', array('id_user' => $username, 'password' => $pass));
			if($check[0]['aktif_user'] == 0){
				$data['content'] = 'user/unverified_account';
				$this->load->view('user/dashboard',$data);
			}
			else{
				$this->session->set_userdata('logged_in',TRUE);
				$this->session->set_userdata('user_name', $check[0]['nama']);
				$this->session->set_userdata('user_id', $check[0]['id_user']);
				$this->session->set_userdata('level', $check[0]['level']);
				redirect('penjual/dashboard');
			}
		}
		else{
				$desk = base_url("user/home");
				$msg = "Maaf Akun Anda tidak ada.";
				echo '<script type="text/javascript">
				alert("' . $msg . '"); 
				location.href = "' . $desk . '"; 
				</script>';
		}
	}

	public function account(){
		$data['content'] = 'user/account';
		$this->load->view('user/dashboard',$data);
	}

	public function register(){
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$provinsi = $this->input->post('provinsi');
		$kota 	  = $this->input->post('kota');
		$id_ongkir= $this->input->post('descity');

		$data = array('id_user' => $username,
						'nama' => $nama,	
					    'email' => $email,
					    'level' => 'member',
					    'password' => md5($password),
					    'provinsi' => $provinsi,
					    'kota'	=> $kota,
					    'id_ongkir'	=> $id_ongkir,
					    'aktif_user' => 0,
					    'nama_rek_user' => $this->input->post('nama_rek_user'),
					    'no_rek_user' => $this->input->post('no_rek_user'),
					    'bank_rek_user' => $this->input->post('bank_rek_user')
					    );
		$insert = $this->toko_online_model->insert_table('user',$data);

		if($insert){
			$this->session->set_flashdata('item','<div class="alert alert-info" role="alert">Akun berhasil dibuat<br>Silhakan tunggu maksimal 1 x 24 jam untuk proses konfirmasi akun dari admin</div>'); 
			redirect(base_url("user/home/account"));

		}
		else{
			$desk = base_url("user/home/account");
				$msg = "Maaf ada kesalahan,silahkan ulang kembali.";
				echo '<script type="text/javascript">
				alert("' . $msg . '"); 
				location.href = "' . $desk . '"; 
				</script>';
		}

		
	}

	public function keranjang_belanja(){
		$ip = $this->input->post('ip_number');
		$id_produk = $this->input->post('id_produk');
		$harga = $this->input->post('harga');
		$quantity = $this->input->post('quantity');
		$subtotal = $harga * $quantity;

		// echo $ip;

		$ambil_data = $this->toko_online_model->get_table_where('keranjang_belanja', array('id_keranjang_belanja' => $ip , 'id_produk' => $id_produk));

		

		
		if($ambil_data != null){
			$quantity_new = $ambil_data[0]['jumlah_produk'] + $quantity;
			$subtotal_new = $ambil_data[0]['subtotal_belanja'] + $subtotal;

			$data = array(
					'jumlah_produk' => $quantity_new,
					'subtotal_belanja' => $subtotal_new
				);

			$update = $this->toko_online_model->update_table('keranjang_belanja',$data, array('id_keranjang_belanja' => $ip , 'id_produk' => $id_produk));
		}
		else{
			$data = array(
			'id_keranjang_belanja' 	=> $ip,
			'id_produk'				=> $id_produk,
			'harga_produk'			=> $harga,
			'jumlah_produk'			=> $quantity,
			'subtotal_belanja'		=> $subtotal
			);
			$insert = $this->toko_online_model->insert_table('keranjang_belanja',$data);
		}

		redirect(base_url('/user/home/produk_detail/'.$id_produk));
		
	}

	public function update_keranjang_belanja(){
		$id_produk = $this->input->post('id_produk');
		$id_keranjang_belanja = $this->input->post('id_keranjang_belanja');
		$quantity = $this->input->post('quantity');
		// print_r($id_produk);
		// print_r();
		foreach ($id_produk as $id) {
			$where = array(
					'id_keranjang_belanja' 	=> $id_keranjang_belanja,
					'id_produk'				=> $id
				);
			$cek_q = $this->toko_online_model->get_table_where('keranjang_belanja', $where);
			if($cek_q[0]['jumlah_produk'] != $quantity[$id] ){
				$data = array(
						'jumlah_produk' 	=> $quantity[$id],
						'subtotal_belanja'	=> $quantity[$id]*$cek_q[0]['harga_produk']
					);
				$this->toko_online_model->update_table('keranjang_belanja',$data,$where);
			}
		}

		redirect('user/home/cart/'.$id_keranjang_belanja);

	}

	public function remove_keranjang_belanja($id){
		$where = array(
			'id' 	=> $id
			);
		$this->toko_online_model->delete_table('keranjang_belanja', $where);
		echo "<script>
				window.history.go(-1);
				location.reload();
		</script>";	
	}

	public function cart(){
		$data['cart'] = $this->toko_online_model-> get_keranjang_belanja(array('keranjang_belanja.id_keranjang_belanja'=> $_SERVER['REMOTE_ADDR']));
		$data['content'] = 'user/cart';
		$this->load->view('user/dashboard' , $data);
	}



	function about(){


		$data_konten=$this->toko_online_model->get_table_where('konten',array('id_konten',1));
		$data['data']=$data_konten[0]['tentang'];
		$data['content'] = 'user/about';
		$data['label']="Tentang";
		$this->load->view('user/dashboard' , $data);
	}


	function aturan(){
		$data_konten=$this->toko_online_model->get_table_where('konten',array('id_konten',1));
		$data['data']=$data_konten[0]['aturan'];
		$data['content'] = 'user/about';
		$data['label']="Aturan Umum";
		$this->load->view('user/dashboard' , $data);
	}
	
	function panduan(){
		$data_konten=$this->toko_online_model->get_table_where('konten',array('id_konten',1));
		$data['data']=$data_konten[0]['panduan'];
		$data['content'] = 'user/about';
		$data['label']="Panduan";
		$this->load->view('user/dashboard' , $data);
	}

	
	public function checkout(){
		$data['cart'] = $this->toko_online_model-> get_keranjang_belanja(array('keranjang_belanja.id_keranjang_belanja'=> $_SERVER['REMOTE_ADDR']));
		$penjual = $this->toko_online_model->get_penjual_cart(array('keranjang_belanja.id_keranjang_belanja'=> $_SERVER['REMOTE_ADDR']));
		$angka = 0;
		foreach ($penjual as $p) {
			$data_penjual[$angka] = $this->toko_online_model->get_table_where('user', array('id_user' => $p['id_user']));
			$angka++;
		}
		
		// $data_penjual = array();
		// $angka = 0;
		// foreach ($data['cart'] as $cart) {
		// 	$data_penjual[$angka] = $this->toko_online_model->get_penjual(array('produk.id_produk' => $cart['id_produk']));
		// 	// print_r($data_penjual[$angka]);
		// 	// echo "<br>";
		// 	$angka++;
		// }
		// foreach ($data_penjual as $penjual) {
		// 	if
		// }
		
		$data['penjual'] = $data_penjual;
		
		$data['content'] = 'user/checkout';
		$this->load->view('user/dashboard',$data);
	}

	public function get_city()
{
    require_once 'application/libraries/REST_Ongkir.php';
    
    $rest = new REST_Ongkir(array(
        'server' => 'http://api.ongkir.info/'
    ));
    
    $result = $rest->post('city/list', array(
        'query' 	=> 'so', 
        'type' 	=> 'origin',
        'courier' 	=> 'jne',
        'API-Key' 	=> '4557591a4e8814e57d36558e2a9370e3'
    ));
    
    try
    {
        $status = $result['status'];
        
        // Handling the data
        if ($status->code == 0)
        {
            $cities = $result['cities'];
            
            foreach ($cities->item as $item)
            {
                echo 'Kota: ' . $item . '<br />';
            }
        }
        else
        {
            echo 'Tidak ditemukan kota yang diawali "band"';	
        }
        
    }
    catch (Exception $e)
    {
        echo 'Processing error.';
    }
}
}
