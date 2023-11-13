<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{

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

		$data['subscription_plan'] = $subscription_plan = $this->common_model->getAllwhere('subscription_plan', array('status' => 1));
		$data['star_data'] = $star_data = $this->common_model->getAlllimit('star_performer', array('status' => 1), 4);

		$data['fast_data'] = $fast_data = $this->common_model->getAllwhererow('fast_target', array('status' => 1), 'final_price', 'desc');

		$data['msg'] = $this->session->flashdata('msg');

		// $msg  = "" ; 
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('gmail', 'gmail', 'trim|required');
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('subject', 'subject', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');


		if ($_SERVER['REQUEST_METHOD'] === 'POST') {

			if ($this->form_validation->run() == TRUE) {
				$dataInsert = array(
					'name' => $this->input->post('name'),
					'gmail' => $this->input->post('gmail'),
					'mobile' => $this->input->post('mobile'),
					'subject' => $this->input->post('subject'),
					'message' => $this->input->post('message')
				);

				$data = $this->common_model->insertData('enquiry', $dataInsert);
				$name = $this->input->post('name');
				$gmail = $this->input->post('gmail');
				$mobile = $this->input->post('mobile');
				$subj = $this->input->post('subject');
				$mess = $this->input->post('message');
				if ($data) {
					$to_cust = "Researchlyne@gmail.com";
					$from_client = 'info@researchlyne.com';
					$fromName = "Researchlyne";
					$subject = "Researchlyne.com Enquiry Mail";
					//$to_cust = $gmail;
					//$to_cust = "info.amiteshwar.in@gmail.com";
					//$to_cust = "jainaaka@gmail.com"; // Aakansha jain

					$message .= '<b>Dear Sir/Madam</b> </br></br>';
					$message .= '<p>Thanks for being a part of Researchlyne.com : </p> </br></br>';
					$message .= '<html><body>';
					$message .= "<p><b>Username:</b>" . $name . "</p> </br><p><b>Email:</b> " . $gmail . "</p></br>";
					$message .= "<p><b>Mobile:</b> " . $mobile . "</p> </br> <p><b>Subject:</b> " . $subj . "</p></br><p><b>Message:</b> " . $mess . "</p></br></br>";
					$message .= '<p>Thanks & Regards</p>';
					$message .= '<p>Researchlyne.com</p>';

					$headers = array(
						"From: Researchlyne <info@researchlyne.com>",
						"Reply-To: info@researchlyne.com",
						"Content-type: text/html;charset=UTF-8",
						"X-Mailer: PHP/" . PHP_VERSION
					);
					$headers = implode("\r\n", $headers);

					$mail = mail($to_cust, $subject, $message, $headers);
					//print_r($mail);die;

				} else {
					// $msg = 'Please try again after sometime';
					//$data['msg'] =  'Thank you for your Enquiry. We will get in touch .';
					// $data['msg'] ='Please try again after sometime';

				}
				$this->session->set_flashdata('msg', ' Thank you for your Enquiry. We will get in touch .');
				redirect('user');
			}
			$this->session->set_flashdata('msg', 'Please try again after sometime');
			redirect('user');
		}
		$data['info_data'] = $info_data = $this->common_model->getsingle('home_info', array('id' => 1));
		$data['main_content'] = 'index';
		//echo "<pre>"; print_r($data['info_data']); die;
		$data['keywords'] = 'India Stock Market, Stock Market Investment, multicap fund, investment,Stock Market';
		$data['description'] = 'Researchlyne.com is a leading equity research website, we recommend 2 multicap stocks weekly after fundamental analysis.';
		$data['title'] = 'Recommendation of 2 Multicap Stocks weekly | Researchlyne.com';

		$this->load->view('includes/user_template', $data);
	}

	public function about()
	{
		$data['msg'] = $this->session->flashdata('msg');

		$data['info_data'] = $info_data = $this->common_model->getsingle('home_info', array('id' => 1));
		//echo "<pre>"; print_r($data['info_data']); die;
		$data['main_content'] = 'about';


		$data['keywords'] = 'Researchlyne Stock Market, Stock Market Analysis, Stock Market, India Stock Market, Multicap fund, Researchlyne';
		$data['description'] = 'At Researchlyne.com We do in depth analysis of indian stock market to find best multicap stocks.';
		$data['title'] = 'Exclusive Research Experience in Indian Stock Market | Researchlyne.com';
		$this->load->view('includes/user_template', $data);
	}

	public function subscription()
	{
		$data['msg'] = $this->session->flashdata('msg');

		$data['subscription_plan'] = $categories = $this->common_model->getAllwhere('subscription_plan', array('status' => 1));
		$data['info_data'] = $info_data = $this->common_model->getsingle('home_info', array('id' => 1));

		$data['main_content'] = 'subscription';

		$data['keywords'] = 'Stock Market Investment, Investment, Latest Stock Market, Multicap Stock Market, Stock Market ';
		$data['description'] = 'Do Stock market investment with latest multicap stocks at competitvely low prices.';
		$data['title'] = 'Subscription at low prices | Researchlyne.com';

		$this->load->view('includes/user_template', $data);
	}

	public function why_choose()
	{
		$data['msg'] = $this->session->flashdata('msg');

		$data['main_content'] = 'why_choose';

		$data['keywords'] = 'Researchlyne Stock Market, Multicap Fund, Multicap Stock Market, Stock Market Analysis, the Best Stock Market';
		$data['description'] = 'using exclusive research experience and indepth stock market analysis, Researchlyne.com recommends best multi cap stocks.';
		$data['title'] = 'SEBI Resgistered Research Analyst | Researchlyne.com';

		$this->load->view('includes/user_template', $data);
	}

	public function razorPaySuccess()
	{
		$data['msg'] = $this->session->flashdata('msg');

		$data['main_content'] = 'thankyou';

		$data['title'] = 'Researchlyne';

		$this->load->view('includes/user_template', $data);
	}

	public function razorPay_orders()
	{
		$data_amount = $this->input->post('pdata_amounts');
		$data_id = $this->input->post('pdata_ids');
		//echo $data_id;die;
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$receipt = substr(str_shuffle($str_result), 0, 8);

		$rlogin = "rzp_live_OkVNyeILcznmr3"; //live
		$rpassword = "rxgw2EGQdxwes0TBrL74ksey";

		// $rlogin = "rzp_test_VA9mhQSg5SJs5H"; //test
		// $rpassword = "Ut36E48PUadXV2xuTd13ge2n"; 

		$fields = ['amount' => $data_amount * 100, 'currency' => 'INR', 'receipt' => $receipt];

		$url = 'https://api.razorpay.com/v1/orders';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
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
		if ($razor_order_id != '') {
			$data['data_id'] = $data_id;
			$data['data_amount'] = $data_amount;
			$data['razor_order_id'] = $razor_order_id;
			$user_id = $this->session->userdata('user_id');

			$data['msg'] = $this->session->flashdata('msg');

			$data['user'] = $userss = $this->common_model->getjoinwhere($this->session->userdata('user_id'));
			// print_r($userss);die;	

			// print_r($extend_date);die;

			$data['info_data'] = $info_data = $this->common_model->getsingle('home_info', array('id' => 1));
			$data['login_data'] = $login_data = $this->common_model->getsingle('login_content', array('id' => 1));
			$data['offer'] = $offer = $login_data->date;
			$data['news'] = $this->common_model->getAllwhererow('news_content', array('status' => 1), 'id', 'desc', 1);

			$data['pre'] = $this->common_model->getAllwhereresult();
			// print_r( $data['pre']);die;



			$data['main_content'] = 'login_detail';

			$data['title'] = 'Researchlyne';

			$this->load->view('includes/user_template', $data);
		}
	}

	public function Test_123(){
		$defultDateFormat = 'Y-m-d';
		$existingDate = date($defultDateFormat);
		try{
			$previousSubscription = $this->common_model->getLastSubscription(260);
			$lastDate = $previousSubscription[0]->end_date;

			echo $lastDate." --- ".$existingDate;

			if(date($defultDateFormat,strtotime($lastDate)) > $existingDate){
				$existingDate = $lastDate;
				echo "extended";
			}
			else{
				echo "new date today";
			}
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
		echo "useful -> ".$existingDate;
	}

	public function razorPaySucces_post()
	{
		$data['msg'] = $this->session->flashdata('msg');
		$year = date("Y");
		$defultDateFormat = 'Y-m-d';
		$yeardays = $this->cal_days_in_year($year);

		$extend_date = date('Y-m-d', strtotime("+" . $yeardays . "days"));

		//$name1 	= 'aakansha';
		//$email1 	= 'jainaaka33@gmail.com';
		//$phone1 ='9039677154';
		//$address1 = 'fff';
		$email1 = $this->input->post('email');
		$name1 = $this->input->post('name');
		$phone1 = $this->input->post('phone');
		$address1 = $this->input->post('address');
		$user = $this->common_model->getsingle('users', array('email' => $email1));

		$pwd = bin2hex(openssl_random_pseudo_bytes(4));
		if ($user) {
			$usersubs = $this->common_model->getJoinwhere_test($user->user_id);
		}

		if ($user == '') {
			$dataInsert = [

				'password' => $pwd,
				'name' => $name1,
				'email' => $email1,
				'phone' => $phone1,
				'address' => $address1,
			];

			$data = $this->common_model->insertData('users', $dataInsert);
			if ($data) {
				//Create an customer 
				// $rlogin = "rzp_live_OkVNyeILcznmr3"; //live
				// $rpassword = "rxgw2EGQdxwes0TBrL74ksey";

				$rlogin = "rzp_test_wFouhCBGmLVZXP"; //test
		        $rpassword = "wupH6wkCp9R8aug6ATL00vT2"; 

				$fields2 = ['name' => $name1, 'contact' => $phone1, 'email' => $email1];
				$url = 'https://api.razorpay.com/v1/customers';
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				curl_setopt($ch, CURLOPT_USERPWD, "$rlogin:$rpassword");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $fields2);
				echo $result = curl_exec($ch);
				curl_close($ch);

				$datainsertss = [
					'payment_id' => $this->input->post('razorpay_payment_id'),
					'amount' => $this->input->post('totalAmount'),
					'subscription_id' => $this->input->post('subscription_id'),
					'order_id' => $this->input->post('razorpay_order_id'),
					'user_id' => $data,
					'date' => date('Y-m-d'),
					's_status' => 1
				];
				$datas = $this->common_model->insertData('subscription_history', $datainsertss);

				//aakansha
				$dur = $this->common_model->getsingle('subscription_plan', array('id' => $this->input->post('subscription_id')));
				$duration = explode(" ", $dur->duration);
				$effectiveDate = date('d-m-Y', strtotime("+$duration[0] months", strtotime(date('Y-m-d'))));
				$datainsertss2 = [
					'user_id' => $data,
					'subscription_id' => $this->input->post('subscription_id'),
					'created_date' => date('Y-m-d'),
					'end_date' => date('Y-m-d', strtotime($effectiveDate)),
					's_status' => 1
				];
				$data2 = $this->common_model->insertData('subscription_count_days', $datainsertss2);
				//aakansha

				if ($datas) {
					$to_cust = $email1;
					$from_client = 'info@researchlyne.com';
					$fromName = $name;
					$subject = "Researchlyne.com - Account successfully created";

					$message .= '<b>Dear ' . ucfirst($name1) . '</b> </br></br>';
					$message .= '<p>Your Subscription details have been mentioned below for reference : </p> </br></br>';
					$message .= '<html><body>';
					$message .= "<table><tbody><tr><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;' colspan='2'><b>Username:</b></td><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;'>" . $email1 . "</td></tr><tr><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;' colspan='2'><b>Password:</b></td><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;'>" . $pwd . "</td></tr></tbody></table>";
					$message .= '</body></html> </br></br> </br></br>';
					$message .= '<p>You will be able to see Newsletter having Recommendation of 1 Stock on Wednesday & 1 Stock on Saturday Evening around 6:00 PM by using Login Details provided to you after Subscription.</p> </br></br></br></br>';
					$message .= '<p>Thanks & Regards</p>';
					$message .= '<p>Researchlyne.com</p>';


					$headers = array(
						"From: Researchlyne <info@researchlyne.com>",
						"Reply-To: info@researchlyne.com",
						"Content-type: text/html;charset=UTF-8",
						"X-Mailer: PHP/" . PHP_VERSION
					);
					$headers = implode("\r\n", $headers);

					// mail($to_cust, $subject, $message, $headers);
					$this->common_model->send_mail($to_cust,$subject,$message,$headers);
					$msg = '<p style="color:red;"> Thank you for subscription. We will get in touch shortly.</p> ';
					echo json_encode(array('success' => 1, 'msg' => $msg));
				} else {
					$msg = 'Please try again after sometime';
					echo json_encode(array('success' => 0, 'msg' => $msg));
				}
			}

		} else {
			if ($this->input->post('subscription_id') != "1") {
				$durs = $this->common_model->getsingle('subscription_plan', array('id' => $this->input->post('subscription_id')));
				$duration = explode(" ", $durs->duration);
				$user_extend_date = $usersubs->extend_date;
				$user_entry_date = $usersubs->date;
				$extendDate = date('Y-m-d', strtotime("+$duration[0] months", strtotime(date('Y-m-d', strtotime($user_extend_date)))));
				$extendDate2 = date('Y-m-d', strtotime("+$duration[0] months", strtotime(date('Y-m-d', strtotime($user_entry_date)))));

				if ($user_extend_date >= date('Y-m-d')) {
					$dataupdate = [
						'payment_id' => $this->input->post('razorpay_payment_id'),
						'amount' => $this->input->post('totalAmount'),
						'subscription_id' => $this->input->post('subscription_id'),
						'order_id' => $this->input->post('razorpay_order_id'),
						'user_id' => $user->user_id,
						//'date'=>date('Y-m-d'),
						'extend_date' => $extendDate,
						//'extend_days' => 1,
						's_status' => 3
					];
				} else if ($user_extend_date != '0000-00-00' && $usersubs->comment != 'Extend') {
					$dataupdate = [
						'payment_id' => $this->input->post('razorpay_payment_id'),
						'amount' => $this->input->post('totalAmount'),
						'subscription_id' => $this->input->post('subscription_id'),
						'order_id' => $this->input->post('razorpay_order_id'),
						'user_id' => $user->user_id,
						'date' => $user_entry_date,
						'extend_date' => $extendDate,
						//'extend_days' => 1,
						's_status' => 3
					];
				} else {

					$dataupdate = [
						'payment_id' => $this->input->post('razorpay_payment_id'),
						'amount' => $this->input->post('totalAmount'),
						'subscription_id' => $this->input->post('subscription_id'),
						'order_id' => $this->input->post('razorpay_order_id'),
						'user_id' => $user->user_id,
						'date' => date('Y-m-d'),
						'extend_date' => $extendDate2,
						//'extend_days' => 2,
						's_status' => 3
					];
				}
				//print_r($dataupdate);

				//aakansha
				$dur = $this->common_model->getsingle('subscription_plan', array('id' => $this->input->post('subscription_id')));
				$duration = explode(" ", $dur->duration);
				$effectiveDate = date('d-m-Y', strtotime("+$duration[0] months", strtotime(date('Y-m-d'))));
				$datainsertss2 = [
					'user_id' => $user->user_id,
					'subscription_id' => $this->input->post('subscription_id'),
					'created_date' => date('Y-m-d'),
					'end_date' => date('Y-m-d', strtotime($effectiveDate)),
					's_status' => 3
				];
				$data2 = $this->common_model->insertData('subscription_count_days', $datainsertss2);
				//$datas=  $this->common_model->insertData('subscription_history', $dataupdate);
				$datas = $this->common_model->updateData('subscription_history', $dataupdate, array('user_id' => $user->user_id));
				//aakansha

			} else {
				$existingDate = date($defultDateFormat);
				try{
					$previousSubscription = $this->common_model->getLastSubscription($user->user_id);
					$lastDate = $previousSubscription[0]->end_date;
	
					$this->common_model->log($lastDate);

					if((date($defultDateFormat,strtotime($lastDate)) > $existingDate) == 1){
						$existingDate = $lastDate;
						$this->common_model->log("extended");
					}
					else{
						$this->common_model->log("new date today");
					}
				}
				catch(Exception $e){
					$this->common_model->log($e->getMessage());
				}
				$this->common_model->log("useful -> ".$existingDate);

				$dur = $this->common_model->getsingle('subscription_plan', array('id' => $this->input->post('subscription_id')));
				$duration = explode(" ", $dur->duration);
				$effectiveDate = date('d-m-Y', strtotime("+$duration[0] months", strtotime($existingDate)));
				$dataupdate = [

					'payment_id' => $this->input->post('razorpay_payment_id'),
					'amount' => $this->input->post('totalAmount'),
					'subscription_id' => $this->input->post('subscription_id'),
					'order_id' => $this->input->post('razorpay_order_id'),
					'user_id' => $user->user_id,
					'date' => date('Y-m-d'),
					'comment'=>'Extend',
					'extend_date'=> date('Y-m-d', strtotime($effectiveDate)),
					's_status' => 4
				];
				$datainsertss2 = [
					'user_id' => $user->user_id,
					'subscription_id' => $this->input->post('subscription_id'),
					'created_date' => date('Y-m-d'),
					'end_date' => date('Y-m-d', strtotime($effectiveDate)),
					's_status' => 4
				];
				$data2 = $this->common_model->insertData('subscription_count_days', $datainsertss2);
				$data = $this->common_model->insertData('subscription_history', $dataupdate);
				//aakansha
			}



			//
			$to_cust = $user->email;
			$from_client = 'info@researchlyne.com';
			$fromName = $user->name;
			$subject = "Researchlyne.com Payment Successfully done";
			$message .= '<b>Dear Sir/Madam</b> </br></br>';
			$message .= '<p>Thank You for choosing us again. </p> </br></br>';
			$message .= '<html><body>';
			$message .= '<p>Keep Growing, Keep Investing.</p> </br></br></br></br>';
			$message .= '<p></p> </br></br></br></br>';
			$message .= '<p>Thanks & Regards</p>';
			$message .= '<p>Researchlyne.com</p>';


			$headers = array(
				"From: Researchlyne <info@researchlyne.com>",
				"Reply-To: info@researchlyne.com",
				"Content-type: text/html;charset=UTF-8",
				"X-Mailer: PHP/" . PHP_VERSION
			);
			$headers = implode("\r\n", $headers);
			// mail($to_cust, $subject, $message, $headers);
			$this->common_model->send_mail($to_cust,$subject,$message,$headers);

		}

	}

	public function faq()
	{
		$data['msg'] = $this->session->flashdata('msg');


		$data['main_content'] = 'faq';

		$data['keywords'] = 'Stock Market, India Stock Market, Stock Market Investment, Stock Market Analyst, Multicap Stock Market, Share Market, Best Stock Market';
		$data['description'] = 'Researchlyne is a sebi registered research analyst, providing quality multicap stocks for stock market investment in indian stock market.';
		$data['title'] = 'Stock Market Analyst | Researchlyne.com';


		$this->load->view('includes/user_template', $data);
	}

	public function cal_days_in_year($year)
	{
		$days = 0;
		for ($month = 1; $month <= 12; $month++) {
			$days = $days + cal_days_in_month(CAL_GREGORIAN, $month, $year);

		}
		return $days;

	}


	public function login_detail()
	{

		if (!empty($this->session->userdata('user_id'))) {

			$user_id = $this->session->userdata('user_id');

			$data['msg'] = $this->session->flashdata('msg');

			$data['user'] = $userss = $this->common_model->getjoinwhere($this->session->userdata('user_id'));
			// print_r($userss);die;	

			// print_r($extend_date);die;

			$data['info_data'] = $info_data = $this->common_model->getsingle('home_info', array('id' => 1));
			$data['login_data'] = $login_data = $this->common_model->getsingle('login_content', array('id' => 1));
			$data['offer'] = $offer = $login_data->date;
			$data['news'] = $this->common_model->getAllwhererow('news_content', array('status' => 1), 'id', 'desc', 1);

			$data['pre'] = $this->common_model->getAllwhereresult();
			// print_r( $data['pre']);die;



			$data['main_content'] = 'login_detail';

			$data['title'] = 'Researchlyne';

			$this->load->view('includes/user_template', $data);
		}
	}


	public function investor()
	{
		// echo "hello"; die;
		$data['msg'] = $this->session->flashdata('msg');

		$data['info_data'] = $info_data = $this->common_model->getsingle('investor_charter', array('id' => 1));

		$data['main_content'] = 'investor';

		$data['title'] = 'Researchlyne';


		// $this->load->view('includes/user_template',$data);
		$this->load->view('includes/user_template', $data);
	}

	public function test()
	{
		/*$data['msg'] = $this->session->flashdata('msg');
			  $year = date("Y"); 
				
			  $yeardays =  $this->cal_days_in_year($year);

			  //	$extend_date= date('Y-m-d', strtotime("+6 months"));
			  //echo $extend_date; die;
			  $user = $this->common_model->getsingle('users', array('email'=>'jainaaka@gmail.com'));
			  $user_extend_date = '2023-08-20';
			  if($user_extend_date >= date('Y-m-d')){
				  echo "yes";
			  }else{
				  echo "no";
			  }
			  die;
			  $pwd = bin2hex(openssl_random_pseudo_bytes(4));
			  
			  $razorpay_payment_id='pay_test';
			  $totalAmount='1';
			  $subscription_id=6;
			  $razorpay_order_id='pay_test';
			  $user_extend_date = '2023-08-18';
			  $dur = $this->common_model->getsingle('subscription_plan', array('id'=>$subscription_id));
			  $duration= explode(" ",$dur->duration);
			  $effectiveDate = date('d-m-Y', strtotime("+$duration[0] months", strtotime(date('Y-m-d'))));
			  $extendDate = date('Y-m-d', strtotime("+$duration[0] months", strtotime(date('Y-m-d',strtotime($user_extend_date)))));
			  //$extendDate=	date('Y-m-d', strtotime($user->extend_date. ' + $duration[0] months'));	
			  //$extendDate=	date_add($user->extend_date, date_interval_create_from_date_string("3 months"));
			  $dataupdate = [  
						 //'payment_id' => $razorpay_payment_id,
						 //'amount' => $totalAmount,
						 'subscription_id' => $subscription_id,
						 //'order_id' => $razorpay_order_id,
						 //'user_id'=>$user->user_id,
						 //'date'=>date('Y-m-d'),
						 'extend_date' => $extendDate,
						 's_status' => 3
					  ]; 
					  //aakansha
					  //print_r($dataupdate); die;
					  $datainsertss2 = [
						 'user_id'		=>$user->user_id,
						 'subscription_id'=>$this->input->post('subscription_id'),
						 'created_date'	=>date('Y-m-d'),
						 'end_date'		=>date('Y-m-d',strtotime($effectiveDate)),
						 's_status'		=> 3
					  ];
					  $data2=  $this->common_model->insertData('subscription_count_days', $datainsertss2);
					  //$datas=  $this->common_model->insertData('subscription_history', $dataupdate);
					  $datas=  $this->common_model->updateData('subscription_history', $dataupdate,array('user_id'=>$user->user_id));
					  //$datas=  $this->common_model->updateData('subscription_history', $dataupdate,array('user_id'=>$user->user_id));				
					  //aakansha
					  
				   
		  */
	}

	public function contact()
	{
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('gmail', 'gmail', 'trim|required');
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('subject', 'subject', 'trim|required');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
		$data['main_content'] = 'contact';
		$data['title'] = 'Researchlyne';
		$this->load->view('includes/user_template', $data);
	}

	public function contactForm()
	{
		$dataInsert = array(
			'name' => $this->input->post('name'),
			'gmail' => $this->input->post('gmail'),
			'mobile' => $this->input->post('mobile'),
			'subject' => $this->input->post('subject'),
			'message' => $this->input->post('message')
		);

		$data = $this->common_model->insertData('enquiry', $dataInsert);
		$name = $this->input->post('name');
		$gmail = $this->input->post('gmail');
		$mobile = $this->input->post('mobile');
		$subj = $this->input->post('subject');
		$mess = $this->input->post('message');
		if ($data) {
			$to_cust = "rahulsa667@gmail.com";
			//	$to_cust = "jainaaka@gmail.com";
			$from_client = 'info@researchlyne.com';
			$fromName = "Researchlyne";
			$subject = "Researchlyne.com Enquiry Mail";

			$message .= '<b>Dear Sir/Madam</b> </br></br>';
			$message .= '<p>Thanks for being a part of Researchlyne.com : </p> </br></br>';
			$message .= '<html><body>';
			$message .= "<p><b>Username:</b>" . $name . "</p> </br><p><b>Email:</b> " . $gmail . "</p></br>";
			$message .= "<p><b>Mobile:</b> " . $mobile . "</p> </br> <p><b>Subject:</b> " . $subj . "</p></br><p><b>Message:</b> " . $mess . "</p></br></br>";
			$message .= '<p>Thanks & Regards</p>';
			$message .= '<p>Researchlyne.com</p>';

			$headers = array(
				"From: Researchlyne <info@researchlyne.com>",
				"Reply-To: info@researchlyne.com",
				"Content-type: text/html;charset=UTF-8",
				"X-Mailer: PHP/" . PHP_VERSION
			);
			$headers = implode("\r\n", $headers);
			// $mail = mail($to_cust, $subject, $message, $headers);
			$res = $this->common_model->send_mail($to_cust,$subject,$message,$headers);
			echo "1";
		} else {
			echo "2";
		}
	}

	public function contactFormMail()
	{
		$name = $this->input->post('name');
		$gmail = $this->input->post('gmail');
		$mobile = $this->input->post('mobile');
		$subj = $this->input->post('subject');
		$mess = $this->input->post('message');
		//$to_cust = "Researchlyne@gmail.com";
		$to_cust = "jainaaka@gmail.com";
		$from_client = 'info@researchlyne.com';
		$fromName = "Researchlyne";
		$subject = "Researchlyne.com Enquiry Mail";

		$message .= '<b>Dear Sir/Madam</b> </br></br>';
		$message .= '<p>Thanks for being a part of Researchlyne.com : </p> </br></br>';
		$message .= '<html><body>';
		$message .= "<p><b>Username:</b>" . $name . "</p> </br><p><b>Email:</b> " . $gmail . "</p></br>";
		$message .= "<p><b>Mobile:</b> " . $mobile . "</p> </br> <p><b>Subject:</b> " . $subj . "</p></br><p><b>Message:</b> " . $mess . "</p></br></br>";
		$message .= '<p>Thanks & Regards</p>';
		$message .= '<p>Researchlyne.com</p>';

		$headers = array(
			"From: Researchlyne <info@researchlyne.com>",
			"Reply-To: info@researchlyne.com",
			"Content-type: text/html;charset=UTF-8",
			"X-Mailer: PHP/" . PHP_VERSION
		);
		$headers = implode("\r\n", $headers);
		$mail = mail($to_cust, $subject, $message, $headers);
		echo "1";

	}

	public function payment($data_id, $data_amount)
	{
		/*$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
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
				 $razor_status = $obj->status;*/
		//echo "--";
		//echo "<pre>"; print_r($result);die;
		//curl_close($ch);
		//echo "hi".$razor_status; die;

		$data['data_id'] = $data_id;
		$data['data_amount'] = $data_amount;
		//$data['data_amount'] = '1';
		$data['razor_order_id'] = $razor_order_id;
		$data['main_content'] = 'payment';
		$data['title'] = 'Researchlyne';
		$this->load->view('includes/user_template', $data);

	}
	public function investor_complaints()
	{
		//  echo "hello"; die;
		$data['msg'] = $this->session->flashdata('msg');


		$data['complaints'] = $categories = $this->common_model->getAllwhere('complaints', array());
		$data['pending_ttl'] = $pend = $this->common_model->getSum();
		// print_r($pend);die;

		$data['main_content'] = 'investor_complaints';

		$data['title'] = 'Researchlyne';

		// $this->load->view('includes/user_template',$data);
		$this->load->view('includes/user_template', $data);
	}

	public function privacy_policy()
	{
		$data['msg'] = $this->session->flashdata('msg');

		$data['page_content'] = $this->common_model->getsingle('page_content', array('title' => 'privacy'));

		$data['main_content'] = 'privacy';

		$data['title'] = 'Researchlyne';

		$this->load->view('includes/user_template', $data);
	}

	public function disclaimer()
	{
		$data['msg'] = $this->session->flashdata('msg');

		$data['page_content'] = $this->common_model->getsingle('page_content', array('title' => 'disclaimer'));

		$data['main_content'] = 'disclaimer';

		$data['title'] = 'Researchlyne';

		$this->load->view('includes/user_template', $data);
	}

	public function term_condition()
	{
		$data['msg'] = $this->session->flashdata('msg');

		$data['page_content'] = $this->common_model->getsingle('page_content', array('title' => 'terms_condition'));

		$data['main_content'] = 'term_condition';

		$data['title'] = 'Researchlyne';

		$this->load->view('includes/user_template', $data);
	}

	public function profile()
	{
		if (!empty($this->session->userdata('user_id'))) {
			$user_id = $this->session->userdata('user_id');

			$data['msg'] = $this->session->flashdata('msg');

			$data['user'] = $user = $this->common_model->getjoinwhere($this->session->userdata('user_id'));
			//print_r($user);die;


			$data['main_content'] = 'my_profile';

			$data['title'] = 'Researchlyne';

			$this->load->view('includes/user_template', $data);

		} else {

			redirect('user');
		}
	}

	public function profile_test()
	{
		if (!empty($this->session->userdata('user_id'))) {

			$user_id = $this->session->userdata('user_id');

			$data['msg'] = $this->session->flashdata('msg');

			$data['user'] = $user = $this->common_model->getJoinwhere_test($this->session->userdata('user_id'));
			//print_r($user);die;


			$data['main_content'] = 'my_profile2';

			$data['title'] = 'Researchlyne';

			$this->load->view('includes/user_template', $data);

		} else {

			redirect('user');
		}
	}

	public function change_password()
	{

		$user_id = $this->session->userdata('user_id');


		if ($user_id == '') {
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
		if (empty($_POST['new_pass'])) {
			// echo "<pre>";print_r('ofdgk');die;
			$data['main_content'] = 'change_password';
			$this->load->view('includes/user_template', $data);
		} else {
			// echo "<pre>";print_r('ok');die;



			$new_pass = $this->input->post('new_pass');

			// print_r($user_id);
			//print_r($new_pass);die;

			$this->common_model->updateData('users', array('password' => $new_pass), array('user_id' => $user_id));
			$this->session->set_flashdata('success', 'Password change successfully!!');
			redirect('user');
		}
	}

	public function password_check($oldpass)
	{
		$user_id = $this->session->userdata('user_id');
		$user = $this->common_model->get_user($user_id);

		if ($user->password !== ($oldpass)) {
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

		$this->load->view('includes/user_template', $data);
	}

	public function gallery()
	{
		$data['msg'] = $this->session->flashdata('msg');

		$data['gallery'] = $gallery = $this->common_model->getAllwhere('gallery', array('status' => 1));

		$data['main_content'] = 'user/gallery';

		$data['title'] = 'The Hello Doctor';

		$this->load->view('includes/user_template', $data);
	}

	public function login()
	{
		if ($this->session->userdata('user_id') != '') {
			redirect('dashboard');
		}

		ini_set('display_errors', 1);
		$config['title'] = 'Login';
		$config['errors'] = '';
		$config['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

		$mobile_no = $this->input->post('mobile_no', TRUE);
		$password = $this->input->post('password', TRUE);

		// if form validation true
		if ($this->form_validation->run() == TRUE) {

			$wheres = array('mobile_no' => $mobile_no, 'password' => $password);
			$users = $this->common_model->getsingle('users', $wheres);

			if ($users) {
				$newdata = array(
					'user_id' => $users->user_id,
					'user_name' => $users->user_name,
					'type' => 'user',
					'login' => TRUE,
				);

				$this->session->set_userdata($newdata);

				$this->session->set_flashdata('msg', ' Login is Successful');

				if ($_SESSION['url'] != '') {
					redirect($_SESSION['url']);
				} else {
					redirect('user');
				}

			} else {
				$config['errors'] = 'Wrong Mobile Number or Password. Please Try again.';
			}

		}

		$config['main_content'] = 'login';
		$this->load->view('login', $config);
	}

	public function logout()
	{
		$array_items = array('user_id' => '', 'url' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		$url = base_url('user');
		header("location:$url");
	}

	public function signup()
	{
		if ($this->session->userdata('user_id') != '') {
			redirect('dashboard');
		}
		ini_set('display_errors', 1);
		$config['title'] = 'Login';
		$config['errors'] = '';
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('user_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mobile_no', 'mobile number', 'trim|required|numeric|min_length[10]|max_length[10]|is_unique[users.mobile_no]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

		$user_name = $this->input->post('user_name', TRUE);
		$mobile_no = $this->input->post('mobile_no', TRUE);
		$password = $this->input->post('password', TRUE);

		// if form validation true
		if ($this->form_validation->run() == TRUE) {
			$newdata = array(
				'user_name' => $user_name,
				'mobile_no' => $mobile_no,
				'password' => $password,
				'entry_date' => date('Y-m-d')
			);

			$this->common_model->insertData('users', $newdata);
			$this->session->set_flashdata('msg', 'Signup Successfully');
			redirect('user/login');

		}

		$config['main_content'] = 'signup';
		$this->load->view('signup', $config);
	}

	public function getlocationid()
	{
		$location = $_POST["location"];

		echo $location;
		die;

		$p_sub_categories = $this->common_model->getAllwhere('p_sub_categories', array('status' => '1', 'category_id' => $category_id));

		$cities = '<option value="" >Select Sub Category </option>';
		if (count($p_sub_categories) > 0) {
			foreach ($p_sub_categories as $c) {
				$cities .= '<option value="' . $c->id . '">' . $c->sub_cat_name . ' [' . $c->percent . '% ]</option>';
			}
		}
		echo $cities;
	}



	public function test_list($path_id = '')
	{
		if ($this->session->userdata('user_id') == '') {
			$_SESSION['url'] = current_url();
			redirect('user/login');
		}

		$data['msg'] = $this->session->flashdata('msg');

		$data['test'] = $test = $this->common_model->getAllwhere('pathology_test', array('status' => 1, 'path_id' => $path_id));

		$data['path_id'] = $path_id;

		$data['main_content'] = 'user/test_list';

		$data['title'] = 'The Hello Doctor';

		$this->load->view('includes/user_template', $data);
	}

	public function bookTest()
	{
		if ($this->session->userdata('user_id') == '') {
			echo "login";
		} else {
			$test_id = $_POST["test_id"];

			$_SESSION['test_ids'] = $_POST['test_id'];

			echo "<pre>";
			print_r($test_id);
		}
	}

	public function test_form($user_id = '')
	{
		if ($this->session->userdata('user_id') == '') {
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

		if ($this->form_validation->run() == TRUE) {

			$newdata = array(
				'user_id' => $this->session->userdata('user_id'),
				'test_ids' => $this->input->post('test_ids'),
				'patient_name' => $this->input->post('patient_name'),
				'age' => $this->input->post('age'),
				'booking_date' => $this->input->post('date'),
				'mobile_number' => $this->input->post('mobile_no'),
				'village' => $this->input->post('village'),
				'address' => $this->input->post('address'),
				'total_amount' => $this->input->post('total_amount'),
				'pincode' => $this->input->post('pincode'),
				'booking_status' => 0,
				'entry_date' => date('Y-m-d')
			);

			//echo "<pre>"; print_r($newdata); die;
			$this->common_model->insertData('test_booking', $newdata);
			$this->session->set_flashdata('msg', 'Book Test Successfully');
			redirect('user/pathologies');
		}


		$data['main_content'] = 'user/test_form';

		$data['title'] = 'The Hello Doctor';

		$this->load->view('includes/user_template', $data);
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

		if ($this->form_validation->run() == TRUE) {
			$newdata = array(
				'user_id' => $user_id ? $user_id : 0,

				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'subject' => $this->input->post('subject'),
				'description' => $this->input->post('description'),
				'entry_date' => date('Y-m-d')
			);

			//echo "<pre>"; print_r($newdata); die;
			$this->common_model->insertData('contact_us', $newdata);
			$this->session->set_flashdata('msg', 'Your contact form submit successfully!!');
			redirect('user/contact_us');
		}

		$data['main_content'] = 'user/contact';
		$data['title'] = 'The Hello Doctor';
		$this->load->view('includes/user_template', $data);
	}

	public function subscribe()
	{
		$user_id = $this->session->userdata('user_id');

		$this->form_validation->set_error_delimiters('', '');

		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('email', 'name', 'trim|required');
		$email = $this->input->post('email');
		if ($this->form_validation->run() == TRUE) {
			$message = '<html><body>';
			$message .= '<strong style="font-size:15px;">Dear Admin</strong>,';
			$message .= '<p><strong>' . $email . '</strong> Subscribed <i>The Hello Doctor</i> successfully.</p>';
			$message .= '</body></html>';
			$data = array(
				"sender" => array(
					"email" => 'iirisinformatics@gmail.com',
					"name" => 'The Hello Doctor'
				),
				"to" => array(
					array(
						"email" => 'info@thehellodoctor.in',
						// info@thehellodoctor.in
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
			$headers[] = 'Api-Key: xkeysib-def5a5b2d517fa05597e51fd9f9cf2fc37b5e2404cdc3019852e63ed6d759107-P6gvBq9MV1WT4bKfaaka';
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
	public function forget()
	{
		$user = $this->common_model->getsingle('users', array('email' => $this->input->post('email')));
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

		$password = substr(
			str_shuffle($str_result),
			0,
			8
		);

		$users = $this->common_model->updateData('users', array('password' => $password), array('email' => $this->input->post('email')));
		if ($user) {
			$to_cust = $user->email;
			$from_client = 'info@researchlyne.com';
			$fromName = 'Researchlyne';
			$subject = "Forget Password";
			$message .= '<b>Dear Sir/Madam</b> </br></br>';
			$message .= '<p>Thanks for being a part of Researchlyne.com Your Login Details are as follows : </p> </br></br>';
			$message .= '<html><body>';
			$message .= "<table><tbody><tr><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;' colspan='2'><b>Password:</b></td><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;'>" . $password . "</td></tr></tbody></table>";
			$message .= '</body></html> </br></br> </br></br>';
			$message .= '<p>You will be able to see Newsletter having Recommendation of 1 Stock on Wednesday & 1 Stock on Saturday Evening around 6:00 PM by using Login Details provided to you after Subscription.</p> </br></br></br></br>';
			$message .= '<p>Thanks & Regards</p>';
			$message .= '<p>Researchlyne.com</p>';

			$headers = array(
				"From: Researchlyne <info@researchlyne.com>",
				"Reply-To: info@researchlyne.com",
				"Content-type: text/html;charset=UTF-8",
				"X-Mailer: PHP/" . PHP_VERSION
			);
			$headers = implode("\r\n", $headers);

			//$headers = 'From: '.$from_client.'<'.$to_cust.'>';		
			//$headers .= "MIME-Version: 1.0" . "\r\n"; 	
			//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			mail($to_cust, $subject, $message, $headers);
			$currentURL = $this->input->post('url');
			$this->session->set_flashdata('success', 'Password send on your email successfully!!');
			header("location:$currentURL");
		} else {
			$currentURL = $this->input->post('url');
			$this->session->set_flashdata('error', 'Email Not exist over record!!');
			header("location:$currentURL");
		}
	}

	public function testMail()
	{

		$name = 'aakansha';
		$email = 'jainaaka@gmail.com';
		$phone = '9039677154';
		$password = '123456';


		$to_cust = $email;
		$fe = "From: Researchlyne <info@researchlyne.com>";
		$fromName = "test";
		$from_client = " From: '.$fromName.'<'.$fe.'> ";

		$subject = "Researchlyne.com - Account successfully created";

		$message .= '<b>Dear ' . ucfirst($name) . '</b> </br></br>';
		$message .= '<p>Your Subscription details have been mentioned below for reference : </p> </br></br>';
		$message .= '<html><body>';
		$message .= "<table><tbody><tr><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;' colspan='2'><b>Username:</b></td><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;'>" . $email . "</td></tr><tr><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;' colspan='2'><b>Password:</b></td><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;'>" . $password . "</td></tr></tbody></table>";
		$message .= '</body></html> </br></br> </br></br>';
		$message .= '<p>You will be able to see Newsletter having Recommendation of 1 Stock on Wednesday & 1 Stock on Saturday Evening around 6:00 PM by using Login Details provided to you after Subscription.</p> </br></br></br></br>';
		$message .= '<p>Thanks & Regards</p>';
		$message .= '<p>Researchlyne.com</p>';


		$headers = array(
			$fe,
			"Reply-To: info@researchlyne.com",
			"Content-type: text/html;charset=UTF-8",
			"X-Mailer: PHP/" . PHP_VERSION
		);
		$headers = implode("\r\n", $headers);

		$mail = mail($to_cust, $subject, $message, $headers);
		echo $mail;

	}
	public function testpay()
	{
		$data['msg'] = $this->session->flashdata('msg');
		$year = date("Y");

		$yeardays = $this->cal_days_in_year($year);

		$extend_date = date('Y-m-d', strtotime("+" . $yeardays . "days"));

		$email1 = "abc33@gmail.com";
		$name1 = "abc";
		$phone1 = "9874125637";
		$address1 = "test";
		$user = $this->common_model->getsingle('users', array('email' => $email1));

		//$api = new Api('rzp_test_VA9mhQSg5SJs5H', 'Ut36E48PUadXV2xuTd13ge2n');

		$pwd = bin2hex(openssl_random_pseudo_bytes(4));
		if ($user) {
			$usersubs = $this->common_model->getJoinwhere_test($user->user_id);
			//print_r($usersubs); die;
		}
		if ($user == '') {
			$dataInsert = [

				'password' => $pwd,
				'name' => $name1,
				'email' => $email1,
				'phone' => $phone1,
				'address' => $address1,
			];

			$data = $this->common_model->insertData('users', $dataInsert);

			//Create an customer 
			$rlogin = "rzp_live_OkVNyeILcznmr3"; //live
			$rpassword = "rxgw2EGQdxwes0TBrL74ksey";

			$fields2 = ['name' => $name1, 'contact' => $phone1, 'email' => $email1];
			$url = 'https://api.razorpay.com/v1/customers';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, "$rlogin:$rpassword");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields2);
			echo $result = curl_exec($ch);
			curl_close($ch);

			$datainsertss = [
				'payment_id' => "test",
				'amount' => "1111",
				'subscription_id' => "2",
				'order_id' => "test",
				'user_id' => $data,
				'date' => date('Y-m-d'),
				's_status' => 1
			];
			$datas = $this->common_model->insertData('subscription_history', $datainsertss);

			//aakansha
			$dur = $this->common_model->getsingle('subscription_plan', array('id' => 2));
			$duration = explode(" ", $dur->duration);
			$effectiveDate = date('d-m-Y', strtotime("+$duration[0] months", strtotime(date('Y-m-d'))));
			$datainsertss2 = [
				'user_id' => $data,
				'subscription_id' => 2,
				'created_date' => date('Y-m-d'),
				'end_date' => date('Y-m-d', strtotime($effectiveDate)),
				's_status' => 1
			];
			$data2 = $this->common_model->insertData('subscription_count_days', $datainsertss2);
			//aakansha

			$name = $name1;
			$email = $email1;
			$phone = $phone1;
			$password = $pwd;

			if ($datas) {
				$to_cust = $email;
				$from_client = 'info@researchlyne.com';
				$fromName = $name;
				$subject = "Researchlyne.com - Account successfully created";

				$message .= '<b>Dear ' . ucfirst($name) . '</b> </br></br>';
				$message .= '<p>Your Subscription details have been mentioned below for reference : </p> </br></br>';
				$message .= '<html><body>';
				$message .= "<table><tbody><tr><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;' colspan='2'><b>Username:</b></td><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;'>" . $email . "</td></tr><tr><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;' colspan='2'><b>Password:</b></td><td style='border-width: 3px;border-color: #C9C8C7;border-style: solid;padding: 5px;'>" . $password . "</td></tr></tbody></table>";
				$message .= '</body></html> </br></br> </br></br>';
				$message .= '<p>You will be able to see Newsletter having Recommendation of 1 Stock on Wednesday & 1 Stock on Saturday Evening around 6:00 PM by using Login Details provided to you after Subscription.</p> </br></br></br></br>';
				$message .= '<p>Thanks & Regards</p>';
				$message .= '<p>Researchlyne.com</p>';


				$headers = array(
					"From: Researchlyne <info@researchlyne.com>",
					"Reply-To: info@researchlyne.com",
					"Content-type: text/html;charset=UTF-8",
					"X-Mailer: PHP/" . PHP_VERSION
				);
				$headers = implode("\r\n", $headers);

				mail($to_cust, $subject, $message, $headers);
				$msg = '<p style="color:red;"> Thank you for subscription. We will get in touch shortly.</p> ';
				echo json_encode(array('success' => 1, 'msg' => $msg));
			} else {
				$msg = 'Please try again after sometime';
				echo json_encode(array('success' => 0, 'msg' => $msg));
			}

		} else {
			if ('2' != "1") {
				$dur = $this->common_model->getsingle('subscription_plan', array('id' => 2));
				$duration = explode(" ", $dur->duration);
				$user_extend_date = $usersubs->extend_date;
				$user_entry_date = $usersubs->date;
				$extendDate = date('Y-m-d', strtotime("+$duration[0] months", strtotime(date('Y-m-d', strtotime($user_extend_date)))));
				$extendDate2 = date('Y-m-d', strtotime("+$duration[0] months", strtotime(date('Y-m-d', strtotime($user_entry_date)))));

				if ($user_extend_date >= date('Y-m-d')) {
					$dataupdate = [
						'payment_id' => "test",
						'amount' => "1111",
						'subscription_id' => "2",
						'order_id' => "test",
						'user_id' => $user->user_id,
						//'date'=>date('Y-m-d'),
						'extend_date' => $extendDate,
						'extend_days' => 1,
						's_status' => 3
					];
				} else if ($user_extend_date != '0000-00-00' && $usersubs->comment != 'Extend') {
					$dataupdate = [
						'payment_id' => "test",
						'amount' => "1111",
						'subscription_id' => "2",
						'order_id' => "test",
						'user_id' => $user->user_id,
						'date' => $user_entry_date,
						'extend_date' => $extendDate,
						'extend_days' => 1,
						's_status' => 3
					];
				} else {

					$dataupdate = [
						'payment_id' => "test",
						'amount' => "1111",
						'subscription_id' => "2",
						'order_id' => "test",
						'user_id' => $user->user_id,
						'date' => date('Y-m-d'),
						'extend_date' => $extendDate2,
						'extend_days' => 2,
						's_status' => 3
					];
				}
				//print_r($dataupdate);

				//aakansha
				$dur = $this->common_model->getsingle('subscription_plan', array('id' => 2));
				$duration = explode(" ", $dur->duration);
				$effectiveDate = date('d-m-Y', strtotime("+$duration[0] months", strtotime(date('Y-m-d'))));
				$datainsertss2 = [
					'user_id' => $user->user_id,
					'created_date' => date('Y-m-d'),
					'end_date' => date('Y-m-d', strtotime($effectiveDate)),
					's_status' => 3
				];
				$data2 = $this->common_model->insertData('subscription_count_days', $datainsertss2);
				//$datas=  $this->common_model->insertData('subscription_history', $dataupdate);
				$datas = $this->common_model->updateData('subscription_history', $dataupdate, array('user_id' => $user->user_id));
				//aakansha

			} else {

				$dataupdate = [

					'payment_id' => "test",
					'amount' => "1111",
					'subscription_id' => "2",
					'order_id' => "test",
					'user_id' => $user->user_id,
					'date' => date('Y-m-d'),
					's_status' => 4
				];

				//aakansha
				$dur = $this->common_model->getsingle('subscription_plan', array('id' => 2));
				$duration = explode(" ", $dur->duration);
				$effectiveDate = date('d-m-Y', strtotime("+$duration[0] months", strtotime(date('Y-m-d'))));
				$datainsertss2 = [
					'user_id' => $user->user_id,
					'subscription_id' => 2,
					'created_date' => date('Y-m-d'),
					'end_date' => date('Y-m-d', strtotime($effectiveDate)),
					's_status' => 4
				];
				$data2 = $this->common_model->insertData('subscription_count_days', $datainsertss2);
				$data = $this->common_model->insertData('subscription_history', $dataupdate);
				//aakansha
			}



			//
			$to_cust = $user->email;
			$from_client = 'info@researchlyne.com';
			$fromName = $user->name;
			$subject = "Researchlyne.com Payment Successfully done";
			$message .= '<b>Dear Sir/Madam</b> </br></br>';
			$message .= '<p>Thank You for choosing us again. </p> </br></br>';
			$message .= '<html><body>';
			$message .= '<p>Keep Growing, Keep Investing.</p> </br></br></br></br>';
			$message .= '<p></p> </br></br></br></br>';
			$message .= '<p>Thanks & Regards</p>';
			$message .= '<p>Researchlyne.com</p>';


			$headers = array(
				"From: Researchlyne <info@researchlyne.com>",
				"Reply-To: info@researchlyne.com",
				"Content-type: text/html;charset=UTF-8",
				"X-Mailer: PHP/" . PHP_VERSION
			);
			$headers = implode("\r\n", $headers);

			//mail($to_cust, $subject, $message, $headers);

		}
	}

	public function testpay222()
	{
		$data['msg'] = $this->session->flashdata('msg');
		$year = date("Y");

		$yeardays = $this->cal_days_in_year($year);

		$extend_date = date('Y-m-d', strtotime("+" . $yeardays . "days"));

		$email1 = 'ee@gmail.com';
		$name1 = 'ee';
		$phone1 = '22222';
		$address1 = 'ee';
		$user = $this->common_model->getsingle('users', array('email' => $email1));

		$pwd = bin2hex(openssl_random_pseudo_bytes(4));
		if ($user) {
			$usersubs = $this->common_model->getJoinwhere_test($user->user_id);
		}
		if ($user == '') {
			$dataInsert = [

				'password' => $pwd,
				'name' => $name1,
				'email' => $email1,
				'phone' => $phone1,
				'address' => $address1,
			];

			$data = $this->common_model->insertData('users', $dataInsert);
		}

	}


}

?>