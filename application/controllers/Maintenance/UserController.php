<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class UserController extends CI_Controller {

	function UserController() {
       parent::__construct();       
   }

   	function users(){	
   	$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';
		$data['usersList'] = $this->getListOfUsers();
	   $data['content'] = 'ajaxDivs/userContent';


   		$this->load->view('maintenance/v_user', $data);
   }


   function addUsers(){

   		$this->load->model('m_crud');
   		$name = @$_POST['txtUsername'];
   		$description = @$_POST['txtFullname'];
   		$newRow = array(
   			"username" => $name,
            "valid"=> 1,
   			"fullname"=>$description);
   		$this->m_crud->createEntry('users',$newRow);
   		
   }

   // MODEL CALLS
    function getListOfUsers(){
         $this->load->model('m_crud');
         // Calling Method from m_crud
         $result = $this->m_crud->retrieveAll('users');
         return $result;

   }

   function deleteUsers($userId){
      $this->load->model("m_crud");
      $newRow = array(
         "valid" => 0
      );
      $this->m_crud->updateRow('users',$newRow,'id',$userId);
      $data['usersList'] = $this->getListOfUsers();
      $datas = $this->load->view('ajaxDivs/userContent', $data);
      echo $datas;
   }

   function updateUsers($userId){

         $this->load->model('m_crud');
         $username = @$_POST['txtUsername'];
         $fullname = @$_POST['txtFullname'];
         $newRow = array(
            "username" => $username,
            "fullname"=>$fullname );


         $this->m_crud->updateRow('users',$newRow, 'id', $userId);
         $data['usersList'] = $this->getListOfUsers($userId);
      $datas = $this->load->view('ajaxDivs/userContent', $data);
      echo $datas;
       //  echo "OK";
         
   }


}