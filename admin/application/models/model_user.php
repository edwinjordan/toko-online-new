<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model
{

	function where($where){		
		//$this->db->join('tab_akses_menu','tab_akses_menu.id_posisi=karyawan.id_posisi');
		return $this->db->get_where('admin',$where);
    }
}    