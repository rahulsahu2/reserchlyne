<?php $info_data= $this->common_model->getsingle('home_info', array('id'=>1)); ?>
<style>
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .65), rgba(0, 0, 0, .65)), url(<?php echo base_url();?>assets/img/<?php echo $info_data->why_amiteshwar_image;?>) center center no-repeat;
    background-size: cover;
}
</style>   

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">
                Why Amiteshwar.in
            </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="<?php echo base_url('user/index');?>">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item">
                        <a class="text-white" href="#">Pages</a>
                    </li> -->
                    <li class="breadcrumb-item active" aria-current="page">
                        Why Amiteshwar.in
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- why-choose-us start -->

    <section class="choose-us">
        <div class="container">
            <h2 class="text-center text-white">Why Amiteshwar.in?</h2>
            
            <div class="row g-lg-5 gy-4 pt-4 justify-content-center">
                <div class="col-lg-6 col-md-6 col-12 d-flex ">
                    <div class="box-choose">
                        <i class="fas fa-expand-arrows-alt"></i>
                        <h5><?php echo $info_data->key1_title;?></h5>
                        <p><?php echo $info_data->key1_info;?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 d-flex">
                    <div class="box-choose">
                        <i class="fas fa-percentage"></i>
                        <h5><?php echo $info_data->key2_title;?></h5>
                        <p><?php echo $info_data->key2_info;?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 d-flex">
                    <div class="box-choose">
                        <i class="far fa-chart-bar"></i>
                        <h5><?php echo $info_data->key3_title;?></h5>
                        <p><?php echo $info_data->key3_info;?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 d-flex">
                    <div class="box-choose">
                        <i class="fas fa-retweet"></i>
                        <h5><?php echo $info_data->key4_title;?></h5>
                        <p><?php echo $info_data->key4_info;?></p>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>

    <!-- why-choose-us end -->
