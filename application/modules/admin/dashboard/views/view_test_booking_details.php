 <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    View Test Booking Details
                </h3>
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
                   <?php  
						$user = $this->common_model->getsingle('patients', array('user_id'=>$records->user_id)); 
					?>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content"><br />
				
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Booking Date :</label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo date('d M Y', strtotime($records->booking_date)); ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Patient Name :</label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->patient_name; ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Test Name :</label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php
							$tids = explode(',',$records->test_ids);
							$num_of_id = count($tids); 
								$num_count = 0;
								foreach ($tids as $value) 
								{
									$path = $this->common_model->getsingle('pathology_test', array('id'=>$value));
										echo $c = $path->name;
									$num_count = $num_count + 1;
									if ($num_count < $num_of_id)
									{
										echo ", "; 
									}
								}
							?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile Number :</label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->mobile_number; ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Age :</label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->age; ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Village :</label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->village; ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address :</label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->address; ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pincode :</label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->pincode; ?>
					  </div>
                    </div>
					
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-3">
                        <a href="javascript: history.go(-1)" class="btn btn-primary">Back</a>
                        
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
		  
				
              </div>
           

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

  <script type="text/javascript" src="<?php echo base_url(); ?>js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="<?php echo base_url(); ?>js/pace/pace.min.js"></script>
  <style>
  .form-horizontal .control-label {
    text-align: left;
}
  </style>