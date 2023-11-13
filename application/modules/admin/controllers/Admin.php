<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

	public function index($page = '')
	{
		//echo "hi";die;
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['msg'] = $this->session->flashdata('msg');

		$data['users'] = $this->common_model->record_count('users', array());
		$data['news'] = $this->common_model->record_count('news_content', array());
		$data['renew'] = $renew = $this->common_model->count();
		$renewal = count($renew);
		//$data['non_renew'] =$non_renew = $this->common_model->non_count(); 	 
		//$non_renewal = count($non_renew);

		$non_renew = $this->common_model->non_renewal();

		foreach ($non_renew as $keyplus => $nval) {
			$subs = $this->common_model->getsingle('subscription_plan', array('id' => $nval->subscription_id));
			$duration = $subs->duration;
			$durationDate = date('Y-m-d', strtotime($nval->date . " + " . $duration));
			//echo "Duration -".$duration." /date-".$nval->date." /duration date".$durationDate."<br>" ;
			if ($durationDate < date('Y-m-d')) {
				$keypluss = $keypluss + 1;
			}
		}
		$data['non_renew'] = $keypluss;


		$data['bfr10daysexpiration'] = $bfr10daysexpiration = $this->common_model->last10daysofexpiration();
		//select MAX(id), user_id from subscription_history GROUP BY user_id

		$data['main_content'] = 'dashboard';
		$this->load->view('includes/template', $data);

	}

	public function add_subscription()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');

		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');
		//$this->form_validation->set_rules('duration', 'duration', 'trim|required');
		//$this->form_validation->set_rules('price', 'price', 'trim|required|numeric');
		//$this->form_validation->set_rules('discounted_price', 'discounted_price', 'trim|required|numeric');
		//$this->form_validation->set_rules('off_price', 'off_price', 'trim|required|numeric');

		if ($this->form_validation->run() == TRUE) {
			$dataInsert = array(
				'title' => $this->input->post('title'),
				'duration' => $this->input->post('duration'),
				'price' => $this->input->post('price'),
				'discounted_price' => $this->input->post('discounted_price'),
				'off_price' => $this->input->post('off_price'),
				'created_date' => date('Y-m-d'),
				'status' => 1
			);
			$this->common_model->insertData('subscription_plan', $dataInsert);
			$this->session->set_flashdata('msg', 'Subscription Added Successfully.');

			redirect('admin/subscription_list');
		}
		$data['main_content'] = 'add_subscription';
		$this->load->view('includes/template', $data);
	}
	public function subscription_benefits()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$id = 1;

		$data['home_info'] = $cdata = $this->common_model->getsingle('subscription_benefits', array('id' => $id));

		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		/*$this->form_validation->set_rules('benefits_title', 'benefits_title', 'trim');
			  $this->form_validation->set_rules('key1_title', 'key1_title', 'trim');
			  $this->form_validation->set_rules('key2_title', 'key2_title', 'trim');
			   $this->form_validation->set_rules('key3_title', 'key3_title', 'trim');
			  $this->form_validation->set_rules('key4_title', 'key4_title', 'trim');
			  $this->form_validation->set_rules('key1_info', 'key1_info', 'trim');
			  $this->form_validation->set_rules('key2_info', 'key2_info', 'trim');
			  $this->form_validation->set_rules('key2_info', 'key2_info', 'trim');
			  $this->form_validation->set_rules('key3_info', 'key3_info', 'trim');
			  $this->form_validation->set_rules('key4_info', 'key4_info', 'trim');*/

		if ($this->form_validation->run() == TRUE) {

			$dataupdate = array(

				'benefits_title' => $this->input->post('benefits_title'),
				'key1_title' => $this->input->post('key1_title'),
				'key1_info' => $this->input->post('key1_info'),
				'key2_title' => $this->input->post('key2_title'),
				'key2_info' => $this->input->post('key2_info'),
				'key3_title' => $this->input->post('key3_title'),
				'key3_info' => $this->input->post('key3_info'),
				'key4_title' => $this->input->post('key4_title'),
				'key4_info' => $this->input->post('key4_info'),
			);


			$this->common_model->updateData('subscription_benefits', $dataupdate, array('id' => $id));
			// print_r($dataupdate);die;  				
			$this->session->set_flashdata('msg', 'Subscription Benefits Updated Successfully.');


			redirect('admin/subscription_benefits');
		}
		$data['main_content'] = 'add_subscription_benefits';
		$this->load->view('includes/template', $data);
	}

	public function login_content()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$id = 1;

		$data['login'] = $cdata = $this->common_model->getsingle('login_content', array('id' => $id));

		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		/*$this->form_validation->set_rules('header_title', 'header_title', 'trim|required');
			  $this->form_validation->set_rules('key1_title', 'key1_title', 'trim|required');
			  $this->form_validation->set_rules('key2_title', 'key2_title', 'trim|required');
			   $this->form_validation->set_rules('key3_title', 'key3_title', 'trim|required');
			  // $this->form_validation->set_rules('key4_title', 'key4_title', 'trim|required');
			  $this->form_validation->set_rules('original_price', 'original_price', 'trim|required');
			  $this->form_validation->set_rules('discount_price', 'discount_price', 'trim|required');*/


		if ($this->form_validation->run() == TRUE) {

			$dataupdate = array(

				'header_title' => $this->input->post('header_title'),
				'key1_title' => $this->input->post('key1_title'),
				'key2_title' => $this->input->post('key2_title'),
				'key3_title' => $this->input->post('key3_title'),
				// 'key4_title' 	=> $this->input->post('key4_title'),
				'original_price' => $this->input->post('original_price'),
				'discount_price' => $this->input->post('discount_price'),
				'content' => $this->input->post('editor1'),
			);
			// 			if($this->input->post('editor1'))
			// {
			// 	$content = $this->input->post('editor1'); 
			// 	// $title = "Notes";
			// 	$this->common_model->updateData('login_content', array('content' => $content ));
			// }


			$this->common_model->updateData('login_content', $dataupdate, array('id' => $id));
			// print_r($dataupdate);die;  				
			$this->session->set_flashdata('msg', 'login_content Updated Successfully.');


			redirect('admin/login_content');
		}
		$data['main_content'] = 'add_login_content';
		$this->load->view('includes/template', $data);
	}
	public function faq_info()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['faq'] = $faq = $this->common_model->getAllwhere('faq_content', array('status' => 1));
		$data['main_content'] = 'faq_list';
		$this->load->view('includes/template', $data);

	}


	public function faq_content()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('question[]', 'Question', 'trim|required');
		$this->form_validation->set_rules('answer[]', 'Answer', 'trim|required');




		if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {



			$question = $this->input->post('question');
			$answer = $this->input->post('answer');




			foreach ($question as $key => $value) {

				$dataInsert = array(

					'question' => $value,
					'answer' => $answer[$key],
					'status' => 1

				);


				$this->common_model->insertData('faq_content', $dataInsert);

			}


		}


		if ($this->form_validation->run() == TRUE) {





			$this->session->set_flashdata('msg', 'FAQ Content Added Successfully.');


			redirect('admin/faq_info');
		}

		$data['main_content'] = 'add_faq';
		$this->load->view('includes/template', $data);
	}
	public function edit_faq($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['cdata'] = $cdata = $this->common_model->getsingle('faq_content', array('id' => $id));
		$this->form_validation->set_rules('question[]', 'Question', 'trim|required');
		$this->form_validation->set_rules('answer[]', 'Answer', 'trim|required');
		if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {



			$question = $this->input->post('question');
			$answer = $this->input->post('answer');



			foreach ($question as $key => $value) {

				$dataupdate = array(

					'question' => $value,
					'answer' => $answer[$key],
					'status' => 1

				);


				$this->common_model->updateData('faq_content', $dataupdate, array('id' => $id));
			}
		}

		if ($this->form_validation->run() == TRUE) {

			$this->session->set_flashdata('msg', 'Edit FAQ Update Successfully.');

			redirect('admin/faq_info');
		}

		$data['main_content'] = 'edit_faq';
		$this->load->view('includes/template', $data);
	}


	public function delete_faq($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->updateData('faq_content', array('status' => 2), array('id' => $id));

		$this->session->set_flashdata('msg', 'Faq Deleted Successfully.');

		redirect('admin/faq_info');
	}


	public function other_setting()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$id = 1;

		$data['days'] = $cdata = $this->common_model->getsingle('extend_days', array('id' => $id));

		$data['msg'] = $this->session->flashdata('msg');
		//$this->form_validation->set_rules('days', 'Extend Days', 'trim|required');
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');



		if ($this->form_validation->run() == TRUE) {

			$dataupdate = array(

				'days' => $this->input->post('days'),

			);
			// 			if($this->input->post('editor1'))
			// {
			// 	$content = $this->input->post('editor1'); 
			// 	// $title = "Notes";
			// 	$this->common_model->updateData('login_content', array('content' => $content ));
			// }


			$this->common_model->updateData('extend_days', $dataupdate, array('id' => $id));
			// print_r($dataupdate);die;  				
			$this->session->set_flashdata('msg', 'Extend days Updated Successfully.');


			redirect('admin/other_setting');
		}
		$data['main_content'] = 'add_other_setting';
		$this->load->view('includes/template', $data);
	}

	public function subscription_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Researchlyne";

		$config = array();
		$config["base_url"] = base_url() . "/admin/subscription_list";
		$total_row = $this->common_model->record_count('subscription_plan', array('status!=' => 2));

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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();
		$data['records'] = $this->common_model->getAllwhere_pagination('subscription_plan', $config["per_page"], $page, array('status!=' => 2));

		$data['main_content'] = 'subscription_list';
		$this->load->view('includes/template', $data);

	}

	public function subscription_status($id, $status)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$datas = array(
			'status' => $status,
		);
		$this->common_model->updateData('subscription_plan', $datas, array('id' => $id));

		if ($status == "1") {
			$this->session->set_flashdata('msg', 'Subscription Activate Successfully.');
		} else {
			$this->session->set_flashdata('msg', 'Subscription Deactivate Successfully.');
		}
		redirect('admin/subscription_list');
	}

	public function edit_subscription($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['cdata'] = $cdata = $this->common_model->getsingle('subscription_plan', array('id' => $id));
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');
		if ($this->form_validation->run() == TRUE) {

			$dataupdate = array(
				'title' => $this->input->post('title'),
				'duration' => $this->input->post('duration'),
				'price' => $this->input->post('price'),
				'discounted_price' => $this->input->post('discounted_price'),
				'off_price' => $this->input->post('off_price')
			);

			$this->common_model->updateData('subscription_plan', $dataupdate, array('id' => $id));
			$this->session->set_flashdata('msg', 'Subscription Plan Update Successfully.');

			redirect('admin/subscription_list');
		}
		$data['main_content'] = 'edit_subscription';
		$this->load->view('includes/template', $data);
	}

	public function delete_subscription($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->updateData('subscription_plan', array('status' => 2), array('id' => $id));

		$this->session->set_flashdata('msg', 'Subscription Plan Deleted Successfully.');

		redirect('admin/subscription_list');
	}


	public function add_home_info()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$id = 1;
		$data['home_info'] = $cdata = $this->common_model->getsingle('home_info', array('id' => $id));

		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		/*$this->form_validation->set_rules('email', 'email', 'trim|required');
			  $this->form_validation->set_rules('phone_no', 'phone_no', 'trim|required|numeric');
			  $this->form_validation->set_rules('address', 'address', 'trim|required');*/
		/*if (empty($_FILES['images']['name']))
			  {
				  $this->form_validation->set_rules('images', 'Image', 'required');
			  }*/
		if ($this->form_validation->run() == TRUE) {

			if ($_FILES['images']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('images')) {
					$uploadData = $this->upload->data();
					$image = $uploadData['file_name'];
				}
			} else {
				$image = $cdata->banner_image;
			}


			if ($_FILES['aboutus_side_img']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('aboutus_side_img')) {
					$uploadData = $this->upload->data();
					$aboutus_side_img = $uploadData['file_name'];
				}
			} else {
				$aboutus_side_img = $cdata->aboutus_side_img;
			}
			if ($_FILES['our_m_img1']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('our_m_img1')) {
					$uploadData = $this->upload->data();
					$our_m_img1 = $uploadData['file_name'];
				}
			} else {
				$our_m_img1 = $cdata->our_m_img1;
			}
			if ($_FILES['our_m_img2']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('our_m_img2')) {
					$uploadData = $this->upload->data();
					$our_m_img2 = $uploadData['file_name'];
				}
			} else {
				$our_m_img2 = $cdata->our_m_img2;
			}
			if ($_FILES['our_m_img3']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('our_m_img3')) {
					$uploadData = $this->upload->data();
					$our_m_img3 = $uploadData['file_name'];
				}
			} else {
				$our_m_img3 = $cdata->our_m_img3;
			}
			if ($_FILES['amiteshwar_img']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('amiteshwar_img')) {
					$uploadData = $this->upload->data();
					$amiteshwar_img = $uploadData['file_name'];
				}
			} else {
				$amiteshwar_img = $cdata->amiteshwar_img;
			}

			$dataupdate = array(
				'email' => $this->input->post('email'),
				'phone_no' => $this->input->post('phone_no'),
				'timing' => $this->input->post('timing'),
				'address' => $this->input->post('address'),
				'aboutus_title' => $this->input->post('aboutus_title'),
				'aboutus_content' => $this->input->post('aboutus_content'),
				'banner_content' => $this->input->post('banner_content'),
				'service_content' => $this->input->post('service_content'),
				'au_feature1' => $this->input->post('au_feature1'),
				'au_feature2' => $this->input->post('au_feature2'),
				'au_feature3' => $this->input->post('au_feature3'),
				'aboutus_side_img' => $aboutus_side_img,
				'whyme_title' => $this->input->post('whyme_title'),
				'whyme_content' => $this->input->post('whyme_content'),
				'key1_title' => $this->input->post('key1_title'),
				'key1_info' => $this->input->post('key1_info'),
				'key2_title' => $this->input->post('key2_title'),
				'key2_info' => $this->input->post('key2_info'),
				'key3_title' => $this->input->post('key3_title'),
				'key3_info' => $this->input->post('key3_info'),
				'key4_title' => $this->input->post('key4_title'),
				'key4_info' => $this->input->post('key4_info'),
				'amiteshwar_img' => $amiteshwar_img,
				'marquee_title' => $this->input->post('marquee_title'),
				'marquee_content' => $this->input->post('marquee_content'),
				'f_title' => $this->input->post('f_title'),
				's_title' => $this->input->post('s_title'),
				// 'makes_us_ur_best_choice' => $this->input->post('editor1'),
				'make1_title' => $this->input->post('make1_title'),

				'make1_info' => $this->input->post('make1_info'),
				'make2_title' => $this->input->post('make2_title'),
				'make2_info' => $this->input->post('make2_info'),
				'make3_title' => $this->input->post('make3_title'),
				'make3_info' => $this->input->post('make3_info'),
				'make4_title' => $this->input->post('make4_title'),
				'make4_info' => $this->input->post('make4_info'),
				'make5_title' => $this->input->post('make5_title'),
				'make5_info' => $this->input->post('make5_info'),
				'ourmission_content' => $this->input->post('ourmission_content'),
				'our_mission_t1' => $this->input->post('our_mission_t1'),
				'our_mission_t2' => $this->input->post('our_mission_t2'),
				'our_mission_t3' => $this->input->post('our_mission_t3'),
				'our_mission_i1' => $this->input->post('our_mission_i1'),
				'our_mission_i2' => $this->input->post('our_mission_i2'),
				'our_mission_i3' => $this->input->post('our_mission_i3'),
				'our_m_img1' => $our_m_img1,
				'our_m_img2' => $our_m_img2,
				'our_m_img3' => $our_m_img3,
				'banner_image' => $image
			);

			//$this->common_model->insertData('home_info', $dataInsert); 
			$this->common_model->updateData('home_info', $dataupdate, array('id' => $id));
			$this->session->set_flashdata('msg', 'Home Info Updated Successfully.');

			redirect('admin/add_home_info');
		}
		$data['main_content'] = 'add_home_info';
		$this->load->view('includes/template', $data);
	}

	public function all_users_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['user'] = $user = $this->common_model->getAllUsersList();
		$data['main_content'] = 'all_users_list';
		$this->load->view('includes/template', $data);
	}

	public function extend_subscription($user_id, $s_status)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$e_days = $this->input->post('e_days');
		$date = 0;
		if ($e_days) {
			$date = (int)$e_days;
		} else {
			$this->session->set_flashdata('msg', 'Enter Min 1 day.');
			$data['msg'] = $this->session->flashdata('msg');
			redirect('admin/all_users_list');
		}


		$total_date = date('Y-m-d');

		if ($s_status == "2") {
			$subcriptionexist = $this->common_model->getJoinwhere($user_id);
			$totaldays = $date;
			$today = date('y-m-d');
			$effectiveDate = date('y-m-d', strtotime($subcriptionexist->extend_date));
			if ($effectiveDate >= $today) {
				$extend_date = date("Y-m-d", strtotime($effectiveDate . " + " . $totaldays . " days"));
			} else {
				$extend_date = date('Y-m-d', strtotime($today . " + " . $totaldays . " days"));
			}

			$datas = array(
				's_status' => $s_status,
				'comment' => "Extend",
				'date' => $subcriptionexist->date,
				'extend_date' => $extend_date,
				'extend_days' => $date
			);
			//aakansha
			$datainsertss2 = array(
				'user_id' => $user_id,
				'created_date' => date('Y-m-d'),
				'end_date' => $extend_date,
				's_status' => 2,
				'extend_days' => $date
			);
			$data2 = $this->common_model->insertData('subscription_count_days', $datainsertss2);
			//aakansha
		} else {
			$datas = array(

				's_status' => $s_status,
				'stop_date' => $total_date,
				'extend_date' => null,
				'comment' => "Stop"
			);
		}

		$this->common_model->updateData('subscription_history', $datas, array('user_id' => $user_id));

		if ($s_status == "2") {
			$this->session->set_flashdata('msg', 'User Extend Successfully.');
		} else {
			$this->session->set_flashdata('msg', 'user extend Successfully.');
		}
		$data['msg'] = $this->session->flashdata('msg');
		redirect('admin/all_users_list');
	}

	public function add_page_banners()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$id = 1;
		$data['home_info'] = $cdata = $this->common_model->getsingle('home_info', array('id' => $id));

		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('demo', 'demo', 'trim|required');
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			if ($_FILES['images']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('images')) {
					$uploadData = $this->upload->data();
					$image = $uploadData['file_name'];
				}
			} else {
				$image = $cdata->aboutus_image;
			}

			if ($_FILES['i_images']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('i_images')) {
					$uploadData = $this->upload->data();
					$i_image = $uploadData['file_name'];
				}
			} else {
				$i_image = $cdata->investor_charter_image;
			}
			if ($_FILES['ic_images']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('ic_images')) {
					$uploadData = $this->upload->data();
					$ic_image = $uploadData['file_name'];
				}
			} else {
				$ic_image = $cdata->investor_complaints_image;
			}



			if ($_FILES['s_images']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('s_images')) {
					$uploadData = $this->upload->data();
					$s_images = $uploadData['file_name'];
				}
			} else {
				$s_images = $cdata->subscription_image;
			}
			if ($_FILES['login_img']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('login_img')) {
					$uploadData = $this->upload->data();
					$login_img = $uploadData['file_name'];
				}
			} else {
				$login_img = $cdata->login_img;
			}

			if ($_FILES['wa_images']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('wa_images')) {
					$uploadData = $this->upload->data();
					$wa_images = $uploadData['file_name'];
				}
			} else {
				$wa_images = $cdata->why_amiteshwar_image;
			}
			if ($_FILES['wh_images']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('wh_images')) {
					$uploadData = $this->upload->data();
					$wh_images = $uploadData['file_name'];
				}
			} else {
				$wh_images = $cdata->why_amiteshwar_image2;
			}


			if ($_FILES['faq_image']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('faq_image')) {
					$uploadData = $this->upload->data();
					$faq_image = $uploadData['file_name'];
				}
			} else {
				$faq_image = $cdata->faq_image;
			}

			if ($_FILES['contact_us_image']['name'] != '') {
				$config['upload_path'] = 'assets/img/';
				$config['allowed_types'] = '*';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('contact_us_image')) {
					$uploadData = $this->upload->data();
					$contact_us_image = $uploadData['file_name'];
				}
			} else {
				$contact_us_image = $cdata->contact_us_image;
			}

			//contact_us_image
			$dataupdate = array(
				'aboutus_image' => $image,
				'subscription_image' => $s_images,
				'investor_charter_image' => $i_image,
				'investor_complaints_image' => $ic_image,
				'login_img' => $login_img,
				'why_amiteshwar_image' => $wa_images,
				'why_amiteshwar_image2' => $wh_images,
				'faq_image' => $faq_image,
				'contact_us_image' => $contact_us_image

			);
			//$this->common_model->insertData('home_info', $dataInsert); 
			$run = $this->common_model->updateData('home_info', $dataupdate, array('id' => $id));
			$this->session->set_flashdata('msg', 'Banners Updated Successfully.');

			redirect('admin/add_page_banners');

		}
		$data['main_content'] = 'add_page_banners';
		$this->load->view('includes/template', $data);
	}


	public function add_page_content()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');

		$data['page_privacy'] = $cdata = $this->common_model->getsingle('page_content', array('title' => "privacy"));
		$data['page_disclaimer'] = $cdata = $this->common_model->getsingle('page_content', array('title' => "disclaimer"));
		$data['page_terms_condition'] = $cdata = $this->common_model->getsingle('page_content', array('title' => "terms_condition"));

		$this->form_validation->set_rules('demo', 'demo', 'trim|required');

		if ($this->form_validation->run() == TRUE) {

			//print_r($this->input->post()); die;
			if ($this->input->post('editor1')) {
				$content = $this->input->post('editor1');
				$title = "privacy";
				$this->common_model->updateData('page_content', array('content' => $content), array('title' => $title));
			}
			if ($this->input->post('editor2')) {
				$content = $this->input->post('editor2');
				$title = "disclaimer";
				$this->common_model->updateData('page_content', array('content' => $content), array('title' => $title));
			}
			if ($this->input->post('editor3')) {
				$content = $this->input->post('editor3');
				$title = "terms_condition";
				$this->common_model->updateData('page_content', array('content' => $content), array('title' => $title));
			}

			//$dataupdate = array('content' => $content ); 	
			//$this->common_model->updateData('page_content', $dataupdate,array('title'=>$title));	 
			$this->session->set_flashdata('msg', 'Page Content Added Successfully.');

			redirect('admin/add_page_content');
		}
		$data['main_content'] = 'add_page_content';
		$this->load->view('includes/template', $data);
	}

	public function add_category()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');
		if (empty($_FILES['images']['name'])) {
			$this->form_validation->set_rules('images', 'Image', 'required');
		}
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = 'uploads/category';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('images')) {
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];
				$dataInsert = array(
					'category_name' => $this->input->post('cat_name'),
					'image' => $image,
					'status' => 1
				);
				$this->common_model->insertData('categories', $dataInsert);
				$this->session->set_flashdata('msg', 'Category Added Successfully.');
			}
			redirect('admin/category_list');
		}
		$data['main_content'] = 'add_category';
		$this->load->view('includes/template', $data);
	}

	public function chkpassword($old_password, $u_id = '')
	{
		$chk = $this->common_model->getsingle('admin', array('password' => $old_password, 'admin_id' => $u_id));
		if (!$chk) {
			$this->form_validation->set_message('chkpassword', 'Old Password Not Match.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function change_password()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login/logout');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$u_id = '1';
		$data['udata'] = $this->common_model->getsingle('admin', array('admin_id' => $u_id));

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|callback_chkpassword[' . $u_id . ']');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('c_password', 'New Confirm Password', 'trim|required|matches[new_password]');

		$data['error'] = "";
		if ($this->form_validation->run() == TRUE) {

			$dataInsert = array(
				'password' => $this->input->post('new_password')
			);

			$this->common_model->updateData('admin', $dataInsert, array('admin_id' => $u_id));

			$this->session->set_flashdata('msg', 'Password Changed Successfully.');
			redirect('admin/change_password');

		}

		$data['main_content'] = 'change_password';
		$this->load->view('includes/template', $data);
	}

	public function category_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Hitzz";

		$config = array();
		$config["base_url"] = base_url() . "/admin/category_list";
		$total_row = $this->common_model->record_count('categories', array('status!=' => 2));

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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();
		$data['records'] = $this->common_model->getAllwhere_pagination('categories', $config["per_page"], $page, array('status!=' => 2));

		$data['main_content'] = 'category_list';
		$this->load->view('includes/template', $data);

	}

	public function category_status($id, $status)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$datas = array(
			'status' => $status,
		);
		$this->common_model->updateData('categories', $datas, array('id' => $id));

		if ($status == "1") {
			$this->session->set_flashdata('msg', 'Category Activate Successfully.');
		} else {
			$this->session->set_flashdata('msg', 'Category Deactivate Successfully.');
		}
		redirect('admin/category_list');
	}

	public function delete_category($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->updateData('categories', array('status' => 2), array('id' => $id));

		$this->session->set_flashdata('msg', 'Category Deleted Successfully.');

		redirect('admin/category_list');
	}

	public function edit_category($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['cdata'] = $cdata = $this->common_model->getsingle('categories', array('id' => $id));
		$this->form_validation->set_rules('cat_name', 'Category Name', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			if ($_FILES['images']['name'] != '') {
				$config['upload_path'] = 'uploads/category';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('images')) {
					$uploadData = $this->upload->data();
					$image = $uploadData['file_name'];
				}
			} else {
				$image = $cdata->image;
			}
			$dataupdate = array(
				'category_name' => $this->input->post('cat_name'),
				'image' => $image
			);

			$this->common_model->updateData('categories', $dataupdate, array('id' => $id));
			$this->session->set_flashdata('msg', 'Category Update Successfully.');

			redirect('admin/category_list');
		}
		$data['main_content'] = 'edit_category';
		$this->load->view('includes/template', $data);
	}

	public function add_doctor()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['categories'] = $categories = $this->common_model->getAllwhere('categories', array('status' => 1));
		$data['locations'] = $locations = $this->common_model->getAllwhere('locations', array('status' => 1));

		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('location_id', 'location', 'trim|required');
		$this->form_validation->set_rules('fees', 'fees', 'trim|required');

		/*if (empty($_FILES['image']['name']))
			  {
				  $this->form_validation->set_rules('image', 'Image', 'required');
			  }*/

		$data['days'] = $days = $this->input->post('days');
		$data['category_ids'] = $category_ids = $this->input->post('category_id');
		$day = implode(',', $days);
		$category_id = implode(',', $category_ids);

		$data['from_day'] = $from_day = $this->input->post('from_day');
		$data['to_day'] = $to_day = $this->input->post('to_day');

		if ($this->form_validation->run() == TRUE) {
			//echo "<pre>"; print_r($this->input->post()); echo $day;die;
			$config['upload_path'] = 'uploads/doctors';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('image')) {
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];
			} else {
				$image = "";
			}
			if ($day != '') {
				$dataInsert = array(
					'category_id' => $category_id,
					'location_id' => $this->input->post('location_id'),
					'hospital_name' => $this->input->post('hospital_name'),
					'name' => $this->input->post('name'),
					'degree' => $this->input->post('degree'),
					'start_experience' => $this->input->post('start_experience'),
					'from_time' => $this->input->post('ftime'),
					'to_time' => $this->input->post('ttime'),
					'days' => $day,
					'from_day' => $from_day,
					'to_day' => $to_day,
					'fees' => $this->input->post('fees'),
					'address' => $this->input->post('address'),
					'contact' => $this->input->post('contact'),
					'registration_no' => $this->input->post('registration_no'),
					'old_prescription_valid' => $this->input->post('old_prescription_valid'),
					'image' => $image,
					'entry_date' => date('Y-m-d H:i:s')
				);
			} else {
				$dataInsert = array(
					'category_id' => $category_id,
					'location_id' => $this->input->post('location_id'),
					'hospital_name' => $this->input->post('hospital_name'),
					'name' => $this->input->post('name'),
					'degree' => $this->input->post('degree'),
					'start_experience' => $this->input->post('start_experience'),
					'from_time' => $this->input->post('ftime'),
					'to_time' => $this->input->post('ttime'),
					'from_day' => $from_day,
					'to_day' => $to_day,
					'fees' => $this->input->post('fees'),
					'address' => $this->input->post('address'),
					'contact' => $this->input->post('contact'),
					'registration_no' => $this->input->post('registration_no'),
					'old_prescription_valid' => $this->input->post('old_prescription_valid'),
					'image' => $image,
					'entry_date' => date('Y-m-d H:i:s')
				);
			}
			//echo "<pre>"; print_r($dataInsert)die;
			$doctor_id = $this->common_model->insertData('doctors', $dataInsert);

			$cpt = count($_FILES['images']['name']);
			$files = $_FILES;
			if ($cpt > 0) {
				for ($i = 0; $i < $cpt; $i++) {
					$_FILES['images']['name'] = $files['images']['name'][$i];
					$_FILES['images']['type'] = $files['images']['type'][$i];
					$_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
					$_FILES['images']['error'] = $files['images']['error'][$i];
					$_FILES['images']['size'] = $files['images']['size'][$i];

					$config['upload_path'] = 'uploads/doctor_images';
					$config['allowed_types'] = 'gif|jpg|png';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('images');
					$attachment_data = $this->upload->data();
					$other_image = $attachment_data['file_name'];
					if ($other_image != '') {
						$insdata = array(
							'doctor_id' => $doctor_id,
							'images' => $other_image,
							'entry_date' => date('Y-m-d')
						);
						$this->common_model->insertData('doctor_images', $insdata);
					}
				}
			}
			$this->session->set_flashdata('msg', 'Doctor Added Successfully.');

			redirect('admin/doctors_list');
		}

		$data['main_content'] = 'add_doctor';
		$this->load->view('includes/template', $data);
	}

	public function edit_doctors($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['categories'] = $categories = $this->common_model->getAllwhere('categories', array('status' => 1));
		$data['locations'] = $locations = $this->common_model->getAllwhere('locations', array('status' => 1));
		$data['doctors'] = $doctors = $this->common_model->getsingle('doctors', array('id' => $id));
		$data['doctor_images'] = $this->common_model->getAllwhere('doctor_images', array('doctor_id' => $id));

		$days = $_POST['days'];
		$category_ids = $_POST['category_id'];

		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('location_id', 'location', 'trim|required');
		$this->form_validation->set_rules('fees', 'fees', 'trim|required');

		$data['from_day'] = $from_day = $this->input->post('from_day');
		$data['to_day'] = $to_day = $this->input->post('to_day');

		if ($this->form_validation->run() == TRUE) {
			if ($_FILES['image']['name'] != '') {
				$config['upload_path'] = 'uploads/doctors';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('image')) {
					$uploadData = $this->upload->data();
					$image = $uploadData['file_name'];
				}
			} else {
				$image = $doctors->image;
			}
			$day = implode(',', $days);
			$category_id = implode(',', $category_ids);

			$dataInsert = array(
				'category_id' => $category_id,
				'location_id' => $this->input->post('location_id'),
				'hospital_name' => $this->input->post('hospital_name'),
				'name' => $this->input->post('name'),
				'degree' => $this->input->post('degree'),
				//'start_experience' 	=> date('Y-m-d',strtotime($this->input->post('start_experience'))),
				'start_experience' => $this->input->post('start_experience'),
				'from_time' => $this->input->post('ftime'),
				'to_time' => $this->input->post('ttime'),
				'days' => $day,
				'from_day' => $from_day,
				'to_day' => $to_day,
				'fees' => $this->input->post('fees'),
				'address' => $this->input->post('address'),
				'contact' => $this->input->post('contact'),
				'registration_no' => $this->input->post('registration_no'),
				'old_prescription_valid' => $this->input->post('old_prescription_valid'),
				'image' => $image,
				'entry_date' => date('Y-m-d H:i:s')
			);

			$doctor_id = $this->common_model->updateData('doctors', $dataInsert, array('id' => $id));

			if ($_FILES['images']['name'][0] != '') {
				$cpt = count($_FILES['images']['name']);
				$files = $_FILES;

				if ($cpt > 0) {
					for ($i = 0; $i < $cpt; $i++) {
						$_FILES['images']['name'] = $files['images']['name'][$i];
						$_FILES['images']['type'] = $files['images']['type'][$i];
						$_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
						$_FILES['images']['error'] = $files['images']['error'][$i];
						$_FILES['images']['size'] = $files['images']['size'][$i];
						$config['upload_path'] = 'uploads/doctor_images';
						$config['allowed_types'] = 'gif|jpg|png';

						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						$this->upload->do_upload('images');
						$attachment_data = $this->upload->data();
						$other_image = $attachment_data['file_name'];
						if ($other_image != '') {
							$insdata = array(
								'doctor_id' => $id,
								'images' => $other_image,
								'entry_date' => date('Y-m-d')
							);
							$this->common_model->insertData('doctor_images', $insdata);
						}
					}
				}
			}

			$this->session->set_flashdata('msg', 'Doctor Added Successfully.');

			redirect('admin/doctors_list');
		}

		$data['main_content'] = 'edit_doctors';
		$this->load->view('includes/template', $data);
	}

	public function delete_doctors($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$id = $this->uri->segment(3);

		$this->common_model->deleteData('doctors', array('id' => $id));

		$this->session->set_userdata('msg', array('msg' => 'Doctor Deleted Successfully'));

		redirect('admin/doctors_list');
	}

	public function doctor_status($id, $status)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$datas = array(
			'view_status' => $status,
		);
		$this->common_model->updateData('doctors', $datas, array('id' => $id));

		if ($status == "1") {
			$this->session->set_flashdata('msg', 'Doctor Enabled Successfully.');
		} else {
			$this->session->set_flashdata('msg', 'Doctor Disabled Successfully.');
		}
		redirect('admin/doctors_list');
	}

	public function doctors_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "HELLO DOCTOR";

		$config = array();
		$config["base_url"] = base_url() . "/admin/doctors_list";
		$total_row = $this->common_model->record_count('doctors', array());

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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();

		$data['records'] = $record = $this->common_model->getAllwhere_pagination('doctors', $config["per_page"], $page, array());

		$ex = $this->uri->segment(3);

		if ($record && $ex == 'export') {
			$delimiter = ",";

			$filename = 'DoctorList' . date('dmY') . '.csv';
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$filename");
			header("Content-Type: application/csv; ");

			$file = fopen('php://output', 'w');

			$header = array('DOCTOR', 'CATEGORY NAME', 'DEGREE', 'EXPERIENCE', 'TIMING', 'MOBILE NUMBER', 'ADDRESS');
			fputcsv($file, $header);
			foreach ($record as $row) {
				$cat = $this->common_model->getsingle('categories', array('id' => $rec->category_id));
				$from = new DateTime($row->start_experience);
				$to = new DateTime('today');
				$exp = $from->diff($to)->y;
				$lineData = array($row->name, $cat->category_name, $row->degree, $exp . ' yrs', $row->timing, $row->contact, $row->address);
				fputcsv($file, $lineData, $delimiter);
			}
			fclose($file);
			exit;
			redirect('admin/doctors_list');
		}

		$data['main_content'] = 'doctors_list';
		$this->load->view('includes/template', $data);
	}

	public function view_doctors_details($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['records'] = $this->common_model->getsingle('doctors', array('id' => $id));

		$data['doctor_images'] = $this->common_model->getAllwhere('doctor_images', array('doctor_id' => $id));

		$data['main_content'] = 'view_doctors_details';
		$this->load->view('includes/template', $data);
	}

	public function patient_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Hitzz";

		$config = array();
		$config["base_url"] = base_url() . "/admin/patient_list";
		$total_row = $this->common_model->record_count('users', array());

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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();

		$data['records'] = $this->common_model->getAllwhere_pagination('users', $config["per_page"], $page, array('status!=' => 2));

		$data['main_content'] = 'patient_list';
		$this->load->view('includes/template', $data);
	}

	public function user_status($id, $status)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$datas = array(
			'status' => $status,
		);

		$this->common_model->updateData('users', $datas, array('user_id' => $id));

		if ($status == "1") {
			$this->session->set_flashdata('msg', 'User Activate Successfully.');
		} else {
			$this->session->set_flashdata('msg', 'User Deactivate Successfully.');
		}
		redirect('admin/patient_list');
	}

	public function bookings_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$from_date = '';
		$to_date = '';
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Hello Doctor";

		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		if ($from_date != "") {
			$this->session->set_userdata('from_date', $from_date);
		} else {
			if ($_POST) {
				$this->session->set_userdata('from_date', $from_date);
			}
		}
		if ($to_date != "") {
			$this->session->set_userdata('to_date', $to_date);
		} else {
			if ($_POST) {
				$this->session->set_userdata('to_date', $to_date);
			}
		}
		$data['from_date'] = $from_date = $this->session->userdata('from_date');
		$data['to_date'] = $to_date = $this->session->userdata('to_date');

		$config = array();
		$config["base_url"] = base_url() . "/admin/bookings_list";
		if ($from_date != '' || $to_date != '') {
			$total_row = $this->common_model->record_count('booking', array());
		} else {
			$where = "booking_date BETWEEN '" . $from_date . "' and '" . $to_date . "'";
			$total_row = $this->common_model->search_booking_record_count('booking', $where);
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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();

		if ($from_date != '' || $to_date != '') {
			$data['records'] = $this->common_model->search_booking_all($from_date, $to_date, $config["per_page"], $page);
		} else {
			$data['records'] = $this->common_model->getAllwhere_pagination('booking', $config["per_page"], $page, array('status!=' => 2), 'entry_date', 'desc');
		}
		$data['main_content'] = 'bookings_list';
		$this->load->view('includes/template', $data);
	}

	public function export_bookings_list($from_date = '', $to_date = '')
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		if ($from_date != '' && $to_date != '') {
			$where = "status!=2 and booking_date BETWEEN '" . $from_date . "' and '" . $to_date . "'";
		} else {
			$where = "status!=2";
		}

		$data['records'] = $record = $this->common_model->getAllwhere('booking', $where);

		if ($record) {
			$delimiter = ",";
			$filename = 'booking' . date('dmY') . '.csv';
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$filename");
			header("Content-Type: application/csv; ");

			$file = fopen('php://output', 'w');

			$header = array('USER', 'DOCTOR', 'PATIENT NAME', 'AGE', 'GENDER', 'MOBILE NUMBER', 'AADHAR NUMBER', 'BOOKING DATE');
			fputcsv($file, $header);
			foreach ($record as $row) {
				$doctors = $this->common_model->getsingle('doctors', array('id' => $row->doctor_id));
				$user = $this->common_model->getsingle('users', array('user_id' => $row->user_id));
				$lineData = array($user->user_name, $doctors->name, $row->patient_name, $row->age, $row->gender, $row->mobile_number, $row->aadhar_number, date('d m Y', strtotime($row->booking_date)));
				fputcsv($file, $lineData, $delimiter);
			}
			fclose($file);
			exit;
		}
	}

	public function view_booking_details($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['records'] = $this->common_model->getsingle('booking', array('id' => $id));

		$data['main_content'] = 'view_booking_details';
		$this->load->view('includes/template', $data);
	}

	public function approve_booking($id, $status)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$datas = array(
			'booking_status' => $status,
		);
		$this->common_model->updateData('booking', $datas, array('id' => $id));

		if ($status == "1") {
			$this->session->set_flashdata('msg', 'Booking Approved Successfully.');
		}
		redirect('admin/bookings_list');
	}

	public function location_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Hitzz";

		$config = array();
		$config["base_url"] = base_url() . "/admin/location_list";
		$total_row = $this->common_model->record_count('locations', array('status!=' => 2));

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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();
		$data['records'] = $this->common_model->getAllwhere_pagination('locations', $config["per_page"], $page, array('status!=' => 2));

		$data['main_content'] = 'location_list';
		$this->load->view('includes/template', $data);

	}

	public function add_location()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('name', 'Location Name', 'trim|required');
		if (empty($_FILES['images']['name'])) {
			$this->form_validation->set_rules('images', 'Image', 'required');
		}
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = 'uploads/location';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('images')) {
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];
				$dataInsert = array(
					'name' => $this->input->post('name'),
					'image' => $image,
					'status' => 1
				);
				$this->common_model->insertData('locations', $dataInsert);
				$this->session->set_flashdata('msg', 'Location Added Successfully.');
			}
			redirect('admin/location_list');
		}
		$data['main_content'] = 'add_location';
		$this->load->view('includes/template', $data);
	}

	public function edit_location($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['cdata'] = $cdata = $this->common_model->getsingle('locations', array('id' => $id));
		$this->form_validation->set_rules('name', 'Location Name', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			if ($_FILES['images']['name'] != '') {
				$config['upload_path'] = 'uploads/location';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('images')) {
					$uploadData = $this->upload->data();
					$image = $uploadData['file_name'];
				}
			} else {
				$image = $cdata->image;
			}
			$dataupdate = array(
				'name' => $this->input->post('name'),
				'image' => $image
			);

			$this->common_model->updateData('locations', $dataupdate, array('id' => $id));
			$this->session->set_flashdata('msg', 'Location Update Successfully.');

			redirect('admin/location_list');
		}
		$data['main_content'] = 'edit_location';
		$this->load->view('includes/template', $data);
	}

	public function delete_location($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->updateData('locations', array('status' => 2), array('id' => $id));

		$this->session->set_flashdata('msg', 'Location Deleted Successfully.');

		redirect('admin/location_list');
	}

	public function location_status($id, $status)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$datas = array(
			'status' => $status,
		);
		$this->common_model->updateData('locations', $datas, array('id' => $id));

		if ($status == "1") {
			$this->session->set_flashdata('msg', 'Location Activate Successfully.');
		} else {
			$this->session->set_flashdata('msg', 'Location Deactivate Successfully.');
		}
		redirect('admin/location_list');
	}

	public function add_pathology()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('name', 'Pathology Name', 'trim|required');
		if (empty($_FILES['images']['name'])) {
			$this->form_validation->set_rules('images', 'Image', 'required');
		}
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = 'uploads/pathology';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('images')) {
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];
				$dataInsert = array(
					'name' => $this->input->post('name'),
					'image' => $image,
					'status' => 1
				);
				$this->common_model->insertData('pathologies', $dataInsert);
				$this->session->set_flashdata('msg', 'Pathology Added Successfully.');
			}
			redirect('admin/pathology_list');
		}
		$data['main_content'] = 'add_pathology';
		$this->load->view('includes/template', $data);
	}

	public function pathology_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Hitzz";

		$config = array();
		$config["base_url"] = base_url() . "/admin/pathology_list";
		$total_row = $this->common_model->record_count('pathologies', array('status!=' => 2));

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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();
		$data['records'] = $this->common_model->getAllwhere_pagination('pathologies', $config["per_page"], $page, array('status!=' => 2));

		$data['main_content'] = 'pathology_list';
		$this->load->view('includes/template', $data);
	}



	public function edit_pathology($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['cdata'] = $cdata = $this->common_model->getsingle('pathologies', array('id' => $id));
		$this->form_validation->set_rules('name', 'Pathology Name', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			if ($_FILES['images']['name'] != '') {
				$config['upload_path'] = 'uploads/pathology';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('images')) {
					$uploadData = $this->upload->data();
					$image = $uploadData['file_name'];
				}
			} else {
				$image = $cdata->image;
			}
			$dataupdate = array(
				'name' => $this->input->post('name'),
				'image' => $image
			);

			$this->common_model->updateData('pathologies', $dataupdate, array('id' => $id));
			$this->session->set_flashdata('msg', 'Pathology Update Successfully.');

			redirect('admin/pathology_list');
		}
		$data['main_content'] = 'edit_pathology';
		$this->load->view('includes/template', $data);
	}

	public function delete_pathology($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->updateData('pathologies', array('status' => 2), array('id' => $id));

		$this->session->set_flashdata('msg', 'Pathology Deleted Successfully.');

		redirect('admin/pathology_list');
	}

	public function pathology_status($id, $status)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$datas = array(
			'status' => $status,
		);
		$this->common_model->updateData('pathologies', $datas, array('id' => $id));

		if ($status == "1") {
			$this->session->set_flashdata('msg', 'Pathology Activate Successfully.');
		} else {
			$this->session->set_flashdata('msg', 'Pathology Deactivate Successfully.');
		}
		redirect('admin/pathology_list');
	}

	public function add_test()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['pdata'] = $cdata = $this->common_model->getAllwhere('pathologies', array('status' => 1));

		$this->form_validation->set_rules('name', 'Test Name', 'trim|required');
		$this->form_validation->set_rules('path_id', 'Pathology', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$dataInsert = array(
				'name' => $this->input->post('name'),
				'path_id' => $this->input->post('path_id'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'status' => 1
			);
			$this->common_model->insertData('pathology_test', $dataInsert);
			$this->session->set_flashdata('msg', 'Test Added Successfully.');

			redirect('admin/test_list');
		}
		$data['main_content'] = 'add_test';
		$this->load->view('includes/template', $data);
	}

	public function test_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Hello Doctor";

		$config = array();
		$config["base_url"] = base_url() . "/admin/test_list";
		$total_row = $this->common_model->record_count('pathology_test', array('status!=' => 2));

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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();
		$data['records'] = $this->common_model->getAllwhere_pagination('pathology_test', $config["per_page"], $page, array('status!=' => 2));

		$data['main_content'] = 'test_list';
		$this->load->view('includes/template', $data);
	}

	public function edit_test($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['pdata'] = $pdata = $this->common_model->getAllwhere('pathologies', array('status' => 1));
		$data['result'] = $this->common_model->getsingle('pathology_test', array('id' => $id));
		$this->form_validation->set_rules('name', 'Test Name', 'trim|required');
		$this->form_validation->set_rules('path_id', 'Pathology', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');


		if ($this->form_validation->run() == TRUE) {
			$dataupdate = array(
				'name' => $this->input->post('name'),
				'path_id' => $this->input->post('path_id'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description')
			);

			$this->common_model->updateData('pathology_test', $dataupdate, array('id' => $id));
			$this->session->set_flashdata('msg', 'Pathology Test Update Successfully.');

			redirect('admin/test_list');
		}
		$data['main_content'] = 'edit_test';
		$this->load->view('includes/template', $data);
	}

	public function delete_test($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->updateData('pathology_test', array('status' => 2), array('id' => $id));

		$this->session->set_flashdata('msg', 'Pathology Test Deleted Successfully.');

		redirect('admin/test_list');
	}

	public function test_status($id, $status)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$datas = array(
			'status' => $status,
		);
		$this->common_model->updateData('pathology_test', $datas, array('id' => $id));

		if ($status == "1") {
			$this->session->set_flashdata('msg', 'Pathology Test Activate Successfully.');
		} else {
			$this->session->set_flashdata('msg', 'Pathology Test Deactivate Successfully.');
		}
		redirect('admin/test_list');
	}

	public function path_test_bookings_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$from_date = '';
		$to_date = '';
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Hello Doctor";

		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		if ($from_date != "") {
			$this->session->set_userdata('from_date', $from_date);
		} else {
			if ($_POST) {
				$this->session->set_userdata('from_date', $from_date);
			}
		}
		if ($to_date != "") {
			$this->session->set_userdata('to_date', $to_date);
		} else {
			if ($_POST) {
				$this->session->set_userdata('to_date', $to_date);
			}
		}
		$data['from_date'] = $from_date = $this->session->userdata('from_date');
		$data['to_date'] = $to_date = $this->session->userdata('to_date');

		$config = array();
		$config["base_url"] = base_url() . "/admin/path_test_bookings_list";
		if ($from_date != '' || $to_date != '') {
			$total_row = $this->common_model->record_count('test_booking', array());
		} else {
			$where = "booking_date BETWEEN '" . $from_date . "' and '" . $to_date . "'";
			$total_row = $this->common_model->search_booking_record_count('test_booking', $where);
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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();

		if ($from_date != '' || $to_date != '') {
			$data['records'] = $this->common_model->search_test_booking_all($from_date, $to_date, $config["per_page"], $page);
		} else {
			$data['records'] = $this->common_model->getAllwhere_pagination('test_booking', $config["per_page"], $page, array('status!=' => 2), 'entry_date', 'desc');
		}
		$data['main_content'] = 'path_test_bookings_list';
		$this->load->view('includes/template', $data);
	}

	public function view_test_booking_details($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['records'] = $this->common_model->getsingle('test_booking', array('id' => $id));

		$data['main_content'] = 'view_test_booking_details';
		$this->load->view('includes/template', $data);
	}

	public function export_test_bookings_list($from_date = '', $to_date = '')
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		if ($from_date != '' && $to_date != '') {
			$where = "status!=2 and booking_date BETWEEN '" . $from_date . "' and '" . $to_date . "'";
		} else {
			$where = "status!=2";
		}

		$data['records'] = $record = $this->common_model->getAllwhere('test_booking', $where);

		if ($record) {
			$delimiter = ",";
			$filename = 'testbooking' . date('dmY') . '.csv';
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$filename");
			header("Content-Type: application/csv; ");

			$file = fopen('php://output', 'w');

			$header = array('USER', 'TEST', 'PATIENT NAME', 'AGE', 'MOBILE NUMBER', 'VILLAGE', 'ADDRESS', 'BOOKING DATE');
			fputcsv($file, $header);

			foreach ($record as $row) {
				$tids = explode(',', $row->test_ids);
				$csv = '';
				foreach ($tids as $value) {
					$path = $this->common_model->getsingle('pathology_test', array('id' => $value));
					$csv .= $path->name . ",";
				}

				$user = $this->common_model->getsingle('users', array('user_id' => $row->user_id));
				$lineData = array($user->user_name, $csv, $row->patient_name, $row->age, $row->mobile_number, $row->village, $row->address, date('d m Y', strtotime($row->booking_date)));

				//echo "<pre>"; print_r($lineData); die;
				fputcsv($file, $lineData, $delimiter);
			}
			fclose($file);
			exit;
		}
	}

	public function medicine_prescription_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Hello Doctor";

		$config = array();
		$config["base_url"] = base_url() . "/admin/medicine_prescription_list";

		$total_row = $this->common_model->record_count('user_medicine_prescription', array());

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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();

		$data['records'] = $this->common_model->getAllwhere_pagination('user_medicine_prescription', $config["per_page"], $page, array('prescription_image!=' => ''), 'entry_date', 'desc');

		$data['main_content'] = 'medicine_prescription_list';
		$this->load->view('includes/template', $data);
	}

	public function contact_us_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Hello Doctor";

		$config = array();
		$config["base_url"] = base_url() . "/admin/contact_us_list";

		$total_row = $this->common_model->record_count('contact_us', array());

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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();

		$data['records'] = $this->common_model->getAllwhere_pagination('contact_us', $config["per_page"], $page, array(), 'entry_date', 'desc');

		$data['main_content'] = 'contact_us_list';
		$this->load->view('includes/template', $data);
	}

	public function add_gallery()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		if (empty($_FILES['images']['name'])) {
			$this->form_validation->set_rules('images', 'Image', 'required');
		}
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = 'uploads/gallery';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('images')) {
				$uploadData = $this->upload->data();
				$image = $uploadData['file_name'];
				$dataInsert = array(
					'title' => $this->input->post('title'),
					'image' => $image,
					'status' => 1
				);
				$this->common_model->insertData('gallery', $dataInsert);
				$this->session->set_flashdata('msg', 'Image Added Successfully.');
			}
			redirect('admin/gallery_list');
		}

		$data['main_content'] = 'add_gallery';
		$this->load->view('includes/template', $data);
	}

	public function gallery_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Hitzz";

		$config = array();
		$config["base_url"] = base_url() . "/admin/gallery_list";
		$total_row = $this->common_model->record_count('gallery', array('status!=' => 2));

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
		if ($this->uri->segment(3)) {
			$page = ($this->uri->segment(3));
			$data['sno'] = $this->uri->segment(3) + 1;
		} else {
			$page = 0;
			$data['sno'] = 1;
		}
		$data["links"] = $this->pagination->create_links();
		$data['records'] = $this->common_model->getAllwhere_pagination('gallery', $config["per_page"], $page, array('status!=' => 2));

		$data['main_content'] = 'gallery_list';
		$this->load->view('includes/template', $data);

	}



	public function gallery_status($id, $status)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$datas = array(
			'status' => $status,
		);
		$this->common_model->updateData('gallery', $datas, array('id' => $id));

		if ($status == "1") {
			$this->session->set_flashdata('msg', 'Image Activate Successfully.');
		} else {
			$this->session->set_flashdata('msg', 'Image Deactivate Successfully.');
		}
		redirect('admin/gallery_list');
	}

	public function delete_gallery($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->updateData('gallery', array('status' => 2), array('id' => $id));

		$this->session->set_flashdata('msg', 'Gallery Image Deleted Successfully.');

		redirect('admin/gallery_list');
	}

	public function edit_gallery($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['cdata'] = $cdata = $this->common_model->getsingle('gallery', array('id' => $id));
		$this->form_validation->set_rules('title', 'title', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			if ($_FILES['images']['name'] != '') {
				$config['upload_path'] = 'uploads/gallery';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('images')) {
					$uploadData = $this->upload->data();
					$image = $uploadData['file_name'];
				}
			} else {
				$image = $cdata->image;
			}
			$dataupdate = array(
				'title' => $this->input->post('title'),
				'image' => $image
			);

			$this->common_model->updateData('gallery', $dataupdate, array('id' => $id));
			$this->session->set_flashdata('msg', 'Image Update Successfully.');

			redirect('admin/gallery_list');
		}


		$data['main_content'] = 'edit_gallery';
		$this->load->view('includes/template', $data);
	}
	public function add_investor_charter()
	{
		// echo "hii";
		// print_r($_POST);die;
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$id = 1;
		$data['investor_charter'] = $cdata = $this->common_model->getsingle('investor_charter', array('id' => $id));

		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		/*$this->form_validation->set_rules('a_title', 'a_title', 'trim|required');
			  
			  $this->form_validation->set_rules('b_title', 'b_title', 'trim|required');
			  
			  $this->form_validation->set_rules('c_title', 'c_title', 'trim|required');
			  
			  $this->form_validation->set_rules('d_title', 'd_title', 'trim|required');
			  
			  $this->form_validation->set_rules('e_title', 'e_title', 'trim|required');

			  $this->form_validation->set_rules('a_description', 'a_description', 'trim|required');
			  
			  $this->form_validation->set_rules('b_description', 'b_description', 'trim|required');
			  
			  $this->form_validation->set_rules('c_description', 'c_description', 'trim|required');
			  
			  $this->form_validation->set_rules('d_description', 'd_description', 'trim|required');
			  
			  $this->form_validation->set_rules('e_description', 'e_description', 'trim|required');
			  // $this->form_validation->set_rules('a_title', 'a_title', 'trim|required');*/


		/*if (empty($_FILES['images']['name']))
			  {
				  $this->form_validation->set_rules('images', 'Image', 'required');
			  }*/
		if ($this->form_validation->run() == TRUE) {

			$dataupdate = array(
				'a_title' => $this->input->post('a_title'),
				'b_title' => $this->input->post('b_title'),
				'c_title' => $this->input->post('c_title'),
				'd_title' => $this->input->post('d_title'),
				'e_title' => $this->input->post('e_title'),
				'a_description' => $this->input->post('a_description'),
				'b_description' => $this->input->post('b_description'),
				'c_description' => $this->input->post('c_description'),
				'd_description' => $this->input->post('d_description'),
				'e_description' => $this->input->post('e_description')

			);
			// print_r($dataupdate);die; 	

			//$this->common_model->insertData('home_info', $dataInsert); 
			$this->common_model->updateData('investor_charter', $dataupdate, array('id' => $id));
			$this->session->set_flashdata('msg', 'Investor charter Updated Successfully.');

			redirect('admin/add_investor_charter');
		}
		$data['main_content'] = 'add_investor_charter';
		$this->load->view('includes/template', $data);
	}
	public function news_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['news'] = $news = $this->common_model->getAllwhere('news_content', array('status' => 1));
		$data['main_content'] = 'news_list';
		$this->load->view('includes/template', $data);

	}


	public function news_content()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		/*$this->form_validation->set_rules('analysis', 'analysis', 'trim|required');
			  $this->form_validation->set_rules('company', 'company', 'trim|required');
			  $this->form_validation->set_rules('bse', 'bse', 'trim|required');
			  $this->form_validation->set_rules('nse', 'nse', 'trim|required');
			  $this->form_validation->set_rules('recommendation', 'recommendation', 'trim|required');
			  $this->form_validation->set_rules('recommended_price', 'recommended_price', 'trim|required');
			  $this->form_validation->set_rules('target_price', 'target_price', 'trim|required');*/

		if ($this->form_validation->run() == TRUE) {
			if ($_FILES['pdf']['name'] != '') {
				$config['upload_path'] = 'assets/img';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('pdf')) {
					$uploadData = $this->upload->data();
					$pdf = $uploadData['file_name'];
				}
			} else {
				$pdf = $cdata->pdf;
			}

			$dataInsert = array(
				'analysis' => $this->input->post('analysis'),
				'company' => $this->input->post('company'),
				'bse' => $this->input->post('bse'),
				'nse' => $this->input->post('nse'),
				'recommendation' => $this->input->post('recommendation'),
				'recommended_price' => $this->input->post('recommended_price'),
				'target_price' => $this->input->post('target_price'),
				'pdf' => $pdf,
				'status' => 1
			);
			// print_r($dataInsert );

			$this->common_model->insertData('news_content', $dataInsert);

			// echo $this->db->last_query();
