 <?php $info_data= $this->common_model->getsingle('home_info', array('id'=>1)); ?>
   <?php $sub_data =  $this->common_model->getsingle('subscription_benefits', array('id'=>1)); ?>
<style>
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .65), rgba(0, 0, 0, .65)), url(<?php echo base_url();?>assets/img/<?php echo $info_data->subscription_image;?>) center center no-repeat;
	background-size: cover;
}
</style>   

   <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">
                Subscription
            </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="<?php echo base_url('user/index');?>">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item">
                        <a class="text-white" href="#">Pages</a>
                    </li> -->
                    <li class="breadcrumb-item active" aria-current="page">
                        Subscription
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->



    <!-- Subscription section start -->
    <!-- subscriber start -->
      <section class="price-sec">
            <div class="container">
                <div class="title common text-center">
                    <h2>Subscription</h2>
                    <h3 style="margin-top: 0; color: #3385d9;font-weight: bold;">GET LOGIN DETAILS JUST AFTER SUBSCRIPTION</h3>
                    <p style="margin-top:0px;">(By : Credit/Debit Card/Net Banking/PayTM etc.)</p>

                    <!--<ul class="no-style" style="font-size:large; font-weight:bolder; margin-top:-2px; padding-top:0px ; list-style: none;">-->
                    <!--    <li style="background-color:#e0e0e0;color:red;padding:5px 0;text-transform: uppercase;font-size: 20px; width: 100%; max-width:600px; margin: auto;"><span style="font-size: 30px; font-weight:600;" id="timer">0Days : 11H : 5M : 22S</span><br>OFFERS ENDING SOON</li>-->
                    <!--</ul>-->
                </div>
                <div class="row py-4 gy-5">
				<?php if($subscription_plan){ foreach($subscription_plan as $value){?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-price">
                            <div class="item-title text-center">
                                <h2><?php echo $value->title; ?><br>
                                    <sup style="font-size: medium;"><?php echo $value->duration; ?> Plan</sup>
                                </h2>
                            </div>

                            <div class="content">
                                <p style="font-size:20px; text-align:center; margin:0px; margin-bottom:-10px; color:#003eff; padding-top: 25px;">
                                    <span style="font-size:20px;text-decoration: line-through;">Rs.<?php echo $value->price; ?>/-</span><?php echo $value->off_price; ?>% off
                                    <br>You Save Rs.<?php echo $value->discounted_price; ?>/-
                                </p>
                                <h3>Rs.<?php echo $value->price - $value->discounted_price; ?>/-</h3>
                            </div>
                            <form action="">
                                <div class="check d-flex justify-content-center">
                                    <div class="form-group form-check">
                                        <i class="fas fa-check-square"></i>
                                        <label class="form-check-label" for="exampleCheck1"> I agree to Terms & Conditions and Privacy Policy</label>
                                    </div>
                                </div>
                                  <?php
                                 $data_amount=$value->price - $value->discounted_price;
                                $data_id=$value->id;
                                ?>
                                <div class="btn-submit">
                                    <!-- <button type="button" class="btn btn-outline-secondary text-uppercase w-100"></button> -->
                                      <a href="<?php echo base_url('user/payment/'.$data_id.'/'.$data_amount); ?> ">Subscribe Now</a>
                                </div>
                                </form>

                            </div>
                        </div>
					<?php } } ?>
                       
                    </div>
                </div>
                </section>

    <section class="benefit">
        <div class="container">
            <div class="pricing-inner">
                <div class="title common text-center">
                    <h2>Benefits</h2>
                    <p><?php echo $sub_data->benefits_title;?></p>
      
                </div>
                <div class="row gy-4 pt-4 justify-content-center">
                <div class="col-lg-6 col-md-6 col-12 d-flex ">
                    <div class="box-choose">
                        
                        <h5><?php echo $sub_data->key1_title;?></h5>
                        <p><?php echo $sub_data->key1_info;?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 d-flex">
                    <div class="box-choose">
                        
                        <h5><?php echo $sub_data->key2_title;?></h5>
                        <p><?php echo $sub_data->key2_info;?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 d-flex">
                    <div class="box-choose">
                        
                        <h5><?php echo $sub_data->key3_title;?></h5>
                        <p><?php echo $sub_data->key3_info;?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 d-flex">
                    <div class="box-choose">
                        
                        <h5><?php echo $sub_data->key4_title;?></h5>
                        <p><?php echo $sub_data->key4_info;?></p>
                    </div>
                </div>
                
                
            </div>
    </section>
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
<!-- https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
 <script>
var SITEURL = "<?php echo base_url() ?>";
$('body').on('click', '#buy_now', function(e){
    // alert("testin")

var totalAmount = $(this).attr("data-amount");

var product_id =  $(this).attr("data-id");
var options = {
"key": "rzp_test_0IhNZqHztbpTck",  //rzp_live_pdScwBe73edCyD
"amount": (1*100), // 2000 paise = INR 20
"name": "Amiteshwar.in",
"description": "Payment",
// "image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
"handler": function (response){
 console.log(response);
$.ajax({
url: "<?php echo base_url('user/razorPaySucces_post');?>",
type: 'post',
data: {
razorpay_payment_id: response.razorpay_payment_id ,
 totalAmount : totalAmount ,
 product_id : product_id,
}, 
success: function (msg) {
url:"<?php echo base_url('user/razorPaySuccess');?>";
},
});
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
    <!-- subscriber end -->
    <!-- Subscription section end -->
