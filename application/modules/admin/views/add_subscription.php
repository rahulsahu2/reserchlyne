       <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Add New Subscription</h3>
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
						<form id="demo-form2" action="" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
<input type="hidden" name="submithiddenform" value="1">
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Subscription Title  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="title" value="<?php  echo set_value('title'); ?>"  placeholder="Plese enter title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('title'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plan Duration  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="duration" value="<?php  echo set_value('duration'); ?>"  placeholder="Plese enter duration"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('duration'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Original Price  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="price" value="<?php  echo set_value('price'); ?>"  placeholder="Plese enter price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('price'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Discounted Price  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="discounted_price" value="<?php  echo set_value('discounted_price'); ?>"  placeholder="Plese enter discounted price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('discounted_price'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Off on price  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="off_price" value="<?php  echo set_value('off_price'); ?>"  placeholder="Plese enter off on price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('off_price'); ?></span>
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
  