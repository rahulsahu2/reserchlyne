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
		$data['subscription_plan'] = $subscription_plan = $this->common_model->getAllwhere('subscription_plan', array('status'=>1));
		$data['star_data'] = $star_data = $this->common_model->getAlllimit('star_performer' , array('status'=>1), 4 );
		$data['fast_data'] = $fast_data = $this->common_model->getAllwhere('fast_target' , array('status'=>1));
		// $data['doctors'] = $doctors = $this->common_model->getAllwhere_limit('doctors', '9', array('status!='=>2));
		//$data['doctors'] = $doctors = $this->common_model->getAllTopDoctors('9');
		//echo $this->db->last_query();die;
		//$data['msg'] = $this->session->flashdata('msg');	
		$data['msg'] = $this->session->flashdata('msg');	

		 // $msg  = "" ; 
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('gmail', 'gmail', 'trim|required');
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('subject', 'subject', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		

if($_SERVER['REQUEST_METHOD'] === 'POST') {

		if($this->form_validation->run() == TRUE) 
		{
				$dataInsert = array(
							'name' 	=> $this->input->post('name'),
							'gmail' 	=> $this->input->post('gmail'),
							'mobile' 	=> $this->input->post('mobile'),
							'subject' 	=> $this->input->post('subject'),
							'message' 	=> $this->input->post('message')
						); 

			$data = $this->common_model->insertData('enquiry', $dataInsert); 	 
					$name 	= $this->input->post('name');
					$gmail 	= $this->input->post('gmail');
					$mobile =$this->input->post('mobile');
					$subj	= $this->input->post('subject');
				    $mess 	= $this->input->post('message');
		if($data)
        {
              
			$to_cust = "info.amiteshwar.in@gmail.com";
			//$to_cust = "jainaaka@gmail.com"; // Aakansha jain
			$from_client ='info@amiteshwar.in' ; 
			$fromName = "Amiteshwar"; 
			$subject = "Amiteshwar.in Enquiry Mail";														
			
			$message .= '<b>Dear Sir/Madam</b> </br></br>';		
			$message .= '<p>Thanks for being a part of Amiteshwar.in : </p> </br></br>';	
			$message .= '<html><body>';		
			$message .= "<p><b>Username:</b>".$name."</p> </br><p><b>Email:</b> ".$gmail."</p></br>"; 			
			$message .= "<p><b>Mobile:</b> ".$mobile."</p> </br> <p><b>Subject:</b> ".$subj."</p></br><p><b>Message:</b> ".$mess."</p></br></br>";		
			$message .= '<p>Thanks & Regards</p>';		
			$message .= '<p>Amiteshwar.in</p>';				
			 
			$headers = array("From: info@amiteshwar.in",
				"Reply-To: info@amiteshwar.in",
				"Content-type: text/html;charset=UTF-8",
				"X-Mailer: PHP/" . PHP_VERSION
			);
			$headers = implode("\r\n", $headers);

			$mail = mail($to_cust, $subject, $message, $headers);
			//print_r($mail);die;
             
        }
        else
        {
          // $msg = 'Please try again after sometime';
        	//$data['msg'] =  'Thank you for your Enquiry. We will get in touch .';
         // $data['msg'] ='Please try again after sometime';
           
        }
		$this->session->set_flashdata('msg',' Thank you for your Enquiry. We will get in touch .');
					redirect('user');
		}
		$this->session->set_flashdata('msg','Please try again after sometime');
					redirect('user');
	}
		$data['info_data'] = $info_data= $this->common_model->getsingle('home_info', array('id'=>1));   
		$data['main_content'] = 'index';
		//echo "<pre>"; print_r($data['info_data']); die;
		$data['keywords'] = 'India Stock Market, Stock Market Investment, multicap fund, investment,Stock Market';
		$data['description'] = 'Amiteshwar. in is a leading equity research website, we recommend 2 multicap stocks weekly after fundamental analysis.';
		$data['title'] = 'Recommendation of 2 Multicap Stocks weekly | Amiteshwar.in';
		
		$this->load->view('includes/user_template',$data);		            
	}

	
	public function about()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['info_data'] = $info_data= $this->common_model->getsingle('home_info', array('id'=>1));   
