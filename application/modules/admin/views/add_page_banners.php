       <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Edit Banners</h3>
            </div>
          </div>
          <div class="clearfix"></div>

        <div class="row">
		<?php if($msg!=''){ ?>
			   <div class="alert alert-success alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				  </button>
				  <?php echo $msg; ?>
				</div>
		  <?php } ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
					 
					  <div class="clearfix"></div>
					</div>
					
					<div class="x_content"><br />
						<form id="demo-form2" action="" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
							<input type="hidden"  name="demo" value="demo"  >
							
							<hr>
							
							<p class="headings">About Us Banner Image -</p>
							 <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">About Us   
							  </label>
							  <div class="col-md-9 col-sm-9 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->aboutus_image; ?>" class="img-responsive" style="height: 210px;"  width="800">
							  <br>
								<input type="file" id="images" name="images" value="<?php  echo set_value('images'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('images'); ?></span>
							  </div>
							</div>
							<hr>
							
							<p class="headings">Subscription Banner Image -</p>
							 <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subscription   
							  </label>
							  <div class="col-md-9 col-sm-9 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->subscription_image; ?>" class="img-responsive" style="height: 210px;"  width="800">
							  <br>
								<input type="file" id="s_images" name="s_images" value="<?php  echo set_value('s_images'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('s_images'); ?></span>
							  </div>
							</div>
							
							<hr>
							
							<p class="headings">Why Researchlyne Banner Image -</p>
							 <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Why Researchlyne   
							  </label>
							  <div class="col-md-9 col-sm-9 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->why_amiteshwar_image; ?>" class="img-responsive" style="height: 210px;"  width="800">
							  <br>
								<input type="file" id="wa_images" name="wa_images" value="<?php  echo set_value('wa_images'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('wa_images'); ?></span>
							  </div>
							</div>
							<p class="headings">Why Researchlyne Background Image -</p>
							 <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Why Researchlyne   
							  </label>
							  <div class="col-md-9 col-sm-9 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->why_amiteshwar_image2; ?>" class="img-responsive" style="height: 210px;"  width="800">
							  <br>
								<input type="file" id="wh_images" name="wh_images" value="<?php  echo set_value('wh_images'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('wh_images'); ?></span>
							  </div>
							</div>
							
							<hr>
							
							<p class="headings">FAQ Banner Image -</p>
							 <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">FAQ   
							  </label>
							  <div class="col-md-9 col-sm-9 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->faq_image; ?>" class="img-responsive" style="height: 210px;"  width="800">
							  <br>
								<input type="file" id="faq_image" name="faq_image" value="<?php  echo set_value('faq_image'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('faq_image'); ?></span>
							  </div>
							</div>
							
							<hr>
							
							<p class="headings">Contact Us Banner Image -</p>
							 <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact Us   
							  </label>
							  <div class="col-md-9 col-sm-9 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->contact_us_image; ?>" class="img-responsive" style="height: 210px;"  width="800">
							  <br>
								<input type="file" id="contact_us_image" name="contact_us_image" value="<?php  echo set_value('contact_us_image'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('contact_us_image'); ?></span>
							  </div>
							</div>
							<hr>
							<p class="headings">Investor charter Banner Image -</p>
							 <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">investor charter  
							  </label>
							  <div class="col-md-9 col-sm-9 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->investor_charter_image; ?>" class="img-responsive" style="height: 210px;"  width="800">
							  <br>
								<input type="file" id="i_images" name="i_images" value="<?php  echo set_value('i_images'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('i_images'); ?></span>
							  </div>
							</div>
							<hr>
							<p class="headings">Investor complaints Banner Image -</p>
							 <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">investor complaints  
							  </label>
							  <div class="col-md-9 col-sm-9 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->investor_complaints_image; ?>" class="img-responsive" style="height: 210px;"  width="800">
							  <br>
								<input type="file" id="ic_images" name="ic_images" value="<?php  echo set_value('ic_images'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('ic_images'); ?></span>
							  </div>
							</div>

											<input type="hidden" name="submithiddenform" value="1">
							<hr>
							<p class="headings">Login  Banner Image -</p>
							 <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Login  
							  </label>
							  <div class="col-md-9 col-sm-9 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->login_img; ?>" class="img-responsive" style="height: 210px;"  width="800">
							  <br>
								<input type="file" id="login_img" name="login_img" value="<?php  echo set_value('login_img'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('login_img'); ?></span>
							  </div>
							</div>
							<hr>
							<!--<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
							<textarea name="editor1"></textarea>
							<script>
									CKEDITOR.replace( 'editor1' );
							</script>-->
							
							<div class="ln_solid"></div>
							<div class="form-group">
							  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="btn btn-success">Submit</button>
							  </div>
							</div>

						</form>
					</div>
				</div>
            </div>
        </div>
		  
				
              </div>
              <!-- footer content -->
			  
             <?php //$this->load->view('includes/footer'); ?>
			 
              <!-- /footer content -->

    </div>
	
            <!-- /page content -->
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <!-- gauge js -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="<?php echo base_url(); ?>js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo base_url(); ?>js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="<?php echo base_url(); ?>js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="<?php echo base_url(); ?>js/chartjs/chart.min.js"></script>

  <script src="<?php echo base_url(); ?>js/custom.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/date.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.resize.js"></script>
  <style>
  .headings{
	background-color: #2A3F54;
    color: #fff;
    font-size: medium;
    font-style: italic;
    font-weight: 550;
    padding-left: 13px;
	letter-spacing: 0.1em;
  }
  </style>