<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class HelloWorld extends CI_Controller {

	
	

	public function index()
	{
		$this->load->model("m_get_db");
		$data['results'] = $this->m_get_db->getAll(); 
		
		$this->load->view("v_db", $data);
		
	}
	
	function getValues(){
		
	}

}



/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */