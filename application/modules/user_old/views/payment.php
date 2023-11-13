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
                        <h3 class="text-center">Payment</h3>
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
                                            <input type="text" id="email"class="form-control border-0 bg-light w-100" name="email"placeholder="Your email" required>
                                            <label for="text">Your Email</label>
                                             <!-- <span><?= form_error('email') ?></span> -->
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
                                <a href="javascript:void(0)"type="submit"  id="buy_now"  class="btn btn-sm btn-primary float-right " data-amount="<?php echo $data_amount; ?>" data-id="<?php echo $data_id; ?>">Subscribe Now</a>

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
  alert("hi");


var totalAmount = $(this).attr("data-amount");
var subscription_id =  $(this).attr("data-id");
var name = $("#name").val();
var email = $("#email").val();
var phone = $("#phone").val();
var address = $("#address").val();

var options = {
"key":"rzp_test_VA9mhQSg5SJs5H", rzp_live_OkVNyeILcznmr3
"amount": (totalAmount *100), // 2000 paise = INR 20
"currency": "INR",
"name": "Amiteshwar.in",
"description": "Payment",
"order_id": "<?php echo $razor_order_id;?>",
"handler": function (response){
 console.log(response);
	//alert(response.razorpay_signature);
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

    <!-- profile end -->

    <!-- Footer Start -->
   