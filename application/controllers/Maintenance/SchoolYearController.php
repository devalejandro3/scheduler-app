<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class SchoolYearController extends CI_Controller {

	function SchoolYearController() {
       parent::__construct();       
   }

   	function schoolyear(){
   		$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';
   		$this->load->view('maintenance/v_schoolyear', $data);
   }





}