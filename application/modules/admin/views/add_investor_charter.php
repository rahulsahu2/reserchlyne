       <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Edit Investor charter</h3>
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
							
							<p class="headings">A-</p>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="a_title" name="a_title" value="<?php  echo $investor_charter->a_title; ?>"  placeholder="Plese enter A title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('a_title'); ?></span>
							  </div>
							</div>
							 <div>
							  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">A description 
							  </label>
							  
							 
							<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
							<textarea name="a_description"><?php echo $investor_charter->a_description; ?></textarea>
							<script>
									CKEDITOR.replace( 'a_description' );
							</script>
							</div>
						
						
							
							
							<hr>
							<p class="headings">B -</p>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">B Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="b_title" name="b_title" value="<?php  echo $investor_charter->b_title; ?>"  placeholder="Plese enter b title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('b_title'); ?></span>
							  </div>
							</div>
							  <div>
							  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">B description 
							  </label>
							  
							 
							<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
							<textarea name="b_description"><?php echo $investor_charter->b_description; ?></textarea>
							<script>
									CKEDITOR.replace( 'b_description' );
							</script>
							</div>
							 
							
							<hr>
							<p class="headings">c -</p>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">C Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="c_title" name="c_title" value="<?php  echo $investor_charter->c_title; ?>"  placeholder="Plese enter c title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('c_title'); ?></span>
							  </div>
							</div>
							  <div>
							  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">c description 
							  </label>
							  
							 
							<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
							<textarea name="c_description"><?php echo $investor_charter->c_description; ?></textarea>
							<script>
									CKEDITOR.replace( 'c_description' );
							</script>
							</div>
							
							<hr>
							<p class="headings">D -</p>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">D Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="d_title" name="d_title" value="<?php  echo $investor_charter->d_title; ?>"  placeholder="Plese enter d title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('d_title'); ?></span>
							  </div>
							</div>
							  <div>
							  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">D description 
							  </label>
							  
							 
							<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
							<textarea name="d_description"><?php echo $investor_charter->d_description; ?></textarea>
							<script>
									CKEDITOR.replace( 'd_description' );
							</script>
							</div>
							<hr>				<input type="hidden" name="submithiddenform" value="1">
							<p class="headings">E-</p>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="e_title" name="e_title" value="<?php  echo $investor_charter->e_title; ?>"  placeholder="Plese enter e title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('a_title'); ?></span>
							  </div>
							</div>
							
						
						 <div>
							  	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E description 
							  </label>
							  
							 
							<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
							<textarea name="e_description"><?php echo $investor_charter->e_description; ?></textarea>
							<script>
									CKEDITOR.replace( 'e_description' );
							</script>
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