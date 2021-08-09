<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kec_model extends CI_Model
{

    public function viewByKota($id_kota)
    {
        $this->db->where('id_kota', $id_kota);
        $result = $this->db->get_table('kecamatan')->result(); // Tampilkan semua data kota berdasarkan id provinsi

        return $result;
    }
}
