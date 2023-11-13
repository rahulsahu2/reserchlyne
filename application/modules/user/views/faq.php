<?php $info_data= $this->common_model->getsingle('home_info', array('id'=>1)); ?>
<style>
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .65), rgba(0, 0, 0, .65)), url(<?php echo base_url();?>assets/img/<?php echo $info_data->faq_image;?>) center center no-repeat;
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
<!DOCTYPE html>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">
                FAQs
            </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="<?php echo base_url('user/index');?>">Home</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        FAQs
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- faq section start -->

  <?php $faq_data= $this->common_model->getAllwhere('faq_content', array('status'=>1)); ?>
    <section class="con-sec ">
        <div class="container ">
            <h2 class="text-center pb-4 wow slideInLeft" data-wow-duration="2s"><span class="title">FAQs (Frequently Asked Questions)</span></h2>
            <div class="row">
                   <?php if($faq_data){ foreach($faq_data as $value){?>
                <div class="col-12 col-md-10 m-auto wow slideInUp" data-wow-duration="2s">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 <?php echo $value->question; ?>
                  </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p><?php echo $value->answer; ?></p>
                                </div>
                            </div>
                        </div>
                       
                      


                      
                    
                  
            </div>
        </div>
          <?php } } ?> 
    </section>
    <!-- faq section end -->

   