<?php
class daerah_model extends CI_Model
{

    function get_kota()
    {
        $hasil = $this->db->query("SELECT * FROM kota");
        return $hasil;
    }

    function get_kecamatan($id)
    {
        $hasil = $this->db->query("SELECT * FROM subkategori WHERE id_kota_fk='$id'");
        return $hasil->result();
    }
}
