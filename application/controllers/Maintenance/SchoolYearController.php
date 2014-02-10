<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class SchoolYearController extends CI_Controller {

	function SchoolYearController() {
       parent::__construct();       
   }

   	function schoolYear(){	
   	$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';
		$data['schoolYearList'] = $this->getListOfSchoolYear();
	   $data['content'] = 'ajaxDivs/schoolYearContent';


   		$this->load->view('maintenance/v_schoolYear', $data);
   }


   function addSchoolYear(){

   		$this->load->model('m_crud');
   		$schoolYear = @$_POST['txtSchoolYear'];
   		$remarks = @$_POST['txtRemarks'];
   		$newRow = array(
   			"schoolyear" => $schoolYear,
            "valid"=> 1,
   			"remarks"=>$remarks);
   		$this->m_crud->createEntry('schoolyear',$newRow);
   		
   }

   // MODEL CALLS
    function getListOfSchoolYear(){
         $this->load->model('m_crud');
         // Calling Method from m_crud
         $result = $this->m_crud->retrieveAll('schoolyear');
         return $result;

   }

   function deleteSchoolYear($schoolYearId){
      $this->load->model("m_crud");
      $newRow = array(
         "valid" => 0
      );
      $this->m_crud->updateRow('schoolyear',$newRow,'id',$schoolYearId);
      $data['schoolYearList'] = $this->getListOfSchoolYear();
      $datas = $this->load->view('ajaxDivs/schoolYearContent', $data);
      echo $datas;
   }

   function updateSchoolYear($schoolYearId){

         $this->load->model('m_crud');
         $schoolYear = @$_POST['txtSchoolYear'];
         $remarks = @$_POST['txtRemarks'];
         $newRow = array(
            "schoolyear" => $schoolYear,
            "remarks"=>$remarks );


         $this->m_crud->updateRow('schoolyear',$newRow, 'id', $schoolYearId);
         $data['schoolYearList'] = $this->getListOfSchoolYear($schoolYearId);
      $datas = $this->load->view('ajaxDivs/schoolYearContent', $data);
      echo $datas;
       //  echo "OK";
         
   }


}