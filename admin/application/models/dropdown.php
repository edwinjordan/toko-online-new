 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Dropdown extends CI_Model
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
    }