//  die;


			$this->session->set_flashdata('msg', 'News Added Successfully.');

			redirect('admin/news_list');
		}
		$data['main_content'] = 'add_news';
		$this->load->view('includes/template', $data);
	}
	public function edit_news($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}


		$data['cdata'] = $cdata = $this->common_model->getsingle('news_content', array('id' => $id));
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		/*$this->form_validation->set_rules('analysis', 'analysis', 'trim|required');
			  $this->form_validation->set_rules('company', 'company', 'trim|required');
			  $this->form_validation->set_rules('bse', 'bse', 'trim|required');
			  $this->form_validation->set_rules('nse', 'nse', 'trim|required');
			  $this->form_validation->set_rules('recommendation', 'recommendation', 'trim|required');
			  $this->form_validation->set_rules('recommended_price', 'recommended_price', 'trim|required');
			  $this->form_validation->set_rules('target_price', 'target_price', 'trim|required');*/

		if ($this->form_validation->run() == TRUE) {


			if ($_FILES['pdf']['name'] != '') {
				$config['upload_path'] = 'assets/img';
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('pdf')) {
					$uploadData = $this->upload->data();
					$pdf = $uploadData['file_name'];
				}
			} else {
				$pdf = $cdata->pdf;
			}
			// $id	=> $this->input->post('id'),
			$dataupdate = array(
				'analysis' => $this->input->post('analysis'),
				'company' => $this->input->post('company'),
				'bse' => $this->input->post('bse'),
				'nse' => $this->input->post('nse'),
				'recommendation' => $this->input->post('recommendation'),
				'recommended_price' => $this->input->post('recommended_price'),
				'target_price' => $this->input->post('target_price'),
				'pdf' => $pdf,
				// 'status'			=> 1
			);


			$this->common_model->updateData('news_content', $dataupdate, array('id' => $id));
			$this->session->set_flashdata('msg', 'News Letter Update Successfully.');

			redirect('admin/news_list');
		}
		$data['main_content'] = 'edit_news';
		$this->load->view('includes/template', $data);
	}
	public function delete_news($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->db->delete('news_content', array('id' => $id));

		$this->session->set_flashdata('msg', 'News Letter Deleted Successfully.');

		redirect('admin/news_list');
	}
	public function fast_target()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['fast'] = $fast = $this->common_model->getAllwhere('fast_target', array('status' => 1));
		$data['main_content'] = 'fast_list';
		$this->load->view('includes/template', $data);

	}
	public function fast_content()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		/*$this->form_validation->set_rules('title', 'title', 'trim|required');
			  $this->form_validation->set_rules('rec_price', 'rec_price', 'trim|required');
			  $this->form_validation->set_rules('rec_date', 'rec_date', 'trim|required');
			  $this->form_validation->set_rules('high_price', 'high_price', 'required');
			  $this->form_validation->set_rules('high_date', 'high_date', 'trim|required');
			  $this->form_validation->set_rules('final_price', 'final_price', 'required');
			  $this->form_validation->set_rules('final_date', 'final_date', 'trim|required');*/
		if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST')
			// print_r($_POST);die;

			if ($this->form_validation->run() == TRUE) {
				if ($_FILES['image']['name'] != '') {
					$config['upload_path'] = 'assets/img';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_width'] = 600;
					$config['max_height'] = 400;
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('image')) {
						$uploadData = $this->upload->data();
						$image = $uploadData['file_name'];
					}
				} else {
					//$image=$cdata->image; 
					$image = "";
				}


				$dataInsert = array(

					'title' => $this->input->post('title'),
					'rec_price' => $this->input->post('rec_price'),
					'rec_date' => $this->input->post('rec_date'),
					'high_price' => $this->input->post('high_price'),
					'high_date' => $this->input->post('high_date'),
					'final_price' => $this->input->post('final_price'),
					'final_date' => $this->input->post('final_date'),
					'image' => $image,
					'status' => 1
				);


				$this->common_model->insertData('fast_target', $dataInsert);
				$this->session->set_flashdata('msg', 'Fast Target Added Successfully.');

				redirect('admin/fast_target');
			}
		$data['main_content'] = 'add_target';
		$this->load->view('includes/template', $data);
	}

	public function edit_target($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['cdata'] = $cdata = $this->common_model->getsingle('fast_target', array('id' => $id));
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		//  print_r($cdata); die();
		/*$this->form_validation->set_rules('title', 'title', 'trim|required');
			  $this->form_validation->set_rules('rec_price', 'rec_price', 'required');
			  $this->form_validation->set_rules('rec_date', 'rec_date', 'trim|required');
			  $this->form_validation->set_rules('high_price', 'high_price', 'required');
			  $this->form_validation->set_rules('high_date', 'high_date', 'trim|required');
			  $this->form_validation->set_rules('final_price', 'final_price', 'required');
			  $this->form_validation->set_rules('final_date', 'final_date', 'trim|required');*/
		// print_r($this->input->post()); die();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->form_validation->run() == TRUE) {
				if ($_FILES['image']['name'] != '') {
					$config['upload_path'] = 'assets/img';
					$config['allowed_types'] = 'gif|jpg|png';
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('image')) {
						$uploadData = $this->upload->data();
						$image = $uploadData['file_name'];
					}
				} else {
					$image = $cdata->image;
				}

				$dataupdate = array(
					'title' => $this->input->post('title'),
					'rec_price' => $this->input->post('rec_price'),
					'rec_date' => $this->input->post('rec_date'),
					'high_price' => $this->input->post('high_price'),
					'high_date' => $this->input->post('high_date'),
					'final_price' => $this->input->post('final_price'),
					'final_date' => $this->input->post('final_date'),
					'image' => $image
				);
				// print_r($dataupdate); die();
				$this->common_model->updateData('fast_target', $dataupdate, array('id' => $id));
				$this->session->set_flashdata('msg', 'Fast Target Update Successfully.');

				redirect('admin/fast_target');
			}
		}

		$data['main_content'] = 'edit_target';
		// echo"khus"; die();
		$this->load->view('includes/template', $data);

	}

	public function delete_target($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->deleteData('fast_target', array('id' => $id));

		$this->session->set_flashdata('msg', 'Fast Target Deleted Successfully.');

		redirect('admin/fast_target');
	}
	public function star_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['star'] = $star = $this->common_model->getAllwhere('star_performer', array('status' => 1));
		$data['main_content'] = 'star_list';
		$this->load->view('includes/template', $data);

	}
	public function star_performer()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}




		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		/*$this->form_validation->set_rules('title', 'title', 'trim|required');
		  
			  $this->form_validation->set_rules('rec_price', 'rec_price', 'required');
			  $this->form_validation->set_rules('rec_date', 'rec_date', 'trim|required');
			  $this->form_validation->set_rules('high_price', 'high_price', 'required');
			  $this->form_validation->set_rules('high_date', 'high_date', 'trim|required');
			  $this->form_validation->set_rules('final_price', 'final_price', 'required');
			  $this->form_validation->set_rules('final_date', 'final_date', 'trim|required');*/
		if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST')
			// print_r($_POST);die;

			if ($this->form_validation->run() == TRUE) {
				// 	if($_FILES['image']['name']!='')
				// {
				// 	$config['upload_path'] = 'assets/img';
				// 	$config['allowed_types'] = 'gif|jpg|png';
				// 	$this->load->library('upload', $config);
				// 	if ($this->upload->do_upload('image')) 
				// 	{
				// 		 $uploadData = $this->upload->data();
				// 		$image = $uploadData['file_name'];
				// 	}
				// }
				// else
				// {
				// 	$image=$cdata->image; 
				// }


				$dataInsert = array(

					'title' => $this->input->post('title'),
					'rec_price' => $this->input->post('rec_price'),
					'rec_date' => $this->input->post('rec_date'),
					'high_price' => $this->input->post('high_price'),
					'high_date' => $this->input->post('high_date'),
					'final_price' => $this->input->post('final_price'),
					'final_date' => $this->input->post('final_date'),
					'status' => 1
				);


				$this->common_model->insertData('star_performer', $dataInsert);

				// echo $this->db->last_query();
//  die;


				$this->session->set_flashdata('msg', 'star performer Added Successfully.');

				redirect('admin/star_list');
			}
		$data['main_content'] = 'add_star';
		$this->load->view('includes/template', $data);
	}
	public function edit_star_performer($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}


		$data['cdata'] = $cdata = $this->common_model->getsingle('star_performer', array('id' => $id));
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		//  print_r($cdata); die();
		/*$this->form_validation->set_rules('title', 'title', 'trim|required');
			  $this->form_validation->set_rules('rec_price', 'rec_price', 'required');
			  $this->form_validation->set_rules('rec_date', 'rec_date', 'trim|required');
			  $this->form_validation->set_rules('high_price', 'high_price', 'required');
			  $this->form_validation->set_rules('high_date', 'high_date', 'trim|required');
			  $this->form_validation->set_rules('final_price', 'final_price', 'required');
			  $this->form_validation->set_rules('final_date', 'final_date', 'trim|required');*/
		// print_r($this->input->post()); die();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($this->form_validation->run() == TRUE) {

				$dataupdate = array(
					'title' => $this->input->post('title'),
					'rec_price' => $this->input->post('rec_price'),
					'rec_date' => $this->input->post('rec_date'),
					'high_price' => $this->input->post('high_price'),
					'high_date' => $this->input->post('high_date'),
					'final_price' => $this->input->post('final_price'),
					'final_date' => $this->input->post('final_date'),
				);
				// print_r($dataupdate); die();
				$this->common_model->updateData('star_performer', $dataupdate, array('id' => $id));
				$this->session->set_flashdata('msg', 'Star performer Update Successfully.');

				redirect('admin/star_list');
			}
		}

		$data['main_content'] = 'edit_star';
		// echo"khus"; die();
		$this->load->view('includes/template', $data);

	}


	public function delete_star_performer($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->deleteData('star_performer', array('id' => $id));

		$this->session->set_flashdata('msg', 'Star performer Deleted Successfully.');

		redirect('admin/star_list');
	}
	public function user_details()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$user_id = 1;

		$data['user'] = $cdata = $this->common_model->getsingle('users', array('user_id' => $user_id));

		$data['msg'] = $this->session->flashdata('msg');
		/*$this->form_validation->set_rules('name', 'name', 'trim|required');
			  $this->form_validation->set_rules('password', 'password', 'trim|required');
			  $this->form_validation->set_rules('phone', 'phone', 'trim|required');
			   $this->form_validation->set_rules('email', 'email', 'trim|required');
			 */

		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');


		if ($this->form_validation->run() == TRUE) {

			$dataupdate = array(

				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'phone' => $this->input->post('phone'),


			);


			$this->common_model->updateData('users', $dataupdate, array('user_id' => $user_id));
			// print_r($dataupdate);die;  				
			$this->session->set_flashdata('msg', ' User Updated Successfully.');


			redirect('admin/user_details');
		}
		$data['main_content'] = 'add_user';
		$this->load->view('includes/template', $data);

	}


	public function contact_us()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$id = 1;

		$data['contact'] = $cdata = $this->common_model->getsingle('contact_content', array('id' => $id));
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		$data['msg'] = $this->session->flashdata('msg');
		/*$this->form_validation->set_rules('title', 'title', 'trim|required');
			  $this->form_validation->set_rules('address', 'address', 'trim|required');
			  $this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
			   $this->form_validation->set_rules('email', 'email', 'trim|required');
			  $this->form_validation->set_rules('bussiness_email', 'bussiness_email', 'trim|required');*/

		if ($this->form_validation->run() == TRUE) {

			$dataupdate = array(

				'title' => $this->input->post('title'),
				'address' => $this->input->post('address'),
				'mobile' => $this->input->post('mobile'),
				'email' => $this->input->post('email'),
				'bussiness_email' => $this->input->post('bussiness_email'),

			);


			$this->common_model->updateData('contact_content', $dataupdate, array('id' => $id));
			// print_r($dataupdate);die;  				
			$this->session->set_flashdata('msg', 'Contact Us Updated Successfully.');


			redirect('admin/contact_us');
		}
		$data['main_content'] = 'add_contact_us';
		$this->load->view('includes/template', $data);

	}


	public function add_investor_complaints()
	{
		// echo "hiiiiiiiiiiiiiiiiiiiiiiiiii"; die();
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Researchlyne";
		$data["links"] = $this->pagination->create_links();
		$data['records'] = $this->common_model->getAllwhere('complaints', array());

		$data['main_content'] = 'add_investor_complaints';
		$this->load->view('includes/template', $data);

	}

	public function show_complaints($filter, $id)
	{
		// echo "hiiiiiiiiiiiiiiiiiiiiiiiiii"; die();
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$data['title'] = "Researchlyne";
		$data["links"] = $this->pagination->create_links();
		$data['records'] = $this->common_model->getsingle('complaints', array('id' => $id));
		$data['filter'] = $filter;



		$data['main_content'] = 'show_complaints';
		$this->load->view('includes/template', $data);

	}
	public function edit_complaints($id)
	{
		// echo"khushboos"; die();
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['cdata'] = $cdata = $this->common_model->getsingle('complaints', array('id' => $id));
		// print_r($cdata); die();
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		/*$this->form_validation->set_rules('received_form', 'received_form', 'trim|required');
			  $this->form_validation->set_rules('pending_c', 'pending_c', 'trim|required');
			  $this->form_validation->set_rules('received_c', 'received_c', 'trim|required');
			  $this->form_validation->set_rules('resolved_c', 'resolved_c', 'trim|required');
			  $this->form_validation->set_rules('total_pending', 'total_pending', 'trim|required');
			  $this->form_validation->set_rules('pending_complains', 'pending_complains', 'trim|required');
			  $this->form_validation->set_rules('average_time', 'average_time', 'trim|required');
			  $this->form_validation->set_rules('sr_no_m', 'sr_no_m', 'trim|required');
			  
			  $this->form_validation->set_rules('month', 'month', 'trim|required');
			  $this->form_validation->set_rules('previous_month', 'previous_month', 'trim|required');
			  $this->form_validation->set_rules('received_m', 'received_m', 'trim|required');
			  $this->form_validation->set_rules('resolved_m', 'resolved_m', 'trim|required');
			  
			  $this->form_validation->set_rules('pending_m', 'pending_m', 'trim|required');
			  $this->form_validation->set_rules('sr_no_y	', 'sr_no_y	', 'trim|required');
			  $this->form_validation->set_rules('year	', 'year', 'trim|required');
			  $this->form_validation->set_rules('carried_forward', 'carried_forward', 'trim|required');
			  $this->form_validation->set_rules('received_y', 'received_y', 'trim|required');
			  $this->form_validation->set_rules('resolved_y', 'resolved_y', 'trim|required');
			  $this->form_validation->set_rules('pending_y', 'pending_y', 'trim|required');*/
		// print_r($this->input->post()); die();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$dataupdate = array(
				'received_form' => $this->input->post('received_form'),
				'pending_c' => $this->input->post('pending_c'),
				'received_c' => $this->input->post('received_c'),
				'resolved_c' => $this->input->post('resolved_c'),
				'total_pending' => $this->input->post('total_pending'),
				'pending_complains' => $this->input->post('pending_complains'),
				'average_time' => $this->input->post('average_time'),
				'sr_no_m' => $this->input->post('sr_no_m'),
				'month' => $this->input->post('month'),
				'previous_month' => $this->input->post('previous_month'),
				'received_m' => $this->input->post('received_m'),
				'resolved_m' => $this->input->post('resolved_m'),
				'pending_m' => $this->input->post('pending_m'),
				'sr_no_y' => $this->input->post('sr_no_y'),
				'year' => $this->input->post('year'),
				'resolved_y' => $this->input->post('resolved_y'),
				'pending_y' => $this->input->post('pending_y'),
				'carried_forward' => $this->input->post('carried_forward'),
				'received_y' => $this->input->post('received_y'),

			);
			// print_r($dataupdate); die();
			$this->common_model->updateData('complaints', $dataupdate, array('id' => $id));
			$this->session->set_flashdata('msg', 'investor complaints Update Successfully.');

			redirect('admin/add_investor_complaints');
		}
		$data['main_content'] = 'edit_complaints';
		$this->load->view('includes/template', $data);
	}

	public function delete_investor_complaints($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->deleteData('complaints', array('id' => $id));

		$this->session->set_flashdata('msg', 'investor complain Deleted Successfully.');

		redirect('admin/add_investor_complaints');
	}

	public function add_complaints_title()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$id = 1;

		$data['home_info'] = $cdata = $this->common_model->getsingle('complaints_title', array('id' => $id));

		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('complain', 'complain', 'trim|required');
		$this->form_validation->set_rules('month', 'month', 'trim|required');
		$this->form_validation->set_rules('year', 'year', 'trim|required');
		$this->form_validation->set_rules('c_title', 'c_title', 'trim|required');
		$this->form_validation->set_rules('m_title', 'm_title', 'trim|required');
		$this->form_validation->set_rules('y_title', 'y_title', 'trim|required');


		if ($this->form_validation->run() == TRUE) {

			$dataupdate = array(

				'complain' => $this->input->post('complain'),
				'month' => $this->input->post('month'),
				'year' => $this->input->post('year'),
				'c_title' => $this->input->post('c_title'),
				'm_title' => $this->input->post('m_title'),
				'y_title' => $this->input->post('y_title')

			);


			$this->common_model->updateData('complaints_title', $dataupdate, array('id' => $id));
			// print_r($dataupdate);die;  				
			$this->session->set_flashdata('msg', 'complaints title Updated Successfully.');


			redirect('admin/add_complaints_title');
		}
		$data['main_content'] = 'add_complaints_title';
		$this->load->view('includes/template', $data);
	}
	public function add_complaints()
	{

		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['msg'] = $this->session->flashdata('msg');
		$this->form_validation->set_rules('submithiddenform', 'submit', 'trim|required');

		/*$this->form_validation->set_rules('received_form', 'received_form', 'trim|required');
			  $this->form_validation->set_rules('pending_c', 'pending_c', 'trim|required');
			  $this->form_validation->set_rules('received_c', 'received_c', 'trim|required');
			  $this->form_validation->set_rules('resolved_c', 'resolved_c', 'trim|required');
			  $this->form_validation->set_rules('total_pending', 'total_pending', 'trim|required');
			  $this->form_validation->set_rules('pending_complains', 'pending_complains', 'trim|required');
			  $this->form_validation->set_rules('average_time', 'average_time', 'trim|required');  
			  $this->form_validation->set_rules('sr_no_m', 'sr_no_m', 'trim|required');
			   $this->form_validation->set_rules('month', 'month', 'trim|required');
			  $this->form_validation->set_rules('previous_month', 'previous_month', 'trim|required');
			  $this->form_validation->set_rules('received_m', 'received_m', 'trim|required');
			  $this->form_validation->set_rules('resolved_m', 'resolved_m', 'trim|required');
			  $this->form_validation->set_rules('pending_m', 'pending_m', 'trim|required');
			  $this->form_validation->set_rules('sr_no_y', 'sr_no_y	', 'trim|required');
			  $this->form_validation->set_rules('year', 'year', 'trim|required');
			  $this->form_validation->set_rules('carried_forward', 'carried_forward', 'trim|required');
			  $this->form_validation->set_rules('received_y', 'received_y', 'trim|required');
			  $this->form_validation->set_rules('resolved_y', 'resolved_y', 'trim|required');
			  $this->form_validation->set_rules('pending_y', 'pending_y', 'trim|required');

			  // $this->form_validation->set_rules('title_c', 'title_c', 'trim|required');
			  // $this->form_validation->set_rules('title_m', 'title_m', 'trim|required');
			  // $this->form_validation->set_rules('title_y', 'title_y', 'trim|required');*/
		// print_r($this->input->post()); die();


		// [received_form] => wqw [pending_c] => wqwqwq [received_c] => qwqwq [resolved_c] => q

		// wqw [total_pending] => qwqwq [pending_complains] => l [average_time] => l [sr_no_m] =>

		// 'l [month] => ;';'l;'l' [previous_month] => ;l [received_m] => 32322 [resolved_m] => l;'

		// [pending_m] => ' [sr_no_y] => ;l [year] => '; [carried_forward] => l' [received_y] => ;'; [resolved_y] => '; [pending_y] => l;' )


		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// print_r($this->input->post()); die();


			$dataInsert = array(
				'received_form' => $this->input->post('received_form'),
				'pending_c' => $this->input->post('pending_c'),
				'received_c' => $this->input->post('received_c'),
				'resolved_c' => $this->input->post('resolved_c'),
				'total_pending' => $this->input->post('total_pending'),
				'pending_complains' => $this->input->post('pending_complains'),
				'average_time' => $this->input->post('average_time'),


				'sr_no_m' => $this->input->post('sr_no_m'),
				'month' => $this->input->post('month'),
				'previous_month' => $this->input->post('previous_month'),
				'received_m' => $this->input->post('received_m'),
				'resolved_m' => $this->input->post('resolved_m'),
				'pending_m' => $this->input->post('pending_m'),



				'sr_no_y' => $this->input->post('sr_no_y'),
				'year' => $this->input->post('year'),
				'resolved_y' => $this->input->post('resolved_y'),
				'pending_y' => $this->input->post('pending_y'),
				'carried_forward' => $this->input->post('carried_forward'),
				'received_y' => $this->input->post('received_y'),





			);

			// print_r($dataInsert);
			// die();

			$this->common_model->insertData('complaints', $dataInsert);
			$this->session->set_flashdata('msg', 'complaints Added Successfully.');

			redirect('admin/add_investor_complaints');




		}


		$data['main_content'] = 'add_complaints';
		$this->load->view('includes/template', $data);
	}
	public function all_users()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['user'] = $user = $this->common_model->getJoinwhere1();
		// $data['user'] = $user =$this->common_model->getJoinwhere();
		// print_r($user);die;
		// echo $this->db->last_query(); die;

		$data['main_content'] = 'user_list';
		$this->load->view('includes/template', $data);

	}


	public function subscription_history($user_id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['user'] = $user = $this->common_model->getJoinwhere12($user_id);
		// $data['user'] = $user =$this->common_model->getJoinwhere();
		// print_r($user);die;

		$data['main_content'] = 'subscription_history';
		$this->load->view('includes/template', $data);

	}

	public function news_status($user_id, $s_status)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$data['days'] = $days = $this->common_model->getsingle('extend_days', array('status' => 1));
		$e_days = $this->input->post('e_days');

		if ($e_days) {
			$date = $e_days;
		} else {
			$date = $days->days;
		}

		//  print_r($days);die;
		// $date = date('Y-m-d');
		$total_date = date('Y-m-d');
		//$extend_date= date('Y-m-d', strtotime("+".$date."days")); -- old_23072023

		if ($s_status == "2") {
			$subcriptionexist = $this->common_model->getJoinwhere($user_id);
			$dur = $this->common_model->getsingle('subscription_plan', array('id' => $subcriptionexist->subscription_id));
			$duration = explode(" ", $dur->duration);
			$effectiveDate = date('d-m-Y', strtotime("+$duration[0] months", strtotime($subcriptionexist->date)));
			//echo $effectiveDate."--";
			if ($effectiveDate > date('d-m-Y')) {
				//echo "yes";
				$extend_date = date("Y-m-d", strtotime("$effectiveDate +" . $date . " days"));
			} else {
				//echo "no";
				$extend_date = date('Y-m-d', strtotime("+" . $date . "days"));
			}

			//die;
			$datas = array(

				's_status' => $s_status,
				'comment' => "Extend",
				'date' => $subcriptionexist->date,
				'extend_date' => $extend_date,
				'extend_days' => $date
			);
			//aakansha
			$datainsertss2 = array(
				'user_id' => $user_id,
				'created_date' => date('Y-m-d'),
				'end_date' => $extend_date,
				's_status' => 2,
				'extend_days' => $date
			);
			$data2 = $this->common_model->insertData('subscription_count_days', $datainsertss2);
			//aakansha
		} else {
			$datas = array(

				's_status' => $s_status,
				'stop_date' => $total_date,
				'extend_date' => null,
				'comment' => "Stop"
			);
		}

		$this->common_model->updateData('subscription_history', $datas, array('user_id' => $user_id));

		if ($s_status == "2") {
			$this->session->set_flashdata('msg', 'User Extend Activate Successfully.');
		} else {
			$this->session->set_flashdata('msg', 'user extend Deactivate Successfully.');
		}
		$data['msg'] = $this->session->flashdata('msg');
		redirect('admin/extend_list');
	}



	public function renew_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		//working - SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id where subscription_history.id IN (SELECT MAX(id)FROM subscription_history WHERE s_status IN (2,3,4) GROUP BY user_id)
		$data['user'] = $user = $this->common_model->getJoinwhere2();
		// print_r($data['user'] );die;

		$data['main_content'] = 'renew_list';
		$this->load->view('includes/template', $data);

	}

	public function extend_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['user'] = $user = $this->common_model->getJoinwhere3();
		// print_r($data['user'] );die;

		$data['main_content'] = 'extend';
		$this->load->view('includes/template', $data);

	}

	public function non_renewal_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['non_renew'] = $non_renew = $this->common_model->non_renewal();

		//$keypluss = '' ;
		/*foreach($non_renew as $keyplus => $nval){
				  $subs = $this->common_model->getsingle('subscription_plan',array('id'=>$nval->subscription_id));
				  $duration = $subs->duration;
				  $durationDate = date('Y-m-d', strtotime($nval->date." + 3 months"));
				  //echo "Duration -".$duration." /date-".$nval->date." /duration date".$durationDate."<br>" ;
				  if($durationDate < date('Y-m-d')){
					  $keypluss= $keypluss + 1;
				  }
			  }*/
		//$data['user'] = $user =$this->common_model->getJoinwhere3();
		// print_r($data['user'] );die;

		$data['main_content'] = 'non_renewal';
		$this->load->view('includes/template', $data);

	}

	public function expire_list()
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}

		$data['user'] = $user = $this->common_model->getJoinwhere4();


		$data['main_content'] = 'expire_list';
		$this->load->view('includes/template', $data);

	}

	public function delete_renew($user_id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->deleteData('users', array('user_id' => $user_id));

		$this->session->set_flashdata('msg', 'User Renewal Deleted Successfully.');

		redirect('admin/renew_list');
	}

	public function delete_user($user_id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->deleteData('users', array('user_id' => $user_id));

		$this->session->set_flashdata('msg', 'User Deleted Successfully.');

		redirect('admin/all_users');
	}

	public function delete_expire($id)
	{
		if ($this->session->userdata('admin_id') == '') {
			redirect('login');
		}
		$this->common_model->deleteData('users', array('user_id' => $user_id));

		$this->session->set_flashdata('msg', 'Expire User  Deleted Successfully.');

		redirect('admin/expire_list');
	}
}

?>	