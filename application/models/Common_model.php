<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model

{

	

	public function category_filter($table, $search_key='') 

	{		

		$this->db->select('*'); 

		$this->db->from('categories');

		

		if($search_key!='')

		{

		    $this->db->like('categories.category_name',$search_key);

		}



		$this->db->where('categories.status',1);

		

		$query = $this->db->get();

		return $query->result(); 	

	}

	 

	public function doctors_filter($category_id, $search_key='') 

	{		

		$this->db->select('*'); 

		$this->db->from('doctors');

		

		if($search_key!='')

		{

		    $this->db->like('name',$search_key);

		}

	

		$this->db->where('find_in_set("'.$category_id.'", category_id)');

		 

		$query = $this->db->get();

		//echo $this->db->last_query(); die;

		return $query->result(); 	

	}

	

	public function doctors_locat_filter($location_id='',$category_id='') 

	{		

		$this->db->select('*'); 

		$this->db->from('doctors');

		$this->db->where('find_in_set("'.$category_id.'", category_id)');

		$this->db->where('location_id',$location_id);

		$this->db->where('view_status',1);

		$query = $this->db->get();

		//echo $this->db->last_query(); die;

		return $query->result(); 	

	}

	

	public function search_booking_all($from_date='',$to_date='',$limit='',$start='') 

	{

		$sql ="SELECT * FROM booking where status!=2 and booking_date BETWEEN '".$from_date."' and '".$to_date."' order by booking_date desc LIMIT ".$start.", ".$limit;

        $qq = $this->db->query($sql);

		$result = $qq->result();

		return $result;

	}

	

	public function search_test_booking_all($from_date='',$to_date='',$limit='',$start='') 

	{

		$sql ="SELECT * FROM test_booking where status!=2 and booking_date BETWEEN '".$from_date."' and '".$to_date."' order by booking_date desc LIMIT ".$start.", ".$limit;

        $qq = $this->db->query($sql);

		$result = $qq->result();

		return $result;

	}





	public function search_booking_record_count($table,$where='') 

	{		

		$this->db->from($table);

		if($where!=''){

		$this->db->where($where);

		}

		return $this->db->count_all_results();		

	}

	

   function search_intro($key){

     $q = $this->db->query("SELECT * FROM users where ( login_id LIKE '%".$key."%' or full_name LIKE '%".$key."%' ) AND status = '0' ");

     $result = $q->result_array();

     return $result;    

    }

	

	 

	 /*---GET SINGLE RECORD---*/

    function getsingle($table, $where)

    {

        $q = $this->db->get_where($table, $where);

        return $q->row();

    }

	

	 /*<!--INSERT RECORD FROM SINGLE TABLE-->*/

    function insertData($table, $dataInsert)

    {

        $this->db->insert($table, $dataInsert);

        return $this->db->insert_id();

    }

	

	 /*<!--UPDATE RECORD FROM SINGLE TABLE-->*/

    function updateData($table, $data, $where)

    {

        $this->db->update($table, $data, $where);

        return;

    }

	 /*<!--DELETE RECORD FROM SINGLE TABLE-->*/

    function deleteData($table, $where)

    {

        //$this->db->delete('mytable', array('id' => $id));

        $this->db->delete($table, $where);

        return;

    }             





	

	 /*<!--GET ALL RECORD FROM SINGLE TABLE WITHOUT CONDITION-->*/

    function getAllrecord($table)

    {

        $this->db->select('*');

        $q = $this->db->get($table);

        $num_rows = $q->num_rows();

        if ($num_rows > 0) {

            foreach ($q->result() as $rows) {

                $data[] = $rows;

            }

            $q->free_result();

            return $data;

        }

    }

	

	/*---GET MULTIPLE RECORD---*/

    function getAllwhere($table, $where)

    {

        $this->db->select('*');

        $q = $this->db->get_where($table, $where);

        $num_rows = $q->num_rows();

        if ($num_rows > 0) {

            foreach ($q->result() as $rows) {

                $data[] = $rows;

            }

            $q->free_result();

            return $data;

        }

       

    }

      function getJoinwhere($user_id)

    {



    	// $sql  = "SELECT users.*, subscription_history.*,subscription_history.user_id FROM users LEFT JOIN subscription_history ON users.user_id=subscription_history.user_id ";// 

    	$sql  =" SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id where users.user_id=$user_id ORDER by subscription_history.id desc LIMIT 1";

 $qq = $this->db->query($sql);





		$result = $qq->row();



	   // echo $this->db->last_query(); die;



		

		return $result;



    }   

	function log($message)
{
	$output = $message;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

 function getJoinwhere_test($user_id)

    {
	$sql  =" SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id where users.user_id=$user_id ORDER by subscription_history.id desc LIMIT 1";

	$qq = $this->db->query($sql);
	$result = $qq->row();
	return $result;

    } 	

 // function getJoinwhere2($user_id)

 //    {



 //    	// $sql  = "SELECT users.*, subscription_history.*,subscription_history.user_id FROM users LEFT JOIN subscription_history ON users.user_id=subscription_history.user_id ";// 

 //    	$sql  = "SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id where users.user_id=".$user_id ;

 // $qq = $this->db->query($sql);





// 		$result = $qq->row();



// 	  echo $this->db->last_query(); die;



		

// 		return $result;



 //    }    



    function getJoinwhere1()

    {



    	// $sql  = "SELECT users.*, subscription_history.*,subscription_history.user_id FROM users LEFT JOIN subscription_history ON users.user_id=subscription_history.user_id ";// 

    	$sql  = "SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id GROUP by subscription_history.user_id";

 $qq = $this->db->query($sql);
//SELECT user_id, COUNT(id) FROM subscription_history GROUP BY user_id HAVING COUNT(id)=1




		$result = $qq->result();



	  // echo $this->db->last_query(); die;



		

		return $result;



    }



     function getJoinwhere12($user_id)

    {



    	// $sql  = "SELECT users.*, subscription_history.*,subscription_history.user_id FROM users LEFT JOIN subscription_history ON users.user_id=subscription_history.user_id ";// 

    	$sql  = "SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id where users.user_id = ".$user_id;

 $qq = $this->db->query($sql);





		$result = $qq->result();



	  // echo $this->db->last_query(); die;



		

		return $result;



    }  

      function getJoinwhere2()

    {



    	// $sql  = "SELECT users.*, subscription_history.*,subscription_history.user_id FROM users LEFT JOIN subscription_history ON users.user_id=subscription_history.user_id ";// 

    	//$sql  = "SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id where (subscription_history.s_status=4 or subscription_history.s_status=3) and  users.user_id != 1" ;
		$sql  = "SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id where subscription_history.id IN (SELECT MAX(id)FROM subscription_history WHERE s_status IN (2,3,4) GROUP BY user_id)";
 $qq = $this->db->query($sql);





		$result = $qq->result();



		   	   // echo $this->db->last_query(); die;





		

		return $result;



    } 

	      function getJoinwhere3()

    {



    	// $sql  = "SELECT users.*, subscription_history.*,subscription_history.user_id FROM users LEFT JOIN subscription_history ON users.user_id=subscription_history.user_id ";// 

    	$sql  = "SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id where (subscription_history.s_status=2) and  users.user_id != 1" ;

 $qq = $this->db->query($sql);





		$result = $qq->result();



		     // echo $this->db->last_query(); die;



		

		return $result;



    } 

     function getJoinwhere4()

    {

 

    	// $sql  = "SELECT users.*, subscription_history.*,subscription_history.user_id FROM users LEFT JOIN subscription_history ON users.user_id=subscription_history.user_id ";// 

    	//$sql  = "SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id where (subscription_history.s_status=0) and  users.user_id != 1" ;
		$sql  = "SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id where users.user_id != 1" ;
//for expire list
		$qq = $this->db->query($sql);





		$result = $qq->result();



		      // echo $this->db->last_query(); die;



		

		return $result;



    } 

	    function getSum()

    {



    	// $sql  = "SELECT users.*, subscription_history.*,subscription_history.user_id FROM users LEFT JOIN subscription_history ON users.user_id=subscription_history.user_id ";// 

    	$sql  = "SELECT sum(pending_c) as pending_ttl , sum(received_c) as received_ttl  ,sum(resolved_c) as resolved_ttl  ,sum(total_pending) as total_pending_tt1 ,sum(pending_complains) as pending_complains_tt1 ,sum(average_time) as average_time_tt1, sum(previous_month) as previous_month_tt1 , sum(received_m) as received_m_tt1 , sum(resolved_m) as resolved_m_tt1   , sum(pending_m) as pending_m_tt1 , sum(carried_forward) as carried_forward_tt1 , sum(received_y) as received_y_tt1  , sum(resolved_y) as resolved_y_tt1  , sum(pending_y) as pending_y_tt1  FROM `complaints` ";

 $qq = $this->db->query($sql);





		$result = $qq->row();



		// echo $this->db->last_query(); die;



		

		return $result;



    } 

	

   function getAlllimit($table, $where, $limit)

    {

        $this->db->select('*');

        $q = $this->db->get_where($table, $where,$limit);

        $num_rows = $q->num_rows();

        if ($num_rows > 0) {

            foreach ($q->result() as $rows) {

                $data[] = $rows;

            }

            $q->free_result();

            return $data;

        }

    }

	

	    function getAllwhererow($table, $where,$col='',$type='',$limit='')

    {



    	 $this->db->select('*'); 

		$this->db->from($table);

		if($where!=''){

			$this->db->where($where);

		}		

		$this->db->order_by($col, $type);

		$this->db->limit($limit);

		

		$query = $this->db->get();

		return $query->result(); 



        

    }
     function count()

    {
            $sql  = "SELECT * FROM subscription_history WHERE id IN (SELECT MAX(id)FROM subscription_history WHERE s_status IN (2,3,4) GROUP BY user_id
            ) ORDER BY id DESC" ; 




        $qq = $this->db->query($sql);





		return $result = $qq->result();



	 //echo $this->db->last_query(); die;



		

	 // $this->db->count_all_results();		




   

    }
      function non_count()

    {
            $sql  ="SELECT user_id, COUNT(id) FROM subscription_history GROUP BY user_id HAVING COUNT(id)=1 "; 




        $qq = $this->db->query($sql);





		return $result = $qq->result();



	 //echo $this->db->last_query(); die;



		

	 // $this->db->count_all_results();		




   

    }
	
	function non_renewal()

    {
        $sql  ="SELECT user_id,subscription_id,amount,s_status,date,extend_date,comment,stop_date, COUNT(id) FROM subscription_history where comment='' and extend_date='0000-00-00' and s_status not in (2,3,4) GROUP BY user_id HAVING COUNT(id)=1"; 

        $qq = $this->db->query($sql);

		return $result = $qq->result();

    }


	    function getAllwhereresult()

    {



    	// $sql ="select * from news_content where id != (select max(id) from news_content);";



    	$sql  = "select * from news_content  where id != (select max(id) from news_content ) ORDER by id DESC " ; 



    	// $sql= $this->db->order_by($col, $type);

        $qq = $this->db->query($sql);





		$result = $qq->result();



		//echo $this->db->last_query(); die;



		

		return $result;



    	//  $this->db->select('*'); 

		// $this->db->from($table);

	    // $this->db->where id!= (select max('id');

		// $this->db->order_by($col, $type);		

		// $query = $this->db->get();

		// return $query->result(); 



// select *from yourTableName where yourIdColumnName != (select max(yourIdColumnName)

// from yourTableName );

   

    }



	function getAllwhere_limit($table,$limit,$where='')

    {

        $this->db->select('*'); 

		$this->db->from($table);

		if($where!=''){

			$this->db->where($where);

		}		

		$this->db->limit($limit);

		

		$query = $this->db->get();

		return $query->result(); 

    }

	

	public function getAllTopDoctors($limit) 

	{

		$sql ="SELECT doctors.*, booking.doctor_id, COUNT(doctor_id) as total FROM doctors INNER JOIN booking ON doctors.id=booking.doctor_id WHERE doctors.status!=2 and doctors.view_status=1 GROUP by doctor_id ORDER by total DESC;";

        $qq = $this->db->query($sql);

		//$this->db->last_query($qq); die;

		$result = $qq->result();

		

		return $result;

	}

	

	function sum_records($table){

     $q = $this->db->query("SELECT user_id,trump,SUM(point) as point FROM ".$table."  GROUP BY user_id order by point desc limit 50");

     $num_rows = $q->num_rows();

        if ($num_rows > 0) {

            foreach ($q->result() as $rows) {

                $data[] = $rows;

            }

            $q->free_result();

            return $data;

        }   

    }

	

	function sum_records_daily($table){

     $q = $this->db->query("SELECT user_id,trump,SUM(point) as point FROM ".$table." where match_date=current_date GROUP BY user_id order by point desc limit 50");

     $num_rows = $q->num_rows();

        if ($num_rows > 0) {

            foreach ($q->result() as $rows) {

                $data[] = $rows;

            }

            $q->free_result();

            return $data;

        }   

    }

	

	function sum_records_weekly($table){  

	 $current_date = date('Y-m-d');

     $q = $this->db->query("SELECT user_id,trump,SUM(point) as point FROM ".$table." where match_date>current_date - interval 7 day GROUP BY user_id order by point desc limit 50");

     $num_rows = $q->num_rows();

        if ($num_rows > 0) {

            foreach ($q->result() as $rows) {

                $data[] = $rows;

            }

            $q->free_result();

            return $data;

        }   

    }

	

	

	

	

	function getAllwhere_ob($table,$where,$colomn,$type)

    {

        $this->db->select('*');

		$this->db->order_by($colomn,$type);

        $q = $this->db->get_where($table, $where);

        $num_rows = $q->num_rows();

        $num_rows = $q->num_rows();

        if ($num_rows > 0) {

            foreach ($q->result() as $rows) {

                $data[] = $rows;

            }

            $q->free_result();

            return $data;

        }

    }

	

	

	function getAllwhere_field($table, $where,$filed)

    {

        $this->db->select($filed);

        $q = $this->db->get_where($table, $where);

        $num_rows = $q->num_rows();

        if ($num_rows > 0) {

            foreach ($q->result() as $rows) {

                $data[] = $rows;

            }

            $q->free_result();

            return $data;

        }

    }

	

	public function record_count($table,$where='') 

	{		

		$this->db->from($table);

		if($where!=''){

		$this->db->where($where);

		}

		return $this->db->count_all_results();		

	}

	

	function getAllwhere_pagination($table,$limit,$start,$where='',$column='',$type='')

    {

        $this->db->select('*'); 

		$this->db->from($table);

		if($where!=''){

			$this->db->where($where);

		}		

		$this->db->limit($limit, $start);

		if($column!="")

		{

		$this->db->order_by($column,$type);	

		}

		$query = $this->db->get();

		return $query->result(); 

    }

	function sum_of_cloumn($table,$where='',$column){

		$this->db->select_sum('rating');

		$this->db->from($table);

		if($where!=''){

			$this->db->where($where);

		}

		$query = $this->db->get();

		return $query->result(); 

	}

	

	function my_rank($user_id){

     $q = $this->db->query("select user_id, point, rank

				from (

					  select user_id, point, @rank := @rank + 1 as rank

					  from (

							select user_id, sum(point) point

							from   user_prediction

							group by user_id

							order by sum(point) desc

						   ) t1, (select @rank := 0) t2

					 ) t3

				where user_id = '".$user_id."'");

     $result = $q->result_array();

     return $result;    

    }

	function fetch_pass($session_id)

	{

	$fetch_pass=$this->db->query("select * from users where user_id='$session_id'");

	$res=$fetch_pass->result();

	}

	function change_pass($session_id,$new_pass)

	{

	$update_pass=$this->db->query("UPDATE users set password='$new_pass'  where user_id='$session_id'");

	}

	 public function get_user($user_id)

    {

        $this->db->where('user_id', $user_id);

        $query = $this->db->get('users');

        return $query->result();

    }



    public function update_user($user_id, $userdata)

    {

        $this->db->where('user_id', $user_id);

        $this->db->update('users', $userdata);

    }
	
	function last10daysofexpiration()

    {
        $sql  = "SELECT subscription_plan.id as sid,subscription_plan.duration,subscription_history.* FROM subscription_plan INNER JOIN subscription_history ON subscription_history.subscription_id=subscription_plan.id where subscription_history.id IN (SELECT MAX(id)FROM subscription_history) GROUP BY user_id ORDER BY id DESC" ; 

        $qq = $this->db->query($sql);

		return $result = $qq->result();

    }
    function getAllUsersList()
    {
    	$sql  = "SELECT subscription_history.*, users.*,subscription_plan.*,subscription_history.user_id ,subscription_history.subscription_id FROM subscription_history LEFT JOIN users ON subscription_history.user_id=users.user_id LEFT JOIN subscription_plan ON subscription_history.subscription_id=subscription_plan.id GROUP by subscription_history.user_id order by users.user_id desc";
		$qq = $this->db->query($sql);
		$result = $qq->result();
		return $result;
    }

	function getLastSubscription($user_id){
		$sql  = "SELECT * FROM `subscription_count_days` WHERE user_id = ".$user_id." order by end_date DESC LIMIT 1";
		$q = $this->db->query($sql);
		$data = [];
		$num_rows = $q->num_rows();
        if ($num_rows > 0) {
            foreach ($q->result() as $rows) {

                $data[] = $rows;
            }

            $q->free_result();
            return $data;

        }else{
			return $data;
		}
	}

	function send_mail($tomail,$subject,$message) {
        // $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = $this->config->item('MAIL_HOST');
        $config['smtp_user'] = $this->config->item('MAIL_USERNAME');
        $config['smtp_pass'] = $this->config->item('MAIL_PASSWORD');
        $config['smtp_port'] = $this->config->item('MAIL_PORT');
		$config['mailtype'] = 'html';
		$config['newline'] = "\r\n";
		$this->load->library('email', $config);
        $this->email->initialize($config);
        $from_email = $this->config->item('MAIL_USERNAME');
        $to_email = $tomail;
        $this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        //Send mail
        if($this->email->send())
            $message = "Congragulation Email Send Successfully.";
        else
            $message = "You have encountered an error". $this->email->print_debugger();
        return $message;
    }

}

?>