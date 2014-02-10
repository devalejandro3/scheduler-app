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

  
// AJAX CALLS
   function addSection( $deptId ){

   		$this->load->model('m_crud');
   		$name = @$_POST['txtName'];
   		$description = @$_POST['txtDescription'];
   		$newRow = array(
   			"name" => $name,
            "valid"=> 1,
   			"description"=>$description,
   			"department_id"=>$deptId);
   		$this->m_crud->createEntry('section',$newRow);
   		
   }

   function updateSection($userId, $deptId){

         $this->load->model('m_crud');
         $name = @$_POST['txtName'];
         $description = @$_POST['txtDescription'];
         $newRow = array(
            "name" => $name,
            "description"=>$description );


         $this->m_crud->updateRow('section',$newRow, 'id', $userId);
         $data['sectionList'] = $this->getListOfSectionByDepartmentId($deptId);
      $datas = $this->load->view('ajaxDivs/sectionContent', $data);
      echo $datas;
       //  echo "OK";
         
   }

   /* @method: viewSectionTable($val1)
      - Fetched Section by department
      - Separated the views of table to ajaxDivs/sectionContent.php
      - return a table with data inside.
   */
   function viewSectionTable($deptId){
      $data['sectionList'] = $this->getListOfSectionByDepartmentId($deptId);
      $datas = $this->load->view('ajaxDivs/sectionContent', $data);
      echo $datas;
   }


// MODEL CALLS
    function getListOfSection(){
         $this->load->model('m_crud');
         // Calling Method from m_crud
         $result = $this->m_crud->retrieveAll('section');
         return $result;

   }

   function getListOfSectionByDepartmentId($val){
         $this->load->model('Maintenance/m_section');
         $result = $this->m_section->retrieveSectionBy('section', 'department_id', $val);
         return $result;
   }

   function deleteUsers($userId, $deptId){


      $this->load->model("m_crud");
 
      $newRow = array(
         "valid" => 0
      );
      $this->m_crud->updateRow('section',$newRow,'id',$userId);

      $data['sectionList'] = $this->getListOfSectionByDepartmentId($deptId);
      $datas = $this->load->view('ajaxDivs/sectionContent', $data);
      echo $datas;
   }
}