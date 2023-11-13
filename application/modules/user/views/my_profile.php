<style>
    .profile-content p {
    letter-spacing: 2px;
    text-align: center;
    margin: 0;
    word-break: break-all;
    color: #3385D9;
}
.profile-profile {
    background: #eaeaead1;
    border-radius: 57px;
    margin: 20px;
    padding: 20px;
}
.btns {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 14px;
    justify-content: center;
}
.btns a {
    background: var(--primary);
    color: #FFFFFF;
    padding: 15px 30px;
    border-radius: 50px;
    letter-spacing: 1px;
}
.heading h3 {
    color: #3385D9;
}
</style>


  

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">
                My Profile
            </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="index.html">Home</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        My Profile
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
  

          

                <!-- Modal -->
               
    <!-- profile start -->

    <section class="who-we-are">
        <div class="container">
 

            <h2 class="text-center">MY PROFILE</h2>
            <div class="row pt-5">
                <div class="col-lg-6  m-auto">
                    <div class="heading ">
                        <h3 class="text-center">WELCOME  &nbsp;<?php echo ($user->name)?>  !</h3>
                        <h1 class="text-center">
    <?php
        $duration= explode(" ",$user->duration);
		//$effectiveDate = date('d-m-Y', strtotime("+$duration[0] months", strtotime($user->join_date))); 
		$effectiveDate = date('d-m-Y', strtotime("+$duration[0] months", strtotime($user->date)));
	?>


<?php //echo ($user->extend_date)?>
<?php 
	$extanded_date =$user->extend_date;
	if ($extanded_date != "0000-00-00" && $user->comment=='Extend')
	{ 
		$created_date = date('d-m-Y', strtotime($user->date));
		//$future1 = strtotime($effectiveDate); //22 July 2023
		$future1 = strtotime($created_date); //22 July 2023
		$now1 = time();
		$timeleft1 = $future1-$now1;
		$daysleft1 = round((($timeleft1/24)/60)/60);

		$future = strtotime($user->extend_date); //22 July 2023
		$now = time();
		$timeleft = $future-$now;
		
		$daysleft = round((($timeleft/24)/60)/60);
		
		$dayleftex = $daysleft1 +  $daysleft + 1;
		if ($dayleftex < 0)
		{
			echo $dayleftex = 0;
		}else{
			echo $dayleftex;
		}
		//echo "----1";
    }else{ 
		
        $future = strtotime($effectiveDate); //22 July 2023
        $now = time();
        $timeleft = $future-$now;
         $daysleft = round((($timeleft/24)/60)/60) + 1;
		if ($daysleft < 0)
		{
			echo $daysleft = 0;
		}else{
			echo $daysleft;
		}
		//echo "----2";
    }
    
    ?>
        Days <sub>Left</sub></h1>

<!-- <?php echo "hihi"; print_r($user->duration)?> -->
                        <div class="profile-content">
                            <form>
                                <div class="row g-3 pt-3 justify-content-center">
                                    <div class="col-lg-12 m-auto">
                                        <div class="profile-profile">

                                                 
                                            
                                            <p>Name : <span><?php echo ($user->name)?> </span></p>
                                        </div>
                                        <div class="profile-profile">
                                            <p>Address : <span><?php echo ($user->address)?> </span></p>
                                        </div>
                                        <div class="profile-profile">
                                            <p>Contact : <span><?php echo ($user->phone)?> </span></p>
                                        </div>
                                        <div class="profile-profile">
                                            <p>Email : <span><?php echo ($user->email)?> 
                                             </span></p>
                                        </div>
                                        <div class="profile-profile">
                                            <p>Order Id : <span><?php echo ($user->order_id)?> </span></p>
                                        </div>
                                        <?php  //if ($extanded_date != "0000-00-00" && $user->comment=='Extend'){ ?>
                                        <?php  if ($user->s_status==2 || $user->s_status==3){ ?>
                                            <?php  $duration  =  str_split($user->duration[0]);?>

                                            <div class="profile-profile">
                                            <p>Join Date : 
											<span>  
											<?php //echo $effectiveDate = date('d-m-Y', strtotime("-$duration[0] months", strtotime($user->extend_date))); 
												echo date('d-m-Y', strtotime($user->date)); 
											?> </span></p>
                                        </div> 

                                     
                                         <div class="profile-profile">
                                          <p>Due Date : <span> <?php echo date('d-m-Y',strtotime($user->extend_date));?></span></p>
                                         </div>


                                        <?php }else{ ?>
                                         <div class="profile-profile">
                                            <p>Join Date : <span><?php echo date('d-m-Y',strtotime($user->join_date));?> </span></p>
                                        </div> 

                                        <?php 
                                        $duration= explode(" ",$user->duration);
                                       ?>
                                         <div class="profile-profile">
                                          <p>Due Date : <span> <?php echo $effectiveDate = date('d-m-Y', strtotime("+$duration[0] months", strtotime($user->date))); ?></span></p>
                                       </div>
                                      <?php } ?>

                                       

                                </div>
                            </form>
                        </div>

                        <div class="btns mt-4 mb-4 text-center">
                            <a href="<?php echo base_url('user/login_detail');?>" class="">Click For Newsletter</a>
                            <a href="<?php echo base_url('user/change_password');?>" class="">Change Password</a>

                        </div>



                    </div>
                     
                </div>
            </div>
        </div>
    </section>

   
    <!-- profile end -->

   

    <!-- Back to Top -->
   