<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Default_Controller extends CI_Controller {

	
	var $name;
	var $color;

	function Default_Controller() {
       parent::__construct();       
   }

   function homePage(){
   		$data['title'] = 'Main View Title';
		$data['name'] = $this->name;
		$data['color'] = $this->color;
		

		$u =  @$_POST['txtUsername'];
		$p =  @$_POST['txtPassword'];

		$data['row'] = $this->getUsers($u, $p );



		$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';

		$this->load->view('v_Main2', $data);
   }

   function getUsers($u, $p){
   		$this->load->model('m_get_db');
   		return $this->m_get_db->getAll($u, $p);
   }



	public function index(){

		$data['title'] = 'Main View Title';
		$data['name'] = $this->name;
		$data['color'] = $this->color;
		$data['fullname'] = 'no name';

		$this->load->library('lib_menu');
		$menu = new lib_menu;
		$data['menus'] = $menu->showMenu();
	
		$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';

		$this->load->view('v_Main', $data);
	}

	

	function function1(){
		return "function1";

	}

	function function2(){
		return "function2";
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */