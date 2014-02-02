<?php
class M_Get_DB extends CI_Model
{
	function getAll($user, $password)
	{
		$query = $this->db->query("select fullname from users where username = '". $user ."' and password = '". $password ."'");
		$query->result();
		$row = $query->row();


		if($row == null)
		{
			return null;
		}
		return $row->fullname;
	}

	function getAllUsers()
	{
		$this->db->select("id, username, password, fullname");
	    $this->db->from('users');
	    $q = $this->db->get();

	    if($q->num_rows() > 0) 
	    {
	        return $q->result();
    	}
	}

	function insertUsers($data)
	{
		$this->db->insert("users", $data);

	
	}

	function editUsers($data,$USERID){
		$this->db->update("users", $data, "id = ".$USERID);

	}

	function deleteUser($data ){
		$this->db->update("users", $data, "id = 1");

	}

}