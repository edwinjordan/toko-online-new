<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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

	function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('toko_online_model');
        date_default_timezone_set("Asia/Jakarta");
    }

	public function index()
	{	
		echo "order_index";
	}

	public function konfirmasi_checkout(){

		// $pembeli = array(
		// 	'fullname'	=> $this->input->post('fullname'),
		// 	'email'		=> $this->input->post('email'),
		// 	'phone'		=> $this->input->post('phone'),
		// 	'address'	=> $this->input->post('kodepos'),
		// 	'provinsi'	=> $this->input->post('provinsi'),
		// 	'kota'		=> $this->input->post('kota')

		// 	);
		// $penjual = $this->toko_online_model->get_penjual_cart(array('keranjang_belanja.id_keranjang_belanja'=> $_SERVER['REMOTE_ADDR']));
		// $angka = 0;
		// foreach ($penjual as $p) {
		// 	$data_penjual[$angka] = $this->toko_online_model->get_table_where('user', array('id_user' => $p['id_user']));
		// 	$data_penjual[$angka]['ongkos_penjual'.$p['id_user']] = $this->input->post('ongkos_penjual'.$p['id_user']);
		// 	$data_penjual[$angka]['produk'] = $this->toko_online_model->get_produk_penjual_cart(array('keranjang_belanja.id_keranjang_belanja' =>  $_SERVER['REMOTE_ADDR'], 'produk.id_user' => $p['id_user']));
		// 	// print_r($data_penjual[$angka]['produk']);
		// 	// echo "<br><br><br>";
			
		// 	$angka++;
		// }
		// $data['pembeli'] = $pembeli;
		// $data['content'] = 'user/konfirmasi_checkout';
		// $data['data_penjual'] = $data_penjual;
		// $this->load->view('user/dashboard', $data);

		
	}

	public function simpan()
	{	
		// if(($nama == '') || ($alamat  == '') || ($hp == '' || $prov == '' || $kota == '' || $kodepos == ''  || $total == 0 || !(is_numeric($ongkos)) )  ){
		// 	redirect("keranjang_belanja/check_out?error=ok");
		// }
		// echo $this->input->post('totalsimpan');

		$today = date("ymd"); //digunakan untuk menentukan format tanggal dan juga memanggil data tanggal saat ini.
		$query = $this->db->query("SELECT max(id_order) AS last FROM `order` WHERE id_order LIKE '%$today%'");
		$data = $query->result_array();
		$last_id_order = $data[0]['last'];

		$last_no_urut  = substr($last_id_order, 7, 3); //memecah string yang ada di id order terakhir untuk membedakan tanggal dengan id yang di buat increment
		$next_no_urut  = $last_no_urut + 1;
		$next_id_order = "T".$today.sprintf('%03s', $next_no_urut); //menentukan huruf 'T' disetiap awal transaksi, di ikuti dengan tanggal sekarang, kemudian nomer id

		$nama 			= $this->input->post('fullname');
		$email			= $this->input->post('email');
		$phone			= $this->input->post('phone');
		$address		= $this->input->post('address');
		$desprovince	= $this->input->post('provinsi');
		$descity		= $this->input->post('kota');
		$kodepos		= $this->input->post('kodepos');
		$total 			= $this->input->post('totalsimpan');

		// echo $total;
		// $data_order = $this->toko_online_model->get_keranjang_belanja(array('keranjang_belanja.id_keranjang_belanja'=> $_SERVER['REMOTE_ADDR']));
		// foreach ($data_order as $d) {
		// 	$where = array(
		// 		'id_order' 		=> $next_id_order,
		// 		'id_penjual'	=> $d['id_user'],
		// 		'nama_order'	=> $nama_order,
		// 		''
		// 		);
		// 	$cek_data = $this->toko_online_model->
		// }

		$data_insert = array(
			'id_order'		=> $next_id_order,
			'tgl_order'		=> date("Y/m/d"),
			'total_order'	=> $total,
			'status_order'	=> 1,
			'nama_order'	=> $nama,
			'email_order'	=> $email,
			'alamat_order'	=> $address,
			'tlp_order'		=> $phone,
			'kode_pos_order'=> $kodepos,
			'provinsi_order'=> $desprovince,
			'kota_order'	=> $descity
			);
		$insert_order = $this->toko_online_model->insert_table('order', $data_insert);
		if($insert_order){
			$data_order = $this->toko_online_model->get_keranjang_belanja(array('keranjang_belanja.id_keranjang_belanja'=> $_SERVER['REMOTE_ADDR']));
			// print_r($data_order);
			foreach ($data_order as $d) {
				$where = array(
					'id_order' 		=> $next_id_order,
					'id_penjual'	=> $d['id_user'],
					'id_produk'		=> $d['id_produk']
				);
				$cek_data = $this->toko_online_model->get_table_where('detail_order', $where);
				if($cek_data == null){
					$data_produk = $this->toko_online_model->get_table_where('produk', array('id_produk'=>$d['id_produk']));

					$prosentase_pajak	=	100-$data_produk[0]['pajak'];
					$harga_pajak		=	($prosentase_pajak/100)*$data_produk[0]['harga'];

					$subtotal_pajak		=	$d['jumlah_produk']*$harga_pajak;

					$data = array(
						'id_order'		=> $next_id_order,
						'id_penjual' 	=> $d['id_user'],
						'id_produk'		=> $d['id_produk'],
						'jumlah_produk'	=> $d['jumlah_produk'],
						'berat_produk'	=> $d['jumlah_produk'] * $d['berat'],
						'harga'			=> $d['harga_produk'],
						'harga_pajak'	=> $harga_pajak,
						'subtotal'		=> $d['subtotal_belanja'],
						'subtotal_pajak'=>	$subtotal_pajak
						);
					$insert_data = $this->toko_online_model->insert_table('detail_order',$data);
					$total_ongkir = 0;
					if($insert_data){
						$penjual = $this->toko_online_model->get_penjual_cart(array('keranjang_belanja.id_keranjang_belanja'=> $_SERVER['REMOTE_ADDR']));
						foreach ($penjual as $p) {
							$total_ongkir = $total_ongkir +  $this->input->post('ongkos_penjual'.$p['id_user']);
							$data = array(
								'ongkir'		=> $this->input->post('ongkos_penjual'.$p['id_user']),
								'id_order'		=> $next_id_order,
								'id_penjual'	=> $p['id_user'],
								'jasa_pengiriman'=>	$this->input->post('jenis_layanan_ongkir'.$p['id_user'])
								);
							$insert_ongkir = $this->toko_online_model->insert_table('ongkir_pembeli', $data);
							$where = array(
								'id_order' 		=> $next_id_order,
								'id_penjual'	=> $p['id_user']
								);
							$id_akhir = $this->toko_online_model->select_table_order_limit('id_ongkir', 'ongkir_pembeli', 'id_ongkir', 1);
							//$update_ongkir_detail_order = $this->toko_online_model->update_table('detail_order', array('id_ongkir_pembeli' => $id_akhir[0]['id_ongkir']), $where);
						}
						$total_ongkir=0;
						$data_ongkir=$this->toko_online_model->get_table_where("ongkir_pembeli",array('id_order'=>$next_id_order));
						foreach ($data_ongkir as $key) {
							$total_ongkir=$total_ongkir+$key['ongkir'];
						}
						$update_ongkir_order = $this->toko_online_model->update_table('order', 
																					  array('ongkir_order' => $total_ongkir, 'grand_total_order' => $total_ongkir+$total),
																					  array('id_order' => $next_id_order));
						$where = array('id_keranjang_belanja' => $_SERVER['REMOTE_ADDR']);
						$delete_keranjang = $this->toko_online_model->delete_table('keranjang_belanja',$where);
					}
					else{
						$berhasil = 0;
					}
				}
			}
			$data['content'] = "user/create_id_order";
			$data['id_order'] = $next_id_order;
			redirect(base_url('user/order/konfirmasi_bayar/'.$next_id_order));
			
		}
		else{
			echo "gagal,ada kesalahan";
		}
	}

	public function konfirmasi_pembayaran(){
		$data['content'] = 'user/konfirmasi_pembayaran';
		$this->load->view('user/dashboard', $data);
	}

	public function search_order($id_order){
		if($id_order == '0'){
			$id_order = $this->input->post('id_order');
		}
		$data_penjual = array();
		$angka = 0;
		$penjual = $this->toko_online_model->get_penjual_order(array('id_order' => $id_order));
		// print_r($data_penjual);
		foreach ($penjual as $p) {
			$data_penjual[$angka] = $this->toko_online_model->get_order(array('id_order' => $id_order, 'id_penjual' => $p['id_penjual']));
			$angka++;
		}
		$data['data_penjual'] = $data_penjual;
		$data_order = $this->toko_online_model->get_table_where('order', array('id_order' => $id_order));

		// print_r($data['data_penjual']);
			if($data_order[0]['status_order'] == 1){
				$data['status_order'] = "Belum melakukan pembayaran, Silahkan lakukan pembayaran";
			}
			elseif($data_order[0]['status_order'] == 2){
				$data['status_order'] = "Menunggu Konfirmasi admin, silahkan tunggu selama 2x24 jam";
			}
			elseif($data_order[0]['status_order'] == 3){
				$data['status_order'] = "Admin telah menghubungi penjual untuk segera mengirim pesanan";
			}
			elseif($data_order[0]['status_order'] == 4){
				$data['status_order'] = "Penjual Telah mengirim pesanan";
			}
			elseif($data_order[0]['status_order'] == 5){
				$data['status_order'] = "Pesanan telah diterima pembeli,terima kasih";
			}
			$data['content'] = 'user/form_konfirmasi_pembayaran';
			$data['data_order'] = $data_order;
			$this->load->view('user/dashboard',$data);

	}
	
	function konfirmasi_bayar($next_id_order=null){
		$data['order']=$this->toko_online_model->get_table_where('order', array('id_order' => $next_id_order));
		$data['detail_order']=$this->toko_online_model->get_table_join_where('detail_order','produk','detail_order.id_produk=produk.id_produk', array('id_order' => $next_id_order));
		$data['bank']=$this->db->query("select * from data_bank")->result_array();
		$data['content'] = "user/create_id_order";
			$data['id_order'] = $next_id_order;
			$this->load->view('user/dashboard',$data);
	}

	public function form_konfirmasi_pembayaran(){
		$id_order 		= $this->input->post('id_order');
		$tanggal_order 	= $this->input->post('tanggal_transfer');
		$nama_pemilik	= $this->input->post('nama_pemilik');
		$no_rekening	= $this->input->post('no_rekening');
		$bank			= $this->input->post('bank');
		$total_transfer	= $this->input->post('total_transfer');

		$data_insert = array(
			'tgl_konfirmasi'	=> $tanggal_order,
			'id_order'			=> $id_order,
			'jumlah_bayar'		=> $total_transfer,
			'bank_bayar'		=> $bank,
			'rekening_bayar'	=> $no_rekening,
			'nama_bayar'		=> $nama_pemilik
			);

		$insert_konfirmasi_bayar = $this->toko_online_model->insert_table('konfirmasi_bayar',$data_insert);
		if($insert_konfirmasi_bayar){
			$data = array('status_order' => 2 );
			$where = array('id_order' => $id_order);
			$update_status_order = $this->toko_online_model->update_table('order',$data,$where);
			redirect('user/order/search_order/'.$id_order);
		}
		else{
			echo "<script>
				alert('Maaf, ada kesalahan pengisian Formulir');
				window.history.go(-1);

		</script>";	
		}
	}

	public function komplain_barang($id_detail_order=null){

		$data_order= $this->toko_online_model->get_table_where('detail_order', array('id_detail_order' => $id_detail_order ));
		$user= $this->toko_online_model->get_table_where('user', array('id_user' => $data_order[0]['id_penjual'] ));
		$order= $this->toko_online_model->get_table_where('order', array('id_order' => $data_order[0]['id_order'] ));

		$produk= $this->toko_online_model->get_table_where('produk', array('id_produk' => $data_order[0]['id_produk'] ));


		$data_komplain= $this->toko_online_model->get_table_where('komplain_barang', array('id_detail_order' => $id_detail_order ));
		// $id_detail_order= $this->input->post('id_detail_order');
		// $data_detail_order = $this->toko_online_model->get_order(array('id_detail_order' => $id_detail_order));
		// $data_order= $this->toko_online_model->get_table_where('order', array('id_order' => $data_detail_order[0]['id_order']));
		// $data_penjual = $this->toko_online_model->get_table_where('user', array('id_user' => $data_detail_order[0]['id_penjual']));

		
		$data = array(
				'data_order'			=> $data_order,
				'user'		=>	$user,
				'order'		=> $order,
				'produk'	=>	$produk,
				'komplain_barang'	=>	$data_komplain
			
			);
		$data['content'] = 'user/komplain_barang';
		$this->load->view('user/dashboard', $data);
	}

	public function simpan_komplain_barang(){
		$id_detail_order = $this->input->post('id_detail_order');
		$id_penjual = $this->input->post('id_penjual');
		$pesan_komplain = $this->input->post('pesan_komplain');

		$jenis_komplain = $this->input->post('jenis_komplain');

		$jumlah_produk_komplain = $this->input->post('jumlah_produk_komplain');

		$data_insert = array(
				'id_detail_order'		=> $id_detail_order,
				'id_penjual'			=> $id_penjual,
				'pesan_komplain'		=> $pesan_komplain,
				'bukti_komplain'		=> '',
				'jumlah_produk_komplain'=>	$jumlah_produk_komplain,
				'jenis_komplain'		=>	$jenis_komplain,
				'tgl_komplain'			=>	date("Y-m-d")
				);
		
		$insert =$this->toko_online_model->insert_table('komplain_barang', $data_insert);
		if($insert){
			
                        $foto1 = $_FILES['foto1']['name'];
                        $ext_foto1 = pathinfo($foto1, PATHINFO_EXTENSION);
                        $nama_foto_bukti = 'bukti_' . $id_detail_order.$jenis_komplain.$pesan_komplain;
                        $config['upload_path'] = './assets/img/bukti_komplain/';
                        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
                        $config['file_name'] = 'foto_' . $nama_foto_bukti;
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        $this->upload->do_upload('foto1');

                        $data_gambar=$this->upload->data();


            $where = array(
            	'id_detail_order'		=> $id_detail_order,
            	'id_penjual'			=> $id_penjual 
            	);
            $update = $this->toko_online_model->update_table('komplain_barang', array('bukti_komplain' =>  $data_gambar['file_name']), $where);


            $dtl = $this->toko_online_model->update_table('detail_order', array('status_detail_komplain' =>  1),array('detail_order.id_detail_order' => $id_detail_order) );

            // $update_status_order = $this->toko_online_model->update_table('order',array('status_order' => 5) , array('id_order' => $id_order));
            // $update_status_pengiriman = $this->toko_online_model->update_table('detail_order',array('status_kirim' => 2) , array('id_order' => $id_order, 'id_penjual' => $id_penjual));
            // $cek_status_kirim = $this->toko_online_model->get_table_where('detail_order' , array('id_order' => $id_order , 'status_kirim' => 1));
            // if($cek_status_kirim == null){
            // 	 $update_status_order = $this->toko_online_model->update_table('order',array('status_order' => 5) , array('id_order' => $id_order));
            // }
		}
		$detail_order = $this->toko_online_model->get_order(array('detail_order.id_detail_order' => $id_detail_order));
		$get_penjual = $this->toko_online_model->get_table_where('user', array('id_user' => $id_penjual));
		$data = array(
				'nama_penjual'	=> $get_penjual[0]['nama'],
				'id_order'		=> $detail_order[0]['id_order'],
				'detail_order'	=> $detail_order
			);

		$data['content'] = 'user/komplain';
		$this->load->view('user/dashboard', $data);
		
		
	}

	public function refund_uang(){
		$id_detail_order= $this->input->post('id_detail_order');
		$data_detail_order = $this->toko_online_model->get_order(array('id_detail_order' => $id_detail_order));
		$data_order= $this->toko_online_model->get_table_where('order', array('id_order' => $data_detail_order[0]['id_order']));
		$data_penjual = $this->toko_online_model->get_table_where('user', array('id_user' => $data_detail_order[0]['id_penjual']));

		
		$data = array(
				'produk'			=> $data_detail_order,
				'data_order'		=> $data_order,
				'penjual'			=> $data_penjual
			);
		$data['content'] = 'user/refund_uang';
		$this->load->view('user/dashboard', $data);
	}

	public function simpan_refund_uang(){
		$id_detail_order	= $this->input->post('id_detail_order');
		$no_rekening		= $this->input->post('no_rekening');
		$atm				= $this->input->post('atm');
		$nama_penerima		= $this->input->post('nama_penerima');

		$data_insert = array(
				'id_detail_order'	=> $id_detail_order,
				'no_rekening'		=> $no_rekening,
				'ATM'				=> $atm,
				'nama_penerima'		=> $nama_penerima
			);

		$insert = $this->toko_online_model->insert_table('data_refund', $data_insert);
		if($insert){
			$this->toko_online_model->update_table('detail_order', array('status_kirim' => 3), array('id_detail_order'=> $id_detail_order));
		}

		$data_order = $this->toko_online_model->get_order(array('id_detail_order' => $id_detail_order));
		$data = array(
			'no_rekening'	=> $no_rekening,
			'atm'			=> $atm,
			'nama_penerima'	=> $nama_penerima,
			'data_order'	=> $data_order,
			'content'		=> 'user/refund',
			'id_order'		=> $data_order[0]['id_order']
			);

		$this->load->view('user/dashboard', $data);
	}


	function konfirmasi_pengembalian_barang(){
		//var_dump($this->input->post());

		$data_insert=array(
			'id_komplain_barang'	=>	$this->input->post('id_komplain'),
			'id_detail_order'	=>	$this->input->post('id_detail_order'),
			'id_order'	=>	$this->input->post('id_order'),
			'no_resi_pengembalian'=>$this->input->post('no_resi'),
			'no_rek'=>$this->input->post('no_rek'),
			'jenis_bank'=>$this->input->post('jenis_bank'),
			
			'nama_rek'=>$this->input->post('nama_rek')

		);

		$insert = $this->toko_online_model->insert_table('konfirmasi_pengembalian_produk', $data_insert);

		$this->toko_online_model->update_table('komplain_barang', array('status_komplain' => "Disetujui dan Dalam Proses Pengiriman"), array('id_detail_order'=> $this->input->post('id_detail_order')));

		redirect(base_url('user/order/komplain_barang/'.$this->input->post('id_detail_order')));
	}


	
}
