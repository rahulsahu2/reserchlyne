<style>

.greenclr {
     color: #00d684;
}
</style>
  
  <?php
	$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
			$receipt =  substr(str_shuffle($str_result),0, 8);
			
			// $username = "rzp_live_OkVNyeILcznmr3"; //live
			// $password = "rxgw2EGQdxwes0TBrL74ksey";
			
            $username = "rzp_test_VA9mhQSg5SJs5H"; //test
			$password = "Ut36E48PUadXV2xuTd13ge2n"; 
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
			////echo "--";
			//echo "<pre>"; print_r($result);
			//curl_close($ch);
			//echo "hi".$razor_status; die;
	
	?>
	
	<!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">
                 Payment  
            </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="index.html">Home</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        Payment
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- profile start -->

    <section class="who-we-are">
        <div class="container">
            <!-- <h2 class="text-center">FORGOT</h2> -->
            <div class="row">
                <div class="col-lg-4 m-auto">
                    <div class="heading ">
                        <h3 class="text-center greenclr">Payment</h3>
                        <!-- <h1 class="text-center">
                            +962 Days <sub>Left</sub></h1> -->
<!-- <?php ////print_r($data_id)?> -->
                                       <p id ="result"></p>
                        <div class="profile-content">

                            <from>
                   
                                <div class="row g-3 pt-3 justify-content-center">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" id="name" class="form-control border-0 bg-light w-100" name="name"placeholder="Your Name" required >
                                       <!--      <input type="hidden" class="form-control border-0 bg-light w-100" name="data_id">
                                               <input type="hidden" class="form-control border-0 bg-light w-100" name="data_amount"> -->
                                            <label for="name">Your Name</label>
                                            <!-- <span><?= form_error('name') ?></span> -->
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="email" id="email"class="form-control border-0 bg-light w-100" name="email"placeholder="Your email" required>
                                            <label for="text">Your Email</label>
                                             <!-- <span><?= form_error('email') ?></span> -->
											 <span id="emailerr" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <!-- <input type="number" id="phone" class="form-control border-0 bg-light w-100"name="phone"  placeholder="Your Contact no."> -->
                                             <input type="text"    id="phone" name="phone" class="form-control border-0 bg-light w-100" placeholder="Phone Number" 
                                                           minlength="1" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" 
                                                                   fdprocessedid="g37aru" required >
                                            <label for="subject">Contact No.</label>
                                             <!-- <span><?= form_error('phone') ?></span> -->
											  <span id="phoneerr" style="color:red;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" id="address" class="form-control border-0 bg-light w-100"name="address" placeholder="Your Address" required >
                                            <label for="password">Address</label>
                                            <!-- <span><?= form_error('address') ?></span> -->
                                        </div>
                                    </div>




                                </div>
                                  <div class="btns mt-5 mb-4 text-center">
                              <!-- <button type="submit" class="btn btn-success">Submit</button>   -->
                                <a href="javascript:void(0)" type="submit"  id="buy_now"  class="btn btn-sm btn-primary float-right " data-amount="<?php echo $data_amount; ?>" data-id="<?php echo $data_id; ?>">Subscribe Now</a>

                        </div>
                            </form>
                        </div>

                      



                    </div>

                </div>
            </div>
        </div>
    </section>
	<?php  $order_id = "order_".bin2hex(openssl_random_pseudo_bytes(4)); ?>
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
<!-- https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
 
 <script>
 var SITEURL = "<?php echo base_url() ?>";
$('body').on('click', '#buy_now', function(e){
var totalAmount = $(this).attr("data-amount");
var subscription_id =  $(this).attr("data-id");
var name = $("#name").val();
var email = $("#email").val();
var phone = $("#phone").val();
var address = $("#address").val();
//alert(name);
$('#emailerr').html('');
$('#phoneerr').html('');

if(email==""){
 
	$('#emailerr').html('Please fill valid email field..!');
	$("#buy_now").attr("disabled", true);
}else if( !validateEmail(email) ){
	$('#emailerr').html('Invalid email..!');
	$("#buy_now").attr("disabled", true);
}else if(phone==""){
	//alert("Please fill contact number field..!");
	$('#phoneerr').html('Please fill contact number field..!');
	$("#buy_now").attr("disabled", true);
}else{
	$('#emailerr').html('');
	$('#phoneerr').html('');
	$("#buy_now").removeAttr("disabled");

var options = {
"key": "rzp_test_VA9mhQSg5SJs5H",//"key":"rzp_test_VA9mhQSg5SJs5H", rzp_live_OkVNyeILcznmr3
"amount": (totalAmount *100), // 2000 paise = INR 20
"currency": "INR",
"name": "Researchlyne.com",
"description": "Payment",
"order_id": "<?php echo $razor_order_id;?>",
"handler": function (response){
 console.log(response);
sessionStorage.setItem("sub",subscription_id);
sessionStorage.setItem("amt",totalAmount);
sessionStorage.setItem("pay",response.razorpay_payment_id);
var url = "<?php echo base_url('user/razorPaySucces_post');?>";
$.ajax({
url: url,
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
var tempurl = "<?php echo base_url('user/razorPaySuccess'); ?>";
window.location =tempurl;
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
}
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();

});

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}
</script> 

    <!-- profile end -->

    <!-- Footer Start -->
   