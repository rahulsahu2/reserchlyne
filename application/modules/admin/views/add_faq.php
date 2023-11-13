
       <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Add FAQ  Content</h3>
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
						<form id="demo-form2" action="<?php echo base_url('admin/faq_content') ; ?>" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

					

 
                          <div class="input-group control-group after-add-more">  
                        <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question<span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="question" name="question[]" value=""  placeholder="Plese enter Question" required="required" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('question'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Answer<span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="answer" name="answer[]" value=""  placeholder="Plese enter Answer" required="required" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('answer'); ?></span>
							  </div>
							</div>
                      <div class="input-group-btn">   
                  <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>  
               </div>  
                 </div>
                   <div class="ln_solid"></div>
							<div class="form-group">
							  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="btn btn-success">Submit</button>
							  </div>
							</div>
                  

						</form>
						<div class="copy hide">  
                   <div class="control-group input-group" >  
                        <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question<span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="question" name="question[]" value=""  placeholder="Plese enter Question" required="required" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('question'); ?></span>
							  </div>
							</div> 
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Answer<span class="required">*</span>
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="answer" name="answer[]" value=""  placeholder="Plese enter Answer" required="required" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('answer'); ?></span>
							  </div>
							</div>
            <div class="input-group-btn">   
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>  
            </div>  
          </div>  
        </div>  

  
  

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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script type="text/javascript">  
  
    $(document).ready(function() {  
  
      $(".add-more").click(function(){   
          var html = $(".copy").html();  
          $(".after-add-more").after(html);  
      });  
  
      $("body").on("click",".remove",function(){   
          $(this).parents(".control-group").remove();  
      });  
  
    });  
  
</script>  