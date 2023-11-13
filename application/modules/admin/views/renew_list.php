<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <title><?php echo $title; ?> </title>

  <!-- Bootstrap core CSS -->

  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/icheck/flat/green.css" rel="stylesheet">

  <link href="<?php echo base_url(); ?>js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url(); ?>js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

  <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>


</head>
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
<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <?php //$this->load->view('includes/sidebar'); ?>
    
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
                  <h2>Renew User List <small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">                  
                  <table id="datatable1" class="table table-striped table-bordered">
                    <thead>
                      <tr>                       
						<th width="2%">Sno.</th>
						<th width="2%">Name</th>
						<th width="10%" >Email</th>
						<th width="10%" >Phone</th>												<th width="10%" >Duration</th>												<th width="10%" >Subscription Plan</th>
						<th width="10%" >Amount</th>
						<th width="13%" >Subscription Date</th>
                      </tr>
                    </thead>
                    <tbody>
            <?php if($user){
            $sno=1; ?>
            <?php foreach($user as $value){ 			$subs = $this->common_model->getsingle('subscription_plan',array('id'=>$value->subscription_id));			?> 
            <tr>
				<td><?php echo $sno; ?></td>                        
				<td><?php echo $value->name; ?></td>
				<td><?php echo $value->email; ?></td>
				<td><?php echo $value->phone; ?></td>
				<td><?php echo $subs->title; ?></td>				  				<td><?php echo $subs->duration; ?></td>
				<td><?php echo $value->amount; ?></td>				<td><?php echo date('d-m-Y',strtotime($value->date)); ?></td>
			   <!-- <td>
				  <a title="Delete"  onclick="return confirm('Are you sure you want to delete this User?');" href="<?php echo base_url('admin/delete_user/'.$value->user_id); ?>"  class="btn btn-danger btn-xs" > <i class="fa fa-trash"></i></a>
					 <?php if($value->s_status==0){ ?>
				  <a title="Enable" onclick="return confirm('Are you sure you want to extend?');" href="<?php echo base_url('admin/news_status/'.$value->user_id.'/2'); ?>"  class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
				<?php }else{ ?>
				  <a title="Disable" onclick="return confirm('Are you sure you want to extend?');" href="<?php echo base_url('admin/news_status/'.$value->user_id.'/0'); ?>"  class="btn btn-success btn-xs" ><i class="fa fa-check"></i></a>
				<?php } ?>  
				</td>-->			</tr> 
              <?php $sno++; } ?> 
            <?php } ?>   
                    </tbody>
                  </table>
          
                </div>
        </br>
           <?php if (isset($links)) { ?> 
            <nav class="" aria-label="Page navigation example">
             <?php echo $links ?>  
            </nav>
         <?php } ?>  
        
              </div>
            </div>
      
      </div>
        
              </div>

              <!-- footer content       
             <!-- <?php //$this->load->view('includes/footer'); ?>       -->
              <!-- /footer content -->

            </div>
            <!-- /page content -->
          </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
          <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
          </ul>
          <div class="clearfix"></div>
          <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="<?php echo base_url(); ?>js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="<?php echo base_url(); ?>js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="<?php echo base_url(); ?>js/icheck/icheck.min.js"></script>

        <script src="<?php echo base_url(); ?>js/custom.js"></script>


        <!-- Datatables -->
        <!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
  <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->
        <script src="<?php echo base_url(); ?>js/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="<?php echo base_url(); ?>js/pace/pace.min.js"></script>
        
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable1').dataTable({
        "searching": false,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
      });
      
           
          });
          
        </script>
</body>

</html>
