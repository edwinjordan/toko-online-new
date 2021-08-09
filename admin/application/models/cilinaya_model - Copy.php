<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cilinaya_model extends CI_Model
{

	public function kota()
	{
		$dw_a = $this->db->get("kota")->result_array();
		return $dw_a;
	}

	public function kecamatan()
	{
		$dw_b = $this->db->get("vw_kecamatan")->result_array();
		return $dw_b;
	}

	public function kelurahan()
	{
		$dw_c = $this->db->get("vw_kelurahan")->result_array();
		return $dw_c;
	}

	public function get_agenda_tiket()
	{
		return $this->db->query("SELECT id_agenda,tema FROM agenda")->result_array();
	}
	public function get_harga_tiket($key)
	{
		return $this->db->query("SELECT * FROM agenda WHERE id_agenda ='$key'")->result_array();
	}
	public function get_total_harga_tiket($key)
	{
		return $this->db->query("SELECT * FROM agenda WHERE id_agenda ='$key'")->row_array();
	}
	public function insert_db_tiket($kode, $username, $email, $alamat, $telp, $noktp, $nama_foto, $acara, $harga_tik, $qty, $total_harga, $date)
	{
		$db = $this->db->query("
			INSERT INTO tiketonline VALUES('$kode','$username','$email','$alamat','$telp','$noktp','$nama_foto','$acara','$harga_tik','$qty','$total_harga','$date','Belum Bayar')
			");
	}

	public function get_detail_tiket($kode)
	{
		return $this->db->query("SELECT * FROM tiketonline WHERE kode_booking = '$kode'")->result_array();
	}

	function insert_db_konfirmasi($kode, $email, $noktp, $acara, $tgltransfer, $nabank, $bank, $total_trans, $nama_asli)
	{
		$db = $this->db->query("INSERT INTO konfirmasitiket VALUES('$kode','$email','$noktp','$acara','$tgltransfer','$nabank','$bank','$total_trans','$nama_asli')
			");
	}
	public function get_invoice_tiket($kode)
	{
		return $this->db->query("SELECT * FROM tiketonline WHERE kode_booking ='$kode'")->result_array();
	}

	public function get_invoice_konfirm($kode)
	{
		return $this->db->query("SELECT * FROM konfirmasitiket WHERE kode_booking ='$kode'")->result_array();
	}

	function list_konfirmasi_pembayaran()
	{
		return $this->db->query("SELECT * FROM tiketonline  ORDER BY tgl_daftar ASC")->result_array();
	}

	function get_detail_pembayaran($kode)
	{
		$sq = $this->db->query("
			SELECT b.tema, a.*,c.* FROM tiketonline a, agenda b, konfirmasitiket c 
			WHERE 
			b.id_agenda = c.id_agenda 
			&& c.kode_booking = a.kode_booking
			&& c.kode_booking ='$kode'");
		return $sq;
	}

	function page_query($tbl)
	{
		$q = $this->db->query("SELECT * FROM $tbl");
		return $q;
	}

	function multiple_query($tbl1, $tbl2, $id1, $id2, $limit, $offset)
	{
		$q = $this->db->query("SELECT * FROM $tbl1 a, $tbl2 b WHERE a.$id1 = b.$id2 LIMIT $offset,$limit");
		return $q;
	}

	function get_testimonial($limit)
	{
		return $this->db->query("SELECT * FROM testimonial ORDER BY id_testimonial DESC LIMIT $limit")->result_array();
	}

	function get_about_us()
	{
		return $this->db->query("SELECT * FROM profil  LIMIT 1")->result_array();
	}

	function get_kontak()
	{
		return $this->db->query("SELECT * FROM kontak LIMIT 1")->result_array();
	}

	function get_all_produk()
	{
		return $this->db->query("SELECT * FROM produk")->result_array();
	}

	function get_produk_ada()
	{
		return $this->db->query("SELECT * FROM produk WHERE stok = 'Ada'")->result_array();
	}

	public function getData()
	{
		$res = $this->db->query('select * from produk');
		return $res->result_object();
	}
	function get_special_limit($table, $start, $limit)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get($table);
		return ($query->num_rows() > 0)  ? $query->result_array() : FALSE;
	}
	function get_table_rows($table)
	{
		$query	= $this->db->get($table);
		if ($this->db->_error_message()) header('Location: ../');
		return $query->num_rows();
	}
}
