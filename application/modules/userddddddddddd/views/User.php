<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

   	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		date_default_timezone_set('Asia/Calcutta'); 		
	}
	
	public function index()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'user/home';
		$data['title'] = 'The Hello Doctor';
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function home()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'user/home';
		$data['title'] = 'The Hello Doctor';
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function about()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'about';
		$data['title'] = 'The Hello Doctor';
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function services()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'user/services';
		$data['title'] = 'The Hello Doctor';
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function contact()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'user/contact';
		$data['title'] = 'The Hello Doctor';
		$this->load->view('includes/user_template',$data);		            
	}
	
	
	
}	

?>	