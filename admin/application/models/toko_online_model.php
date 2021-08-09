<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Toko_online_model extends CI_Model{
	
	function page_query($table, $order_by, $limit, $offset){
			$this->db->order_by($order_by,'DESC');
			$this->db->limit($limit, $offset);
			$query	= $this->db->get($table);
			if ($this->db->_error_message()) header('Location: ../');
			return $query->result_array();
		}
	
		function update_table($table, $data, $where) {

			$this->db->where($where);
	
			$query = $this->db->update($table, $data);
	
		}
	
}