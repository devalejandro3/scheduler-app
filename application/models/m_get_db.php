<?php
class M_Get_DB extends CI_Model
{
	function getAll($user, $password)
	{
		$query = $this->db->query("select fullname from users where username = '". $user ."' and password = '". $password ."' and isdeleted='N'");
		$query->result();
		$row = $query->row();


		if($row == null)
		{
			return null;
		}
		return $row->fullname;
	}

	function getAllUsers($userNames)
	{

		$this->db->select("id, username, password, fullname");
	    $this->db->from('users');
	    $this->db->where('isdeleted', 'N');
	    $this->db->where('username !=', $userNames);
	
	    $q = $this->db->get();

	    if($q->num_rows() > 0) 
	    {
	        return $q->result();
    	} else {return "";}
	}

	function insertUsers($data)
	{
		$this->db->insert("users", $data);

	
	}

	function editUsers($data,$USERID){
		$this->db->update("users", $data, "id = ".$USERID);

	}

	function deleteUser($data, $userId ){
		$this->db->update("users", $data, "id =". $userId);

	}

}