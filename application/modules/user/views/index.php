<style>
    th {
    padding: 20px 15px;
    text-align: left;
    font-weight: 500;
    font-size: 12px;
    color: #fff;
    text-transform: uppercase;
    background: #33d3d94d;
}

td {
    padding: 15px;
    text-align: left;
    vertical-align: middle;
    font-weight: 300;
    font-size: 13px;
    color: #fff;
    border-bottom: solid 1px rgb(0 0 0 / 10%) !important;
    text-align: center;
}

.front.face img {
    width: 118px;
    margin: auto;
    margin: 0px;
    margin-top: -10px;
}

/* .weakly {
    display: flex;
    gap: 8px;
} */

.front {
    border: 2px solid #9c9c9c;
    
}

.iamge-path {
    width: 100%;
    
    display: flex;
    
}

.iamge-path p {
    
    width: 100%;
    padding: 10px;
    
    margin-bottom: 0;
}

.front.face h4{
    border-top: 2px solid #9c9c9c;
}
.display-4 {
    font-size: 2.5rem;
}

.greenclr {
     color: #00d684;
}
.inputclr{
     color: #fff!important;
}

.carousel-caption {

    background: rgb(51 133 217 / 0%);
   
}
.title {
    -webkit-text-fill-color: transparent;
    background: -webkit-linear-gradient(left,#1bc7a7 25%,#006aff);
    -webkit-background-clip: text;
    color: #36afc4;
}
</style>

<?php $info_data = $this->common_model->getsingle('home_info', array('id' => 1)); ?>   

            <?php if ($errors != '') { ?><div>
                    <span style="color:red;padding-left: 36%;"><?php echo $errors; ?></span>
                 </div>
            <?php } ?>
   <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                     <img class="w-100" src="<?php echo base_url(); ?>assets/img/<?php echo $info_data->banner_image; ?>" class="img-fluid" alt="Image" />
                    <!-- <img class="w-100" src="<?php echo base_url(); ?>/assets/img/homepagebannerfirstone.jpeg" class="img-fluid" alt="Image" /> -->
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-10 button-banner">
                                    <h1 class="text-light text-uppercase mb-3 animated slideInDown" style="color:#426235!important;">
                                        Welcome to Researchlyne.com
                                    </h1>
                                    <h1 class="display-4 text-light mb-3 animated slideInDown" style="color:#426235!important;">
                                        <?php echo $info_data->banner_content; ?>
                                        
                                    </h1>
                                     <div class="banner-btn">
                                    <a href="<?php echo base_url('user/about'); ?>" class="btn same-color text-white py-3 px-5">About Us</a
                    >
                    <a href="<?php echo base_url('user/subscription'); ?>" class="btn same-color subs-btn text-white py-3 px-5 ms-3">Subscribe</a
                      >
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        
      </div>
    </div>
    <!-- Carousel End -->
 
                <section>
                    <div class="container-xxl py-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3 class="m-0 market" style="color:#006afd;">  <span class="title"><?php echo $info_data->marquee_title; ?></span></h3>
                                </div>
                                <div class="col-md-8 greenclr">
                                    <marquee>
                                    <?php echo $info_data->marquee_content; ?>
                                    </marquee>
                                </div>
                            </div>
                 <!--marquee end -->
                        </div>
                    </div>
                                           </section>
                

                

    </div>
    <!-- Features End -->




    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row  align-items-center">
           <!-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="position-relative overflow-hidden morden" style="min-height: 400px">
                  <img class="position-absolute w-100 h-100" src="<?php echo base_url(); ?>assets/img/<?php echo $info_data->aboutus_side_img; ?>" alt="" style="object-fit: cover">
                  
                </div>
              </div>-->
          <div class="col-lg-12 mt-4 mt-lg-0 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
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
                    <h6 class="mb-0"> <?php echo $info_data->au_feature1; ?></h6>
                  </div>
                  <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                    <i class="fa fa-check fa-2x icon-color flex-shrink-0 me-3"></i>
                    <h6 class="mb-0"> <?php echo $info_data->au_feature2; ?></h6>
                  </div>
                  <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <i class="fa fa-check fa-2x icon-color flex-shrink-0 me-3"></i>
                    <h6 class="mb-0"> <?php echo $info_data->au_feature3; ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Facts Start -->
  <!--<div class="container-fluid my-5 p-0">
        <div class="mission-heading">
        <h2 class="text-center greenclr">Our Mission</h2>
        <p class="text-center"> <?php echo $info_data->ourmission_content; ?></p>
</div>
      <div class="row g-0">
        <div class="col-xl-4 col-sm-6 wow fadeIn" data-wow-delay="0.1s">
          <div class="position-relative">
            <img class="img-fluid w-100" src="<?php echo base_url(); ?>assets/img/<?php echo $info_data->our_m_img1; ?>" alt="" />
            <div class="facts-overlay">
              <h1 class="display-1">01</h1>
              <h4 class="text-white mb-3"> <?php echo $info_data->our_mission_t1; ?></h4>
              <p class="text-white">
                 <?php echo $info_data->our_mission_i1; ?>
              </p>
              
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="<?php echo base_url(); ?>assets/img/<?php echo $info_data->our_m_img2; ?>" alt="" />
                                <div class="facts-overlay">
                                    <h1 class="display-1">02</h1>
                                    <h4 class="text-white mb-3"> <?php echo $info_data->our_mission_t2; ?></h4>
                                    <p class="text-white">
                                         <?php echo $info_data->our_mission_i2; ?>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="<?php echo base_url(); ?>assets/img/<?php echo $info_data->our_m_img3; ?>" alt="" />
                                <div class="facts-overlay">
                                    <h1 class="display-1">03</h1>
                                    <h4 class="text-white mb-3"> <?php echo $info_data->our_mission_t3; ?></h4>
                                    <p class="text-white">
                                        <?php echo $info_data->our_mission_i3; ?>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>-->
                


                <!-- Features Start -->
                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="row ">
                            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                <div class="border-start border-5 border-color ps-4 mb-5">
                                    <h6 class="text-body text-uppercase mb-2">Why Researchlyne.com</h6>
                                    <h1 class="display-6 mb-0">
                                        <span class="title"><?php echo $info_data->whyme_title; ?></span>
                                    </h1>
                                </div>
                                <p class="mb-5">
                                    <?php echo $info_data->whyme_content; ?>
                                </p>
                                <div class="row gy-5 gx-4">
                                    <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fa fa-check fa-2x icon-color flex-shrink-0 me-3"></i>
                                            <h6 class="mb-0"><span class="title"><?php echo $info_data->key1_title; ?></h6></span>
                                        </div>
                                        <?php
                                        $num_words = 21;
                                        $words = array();
                                        $words = explode(" ", $info_data->key1_info, $num_words);
                                        $shown_string = "";

                                        if (count($words) == 21) {
                                            $words[20] = "  ";
                                        }
                                        $shown_string = implode(" ", $words);
                                        ?><span><?php echo $shown_string; ?></span>
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                <div class="d-flex align-items-center mb-3">
                  <i class="fa fa-check fa-2x icon-color flex-shrink-0 me-3"></i>
                  <h6 class="mb-0"><span class="title"><?php echo $info_data->key2_title; ?></span></h6>
                </div>
              <?php
              $num_words = 21;
              $words = array();
              $words = explode(" ", $info_data->key2_info, $num_words);
              $shown_string = "";

              if (count($words) == 21) {
                  $words[20] = "  ";
              }
              $shown_string = implode(" ", $words);
              ?><span><?php echo $shown_string; ?></span>
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                <div class="d-flex align-items-center mb-3">
                  <i class="fa fa-check fa-2x icon-color flex-shrink-0 me-3"></i>
                  <h6 class="mb-0"><span class="title"><?php echo $info_data->key3_title; ?></span></h6>
                </div>
                
                 <?php
                 $num_words = 21;
                 $words = array();
                 $words = explode(" ", $info_data->key3_info, $num_words);
                 $shown_string = "";

                 if (count($words) == 21) {
                     $words[20] = "  ";
                 }
                 $shown_string = implode(" ", $words);
                 ?><span><?php echo $shown_string; ?></span>
              </div>
              <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
                <div class="d-flex align-items-center mb-3">
                  <i class="fa fa-check fa-2x icon-color flex-shrink-0 me-3"></i>
                  <h6 class="mb-0"><span class="title"><?php echo $info_data->key4_title; ?></span></h6>
                </div>
               <?php
               $num_words = 21;
               $words = array();
               $words = explode(" ", $info_data->key4_info, $num_words);
               $shown_string = "";

               if (count($words) == 21) {
                   $words[20] = "  ";
               }
               $shown_string = implode(" ", $words);
               ?><span><?php echo $shown_string; ?></span>
              </div>
            </div>
          </div>
          <!--<div class="col-lg-6 wow fadeInUp mt-4 mt-lg-0" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
            <div class="position-relative overflow-hidden h-100 morden" style="min-height: 400px">
              <img class="position-absolute w-100 h-100" src="<?php echo base_url(); ?>assets/img/<?php echo $info_data->amiteshwar_img; ?>" alt="" style="object-fit: cover">
              
                
              </div>
            </div>-->
          </div>
        </div>
      </div>
      
      
      
                <section>
                    <div class="container-xxl py-2">
                        <div class="container">
                        
                            <div class="row">
                                <h3 class="text-center pt-4" ><span class="title"><?php echo $info_data->f_title; ?></span></h3>
                                <hr class="w-25 m-auto">
                                <div class="col-md-12 market-stock">
                                    <div class="owl-carousel marketing pt-4">
                                           <?php if ($fast_data) {
                                               foreach ($fast_data as $value) { ?>
                                                <div class="testimonial-item">
                                                    <div class="front face">
                                                          <div class="weakly" style="  width: 100%; margin:auto; height: 68px;display: flex;align-items: center;">
                                                          <div class="iamge-path">
                                                          <!-- <p style="border-right: 2px solid #9c9c9c;"> <img src="<?php echo base_url() . 'assets/img/' . $value->image; ?>" class="img-fluid"  alt=""> </p> -->
                                                        <p style="font-size:15px; font-weight:900; text-align: center;"><?php echo $value->title; ?></p>
                                               
                                                        </div></div>
                                                         <!-- <hr style=" border-top: 2px solid black;"> -->

                                                        <div class="weakly">

                                                            <div class="iamge-path">
                                                                 <p style="font-size:15px; font-weight:900;  border-top: 2px solid #9c9c9c; border-right: 2px solid #9c9c9c;" >Rec. Price<br><?php $Date = $value->rec_date;
                                                                 $yrdata = strtotime($Date);
                                                                 echo date('d-M-Y', $yrdata); ?></p> 
                                                                 <!-- -->
                                                                 <p style="font-size:15px; font-weight:900;  border-top: 2px solid #9c9c9c; "> <?php echo $value->rec_price; ?></p>
                                                                 <!--  -->
                                                                 <!-- <hr style=" border-top: 2px solid black;"> -->
                                                            <!-- <p> <?php echo $value->rec_date ?></p> -->
                                                   
                                                            </div>

                                                            <div class="iamge-path">

                                                            <p style="font-size:15px; font-weight:900; border-top: 2px solid #9c9c9c; border-right: 2px solid #9c9c9c;">High Price<br><?php $Date1 = $value->high_date;
                                                            $yrdata1 = strtotime($Date1);
                                                            echo date('d-M-Y', $yrdata1); ?></p>
                                                   
                                                    
                                                  
                                                            <p style="font-size:15px; font-weight:900;  border-top: 2px solid #9c9c9c;"> <?php echo $value->high_price; ?></p>
                                                            </div>
                                                            </div>
                                                            <h4 class="text-center" style="margin: 0; font-weight: bolder; color: #00d684; letter-spacing: 4px;border-top: 2px solid #9c9c9c;">+<?php echo $value->final_price; ?>%</h4>
                                                    
                                                            <h6 class="text-center" style="font-weight: bold; text-transform:uppercase; margin: 0px;">WITHIN &nbsp;<?php echo $value->final_date; ?> &nbsp; <?php if ($value->final_date == 1) {
                                                                   echo "Week";
                                                               } else {
                                                                   echo "Weeks";
                                                               } ?></h6>
                                                
                                                    </div>

                                                </div>
                                              <?php }
                                           } ?>

                                      
                                    </div>
                                </div>
                            </div>

                
                        </div>
                    </div>
                                           </section>
      <!-- performer start -->
                <section id="our-service" class="home-page">
                    <div class="container">
                        <div>
                            <div class="title common text-center" >
                                <h2 class="title"><span class="title"><?php echo $info_data->s_title; ?></span></h2>
                            </div>
                            <div class="main text-center">
                                <div class="row justify-content-center">
                              <?php if ($star_data) {
                                  foreach ($star_data as $value1) { ?>

                                            <div class="col-md-6 col-lg-3">
                                                <div class="item" style="background-color: #006afd; color: white; margin-top: 10px;">

                                                    <table width="100%" height="100%" border="1">
                                                        <tbody>
                                                            <tr>
                                                                <th style="text-align:center; " colspan="2"><?php echo $value1->title; ?></th>
                                                            </tr>
                                                            <tr align="center" style="font-size:15px; font-weight:900;">
                                                                <td style="border-right:1px solid #2e77c3">Rec. Price<br><?php $Date = $value1->rec_date;
                                                                $yrdata = strtotime($Date);
                                                                echo date('d-M-Y', $yrdata); ?>
                                                                </td>
                                                                <td><?php echo $value1->rec_price; ?></td>
                                                            </tr>
                                                            <tr align="center">
                                                                <td style="border-right:1px solid #2e77c3">High Price<br><?php $Date1 = $value1->high_date;
                                                                $yrdata1 = strtotime($Date1);
                                                                echo date('d-M-Y', $yrdata1); ?>
                                                                </td>
                                                                <td><?php echo $value1->high_price; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align:center; text-transform:uppercase; " colspan="2">+<?php echo $value1->final_price; ?>%<br>WITHIN <?php echo $value1->final_date; ?> Weeks</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        <?php }
                              } ?>
                                  

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- performer end -->
                
    </div>
              

  <!-- different start -->
  <section id="other-services" style="background:#f9f9f9;">
    <div class="container">
    
        <div class="title common text-center">
            <h2 class="text-center text-capitalize ">
<span class="title">What makes us your best choice.</span></h2>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="about-text" style="font-size:medium;">
                 <!-- <?php echo $info_data->makes_us_ur_best_choice; ?> -->
                 <ul>
                      <li>
                      
                        <h6 style="text-transform:uppercase;"><b><?php echo $info_data->make1_title; ?></b></h6>                
                            <p align="justify">
                              <?php echo $info_data->make1_info; ?> 
                            </p>
                      </li>
                        <li>
                          <h6 style="text-transform:uppercase;"><b><?php echo $info_data->make2_title; ?></b></h6>
                          <p align="justify">
                             <?php echo $info_data->make2_info; ?>
                            </p>
                        </li>
                        <li>
                          <h6 style="text-transform:uppercase;"><b><?php echo $info_data->make3_title; ?></b></h6>
                          <p align="justify">
                             <?php echo $info_data->make3_info; ?>
                            </p>
                        </li>
                        <li>
                          <h6 style="text-transform:uppercase;"><b><?php echo $info_data->make4_title; ?></b></h6>
                          <p align="justify">
                             <?php echo $info_data->make4_info; ?>
                            </p>
                        </li>   
                        <li>
                          <h6 style="text-transform:uppercase;"><b><?php echo $info_data->make5_title; ?></b></h6>
                          <p align="justify">
                              <?php echo $info_data->make5_info; ?>
                            </p>
                        </li>
                  </ul>                    
                </div>
            </div>
        </div>
            
    </div>
</section>
  <!-- different end -->

  <!-- subscriber start -->
  <section class="price-sec">
            <div class="container">
                <div class="common text-center ">
                    <h2 class="" ><span class="title">Subscription</span></h2>
                    <h3 style="margin-top: 0; color: #006afd;font-weight: bold;"><span class="title">GET LOGIN DETAILS JUST AFTER SUBSCRIPTION</span></h3>
                    <p style="margin-top:0px;"><span class="title">(By : Credit/Debit Card/Net Banking/PayTM etc.)</span></p>

                    <!--<ul class="no-style" style="font-size:large; font-weight:bolder; margin-top:-2px; padding-top:0px ; list-style: none;">-->
                    <!--    <li style="background-color:#e0e0e0;color:red;padding:5px 0;text-transform: uppercase;font-size: 20px; width: 100%; max-width:600px; margin: auto;"><span style="font-size: 30px; font-weight:600;" id="timer">0Days : 11H : 5M : 22S</span><br>OFFERS ENDING SOON</li>-->
                    <!--</ul>-->
                </div>
                <div class="row py-4 gy-5 justify-content-center">
                <?php if ($subscription_plan) {
                    foreach ($subscription_plan as $value) { ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="card-price">
                                    <div class="item-title text-center">
                                        <h2><?php echo $value->title; ?><br>
                                            <sup style="font-size: medium;"><?php echo $value->duration; ?> Plan</sup>
                                        </h2>
                                    </div>

                                    <div class="content">
                                        <p style="font-size:20px; text-align:center; margin:0px; margin-bottom:-10px; color:#003eff; padding-top: 25px;">
                                            <span style="font-size:20px;text-decoration: line-through;">Rs.<?php echo $value->price; ?>/-</span><?php echo $value->off_price; ?>% off
                                            <br>You Save Rs.<?php echo $value->discounted_price; ?>/-
                                        </p>
                                        <h3>Rs.<?php echo $value->price - $value->discounted_price; ?>/-</h3>
                                    </div>
                                    <form action="">
                                        <div class="check d-flex justify-content-center">
                                            <div class="form-group form-check">
                                             <i class="fas fa-check-square"></i>
                                                <label class="form-check-label"  style="font-size:12px;" for="exampleCheck1"> I agree to Terms & Conditions and Privacy Policy</label>
                                            </div>
                                        </div>
                                        <?php
                                        $data_amount = $value->price - $value->discounted_price;
                                        $data_id = $value->id;
                                        ?> 
                                                <?php if ($uid = $this->session->userdata('user_id')) {


                                                    $userss = $this->common_model->getjoinwhere($uid);
                                                    // print_r($userss);
                                                    $name = $userss->name;
                                                    $email = $userss->email;
                                                    $phone = $userss->phone;
                                                    $address = $userss->address;
                                                    ?>
                                                          <div class="btn-submit">
                                                    <a href="javascript:void(0)" id="buy_now"   data-amount="<?php echo $data_amount; ?>" data-id="<?php echo $data_id; ?>" user-id="<?php echo $uid; ?>"user-name="<?php echo $name; ?>"user-email="<?php echo $email; ?>" user-phone="<?php echo $phone; ?>" user-address="<?php echo $address; ?>"  >Subscribe Now</a> 
                                                        </div>

                                                <?php } else { ?>
                                    

                                                     <div class="btn-submit">
                                  
                                                  <a href="<?php echo base_url('user/payment/' . $data_id . '/' . $data_amount); ?> ">Subscribe Now</a>
                           
                                                   </div>
                                             <?php } ?>
                                        </form>

                                    </div>
                                </div>
                    <?php }
                } ?>
                       <!-- <div class="col-lg-6 col-md-12">
                            <div class="card-price">
                                <div class="item-title text-center">
                                    <h2>STANDARD PLAN<br>
                                        <sup style="font-size: medium;">12 Months Plan</sup>
                                    </h2>
                                </div>

                                <div class="content">
                                    <p style="font-size:20px; text-align:center; margin:0px; margin-bottom:-10px; color:#003eff; padding-top: 25px;">
                                        <span style="font-size:20px;text-decoration: line-through;">Rs.12000/-</span>55% off
                                        <br>You Save Rs.6600/-
                                    </p>
                                    <h3>Rs.5400/-</h3>
                                </div>
                                <form action="">
                                    <div class="check d-flex justify-content-center">
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1"> I agree to Terms & Conditions and Privacy Policy</label>
                                        </div>
                                    </div>
                                    <div class="btn-submit">
                                       
                                        <a href="#">Subscribe Now</a>
                                    </div>
                                </form>

                            </div>
                        </div>-->
                    </div>
                </div>
                </section>
                            <!-- subscriber end -->
 <!-- faq section start -->
 <!-- <?php $faq_data = $this->common_model->getAllwhere('faq_content', array('status' => 1)); ?>
                            <section class="accod">
                                <div class="container">
                                    <h2 class="text-center pb-4">FAQs (Frequently Asked Questions)</h2>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="accordion" id="accordionExample">
                                                  
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  WHAT IS THE HOLDING PERIOD OF THE STOCK?
                  </button>
                            </h2>
                            



                

            </div>
                                    </div>
                                </div>
                            </section> -->
                            <!-- faq section end -->

                            <!-- faq section start -->

<?php $faq_data = $this->common_model->getAllwhere('faq_content', array('status' => 1)); ?>

                            <section class="accod">
                                <div class="container">
                                    <h2 class="text-center pb-4"><span class="title">FAQs (Frequently Asked Questions)</span></h2>

                                    <div class="row">
                                        <?php if ($faq_data) {
                                            foreach ($faq_data as $value) { ?>

                                                        <div class="col-md-12">
                                                            <div class="accordion" id="accordionExample">
                                                                  <div class="accordion-item">

                                                                      <h2 class="accordion-header" id="headingTwo">
                                                                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                            <?php echo $value->question; ?>
                                                                           </button>
                                                                      </h2>
                                                                      <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                                          <div class="accordion-body">
                                                                              <p><?php echo $value->answer; ?></p>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                            
                             
                                                             </div>
                                                     </div>
                                                 <?php }
                                        } ?> 
                                </div>
                            </section>
                            <!-- faq section end -->

                            

<?php $info_data = $this->common_model->getsingle('home_info', array('id' => 1)); ?>
<?php $contact_data = $this->common_model->getsingle('contact_content', array('id' => 1)); ?>
<style>
.appointment {
    background: linear-gradient(rgba(0, 0, 0, .65), rgba(0, 0, 0, .65)), url(<?php echo base_url(); ?>assets/img/<?php echo $info_data->contact_us_image; ?>) center center no-repeat;
  background-size: cover;
}
</style>
                            <!-- Appointment Start -->
                            <div class="container-fluid appointment my-5 py-5 wow fadeIn" data-wow-delay="0.1s">
                                <div class="container py-5">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                                            <div class="border-start border-5 border-color ps-4 mb-5">
                                                <h6 class="text-white text-uppercase mb-2">Feedback</h6>
                                                <h3 class=" text-white mb-0">
                                                    <?php echo $info_data->aboutus_title; ?>
                                                </h3>
                                            </div>
                                            <p class="text-white mb-0">
                                               <?php echo $info_data->aboutus_content; ?>
                                            </p>
                                        </div>
                                        
                                        <div class="col-lg-7 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                                    <?php if ($msg != '') { ?><div>
                    <span style="color:green;"><?php echo $msg; ?></span>
                 </div>
            <?php } ?> 
   
                      <p id ="resultfddd"></p>
        
                                            <!-- <form> -->
                                                <div id="form">
  
                                                    <form action="<?php echo base_url('user/index') . '#form'; ?>" method="POST">
                                                <div class="row g-3 ">
                                                    <div class="col-sm-6 mt-5 mt-md-3 mt-lg-3">
                                                        <div class="form-floating">
                                                            <input type="text" name="name"class="form-control bg-dark border-0 inputclr" id="name" placeholder="Enter your name" required />
                                                            <label for="gname">Your Name</label>
                                                             <span><?= form_error('name') ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-sm-6 mt-5 mt-md-3 mt-lg-3 phone-class">
                                                        <div class="form-floating">
                                                            <input type="email" name="gmail" class="form-control bg-dark border-0 inputclr" id="gmail" placeholder="Enter your gmail" required/>
                                                            <label for="gmail">Your Email</label>
                                                             <span><?= form_error('gmail') ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-floating">
                                                            <!-- <input type="number" name="mobile" class="form-control bg-dark border-0" id="mobile" placeholder="Enter your phone no " /> -->
                                                             <input type="text" name="mobile" class="form-control bg-dark border-0 inputclr" placeholder="Phone Number" 
                                                            id="phone" minlength="1" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" 
                                                                   fdprocessedid="g37aru" required>
                                                                   <label for="cname ">Your Mobile</label>
                                                             <span><?= form_error('mobile') ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="subject" class="form-control bg-dark border-0 inputclr" id="subject" placeholder="Enter your Subject " required>
                                                            <label for="cage">Subject</label>
                                                             <span><?= form_error('subject') ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-floating">
                                                            <textarea class="form-control bg-dark border-0 inputclr" placeholder="Leave a message here" name="message" id="message" style="height: 100px"  required></textarea >
                                                            <label for="message">Message</label>
                                                             <span><?= form_error('message') ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <!-- <button class="btn same-color text-white w-100 py-3" type="submit"  value="submit" name="submit"> Send Message</button>-->
                                                         <button class="btn same-color text-white w-100 py-3" type="button" onclick="submit_form(this)"   value="submit" name="submit">
                                                         <span id="spin" class="spinner-border spinner-grow-sm"></span>
                                                             Send Message
                                                        </button> 
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Appointment End -->
 
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>   -->
   <!--   <script>

      $(function () {
     
        $('form').bind('submit', function (e) {
            e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?php echo base_url('user/index'); ?>',
            data: $('form').serialize(),
            success: function (response) {
                $("#result").html('Thank you for your Enquiry. We will get in touch!'); 
                $("#result").addClass("alert alert-success");
            }
          });
          return false;
        });
      });
    </script> 
  -->
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
<script>
      window.onload =function(){
        $("#spin").hide();
    }
