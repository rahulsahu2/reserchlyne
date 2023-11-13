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
	 // echo "hello1111111111";	die();
		$data['subscription_plan'] = $subscription_plan = $this->common_model->getAllwhere('subscription_plan', array('status'=>1));

		
		//$data['doctors'] = $doctors = $this->common_model->getAllwhere_limit('doctors', '9', array('status!='=>2));
		//$data['doctors'] = $doctors = $this->common_model->getAllTopDoctors('9');
		//echo $this->db->last_query();die;
		//$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'index';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function about()
	{	
	// echo "hhhhhhhhhhhhh";	die();
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['info_data'] = $info_data= $this->common_model->getsingle('home_info', array('id'=>1));   

		$data['main_content'] = 'about';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            
	}
	public function investor()
	{		
		// echo "hello"; die;
		$data['msg'] = $this->session->flashdata('msg');	
		
		 $data['info_data'] = $info_data= $this->common_model->getsingle('investor_charter', array('id'=>1));   

		$data['main_content'] = 'investor';
		
		$data['title'] = 'Amiteshwar';
		
		// $this->load->view('includes/user_template',$data);
		$this->load->view('includes/user_template',$data);		            
	}
	public function investor_complaints()
	{		
		// echo "hello"; die;
		$data['msg'] = $this->session->flashdata('msg');	
		
		 // $data['info_data'] = $info_data= $this->common_model->getsingle('complain', array('id'=>1));   

		$data['main_content'] = 'investor_complaints';
		
		$data['title'] = 'Amiteshwar';
		
		// $this->load->view('includes/user_template',$data);
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function subscription()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['subscription_plan'] = $categories = $this->common_model->getAllwhere('subscription_plan', array('status'=>1));
		  
		
		$data['main_content'] = 'subscription';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function why_choose()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'why_choose';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function faq()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
	 
				
		$data['main_content'] = 'faq';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function login_detail()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['info_data'] = $info_data= $this->common_model->getsingle('home_info', array('id'=>1));
		$data['login_data'] = $login_data= $this->common_model->getsingle('login_content', array('id'=>1));   

		$data['main_content'] = 'login_detail';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function test()
	{
		echo "welcome";die;
	}
	
	public function contact()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'contact';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function privacy_policy()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['page_content'] = $this->common_model->getsingle('page_content', array('title'=>'privacy'));
		
		$data['main_content'] = 'privacy';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function disclaimer()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['page_content'] = $this->common_model->getsingle('page_content', array('title'=>'disclaimer'));
		
		$data['main_content'] = 'disclaimer';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function term_condition()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['page_content'] = $this->common_model->getsingle('page_content', array('title'=>'terms_condition'));
		
		$data['main_content'] = 'term_condition';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function services()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'user/services';
		
		$data['title'] = 'The Hello Doctor';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function gallery()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['gallery'] =$gallery = $this->common_model->getAllwhere('gallery',array('status'=>1));
		
		$data['main_content'] = 'user/gallery';
		
		$data['title'] = 'The Hello Doctor';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function login()
	{ 
		if($this->session->userdata('user_id')!='')
		{
			redirect('dashboard');	
		}
		
		ini_set('display_errors', 1);
		$config['title'] = 'Login';
		$config['errors'] ='';
		$config['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		   
		$mobile_no = $this->input->post('mobile_no',TRUE);
		$password = $this->input->post('password',TRUE);
		 
		  // if form validation true
		if($this->form_validation->run() == TRUE) 
		{  
			
			$wheres = array('mobile_no'=>$mobile_no,'password'=>$password);
			$users = $this->common_model->getsingle('users',$wheres);
		   
			if($users)
			{
				$newdata = array( 	
					'user_id' 	=> $users->user_id ,
					'user_name' => $users->user_name,
					'type'      =>  'user',
					'login' 	=> TRUE,
				);	
				
				$this->session->set_userdata($newdata);
				 
				$this->session->set_flashdata('msg','Your Login Successfully');
				
				if($_SESSION['url'] != '')
				{
					redirect($_SESSION['url']);	
				}
				else
				{
					redirect('user');
				}
				
			}
			else
			{
				$config['errors'] =  'Wrong Mobile Number or Password. Please Try again.';
			}
		
		}
	
		$config['main_content'] = 'login';
		$this->load->view('login',$config);
	}
	
	public function logout() 
	{
		$array_items = array('user_id' => '','url' => '');		
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy(); 
		$url = base_url('user');
		header("location:$url");
   }
	
	public function signup()
	{ 
		if($this->session->userdata('user_id')!='')
		{
			redirect('dashboard');	
		}
		ini_set('display_errors', 1);
		$config['title'] = 'Login';
		$config['errors'] ='';
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('user_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mobile_no', 'mobile number', 'trim|required|numeric|min_length[10]|max_length[10]|is_unique[users.mobile_no]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		   
		$user_name = $this->input->post('user_name',TRUE);
		$mobile_no = $this->input->post('mobile_no',TRUE);
		$password = $this->input->post('password',TRUE);
		
		  // if form validation true
		if($this->form_validation->run() == TRUE) 
		{
			$newdata = array( 	
						'user_name' 	=> $user_name,
						'mobile_no' 	=> $mobile_no,
						'password' 		=> $password,
						'entry_date'	=> date('Y-m-d')
					);	
					
			$this->common_model->insertData('users',$newdata);
			$this->session->set_flashdata('msg','Signup Successfully');
			redirect('user/login');
		
		}
	
		$config['main_content'] = 'signup';
		$this->load->view('signup',$config);
	}
	
	public function getlocationid()
	{
		$location = $_POST["location"];
		
		echo $location; die;
		
		$p_sub_categories = $this->common_model->getAllwhere('p_sub_categories',array('status'=>'1','category_id'=>$category_id));
		
		$cities = '<option value="" >Select Sub Category </option>';
		if(count($p_sub_categories)>0)
		{
			foreach($p_sub_categories as $c)
			{
				$cities .= '<option value="'.$c->id.'">'.$c->sub_cat_name.' ['.$c->percent.'% ]</option>';
			} 
		}
		echo $cities;			
	}
	
	public function booking()
	{		
		$data['doctor'] = $this->common_model->getAllwhere('doctors',array());
		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$this->form_validation->set_rules('doctor_id', 'Doctor Name', 'trim|required');
		
		if($this->input->post('doctor_id')!='') 
		{
			
				$dataInsert = array(
							'patient_name' 	 		=> $this->input->post('patient_name'),
							'doctor_id'				=> $this->input->post('doctor_id'),
							'age'					=> $this->input->post('age'),
							'father_name'			=> $this->input->post('father_name'),
							'husband_name'          => $this->input->post('husband_name'),
							'village'				=> $this->input->post('village'),
							'block'                 => $this->input->post('block'),
							'pincode'				=> $this->input->post('pincode'),
							'aadhar_number'         => $this->input->post('aadhar_number'),
							'mobile_number'			=> $this->input->post('mobile_number'),
							'booking_date'			=> $this->input->post('booking_date'),
							'entry_date'			=> date('Y-m-d')
						); 	
				$this->common_model->insertData('booking', $dataInsert); 	 
				$this->session->set_flashdata('msg','Booking Added Successfully.');
				$data['messg'] 	="Booking Added Successfully.";	
		}
	
		$data['main_content'] = 'user/booking';
		$data['title'] = 'The Hello Doctor';
		$this->load->view('includes/user_template',$data);		            
	}

	public function booking_form()
	{
		echo $this->input->post('doctor_id');echo "----hi-----"; die;
		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$this->form_validation->set_rules('doctor_id', 'Doctor Name', 'trim|required');
		
		$data['doctor'] = $this->common_model->getAllwhere('doctors',array());
	
		if($this->input->post('doctor_id')!='') 
		{
				$dataInsert = array(
							'patient_name' 	 		=> $this->input->post('patient_name'),
							'doctor_id'				=> $this->input->post('doctor_id'),
							'age'					=> $this->input->post('age'),
							'father_name'			=> $this->input->post('father_name'),
							'husband_name'          => $this->input->post('husband_name'),
							'village'				=> $this->input->post('village'),
							'block'                 => $this->input->post('block'),
							'pincode'				=> $this->input->post('pincode'),
							'aadhar_number'         => $this->input->post('aadhar_number'),
							'mobile_number'			=> $this->input->post('mobile_number'),
							'booking_date'			=> $this->input->post('booking_date'),
							'entry_date'			=> date('Y-m-d')
						); 	
				$this->common_model->insertData('booking', $dataInsert); 	 
				$this->session->set_flashdata('msg','Booking Added Successfully.');
		}
	}
	
	public function appointments()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['locations'] = $locations = $this->common_model->getAllwhere('locations',array('status'=>1));
		
		$data['main_content'] = 'user/appointments';
		
		$data['title'] = 'The Hello Doctor';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function categories($location_id='')
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['categories'] = $categories = $this->common_model->category_filter('categories');
		
		$data['location_id'] = $location_id;
		
		$data['main_content'] = 'user/categories';
		
		$data['title'] = 'The Hello Doctor';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function doctor_list($category_id ='',$location_id ='')
	{		
		$data['msg'] = $this->session->flashdata('msg');
		
		$data['doctors'] = $doctors = $this->common_model->doctors_locat_filter($location_id,$category_id);
		
		$data['category_id'] = $category_id;
		
		$data['location_id'] = $location_id;
		
		$data['main_content'] = 'user/doctor_list';
		
		$data['title'] = 'The Hello Doctor';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function availableDateDoctors()
	{
		
			$selectedDate = $_POST["selectedDate"];
			//echo $selectedDate; die;
			$doctorId = $_POST["doctorId"];
			$doctors = $this->common_model->getsingle('doctors',array('id'=>$doctorId));
		    $day  = date('l', strtotime($selectedDate));
			$day_arr =preg_split ("/\,/", $doctors->days); 
			
			if(!in_array($day, $day_arr))
			{
				echo "Doctor only available in ".$doctors->days;
			}
			
	}
	
	public function bookAppointment($doctor_id)
	{
		if($this->session->userdata('user_id')=='')
		{
			$_SESSION['url'] = current_url();
			redirect('user/login');	 
		}
	 
		$data['doctors'] = $doctors = $this->common_model->getsingle('doctors',array('id'=>$doctor_id));
		   
	    $this->form_validation->set_error_delimiters('', '');
	  
		$data['msg'] = $this->session->flashdata('msg');
		$data['error'] = $this->session->flashdata('error');
		$this->form_validation->set_rules('patient_name', 'patient_name', 'trim|required');
		$this->form_validation->set_rules('age', 'age', 'trim|required|numeric');
		$this->form_validation->set_rules('father_name', 'father_name', 'trim|required');
		$this->form_validation->set_rules('husband_name', 'husband_name', 'trim|required');
		$this->form_validation->set_rules('mobile_no', 'mobile_no', 'trim|required|numeric');
		$this->form_validation->set_rules('aadhar_number', 'aadhar_number', 'trim|required|numeric');
		$this->form_validation->set_rules('village', 'village', 'trim|required');
		$this->form_validation->set_rules('block', 'block', 'trim|required');
		$this->form_validation->set_rules('pincode', 'pincode', 'trim|required|numeric');
		$this->form_validation->set_rules('date', 'date', 'trim|required');
		$this->form_validation->set_rules('gender', 'gender', 'trim|required');
		
		if($this->form_validation->run() == TRUE) 
		{
			$date = $this->input->post('date');
		    $day  = date('l', strtotime($date));
			$day_arr =preg_split ("/\,/", $doctors->days); 
			
			if(in_array($day, $day_arr))
			{
				$newdata = array( 	
					'user_id' 		=> $this->session->userdata('user_id'),
					'doctor_id' 	=> $doctor_id,
					'patient_name' 	=> $this->input->post('patient_name'),
					'age' 			=> $this->input->post('age'),
					'father_name' 	=> $this->input->post('father_name'),
					'husband_name' 	=> $this->input->post('husband_name'),
					'mobile_number' => $this->input->post('mobile_no'),
					'aadhar_number' => $this->input->post('aadhar_number'),
					'village' 		=> $this->input->post('village'),
					'block' 		=> $this->input->post('block'),
					'pincode' 		=> $this->input->post('pincode'),
					'booking_date' 	=> $this->input->post('date'),
					'gender' 		=> $this->input->post('gender'),
					'booking_status' => 0,
					'entry_date'	=> date('Y-m-d')
				);	
				
				//echo "<pre>"; print_r($newdata); die;
				$this->common_model->insertData('booking',$newdata);
				$this->session->set_flashdata('msg','Book appointment Successfully');
			}
			else
			{
				$this->session->set_flashdata('error','Doctor only available in '.$doctors->days);
			}
				redirect('user/bookAppointment/'.$doctor_id);
		}
	
		$data['doctor_id'] = $doctor_id;
		$data['main_content'] = 'user/book_appointment';
		$data['title'] = 'The Hello Doctor';
		$this->load->view('includes/user_template',$data);		
	}
	
	public function pathologies()
	{	
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['pathologies'] = $pathologies = $this->common_model->getAllwhere('pathologies',array('status'=>1));
		
		$data['main_content'] = 'user/pathologies';
		
		$data['title'] = 'The Hello Doctor';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function test_list($path_id='')
	{	
		if($this->session->userdata('user_id')=='')
		 {
			 $_SESSION['url'] = current_url();
			 redirect('user/login');	 
		 }
		 
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['test'] = $test = $this->common_model->getAllwhere('pathology_test',array('status'=>1,'path_id'=>$path_id));
		
		$data['path_id'] = $path_id;
		
		$data['main_content'] = 'user/test_list';
		
		$data['title'] = 'The Hello Doctor';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function bookTest()
	{
		 if($this->session->userdata('user_id')=='')
		 {
			echo "login"; 
		 }
		 else
		 {
			$test_id = $_POST["test_id"];
			
			$_SESSION['test_ids'] = $_POST['test_id'];
			
			echo "<pre>";  print_r($test_id);			
		 }
	}
	
	public function test_form($user_id='')
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect('user/login');	 
		}		
		
		$test_ids = $this->session->userdata('test_ids');
	
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['user_id'] = $user_id;
		
		$data['test_ids'] = $test_ids;
		
		$this->form_validation->set_error_delimiters('', '');
	  
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('patient_name', 'patient_name', 'trim|required');
		$this->form_validation->set_rules('age', 'age', 'trim|required|numeric');
		$this->form_validation->set_rules('mobile_no', 'mobile_no', 'trim|required|numeric');
		$this->form_validation->set_rules('village', 'village', 'trim|required');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		$this->form_validation->set_rules('pincode', 'pincode', 'trim|required|numeric');
		$this->form_validation->set_rules('date', 'date', 'trim|required');
		
		if($this->form_validation->run() == TRUE) 
		{
		
				$newdata = array( 	
					'user_id' 		=> $this->session->userdata('user_id'),
					'test_ids' 		=> $this->input->post('test_ids'),
					'patient_name' 	=> $this->input->post('patient_name'),
					'age' 			=> $this->input->post('age'),
					'booking_date'  => $this->input->post('date'),
					'mobile_number' => $this->input->post('mobile_no'),
					'village' 		=> $this->input->post('village'),
					'address' 		=> $this->input->post('address'),
					'total_amount' 		=> $this->input->post('total_amount'),
					'pincode' 		=> $this->input->post('pincode'),
					'booking_status' => 0,
					'entry_date'	=> date('Y-m-d')
				);	
				
				//echo "<pre>"; print_r($newdata); die;
				$this->common_model->insertData('test_booking',$newdata);
				$this->session->set_flashdata('msg','Book Test Successfully');
				redirect('user/pathologies');
		}
	
	
		$data['main_content'] = 'user/test_form';
		
		$data['title'] = 'The Hello Doctor';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function medicine_form($id='')
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		if($this->session->userdata('user_id')=='')
		{
		    $_SESSION['url'] = current_url();
			redirect('user/login');	 
		}		
		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$this->form_validation->set_error_delimiters('', '');
	  
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('patient_name', 'patient name', 'trim|required');
		$this->form_validation->set_rules('mobile_no', 'mobile no', 'trim|required');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		
		if (empty($_FILES['image']['name']))
		{
			$this->form_validation->set_rules('image', 'Image', 'required');
		}
		
		if($this->form_validation->run() == TRUE) 
		{
			//echo $this->input->post('patient_name'); die;
			//echo "<pre>"; print_r($_FILES['image']['name']); die;
			$config['upload_path'] = 'uploads/medicine';
			$config['allowed_types'] = 'gif|jpg|png';			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('image'))
			{
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];
			
				$newdata = array( 	
					'user_id' 		=> $this->session->userdata('user_id'),
					'patient_name' 	=> $this->input->post('patient_name'),
					'remark' 	=> $this->input->post('remark'),
					'mobile_no' 	=> $this->input->post('mobile_no'),
					'address' 	=> $this->input->post('address'),
					'prescription_image' => $image,
					'entry_date'	=> date('Y-m-d')
				);	
				
				//echo "<pre>"; print_r($newdata); die;
				$insert_id = $this->common_model->insertData('user_medicine_prescription',$newdata);
				$this->session->set_flashdata('msg','Submited Successfully');
				redirect('user/medicine_form/');
			}
		}
		
	    $data['prescptn'] = $prescptn = $this->common_model->getsingle('user_medicine_prescription',array('id'=>$insert_id));
		
		$data['main_content'] = 'user/medicine_form';
		
		$data['title'] = 'The Hello Doctor';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function contact_us() 
	{
		/*if($this->session->userdata('user_id')=='')
		{
			$_SESSION['url'] = current_url();
			redirect('user/login');	 
		}*/
		
		$user_id = $this->session->userdata('user_id');
	   
	    $this->form_validation->set_error_delimiters('', '');
	  
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('subject', 'subject', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		
		if($this->form_validation->run() == TRUE) 
		{
				$newdata = array( 	
					'user_id' 		=> $user_id?$user_id:0,
					
					'name' 			=> $this->input->post('name'),
					'email' 		=> $this->input->post('email'),
					'subject' 		=> $this->input->post('subject'),
					'description' 	=> $this->input->post('description'),
					'entry_date'	=> date('Y-m-d')
				);	
				
				//echo "<pre>"; print_r($newdata); die;
				$this->common_model->insertData('contact_us',$newdata);
				$this->session->set_flashdata('msg','Your contact form submit successfully!!');
				redirect('user/contact_us');
		}
	
		$data['main_content'] = 'user/contact';
		$data['title'] = 'The Hello Doctor';
		$this->load->view('includes/user_template',$data);		
	}
	
	public function subscribe() 
	{
		$user_id = $this->session->userdata('user_id');
	   
	    $this->form_validation->set_error_delimiters('', '');
	  
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('email', 'name', 'trim|required');
		$email = $this->input->post('email');
		if($this->form_validation->run() == TRUE) 
		{
				$message = '<html><body>';
				$message .= '<strong style="font-size:15px;">Dear Admin</strong>,';
				$message .= '<p><strong>'.$email.'</strong> Subscribed <i>The Hello Doctor</i> successfully.</p>';
				$message .= '</body></html>';
				$data = array(
					"sender" => array(
						"email" => 'irisinformatics1@gmail.com',
						"name" => 'The Hello Doctor'         
					),
					"to" => array(
						array(
							"email" => 'info@thehellodoctor.in',  // info@thehellodoctor.in
							"name" => 'Admin' 
						)
					),
					"subject" => 'The Hello Doctor Newsletter', 
					"htmlContent" => $message
				);
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 

				$headers = array();
				$headers[] = 'Accept: application/json';
				$headers[] = 'Api-Key: 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';
				$headers[] = 'Content-Type: application/json';
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

				$result = curl_exec($ch);
				if (curl_errno($ch)) {
					echo 'Error:' . curl_error($ch);
				}
				curl_close($ch);
				//$this->session->set_flashdata('msg','Your contact form submit successfully!!');
				redirect('user');
		}		
	}
	
	
	
	
}	

?>	