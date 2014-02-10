<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class DepartmentController extends CI_Controller {

	function DepartmentController() {
       parent::__construct();       
   }

   	function department(){	
   		$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';
		$data['departmentList'] = $this->getListOfDepartment();
	    $data['content'] = 'ajaxDivs/departmentContent';


   		$this->load->view('v_dept', $data);
   }


   function addDepartment(){

   		$this->load->model('m_crud');
   		$name = @$_POST['txtName'];
   		$description = @$_POST['txtDescription'];
   		$newRow = array(
   			"name" => $name,
            "valid"=> 1,
   			"description"=>$description);
   		$this->m_crud->createEntry('department',$newRow);
   		
   }

   // MODEL CALLS
    function getListOfDepartment(){
         $this->load->model('m_crud');
         // Calling Method from m_crud
         $result = $this->m_crud->retrieveAll('department');
         return $result;

   }

   function deleteDepartment($deptId){
      $this->load->model("m_crud");
      $newRow = array(
         "valid" => 0
      );
      $this->m_crud->updateRow('department',$newRow,'id',$deptId);
      $data['departmentList'] = $this->getListOfDepartment();
      $datas = $this->load->view('ajaxDivs/departmentContent', $data);
      echo $datas;
   }

   function updateDepartment($deptId){

         $this->load->model('m_crud');
         $name = @$_POST['txtName'];
         $description = @$_POST['txtDescription'];
         $newRow = array(
            "name" => $name,
            "description"=>$description );


         $this->m_crud->updateRow('department',$newRow, 'id', $deptId);
         $data['departmentList'] = $this->getListOfDepartment($deptId);
      $datas = $this->load->view('ajaxDivs/departmentContent', $data);
      echo $datas;
       //  echo "OK";
         
   }


}