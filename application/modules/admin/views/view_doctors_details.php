 <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    View Doctors Details
                    <small>
                       
                    </small>
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
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
					<?php
						//$from = new DateTime($records->start_experience);
						//$to   = new DateTime('today');
						//$exp =  $from->diff($to)->y;
					?>
					
					<div class="form-group">
					  <label class="control-label col-md-3 col-sm-3 col-xs-12 " for="first-name">Name : 
					  </label>
					  <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
						<?php  echo $records->name; ?>
					  </div>
					</div>
				
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Speciality :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php
						$cate = explode(',',$records->category_id);
						foreach($cate as $value){
						$cat = $this->common_model->getsingle('categories', array('id'=>$value));
						echo $cat->category_name.", ";
						}?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Location :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php
						$locations = $this->common_model->getsingle('locations', array('id'=>$records->location_id));
						echo $locations->name;
						?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Degree :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->degree; ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Experience :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->start_experience." yrs"; ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Timing :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->from_time." - ".$records->to_time; ?>
					  </div>
                    </div>

					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Days :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->days; ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Days in a row:
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->from_day ? $records->from_day." to ".$records->to_day : "-"; ?>
					  </div>
                    </div>

          <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Consultation Fee :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->fees; ?>
            </div>
                    </div>
                   
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->address; ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->contact; ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Registration number :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->registration_no; ?>
					  </div>
                    </div>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Old Prescription Valid for :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
                        <?php  echo $records->old_prescription_valid; ?>
					  </div>
                    </div>
														
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Phone">Image :
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="padding-top: 8px;">
						<img src="<?php echo base_url('uploads/doctors/'.$records->image); ?>" height="60" width="60" alt="image not found">
					  </div>
                    </div>
					
					<hr>
					
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Phone">Other Images :
                      </label>
					  
					  <?php foreach($doctor_images as $di){?>
					  <div class="col-md-2">
						<?php if($di->images!=''){ ?>
							<img src="<?php echo base_url('uploads/doctor_images/'.$di->images); ?>" alt="image not found" style="float: left;width: 60%;">
						<?php }else{ echo "NA"; }?>
					   </div>
					  <?php } ?>
					  
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