       <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Edit Home Info</h3>
            </div>
          </div>
          <div class="clearfix"></div>

        <div class="row">
		<?php if($msg!=''){ ?>
			   <div class="alert alert-success alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				  </button>
				  <?php echo $msg; ?>
				</div>
		  <?php } ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
					 
					  <div class="clearfix"></div>
					</div>
					
					<div class="x_content"><br />
						<form id="demo-form2" action="" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
							
							<p class="headings">Header Information -</p>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="email" name="email" value="<?php  echo $home_info->email; ?>"  placeholder="Plese enter email"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('email'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone No. 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="phone_no" name="phone_no" value="<?php  echo $home_info->phone_no; ?>"  placeholder="Plese enter phone no"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('phone_no'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Timing 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="timing" name="timing" value="<?php  echo $home_info->timing; ?>"  placeholder="Plese enter timing"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('timing'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="address" name="address" value="<?php  echo $home_info->address; ?>"  placeholder="Plese enter address"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('address'); ?></span>
							  </div>
							</div>
							
							<hr>
							<p class="headings">Banner -</p>
							 <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banner Image  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->banner_image; ?>" class="img-responsive"  width="600" height="100">
							  <br>
								<input type="file" id="images" name="images" value="<?php  echo set_value('images'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('images'); ?></span>
							  </div>
							</div>														<div class="form-group">							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Banner Content 							  </label>							  <div class="col-md-6 col-sm-6 col-xs-12">							  <textarea type="text" id="banner_content" name="banner_content" placeholder="Plese enter about us content"    class="form-control col-md-7 col-xs-12"><?php  echo $home_info->banner_content; ?></textarea>								<span style="color:red;"><?php echo form_error('banner_content'); ?></span>							  </div>							</div>
							
							<hr>
							<p class="headings">About Us -</p>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">About Us Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="aboutus_title" name="aboutus_title" value="<?php  echo $home_info->aboutus_title; ?>"  placeholder="Plese enter about us title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('aboutus_title'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">About Us Content 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <textarea type="text" id="aboutus_content" name="aboutus_content" placeholder="Plese enter about us content"    class="form-control col-md-7 col-xs-12"><?php  echo $home_info->aboutus_content; ?></textarea>
								<span style="color:red;"><?php echo form_error('aboutus_content'); ?></span>
							  </div>
							</div>
								<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Services offered Content 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <textarea type="text" id="service_content" name="service_content" placeholder="Plese enter service offered content"    class="form-control col-md-7 col-xs-12"><?php  echo $home_info->service_content; ?></textarea>
								<span style="color:red;"><?php echo form_error('service_content'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">About Us Keys
							  </label>
							  <div class="col-md-2 col-sm-3 col-xs-12">
								<input type="text" id="au_feature1" name="au_feature1" value="<?php  echo $home_info->au_feature1; ?>"  placeholder="About us feature 1" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('au_feature1'); ?></span>
							  </div>
							  <div class="col-md-2 col-sm-3 col-xs-12">
								<input type="text" id="au_feature2" name="au_feature2" value="<?php  echo $home_info->au_feature2; ?>"  placeholder="About us feature 2" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('au_feature2'); ?></span>
							  </div>
							  <div class="col-md-2 col-sm-3 col-xs-12">
								<input type="text" id="au_feature3" name="au_feature3" value="<?php  echo $home_info->au_feature3; ?>"  placeholder="About us feature 3" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('au_feature3'); ?></span>
							  </div>
							</div>
							
							 <div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">About us Image  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->aboutus_side_img; ?>" class="img-responsive"  width="600" height="100">
							  <br>
								<input type="file" id="aboutus_side_img" name="aboutus_side_img" value="<?php  echo set_value('aboutus_side_img'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('aboutus_side_img'); ?></span>
							  </div>
							</div>
							
							<hr>
							<p class="headings">Why Amiteshwar.in -</p>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Why amiteshwar.in Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="whyme_title" name="whyme_title" value="<?php  echo $home_info->whyme_title; ?>"  placeholder="Plese enter why amiteshwar.in title"   class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('whyme_title'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Why amiteshwar.in Content 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <textarea type="text" id="whyme_content" name="whyme_content" placeholder="Plese enter why amiteshwar.in content"    class="form-control col-md-7 col-xs-12"><?php  echo $home_info->whyme_content; ?></textarea>
								<span style="color:red;"><?php echo form_error('whyme_content'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key1 Title & Info
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key1_title" name="key1_title" value="<?php  echo $home_info->key1_title; ?>"  placeholder="Plese enter key1 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key1_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key1_info" name="key1_info" value="<?php  echo $home_info->key1_info; ?>"  placeholder="Plese enter key1 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key1_info'); ?></span>
							  </div>
							</div>
							

							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key2 Title & Info
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key2_title" name="key2_title" value="<?php  echo $home_info->key2_title; ?>"  placeholder="Plese enter key2 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key2_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key2_info" name="key2_info" value="<?php  echo $home_info->key2_info; ?>"  placeholder="Plese enter key2 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key2_info'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key3 Title & Info
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key3_title" name="key3_title" value="<?php  echo $home_info->key3_title; ?>"  placeholder="Plese enter key3 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key3_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key3_info" name="key3_info" value="<?php  echo $home_info->key3_info; ?>"  placeholder="Plese enter key3 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key3_info'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key4 Title & Info
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key4_title" name="key4_title" value="<?php  echo $home_info->key4_title; ?>"  placeholder="Plese enter key4 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key4_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="key4_info" name="key4_info" value="<?php  echo $home_info->key4_info; ?>"  placeholder="Plese enter key4 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('key4_info'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amiteshwar Image  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->amiteshwar_img ; ?>" class="img-responsive"  width="600" height="100">
							  <br>
								<input type="file" id="amiteshwar_img" name="amiteshwar_img" value="<?php  echo set_value('amiteshwar_img'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('amiteshwar_img'); ?></span>
							  </div>
							</div>
							<hr>
							<p class="headings">Our Mission -</p>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Our Mission Description 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <textarea type="text" id="ourmission_content" name="ourmission_content" placeholder="Plese enter our mission description"    class="form-control col-md-7 col-xs-12"><?php  echo $home_info->ourmission_content; ?></textarea>
								<span style="color:red;"><?php echo form_error('ourmission_content'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key1 Title & Info
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="our_mission_t1" name="our_mission_t1" value="<?php  echo $home_info->our_mission_t1; ?>"  placeholder="Plese enter key1 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('our_mission_t1'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="our_mission_i1" name="our_mission_i1" value="<?php  echo $home_info->our_mission_i1; ?>"  placeholder="Plese enter key1 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('our_mission_i1'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key 1 Image  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->our_m_img1; ?>" class="img-responsive"  width="600" height="100">
							  <br>
								<input type="file" id="our_m_img1" name="our_m_img1" value="<?php  echo set_value('our_m_img1'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('our_m_img1'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key2 Title & Info
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="our_mission_t2" name="our_mission_t2" value="<?php  echo $home_info->our_mission_t2; ?>"  placeholder="Plese enter key2 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('our_mission_t2'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="our_mission_i2" name="our_mission_i2" value="<?php  echo $home_info->our_mission_i2; ?>"  placeholder="Plese enter key2 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('our_mission_i2'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key 2 Image  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->our_m_img2; ?>" class="img-responsive"  width="600" height="100">
							  <br>
								<input type="file" id="our_m_img2" name="our_m_img2" value="<?php  echo set_value('our_m_img2'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('our_m_img2'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key3 Title & Info
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="our_mission_t3" name="our_mission_t3" value="<?php  echo $home_info->our_mission_t3; ?>"  placeholder="Plese enter key3 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('our_mission_t3'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="our_mission_i3" name="our_mission_i3" value="<?php  echo $home_info->our_mission_i3; ?>"  placeholder="Plese enter key3 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('our_mission_i3'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key 3 Image  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							  <img src="<?php echo base_url().'assets/img/'.$home_info->our_m_img3; ?>" class="img-responsive"  width="600" height="100">
							  <br>
								<input type="file" id="our_m_img3" name="our_m_img3" value="<?php  echo set_value('our_m_img3'); ?>" class="form-control col-md-7 col-xs-12" >
								<span style="color:red;"><?php echo form_error('our_m_img3'); ?></span>
							  </div>
							</div>
											<input type="hidden" name="submithiddenform" value="1">

							
							<hr>
							<p class="headings">What Makes Us Your Best Choice -</p>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key1 Title & Description
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="make1_title" name="make1_title" value="<?php  echo $home_info->make1_title; ?>"  placeholder="Plese enter key1 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('make1_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="make1_info" name="make1_info" value="<?php  echo $home_info->make1_info; ?>"  placeholder="Plese enter key1 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('make1_info'); ?></span>
							  </div>
							</div>
							

							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key2 Title & Description
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="make2_title" name="make2_title" value="<?php  echo $home_info->make2_title; ?>"  placeholder="Plese enter key2 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('make2_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="make2_info" name="make2_info" value="<?php  echo $home_info->make2_info; ?>"  placeholder="Plese enter key2 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('make2_info'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key3 Title & Description
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="make3_title" name="make3_title" value="<?php  echo $home_info->make3_title; ?>"  placeholder="Plese enter key3 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('make3_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="make3_info" name="make3_info" value="<?php  echo $home_info->make3_info; ?>"  placeholder="Plese enter key3 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('make3_info'); ?></span>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key4 Title & Description
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="make4_title" name="make4_title" value="<?php  echo $home_info->make4_title; ?>"  placeholder="Plese enter key4 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('make4_title'); ?></span>
							  </div>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="make4_info" name="make4_info" value="<?php  echo $home_info->make4_info; ?>"  placeholder="Plese enter key4 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('make4_info'); ?></span>
							  </div>
							</div>
								<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Key5 Title & Description
							  </label>
							  <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="make5_title" name="make5_title" value="<?php  echo $home_info->make5_title; ?>"  placeholder="Plese enter key5 title" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('make5_title'); ?></span>
							  </div>
							 <div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="make5_info" name="make5_info" value="<?php  echo $home_info->make5_info; ?>"  placeholder="Plese enter key5 info" class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('make5_info'); ?></span>
							  </div>
							</div>
								<hr>
							<p class="headings">Marquee Content -</p>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Marquee Title 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="marquee_title" name="marquee_title" value="<?php  echo $home_info->marquee_title; ?>"  placeholder="Plese enter Marquee title"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('marquee_title'); ?></span>
							  </div>
							</div>

							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Marquee Content 
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
							<textarea type="text" id="marquee_content" name="marquee_content" placeholder="Plese enter Marquee content"  class="form-control col-md-7 col-xs-12"><?php  echo $home_info->marquee_content; ?></textarea>
								<span style="color:red;"><?php echo form_error('marquee_content'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title 1  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="f_title" name="f_title" value="<?php  echo $home_info->f_title; ?>"  placeholder="Plese enter Title"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('f_title'); ?></span>
							  </div>
							</div>
							<div class="form-group">
							  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title 2  
							  </label>
							  <div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="s_title" name="s_title" value="<?php  echo $home_info->s_title; ?>"  placeholder="Plese enter Title"  class="form-control col-md-7 col-xs-12">
								<span style="color:red;"><?php echo form_error('s_title'); ?></span>
							  </div>
							</div>
							

							
							<div class="ln_solid"></div>
							<div class="form-group">
							  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="btn btn-success">Submit</button>
							  </div>
							</div>

						</form>
					</div>
				</div>
            </div>
        </div>
		  
				
              </div>
              <!-- footer content -->
			  
             <?php //$this->load->view('includes/footer'); ?>
			 
              <!-- /footer content -->

    </div>
            <!-- /page content -->
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <!-- gauge js -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="<?php echo base_url(); ?>js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo base_url(); ?>js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="<?php echo base_url(); ?>js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="<?php echo base_url(); ?>js/chartjs/chart.min.js"></script>

  <script src="<?php echo base_url(); ?>js/custom.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/date.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/flot/jquery.flot.resize.js"></script>
  <style>
  .headings{
	background-color: #2A3F54;
    color: #fff;
    font-size: medium;
    font-style: italic;
    font-weight: 550;
    padding-left: 13px;
	letter-spacing: 0.1em;
  }
  </style>