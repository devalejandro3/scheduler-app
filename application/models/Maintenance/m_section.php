<?php

class M_Section extends CI_Model{
	function retrieveSectionBy($table, $field, $key){
    	$this->db->select('*');
        $this->db->from($table);
        $this->db->where($field, $key);
        $this->db->where('valid', '1');
        $query = $this->db->get();
        return $query->result();
	}
}