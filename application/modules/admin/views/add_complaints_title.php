
       <!-- page content -->
       <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Edit  complaints title</h3>
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
						<form id="demo-form2" action="<?php echo base_url('admin/add_complaints_title') ; ?>" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

								<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Complaints title<span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="complain" name="complain" value="<?php  echo $home_info->complain; ?>"  placeholder="Plese enter Benefits title" required="required" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('complain'); ?></span>
							  </div>
							</div>

					
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Complaints Paragraph<span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="c_title" name="c_title" value="<?php  echo $home_info->c_title; ?>"  placeholder="Plese enter Benefits title" required="required" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('c_title'); ?></span>
							  </div>
							</div>
							  <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Months  title<span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="month" name="month" value="<?php  echo $home_info->month; ?>"  placeholder="Plese enter " required="required" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('month'); ?></span>
							  </div>
							</div>

                            <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Months Paragraph <span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="m_title" name="m_title" value="<?php  echo $home_info->m_title; ?>"  placeholder="Plese enter Benefits title" required="required" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('m_title'); ?></span>
							  </div>
							</div>
							  <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Years title<span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="year" name="year" value="<?php  echo $home_info->year; ?>"  placeholder="Plese enter Benefits title" required="required" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('year'); ?></span>
							  </div>
							</div>
                            <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Years Paragraph<span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="y_title" name="y_title" value="<?php  echo $home_info->y_title; ?>"  placeholder="Plese enter Benefits title" required="required" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('y_title'); ?></span>
							  </div>
							</div>
						
							
							
							  
							
						
							
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
  