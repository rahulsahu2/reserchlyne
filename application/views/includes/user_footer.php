<?php $info_data= $this->common_model->getsingle('home_info', array('id'=>1));  
   
     ?> 
<style type="text/css">
   @media (min-width: 992px)
.me-3 {
    flex: 0 0 auto;
    width: 27%;
}

</style>
                            <!-- Footer Start -->
                            <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="col-md-11 ms-auto">
                <div class="row g-5">
                    <div class="col-lg-5 col-md-6">
                        <h2 class="text-white mb-4">
                            <i class="fa fa-building icon-color me-3"></i>Researchlyne.com
                        </h2>
                        <p>
                          <?php echo $info_data->aboutus_content;?>
                        </p>
                        
                    </div>
                    <div class="col-lg-3 col-md-6 row-content">
                        <h4 class="text-light mb-4">Address</h4>
                        <p>
                            <i class="fa fa-map-marker-alt me-3"></i><?php echo $info_data->address;?>
                        </p>
                        <p><i class="fa fa-phone-alt me-3"></i><?php echo $info_data->phone_no;?></p>
                        <p><i class="fa fa-envelope me-3"></i><?php echo strtolower($info_data->email);?></p>
                    </div>
                    <div class="col-lg-4 col-md-6">
                   
                              
                             
                                            <h4 class="text-light mb-4">Quick Links</h4>
                                                <?php if($this->session->userdata('user_id')!=''){?>
                                            <a class="btn btn-link" href="<?php echo base_url('user/contact');?>">Contact Us</a>
                                            <a class="btn btn-link" href="<?php echo base_url('user/subscription');?>">Subscription</a>
                                              <a class="btn btn-link" href="<?php echo base_url('user/profile');?>">My Profile</a>
                                            <!-- <a class="btn btn-link" href="# ">Investor Charter</a> -->
                                             <a class="btn btn-link" href="<?php echo base_url('user/investor');?>">Investor Charter</a>
                                            <a class="btn btn-link" href="<?php echo base_url('user/investor_complaints');?>">Investors Complaints</a>
                                            <a class="btn btn-link" href="<?php echo base_url('user/privacy_policy');?>">Privacy Policy</a>
                                            <a class="btn btn-link" href="<?php echo base_url('user/term_condition');?>">Terms & Conditions</a>
                                            <a class="btn btn-link" href="<?php echo base_url('user/disclaimer');?>">Disclaimer</a>
                                            <?php }else{?>
                                                <a class="btn btn-link" href="<?php echo base_url('user/contact');?>">Contact Us</a>
                                            <a class="btn btn-link" href="<?php echo base_url('user/subscription');?>">Subscription</a>
                                              <!-- <a class="btn btn-link" href="#">Member's Login</a> -->
                                            <!-- <a class="btn btn-link" href="# ">Investor Charter</a> -->
                                             <a class="btn btn-link" href="<?php echo base_url('user/investor');?>">Investor Charter</a>
                                            <a class="btn btn-link" href="<?php echo base_url('user/investor_complaints');?>">Investors Complaints</a>
                                            <a class="btn btn-link" href="<?php echo base_url('user/privacy_policy');?>">Privacy Policy</a>
                                            <a class="btn btn-link" href="<?php echo base_url('user/term_condition');?>">Terms & Conditions</a>
                                            <a class="btn btn-link" href="<?php echo base_url('user/disclaimer');?>">Disclaimer</a>
                                                <?php }?>
                                        </div>

                </div>
				<br>
				<p>"Registration granted by SEBI, and certification from NISM in no way guarantee performance of the intermediary or provide any assurance of returns to investors."

"The securities quoted, if any are for illustration only and are not recommendatory."

"Investments in securities market are subject to market risks. Read all the related documents carefully before investing."</p>
            </div>

        </div>
		
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mb-3 mb-md-0 foot">
                        &copy; <a href="#">Researchlyne.com, a unit of Amiteshwar.in</a>, All Rights Reserved.
                    </div>
                    <!--<div class="col-md-6 text-center text-md-end">-->

                    <!--    Designed By <a href="https://htmlcodex.com">HTML Codex</a>-->
                    <!--    <br />Distributed By:-->
                    <!--    <a href="https://themewagon.com" target="_blank">ThemeWagon</a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
                            <!-- Footer End -->

                            <!-- Back to Top -->
                            <a href="#" class="btn btn-lg same-color text-white btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i
    ></a>
	

                            <!-- JavaScript Libraries -->
                            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
                            <script src="<?php echo base_url();?>assets/lib/wow/wow.min.js"></script>
                            <script src="<?php echo base_url();?>assets/lib/easing/easing.min.js"></script>
                            <script src="<?php echo base_url();?>assets/lib/waypoints/waypoints.min.js"></script>
                            <script src="<?php echo base_url();?>assets/lib/owlcarousel/owl.carousel.min.js"></script>

                            <!-- Template Javascript -->
                            <script src="<?php echo base_url();?>assets/js/main.js"></script>
</body>

</html>