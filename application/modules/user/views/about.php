b<?php $info_data= $this->common_model->getsingle('home_info', array('id'=>1)); ?>
<style>
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .65), rgba(0, 0, 0, .65)), url(<?php echo base_url();?>assets/img/aboutus3.jpeg) center center no-repeat;
	background-size: cover;
}
.greenclr {
   
   color: #00d684;
}
.title{
    -webkit-text-fill-color: transparent;
    background: -webkit-linear-gradient(left,#1bc7a7 25%,#006aff);
    -webkit-background-clip: text;
    color: #36afc4;
}
</style>
       <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="<?php echo base_url('user/index');?>">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item">
                        <a class="text-white" href="#">Pages</a>
                    </li> -->
                    <li class="breadcrumb-item icon-color active" aria-current="page">
                        About
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
     <div class="container-xxl py-5">
      <div class="container">
        <div class="row gy-4 g-lg-5 align-items-center">
            <!--<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="position-relative overflow-hidden morden" style="min-height: 400px">
                  <img class="position-absolute w-100 h-100" src="<?php echo base_url();?>assets/img/<?php echo $info_data->aboutus_side_img;?>" alt="" style="object-fit: cover">
                  
                </div>
              </div>-->
          <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
            <div class="h-100">
              <div class="border-start border-5 border-color ps-4 mb-5">
                <h6 class="mb-2  text-body">About Us</h6>
                <h1 class=" mb-0">
                  <span class="title"><?php echo $info_data->aboutus_title; ?></span>
                </h1>
              </div>
              <p class="">
                <?php echo $info_data->aboutus_content; ?>
              </p>
              <div class="border-top mt-4 pt-4">
                <div class="row g-4">
                  <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <i class="fa fa-check fa-2x icon-color flex-shrink-0 me-3"></i>
                    <h6 class="mb-0">Quality Stocks</h6>
                  </div>
                  <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                    <i class="fa fa-check fa-2x icon-color flex-shrink-0 me-3"></i>
                    <h6 class="mb-0">24/7 Research</h6>
                  </div>
                  <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <i class="fa fa-check fa-2x icon-color flex-shrink-0 me-3"></i>
                    <h6 class="mb-0">Genuine Service</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->
    
    <!--service offerd start-->
    <section class="offer">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-center"><span class="title">Services offered</span></h2>
                <p class="text-center pt-3"><?php echo $info_data->service_content; ?></p>
            </div>
        </div>
    </div>
</section>
    <!--service offerd end-->
    

    <!-- who we are Start -->

    <section class="who-we-are">
        <div class="container">
            <h2 class="text-center text-capitalize"><span class="title">What makes us your best choice.</span></h2>
            <!--<p class="text-center mb-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>-->
            <div class="row pt-5 g-lg-5 what-do justify-content-center">
                <div class=" col-lg-4 col-md-6 col-12 d-flex wow fadeInUp" data-wow-delay="0.1s">
                    <div class="heading">
                        <h5 class="text-center text-uppercase"> <?php echo $info_data->make1_title; ?></h5>
                        <p class="text-center"> <?php echo $info_data->make1_info; ?></p>
                    </div>
                </div>
                <div class=" col-lg-4 col-md-6 col-12 d-flex wow fadeInUp" data-wow-delay="0.3s">
                    <div class="heading">
                        <h5 class="text-center text-uppercase"> <?php echo $info_data->make2_title; ?></h5>
                        <p class="text-center"> <?php echo $info_data->make2_info; ?></p>
                    </div>
                </div>
                <div class=" col-lg-4 col-md-6 col-12 d-flex wow fadeInUp" data-wow-delay="0.1s">
                    <div class="heading">
                        <h5 class="text-center text-uppercase"> <?php echo $info_data->make3_title; ?></h5>
                        <p class="text-center"> <?php echo $info_data->make3_info; ?></p>
                    </div>
                </div>
                <div class=" col-lg-4 col-md-6 col-12 d-flex wow fadeInUp" data-wow-delay="0.3s">
                    <div class="heading">
                        <h5 class="text-center text-uppercase"> <?php echo $info_data->make4_title; ?></h5>
                        <p class="text-center"> <?php echo $info_data->make4_info; ?></p>
                    </div>
                </div>
                <div class=" col-lg-4 col-md-6 col-12 d-flex wow fadeInUp" data-wow-delay="0.3s">
                    <div class="heading">
                        <h5 class="text-center text-uppercase"> <?php echo $info_data->make5_title; ?></h5>
                        <p class="text-center"> <?php echo $info_data->make5_info; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- who we are end -->
