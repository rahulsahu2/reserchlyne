<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>The Hello Doctor</title>
  <link rel="shortcut icon" type="image/jpg" href="<?php echo base_url('images/1.jpg');?>"/>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/animate.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="<?php echo base_url(); ?>css/icheck/flat/green.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/floatexamples.css" rel="stylesheet" />
  <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  <link href="<?php echo base_url(); ?>css/select/select2.min.css" rel="stylesheet">
  
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MJ100Y6Z0J"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MJ100Y6Z0J');
</script>
  
 <!-- Google tag (gtag.js) -->  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11140330228"></script> 
  <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-11140330228'); </script> 
  
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TJ9JR8KZ');</script>
<!-- End Google Tag Manager -->

</head>

<body class="nav-md">

  <div class="container body">

    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <!--<a href="<?php echo base_url('admin'); ?>" class="site_title"> <span>Hello Doctor</span></a>-->
			 <a href="<?php echo base_url('admin'); ?>" class="site_title" style="line-height:102px;height:86px;padding-left:22px;"> <img src="<?php echo base_url('images/1.jpg');?>" height="80px" width="180px"></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile" style="padding-top: 22px;">
            <div class="profile_pic">
              <img src="<?php echo base_url(); ?>images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $this->session->userdata('user_name'); ?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
 </br> </br>
            <div class="menu_section">
              <h3></h3>
			  </br>
              <ul class="nav side-menu">
                 <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('Dashboard'); ?>">Dashboard</a>
                    </li>                   
                  </ul>
                </li>
				
				<li><a><i class="fa fa-list-alt"></i> Bookings <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
					  <li><a href="<?php echo base_url('dashboard/appointment_booking_list'); ?>">Appointment List</a>
					  <li><a href="<?php echo base_url('dashboard/test_booking_list'); ?>">Test List</a>
                    </li>                   
                  </ul>
                </li>
				
              </ul>
            </div>
          </div>
          
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo base_url(); ?>images/img.jpg" alt=""><?php echo $this->session->userdata('user_name'); ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                 <li><a href="<?php echo base_url('admin/change_password'); ?>">  Change Password</a></li>
                  <li><a href="<?php echo base_url('dashboard/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>
      <!-- /to












      p navigation -->
