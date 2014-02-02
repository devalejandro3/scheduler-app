<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Default_Controller extends CI_Controller {

	
	var $name;
	var $color;

	function Default_Controller() {
       parent::__construct();       
   }

   function insertValues(){

   		$user = @$_POST['txtUsername'];
   		$password = @$_POST['txtPassword'];
   		$fullname = @$_POST['txtFullname'];

   		$this->load->model('m_get_db');
   		$newRow = array("id"=>null, 
   			"username" => $user,
   			"password"=>$password,
   			"fullname"=>$fullname);

   		$this->m_get_db->insertUsers($newRow);
   		echo "it has been added. <a href='http://localhost/scheduler-app/index.php/Default_Controller/homePage'>Return</a>";
   }

   function homePage(){
   		$data['title'] = 'Main View Title';
		$data['name'] = $this->name;
		$data['color'] = $this->color;
		

		$u =  @$_POST['txtUsername'];
		$p =  @$_POST['txtPassword'];


		$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';
		$data['listOfUsers'] = $this->function2();


		if($this->getUsers($u, $p ) != null){
			$data['row'] = $this->getUsers($u, $p );
			
			$this->load->view('v_Main2', $data);
		} else {
			$this->load->view('v_Main', $data);
		}

		

		// how to determine if row is empty




	


		
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
		echo "Success";
		//PHP HERE
		exit();

	}

	function function2(){
		$this->load->model('m_get_db');
		$result = $this->m_get_db->getAllUsers();

			$xxx = "";
			
			foreach($result as $test){
				
				$xxx .="<tr class = 'lvwUserMaintenance' id = ".$test->id."> <td >" . $test->id ."</td> <td>". $test->username ."</td> <td>" .$test->fullname ."</tr>";

			}	


		return $xxx;
		
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */