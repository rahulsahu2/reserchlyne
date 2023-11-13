<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

   	public function __construct()
	{ 
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		date_default_timezone_set('Asia/Calcutta'); 		
	}
	
	public function index($page = '')
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('user/login');
		}
		if($this->session->userdata('type')!='user')
		{
			redirect('user/login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'dashboard';
		$this->load->view('includes/u_template',$data);
		            
	}
	
	public function logout() 
	{
		$array_items = array('user_id' => '','user_name' => '', 'login' => '');		
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy(); 
		$url = base_url('user');
		header("location:$url");
	}
	
	public function appointment_booking_list()
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('login');
		}
		if($this->session->userdata('type')!='user')
		{
			redirect('user/login');
		}
		$user_id=$this->session->userdata('user_id');
		$data['msg'] = $this->session->flashdata('msg');	
		$data['title'] = "Hitzz";
		
		$config = array();
		$config["base_url"] = base_url() ."/dashboard/appointment_booking_list";		
		$total_row = $this->common_model->record_count('booking',array('user_id'=>$user_id));
		
		$config["total_rows"] = $total_row;
		$config["per_page"] = 25;		
		$config['num_links'] = 3;
		$config['use_page_numbers'] = false;
		$config['reuse_query_string'] = false;		 
		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul>';		 
		$config['first_link'] = '<<';
		$config['first_tag_open'] = '<span class="firstlink">';
		$config['first_tag_close'] = '</span>';		 
		$config['last_link'] = '>>';
		$config['last_tag_open'] = '<span class="lastlink">';
		$config['last_tag_close'] = '</span>';		 
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<span class="nextlink">';
		$config['next_tag_close'] = '</span>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<span class="prevlink">';
		$config['prev_tag_close'] = '</span>';
		$config['cur_tag_open'] = '<span class="curlink">';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '<span class="numlink">';
		$config['num_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		if($this->uri->segment(3))
		{
			$page = ($this->uri->segment(3)) ;
			$data['sno'] = $this->uri->segment(3)+1;
		}
		else
		{
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links(); 		
		$data['records'] = $this->common_model->getAllwhere_pagination('booking',$config["per_page"],$page,array('user_id'=>$user_id),'entry_date','desc');
				
		$data['main_content'] = 'appointment_booking_list';
		$this->load->view('includes/u_template',$data);
		
	}
	
	public function view_appointment_booking_details($id)
	{
	    if($this->session->userdata('user_id')=='')
		{
			redirect('login');
		}
		if($this->session->userdata('type')!='user')
		{
			redirect('user/login');
		}
		
		$data['records'] = $this->common_model->getsingle('booking', array('id'=>$id));
		
		$data['main_content'] = 'view_appointment_booking_details';
		$this->load->view('includes/u_template',$data);	            
	}
	
	public function test_booking_list()
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('login');
		}
		if($this->session->userdata('type')!='user')
		{
			redirect('user/login');
		}
		$user_id=$this->session->userdata('user_id');
		$data['msg'] = $this->session->flashdata('msg');	
		$data['title'] = "Hitzz";
		
		$config = array();
		$config["base_url"] = base_url() ."/dashboard/test_booking_list";		
		$total_row = $this->common_model->record_count('test_booking',array('user_id'=>$user_id));
		
		$config["total_rows"] = $total_row;
		$config["per_page"] = 25;		
		$config['num_links'] = 3;
		$config['use_page_numbers'] = false;
		$config['reuse_query_string'] = false;		 
		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul>';		 
		$config['first_link'] = '<<';
		$config['first_tag_open'] = '<span class="firstlink">';
		$config['first_tag_close'] = '</span>';		 
		$config['last_link'] = '>>';
		$config['last_tag_open'] = '<span class="lastlink">';
		$config['last_tag_close'] = '</span>';		 
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<span class="nextlink">';
		$config['next_tag_close'] = '</span>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<span class="prevlink">';
		$config['prev_tag_close'] = '</span>';
		$config['cur_tag_open'] = '<span class="curlink">';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '<span class="numlink">';
		$config['num_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		if($this->uri->segment(3))
		{
			$page = ($this->uri->segment(3)) ;
			$data['sno'] = $this->uri->segment(3)+1;
		}
		else
		{
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links(); 		
		$data['records'] = $this->common_model->getAllwhere_pagination('test_booking',$config["per_page"],$page,array('user_id'=>$user_id),'entry_date','desc');
				
		$data['main_content'] = 'test_booking_list';
		$this->load->view('includes/u_template',$data);
	}
	
	public function view_test_booking_details($id)
	{
	    if($this->session->userdata('user_id')=='')
		{
			redirect('login');
		}
		if($this->session->userdata('type')!='user')
		{
			redirect('user/login');
		}
		
		$data['records'] = $this->common_model->getsingle('test_booking', array('id'=>$id));
		
		$data['main_content'] = 'view_test_booking_details';
		$this->load->view('includes/u_template',$data);	            
	}
	
		
}	

?>	