<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('toko_online_model');
		$this->load->library('session');
		if ($this->session->userdata('id_kpesan') == null) {
			$acak = rand(10000, 100000);
			$this->session->set_userdata('id_kpesan', $acak);
		}
	}

	public function index()
	{
		$this->cek_session();
		$data['title'] = "Situs Toko Online Terlengkap | blonjosam.com";
		$data['kategori'] = $this->toko_online_model->get_table('kategori_produk');
		$data['content'] = 'user/index1';
		$this->load->view('user/dashboard1', $data);
	}

	function cek_pesan(){
		
		$idk_psn =  $this->session->userdata('id_kpesan');
		//echo 'idk'.$idk_psn;
		// $this->toko_online_model->get_cek_pesan($idk_psn);
		// print_r($this->db->last_query());
		echo json_encode($this->toko_online_model->get_cek_pesan($idk_psn));
	}

	function cek_session(){
		$idk_psn = $this->session->userdata('id_kpesan');
		//echo 'idk'.$idk_psn;
	   if ($idk_psn == null){
		   //$id_kpesan = $this->id_oto('IKP','td_keranjang_belanja','fc_kdkeranjang_belanja');
		    $id_kpesan = $this->id_oto('IKP','keranjang_belanja','id_keranjang_belanja');
	
			$this->session->set_userdata('id_kpesan',$id_kpesan);
	   }
   }

   public function id_oto($kode,$tabel,$id)
	{
		$fix=0;
		$kode = $kode;
		$fix = $this->toko_online_model->get_id($tabel,$id)->row_array();
		//print_r($this->db->last_query());
		if (empty($fix)) {
			$fix=0;
		}
		if (substr(@$fix[$id], 4, 6)==date('ymd')) {
			$angka = substr($fix[$id], 11)+1;
			$angka_p = str_pad($angka,3,"0",STR_PAD_LEFT);
			$tgl_angk = substr($fix[$id], 4, 7).$angka_p;
		}else{
			$tgl_angk = date('ymd').'_001';
		}
		return $kode_jadi= $kode.'_'.$tgl_angk;
	}

	public function detail($slug_kategori=null, $slug_produk=null,$id=NULL)
	{
		//$this->cek_session();
		
		$get_slug_produk = $this->toko_online_model->get_slug_produk($slug_produk);
		//print_r($this->db->last_query());
		$data['title'] = "Situs Jual ".$get_slug_produk->nama_produk." Terlengkap | blonjosam.com";

		$data['detail_produk'] = $this->toko_online_model->get_table_where('produk', array('id_produk' => $get_slug_produk->id_produk));
		$data['voucher'] = $this->toko_online_model->get_voucher('t_voucher', array('id_produk' => $get_slug_produk->id_produk));
		//print_r($this->db->last_query());
		$data['rating'] = $this->toko_online_model->get_rating('review_produk', array('id_produk' => $get_slug_produk->id_produk));
		//$data['komentar'] = $this->toko_online_model->get_komentar('review_produk', array('id_produk' => $get_slug_produk->id_produk));
		$jml = $this->toko_online_model->komentar();

		$config['base_url'] = base_url().'Home/detail/'.$slug_kategori.'/'.$slug_produk;
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = '10';
		$config['next_page'] = '&laquo;';
		$config['full_tag_open'] = '<div class="page__pagination">';
		$config['full_tag_close'] = '</div>';
		$config['first_link']    = 'First';
		$config['last_link']    = 'Last';
		$config['next_link']	= 'Next';
		$config['prev_link']	= 'Prev';
		$config['cur_tag_open']  = '<span class="current"></a>';
		$config['cur_tag_close']  = '</a></span>';
		$config['prev_page'] = '&raquo;';

		//inisialisasi config
		$this->pagination->initialize($config);

		//buat pagination
		$data['halaman'] = $this->pagination->create_links();

		$data['query'] = $this->toko_online_model->ambil_komentar($config['per_page'], $id);

		$data['content'] = 'user/produk_detail1';
		$this->load->view('user/dashboard1', $data);
	}

	public function produk($id_kategori_produk, $offset = 0)
	{
		$this->load->library('pagination');

		$data['content'] = 'user/produk1';



		$config['per_page'] = 6; /*Jumlah data yang dipanggil perhalaman*/

		$get_slug_kategori = $this->toko_online_model->get_slug_kategori($id_kategori_produk);
		$data['title'] = "Situs Jual ".$get_slug_kategori->nama_kategori_produk." Terlengkap | blonjosam.com";

		$data['produk'] = $this->toko_online_model->get_table_where('produk', array('kategori_produk' => $get_slug_kategori->id_kategori_produk));
		$data['kategori'] = $this->toko_online_model->get_table('kategori_produk');

		$this->load->view('user/dashboard1', $data);
	}

	public function semua_produk($offset = 0)
	{
		$this->load->library('pagination');

		$data['content'] = 'user/produk_all';



		$config['per_page'] = 6; /*Jumlah data yang dipanggil perhalaman*/



		$data['produk'] = $this->toko_online_model->get_where_limmi_semua($config['per_page'], $offset);
		$data['kategori'] = $this->toko_online_model->get_table('kategori_produk');

		$this->load->view('user/dashboard1', $data);
	}

	public function cari_produk($offset = 0)
	{
		$produk = $this->input->post('nama_produk');
		$this->load->library('pagination');

		$data['content'] = 'user/cari_produk1';



		$config['per_page'] = 6; /*Jumlah data yang dipanggil perhalaman*/



		$data['produk'] = $this->toko_online_model->get_where_limmi2($produk, $config['per_page'], $offset);
		//print_r($this->db->last_query());
		$data['kategori'] = $this->toko_online_model->get_table('kategori_produk');

		$this->load->view('user/dashboard1', $data);
	}

	public function produk_detail($id_produk)
	{
		// $data['menu'] =$this->toko_online_model->get_table_where('menu', array('aktif_menu' => 1));
		$data['detail_produk'] = $this->toko_online_model->get_table_where('produk', array('id_produk' => $id_produk));
		$data['content'] = 'user/produk_detail1';
		$this->load->view('user/dashboard1', $data);
	}

	public function account()
	{
		$data['content'] = 'user/account';
		$this->load->view('user/dashboard', $data);
	}

	public function keranjang_belanja()
	{

	//	$this->cek_session(); 
		$ip = $this->input->post('ip_number');
		$id_produk = $this->input->post('id_produk');
		$harga = $this->input->post('harga');
		$berat_bersih = $this->input->post('berat_bersih');
		$berat_kotor = $this->input->post('berat_kotor');
		$quantity = $this->input->post('jumlah_beli');
		if($this->input->post('potongan')==""){
			$potongan = 0;
		}else{
			$potongan = $this->input->post('potongan');
		}
		
		$subtotal = $this->input->post('harga_jumlah');
		$berat_total = $berat_kotor * $quantity;

		$ambil_data = $this->toko_online_model->get_table_where2('keranjang_belanja', array('id_keranjang_belanja' => $ip, 'id_produk' => $id_produk));

		if ($ambil_data != null) {
			$quantity_new = $ambil_data[0]['jumlah_produk'] + $quantity;
			$subtotal_new = $ambil_data[0]['subtotal_belanja'] + $subtotal;
			$berat_total_new = $ambil_data[0]['berat_total'] + $berat_total;

			$data = array(
				'jumlah_produk' => $quantity_new,
				'subtotal_belanja' => $subtotal_new,
				'berat_total' => $berat_total_new
			);

			$update = $this->toko_online_model->update_table('keranjang_belanja', $data, array('id_keranjang_belanja' => $ip, 'id_produk' => $id_produk));
		} else {
			$data = array(
				'id_keranjang_belanja' 	=> $ip,
				'id'					=> rand(),
				'id_produk'				=> $id_produk,
				'harga_produk'			=> $harga,
				'berat_bersih'			=> $berat_bersih,
				'berat_kotor'			=> $berat_kotor,
				'jumlah_produk'			=> $quantity,
				'subtotal_belanja'		=> $subtotal,
				'berat_total'			=> $berat_total,
				'potongan'				=> $potongan
			);
			$insert = $this->toko_online_model->insert_table('keranjang_belanja', $data);
		}

		redirect(base_url('/user/home/produk_detail/' . $id_produk));
	}

	public function update_keranjang_belanja()
	{
		$id_produk = $this->input->post('id_produk');
		$id_keranjang_belanja = $this->input->post('id_keranjang_belanja');
		$quantity = $this->input->post('quantity');

		foreach ($id_produk as $id) {
			$where = array(
				'id_keranjang_belanja' 	=> $id_keranjang_belanja,
				'id_produk'				=> $id
			);
			$cek_q = $this->toko_online_model->get_table_where('keranjang_belanja', $where);
			if ($cek_q[0]['jumlah_produk'] != $quantity[$id]) {
				$data = array(
					'jumlah_produk' 	=> $quantity[$id],
					'subtotal_belanja'	=> $quantity[$id] * $cek_q[0]['harga_produk']
				);
				$this->toko_online_model->update_table('keranjang_belanja', $data, $where);
			}
		}

		redirect('user/home/cart/' . $id_keranjang_belanja);
	}

	public function remove_keranjang_belanja($id)
	{
		$where = array(
			'id' 	=> $id
		);
		$this->toko_online_model->delete_table('keranjang_belanja', $where);
		echo "<script>
				window.history.go(-1);
				location.reload();
		</script>";
	}

	public function cart()
	{
		$data['title'] = "Keranjang Belanja | blonjosam.com";
		$data['total'] = $this->toko_online_model->get_total('keranjang_belanja', array('id_keranjang_belanja' => $this->session->userdata('id_kpesan')), 'jumlah_produk', 'subtotal_belanja');
		//print_r($this->db->last_query());
		$data['jumlah'] = $this->toko_online_model->get_jumlah('keranjang_belanja', array('id_keranjang_belanja' => $this->session->userdata('id_kpesan')), 'jumlah_produk', 'berat_total');
		$data['cart'] = $this->toko_online_model->get_keranjang_belanja(array('keranjang_belanja.id_keranjang_belanja' => $this->session->userdata('id_kpesan')));
		$data['content'] = 'user/cart1';
		$this->load->view('user/dashboard1', $data);
	}



	function kontak()
	{
		$data_konten = $this->toko_online_model->get_table_where('konten', array('id_konten', 1));
		$data['data'] = $data_konten[0]['tentang'];
		$data['content'] = 'user/contact';
		$data['label'] = "Tentang";
		$this->load->view('user/dashboard1', $data);
	}

	function aturan()
	{
		$data_konten = $this->toko_online_model->get_table_where('konten', array('id_konten', 1));
		$data['data'] = $data_konten[0]['aturan'];
		$data['content'] = 'user/about1';
		$data['label'] = "Aturan Umum";
		$this->load->view('user/dashboard1', $data);
	}

	function panduan()
	{
		$data_konten = $this->toko_online_model->get_table_where('konten', array('id_konten', 1));
		$data['data'] = $data_konten[0]['panduan'];
		$data['content'] = 'user/about1';
		$data['label'] = "Panduan";
		$this->load->view('user/dashboard1', $data);
	}

	public function checkout()
	{
		$data['title'] = "Checkout | blonjosam.com";
		$data['konten'] = $this->toko_online_model->get_table('konten');
		$data['jumlah'] = $this->toko_online_model->get_jumlah('keranjang_belanja', array('id_keranjang_belanja' => $this->session->userdata('id_kpesan')), 'jumlah_produk', 'berat_total');
		$data['produk'] =
			$data['total'] = $this->toko_online_model->get_total('keranjang_belanja', array('id_keranjang_belanja' => $this->session->userdata('id_kpesan')), 'jumlah_produk', 'subtotal_belanja');
		$data['cart'] = $this->toko_online_model->get_keranjang_belanja(array('keranjang_belanja.id_keranjang_belanja' => $this->session->userdata('id_kpesan')));
		if ($data['cart'] == null) {
			$this->session->set_flashdata(
				'cart',
				'<div class="alert alert-danger" role="alert">
					Keranjang Belanja Kosong
				</div>'
			);
			$data['content'] = 'user/cart1';
			$this->load->view('user/dashboard1', $data);
		} else {
			$penjual = $this->toko_online_model->get_penjual_cart(array('keranjang_belanja.id_keranjang_belanja' => $this->session->userdata('id_kpesan')));
			$angka = 0;
			foreach ($penjual as $p) {
				$data_penjual[$angka] = $this->toko_online_model->get_table_where2('user', array('id_user' => $p['id_user']));
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
			$data['content'] = 'user/checkout1';
			$this->load->view('user/dashboard1', $data);
		}
	}

	function _api_ongkir_post($origin, $des, $qty, $cour)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $des . "&weight=" . $qty . "&courier=" . $cour,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				/* masukan api key disini*/
				"key: 8b273fb86a0e6550ac4b20b1104cfa48"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return $err;
		} else {
			return $response;
		}
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

	public function tarif($origin, $des, $qty, $cour)
	{
		$berat = $qty;
		$tarif = $this->_api_ongkir_post($origin, $des, $berat, $cour);
		$data = json_decode($tarif, true);
		echo json_encode($data['rajaongkir']['results']);
	}

	function load_stok($id){ //load data cart
		echo $this->show_stok($id);
	}

	function show_stok($id){
		$stok_produk = $this->toko_online_model->get_stok($id);
		$tengah = '';
		for ($i=1; $i <= $stok_produk[0]['jumlah_stok'] ; $i++) { 
		if($i == 1){
			  
			 $tengah =$tengah.'<option selected value="'.$i.'">'.$i.'</option>';
			
		  }
		  else{
		  
			  $tengah = $tengah.'<option value="'.$i.'">'.$i.'</option>';
			
		  }
		}

		$output = '';

		$output .= 
			$tengah
		;

		return $output;
	}

	function ajax_get_id($id_produk){
		$data = $this->toko_online_model->ajax_get_id($id_produk);
		echo json_encode($data);
	}

	function ajax_get_voucher($id_voucher){
		$data = $this->toko_online_model->ajax_get_voucher($id_voucher);
		echo json_encode($data);
	}
}
