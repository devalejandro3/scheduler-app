<?php

class lib_menu{
	function showMenu(){
		$obj =& get_instance();
		$obj->load->helper('url');
		$menu = "<ul>";
		$menu .= "<li>";
		$menu .= anchor('Default_Controller/function1', "List of Books");
		$menu .="</li>";
		$menu .="<li>";
		$menu .= anchor('Default_Controller/function2', "Input Book");
		$menu .= "</li>";
		$menu .= "</ul>";
		return $menu;
	}
}