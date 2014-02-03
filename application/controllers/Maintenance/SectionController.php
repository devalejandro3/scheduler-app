<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class SectionController extends CI_Controller {

	function SectionController() {
       parent::__construct();       
   }

   	function section(){
   		$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';
		$data['sectionList'] = $this->getListOfSection();
   		$this->load->view('maintenance/v_section', $data);
   }

   function getListOfSection(){
   		$this->load->model('m_crud');

   		// Calling Method from m_crud
   		$result = $this->m_crud->retrieveAll('section');




   		return $result;

   }


   function addSection(){
   		$this->load->model('m_crud');


   		$name = @$_POST['txtName'];
   		$description = @$_POST['txtDescription'];

   		echo $name;
   		echo $description;



   		$newRow = array(
   			"name" => $name,
   			"description"=>$description,
   			"department_id"=>1);

   		$this->m_crud->createEntry('section',$newRow);

   		return "OK";
   }


   





}