
       <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Edit  Subscription Benefits</h3>
            </div>
          </div>
          <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
					 
					  <div class="clearfix"></div>
					</div>
					
					<div class="x_content"><br />
						<form id="demo-form2" action="<?php echo base_url('admin/subscription_benefits') ; ?>" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
				<input type="hidden" name="submithiddenform" value="1">
					
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subscription Benefits 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="benefits_title" name="benefits_title" value="<?php  echo $home_info->benefits_title; ?>"  placeholder="Plese enter Benefits title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('benefits_title'); ?></span>
							  </div>
							</div>
						
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key1 Title & Info
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key1_title" name="key1_title" value="<?php  echo $home_info->key1_title; ?>"  placeholder="Plese enter key1 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key1_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key1_info" name="key1_info" value="<?php  echo $home_info->key1_info; ?>"  placeholder="Plese enter key1 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key1_info'); ?></span>
							  </div>
							</div>
							

							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key2 Title & Info
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key2_title" name="key2_title" value="<?php  echo $home_info->key2_title; ?>"  placeholder="Plese enter key2 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key2_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key2_info" name="key2_info" value="<?php  echo $home_info->key2_info; ?>"  placeholder="Plese enter key2 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key2_info'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key3 Title & Info
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key3_title" name="key3_title" value="<?php  echo $home_info->key3_title; ?>"  placeholder="Plese enter key3 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key3_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key3_info" name="key3_info" value="<?php  echo $home_info->key3_info; ?>"  placeholder="Plese enter key3 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key3_info'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key4 Title & Info
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key4_title" name="key4_title" value="<?php  echo $home_info->key4_title; ?>"  placeholder="Plese enter key4 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key4_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key4_info" name="key4_info" value="<?php  echo $home_info->key4_info; ?>"  placeholder="Plese enter key4 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key4_info'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  
							
						
							
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
  