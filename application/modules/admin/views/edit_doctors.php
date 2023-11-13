		<!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Edit Doctor</h3>
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
							
							 
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category<span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <select id="category_id" name="category_id[]" multiple="multiple" class="select2_multiplecat form-control col-md-7 col-xs-12">
									<option value="" >Select Category </option>
									<?php if($categories){ ?>
									<?php foreach($categories as $cat){ ?>
									<option value="<?php echo $cat->id; ?>" <?php if(in_array($cat->id,explode(',',$doctors->category_id))) { echo "selected=selected";} ?>
>
									<?php echo $cat->category_name; ?> </option>
									<?php } ?>
									<?php } ?>
									</select>
								<span style="color:red;"><?php echo form_error('category_id'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Location<span class="required">*</span></label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <select id="location_id" name="location_id" class="form-control col-md-7 col-xs-12">
									<option value="" >Select Location </option>
									<?php if($locations){ ?>
									<?php foreach($locations as $loc){ ?>
									<option value="<?php echo $loc->id; ?>" <?php if($doctors->location_id==$loc->id){ echo "selected"; } ?> >
									<?php echo $loc->name; ?> </option>
									<?php } ?>
									<?php } ?>
									</select>
								<span style="color:red;"><?php echo form_error('location_id'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Doctor Name <span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="name" value="<?php  echo $doctors->name; ?>"  placeholder="Plese enter name"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('name'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hospital Name 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="hospital_name" name="hospital_name" value="<?php  echo $doctors->hospital_name; ?>"  placeholder="Plese enter hospital name"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('hospital_name'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact No 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="contact" name="contact" value="<?php  echo $doctors->contact; ?>"  placeholder="Plese enter contact number"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('contact'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Degree <span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="degree" name="degree" value="<?php  echo $doctors->degree; ?>"  placeholder="Plese enter degree" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('degree'); ?></span>
							  </div>
							</div>

							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Experience Starting from
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="start_experience" name="start_experience" value="<?php  echo $doctors->start_experience; ?>"  placeholder="Plese enter experience " class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('start_experience'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Timing 
							  </label>
							  <div class="col-md-3 col-sm-6 col-xs-12">
								<input type="text" id="ftime" name="ftime" value="<?php  echo $doctors->from_time; ?>"  placeholder="Plese enter from-time"  class="form-control col-md-7 col-xs-12 timepicker">
								<span style="color:red;"><?php echo form_error('ftime'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-6 col-xs-12">
								<input type="text" id="ttime" name="ttime" value="<?php  echo $doctors->to_time; ?>"  placeholder="Plese enter to-time"  class="form-control col-md-7 col-xs-12 timepicker">
								<span style="color:red;"><?php echo form_error('ttime'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Days</label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <select id="days" name="days[]"   class="select2_multiple form-control col-md-7 col-xs-12" multiple="multiple">
							
									<option value="" >--Select Days--</option>
									<option value="Monday" <?php if(in_array("Monday",explode(',',$doctors->days))) { echo "selected=selected";} ?> >Monday</option>
									<option value="Tuesday" <?php if(in_array("Tuesday",explode(',',$doctors->days))) { echo "selected=selected";} ?> >Tuesday</option>
									<option value="Wednesday" <?php if(in_array("Wednesday",explode(',',$doctors->days))) { echo "selected=selected";} ?> >Wednesday</option>
									<option value="Thursday" <?php if(in_array("Thursday",explode(',',$doctors->days))) { echo "selected=selected";}?> >Thursday</option>
									<option value="Friday" <?php if(in_array("Friday",explode(',',$doctors->days))) { echo "selected=selected";}?> >Friday</option>
									<option value="Saturday" <?php if(in_array("Saturday",explode(',',$doctors->days))) { echo "selected=selected";} ?> >Saturday</option>
									<option value="Sunday" <?php if(in_array("Sunday",explode(',',$doctors->days))) { echo "selected=selected";} ?> >Sunday</option>
									</select>
								<span style="color:red;"><?php echo form_error('days'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Days in a row 
							  </label>
							  <div class="col-md-3 col-sm-6 col-xs-12">
								<select id="days" name="from_day"   class="select2_dayfrom form-control col-md-7 col-xs-12" >
									<option value="Monday" <?php if("Monday"==$doctors->from_day) { echo "selected=selected";} ?> >Monday</option>
									<option value="Tuesday" <?php if("Tuesday"==$doctors->from_day) { echo "selected=selected";} ?> >Tuesday</option>
									<option value="Wednesday" <?php if("Wednesday"==$doctors->from_day) { echo "selected=selected";} ?> >Wednesday</option>
									<option value="Thursday" <?php if("Thursday"==$doctors->from_day) { echo "selected=selected";}?> >Thursday</option>
									<option value="Friday" <?php if("Friday"==$doctors->from_day) { echo "selected=selected";}?> >Friday</option>
									<option value="Saturday" <?php if("Saturday"==$doctors->from_day) { echo "selected=selected";} ?> >Saturday</option>
									<option value="Sunday" <?php if("Sunday"==$doctors->from_day) { echo "selected=selected";} ?> >Sunday</option>
									</select>
							  </div>
							  
							  <div class="col-md-3 col-sm-6 col-xs-12">
								<select id="days" name="to_day"   class="select2_dayto form-control col-md-7 col-xs-12" >
									<option value="Monday" <?php if("Monday"==$doctors->to_day) { echo "selected=selected";} ?> >Monday</option>
									<option value="Tuesday" <?php if("Tuesday"==$doctors->to_day) { echo "selected=selected";} ?> >Tuesday</option>
									<option value="Wednesday" <?php if("Wednesday"==$doctors->to_day) { echo "selected=selected";} ?> >Wednesday</option>
									<option value="Thursday" <?php if("Thursday"==$doctors->to_day) { echo "selected=selected";}?> >Thursday</option>
									<option value="Friday" <?php if("Friday"==$doctors->to_day) { echo "selected=selected";}?> >Friday</option>
									<option value="Saturday" <?php if("Saturday"==$doctors->to_day) { echo "selected=selected";} ?> >Saturday</option>
									<option value="Sunday" <?php if("Sunday"==$doctors->to_day) { echo "selected=selected";} ?> >Sunday</option>
									</select>
							  </div>
							</div>
							
							
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Consultation Fee <span class="required">*</span></label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="fees" name="fees" value="<?php  echo $doctors->fees; ?>"  placeholder="Plese enter consultation fee"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('fees'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="address" name="address" value="<?php  echo $doctors->address; ?>"  placeholder="Plese enter address" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('address'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Registration number </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="registration_no" name="registration_no" value="<?php  echo $doctors->registration_no; ?>"  placeholder="Plese enter registration no"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('registration_no'); ?></span>
							  </div>
							</div>
							
							 
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Old Prescription Valid for </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="old_prescription_valid" name="old_prescription_valid" value="<?php  echo $doctors->old_prescription_valid; ?>"  placeholder="Plese enter old prescription valid for"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('old_prescription_valid'); ?></span>
							  </div>
							</div> 
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <?php  if($doctors->images!=''){ ?>
							  <img src="<?php echo base_url().'uploads/doctors/'.$doctors->image; ?>" class="img-responsive"  width="50" height="50">
							  <?php }else{ ?>
							  <img src="<?php echo base_url('uploads/download.png'); ?>" width="50" height="50">
							  <?php }?>
								<input type="file" id="image" name="image" value="<?php  echo set_value('image'); ?>" class="form-control" >
								<span style="color:red;"><?php echo form_error('image'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Other Images</label>
									<div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 37px;">
										<?php if($doctor_images){ foreach($doctor_images as $dimg){?>
										<?php  if($dimg->images!=''){ ?>
											<img src="<?php echo base_url().'uploads/doctor_images/'.$dimg->images; ?>" width="50" height="50">
											<!--<a href="<?php echo base_url('admin/delete_drimg/'.$dimg->id.'/'.$dimg->doctor_id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure to want to delete this image?')">Delete</a>-->
										<?php }else{ ?>
										<img src="<?php echo base_url('uploads/download.png'); ?>" width="50" height="50">
										<?php }} }?>
										<input type="file"  name="images[]" class="form-control" >
									</div>
									<div class="form-group col-md-2" id="addmore" >
										<input type="button" id="add" value="Add Image" class="btn btn-success">
						            </div>
									<span style="color:red;"><?php echo form_error('images'); ?></span>
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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">	
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>js/select/select2.full.js"></script>
  <link href="<?php echo base_url(); ?>css/select/select2.min.css" rel="stylesheet">  
	<script>
	$(document).ready(function(){
            var i = 1;
            $('#add').click(function(){
                i++;
                $('#addmore').after('<br><div class="form-group"><div class="col-md-9 col-sm-6 col-xs-12 row'+i+'" style="padding-left: 268px;" ><input type="file"  name="images[]" class="form-control col-md-7 col-xs-12"></div><div class="form-group col-md-2" id="addmore" style="float:left;padding-left:0px;" ><input type="button" id="'+i+'" value="Delete" class="row'+i+' btn_remove btn btn-danger"></div></div>');
            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $(".row"+button_id+"").remove();
            });
        });
    

	$('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
    </script>
	<script>
   $(document).ready(function() {
      $(".select2_multiple").select2({
        placeholder: "Select Days",
        allowClear: true
      });
	  
	  $(".select2_multiplecat").select2({
        placeholder: "Select cat",
        allowClear: true
      });
	  
	    $(".select2_dayfrom").select2({
        placeholder: "Select Day From",
        allowClear: true
      });
	  
	  $(".select2_dayto").select2({
        placeholder: "Select Day To",
        allowClear: true
      });
    });
  </script>