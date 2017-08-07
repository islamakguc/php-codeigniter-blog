<?php
class Database_Model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	public function insert_data($table,$data)
	{
		$this -> db -> insert($table, $data);
		return true;
	}
	public function update_data($table,$data,$id)
	{
		$this -> db -> where("id", $id);
		$this -> db -> update($table, $data);
		return true;
	}
	public function delete_data($table,$id)
	{
		$this->db->delete("$table",array('id' => $id));
	}
	public function get_data($table)
	{
		$query=$this->db->get($table);
		return $query->result();
	}
	public function get_data_id($table,$id)
	{
		$this -> db -> where("id", $id);
		$query=$this->db->get($table);
		return $query->result();
	}
	public function get_data_new($table,$sutun,$id)
	{
		$this -> db -> where($sutun, $id);
		$query=$this->db->get($table);
		return $query->result();
	}
	
}