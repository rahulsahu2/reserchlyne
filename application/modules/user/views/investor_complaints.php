<?php $info_data= $this->common_model->getsingle('complaints_title', array()); ?>
<?php 

   $info1_data= $this->common_model->getsingle('home_info', array('id'=>1));?>


<style>
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .65), rgba(0, 0, 0, .65)), url(<?php echo base_url();?>assets/img/<?php echo $info1_data->investor_complaints_image;?>) center center no-repeat;
    background-size: cover;
    /*height: 400px;*/
}


</style>
<style type="text/css">
.long-link {
  word-break: break-all;
}
table {
    width: 100%; min-width:800px;
    table-layout: fixed;
}

.table thead {
    background-color: #add3fbc9;
}

 
th {
    padding: 20px 15px;
    text-align: left;
    font-weight: 500;
    font-size: 12px;
    color: #000;
    text-transform: uppercase;
    background: #3385d970;
}

td {
    padding: 15px;
    text-align: left;
    vertical-align: middle;
    font-weight: 300;
    font-size: 12px;
    color: #000;
    border-bottom: solid 1px rgb(0 0 0 / 10%) !important;
}


/* demo styles */


/* @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body {
    
    font-family: 'Roboto', sans-serif;
} */


/* section {
    margin: 50px;
} */


/* follow me template */

.made-with-love {
    margin-top: 40px;
    padding: 10px;
    clear: left;
    text-align: center;
    font-size: 10px;
    font-family: arial;
    color: #fff;
}

.made-with-love i {
    font-style: normal;
    color: #F50057;
    font-size: 14px;
    position: relative;
    top: 2px;
}

.made-with-love a {
    color: #fff;
    text-decoration: none;
}