//echo "<pre>"; print_r($data['info_data']); die;
		$data['main_content'] = 'about';
		
		
		$data['keywords'] = 'Amiteshwar Stock Market, Stock Market Analysis, Stock Market, India Stock Market, Multicap fund, Amiteshwar';
		$data['description'] = 'At Amiteswar.in We do in depth analysis of indian stock market to find best multicap stocks.';
		$data['title'] = 'Exclusive Research Experience in Indian Stock Market | Amiteshwar.in';
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function subscription()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['subscription_plan'] = $categories = $this->common_model->getAllwhere('subscription_plan', array('status'=>1));
		 $data['info_data'] = $info_data= $this->common_model->getsingle('home_info', array('id'=>1));    
		
		$data['main_content'] = 'subscription';
		
		$data['keywords'] = 'Stock Market Investment, Investment, Latest Stock Market, Multicap Stock Market, Stock Market ';
		$data['description'] = 'Do Stock market investment with latest multicap stocks at competitvely low prices.';
		$data['title'] = 'Subscription at low prices | Amiteshwar.in';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function why_choose()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'why_choose';
		
		$data['keywords'] = 'Amiteshwar Stock Market, Multicap Fund, Multicap Stock Market, Stock Market Analysis, the Best Stock Market';
		$data['description'] = 'using exclusive research experience and indepth stock market analysis, Amiteshwar.in recommends best multi cap stocks.';
		$data['title'] = 'SEBI Resgistered Research Analyst | Amiteshwar.in';
		
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function razorPaySuccess()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
		
		$data['main_content'] = 'thankyou';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            
	}

