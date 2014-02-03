<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class DepartmentController extends CI_Controller {

	function DepartmentController() {
       parent::__construct();       
   }

   	function werd(){
   		$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';
   		$this->load->view('v_dept', $data);
   }





}