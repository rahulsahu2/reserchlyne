


                                        <!-- Modal -->


       
    <!-- Topbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">
                Forgot
            </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="index.html">Home</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        Forgot
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- profile start -->

    <section class="who-we-are">
        <div class="container">
            <!-- <h2 class="text-center">FORGOT</h2> -->
            <div class="row">
                <div class="col-lg-4 m-auto">
                    <div class="heading ">
                        <h3 class="text-center">PASSWORD RESET</h3>
                        <!-- <h1 class="text-center">
                            +962 Days <sub>Left</sub></h1> -->

                        <div class="profile-content">
                          <form  action="<?php echo base_url('user/change_password')?>" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                                <div class="row g-3 pt-3 justify-content-center">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0 bg-light w-100" name="email"placeholder="Your Email">
                                            <label for="name">Your Email</label>
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control border-0 bg-light w-100" name="old_pass"placeholder="Current Password">
                                            <label for="text">Current Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control border-0 bg-light w-100"name="new_pass" placeholder="New Password">
                                            <label for="subject">New Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control border-0 bg-light w-100"name="confirm_pass" placeholder="Confirm New Password">
                                            <label for="password">Confirm New Password</label>
                                        </div>
                                    </div>




                                </div>
                                  <div class="btns mt-5 mb-4 text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                            </form>
                        </div>

                      



                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- profile end -->

    <!-- Footer Start -->
   