<?php $info_data= $this->common_model->getsingle('home_info', array('id'=>1)); ?>
<?php $contact_data= $this->common_model->getsingle('contact_content', array('id'=>1)); ?>
<style>
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .65), rgba(0, 0, 0, .65)), url(<?php echo base_url();?>assets/img/<?php echo $info_data->contact_us_image;?>) center center no-repeat;
	background-size: cover;
}

.location-i {
    display: flex;
    align-items: center;
    gap: 17px;
}

.location-i p {
    margin-bottom: 0;
}

.border-bg {
    border: solid 1px #f0efef;
    background-color: #fff;
    padding: 20px;
}

.location-i i {
    background: #3385d9;
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    color: white;
}
</style> 
 <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">
                Contact Us
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
                        Contact Us
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                
                
                
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                    <div class="border-start border-5 border-color ps-4 mb-5">
                        <h6 class="text-body text-uppercase mb-2">Contact Us</h6>
                        <h1 class="display-6 mb-0">
                            <?php echo $contact_data->title;?>
                        </h1>
                    </div>
                   
                    <div class="form-icon">
                        <div class="location-i">
                            <i class="fas fa-map-marker-alt"></i>
                            <p><?php echo $contact_data->address;?></p>
                        </div>
                        <div class="location-i mt-3">
                            <i class="fas fa-phone-alt"></i>
                            <p><?php echo $contact_data->mobile;?></p>
                        </div>
                        <div class="location-i mt-3">
                            <i class="fas fa-envelope"></i>
                            <p><?php echo $contact_data->email;?></p>
                        </div>
                         <div class="location-i mt-3">
                            <i class="fas fa-envelope"></i>
                            <p><?php echo $contact_data->bussiness_email;?></p>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                  <?php if($msg!=''){?><div>
                <span style="color:green;"><?php echo $msg; ?></span>
             </div>
            <?php } ?> 
   
                    <!-- <form> -->
                         <!-- <p id ="result"></p> -->
                      <!--<form action="<?php echo base_url('user/contact').'#form';?>" method="POST">-->					   <form action="<?php echo base_url('user/contact');?>" method="POST">
                     <div class="row g-3 ">
                        <div class="row border-bg g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 bg-light w-100" name="name" id="name" placeholder="Your Name "  required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email"  name="gmail"class="form-control border-0 bg-light w-100" id="gmail" placeholder="Your Email"  required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control border-0 bg-light w-100" name="mobile" id="mobile" placeholder="Phone Number" required>
                                    <label for="subject">Phone Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 bg-light w-100" name="subject" id="subject" placeholder="Subject" required>
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0 bg-light w-100" name="message" placeholder="Leave a message here" id="message" style="height: 150px" required></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn same-color text-white py-3 px-5" type="submit" value="submit" name="submit">
                    Send  Message
                  </button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Contact End -->
<!--  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {
        $('form').bind('submit', function () {
          $.ajax({
            type: 'post',
            url: '<?php echo base_url('user/contact');?>',
            data: $('form').serialize(),
            success: function (response) {
                $("#result").html('Thank you for your Enquiry. We will get in touch!'); 
                $("#result").addClass("alert alert-success");
            }
          });
          return false;
        });
      });
    </script> -->