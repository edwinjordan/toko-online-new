<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Kota_model extends CI_Model
{

    public function view()
    {
        return $this->db->get_table('kota')->result(); // Tampilkan semua data yang ada di tabel provinsi
    }
}
