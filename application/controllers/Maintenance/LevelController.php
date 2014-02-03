<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class LevelController extends CI_Controller {

	function LevelController() {
       parent::__construct();       
   }

   	function level(){
   		$data['header'] = 'layout/view_header';
		$data['menu'] = 'layout/view_menu';
		$data['footer'] = 'layout/view_footer';
   		$this->load->view('Maintenance/v_level', $data);
   }





}