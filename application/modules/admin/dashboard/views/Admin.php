<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin extends CI_Controller {

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
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'dashboard';
		$this->load->view('includes/template',$data);
		            
	} 
	
	public function add_category()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');
		if (empty($_FILES['images']['name']))
		{
			$this->form_validation->set_rules('images', 'Image', 'required');
		}
		if($this->form_validation->run() == TRUE) 
		{
			$config['upload_path'] = 'uploads/category';
			$config['allowed_types'] = 'gif|jpg|png';			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('images'))
			{
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];
				$dataInsert = array(
							'category_name' 	=> $this->input->post('cat_name'),
							'image' 			=> $image,	
							'status'			=> 1
						); 	
				$this->common_model->insertData('categories', $dataInsert); 	 
				$this->session->set_flashdata('msg','Category Added Successfully.');
			}			
				redirect('admin/category_list');
		}
		$data['main_content'] = 'add_category';
		$this->load->view('includes/template',$data);            
	}

	public function chkpassword($old_password,$u_id='')
	{
		$chk = $this->common_model->getsingle('admin', array('password'=>$old_password,'admin_id'=>$u_id));			
		if (!$chk)
		{			
			$this->form_validation->set_message('chkpassword', 'Old Password Not Match.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	public function change_password()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login/logout');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$u_id ='1';
		$data['udata'] = $this->common_model->getsingle('admin', array('admin_id'=>$u_id)); 
		
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|callback_chkpassword['.$u_id.']');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('c_password', 'New Confirm Password', 'trim|required|matches[new_password]');
		
		$data['error'] = "";
		if($this->form_validation->run() == TRUE) 
		{
			
			$dataInsert = array(
						'password' 		=> $this->input->post('new_password')
				); 
							
			 $this->common_model->updateData('admin', $dataInsert,array('admin_id'=>$u_id)); 
			 
			 $this->session->set_flashdata('msg','Password Changed Successfully.');						
			 redirect('admin/change_password');
			
		}
		
		$data['main_content'] = 'change_password';
		$this->load->view('includes/template',$data);
	}

    public function category_list()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$data['title'] = "Hitzz";
		
		$config = array();
		$config["base_url"] = base_url() ."/admin/category_list";		
		$total_row = $this->common_model->record_count('categories',array('status!='=>2));
		
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
		$data['records'] = $this->common_model->getAllwhere_pagination('categories',$config["per_page"],$page,array('status!='=>2));
				
		$data['main_content'] = 'category_list';
		$this->load->view('includes/template',$data);
		
	}
	
	public function category_status($id,$status)
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$datas = array(
					'status' 	=> $status,
			); 		
		 $this->common_model->updateData('categories', $datas,array('id'=>$id)); 
		 
		 if($status=="1")
		 {
			$this->session->set_flashdata('msg','Category Activate Successfully.');	
		 }
		 else
		 {
			$this->session->set_flashdata('msg','Category Deactivate Successfully.');		 
		 }		 
			redirect('admin/category_list');	            
	}
	
	public function delete_category($id)
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$this->common_model->updateData('categories',array('status'=>2),array('id'=>$id)); 
		
		$this->session->set_flashdata('msg','Category Deleted Successfully.');						
		
		redirect('admin/category_list');	          
	}
	
	public function edit_category($id)
	{
	    if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		$data['cdata'] =$cdata= $this->common_model->getsingle('categories', array('id'=>$id)); 
		$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');
		
		if($this->form_validation->run() == TRUE) 
		{
			if($_FILES['images']['name']!='')
			{
				$config['upload_path'] = 'uploads/category';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('images')) 
				{
					 $uploadData = $this->upload->data();
					$image = $uploadData['file_name'];
				}
			}
			else
			{
				$image=$cdata->image; 
			}
			    $dataupdate = array(
							'category_name' 	=> $this->input->post('cat_name'),
							'image'			    => $image
				); 	
					
				 $this->common_model->updateData('categories', $dataupdate,array('id'=>$id)); 
				 $this->session->set_flashdata('msg','Category Update Successfully.');	
								 
			redirect('admin/category_list');
		}
		$data['main_content'] = 'edit_category';
		$this->load->view('includes/template',$data);	            
	}
	
	public function add_doctor()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$data['categories'] =$categories= $this->common_model->getAllwhere('categories', array('status'=>1)); 
		$data['locations'] =$locations= $this->common_model->getAllwhere('locations', array('status'=>1)); 
		
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('location_id', 'location', 'trim|required');
		//$this->form_validation->set_rules('category_id[]', 'category_id', 'trim|required');
		
		if (empty($_FILES['image']['name']))
		{
			$this->form_validation->set_rules('image', 'Image', 'required');
		}
		
		$data['days'] = $days = $_POST['days'];
		$data['category_ids'] = $category_ids = $_POST['category_id']; 
		$day = implode(',',$days);
		$category_id = implode(',',$category_ids);
		
		if($this->form_validation->run() == TRUE) 
		{
			$config['upload_path'] = 'uploads/doctors';
			$config['allowed_types'] = 'gif|jpg|png';			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('image'))
			{
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];
				$dataInsert = array(
							'category_id' 	=> $category_id,
							'location_id' 	=> $this->input->post('location_id'),
							'name' 			=> $this->input->post('name'),
							'degree' 		=> $this->input->post('degree'),
							'start_experience' 	=> date('Y-m-d',strtotime($this->input->post('start_experience'))),
							'from_time' 	=> $this->input->post('ftime'),
							'to_time' 		=> $this->input->post('ttime'),
							'days' 			=> $day,
							'fees' 			=> $this->input->post('fees'),
							'address' 		=> $this->input->post('address'),
							'contact' 		=> $this->input->post('contact'),
							'image' 		=> $image,	
							'entry_date'	=> date('Y-m-d H:i:s')
						);
						//echo "<pre>"; print_r($dataInsert)die;
				$doctor_id = $this->common_model->insertData('doctors', $dataInsert);
				
				$cpt = count($_FILES['images']['name']);
			    $files = $_FILES;
					if($cpt>0)
					{
						for($i=0; $i<$cpt; $i++)
						{           
							$_FILES['images']['name']= $files['images']['name'][$i];
							$_FILES['images']['type']= $files['images']['type'][$i];
							$_FILES['images']['tmp_name']= $files['images']['tmp_name'][$i];
							$_FILES['images']['error']= $files['images']['error'][$i];
							$_FILES['images']['size']= $files['images']['size'][$i];    
							
							$config['upload_path'] = 'uploads/doctor_images';
							$config['allowed_types'] = 'gif|jpg|png';
							
							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							$this->upload->do_upload('images');
							$attachment_data = $this->upload->data();
							$other_image = $attachment_data['file_name'];
							if($other_image!='')
							{
								$insdata = array(						
										'doctor_id' 	=> $doctor_id,
										'images' 		=> $other_image,							
										'entry_date'	=> date('Y-m-d')
									);
								$this->common_model->insertData('doctor_images',$insdata);
							}
						}
					}
				$this->session->set_flashdata('msg','Doctor Added Successfully.');
			}			
				redirect('admin/doctors_list');
		}
		
		$data['main_content'] = 'add_doctor';
		$this->load->view('includes/template',$data);            
	}
	
	public function edit_doctors($id)
	{
	    if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		$data['categories'] =$categories= $this->common_model->getAllwhere('categories', array('status'=>1));
		$data['locations'] =$locations= $this->common_model->getAllwhere('locations', array('status'=>1)); 		
		$data['doctors'] =$doctors= $this->common_model->getsingle('doctors', array('id'=>$id)); 
		$data['doctor_images'] = $this->common_model->getAllwhere('doctor_images', array('doctor_id'=>$id)); 
		
		$days = $_POST['days'];
		$category_ids = $_POST['category_id'];
			
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('location_id', 'location', 'trim|required');
		
		if($this->form_validation->run() == TRUE) 
		{
			if($_FILES['image']['name']!='')
			{
				$config['upload_path'] = 'uploads/doctors';
				$config['allowed_types'] = 'gif|jpg|png';			
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('image'))
				{
					$uploadData = $this->upload->data();
					$image = $uploadData['file_name'];
				}
			}
			else
			{
				$image=$doctors->image; 
			}
			$day=implode(',',$days);
			$category_id=implode(',',$category_ids);
			
				$dataInsert = array(
							'category_id' 	=> $category_id,
							'location_id' 	=> $this->input->post('location_id'),
							'name' 			=> $this->input->post('name'),
							'degree' 		=> $this->input->post('degree'),
							'start_experience' 	=> date('Y-m-d',strtotime($this->input->post('start_experience'))),
							'from_time' 	=> $this->input->post('ftime'),
							'to_time' 		=> $this->input->post('ttime'),
							'days' 			=> $day,
							'fees' 			=> $this->input->post('fees'),
							'address' 		=> $this->input->post('address'),
							'contact' 		=> $this->input->post('contact'),
							'image' 		=> $image,	
							'entry_date'	=> date('Y-m-d H:i:s')
						);
								
				$doctor_id = $this->common_model->updateData('doctors', $dataInsert,array('id'=>$id)); 
			
				if($_FILES['images']['name'][0]!='')
				{
					$cpt = count($_FILES['images']['name']);
					$files = $_FILES;
						
						if($cpt>0)
						{
							for($i=0; $i<$cpt; $i++)
							{           
								$_FILES['images']['name']= $files['images']['name'][$i];
								$_FILES['images']['type']= $files['images']['type'][$i];
								$_FILES['images']['tmp_name']= $files['images']['tmp_name'][$i];
								$_FILES['images']['error']= $files['images']['error'][$i];
								$_FILES['images']['size']= $files['images']['size'][$i];    
								$config['upload_path'] = 'uploads/doctor_images';
								$config['allowed_types'] = 'gif|jpg|png';
								
								$this->load->library('upload', $config);
								$this->upload->initialize($config);
								$this->upload->do_upload('images');
								$attachment_data = $this->upload->data();
								$other_image = $attachment_data['file_name'];
								if($other_image!='')
								{
									$insdata = array(						
										'doctor_id' 	=> $id,
										'images' 		=> $other_image,							
										'entry_date'	=> date('Y-m-d')
									);
									$this->common_model->insertData('doctor_images',$insdata);
								}
							}
						}
				}
			
				$this->session->set_flashdata('msg','Doctor Added Successfully.');
						
				redirect('admin/doctors_list');
		}
		
		$data['main_content'] = 'edit_doctors';
		$this->load->view('includes/template',$data);	            
	}
	
	public function delete_doctors($id)
	{
	    if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		$id = $this->uri->segment(3);
		
		$this->common_model->deleteData('doctors',array('id'=>$id));
		
		$this->session->set_userdata('msg', array('msg' => 'Doctor Deleted Successfully'));
		
		redirect('admin/doctors_list');
	}
	
	public function doctors_list()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$data['title'] = "HELLO DOCTOR";
		
		$config = array();
		$config["base_url"] = base_url() ."/admin/doctors_list";		
		$total_row = $this->common_model->record_count('doctors',array());
		
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
		if($this->uri->segment(3)){
			$page = ($this->uri->segment(3)) ;
			$data['sno'] = $this->uri->segment(3)+1;
		}
		else
		{
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links(); 		
		
		$data['records'] =$record = $this->common_model->getAllwhere_pagination('doctors',$config["per_page"],$page,array());
		
		$ex = $this->uri->segment(3);	

		if($record && $ex=='export')
		{ 
			$delimiter = ",";
			
			$filename = 'DoctorList'.date('dmY').'.csv'; 
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$filename"); 
			header("Content-Type: application/csv; ");

			$file = fopen('php://output', 'w');

			$header = array('DOCTOR', 'CATEGORY NAME', 'DEGREE', 'EXPERIENCE', 'TIMING', 'MOBILE NUMBER', 'ADDRESS');
			fputcsv($file, $header);
			foreach ($record as $row)
			{ 
				$cat = $this->common_model->getsingle('categories', array('id'=>$rec->category_id));
				$from = new DateTime($row->start_experience);
				$to   = new DateTime('today');
				$exp =  $from->diff($to)->y;    
				$lineData = array($row->name, $cat->category_name, $row->degree, $exp.' yrs', $row->timing, $row->contact, $row->address); 
				fputcsv($file,$lineData,$delimiter); 
			}
				fclose($file);
				exit; 
				redirect('admin/doctors_list');	
		}	

		$data['main_content'] = 'doctors_list';
		$this->load->view('includes/template',$data);
	}
	
	public function view_doctors_details($id)
	{
	    if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		$data['records'] = $this->common_model->getsingle('doctors', array('id'=>$id));
		
		$data['doctor_images'] = $this->common_model->getAllwhere('doctor_images', array('doctor_id'=>$id)); 		
		
		$data['main_content'] = 'view_doctors_details';
		$this->load->view('includes/template',$data);	            
	}
	
	public function patient_list()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$data['title'] = "Hitzz";
		
		$config = array();
			$config["base_url"] = base_url() ."/admin/patient_list";		
			$total_row = $this->common_model->record_count('users',array());
		
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
		if($this->uri->segment(3)){
			$page = ($this->uri->segment(3)) ;
			$data['sno'] = $this->uri->segment(3)+1;
		}
		else
		{
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links(); 		
		
		$data['records'] = $this->common_model->getAllwhere_pagination('users',$config["per_page"],$page,array('status!='=>2));
				
		$data['main_content'] = 'patient_list';
		$this->load->view('includes/template',$data);
	}
	
	public function user_status($id,$status)
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		$datas = array(
					'status' 	=> $status,
			);
			
		 $this->common_model->updateData('users', $datas,array('user_id'=>$id)); 
		 
		 if($status=="1")
		 {
			$this->session->set_flashdata('msg','User Activate Successfully.');	
		 }
		 else
		 {
			$this->session->set_flashdata('msg','User Deactivate Successfully.');		 
		 }		 
			redirect('admin/patient_list');	            
	}
	
	public function bookings_list()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$from_date='';
		$to_date='';
		$data['msg'] = $this->session->flashdata('msg');	
		$data['title'] = "Hello Doctor";
		
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		if($from_date!="")
		{
			$this->session->set_userdata('from_date',$from_date);
		}else{
			if($_POST)
			{ 
				$this->session->set_userdata('from_date',$from_date);
			}
		}
		if($to_date!="")
		{
			$this->session->set_userdata('to_date',$to_date);
		}else{
			if($_POST)
			{ 
				$this->session->set_userdata('to_date',$to_date);
			}
		}
		$data['from_date'] = $from_date = $this->session->userdata('from_date');
		$data['to_date'] = $to_date = $this->session->userdata('to_date');
		
		$config = array();
			$config["base_url"] = base_url() ."/admin/bookings_list";
			if($from_date!='' || $to_date!='')
			{		
				$total_row = $this->common_model->record_count('booking',array());
			}else{
				$where = "booking_date BETWEEN '".$from_date."' and '".$to_date."'";
				$total_row = $this->common_model->search_booking_record_count('booking',$where);
			} 
		
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
		if($this->uri->segment(3)){
			$page = ($this->uri->segment(3)) ;
			$data['sno'] = $this->uri->segment(3)+1;
		}
		else
		{
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links(); 		
		
		if($from_date!='' || $to_date!='')
		{
			$data['records'] = $this->common_model->search_booking_all($from_date,$to_date,$config["per_page"],$page);
		}else{
			$data['records'] = $this->common_model->getAllwhere_pagination('booking',$config["per_page"],$page,array('status!='=>2),'booking_date','desc');
		}
		$data['main_content'] = 'bookings_list';
		$this->load->view('includes/template',$data);
	}

	public function export_bookings_list($from_date='',$to_date='')
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		if($from_date!='' && $to_date!='')
		{
			$where ="status!=2 and booking_date BETWEEN '".$from_date."' and '".$to_date."'";
		}
		else
		{
			$where ="status!=2";
		}
		
		$data['records'] = $record = $this->common_model->getAllwhere('booking',$where);
 
		if($record)
		{ 
			$delimiter = ","; 
			$filename = 'booking'.date('dmY').'.csv'; 
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$filename"); 
			header("Content-Type: application/csv; ");

			$file = fopen('php://output', 'w');

			$header = array('USER', 'DOCTOR', 'PATIENT NAME', 'AGE', 'GENDER', 'MOBILE NUMBER', 'AADHAR NUMBER', 'BOOKING DATE');
			fputcsv($file, $header);
			foreach ($record as $row)
			{ 
				$doctors = $this->common_model->getsingle('doctors', array('id'=>$row->doctor_id)); 
				$user = $this->common_model->getsingle('users', array('user_id'=>$row->user_id)); 
				$lineData = array($user->user_name, $doctors->name, $row->patient_name, $row->age, $row->gender, $row->mobile_number, $row->aadhar_number, date('d m Y', strtotime($row->booking_date))); 
				fputcsv($file,$lineData,$delimiter); 
			}
				fclose($file); 
				exit; 
		}	
	} 
	
	public function view_booking_details($id)
	{
	    if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		$data['records'] = $this->common_model->getsingle('booking', array('id'=>$id));
		
		$data['main_content'] = 'view_booking_details';
		$this->load->view('includes/template',$data);	            
	}
	
	public function approve_booking($id,$status)
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$datas = array(
					'booking_status' 	=> $status,
			); 		
		 $this->common_model->updateData('booking', $datas,array('id'=>$id)); 
		 
		 if($status=="1")
		 {
			$this->session->set_flashdata('msg','Booking Approved Successfully.');	
		 }	 
			redirect('admin/bookings_list');	            
	}
	
	public function location_list()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$data['title'] = "Hitzz";
		
		$config = array();
		$config["base_url"] = base_url() ."/admin/location_list";		
		$total_row = $this->common_model->record_count('locations',array('status!='=>2));
		
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
		$data['records'] = $this->common_model->getAllwhere_pagination('locations',$config["per_page"],$page,array('status!='=>2));
				
		$data['main_content'] = 'location_list';
		$this->load->view('includes/template',$data);
		
	}
	
	public function add_location()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$this->form_validation->set_rules('name', 'Location Name', 'trim|required');
		if (empty($_FILES['images']['name']))
		{
			$this->form_validation->set_rules('images', 'Image', 'required');
		}
		if($this->form_validation->run() == TRUE) 
		{
			$config['upload_path'] = 'uploads/location';
			$config['allowed_types'] = 'gif|jpg|png';			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('images'))
			{
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];
				$dataInsert = array(
							'name' 	=> $this->input->post('name'),
							'image' 			=> $image,	
							'status'			=> 1
						); 	
				$this->common_model->insertData('locations', $dataInsert); 	 
				$this->session->set_flashdata('msg','Location Added Successfully.');
			}			
				redirect('admin/location_list');
		}
		$data['main_content'] = 'add_location';
		$this->load->view('includes/template',$data);            
	}
	
	public function edit_location($id)
	{
	    if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		$data['cdata'] =$cdata= $this->common_model->getsingle('locations', array('id'=>$id)); 
		$this->form_validation->set_rules('name', 'Location Name', 'trim|required');
		
		if($this->form_validation->run() == TRUE) 
		{
			if($_FILES['images']['name']!='')
			{
				$config['upload_path'] = 'uploads/location';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('images')) 
				{
					 $uploadData = $this->upload->data();
					$image = $uploadData['file_name'];
				}
			}
			else
			{
				$image=$cdata->image; 
			}
			    $dataupdate = array(
							'name' 	=> $this->input->post('name'),
							'image'			    => $image
				); 	
					
				 $this->common_model->updateData('locations', $dataupdate,array('id'=>$id)); 
				 $this->session->set_flashdata('msg','Location Update Successfully.');	
								 
			redirect('admin/location_list');
		}
		$data['main_content'] = 'edit_location';
		$this->load->view('includes/template',$data);	            
	}
	
	public function delete_location($id)
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$this->common_model->updateData('locations',array('status'=>2),array('id'=>$id)); 
		
		$this->session->set_flashdata('msg','Location Deleted Successfully.');						
		
		redirect('admin/location_list');	          
	}
	
	public function location_status($id,$status)
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$datas = array(
					'status' 	=> $status,
			); 		
		 $this->common_model->updateData('locations', $datas,array('id'=>$id)); 
		 
		 if($status=="1")
		 {
			$this->session->set_flashdata('msg','Location Activate Successfully.');	
		 }
		 else
		 {
			$this->session->set_flashdata('msg','Location Deactivate Successfully.');		 
		 }		 
			redirect('admin/location_list');	            
	}
	
	public function add_pathology()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$this->form_validation->set_rules('name', 'Pathology Name', 'trim|required');
		if (empty($_FILES['images']['name']))
		{
			$this->form_validation->set_rules('images', 'Image', 'required');
		}
		if($this->form_validation->run() == TRUE) 
		{
			$config['upload_path'] = 'uploads/pathology';
			$config['allowed_types'] = 'gif|jpg|png';			
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('images'))
			{
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];
				$dataInsert = array(
							'name' 	=> $this->input->post('name'),
							'image' 			=> $image,	
							'status'			=> 1
						); 	
				$this->common_model->insertData('pathologies', $dataInsert); 	 
				$this->session->set_flashdata('msg','Pathology Added Successfully.');
			}			
				redirect('admin/pathology_list');
		}
		$data['main_content'] = 'add_pathology';
		$this->load->view('includes/template',$data);            
	}
	
	public function pathology_list()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$data['title'] = "Hitzz";
		
		$config = array();
		$config["base_url"] = base_url() ."/admin/pathology_list";		
		$total_row = $this->common_model->record_count('pathologies',array('status!='=>2));
		
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
		$data['records'] = $this->common_model->getAllwhere_pagination('pathologies',$config["per_page"],$page,array('status!='=>2));
				
		$data['main_content'] = 'pathology_list';
		$this->load->view('includes/template',$data);
	}
	
	public function edit_pathology($id)
	{
	    if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		$data['cdata'] =$cdata= $this->common_model->getsingle('pathologies', array('id'=>$id)); 
		$this->form_validation->set_rules('name', 'Pathology Name', 'trim|required');
		
		if($this->form_validation->run() == TRUE) 
		{
			if($_FILES['images']['name']!='')
			{
				$config['upload_path'] = 'uploads/pathology';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('images')) 
				{
					 $uploadData = $this->upload->data();
					$image = $uploadData['file_name'];
				}
			}
			else
			{
				$image=$cdata->image; 
			}
			    $dataupdate = array(
							'name' 	=> $this->input->post('name'),
							'image'			    => $image
				); 	
					
				 $this->common_model->updateData('pathologies', $dataupdate,array('id'=>$id)); 
				 $this->session->set_flashdata('msg','Pathology Update Successfully.');	
								 
			redirect('admin/pathology_list');
		}
		$data['main_content'] = 'edit_pathology';
		$this->load->view('includes/template',$data);	            
	}
	
	public function delete_pathology($id)
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$this->common_model->updateData('pathologies',array('status'=>2),array('id'=>$id)); 
		
		$this->session->set_flashdata('msg','Pathology Deleted Successfully.');						
		
		redirect('admin/pathology_list');	          
	}
	
	public function pathology_status($id,$status)
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$datas = array(
					'status' 	=> $status,
			); 		
		 $this->common_model->updateData('pathologies', $datas,array('id'=>$id)); 
		 
		 if($status=="1")
		 {
			$this->session->set_flashdata('msg','Pathology Activate Successfully.');	
		 }
		 else
		 {
			$this->session->set_flashdata('msg','Pathology Deactivate Successfully.');		 
		 }		 
			redirect('admin/pathology_list');	            
	}
	
	public function add_test()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$data['pdata'] =$cdata= $this->common_model->getAllwhere('pathologies', array('status'=>1)); 
		
		$this->form_validation->set_rules('name', 'Test Name', 'trim|required');
		$this->form_validation->set_rules('path_id', 'Pathology', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');
		
		if($this->form_validation->run() == TRUE) 
		{
			$dataInsert = array(
						'name' 		=> $this->input->post('name'),
						'path_id' 	=> $this->input->post('path_id'),
						'price' 	=> $this->input->post('price'),
						'description'=> $this->input->post('description'),
						'status'	=> 1
					); 	
			$this->common_model->insertData('pathology_test', $dataInsert); 	 
			$this->session->set_flashdata('msg','Test Added Successfully.');
					
			redirect('admin/test_list');
		}
		$data['main_content'] = 'add_test';
		$this->load->view('includes/template',$data);            
	}
	
	public function test_list()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');	
		$data['title'] = "Hello Doctor";
		
		$config = array();
		$config["base_url"] = base_url() ."/admin/test_list";		
		$total_row = $this->common_model->record_count('pathology_test',array('status!='=>2));
		
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
		$data['records'] = $this->common_model->getAllwhere_pagination('pathology_test',$config["per_page"],$page,array('status!='=>2));
				
		$data['main_content'] = 'test_list';
		$this->load->view('includes/template',$data);
	}
	
	public function edit_test($id)
	{
	    if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		$data['pdata'] =$pdata= $this->common_model->getAllwhere('pathologies', array('status'=>1));
		$data['result'] = $this->common_model->getsingle('pathology_test', array('id'=>$id));		
		$this->form_validation->set_rules('name', 'Test Name', 'trim|required');
		$this->form_validation->set_rules('path_id', 'Pathology', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');
		
		
		if($this->form_validation->run() == TRUE) 
		{
			    $dataupdate = array(
						'name' 		=> $this->input->post('name'),
						'path_id' 	=> $this->input->post('path_id'),
						'price' 	=> $this->input->post('price'),
						'description'=> $this->input->post('description')
				); 	
					
				 $this->common_model->updateData('pathology_test', $dataupdate,array('id'=>$id)); 
				 $this->session->set_flashdata('msg','Pathology Test Update Successfully.');	
								 
			redirect('admin/test_list');
		}
		$data['main_content'] = 'edit_test';
		$this->load->view('includes/template',$data);	            
	}
	
	public function delete_test($id)
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$this->common_model->updateData('pathology_test',array('status'=>2),array('id'=>$id)); 
		
		$this->session->set_flashdata('msg','Pathology Test Deleted Successfully.');						
		
		redirect('admin/test_list');	          
	}
	
	public function test_status($id,$status)
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$datas = array(
					'status' 	=> $status,
			); 		
		 $this->common_model->updateData('pathology_test', $datas,array('id'=>$id)); 
		 
		 if($status=="1")
		 {
			$this->session->set_flashdata('msg','Pathology Test Activate Successfully.');	
		 }
		 else
		 {
			$this->session->set_flashdata('msg','Pathology Test Deactivate Successfully.');		 
		 }		 
			redirect('admin/test_list');	            
	}
	
	public function path_test_bookings_list()
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		$from_date='';
		$to_date='';
		$data['msg'] = $this->session->flashdata('msg');	
		$data['title'] = "Hello Doctor";
		
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		if($from_date!="")
		{
			$this->session->set_userdata('from_date',$from_date);
		}else{
			if($_POST)
			{ 
				$this->session->set_userdata('from_date',$from_date);
			}
		}
		if($to_date!="")
		{
			$this->session->set_userdata('to_date',$to_date);
		}else{
			if($_POST)
			{ 
				$this->session->set_userdata('to_date',$to_date);
			}
		}
		$data['from_date'] = $from_date = $this->session->userdata('from_date');
		$data['to_date'] = $to_date = $this->session->userdata('to_date');
		
		$config = array();
			$config["base_url"] = base_url() ."/admin/path_test_bookings_list";
			if($from_date!='' || $to_date!='')
			{		
				$total_row = $this->common_model->record_count('test_booking',array());
			}else{
				$where = "booking_date BETWEEN '".$from_date."' and '".$to_date."'";
				$total_row = $this->common_model->search_booking_record_count('test_booking',$where);
			} 
		
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
		if($this->uri->segment(3)){
			$page = ($this->uri->segment(3)) ;
			$data['sno'] = $this->uri->segment(3)+1;
		}
		else
		{
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links(); 		
		
		if($from_date!='' || $to_date!='')
		{
			$data['records'] = $this->common_model->search_test_booking_all($from_date,$to_date,$config["per_page"],$page);
		}else{
			$data['records'] = $this->common_model->getAllwhere_pagination('test_booking',$config["per_page"],$page,array('status!='=>2),'booking_date','desc');
		}
		$data['main_content'] = 'path_test_bookings_list';
		$this->load->view('includes/template',$data);
	}
	
	public function view_test_booking_details($id)
	{
	    if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		$data['records'] = $this->common_model->getsingle('test_booking', array('id'=>$id));
		
		$data['main_content'] = 'view_test_booking_details';
		$this->load->view('includes/template',$data);	            
	}
	
	public function export_test_bookings_list($from_date='',$to_date='')
	{
		if($this->session->userdata('admin_id')=='')
		{
			redirect('login');
		}
		
		if($from_date!='' && $to_date!='')
		{
			$where ="status!=2 and booking_date BETWEEN '".$from_date."' and '".$to_date."'";
		}
		else
		{
			$where ="status!=2";
		}
		
		$data['records'] = $record = $this->common_model->getAllwhere('test_booking',$where);
 
		if($record)
		{ 
			$delimiter = ","; 
			$filename = 'testbooking'.date('dmY').'.csv'; 
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$filename"); 
			header("Content-Type: application/csv; ");

			$file = fopen('php://output', 'w');

			$header = array('USER', 'TEST', 'PATIENT NAME', 'AGE', 'MOBILE NUMBER', 'VILLAGE', 'ADDRESS', 'BOOKING DATE');
			fputcsv($file, $header);
			
			foreach ($record as $row)
			{ 
				$tids = explode(',',$row->test_ids);
				$csv='';
				foreach($tids as $value){ $path = $this->common_model->getsingle('pathology_test', array('id'=>$value)); $csv .= $path->name.","; }
								
				$user = $this->common_model->getsingle('users', array('user_id'=>$row->user_id)); 
				 $lineData = array($user->user_name, $csv, $row->patient_name, $row->age, $row->mobile_number, $row->village, $row->address, date('d m Y', strtotime($row->booking_date))); 
				
				//echo "<pre>"; print_r($lineData); die;
				fputcsv($file,$lineData,$delimiter); 
			}
			
				fclose($file); 
				exit; 
				
		}	
	} 
	
	
}	

?>	