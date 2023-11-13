		<!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Add New Doctor</h3>
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
							  <select id="category_id" name="category_id" onchange="getsubcategory();" class="form-control col-md-7 col-xs-12">
									<option value="" >Select Category </option>
									<?php if($categories){ ?>
									<?php foreach($categories as $cat){ ?>
									<option value="<?php echo $cat->id; ?>" <?php if(set_value('category_id')==$cat->id){ echo "selected"; } ?> >
									<?php echo $cat->category_name; ?> </option>
									<?php } ?>
									<?php } ?>
									</select>
								<span style="color:red;"><?php echo form_error('category_id'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Doctor Name <span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="name" name="name" value="<?php  echo set_value('name'); ?>"  placeholder="Plese enter name"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('name'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact No <span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="contact" name="contact" value="<?php  echo set_value('contact'); ?>"  placeholder="Plese enter contact number"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('contact'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Degree <span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="degree" name="degree" value="<?php  echo set_value('degree'); ?>"  placeholder="Plese enter degree" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('degree'); ?></span>
							  </div>
							</div>

							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Experience Starting from<span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="date" id="start_experience" name="start_experience" value="<?php  echo set_value('start_experience'); ?>"  placeholder="Plese enter experience " class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('start_experience'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Timing <span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="timing" name="timing" value="<?php  echo set_value('timing'); ?>"  placeholder="Plese enter timing (ex 10:00-5:00 pm)"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('timing'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address <span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="address" name="address" value="<?php  echo set_value('address'); ?>"  placeholder="Plese enter address" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('address'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image <span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" id="image" name="image" value="<?php  echo set_value('image'); ?>" class="form-control" >
								<span style="color:red;"><?php echo form_error('image'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12">Other Images</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file"  name="images[]" class="form-control" ><br>
									<div class="form-group col-md-2" id="addmore" ><br>
							        <input type="button" id="add" value="Add Image" class="btn btn-success">
						            </div>
									<span style="color:red;"><?php echo form_error('images'); ?></span>
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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
            var i = 1;
            $('#add').click(function(){
                i++;
                $('#addmore').after('<br><div class="form-group"><div class="col-md-8 col-sm-6 col-xs-12 row'+i+'" style="padding-left: 0px;"><input type="file"  name="images[]" class="form-control col-md-7 col-xs-12"></div><div class="form-group col-md-2" id="addmore" style="float:right;padding-left:0px;" ><input type="button" id="'+i+'" value="Delete" class="row'+i+' btn_remove btn btn-danger"></div></div>');
            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $(".row"+button_id+"").remove();
            });
        });
    </script>