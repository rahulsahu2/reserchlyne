<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?php echo $title; ?> </title>
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/animate.min.css" rel="stylesheet">
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
      <?php if($this->session->flashdata('msg')!=''){ ?>

         <div class="alert alert-success alert-dismissible fade in" role="alert">

          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>

          </button>

          <?php echo $this->session->flashdata('msg'); ?>

        </div>

      <?php } ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>All User List <small></small></h2>
           
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">                  
                  <table id="datatable1" class="table table-striped table-bordered">
                    <thead>
                      <tr>                       
						<th width="2%">Sno.</th>
						<th width="10%">Name</th>
						<th width="10%" >Email</th>
						<th width="10%" >Phone</th>
						<th width="30%" >Address</th>
						<th width="10%" >Action</th>
                      </tr>
                    </thead>
                    <tbody>
            <?php if($user){
            $sno=1; ?>
            <?php foreach($user as $value){ ?> 
			<tr>
				<td><?php echo $sno; ?></td>                        
				<td><?php echo $value->name; ?></td>
				<td><?php echo $value->email; ?></td>
				<td><?php echo $value->phone; ?></td>
				<td><?php echo $value->address; ?></td> 
				<td>
					<a title="Disable" href="#"  data-toggle="modal" data-target="#myModal<?=$value->user_id?>" class="btn btn-success btn-xs" >Extend</a>
					<a title="Delete"  onclick="return confirm('Are you sure you want to delete this User?');" href="<?php echo base_url('admin/delete_users/'.$value->user_id); ?>"  class="btn btn-danger btn-xs" > <i class="fa fa-trash"></i></a>
				</td>  
            </tr> 
			
			<div class="modal fade" id="myModal<?=$value->user_id?>" role="dialog">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">Extend Days</h4>
							</div>
							<div class="modal-body">
							<form role="form" action="<?php echo base_url('admin/extend_subscription/'.$value->user_id.'/2'); ?>"  method="post">
							  <div class="col-md-12 ">
							  <label>Days</label>
								<input type="number" id="e_days" name="e_days" placeholder="Plese enter days" class="form-control col-md-7 col-xs-12" >
							  </div>
							</div>
							<div class="modal-footer">
							<button type="submit" class="btn btn-success">Submit</button>
							  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
							</form>
						  </div>
						</div>
					  </div>
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
