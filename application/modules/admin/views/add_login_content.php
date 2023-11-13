
       <!-- page content -->
       <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Edit Login Content</h3>
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
						<form id="demo-form2" action="<?php echo base_url('admin/login_content') ; ?>" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
				<input type="hidden" name="submithiddenform" value="1">
					
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Header Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="header_title" name="header_title" value="<?php  echo $login->header_title; ?>"  placeholder="Plese enter Header title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('header_title'); ?></span>
							  </div>
							</div>
						
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key1 Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="key1_title" name="key1_title" value="<?php  echo $login->key1_title; ?>"  placeholder="Plese enter Key1 title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key1_title'); ?></span>
							  </div>
							</div>
						
                            <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key2 Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="key2_title" name="key2_title" value="<?php  echo $login->key2_title; ?>"  placeholder="Plese enter Key2 title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key2_title'); ?></span>
							  </div>
							</div>
                            <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key3 Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="key3_title" name="key3_title" value="<?php  echo $login->key3_title; ?>"  placeholder="Plese enter Key3 title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key3_title'); ?></span>
							  </div>
							</div>
                            <!-- <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key4 Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="key4_title" name="key4_title" value="<?php  echo $home_info->key4_title; ?>"  placeholder="Plese enter Key4 title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key4_title'); ?></span>
							  </div>
							</div> -->
                            <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Original Price 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="original_price" name="original_price" value="<?php  echo $login->original_price; ?>"  placeholder="Plese enter Original Price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('original_price'); ?></span>
							  </div>
							</div>
                            <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Discount Price 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="discount_price" name="discount_price" value="<?php  echo $login->discount_price; ?>"  placeholder="Plese enter Discount Price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('discount_price'); ?></span>
							  </div>
							</div>
							<hr>
							<p class="headings">Notes -</p>
							 
							<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
							 <textarea name="editor1"><?php echo $login->content; ?></textarea>
							 <script>
									 CKEDITOR.replace( 'editor1' );
							 </script>
							

							
							
							
                            
							
						
					
							  
							
						
							
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
  