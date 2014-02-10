<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();


class Default_Controller extends CI_Controller {

	
	var $name;
	var $color;

	function Default_Controller() {
       parent::__construct();    

   }

   function logout(){
   		
  			unset($_SESSION['username']);
  			unset($_SESSION['fullname']);

  			$data['header'] = "layout/view_header";
		
		$this->load->view('v_login', $data);
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
   		echo "it has been added. <a href='/scheduler-app/index.php/Default_Controller/homePage'>Return</a>";
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
		$data['listOfUsers'] = $this->listOfUsers();


		if($this->getUsers($u, $p ) != null || isset($_SESSION['username'])){

			if(isset($_SESSION['username'])){
				$u  = $_SESSION['username'];
				$f  = $_SESSION['fullname'];

				
			} else {
				$data['row'] = $this->getUsers($u, $p );
				$_SESSION['username']= $u;
				$_SESSION['fullname']=$data['row'];
			}
			
			$this->load->view('v_homepage', $data);
		} else {
			$this->load->view('v_login', $data);
		}

		

		// how to determine if row is empty
   }

   function userMaintenance(){
   		$data['title'] = 'Main View Title';
		$data['name'] = $this->name;
		$data['color'] = $this->color;

		$u =  @$_POST['txtUsername'];
		$p =  @$_POST['txtPassword'];	

		$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';
		$data['listOfUsers'] = $this->listOfUsers();


		if($this->getUsers($u, $p ) != null || isset($_SESSION['username'])){

			if(isset($_SESSION['username'])){
				$u  = $_SESSION['username'];
				$f  = $_SESSION['fullname'];

				
			} else {
				$data['row'] = $this->getUsers($u, $p );
				$_SESSION['username']= $u;
				$_SESSION['fullname']=$data['row'];
			}
			

			

			
			$this->load->view('v_userMaintenance', $data);
		} else {
			$this->load->view('v_login', $data);
		}
   }

   function getUsers($u, $p)
   {
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
		$this->load->view('v_login', $data);
		//this is a comment
		// Thiis another changes
		//this is the comment #3
		
	}

	

	function UpdateMaintenance(){
		$this->load->model("m_crud");
		$userNames 	= @$_POST['txtUsername'];
		$fname 		= @$_POST['txtFullname'];
		$pass 		= @$_POST['txtPassword'];
		$hiddenID	= @$_POST['UserID'];
		 $newRow = array(
		 "username" => $userNames,
		 "fullname" => $fname,
		 "password" => $pass
		 );
		 $this->m_crud->updateRow('users',$newRow,'id',$hiddenID);
	}

	function listOfUsers(){
		$userNames 	= (isset($_SESSION['username']) ? $_SESSION['username'] : @$_POST['txtUsername']);
		$this->load->model('m_get_db');
		$result = $this->m_get_db->getAllUsers($userNames);

			$xxx = "";
			if($result != null){
				foreach($result as $test){
				
				$xxx .="<tr>
				<input type='hidden' name='a".$test->id."' id='a".$test->id."' value = ".$test->username.">
				<input type='hidden' name='f".$test->id."' id='f".$test->id."' value = ".$test->fullname.">
				<td  class = 'lvwUserMaintenance' id = ".$test->id." name= ".$test->id.">" . $test->id 
				."</td> <td  class = 'lvwUserMaintenance' id = ".$test->id." >". $test->username 
				."</td> <td  class = 'lvwUserMaintenance' id = ".$test->id." >" .$test->fullname ." </td> 
				<td><input type='button' value='Delete' class='delUser' id=".$test->id."></td></tr>";

				}	
			} else {
				$xxx .= "<td style='text-align:center' colspan='4'>No Result Found" 
				."</td>";
			}
		return $xxx;
	}


	function deleteUser() {
		$this->load->model("m_get_db");
		$hiddenID	= @$_POST['UserID'];
		 $newRow = array(
		 "ISDELETED" => "Y"
		 );
		 $this->m_get_db->deleteUser($newRow,$hiddenID);
		 return "Nabura ba?";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */ 
