<?php 

class m_menu extends CI_Model {

	function m_menu(){
		 parent::__construct();
		 $this->load->helper('url');
	}

	function general(){
		$this->load->library('lib_menu');
		$menu = new lib_menu;
		$data['menus'] = $menu->showMenu();
	}

}