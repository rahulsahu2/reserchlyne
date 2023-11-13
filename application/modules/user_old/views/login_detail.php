<?php $info_data= $this->common_model->getsingle('home_info', array('id'=>1)); ?>

<style >
    .btn {
    font-weight: 500;
    transition: .5s;
}

.btn.btn-primary,
.btn.btn-outline-primary:hover {
    color: #FFFFFF;
}

.btn-square {
    width: 38px;
    height: 38px;
}

.btn-sm-square {
    width: 32px;
    height: 32px;
}

.btn-lg-square {
    width: 48px;
    height: 48px;
}

.btn-square,
.btn-sm-square,
.btn-lg-square {
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: normal;
}
.table{min-width:1000px;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 13px;
  border: 1px solid #888;
  width: 25%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 15px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

 <style>
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .65), rgba(0, 0, 0, .65)), url(<?php echo base_url();?>assets/img/<?php echo $info_data->login_img;?>) center center no-repeat;
	background-size: cover;
}
</style>
<?php if($msg!=''){  ?>
			   
				  <p style="color:green;font-size: larger;text-align:center;"><b><?php echo $msg; ?></b></p>
				
		  <?php } ?> 
   <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">
               NewsLetter
            </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="<?php echo base_url('user/index');?>">Home</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        NewsLetter
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- login details start -->

    <section class="who-we-are login-details">
        <div class="container">
        
            <h5 class="text-center text-body">Offers Ending Soon &nbsp;&nbsp; 
            
             <!-- <p id="demoDate"><?= $newDate;?> -->
             <!-- <span id="demotime"><?= $time;?></span> -->

             <div class="counter" style='color: blue;'>
               <!-- <span  style="display: none;" class='e-m-days'><?= date('d') ?></span> Days |  -->
               <span  style="display: none;" class='e-m-days'><?= date('d') ?></span>
              <span class='e-m-hours'><?= date('h') ?></span> Hours |
              <span class='e-m-minutes'><?= date('i') ?></span> Minutes |
              <span class='e-m-seconds'><?= date('s') ?></span> Seconds
            </div>
             </p>
            </h5>
       
         

            <h2 class="text-center"><?php echo $login_data->header_title;?></h2>
           
            <div class="row pt-5 g-5 justify-content-center">
                <div class="col-lg-12 text-center d-flex">
                    <div class="heading heading-1 w-100">
                        <h5><?php echo $login_data->key1_title;?></h5>
                        <h4> <sup><img width="50" src="https://www.midcaps.in/images/new.gif"></sup><?php echo $login_data->key2_title;?></h4>
                       
                        <h5 class="text-dark"><?php echo $login_data->key3_title;?></h5>
                        <h5 class="text-dark">Rs.<?php echo $login_data->discount_price;?>/-( <span class="" style="text-decoration: line-through;"> Rs.<?php echo $login_data->original_price;?>/- </span>)</h5>
                        <div class="btn-submit btn-submit1 pb-0 pt-4">

                       <!--        <?php  echo $user_id =($user->user_id)
                             
                              ;?>
                                <?php  echo $name = ($user->name)
                             
                              ;?>
                                <?php  echo $email = ($user->email)
                             
                              ;?>
                                <?php  echo $phone = ($user->phone)
                             
                              ;?>
                              <?php  echo $address = ($user->address)
                             
                              ;?>

                               <?php
                                 echo $data_amount=$login_data->discount_price;
                               echo $data_id=$login_data->id;

                                ;?> -->
								<input type="hidden" id="pdata_amount" value="<?php echo $data_amount; ?>">
								<input type="hidden" id="pdata_id" value="<?php echo $data_id; ?>">
								
                       <a href="javascript:void(0)" id="myBtn"  >75% off renew now</a>
 
 <!-- $data-amount="<?php echo $login_data->discount_price;?>"  $data-id="<?php echo $login_data->id;?>"  $user-id="<?php  echo ($user->user_id);?>" $user-name="<?php  echo ($user->name);?>" $user-email="<?php  echo ($user->email);?>" $user-phone="<?php  echo ($user->phone);?>" $user-address="<?php  echo ($user->address);?>" -->


                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

                 

    <section class="same pb-0">
        <div class="container">
            <h2 class="text-center">NEWSLETTER</h2>
            <?php if($news){?>
                               
                     <?php foreach($news as $value){ ?> 
            <h5 class="text-center text-body">DATED :<?php echo date('d-m-Y',strtotime($value->date)); ?></h5>
            <div class="row pt-5">
                <div class="col-lg-12">
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="bg-color-tr">
                                <th scope="col"style="font-size:14px; font-weight:900; text-align: center;;">Analysis Report</th>
                                <th scope="col" style="font-size:14px; font-weight:900;text-align: center;">Company</th>
                                <th scope="col" style="font-size:14px; font-weight:900;text-align: center;">BSE Code</th>
                                <th scope="col" style="font-size:14px; font-weight:900; text-align: center;">NSE Code</th>
                                <th scope="col"style="font-size:14px; font-weight:900;text-align: center;">Recommendation</th>
                                <th scope="col"style="font-size:14px; font-weight:900;text-align: center;">Recommended Price</th>
                                <th scope="col" style="font-size:15px; font-weight:900;text-align: center;"> Target Price</th>
                            </tr>
                        </thead>
                        <tbody>
                                
                            <tr>

                                <td class="light-bg"><a href="<?php echo base_url();?>assets/img/<?php echo $value->pdf;?>" target="_blank" class="btn same-color text-white" ><?php echo $value->analysis; ?></a></td>
                                <td style="font-size:14px; font-weight:900; text-align: center;"><?php echo $value->company; ?></td>
                                <td class="light-bg" style="font-size:14px; font-weight:900;text-align: center;"><?php echo $value->bse; ?></td>
                                <td style="font-size:14px; font-weight:900;text-align: center;"><?php echo $value->nse; ?></td>
                                <td class="light-bg" style="font-size:14px; font-weight:900;text-align: center;"><?php echo $value->recommendation; ?></td>
                                <td style="font-size:14px; font-weight:900;text-align: center;"><?php echo $value->recommended_price; ?></td>
                                <td class="light-bg" style="font-size:14px; font-weight:900;text-align: center;"><?php echo $value->target_price; ?></td>
                            </tr>
                           

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
              <?php } ?>
             <?php } ?>
        </div>
    </section>
    

    <section class="same">
        <div class="container">
            <div class="text-center">
                <!-- <a href="#" class="btn same-color m-auto text-white text-center">PREVIOUS NEWSLETTERS</a>  -->
                <h3>
                     <button class="show-1-yes same-color text-white border-0 p-4">PREVIOUS NEWSLETTERS</button> 
                    <button class="hide-1-yes same-color text-white border-0 p-4">PREVIOUS NEWSLETTERS HIDE</button> 
                </h3>
            </div>
            <div id="target-1">
                <div class="row pt-5 g-4 justify-content-center">
                     
                               
                    
                    <?php if($pre){?>
                      
                               
                     <?php foreach($pre as $value){ ?> 
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="buttons1 ">

                            <a href="<?php echo base_url();?>assets/img/<?php echo $value->pdf;?>" class="btn all-btn">NEWSLETTER<br> DATED<br><?php echo date('d-m-Y',strtotime($value->date)); ?></a>
                        </div>
                    </div>
                     <?php } ?>
             <?php } ?>
               
 
                </div>
            </div>
        </div>
    </section>
        <section id="other-services" style="background:#f9f9f9;">
    <div class="container">
    
        <div class="title common text-center">
            <h3 class="text-center text-capitalize">
