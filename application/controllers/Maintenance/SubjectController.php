<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class SubjectController extends CI_Controller {

	function SubjectController() {
       parent::__construct();       
   }

   	function subject(){
   		$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';
   		$this->load->view('maintenance/v_subject', $data);
   }

}
