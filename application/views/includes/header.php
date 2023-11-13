<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Researchlyne</title>
  <link rel="shortcut icon" type="image/jpg" href="<?php echo base_url('assets/img/Logo.png'); ?>" />
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
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11140330228"></script>
  <script> window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'AW-11140330228'); </script>



  <!-- Google Tag Manager -->
  <script>(function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start':
          new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TJ9JR8KZ');</script>
  <!-- End Google Tag Manager -->

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-MJ100Y6Z0J"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-MJ100Y6Z0J');
  </script>
</head>

<body class="nav-md">

  <div class="container body">

    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">

            <a href="<?php echo base_url('admin'); ?>" class="site_title"
              style="line-height:102px;height:86px;padding-left:22px;"> <img
                src="<?php echo base_url('assets/img/logo.png'); ?>" height="80px" width="180px"></a>
          </div>
          <br><br>
          <div class="clearfix"></div>

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3></h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('admin'); ?>">Dashboard</a>

                    </li>
                  </ul>
                </li>

                <li><a><i class="fa fa-list-alt"></i> Subscription <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('admin/add_subscription'); ?>">Add Subscription</a>
                    <li><a href="<?php echo base_url('admin/subscription_list'); ?>">Subscription List</a>
                    </li>
                    <li><a href="<?php echo base_url('admin/subscription_benefits'); ?>">Subscription Benefits</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-list-alt"></i> Other Info <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('admin/add_home_info'); ?>">Edit Home Info</a>
                    <li><a href="<?php echo base_url('admin/add_page_banners'); ?>">Edit Page Banners</a>
                    <li><a href="<?php echo base_url('admin/add_page_content'); ?>">Edit Page Content</a>
                    <li><a href="<?php echo base_url('admin/faq_info'); ?>">FAQ Content</a>
                    <li><a href="<?php echo base_url('admin/login_content'); ?>">Login Content</a>
                    <li><a href="<?php echo base_url('admin/news_list'); ?>">News Letter Content</a>
                    <li><a href="<?php echo base_url('admin/fast_target'); ?>">Fast Target Content</a>
                    <li><a href="<?php echo base_url('admin/star_list'); ?>">Star Performance Content</a>
                    <li><a href="<?php echo base_url('admin/add_investor_charter'); ?>"> Investor Charter</a>
                    <li><a href="<?php echo base_url('admin/add_investor_complaints'); ?>"> Investor Complaints List</a>
                    <li><a href="<?php echo base_url('admin/contact_us'); ?>">Contact Us Content</a>
                    <li><a href="<?php echo base_url('admin/other_setting'); ?>">Other Setting</a>
                    </li>
                  </ul>
                </li>


                <li><a><i class="fa fa-list-alt"></i>User Content<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?php echo base_url('admin/user_details'); ?>">User Login Details</a>
                    <li><a href="<?php echo base_url('admin/all_users'); ?>">ALL User List</a>
                    <li><a href="<?php echo base_url('admin/expire_list'); ?>">Expire User List</a>
                    <li><a href="<?php echo base_url('admin/extend_list'); ?>">Extend User List</a>
                    <li><a href="<?php echo base_url('admin/non_renewal_list'); ?>">Non-Renewal User List</a>
                    <li><a href="<?php echo base_url('admin/renew_list'); ?>">Renew User List</a>

                    </li>
                  </ul>
                </li>

                <li>
                  <a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                  <li><a href="<?php echo base_url('admin/create_user_subscription'); ?>">Create User Subscriptions</a>					
                  <li><a href="<?php echo base_url('admin/all_users_list'); ?>">All Users List</a>					
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
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                  aria-expanded="false">
                  <img src="<?php echo base_url(); ?>images/img.jpg" alt="">Admin
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="<?php echo base_url('admin/change_password'); ?>"> Change Password</a></li>
                  <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log
                      Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>