public function razorPay_orders()
{	
			$data_amount = $this->input->post('pdata_amounts');
			$data_id = $this->input->post('pdata_ids');
			//echo $data_id;die;
			$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
			$receipt =  substr(str_shuffle($str_result),0, 8);
			
			$rlogin = "rzp_live_OkVNyeILcznmr3";  //live
			$rpassword = "rxgw2EGQdxwes0TBrL74ksey"; 
			
			//$rlogin = "rzp_test_VA9mhQSg5SJs5H"; //test
			//$rpassword = "Ut36E48PUadXV2xuTd13ge2n"; 
			
			$fields = ['amount' => $data_amount*100, 'currency' => 'INR', 'receipt' => $receipt];
		
			$url = 'https://api.razorpay.com/v1/orders';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, "$rlogin:$rpassword");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			$result = curl_exec($ch);
			$obj = json_decode($result);

			$razor_order_id = $obj->id;
			$razor_receipt = $obj->receipt;
			$razor_status = $obj->status;
			//echo "<pre>"; print_r($result);die;
			curl_close($ch);
			
			
 	 	
		 //$this->session->set_userdata('data_amounts', $data_amount);
		 $this->session->set_userdata('razor_order_id', $razor_order_id);		 
	//echo json_encode($razor_order_id);
	if($razor_order_id!=''){
		$data['data_id'] = $data_id;
 	 	 $data['data_amount'] = $data_amount;
		 $data['razor_order_id'] = $razor_order_id; 
	$user_id = $this->session->userdata('user_id');

		$data['msg'] = $this->session->flashdata('msg');	
	
		$data['user'] = $userss =$this->common_model->getjoinwhere ($this->session->userdata('user_id'));
          // print_r($userss);die;	
	
     	     // print_r($extend_date);die;
		
		$data['info_data'] = $info_data= $this->common_model->getsingle('home_info', array('id'=>1));
		$data['login_data'] = $login_data= $this->common_model->getsingle('login_content', array('id'=>1));  
		$data['offer'] = $offer = $login_data->date;
	    $data['news'] =  $this->common_model->getAllwhererow('news_content', array('status'=>1),'id','desc',1);

	     $data['pre'] =  $this->common_model->getAllwhereresult();
	        // print_r( $data['pre']);die;



		$data['main_content'] = 'login_detail';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);	
	}
}
 
	public function razorPaySucces_post()
    { 
		$data['msg'] = $this->session->flashdata('msg');
		$year = date("Y"); 
     	 
        $yeardays =  $this->cal_days_in_year($year);

		$extend_date= date('Y-m-d', strtotime("+".$yeardays."days"));
 
		$user = $this->common_model->getsingle('users', array('email'=>$this->input->post('email')));
    
		//$api = new Api('rzp_test_VA9mhQSg5SJs5H', 'Ut36E48PUadXV2xuTd13ge2n');
			
		$pwd = bin2hex(openssl_random_pseudo_bytes(4));
		//$order_id = bin2hex(openssl_random_pseudo_bytes(4));

        if($user->email != $this->input->post('email')) 
        {
        	$dataInsert = [
             
               	'password' 	=>$pwd,
               	'name' 		=> $this->input->post('name'),
                'email' 	=> $this->input->post('email'),
              	'phone' 	=> $this->input->post('phone'),
                'address' 	=> $this->input->post('address'),
            ];
			
			$data = $this->common_model->insertData('users', $dataInsert); 
			
			//Create an customer 
				$rlogin = "rzp_live_OkVNyeILcznmr3";  //live
				$rpassword = "rxgw2EGQdxwes0TBrL74ksey";
				
				//$rlogin = "rzp_test_VA9mhQSg5SJs5H";  //test
				//$rpassword = "Ut36E48PUadXV2xuTd13ge2n";
				$fields2 = ['name' => $this->input->post('name'), 'contact' => $this->input->post('phone'), 'email' => $this->input->post('email')];
				$url = 'https://api.razorpay.com/v1/customers';
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($ch, CURLOPT_USERPWD, "$rlogin:$rpassword");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $fields2);
				echo $result = curl_exec($ch);
				curl_close($ch);    
			
			$datainsertss = [
			   'payment_id' => $this->input->post('razorpay_payment_id'),
			   'amount' 	=> $this->input->post('totalAmount'),
			   'subscription_id' => $this->input->post('subscription_id'),
			   'order_id' 	=> $this->input->post('razorpay_order_id'),
			   'user_id'	=>$data,
			   'date'	=>date('Y-m-d'),
			   's_status'=> 1
			];
			$data=  $this->common_model->insertData('subscription_history', $datainsertss);		

			$name 	= $this->input->post('name');
			$email 	= $this->input->post('email');
			$phone =$this->input->post('phone');
			$password =$pwd;
							
				if($data)
				{
					$to_cust = $email;
					$from_client ='info@amiteshwar.in' ; 
					$fromName = $name; 
					$subject = "Amiteshwar.in Payment Successfully done";														
					
					$message .= '<b>Dear Sir/Madam</b> </br></br>';		
					$message .= '<p>Thanks for being a part of Amiteshwar.in Your Login Details are as follows : </p> </br></br>';	
					$message .= '<html><body>';		
					$message .= "<table><tbody><tr><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;' colspan='2'><b>Username:</b></td><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;'>".$email."</td></tr><tr><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;' colspan='2'><b>Password:</b></td><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;'>".$password."</td></tr></tbody></table>"; 		
					$message .= '</body></html> </br></br> </br></br>';		
					$message .= '<p>You will be able to see Newsletter having Recommendation of 1 Stock on Wednesday & 1 Stock on Saturday Evening around 6:00 PM by using Login Details provided to you after Subscription.</p> </br></br></br></br>';		
					$message .= '<p>Thanks & Regards</p>';		
					$message .= '<p>Amiteshwar.in</p>';	
					 
					
					$headers = array("From: info@amiteshwar.in",
						"Reply-To: info@amiteshwar.in",
						"Content-type: text/html;charset=UTF-8",
						"X-Mailer: PHP/" . PHP_VERSION
					);
					$headers = implode("\r\n", $headers);

					mail($to_cust, $subject, $message, $headers);
					$msg = '<p style="color:red;"> Thank you for subscription. We will get in touch shortly.</p> ';
					echo json_encode(array('success' => 1, 'msg'=>$msg));
				}
				else
				{
				  $msg = 'Please try again after sometime';
					echo json_encode(array('success' => 0, 'msg'=>$msg));
				}

		}else{
			if( $this->input->post('subscription_id') !="1")
			{
				$dataupdate = [  


				   'payment_id' => $this->input->post('razorpay_payment_id'),
				   'amount' => $this->input->post('totalAmount'),
				   'subscription_id' => $this->input->post('subscription_id'),
				   'order_id' => $this->input->post('razorpay_order_id'),
				   'user_id'=>$user->user_id,
				   'date'=>date('Y-m-d'),
				   'extend_date' => $extend_date,
				  's_status'			=> 3
				
				];
				
			}
			else
			{

             	$dataupdate = [

				   'payment_id' => $this->input->post('razorpay_payment_id'),
				   'amount' => $this->input->post('totalAmount'),
				   'subscription_id' => $this->input->post('subscription_id'),
				   'order_id' => $this->input->post('razorpay_order_id'),
				   'user_id'=>$user->user_id,
				   'date'=>date('Y-m-d'),
				   's_status'	=> 4
				];
		
			}

			$data=	$this->common_model->insertData('subscription_history', $dataupdate);
			$to_cust = $user->email;
			$from_client ='info@amiteshwar.in' ; 
			$fromName = $user->name; 
			$subject = "Amiteshwar.in Payment Successfully done";														
			$message .= '<b>Dear Sir/Madam</b> </br></br>';		
			$message .= '<p>Thank You for choosing us again. </p> </br></br>';	
			$message .= '<html><body>';		
			$message .= '<p>Keep Growing, Keep Investing.</p> </br></br></br></br>';		
			$message .= '<p></p> </br></br></br></br>';		
			$message .= '<p>Thanks & Regards</p>';		
			$message .= '<p>Amiteshwar.in</p>';	
			 
			
			$headers = array("From: info@amiteshwar.in",
				"Reply-To: info@amiteshwar.in",
				"Content-type: text/html;charset=UTF-8",
				"X-Mailer: PHP/" . PHP_VERSION
			);
			$headers = implode("\r\n", $headers);

			mail($to_cust, $subject, $message, $headers);

		}

	 		
	}

	public function faq()
	{		
		$data['msg'] = $this->session->flashdata('msg');	
	 
				
		$data['main_content'] = 'faq';
		
		$data['keywords'] = 'Stock Market, India Stock Market, Stock Market Investment, Stock Market Analyst, Multicap Stock Market, Share Market, Best Stock Market';
		$data['description'] = 'Amiteshwar is a sebi registered research analyst, providing quality multicap stocks for stock market investment in indian stock market.';
		$data['title'] = 'Stock Market Analyst | Amiteshwar.in';
		
		
		$this->load->view('includes/user_template',$data);		            
	}

	public  function cal_days_in_year($year){
    $days=0; 
    for($month=1;$month<=12;$month++){ 
        $days = $days + cal_days_in_month(CAL_GREGORIAN,$month,$year);

     }
 return $days;

}

	
	public function login_detail()
	{		

        if(!empty($this->session->userdata('user_id'))){

		$user_id = $this->session->userdata('user_id');

		$data['msg'] = $this->session->flashdata('msg');	
	
		$data['user'] = $userss =$this->common_model->getjoinwhere ($this->session->userdata('user_id'));
          // print_r($userss);die;	
	
     	     // print_r($extend_date);die;
		
		$data['info_data'] = $info_data= $this->common_model->getsingle('home_info', array('id'=>1));
		$data['login_data'] = $login_data= $this->common_model->getsingle('login_content', array('id'=>1));  
		$data['offer'] = $offer = $login_data->date;
	    $data['news'] =  $this->common_model->getAllwhererow('news_content', array('status'=>1),'id','desc',1);

	     $data['pre'] =  $this->common_model->getAllwhereresult();
	        // print_r( $data['pre']);die;



		$data['main_content'] = 'login_detail';
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		
		}            
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
	
	public function test()
	{
		echo "welcome";die;
	}
	
	public function contact()
	{		
		$data['msg'] = $this->session->flashdata('msg');	

		 // $msg  = "" ; 
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('gmail', 'gmail', 'trim|required');
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('subject', 'subject', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		

if($_SERVER['REQUEST_METHOD'] === 'POST') {

		if($this->form_validation->run() == TRUE) 
		{
				$dataInsert = array(
							'name' 	=> $this->input->post('name'),
							'gmail' 	=> $this->input->post('gmail'),
							'mobile' 	=> $this->input->post('mobile'),
							'subject' 	=> $this->input->post('subject'),
							'message' 	=> $this->input->post('message')
						); 

			$data = 	$this->common_model->insertData('enquiry', $dataInsert); 	 
					$name 	= $this->input->post('name');
					$gmail 	= $this->input->post('gmail');
					$mobile =$this->input->post('mobile');
					$subj	= $this->input->post('subject');
				    $mess 	= $this->input->post('message');
		if($data)
        {
			
			$to_cust = "info.amiteshwar.in@gmail.com";
			$from_client ='info@amiteshwar.in' ; 
			$fromName = $name; 
			$subject = "Amiteshwar.in Enquiry Mail";														
			
			$message .= '<b>Dear Sir/Madam</b> </br></br>';		
			$message .= '<p>Thanks for being a part of Amiteshwar.in : </p> </br></br>';	
			$message .= '<html><body>';		
			$message .= "<p><b>Username:</b>".$name."</p> </br><p><b>Email:</b> ".$gmail."</p></br>"; 			
			$message .= "<p><b>Mobile:</b> ".$mobile."</p> </br> <p><b>Subject:</b> ".$subj."</p></br><p><b>Message:</b> ".$mess."</p></br></br>";		
			$message .= '<p>Thanks & Regards</p>';		
			$message .= '<p>Amiteshwar.in</p>';				
			 
			$headers = array("From: info@amiteshwar.in",
				"Reply-To: info@amiteshwar.in",
				"Content-type: text/html;charset=UTF-8",
				"X-Mailer: PHP/" . PHP_VERSION
			);
			$headers = implode("\r\n", $headers);

			$mail = mail($to_cust, $subject, $message, $headers);
			//print_r($mail);die;
            
            $this->session->set_flashdata('msg',' Thank you for your Enquiry. We will get in touch .');
					redirect('user/contact');
        }
        else
        {
          // $msg = 'Please try again after sometime';
        	//$data['msg'] =  'Thank you for your Enquiry. We will get in touch .';
         // $data['msg'] ='Please try again after sometime';
		 $this->session->set_flashdata('msg','Please try again after sometime');
					redirect('user/contact');
           
        }
		
		}
		
	}
		$data['main_content'] = 'contact';
		$data['title'] = 'Amiteshwar';
		$this->load->view('includes/user_template',$data);		            
	
}
public function payment($data_id,$data_amount)
	{	
			
			//$api = new Api('rzp_test_VA9mhQSg5SJs5H', 'Ut36E48PUadXV2xuTd13ge2n');
			$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
			$receipt =  substr(str_shuffle($str_result),0, 8);
			
			$username = "rzp_live_OkVNyeILcznmr3"; //live
			$password = "rxgw2EGQdxwes0TBrL74ksey";
			
			//$username = "rzp_test_VA9mhQSg5SJs5H";  //test 
			//$password = "Ut36E48PUadXV2xuTd13ge2n";
			$fields = ['amount' => $data_amount*100, 'currency' => 'INR', 'receipt' => $receipt];
		
			$login = $username;
			$url = 'https://api.razorpay.com/v1/orders';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			$result = curl_exec($ch);
			$obj = json_decode($result);

			$razor_order_id = $obj->id;
			$razor_receipt = $obj->receipt;
			$razor_status = $obj->status;
			//echo "--";
			//echo "<pre>"; print_r($result);die;
			curl_close($ch);
			
			
 	 	$data['data_id'] = $data_id;
 	 	 $data['data_amount'] = $data_amount;
		 $data['razor_order_id'] = $razor_order_id;
		$data['main_content'] = 'payment';
		$data['title'] = 'Amiteshwar';
		$this->load->view('includes/user_template',$data);		            
	
}
public function investor_complaints()
	{		
		//  echo "hello"; die;
		$data['msg'] = $this->session->flashdata('msg');	
		
		
		$data['complaints'] = $categories = $this->common_model->getAllwhere('complaints', array());
		$data['pending_ttl'] =$pend = $this->common_model->getSum();
		   // print_r($pend);die;

		$data['main_content'] = 'investor_complaints';
		
		$data['title'] = 'Amiteshwar';
		
		// $this->load->view('includes/user_template',$data);
		$this->load->view('includes/user_template',$data);		            
	}
	
	public function  privacy_policy()
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
	
	public function profile()
	{	
		if(!empty($this->session->userdata('user_id'))){

			$user_id = $this->session->userdata('user_id');

		$data['msg'] = $this->session->flashdata('msg');	
	
		 $data['user'] = $user =$this->common_model->getjoinwhere ($this->session->userdata('user_id'));
		   //print_r($user);die;
		
           	  
   

     	;
         
		$data['main_content'] = 'my_profile' ;
		
		$data['title'] = 'Amiteshwar';
		
		$this->load->view('includes/user_template',$data);		            

		}else{

			 redirect('user');
		}
	}
	
	public function change_password()
	{
		
		 $user_id = $this->session->userdata('user_id');
		

		if($user_id =='')
		{
		 redirect('user');
		}

		// echo "<pre>";print_r($_POST);
		
        $data['title'] = 'Change Password';

        // $this->load->library('form_validation');

        // $this->form_validation->set_rules('old_pass', 'old password', 'callback_password_check');
        // $this->form_validation->set_rules('new_pass', 'new password', 'required');
        // $this->form_validation->set_rules('confirm_pass', 'confirm password', 'required|matches[new_pass]');

        // $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // echo "<pre>";print_r($this->form_validation->run());
        // if($this->form_validation->run() == false) {
        if(empty($_POST['new_pass'])) {
        	        // echo "<pre>";print_r('ofdgk');die;
        	$data['main_content'] = 'change_password';
         	$this->load->view('includes/user_template',$data);	
        }
        else {
		// echo "<pre>";print_r('ok');die;

           

            $new_pass = $this->input->post('new_pass');

            // print_r($user_id);
            //print_r($new_pass);die;

            $this->common_model->updateData('users', array('password' =>$new_pass),array('user_id'=>$user_id));		
			$this->session->set_flashdata('success','Password change successfully!!');			
            redirect('user');
        }
    }

    public function password_check($oldpass)
    {
        $user_id = $this->session->userdata('user_id');
        $user = $this->common_model->get_user($user_id);

        if($user->password !== ($oldpass)) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
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
				 
				$this->session->set_flashdata('msg',' Login is Successful');
				
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
		public function forget()	{	
		$user = $this->common_model->getsingle('users', array('email'=>$this->input->post('email')));
		 $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
 
		 $password = substr(str_shuffle($str_result),
						   0, 8);

	   $users = $this->common_model->updateData('users',array('password' =>$password), array('email'=>$this->input->post('email')));
		if($user)	
			{		
			$to_cust = $user->email;
			$from_client ='info@amiteshwar.in' ; 	
			$fromName = 'Amiteshwar'; 		
			$subject = "Forget Password";		
			$message .= '<b>Dear Sir/Madam</b> </br></br>';		
			$message .= '<p>Thanks for being a part of Amiteshwar.in Your Login Details are as follows : </p> </br></br>';	
			$message .= '<html><body>';		
			$message .= "<table><tbody><tr><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;' colspan='2'><b>Password:</b></td><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;'>".$password."</td></tr></tbody></table>"; 		
			$message .= '</body></html> </br></br> </br></br>';		
			$message .= '<p>You will be able to see Newsletter having Recommendation of 1 Stock on Wednesday & 1 Stock on Saturday Evening around 6:00 PM by using Login Details provided to you after Subscription.</p> </br></br></br></br>';		
			$message .= '<p>Thanks & Regards</p>';		
			$message .= '<p>Amiteshwar.in</p>';	
			
			$headers = array("From: info@amiteshwar.in",
				"Reply-To: info@amiteshwar.in",
				"Content-type: text/html;charset=UTF-8",
				"X-Mailer: PHP/" . PHP_VERSION
			);
			$headers = implode("\r\n", $headers);

			//$headers = 'From: '.$from_client.'<'.$to_cust.'>';		
			//$headers .= "MIME-Version: 1.0" . "\r\n"; 	
			//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			mail($to_cust, $subject, $message, $headers);			 	
			$currentURL = $this->input->post('url');				
			$this->session->set_flashdata('success','Password send on your email successfully!!');	
			header("location:$currentURL");	
		}else{	
		$currentURL = $this->input->post('url');			
		$this->session->set_flashdata('error','Email Not exist over record!!');	
		header("location:$currentURL");	
		}	
	}
	
	
	
}	

?>