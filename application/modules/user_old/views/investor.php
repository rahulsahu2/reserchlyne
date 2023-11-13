  <?php 

   $info1_data= $this->common_model->getsingle('home_info', array('id'=>1));
  $info_data= $this->common_model->getsingle('investor_charter', array('id'=>1)); ?>
<style>
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .65), rgba(0, 0, 0, .65)), url(<?php echo base_url();?>assets/img/<?php echo $info1_data->investor_charter_image;?>) center center no-repeat;
    background-size: cover;
    /*height: 400px;*/
}


</style>
   
 <style>

table {
    width: 100%;
    table-layout: fixed;
}

.tbl-header {
    background-color: rgba(255, 255, 255, 0.3);
}

.tbl-content {
    height: 300px;
    overflow-x: auto;
    margin-top: 0px;
    border: 1px solid rgb(0 0 0 / 7%);
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
    border-radius: 10px;
    /* transition: all 0.4s ease-in-out; */
}

.card-sec:hover {
    box-shadow: 10px 10px 10px #00000014;
    /* transform: translate(-10px); */
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
    /* transition: all 0.4s ease-in-out; */
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

.text-sec2 {
    margin: 20px;
}


@media (max-width: 1440px) {

.card-sec {
display: block;
background: #84adea4f;
/* padding: 30px; */
border-radius: 10px;
/* transition: all 0.4s ease-in-out; */
}

.num-sec {
background-color: #add3fbc9;
border-radius: 6px 0px 0px 6px;
padding: 20px;
display: block;
flex-direction: row;
justify-content: center;
width: 100%;
}

.text-sec {
border-radius: 0px 6px 6px 0px;
background: #c6e2ff;
display: flex;
flex-direction:column;
justify-content: center;
padding: 30px;
width: 100%;
}


.num-sec h1 {
background: #18233373;
width: 60px;
height: 60px;
border-radius: 50%;
line-height: 55px;
text-align: center;
color: white;
/* transition: all 0.4s ease-in-out; */
border: 3px solid #6f86a1;
}


.text-sec p {
width: 100%;
}

.text-sec ul {
margin: 0px;
padding: 0px;
}

.text-sec2 ul {
    margin: 20px;
}

}


@media (max-width: 1280px) {

.card-sec {
display: block;
background: #84adea4f;
/* padding: 30px; */
border-radius: 10px;
/* transition: all 0.4s ease-in-out; */
}

.num-sec {
background-color: #add3fbc9;
border-radius: 6px 0px 0px 6px;
padding: 20px;
display: block;
flex-direction: row;
justify-content: center;
width: 100%;
}

.text-sec {
border-radius: 0px 6px 6px 0px;
background: #c6e2ff;
display: flex;
flex-direction:column;
justify-content: center;
padding: 30px;
width: 100%;
}


.num-sec h1 {
background: #18233373;
width: 60px;
height: 60px;
border-radius: 50%;
line-height: 55px;
text-align: center;
color: white;
/* transition: all 0.4s ease-in-out; */
border: 3px solid #6f86a1;
}


.text-sec p {
width: 100%;
}

.text-sec ul {
margin: 0px;
padding: 0px;
}


}


@media (max-width: 992px) {

.card-sec {
display: block;
background: #84adea4f;
/* padding: 30px; */
border-radius: 10px;
/* transition: all 0.4s ease-in-out; */
}

.num-sec {
background-color: #add3fbc9;
border-radius: 6px 0px 0px 6px;
padding: 20px;
display: block;
flex-direction: row;
justify-content: center;
width: 100%;
}

.text-sec {
border-radius: 0px 6px 6px 0px;
background: #c6e2ff;
display: flex;
flex-direction:column;
justify-content: center;
padding: 30px;
width: 100%;
}


.num-sec h1 {
background: #18233373;
width: 60px;
height: 60px;
border-radius: 50%;
line-height: 55px;
text-align: center;
color: white;
/* transition: all 0.4s ease-in-out; */
border: 3px solid #6f86a1;
}


.text-sec p {
width: 100%;
}

.text-sec ul {
margin: 0px;
padding: 0px;
}


}

@media (max-width: 768px) {

    .card-sec {
    display: block;
    background: #84adea4f;
    /* padding: 30px; */
    border-radius: 10px;
    /* transition: all 0.4s ease-in-out; */
}

    .num-sec {
    background-color: #add3fbc9;
    border-radius: 6px 0px 0px 6px;
    padding: 20px;
    display: block;
    flex-direction: row;
    justify-content: center;
    width: 100%;
}

 .text-sec {
    border-radius: 0px 6px 6px 0px;
    background: #c6e2ff;
    display: flex;
    flex-direction:column;
    justify-content: center;
    padding: 30px;
    width: 100%;
}


.num-sec h1 {
    background: #18233373;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    line-height: 55px;
    text-align: center;
    color: white;
    /* transition: all 0.4s ease-in-out; */
    border: 3px solid #6f86a1;
}


.text-sec p {
    width: 100%;
}

.text-sec ul {
    margin: 0px;
    padding: 0px;
}


}


 

@media (max-width: 360px) {

    .card-sec {
    display: block;
    background: #84adea4f;
    /* padding: 30px; */
    border-radius: 10px;
    /* transition: all 0.4s ease-in-out; */
}

    .num-sec {
    background-color: #add3fbc9;
    border-radius: 6px 0px 0px 6px;
    padding: 20px;
    display: block;
    flex-direction: row;
    justify-content: center;
    width: 100%;
}

 .text-sec {
    border-radius: 0px 6px 6px 0px;
    background: #c6e2ff;
    display: flex;
    flex-direction:column;
    justify-content: center;
    padding: 30px;
    width: 100%;
}


.num-sec h1 {
    background: #18233373;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    line-height: 55px;
    text-align: center;
    color: white;
    /* transition: all 0.4s ease-in-out; */
    border: 3px solid #6f86a1;
}


.text-sec p {
    width: 100%;
}

.text-sec ul {
    margin: 0px;
    padding: 0px;
}

.text-sec2 {
margin: 0px;
padding: 0px;
width: 85%;
}

.text-sec2 ul {
margin: 0px;
padding: 0px;
width: 85%;
}

.text-sec2 ul li {
    width: 100%;
    padding: 20px;
}

.text-sec2 ul li a {
    width: 100%;
    font-size: 10px;
    background-color: #fff;
}



}


@media (max-width: 320px) {

.card-sec {
display: block;
background: #84adea4f;
/* padding: 30px; */
border-radius: 10px;
/* transition: all 0.4s ease-in-out; */
}

.num-sec {
background-color: #add3fbc9;
border-radius: 6px 0px 0px 6px;
padding: 20px;
display: block;
flex-direction: row;
justify-content: center;
width: 100%;
}

.text-sec {
border-radius: 0px 6px 6px 0px;
background: #c6e2ff;
display: flex;
flex-direction:column;
justify-content: center;
padding: 30px;
width: 100%;
overflow: hidden;
}


.num-sec h1 {
background: #18233373;
width: 60px;
height: 60px;
border-radius: 50%;
line-height: 55px;
text-align: center;
color: white;
/* transition: all 0.4s ease-in-out; */
border: 3px solid #6f86a1;
}


.text-sec p {
width: 100%;
}

.text-sec ul {
margin: 0px;
padding: 0px;
}

.text-sec2 {
margin: 0px;
padding: 0px;
width: 85%;
}

.text-sec2 ul {
margin: 0px 20px;
padding: 0px;
width: 90%;
}

.text-sec2 ul li {
    width: 100%;
    padding: 20px;
}

.text-sec2 ul li a {
    width: 100%;
    font-size: 10px;
    background-color: #fff;
}




}

@media only screen and (max-width: 768px) and (min-width: 360px)  {


    .card-sec {
display: block;
background: #84adea4f;
/* padding: 30px; */
border-radius: 10px;
/* transition: all 0.4s ease-in-out; */
}

.num-sec {
background-color: #add3fbc9;
border-radius: 6px 0px 0px 6px;
padding: 20px;
display: block;
flex-direction: row;
justify-content: center;
width: 100%;
}

.text-sec {
border-radius: 0px 6px 6px 0px;
background: #c6e2ff;
display: flex;
flex-direction:column;
justify-content: center;
padding: 30px;
width: 100%;
overflow: hidden;
}


.num-sec h1 {
background: #18233373;
width: 60px;
height: 60px;
border-radius: 50%;
line-height: 55px;
text-align: center;
color: white;
/* transition: all 0.4s ease-in-out; */
border: 3px solid #6f86a1;
}


.text-sec p {
width: 100%;
}

.text-sec ul {
margin: 0px;
padding: 0px;
}

.text-sec2 {
margin: 0px 30px;
padding: 0px;
width: 80%;

}

.text-sec2 ul {
margin: 0px;
padding: 0px;
width: 90%;

}

.text-sec2 ul li {
    width: 100%;
    padding: 0 20px;
}

.text-sec2 ul li a {
    width: 100%;
    font-size: 10px;
}



}





</style>  





<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-4 text-white animated slideInDown mb-4">Investor Charter</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="<?php echo base_url('user/index');?>">Home</a>
                    </li>
                    <!-- <li class="breadcrumb-item">
                        <a class="text-white" href="#">Pages</a>
                    </li> -->
                    <li class="breadcrumb-item icon-color active" aria-current="page">
                        Investor Charter
                    </li>
                </ol>
            </nav>
        </div>
    </div> 


<section class="py-4">

<div class="container">

<div class="row">
<div class="title common text-center">
                <h2 class="text-center text-capitalize mb-5">
                    Investor Charter In Respect Of Research Analyst (RA)</h2>

            </div>
</div>


<div class="row g-5 justify-content-center">


<div class="col-md-6 d-flex">
                    <div class="card-sec">
                        <div class="num-sec">
                            <h1>A</h1>
                            <p> <?php echo $info_data->a_title;?></p>
                        </div>
                        <div class="text-sec">
                              <ul>
                                <?php echo $info_data->a_description;?>
                            </ul>
              
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card-sec">
                        <div class="num-sec">
                            <h1>B</h1>
                            <p><?php echo $info_data->b_title;?></p>
                        </div>
                        <div class="text-sec">
                            <ul>
                                <?php echo $info_data->b_description;?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="card-sec">
                        <div class="num-sec">
                            <h1>C</h1>
                            <p> <?php echo $info_data->c_title;?></p>
                        </div>
                        <div class="text-sec">
                            <ul>
                                 <?php echo $info_data->c_description;?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card-sec">
                        <div class="num-sec">
                            <h1>D</h1>
                            <p> <?php echo $info_data->d_title;?></p>
                        </div>
                        <div class="text-sec">
                             <?php echo $info_data->d_description;?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="card-sec">
                        <div class="num-sec">
                            <h1>E</h1>
                            <p><?php echo $info_data->e_title;?></p>
                        </div>
                        <div class="text-sec2">
                        <?php echo $info_data->e_description;?>
                        </div>
                    </div>
                </div>


</div>

</div>
    
</section>

 <!-- <section class="py-4">
        <div class="container">
         
            
              </div>
            <div class="row g-5 justify-content-center">
                
            </div>

    </section> -->