.made-with-love a:hover {
    text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

 ::-webkit-scrollbar {
    width: 6px;
}

 ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

 ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

.complaints {
    background: -webkit-#3385d924;
    background: #3385d924;
}

.complaints tr,
td {
    border: none;
}


/* Investor Complaints css end */


/* Investor Charter css start */

.card-sec {
    display: flex;
    background: #84adea4f;
    /* padding: 30px; */
    border-radius: 6px;
    transition: all 0.4s ease-in-out;
}

.card-sec:hover {
    box-shadow: 10px 10px 10px #00000014;
    transform: translate(-10px);
}

.card-sec:hover .num-sec h1 {
    background: none;
    color: #3384d7;
}

.num-sec {
    background-color: #add3fbc9;
    border-radius: 6px 0px 0px 6px;
    padding: 0 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: 40%;
}

.num-sec h1 {
    background: #18233373;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    line-height: 55px;
    text-align: center;
    color: white;
    transition: all 0.4s ease-in-out;
    border: 3px solid #6f86a1;
}

.text-sec {
    border-radius: 0px 6px 6px 0px;
    background: #c6e2ff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 20px;
    width: 60%;
}

</style>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Investor Complaints </h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="<?php echo base_url('user/index');?>">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item">
                        <a class="text-white" href="#">Pages</a>
                    </li> -->
                    <li class="breadcrumb-item icon-color active" aria-current="page">
                        Investor Complaints
                    </li>
                </ol>
            </nav>
        </div>
    </div> 




<section class="complaints py-5">
    <div class="container">
        <!--for demo wrap-->
        <div class="title common text-center">
            <h2 class="text-center text-capitalize mb-4 greenclr">
               <?php echo $info_data->complain; ?></h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tbl-content bd-example1">
                    <div class="table-responsive">
                        <table class="table" cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <tr>
                                    <th scope="col">Received from</th>
                                    <th scope="col">Pending</th>
                                    <th scope="col">Received</th>
                                    <th scope="col">Resolved</th>
                                    <th scope="col">Total Pending</th>
                                    <th scope="col">Pending complaints</th>
                                    <th scope="col">Average Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($complaints){ foreach($complaints as $value){?>
                                <tr>


                                    <td>
                                        <?php echo $value->received_form; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->pending_c; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->received_c; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->resolved_c; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->total_pending; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->pending_complains; ?>l</td>
                                    <td>
                                        <?php echo $value->average_time; ?>
                                    </td>

                                </tr>

                                <?php } } ?>
                                <td>Grand Total </td>
                                 <td> <?php echo $pending_ttl->pending_ttl;?></td>
                                  <td><?php echo $pending_ttl->received_ttl;?></td>
                                   <td><?php echo $pending_ttl->resolved_ttl;?></td>
                                    <td><?php echo $pending_ttl->total_pending_tt1;?> </td>
                                     <td><?php echo $pending_ttl->pending_complains_tt1;?> </td>
                                     <td><?php echo $pending_ttl->pending_complains_tt1;?> </td>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-md-12 ">
                <p class="">
                    <?php echo $info_data->c_title; ?>
                </p>
            </div>
            <div class="col-md-12">
                <div class="title common text-center">
                    <h2 class="text-center text-capitalize mb-4 mt-4 greenclr">
                       <?php echo $info_data->month; ?></h2>
                </div>

                <div class="tbl-content">
                    <div class="table-responsive">
                        <table class="table" cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Month</th>
                                    <th>previous month</th>
                                    <th>Received</th>
                                    <th>Resolved</th>
                                    <th>Pending</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if($complaints){ foreach($complaints as $value){?>
                                <tr>


                                    <td>
                                        <?php echo $value->sr_no_m; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->month; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->previous_month; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->received_m; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->resolved_m; ?>
                                    </td>
                                    <!-- <td><?php echo $value->pending_complains; ?>l</td> -->
                                    <td>
                                        <?php echo $value->pending_m; ?>
                                    </td>

                                </tr>

                                <?php } } ?>
                                <td></td>
                                <td >Grand Total </td>
                                 <td ><?php echo $pending_ttl->previous_month_tt1;?></td>
                                  <td ><?php echo $pending_ttl->received_m_tt1;?></td>
                                   <td ><?php echo $pending_ttl->resolved_m_tt1;?> </td>
                                    <td ><?php echo $pending_ttl->pending_m_tt1;?> </td>
                                    



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12 ">
                <p class=" pt-4">
                    <?php echo $info_data->m_title; ?>.</p>
            </div>
            <div class="col-md-12">
                <div class="title common text-center">
                    <h2 class="text-center text-capitalize mb-4 mt-4 greenclr">
                        <?php echo $info_data->year; ?>
                    </h2>
                </div>
                <div class="tbl-content">
                    <div class="table-responsive">
                        <table class="table" cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Year</th>
                                    <th>Carried forward</th>
                                    <th>Received</th>
                                    <th>Resolved</th>
                                    <th>Pending</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php if($complaints){ foreach($complaints as $value){?>
                                <tr>


                                    <td>
                                        <?php echo $value->sr_no_y; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->year; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->carried_forward; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->received_y; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->resolved_y; ?>
                                    </td>
                                    <!-- <td><?php echo $value->pending_complains; ?>l</td> -->
                                    <td>
                                        <?php echo $value->pending_y; ?>
                                    </td>

                                </tr>

                                <?php } } ?>
                                   <td></td>
                                <td>Grand Total </td>
                                  <td><?php echo $pending_ttl->carried_forward_tt1;?> </td>
                                  <td><?php echo $pending_ttl->received_y_tt1;?>  </td>
                                  <td><?php echo $pending_ttl->resolved_y_tt1;?> </td>
                                  <td><?php echo $pending_ttl->pending_y_tt1;?> </td>
                               





                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 ">
                <p class=" pt-4">
                    <?php echo $info_data->y_title; ?>.</p>
            </div>
            <h3 style="text-transform: none; margin-top:75px;" class="fadeInUp greenclr" data-wow-delay="0.3s">Links :</h3>
            <ul>
                <li><i class="fa fa-envelope"></i> Email to <a style="color: blue;" href="mailto:info@researchlyne.com">info@researchlyne.com</a> for Complaint</li>
                <li><a style="color: blue;" class="long-link" href="https://scores.gov.in/scores/Welcome.html" target="_blank">https://scores.gov.in/scores/Welcome.html</a></li>
                <li><a style="color: blue;" class="long-link" href="https://play.google.com/store/apps/details?id=com.ionicframework.sebi236330&hl=en_IN&gl=US" target="_blank">https://play.google.com/store/apps/details?id=com.ionicframework.sebi236330&hl=en_IN&gl=US</a></li>
            </ul>
        </div>
    </div>
</section>