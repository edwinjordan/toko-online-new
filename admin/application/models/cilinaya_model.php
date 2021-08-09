<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cilinaya_model extends CI_Model
{

	public function get_kota()
	{
		$this->db->order_by('nama_kota', 'asc');
		return $this->db->get('kota')->result();
	}

	public function get_kecamatan()
	{
		// kita joinkan tabel kota dengan provinsi
		$this->db->order_by('nama_kecamatan', 'asc');
		$this->db->join('kota', 'kecamatan.id_kota_fk = kota.id_kota');
		return $this->db->get('kecamatan')->result();
	}

	public function get_kelurahan()
	{
		// kita joinkan tabel kecamatan dengan kota
		$this->db->order_by('nama_kelurahan', 'asc');
		$this->db->join('kecamatan', 'kelurahan.id_kecamatan_fk = kecamatan.id_kecamatan');
		return $this->db->get('kelurahan')->result();
	}


	// untuk edit ambil dari id level paling bawah
	public function get_selected_by_id_kelurahan($id_kelurahan)
	{
		$this->db->where('id_kelurahan', $id_kelurahan);
		$this->db->join('kecamatan', 'kelurahan.id_kecamatan_fk = kecamatan.id_kecamatan');
		$this->db->join('kota', 'kecamatan.id_kota_fk = kota.id_kota');
		return $this->db->get('kelurahan')->row();
	}

	function page_query($table, $order_by, $limit, $offset)
	{
		$this->db->order_by($order_by, 'DESC');
		$this->db->limit($limit, $offset);
		$query	= $this->db->get($table);
		if ($this->db->_error_message()) header('Location: ../');
		return $query->result_array();
	}

	function get_table($table)
	{
		$query	= $this->db->get($table);

		if ($this->db->_error_message()) header('Location: ../');
		return $query->result_array();
	}

	function get_table_order($table, $order)
	{
		$this->db->order_by($order, "ASC");
		$this->db->where('status_order !=5');
		$query	= $this->db->get($table);
		if ($this->db->_error_message()) header('Location: ../');
		return $query->result_array();
	}

	function get_table_desc($table, $order)
	{
		$this->db->order_by($order, "DESC");
		$this->db->where('status_order !=5');
		$query	= $this->db->get($table);
		if ($this->db->_error_message()) header('Location: ../');
		return $query->result_array();
	}

	function insert_table($table, $data)
	{
		$query	= $this->db->insert($table, $data);
		return $query;
	}

	function get_table_where($table, $where)
	{
		$this->db->where($where);
		$query	= $this->db->get($table);

		//		if ($query->num_rows() > 0) {
		//			return $query->result_array();
		//		} else {
		//			return false;
		//		}

		if ($this->db->_error_message()) header('Location: ../');
		return $query->result_array();
	}

	function update_table($table, $data, $where)
	{
		$this->db->where($where);
		$query	= $this->db->update($table, $data);
		return $query;
	}

	function update_table_all($table, $data)
	{
		//$this->db->where($where);
		$query	= $this->db->update($table, $data);
	}

	function get_table_join_limit_order_by($from, $join, $where, $limit, $order_by)
	{
		$this->db->select('*');
		$this->db->from($from);
		$this->db->join($join, $where);
		$this->db->limit($limit);
		$this->db->order_by($order_by, 'DESC');
		$query	= $this->db->get();
		if ($this->db->_error_message()) header('Location: ../');
		return $query->result_array();
	}

	function get_kategori_menu($from, $limit, $order_by)
	{
		$this->db->select('*');
		$this->db->from($from);
		$this->db->limit($limit);
		$this->db->order_by($order_by, 'DESC');
		$query	= $this->db->get();
		if ($this->db->_error_message()) header('Location: ../');
		return $query->result_array();
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

	function delete_table($table, $where)
	{
		$this->db->delete($table, $where);
	}


	public function get_all_tentang()
	{
		$hasil = $this->db->select('tentang,id_konten')
			->from('konten')
			->get();
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function get_all_aturan()
	{
		$hasil = $this->db->select('aturan,id_konten')
			->from('konten')
			->get();
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}



	public function get_all_panduan()
	{
		$hasil = $this->db->select('panduan,id_konten')
			->from('konten')
			->get();
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function insert_konten($data)
	{
		$this->db->insert('konten', $data);
		redirect('profil/show_profil', 'refresh');
	}

	public function select_konten_id($id)
	{
		$hasil = $this->db->select('*')
			->from('konten')
			->limit(1)
			->where('id_konten', $id)
			->get();
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function select_aturan_id($id)
	{
		$hasil = $this->db->select('aturan,id_konten')
			->from('konten')
			->limit(1)
			->where('id_konten', $id)
			->get();
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function update_konten($id)
	{
		$data = array(
			'tentang' => $this->input->post('deskripsi')
		);
		$this->db->where('id_konten', $id)
			->update('konten', $data);
	}

	public function update_aturan($id)
	{
		$data = array(
			'aturan'  => $this->input->post('aturan')
		);
		$this->db->where('id_konten', $id)
			->update('konten', $data);
		redirect('profil/show_profil');
	}

	public function update_panduan($id)
	{
		$data = array(
			'panduan'  => $this->input->post('panduan')
		);
		$this->db->where('id_konten', $id)
			->update('konten', $data);
		redirect('profil/show_profil');
	}


	public function null_konten($id)
	{
		$this->db->where('id_konten', $id)
			->set('tentang', '')
			->update('konten');
		redirect('profil/show_profil', 'refresh');
	}

	public function null_aturan($id)
	{
		$this->db->where('id_konten', $id)
			->set('aturan', '')
			->update('konten');
		redirect('profil/show_profil', 'refresh');
	}

	public function get_produk_data($table)
	{
		$this->db->select('*')
			->from($table)
			->join('kategori_produk', $table . '.kategori_produk = kategori_produk.id_kategori_produk');
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get();
	}

	public function getSlider()
	{
		return $this->db->get('slider')->result_array();
	}
	public function getKonten()
	{
		return $this->db->get('konten')->result_array();
	}

	public function inputData($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->affected_rows();
	}

	public function getWhere($table, $where)
	{
		$this->db->where($where);
		return $this->db->get($table)->result_array();
	}

	public function update($table, $where, $data)
	{
		$this->db->where($where)->update($table, $data);
	}
}
