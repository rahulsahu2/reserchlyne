<!DOCTYPE html>
<html lang="en">
<?php $info_data = $this->common_model->getsingle('home_info', array('id' => 1)); ?>
<?php
$user_id = $this->session->userdata('user_id');
$data['user'] = $user = $this->common_model->getAllwhere('users', array('user_id' => $user_id));

?>


<head>
    <meta charset="utf-8" />
    <title>
        <?php echo $title ? $title : "Researchlyne"; ?>
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Keywords" name="<?php echo $keywords; ?>" />
    <meta content="Description" name="<?php echo $description; ?>" />

    <!-- Favicon -->
    <!--<link href="img/favicon.ico" rel="icon" />-->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url(); ?>assets/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <?php if ($this->uri->segment(2) == 'razorPaySuccess') { ?>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-MJ100Y6Z0J"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());

            gtag('config', 'G-MJ100Y6Z0J');
        </script>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11140330228"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());

            gtag('config', 'AW-11140330228');
        </script>

    <?php } else { ?>


        <!-- Event snippet for Page View conversion page -->
        <script> gtag('event', 'conversion', { 'send_to': 'AW-11140330228/GWmpCNWNvdgYEPTlj8Ap' }); </script>


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
    <?php } ?>

<script>window.gtranslateSettings = {"default_language":"en","wrapper_selector":".gtranslate_wrapper"}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/dropdown.js" defer></script>

    <script type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ9JR8KZ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Google tag (gtag.js) --> <amp-analytics type="gtag" data-credentials="include">
        <script type="application/json"> { "vars": { "gtag_id": "AW-11140330228", "config": 
{ "AW-11140330228": { "groups": "default" } } }, "triggers": { } } </script>
    </amp-analytics>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow icon-color" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- top-bar1 start -->
    <!--<div class="container-fluid bg-dark p-0">-->
    <!--    <div class="row gx-0 d-none d-lg-flex">-->
    <!--        <div class="col-lg-12 py-2 text-center">-->
    <!--            <div class="h-100 d-inline-flex align-items-center px-3">-->
    <!--                <h5 class="text-white m-0">Invest in Midcaps at Throw Away Prices</h5>-->
    <!--            </div>-->

    <!--        </div>-->

    <!--    </div>-->
    <!--</div>-->
    <!-- top-bar1 end -->

    <!-- Topbar2 Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-lg-flex d-block" style="background-color: #00D684;color: #000">
            <div class="col-lg-7 px-5 py-2 text-lg-start text-center">
                <div class="h-100 d-inline-flex align-items-baseline border-start border-end px-3">
                    <small class="fa fa-phone-alt me-2"></small>
                    <small>
                        <a class="text-dark" href="tel:<?php echo $info_data->phone_no; ?>"><?php echo $info_data->phone_no; ?></a>
                    </small>
                </div>
                <div class="h-100 d-inline-flex align-items-baseline border-end px-3">
                    <small class="far fa-envelope me-2"></small>
                    <small>
                        <a class="text-dark" href="mailto:<?php echo strtolower($info_data->email); ?>"><?php echo strtolower($info_data->email); ?></a>
                        
                    </small>
                </div>
                <div class="h-100 d-inline-flex align-items-baseline border-end px-3">
                    <small class="far fa-clock me-2"></small>
                    <small>
                        <?php echo $info_data->timing; ?>
                    </small>
                </div>
            </div>

            <div class="col-lg-3 px-2 py-2 text-lg-end text-center">
                <div class="login">
                    <?php if ($this->session->userdata('user_id') != '') { ?>
                        <a href="<?php echo base_url('login/user_logout'); ?>" class="text-dark me-3"><i
                                class="fas fa-unlock-alt pe-2"></i>Log out</a>
                        <a href="<?php echo base_url(); ?>user/subscription" class="text-dark"><i
                                class="fas fa-user-shield pe-2"></i>Subscription</a>
                        <!-- <p><i class="fas fa-check-square"></i>SEBI Reg. No.: INH100010013.</p> -->
                        <h6>Welcome,&nbsp;
                            <?php echo $user[0]->name; ?>
                        </h6>

                    <?php } else { ?>
                        <a href="#" class="text-dark me-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                                class="fas fa-user-lock pe-2"></i>Log in</a>
                        <a href="<?php echo base_url(); ?>user/subscription" class="text-dark"><i
                                class="fas fa-user-shield pe-2"></i>Subscription</a>
                        <!-- <p><i class="fas fa-check-square"></i>SEBI Reg. No.: INH100010013.</p> -->

                    <?php } ?>
                    
                </div>
            </div>
            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 px-2 py-2 text-center">
                <div class="gtranslate_wrapper"></div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-0">

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body border-form mb-5 px-5">
                            <h3 class="text-center text-uppercase py-3">Login</h3>
                            <form action="<?php echo base_url('login/user_login'); ?>" method="post">
                                <div class="form-input text-start icon-form">
                                    <label for="email" class="label">Email</label>
                                    <input type="text" name="email" placeholder="Enter Email" class="w-100" required />

                                    <!-- <i class="fa fa-user like" aria-hidden="true"></i> -->


                                    <div class="form-input text-start icon-form mb-0">
                                        <label for="password" class="label">Password</label>
                                        <input type="password" id="password" name="password"
                                            placeholder="Enter Password" required class="w-100"><i
                                            class="fas fa-eye-slash" id="eye" aria-hidden="true"
                                            style="margin-left: 93%;"></i>
                                        <!-- <i class="fa fa-eye-alt like1" aria-hidden="true"></i> -->
                                    </div>
                                </div>
                                <div class="display-space-between m-0">


                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                    </div>
                                    <div>
                                        <a data-bs-dismiss="modal" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop1">Forget password</a>

                                    </div>
                                </div>
                                <div class="pt-5">
                                    <button type="submit" value="Log in">Log in</button>
                                    <!-- <input type="submit" name="submit" value="Log in"> -->
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-form mb-5 px-5">
                        <h3 class="text-center text-uppercase py-3">Forget password </h3>
                        <form action="<?php echo base_url('user/forget'); ?>" method="post">
                            <div class="form-input text-start icon-form">
                                <label for="email" class="label">Email</label>
                                <input type="text" name="email" placeholder="Enter Email" class="w-100" required />
                                <input type="hidden" name="url" value="<?php echo current_url(); ?>" />
                                <div class="pt-5">
                                    <button type="submit" value="Log in">Forget Password</button>
                                    <!-- <input type="submit" name="submit" value="Log in"> -->
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
        <a href="<?php echo base_url(); ?>" class="navbar-brand d-flex align-items-center">

            <img src="<?php echo base_url(); ?>assets/img/logo.png" class="img-fluid logo" alt="logo">

        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-3 py-lg-0">
                <?php if ($this->session->userdata('user_id') != '') { ?>
                    <a href="<?php echo base_url('user/index'); ?>"
                        class="<?= $this->uri->segment(2) == 'index' ? 'current-menu-item' : 'nav-item nav-link' ?>">Home
                    </a>
                    <a href="<?php echo base_url('user/login_detail'); ?>"
                        class="<?= $this->uri->segment(2) == 'login_detail' ? 'current-menu-item' : 'nav-item nav-link' ?>">NewsLetter</a>
                    <a href="<?php echo base_url('user/profile'); ?>"
                        class="<?= $this->uri->segment(2) == 'profile' ? 'current-menu-item' : 'nav-item nav-link' ?>">My
                        Profile</a>
                    <a href="<?php echo base_url('user/contact'); ?>"
                        class="<?= $this->uri->segment(2) == 'contact' ? 'current-menu-item' : 'nav-item nav-link' ?>">Contact
                        Us</a>
                <?php } else { ?>

                    <a href="<?php echo base_url('user/index'); ?>"
                        class="<?= $this->uri->segment(2) == 'index' ? 'current-menu-item' : 'nav-item nav-link' ?>">Home
                    </a>
                    <a href="<?php echo base_url('user/about'); ?>"
                        class="<?= $this->uri->segment(2) == 'about' ? 'current-menu-item' : 'nav-item nav-link' ?>">About
                        Us</a>
                    <a href="<?php echo base_url('user/subscription'); ?>"
                        class="<?= $this->uri->segment(2) == 'subscription' ? 'current-menu-item' : 'nav-item nav-link' ?>">Subscription</a>
                    <!--  <a href="<?php echo base_url('user/about'); ?>" class="nav-item nav-link">About Us</a> -->
                    <!--   <a href="<?php echo base_url('user/subscription'); ?>" class="nav-item nav-link">Subscription</a> -->
                    <a href="<?php echo base_url('user/why_choose'); ?>"
                        class="<?= $this->uri->segment(2) == 'why_choose' ? 'current-menu-item' : 'nav-item nav-link' ?>">Why
                        Researchlyne.com</a>
                    <a href="<?php echo base_url('user/faq'); ?>"
                        class="<?= $this->uri->segment(2) == 'faq' ? 'current-menu-item' : 'nav-item nav-link' ?>">Faq's</a>
                    <a href="<?php echo base_url('user/contact'); ?>"
                        class="<?= $this->uri->segment(2) == 'contact' ? 'current-menu-item' : 'nav-item nav-link' ?>">Contact
                        Us</a>
                <?php } ?>
                <!-- <a href="<?php echo base_url('user/why_choose'); ?>" class="nav-item nav-link">Why Amiteshwar.in</a> -->
                <!--        <a href="<?php echo base_url('user/faq'); ?>" class="nav-item nav-link">Faq</a> -->
                <!-- <a href="<?php echo base_url('user/contact'); ?>" class="nav-item nav-link">Contact Us</a> -->
            </div>
        </div>
    </nav>

    <div class="floating-icon">
        <a href="https://wa.me/917973835409" class="floating-icon-box" target="_blank">
            <img src="<?php echo base_url('assets/images/whatsappicon.png') ?>">
        </a>
    </div>

    <!-- Navbar End -->
    <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success" id="success-alert"> <button type="button" class="close"
                data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger" id="success-alert"> <button type="button" class="close"
                data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        $(function () {

            $('#eye').click(function () {

                if ($(this).hasClass('fa-eye-slash')) {

                    $(this).removeClass('fa-eye-slash');

                    $(this).addClass('fa-eye');

                    $('#password').attr('type', 'text');

                } else {

                    $(this).removeClass('fa-eye');

                    $(this).addClass('fa-eye-slash');

                    $('#password').attr('type', 'password');
                }
            });
        });
    </script>
    <style type="text/css">
        /* rahul */

        a.floating-icon-box {
            position: fixed;
            z-index: 999999999999;
            opacity: 1;
            animation-delay: .15s;
            animation-duration: 1s;
            animation-fill-mode: both;
            bottom: 20px;
            left: 20px;
            /*right: 24px;*/
            background: #fff;
            border-radius: 50%;
            color: #0466c0;
            font-size: 30px;
            font-weight: 700;
        }

        a.floating-icon-box img {
            width: 60px;
        }
    </style>