Notes</h3>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="about-text" style="font-size:medium;">
                <?php echo $login_data->content;?> 
                            </div>
            </div>
        </div>
            
    </div>
</section>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;Close</span>
    <form action="#" method="POST">
       
        <div class="modal-body">
          <p>Are you sure you want to renew now??</p>
		  
        </div>
		<?php
		$data_amount = $data_amount;
			$data_id = $data_id;
			
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

			$razor_order_idss = $obj->id;
			$razor_receipt = $obj->receipt;
			$razor_status = $obj->status;
			//echo "<pre>"; print_r($result);
			curl_close($ch);
		
		?>
		<input type="hidden" id="pdata_amounts" name="pdata_amounts" value="<?php echo $data_amount; ?>">
		  <input type="hidden" id="pdata_ids" name="pdata_ids" value="<?php echo $data_id; ?>">
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" id="buy_now" data-amount="<?php echo $data_amount; ?>" data-id="<?php echo $data_id; ?>" user-id="<?php echo $user_id; ?>"user-name="<?php echo $name; ?>"user-email="<?php echo $email; ?>" user-phone="<?php echo $phone; ?>" user-address="<?php echo $address; ?>"  value="OK">
        </div>
		</form>
  </div>

</div>
    

   <!-- Modal -->
  <!--<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
	  <form action="#" method="POST">
        <div class="modal-header">
          <button type="button" class="closea" data-dismiss="modal" style="padding-left:248px;">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to renew now??</p>
		  
        </div>
		<?php
		$data_amount = $data_amount;
			$data_id = $data_id;
			
			$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
			$receipt =  substr(str_shuffle($str_result),0, 8);
			
			//$rlogin = "rzp_live_OkVNyeILcznmr3";  //live
			//$rpassword = "rxgw2EGQdxwes0TBrL74ksey"; 
			
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

			$razor_order_idss = $obj->id;
			$razor_receipt = $obj->receipt;
			$razor_status = $obj->status;
			//echo "<pre>"; print_r($result);
			curl_close($ch);
		
		?>
		<input type="hidden" id="pdata_amounts" name="pdata_amounts" value="<?php echo $data_amount; ?>">
		  <input type="hidden" id="pdata_ids" name="pdata_ids" value="<?php echo $data_id; ?>">
        <div class="modal-footer">
          <input type="submit" class="btn btn-default" id="buy_now" data-amount="<?php echo $data_amount; ?>" data-id="<?php echo $data_id; ?>" user-id="<?php echo $user_id; ?>"user-name="<?php echo $name; ?>"user-email="<?php echo $email; ?>" user-phone="<?php echo $phone; ?>" user-address="<?php echo $address; ?>"  value="OK">
        </div>
		</form>
      </div>
    </div>
  </div>-->
    <!-- login details end -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg same-color text-white btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i
    ></a>
	<?php  //$razor_order_id =  $this->session->userdata('razor_order_id');?>

    <!-- JavaScript Libraries -->
  

    <!-- Template Javascript -->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

