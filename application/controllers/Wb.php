<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Wb extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
		date_default_timezone_set('Asia/Calcutta'); 
    }
	
	//ganerat token no.
	function test_get(){
		$response= array('status'=>'200', 'message'=>'hiii', 'data'=>null);	
        $this->response($response	, 200); // 200 being the HTTP response code	
	}
	
	function login_post()
	{
		$mobile_no = $this->post('mobile_no');
		$password  = $this->post('password');
		$device_id = $this->post('device_id');
		
		if($mobile_no=='')
		{
			$response= array('status'=>'201', 'message'=>'Mobile Number Required.', 'data'=>null);	
		}
		else if($password=='')
		{
			$response= array('status'=>'201', 'message'=>'Password Required.', 'data'=>null);	
		}
		else if($device_id=='')
		{
			$response= array('status'=>'201', 'message'=>'Device ID Required.', 'data'=>null);	
		}
		else
		{
			$user = $this->common_model->getsingle('users',array('mobile_no'=>$mobile_no,'password'=>$password,'social_type'=>'Custom'));
		
			if($user)
			{	
				if($user->status=="0")
				{
					$response= array('status'=>'201', 'message'=>'Your Account is deactivate by administrator. Contact us adminstrator.', 'data'=>null);	
				}
				else
				{
					$viewdata = array(
						'user_id' 					=> $user->user_id,
						'user_name' 	 			=> $user->user_name,
						'mobile_no' 	 			=> $user->mobile_no,					
						'password' 	 				=> $user->password,
						'entry_date'			    => $user->entry_date
					);
					$this->common_model->updateData('users',array('device_id'=>$device_id),array('user_id'=>$user->user_id));
					$response= array('status'=>'200', 'message'=>'Login Successfully.', 'data'=>$viewdata);	
				}
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'Password OR Mobile number Not match.', 'data'=>null);	
			}
		}
		$this->response($response	, 200); // 200 being the HTTP response code	
	} 
	
	function signup_post(){
		
		$username = $this->post('username');
		$password = $this->post('password');
		$mobile_no = $this->post('mobile_no');
		$confirm_password = $this->post('confirm_password');
		$device_id = $this->post('device_id');
		
		$checkmobile= $this->common_model->getsingle('users',array('mobile_no'=>$mobile_no));
		
		if($username=='')
		{
			$response= array('status'=>'201', 'message'=>'Full Name Required.', 'data'=>null);	
		}	
		else if($mobile_no=='')
		{
			$response= array('status'=>'201', 'message'=>'Mobile Number Required.', 'data'=>null);	
		}
		else if($mobile_no!='' && $checkmobile)
		{
			$response= array('status'=>'201', 'message'=>'Mobile Number already used .', 'data'=>null);	
		}		
		else if($password=='')
		{
			$response= array('status'=>'201', 'message'=>'Password Required.', 'data'=>null);	
		}
		else if($confirm_password=='')
		{
			$response= array('status'=>'201', 'message'=>'Confirm Password Required.', 'data'=>null);	
		}
		else if($password!=$confirm_password)
		{
			$response= array('status'=>'201', 'message'=>'Confirm Password And Password does not match.', 'data'=>null);	
		}
		else{
			
			$ins_signup_data = array(
				'user_name' 	 				=> $username,
				'mobile_no'						=> $mobile_no,
				'password'                      => $password,
				'device_id'						=> $device_id,
				'entry_date'			        => date('Y-m-d')
			);
			
			$signup = $this->common_model->insertData('users',$ins_signup_data);
			
			$response= array('status'=>'200', 'message'=>'Data Insert Successfully.', 'data'=>$ins_signup_data);
		}
		$this->response($response	, 200); // 200 being the HTTP response code	
	}
	
	function forgot_password_post()
	{
		$email = $this->post('email');
		
		$user = $this->common_model->getsingle('users',array('email'=>$email));
		
		if($email=='')
		{
			$response= array('status'=>'201', 'message'=>'Email Required.', 'data'=>null);	
		}
		else if(!$user)
		{
			$response= array('status'=>'201', 'message'=>'Email Not Exist Over Records.', 'data'=>null);	
		}		
		else
		{
			mail($email,"Forgot Password","Your password is : ".$user->password);
			$response= array('status'=>'200', 'message'=>'Password Sent Successfully.', 'data'=>null);
			
		} 
		$this->response($response	, 200); // 200 being the HTTP response code	
	}
	
	function social_login_post()
	{
		$social_id   = $this->post('social_id');	
        $social_type = $this->post('social_type');			
		$device_id   = $this->post('device_id');
		$user_name   = $this->post('username');
		
		if($social_type=='')
		{
			$response= array('status'=>'201', 'message'=>'Social type Required.', 'data'=>null);	
		}
		if($social_id=='')
		{
			$response= array('status'=>'201', 'message'=>'Social Id Required.', 'data'=>null);	
		}
		else if($device_id=='')
		{
			$response= array('status'=>'201', 'message'=>'Device id Required.', 'data'=>null);	
		}		
		else
		{
			$userdata = $this->common_model->getsingle('users',array('social_id'=>$social_id,'social_type'=>$social_type));			
			if(!$userdata)
			{
				$ins_data1 = array(
					'user_name' 	 	=> $user_name,
					'social_id' 		=> $social_id,
					'device_id' 		=> $device_id,
					'social_type'		=> $social_type,
					'entry_date'		=> date('Y-m-d')
				);
				$insert_id = $this->common_model->insertData('users',$ins_data1);
			}
			
			$user = $this->common_model->getsingle('users',array('social_id'=>$social_id,'social_type'=>$social_type));			
			$this->common_model->updateData('users',array('device_id'=>$device_id),array('user_id'=>$user->user_id));
			$viewdata = array(
				    'user_id' 				    => $user->user_id,
					'social_type' 				=> $user->social_type,
					'social_id' 	 			=> $user->social_id,
					'username' 	 			    => $user->user_name,
					'mobile_no'					=> $user->mobile_no,
					'device_id' 	 			=> $user->device_id	,
					'entry_date'			    => date('Y-m-d')
				);
			$response= array('status'=>'200', 'message'=>'Login Successfully.', 'data'=>$viewdata);
		}
		$this->response($response	, 200); // 200 being the HTTP response code	
	}
	
	function logout_post()
	{
		$user_id	 = $this->post('user_id');
		
		if($user_id=='')
		{
			$response= array('status'=>'201', 'message'=>'User Required.', 'data'=>null);	
		}		
		else
		{
			$user = $this->common_model->getsingle('users',array('user_id'=>$user_id));		
			
			if($user)
			{ 
				$this->common_model->updateData('users',array('device_id'=>''),array('user_id'=>$user->user_id));
				$response= array('status'=>'200', 'message'=>'Logout Successfully.', 'data'=>null);
			}
			else
			{
				$response= array('status'=>'201', 'message'=>'User Not Exist.', 'data'=>null);	
			}
		
		}
		$this->response($response	, 200); // 200 being the HTTP response code	
	}
	
	function booking_form_post()
	{	
		$patient_name = $this->post('patient_name');
		$age = $this->post('age');
		$father_name = $this->post('father_name');
		$husband_name = $this->post('husband_name');
		$village = $this->post('village');
		$aadhar_number = $this->post('aadhar_number');
		$mobile_number = $this->post('mobile_number');
		$booking_date = $this->post('booking_date');
		$user_id = $this->post('user_id');
		$doctor_id = $this->post('doctor_id');
		
		$chkuser= $this->common_model->getsingle('users',array('user_id'=>$user_id));
		
		if($patient_name=='')
		{
			$response= array('status'=>'201', 'message'=>'Full Name Required.', 'data'=>null);	
		}
		else if($user_id=='')
		{
			$response= array('status'=>'201', 'message'=>'User id Required.', 'data'=>null);	
		}
		else if($doctor_id=='')
		{
			$response= array('status'=>'201', 'message'=>'Doctor id Required.', 'data'=>null);	
		}		
		else if($mobile_number=='')
		{
			$response= array('status'=>'201', 'message'=>'Mobile Number Required.', 'data'=>null);	
		}
		else if($village=='')
		{
			$response= array('status'=>'201', 'message'=>'Village/City Required.', 'data'=>null);	
		}
		else if($age=='')
		{
			$response= array('status'=>'201', 'message'=>'Age Required.', 'data'=>null);	
		}
		if($booking_date=='')
		{
			$response= array('status'=>'201', 'message'=>'Booking Date Required.', 'data'=>null);	
		}
		else
		{
		
			$ins_signup_data = array(
				'patient_name' 	 		=> $patient_name,
				'user_id'				=> $user_id,
				'doctor_id'				=> $doctor_id,
				'age'					=> $age,
				'father_name'			=> $father_name,
				'husband_name'          => $husband_name,
				'village'				=> $village,
				'mobile_number'			=> $mobile_number,
				'booking_date'			=> $booking_date,
				'entry_date'			=> date('Y-m-d')
			);
			
			$booking = $this->common_model->insertData('booking',$ins_signup_data);
			
			$cpt = count($_FILES['aadhar_images']['name']);
			$files = $_FILES;
			if($cpt>0)
			{
				for($i=0; $i<$cpt; $i++)
				{           
					$_FILES['aadhar_images']['name']= $files['aadhar_images']['name'][$i];
					$_FILES['aadhar_images']['type']= $files['aadhar_images']['type'][$i];
					$_FILES['aadhar_images']['tmp_name']= $files['aadhar_images']['tmp_name'][$i];
					$_FILES['aadhar_images']['error']= $files['aadhar_images']['error'][$i];
					$_FILES['aadhar_images']['size']= $files['aadhar_images']['size'][$i];    
					
					$config['upload_path'] = 'uploads/aadhar_images/';
					$config['allowed_types'] = '*';
					
					$config['encrypt_name'] = true;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('aadhar_images');
					$attachment_data = $this->upload->data();
					$image = $attachment_data['file_name'];
					//echo "<pre>"; print_r($image);die;
					$insdata = array(						
							'booking_id' 	=> $booking,
							'images' 		=> $image,
							'entry_date'	=> date('Y-m-d')
						);
					$this->common_model->insertData('doctument_images',$insdata);
				
				}
			}	
				if($chkuser->device_id!="")
				{
					$notificationdata = array(
						'user_id' 			=> $chkuser->user_id,
						'doctor_id'			=> $doctor_id,
						'type' 				=> "User",
						'title'				=> 'Booking',
						'notification_type' => "Booking",
						'notification'		=> "New Booking",
						'date_time'			=> date('Y-m-d H:i:s')
					);
					$this->common_model->insertData('notifications',$notificationdata); 
					
					$title	= "Booking";
					$description = "New Booking";
					$notification_type = "Booking";
					$this->sendNotifications($chkuser->device_id,$title,$description,$notification_type);
				} 
				
			$response= array('status'=>'200', 'message'=>'Data Insert Successfully.', 'data'=>$ins_signup_data);
		}
		$this->response($response	, 200); // 200 being the HTTP response code	
	}
	
	function get_categories_post()
	{
		$search_key = $this->post('search_key');
		
		$categories = $this->common_model->category_filter('categories',$search_key);
		
		$finalarray=array();
		if($categories)
		{
			
			foreach($categories as $d)
			{
				$p['id']	=   $d->id;
				$p['category_name']	=   $d->category_name;
				$p['image']			=   base_url('uploads/category/'.$d->image);
				$p['status']		=   $d->status;
				$finalarray[]=$p;
				
			$response= array('status'=>'200', 'message'=>'Categories Get Successfully.', 'data'=>$finalarray);
			}			
		}
		$this->response($response	, 200); // 200 being the HTTP response code	
	}
	
	function get_doctorlist_post()
	{
		$category_id = $this->post('category_id');
		$search_key = $this->post('search_key');
		
		if($category_id=='')
		{
			$response= array('status'=>'201', 'message'=>'Category Id Required.', 'data'=>null);	
		}
		else
		{
			$finalarray=array();
					
				$doctors = $this->common_model->doctors_filter($category_id,$search_key);
		
				if($doctors)
				{
					foreach($doctors as $d)
					{
						$start_experience = $d->start_experience;
						$from = new DateTime($start_experience);
						$to   = new DateTime('today');
						$exp =  $from->diff($to)->y;
						
						$p['id']			=   $d->id;
						$p['category_id']	=   $d->category_id;
						$p['name']			=   $d->name;
						$p['degree']		=   $d->degree;
						$p['start_experience']	=   $exp;
						$p['from_time']		=   $d->from_time;
						$p['to_time']		=   $d->to_time;
						$p['address']		=   $d->address;
						$p['contact']		=   $d->contact;
						$p['image']			=   base_url('uploads/doctors/'.$d->image);
						
						$finalarray[]=$p;
								
						$response= array('status'=>'200', 'message'=>'Doctors list Get Successfully.', 'data'=>$finalarray);
					}
				}else{
					$response= array('status'=>'201', 'message'=>'Data Not Found', 'data'=>Null);
				}
		}
		$this->response($response	, 200); // 200 being the HTTP response code	
	}
	
	function get_doctor_details_post()
	{
		$doctor_id = $this->post('doctor_id');
		
		if($doctor_id=='')
		{
			$response= array('status'=>'201', 'message'=>'Doctor Id Required.', 'data'=>null);	
		}
		else
		{
			$finalarray=array();
				
			$doctor = $this->common_model->getAllwhere('doctors',array('id'=>$doctor_id));
				
				foreach($doctor as $d)
				{
					$start_experience = $d->start_experience;
					$from = new DateTime($start_experience);
					$to   = new DateTime('today');
					$exp =  $from->diff($to)->y;
					$categories = $this->common_model->getsingle('categories',array('id'=>$d->category_id));
					
					$p['doctor_id']		=   $d->id;
					$p['category_id']	=   $d->category_id;
					$p['category_name']	=   $categories->category_name;
					$p['name']			=   $d->name;
					$p['degree']		=   $d->degree;
					$p['start_experience']	=   $exp;
					$p['from_time']		=   $d->from_time;
					$p['to_time']		=   $d->to_time;
					$p['address']		=   $d->address;
					$p['contact']		=   $d->contact;
					$p['profile_pic']			=   base_url('uploads/doctors/'.$d->image);
					
					
					$final_slider = array();
					$doctors = $this->common_model->getAllwhere('doctors',array('category_id'=>$d->category_id,'id!='=>$doctor_id));
					if($doctors)
					{
						foreach($doctors as $d)
						{
							$start_experience = $d->start_experience;
							$from = new DateTime($start_experience);
							$to   = new DateTime('today');
							$exp =  $from->diff($to)->y;
							
							$ps['doctor_id']			=   $d->id;
							$ps['category_id']	=   $d->category_id;
							$ps['name']			=   $d->name;
							$ps['degree']		=   $d->degree;
							$ps['start_experience']	=   $exp;
							$ps['image']			=   base_url('uploads/doctors/'.$d->image);
							
							$final_slider[]=$ps;
						}
					}else{
							$response= array('status'=>'201', 'message'=>'Data Not Found', 'data'=>Null);
					}
							
				}
				 
				$finalarray[]=$p;

				$finaldoctorimages=array();
				$doctor_images = $this->common_model->getAllwhere('doctor_images',array('doctor_id'=>$doctor_id));
				
				foreach($doctor_images as $dr)
				{
					$ps['id']			=   $d->id;
					$ps['doctor_id']	=   $dr->doctor_id;
					$ps['images']		=   base_url('uploads/doctor_images/'.$dr->images);
					
					$finaldoctorimages[]=$ps;
				}
				
				$response= array('status'=>'200', 'message'=>'Doctors details Get Successfully.','doctor_images'=>$final_slider, 'data'=>$finalarray);
		}
		
		$this->response($response	, 200); // 200 being the HTTP response code	
	}

	public function sendNotifications($device_id,$title,$description,$notification_type)
    {    
      //FCM api URL
      $url = 'https://fcm.googleapis.com/fcm/send';
    
	  //header with content_type api key
      $API_ACCESS_KEY ="AAAApM_CBD4:APA91bFAKLRxrfzoGTLkVwGx1vO254BdVFx-YDyJttwhmXRIVjlXYLkngkIRHHgiqHav3qUuzqGeB9wxIRSWwZdU6H7SIcCudjNmvVj-jbMxo1jon9tFAvB97FK9cglzE4mFbftZNUnd";
		
		$msg = array(
			'title'	=>$title,
			'body'	=> $description,
			'priority'=>"high",
			'sound' => 'default',
			'badge'	=>0,
			'show_in_foreground'=>true
		);
		
		$fields = array
		(
			'to' 				=> $device_id,
			'notification'  	=> $description,
			'data'				=> $msg,
			'notification_type' => $notification_type		
		); 
		
		$headers = array
		(
			'Authorization: key=' . $API_ACCESS_KEY,
			'Content-Type: application/json'
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result=curl_exec($ch);
		curl_close($ch);
	
	
    }
	

	
	
	
}
	

