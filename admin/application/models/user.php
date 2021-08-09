<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    var $table_name 	= 'user';
    var $primary_key 	= 'id_user';
	var $record_count;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get($id)
    {
		$this->db->where($this->primary_key,$id);
        $query = $this->db->get($this->table_name);
        return ($query->num_rows() > 0)  ? $query->result_array() : FALSE;
    }
	
	function getByName($user)
    {
		$this->db->where('user',$user);
        $query = $this->db->get($this->table_name);
        return ($query->num_rows() > 0)  ? $query->result_array() : FALSE;
    }

    function insert($data)
    {
        $this->db->insert($this->table_name, $data);
		echo $this->db->insert_id();
    }

    function update($data,$id)
    {
        $this->db->where($this->primary_key, $id);
		$this->db->update($this->table_name, $data);
		return "ok";
    }
	
	function delUser($id)
    {
		$this->db->where($this->primary_key,$id);
        $this->db->delete($this->table_name);
    }
	
	function record_count()
	{
		return $this->db->count_all($this->table_name);
	}
	
	function fetch_record($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by($this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);
		return ($query->num_rows() > 0)  ? $query->result() : FALSE;
	}
	
	function oldPass($id){
		$this->db->select('pass');
		$this->db->where($this->primary_key, $id);
		$query = $this->db->get($this->table_name);
		return $query->result_array();
	}

}

?>