function submit_form(e){
    $(e).attr("disabled", true);
    $("#spin").show();
    var name=$("#name").val();
    var gmail=$("#gmail").val();
    var mobile=$("#phone").val();
    var subject=$("#subject").val();
    var message=$("#message").val();
    
    $("#e_name").html('');
    $("#e_gmail").html('');
    $("#e_mobile").html('');
    $("#e_subject").html('');
    $("#e_message").html('');
    if(name==''){
        $("#e_name").html("Name required.");
    }else if(gmail==''){
        $("#e_gmail").html("Email required.");
    }else if(mobile==''){
        $("#e_mobile").html("Mobile required.");
    }else if(subject==''){
        $("#e_subject").html("Subject required.");
    }else if(message==''){
        $("#e_message").html("Message required.");
    }else{
    let formData = new FormData();
        formData.append('name',name);
        formData.append('gmail',gmail);
        formData.append('mobile',mobile);
        formData.append('subject',subject);
        formData.append('message',message);
        $.ajax({
                url: "<?php echo base_url('user/contactForm'); ?>",
                type:"POST",
                data:formData,
                processData:false,
                contentType:false,
                cache:false,
                async:true,
                success: function(data){
                    if(data==1){
                        $(e).attr("disabled", false);
                        $("#spin").hide();
                        Swal.fire({
                          icon: 'success',
                          title: 'Yay...',
                          text: 'Thank you for your Enquiry. We will get in touch .',
                        });
                        $("#name").val('');
                        $("#gmail").val('');
                        $("#mobile").val('');
                        $("#subject").val('');
                        $("#message").val('');
                    }else{
                        $(e).attr("disabled", false);
                        $("#spin").hide();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Please try again after sometime.',
                        });
                    }
                }
        });
    }
}
</script>
  <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