<script>



$(function() {
  function getCounterData(obj) {
    var days = parseInt($('.e-m-days', obj).text());
    var hours = parseInt($('.e-m-hours', obj).text());
    var minutes = parseInt($('.e-m-minutes', obj).text());
    var seconds = parseInt($('.e-m-seconds', obj).text());
    return seconds + (minutes * 60) + (hours * 3600) + (days * 3600 * 24);
  }

  function setCounterData(s, obj) {
    var days = Math.floor(s / (3600 * 24));
    var hours = Math.floor((s % (60 * 60 * 24)) / (3600));
    var minutes = Math.floor((s % (60 * 60)) / 60);
    var seconds = Math.floor(s % 60);

    console.log(days, hours, minutes, seconds);

    $('.e-m-days', obj).html(days);
    $('.e-m-hours', obj).html(hours);
    $('.e-m-minutes', obj).html(minutes);
    $('.e-m-seconds', obj).html(seconds);
  }

  var count = getCounterData($(".counter"));

  var timer = setInterval(function() {
    count--;
    if (count == 0) {
      clearInterval(timer);
      return;
    }
    setCounterData(count, $(".counter"));
  }, 1000);
});

$('.show-1-yes').click(function() {
	$('#target-1').show(500);
	$('.show-1-yes').hide(0);
	$('.hide-1-yes').show(0);
});
$('.hide-1-yes').click(function() {
	$('#target-1').hide(500);
	$('.show-1-yes').show(0);
	$('.hide-1-yes').hide(0);
});
</script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   <script>
 
 // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 

 
var SITEURL = "<?php echo base_url() ?>";

$('body').on('click', '#buy_now', function(e){

	e.preventDefault();
			
	var totalAmount = $(this).attr("data-amount");

	var subscription_id =  $(this).attr("data-id");
	 
	var user_id =  $(this).attr("user-id");
	  
	var name = $(this).attr("user-name");

	var email = $(this).attr("user-email");

	var phone =$(this).attr("user-phone");

	var address = $(this).attr("user-address");
//alert(response);
	var options = {
"key": "rzp_live_OkVNyeILcznmr3",//"key":"rzp_test_VA9mhQSg5SJs5H", rzp_live_OkVNyeILcznmr3
"amount": (totalAmount *100), // 2000 paise = INR 20
"currency": "INR",
"name": "Amiteshwar.in",
"description": "Payment",
"order_id": "<?php echo $razor_order_idss;?>",
"handler": function (response){
	alert(response);
 console.log(response);
	 //alert(response.razorpay_payment_id);
     //   alert(response.razorpay_order_id);
     //   alert(response.razorpay_signature);
$.ajax({
url: "<?php echo base_url('user/razorPaySucces_post');?>",
type: 'post',
data: {
razorpay_payment_id: response.razorpay_payment_id ,
razorpay_order_id: response.razorpay_order_id ,
 totalAmount : totalAmount ,
 subscription_id : subscription_id,
 name : name,
 phone : phone,
 email : email,
 address : address,
}, 
success: function (msg) {
//alert(msg);	
console.log(msg);

window.location = "https://amiteshwar.in/user/razorPaySuccess";

}
});
},
"prefill": {
        "name": name,
        "email": email,
        "contact": phone,
    },
    "notes": {
        "address": address,
    },

"theme": {
"color": "#528FF0"
}
};
	var rzp1 = new Razorpay(options);
	rzp1.open();
	e.preventDefault();

});
</script> 
</body>

</html>