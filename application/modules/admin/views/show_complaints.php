
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    
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
                <!-- <div class="x_title">
                  <h2>Investor complaints List<small></small></h2>
                  <a href="<?php echo base_url('admin/add_complaints_title'); ?>" class="btn btn-success pull-right">Add New  complaints title</a>
					<a href="<?php echo base_url('admin/add_complaints'); ?>" class="btn btn-success pull-right">Add New investor complaints</a>
                  <div class="clearfix"></div>
                </div> -->
                <!-- <div class="tab">
  <button class="tablinks" id="defaultOpen" onclick="openComplaints(event, 'complaints')">Number of complaints</button>
  <button class="tablinks" onclick="openComplaints(event, 'month')">Number of Month complaints </button>
  <button class="tablinks" onclick="openComplaints(event, 'year')">Number of year complaints</button>
</div> -->
<!-- 
<div id="complaints" class="tabcontent"> -->
  <div class="x_content">  
                    
<?php
  // print_r($records) ;
  if($filter == "monthly"){ 
  ?>
  <table id="datatable1" class="table table-striped table-bordered">
                    <thead>
                      <tr>                       
						<th width="2%">SR NO.</th>
                        <th width="10%" >MONTH</th>
						<th width="10%" >PREVIOUS MONTH</th>
						<th width="10%" >RECEIVED</th>
						<th width="10%" >RESOLVED</th>
						<th width="10%" >PENDING </th>
					 
                      </tr>
                    </thead>
                    <tbody>
					  <?php if($records){  

              
                        ?>
					
                      <tr>
						<td><?php echo $records->sr_no_m; ?></td>                        
                        <td><?php echo $records->month; ?></td>
						<td><?php echo $records->previous_month; ?></td>
						<td><?php echo $records->received_m; ?></td>
						<td><?php echo $records->resolved_m; ?></td>
						<td><?php echo $records->pending_m; ?></td>
            <!-- <td><?php echo $records->average_time; ?></td> -->
						                  
						
						
                  
                      </tr>	
					  <?php  } ?>
					 
                    </tbody>
                  </table>

              <?php }else{ ?> 

                  <table id="datatable2" class="table table-striped table-bordered">
                    <thead>
                      <tr>                       
                      <th width="2%">SR NO.</th>
            <th width="10%" >YEAR</th>
						<th width="10%" >CARRIED FORWARD</th>
						<th width="10%" >RECEIVED</th>
						<th width="10%" >RESOLVED</th>
						<th width="10%" >PENDING </th>
					
                      </tr>
                     
                    </thead>
                    <tbody>
					  <?php if($records){ ?>
					 
                      <tr>
						<td><?php echo $records->sr_no_y; ?></td>                        
                        <td><?php echo $records->year; ?></td>
						<td><?php echo $records->carried_forward; ?></td>
						<td><?php echo $records->received_y; ?></td>
						<td><?php echo $records->resolved_y; ?></td>
						<td><?php echo $records->pending_y; ?></td>
            <!-- <td><?php echo $records->average_time; ?></td> -->
						                  
						<!-- <td><?php if($rec->id==0){ ?>
							<div class="btn btn-danger btn-xs">Deactive</div>
							<?php }else{ ?>
							<div class="btn btn-success btn-xs">Active</div>
							<?php } ?>
						</td>
						<td>
							<a title="Edit"  href="<?php echo base_url('admin/edit_subscription/'.$rec->id); ?>"  class="btn btn-primary btn-xs" > <i class="fa fa-pencil"></i> </i></a>
							<a title="Delete"  onclick="return confirm('Are you sure you want to delete this subscription?');" href="<?php echo base_url('admin/delete_subscription/'.$rec->id); ?>"  class="btn btn-danger btn-xs" > <i class="fa fa-trash"></i></a>
							
						<?php if($rec->status==1){ ?>
							<a title="Enable" onclick="return confirm('Are you sure you want to deactive this subscription?');" href="<?php echo base_url('admin/subscription_status/'.$rec->id.'/0'); ?>"  class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
						<?php }else{ ?>
							<a title="Disable" onclick="return confirm('Are you sure you want to active this subscription?');" href="<?php echo base_url('admin/subscription_status/'.$rec->id.'/1'); ?>"  class="btn btn-success btn-xs" ><i class="fa fa-check"></i></a>
						<?php } ?>
						
						</td> -->
                  
                      </tr>	
					  
					  <?php } ?>
                    </tbody>
                  </table>

                  <?php } ?> 
                  
                  <div class="x_title">
             
                  <a href="<?php echo base_url('admin/add_investor_complaints'); ?>" class="btn btn-success pull-right">investor complaints</a>
					
                  <div class="clearfix"></div>
                </div>

				  

  </div>
</div>







				</br>
					<!-- <?php if (isset($links)) { ?>
						<nav class="" aria-label="Page navigation example">
						<?php echo $links ?>
						</nav>
					<?php } ?>	 -->
				
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
  
          
          