       <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Add News Letter</h3>
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
						<form id="demo-form2" action="<?php echo base_url('admin/news_content') ; ?>" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">				<input type="hidden" name="submithiddenform" value="1">

							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Analysis Report  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="analysis" name="analysis" value=""  placeholder="Plese enter Analysis"   class="form-control col-md-7 col-xs-12">	
								<span style="color:red;"><?php echo form_error('analysis'); ?></span>

              
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Analysis Report PDF  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" name="pdf"  id="pdf" size="20" value=""  placeholder="Plese enter Analysis pdf"   class="form-control col-md-7 col-xs-12" >
								
								<span style="color:red;"><?php echo form_error('pdf'); ?></span>


							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="company" name="company" value=""  placeholder="Plese enter Company"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('company'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">BSE Code  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="bse" name="bse" value=""  placeholder="Plese enter BSE Code"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('bse'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NSE Code  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="nse" name="nse" value=""  placeholder="Plese enter NSE Code"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('nse'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Recommendation  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="recommendation" name="recommendation" value=""  placeholder="Plese enter Recommendation"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('recommendation'); ?></span>
							  </div>
							</div>
								<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Recommended Price 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="recommended_price" name="recommended_price" value=""  placeholder="Plese enter Recommended Price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('recommended_price'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Target Price 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="target_price" name="target_price" value=""  placeholder="Plese enter Recommended Price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('target_price'); ?></span>
							  </div>
							</div>
							 <!--<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Image  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" id="images" name="images" value="<?php  echo set_value('images'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('images'); ?></span>
							  </div>
							</div>-->
							
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
  