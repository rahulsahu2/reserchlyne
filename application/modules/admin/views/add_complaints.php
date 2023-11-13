       <!-- page content -->
	 
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Add New complaints</h3>
            </div>
          </div>
          <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
					 
					  <div class="clearfix"></div>
					</div>
					<h2>Number Of Investors Complaints</h2>
					<div class="x_content"><br />
						<form id="demo-form2" action="" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">				<input type="hidden" name="submithiddenform" value="1">
                             
                      
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">RECEIVED FROM  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="received_form" name="received_form" value="<?php  echo set_value('received_form'); ?>"  placeholder="Plese enter title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('received_form'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PENDING  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="pending_c" value="<?php  echo set_value('pending_c'); ?>"  placeholder="Plese enter duration"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('pending_c'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">	RECEIVED  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="received_c	" name="received_c" value="<?php  echo set_value('received_c'); ?>"  placeholder="Plese enter title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('received_c'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">RESOLVED 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="resolved_c" name="resolved_c" value="<?php  echo set_value('resolved_c'); ?>"  placeholder="Plese enter price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('resolved_c'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">TOTAL PENDING  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="total_pending" name="total_pending" value="<?php  echo set_value('total_pending'); ?>"  placeholder="Plese enter discounted price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('total_pending'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PENDING COMPLAINTS  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="pending_complains" name="pending_complains" value="<?php  echo set_value('pending_complains'); ?>"  placeholder="Plese enter off on price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('pending_complains'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">AVERAGE TIME  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="average_time" name="average_time" value="<?php  echo set_value('average_time'); ?>"  placeholder="Plese enter title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('average_time'); ?></span>
							  </div>
							</div>
								
							
							<hr>
							<h2>Trend Of Monthly Disposal Of Complaints</h2>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
SR NO.  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="sr_no_m" value="<?php  echo set_value('sr_no_m'); ?>"  placeholder="Plese enter title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('sr_no_m'); ?></span>
							  </div>
							</div>
								<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">MONTH  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="month" value="<?php  echo set_value('month'); ?>"  placeholder="Plese enter title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('month'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PREVIOUS MONTH  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="previous_month" value="<?php  echo set_value('previous_month'); ?>"  placeholder="Plese enter duration"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('previous_month'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">RECEIVED  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="received_m" value="<?php  echo set_value('received_m'); ?>"  placeholder="Plese enter price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('received_m'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">RESOLVED  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="resolved_m" value="<?php  echo set_value('resolved_m'); ?>"  placeholder="Plese enter discounted price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('resolved_m'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PENDING  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="pending_m" value="<?php  echo set_value('pending_m'); ?>"  placeholder="Plese enter off on price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('pending_m'); ?></span>
							  </div>
							</div>
							
							<hr>
							<h2>Trend Of Annual Disposal Of Complaints</h2>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">SR NO.  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="sr_no_y" value="<?php  echo set_value('sr_no_y'); ?>"  placeholder="Plese enter title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('sr_no_y'); ?></span>
							  </div>
							</div>
								<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">YEAR  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="year" value="<?php  echo set_value('year'); ?>"  placeholder="Plese enter title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('year'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">CARRIED FORWARD 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="carried_forward" value="<?php  echo set_value('carried_forward'); ?>"  placeholder="Plese enter duration"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('carried_forward'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">RECEIVED  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="received_y" value="<?php  echo set_value('received_y'); ?>"  placeholder="Plese enter price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('received_y'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">RESOLVED  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="resolved_y" value="<?php  echo set_value('resolved_y'); ?>"  placeholder="Plese enter discounted price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('resolved_y'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PENDING  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="pending_y" value="<?php  echo set_value('pending_y'); ?>"  placeholder="Plese enter off on price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('pending_y'); ?></span>
							  </div>
							</div>
						
									<hr>
							
							
						
							
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
  