<!-- https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
 <script>
var SITEURL = "<?php echo base_url() ?>";
$('body').on('click', '#buy_now', function(e){
  
console.log("Triggered");

var totalAmount = $(this).attr("data-amount");
   
var subscription_id =  $(this).attr("data-id");
 
var user_id =  $(this).attr("user-id");
  
var name = $(this).attr("user-name");

var email = $(this).attr("user-email");

var phone =$(this).attr("user-phone");

var address = $(this).attr("user-address");


console.log(name);

var options = {
//$username = "rzp_test_VA9mhQSg5SJs5H";  //test orginal rzp_live_OkVNyeILcznmr3
//$password = "Ut36E48PUadXV2xuTd13ge2n";
"key": "rzp_test_wFouhCBGmLVZXP",
"amount": (totalAmount *100), // 2000 paise = INR 20
"name": "Researchlyne",
"description": "Payment",
// "image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
"handler": function (response){
 console.log(response);
$.ajax({
url: "<?php echo base_url('user/razorPaySucces_post'); ?>",
type: 'post',
data: {
razorpay_payment_id: response.razorpay_payment_id ,
 totalAmount : totalAmount ,
 subscription_id : subscription_id,
 name : name,
 phone : phone,
 email : email,
 address : address,
}, 
success: function (msg) {
url: "<?php echo base_url('user/razorPaySuccess'); ?>";
}
});
},
"prefill": {
        "name": name,
        "email": email,
        "contact": phone,
        
    },
    "notes": {
        "address": address,
    },

"theme": {
"color": "#528FF0"
}
};
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();

});
</script> 