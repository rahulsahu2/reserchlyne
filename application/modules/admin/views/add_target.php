       <!-- page content -->
       <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Add Fast Target</h3>
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
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Name 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="title" name="title" value=""  placeholder="Plese enter Stock Name"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('title'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Recommended Price  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input step="any" id="rec_price" name="rec_price" value=""  placeholder="Plese enter Recommended Price "   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('rec_price'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Recommended Price Date  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="date" id="rec_date" name="rec_date" value=""  placeholder="Plese enter Recommended Price Date "   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('rec_date'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">High Price  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input step="any" id="high_price" name="high_price" value="" onkeydown="priceFunction();" placeholder="Plese enter High Price"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('high_price'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">High Price Date 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="date" id="high_date" name="high_date" value="" onmousedown="dateFunction();" placeholder="Plese enter High Price Date"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('high_date'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Percentange  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="final_price" name="final_price" readonly value=""  placeholder="Plese enter Percentange"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('final_price'); ?></span>
							  </div>
							</div>
								<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Expire Week 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="final_date" name="final_date" readonly value=""  placeholder="Plese enter Expire Week"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('final_date'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Logo
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" name="image"  id="image"  value=""  placeholder="Plese upload image" class="form-control col-md-7 col-xs-12" >
								
								<span style="color:red;"><?php echo form_error('image'); ?></span>


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
              <script type="text/javascript">

function priceFunction() {
 var P2 = document.getElementById("rec_price").value;

var P1 = document.getElementById("high_price").value;

 var sum= ( ( P1 - P2) / P2 ) * 100
 var fixedNum = sum.toFixed(2);

document.getElementById("final_price").value=fixedNum;
// //  console.log(sum); 



}
 function dateFunction() {

var date1 =  document.getElementById("rec_date").value;
var date2 = document.getElementById("high_date").value;
var date11 = new Date(date1);  
 var date22 = new Date(date2);  

// To calculate the time difference of two dates
var Difference_In_Time = date22.getTime() - date11.getTime();
//  console.log(Difference_In_Time);
// To calculate the no. of days between two dates
var Difference_In_Days = Difference_In_Time / (1000 * 60 * 60 * 24);
// console.log(Difference_In_Days);
var weeks = Math.floor(Difference_In_Days / 7);
document.getElementById("final_date").value=weeks;
console.log(weeks);



}


</script> 

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
  