<style>
.pagination {
  display: inline-block;
  margin: 10px 0 10px 0px;
}
.pagination li {
 float: left;
  list-style: none;
  text-decoration: none;
  transition: background-color .3s;
}
.pagination li a {
  color: black;  
  padding: 9px 16px;  
  border: 1px solid #ddd;
  text-decoration:none;
}
.pagination>li>span {
   position: relative;
    float: none;
    padding: 9px 15px 7px 15px;
    margin-left: -1px;
    line-height: normal;
    color: #fff;
    text-decoration: none;
    background-color: #337ab7;
    border: 1px solid #337ab7;
}
.pagination li a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}
.pagination li a:hover:not(.active) {background-color: #ddd;}
</style>
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
                <div class="x_title">
                  <h2>Investor complaints List<small></small></h2>
                  <a href="<?php echo base_url('admin/add_complaints_title'); ?>" class="btn btn-success pull-right">Add New  complaints title</a>
					<a href="<?php echo base_url('admin/add_complaints'); ?>" class="btn btn-success pull-right">Add New investor complaints</a>
                  <div class="clearfix"></div>
                </div>
                <!-- <div class="tab">
  <button class="tablinks" id="defaultOpen" onclick="openComplaints(event, 'complaints')">Number of complaints</button>
  <button class="tablinks" onclick="openComplaints(event, 'month')">Number of Month complaints </button>
  <button class="tablinks" onclick="openComplaints(event, 'year')">Number of year complaints</button>
</div> -->
<!-- 
<div id="complaints" class="tabcontent"> -->
  <div class="x_content">                  
    <table id="datatable1" class="table table-striped table-bordered">
      <thead>
        <tr>                       
<th width="2%">RECEIVED FROM</th>
<th width="5%" >PENDING</th>
<th width="5%" >RECEIVED</th>
<th width="5%" >RESOLVED</th>
<th width="5%" >TOTAL PENDING</th>
<th width="5%" >PENDING COMPLAINTS</th>
<th width="5%" >AVERAGE TIME</th>

<th width="7%" >Action</th>
        </tr>
      </thead>
      <tbody>
<?php if($records){ ?>
<?php foreach($records as $rec){ ?>
        <tr>
<td><?php echo $rec->received_form; ?></td>                        
          <td><?php echo $rec->pending_c; ?></td>
<td><?php echo $rec->received_c; ?></td>
<td><?php echo $rec->resolved_c; ?></td>
<td><?php echo $rec->total_pending; ?></td>
<td><?php echo $rec->pending_complains; ?></td>
<td><?php echo $rec->average_time; ?></td>
                
<!-- <td><?php if($rec->id==0){ ?>
<!-- <div class="btn btn-danger btn-xs">Deactive</div> -->
<?php }else{ ?>
<div class="btn btn-success btn-xs">Active</div>
<?php } ?>
</td> -->
<td>

<a title="monthly complaints"  href="<?php echo base_url('admin/show_complaints/monthly/'.$rec->id); ?>"   <title><link type="fa fa-pencil" href="fa fa-pencil"><b>Monthly</b></title></a>
<a title="yearly complaints"  href="<?php echo base_url('admin/show_complaints/yearly/'.$rec->id); ?>"   <title><link type="fa fa-pencil" href="fa fa-pencil"><b>Yearly</b></title></a>
<a title="Edit"  href="<?php echo base_url('admin/edit_complaints/'.$rec->id); ?>"  class="btn btn-primary btn-xs" > <i class="fa fa-pencil"></i> </i></a>
<a title="Delete"  onclick="return confirm('Are you sure you want to delete this complaints?');" href="<?php echo base_url('admin/delete_investor_complaints/'.$rec->id); ?>"  class="btn btn-danger btn-xs" > <i class="fa fa-trash"></i></a>



</td>
    
        </tr>	
<?php  } ?>
<?php } ?>
      </tbody>
    </table>

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
  
          