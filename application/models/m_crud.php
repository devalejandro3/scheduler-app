<?php

/*
	Common Class for Create Retrieve Update Delete

*/
class M_crud extends CI_Model{



	function createEntry($table, $data){
		$this->db->insert($table, $data);
	}


	/* 	Get all values from database
		$table - name of the entity
		Select * from table_name
	*/
	function retrieveAll($table){

		// $query = $this->db->query("select * from " . $table . " WHERE  valid ='1'");
		// $query->result();
		// $row = $query->row();

		// if($row == null) {
		// 	return null;
		// }
		// return $row;
		 $query = $this->db->select('*')->from($table)->get();
    return $query->result();
	




	}

	/*
		table
		data
		field
		key

		UPDATE $table SET $data WHERE $field = $key
	*/
	function updateRow($table, $data, $field, $key){
		$this->db->update($table, $data, $field . " = ".$key);
	}

	function delete(){

	}




}