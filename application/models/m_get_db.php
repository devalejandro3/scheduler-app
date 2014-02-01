<?php
class M_Get_DB extends CI_Model{
	function getAll($user, $password){
		$query = $this->db->query("select fullname from users where username = '". $user ."' and password = '". $password ."'");
		$query->result();
		$row = $query->row();
		return $row->fullname;
	}
}