<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

   function __construct()
	{
		parent::__construct();
	}

	
	public function index()
	{ 

		if($this->session->userdata('admin_id')!='')
		{
			redirect('admin');	
		}
		ini_set('display_errors', 1);
		$config['title'] = 'Login';
		$config['errors'] ='';
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('email', 'Login Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		   
		$username = $this->input->post('email',TRUE);
		$password = $this->input->post('password',TRUE);
		
		  // if form validation true
		if($this->form_validation->run() == TRUE) 
		{
			$wheres = array('email'=>$username,'password'=>$password);
			$users = $this->common_model->getsingle('admin',$wheres);
		   
			if($users)
			{
					$newdata = array( 	
						'admin_id' 	=> $users->admin_id,
						'email' 	=> $users->email,
						'login' 	=> TRUE,
					);	
					
					$this->session->set_userdata($newdata);
					 //echo "<pre>"; print_r($newdata); die;
					$this->session->set_flashdata('msg','Your Login Successfully');
					redirect('admin');
                    					
			}
			else
			{
				$config['errors'] =  'Wrong Email or Password. Please Try again.';
			}
		
		}
	
		$config['main_content'] = 'login';
		$this->load->view('login',$config);
	
	}
	
	public function user_login()
	{ 
	// echo "hi";die; 
	
	if($this->session->userdata('user_id')!='')
		{
			redirect('user');	
		}
		
		$config['title'] = 'Login';
		$config['errors'] ='';
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
		
		$username = $this->input->post('email',TRUE);
		$password = $this->input->post('password',TRUE);
		//echo $username; die;
		  // if form validation true
		if($this->form_validation->run() == TRUE) 
		{
			$wheres = array('email'=>$username,'password'=>$password);
			$users = $this->common_model->getsingle('users',$wheres);
			 
			 
			$subscription = $this->common_model->getsingle('subscription_history', array('user_id'=>$users->user_id));
			$subscription_plan = $this->common_model->getsingle('subscription_plan', array('id'=>$subscription->subscription_id));
	     
			$duration  =   explode(" ",$subscription_plan->duration);           	    
			$effectiveDate = date('Y-m-d', strtotime("+$duration[0] months", strtotime($subscription->date))); 
    
		 	$total_date=date('Y-m-d');
			 //echo "<pre>"; print_r($users); 
			if(!$users)
			{
				$this->session->set_flashdata('error','Wrong Email or Password. Please Try again.');
				redirect('user');
			}else{

				//echo $users->user_id."--".$subscription->user_id."----------".$effectiveDate."-".$total_date."=====".$subscription->extend_date;die;
				/*if(($users->user_id == $subscription->user_id)  &&  ($effectiveDate >= $total_date) ) 
				{   
					echo"yes";
				}else{
					echo"no";
				}
				die;*/
				if((($users->user_id == $subscription->user_id)  &&  ($effectiveDate >= $total_date)) || ($subscription->extend_date >= $total_date  && $subscription->extend_date!='0000-00-00')) 
				{   

						$newdata = array( 	
							'user_id' 	=> $users->user_id,
							'email' 	=> $users->email,
							'login' 	=> TRUE,
						);	
						
						$this->session->set_userdata($newdata);
						
						$this->session->set_flashdata('msg',' Login is Successful');
						redirect('user/login_detail');
											
				}	
				else
				{
					$this->session->set_flashdata('error','You are no longer a member, pls subscribe again to avail the services.');
					redirect('user');
				}
			}
			
		
		}
	
		$data['main_content'] = 'user/index';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);
	
	//echo "hi"; die;
	}
	
// logout 
	public function logout() 
	{
		$array_items = array('admin_id' => '','email' => '', 'login' => '');		
		$this->session->set_userdata($array_items);		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		$url = base_url('login');
		header("location:$url");
   }

public function user_logout() 
	{
		$array_items = array('user_id' => '','email' => '', 'login' => '');		
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy(); 
		$url = base_url('user');
		header("location:$url");
   }
  

	
}
