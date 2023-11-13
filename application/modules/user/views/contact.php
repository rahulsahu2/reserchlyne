<?php $info_data = $this->common_model->getsingle('home_info', array('id' => 1)); ?>
<?php $contact_data = $this->common_model->getsingle('contact_content', array('id' => 1)); ?>
<style>
    .page-header {
        background: linear-gradient(rgba(0, 0, 0, .65), rgba(0, 0, 0, .65)), url(<?php echo base_url(); ?>assets/img /<?php echo $info_data->contact_us_image; ?>) center center no-repeat;
        background-size: cover;
    }

    .location-i {
        display: flex;
        align-items: center;
        gap: 17px;
    }

    .location-i p {
        margin-bottom: 0;
    }

    .border-bg {
        border: solid 1px #f0efef;
        background-color: #fff;
        padding: 20px;
    }

    .location-i i {
        background: #3385d9;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        color: white;
    }

    .greenclr {
        color: #00d684;
    }

    .title {
        -webkit-text-fill-color: transparent;
        background: -webkit-linear-gradient(left, #1bc7a7 25%, #006aff);
        -webkit-background-clip: text;
        color: #36afc4;
    }

    @media screen and (min-width: 300px) and (max-width: 799px) {
        .fcon {

            width: 86px !important;
        }
    }
</style>
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4">
            Contact Us
        </h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo base_url('user/index'); ?>">Home</a>
                </li>
                <!-- <li class="breadcrumb-item">
                        <a class="text-white" href="#">Pages</a>
                    </li> -->
                <li class="breadcrumb-item active" aria-current="page">
                    Contact Us
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">



            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="border-start border-5 border-color ps-4 mb-5">
                    <h6 class="text-body text-uppercase mb-2">Contact Us</h6>
                    <h1 class="display-6 mb-0">
                        <span class="title">
                            <?php echo $contact_data->title; ?>
                        </span>
                    </h1>
                </div>

                <div class="form-icon">
                    <div class="location-i mt-3">
                        <i class="fas fa-map-marker-alt fcon"></i>
                        <p>
                            <?php echo $contact_data->address; ?>
                        </p>
                    </div>

                    <div class="location-i mt-3">
                        <i class="fas fa-phone-alt"></i>
                        <p>
                            <?php echo $contact_data->mobile; ?>
                        </p>
                    </div>
                    <div class="location-i mt-3">
                        <i class="fas fa-envelope"></i>
                        <p>
                            <?php echo $contact_data->email; ?>
                        </p>
                    </div>
                    <div class="location-i mt-3">
                        <i class="fas fa-envelope"></i>
                        <p>
                            <?php echo $contact_data->bussiness_email; ?>
                        </p>
                    </div>
                </div>

            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                <?php if ($msg != '') { ?>
                    <div>
                        <span style="color:green;">
                            <?php echo $msg; ?>
                        </span>
                    </div>
                <?php } ?>

                <!-- <form> -->
                <!-- <p id ="result"></p> -->
                <!--<form action="<?php echo base_url('user/contact') . '#form'; ?>" method="POST">-->
                <form action="<?php echo base_url('user/contact'); ?>" method="POST">
                    <div class="row g-3 ">
                        <div class="row border-bg g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 bg-light w-100" name="name"
                                        id="name" placeholder="Your Name " required>
                                    <label for="name">Your Name</label>
                                    <span id="e_name" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="gmail" class="form-control border-0 bg-light w-100"
                                        id="gmail" placeholder="Your Email" required>
                                    <label for="email">Your Email</label>
                                    <span id="e_gmail" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 bg-light w-100" name="mobile"
                                        id="mobile" maxlength="10"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"
                                        placeholder="Phone Number" required>
                                    <label for="subject">Phone Number</label>
                                    <span id="e_mobile" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 bg-light w-100" name="subject"
                                        id="subject" placeholder="Subject" required>
                                    <label for="subject">Subject</label>
                                    <span id="e_subject" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0 bg-light w-100" name="message"
                                        placeholder="Leave a message here" id="message" style="height: 150px"
                                        required></textarea>
                                    <label for="message">Message</label>
                                    <span id="e_message" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <!--<button class="btn same-color text-white py-3 px-5" type="submit" value="submit" name="submit">Send  Message</button>-->
                                <button class="btn same-color text-white py-3 px-5" type="button"
                                    onclick="submit_form(this)" value="submit" name="submit">
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
<script>
    window.onload = function () {
        $("#spin").hide();
    }
    function submit_form(e) {
        $(e).attr("disabled", true);
        $("#spin").show();
        var name = $("#name").val();
        var gmail = $("#gmail").val();
        var mobile = $("#mobile").val();
        var subject = $("#subject").val();
        var message = $("#message").val();

        $("#e_name").html('');
        $("#e_gmail").html('');
        $("#e_mobile").html('');
        $("#e_subject").html('');
        $("#e_message").html('');
        //alert(mobile.length);
        if (name == '') {
            $("#e_name").html("Name required.");
        } else if (gmail == '') {
            $("#e_gmail").html("Email required.");
        } else if (mobile == '') {
            $("#e_mobile").html("Valid mobile number required.");
        } else if (mobile.length != 10) {
            $("#e_mobile").html("Valid mobile number required.");
        } else if (subject == '') {
            $("#e_subject").html("Subject required.");
        } else if (message == '') {
            $("#e_message").html("Message required.");
        } else {
            let formData = new FormData();
            formData.append('name', name);
            formData.append('gmail', gmail);
            formData.append('mobile', mobile);
            formData.append('subject', subject);
            formData.append('message', message);
            $.ajax({
                url: "<?php echo base_url('user/contactForm'); ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                async: true,
                success: function (data) {
                    if (data == 1) {
                        $("#spin").hide();
                        $(e).attr("disabled", false);
                        Swal.fire({
                            icon: 'success',

                            text: 'Thank you for your Enquiry. We will get in touch .',
                        });
                        //contactFormMail(name,gmail,mobile,subject,message);
                        $("#name").val('');
                        $("#gmail").val('');
                        $("#mobile").val('');
                        $("#subject").val('');
                        $("#message").val('');
                    } else {
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

    function contactFormMail(name, gmail, mobile, subject, message) {
        //alert(name+'-'+gmail+'-'+mobile+'-'+subject+'-'+message);
        let formData = new FormData();
        formData.append('name', name);
        formData.append('gmail', gmail);
        formData.append('mobile', mobile);
        formData.append('subject', subject);
        formData.append('message', message);
        $.ajax({
            url: "<?php echo base_url('user/contactFormMail'); ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            async: true,
            success: function (data) {
                console.log(data);
                //alert(data);

            }
        });
    }
</script>
<!-- Contact End -->
<!--  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {
        $('form').bind('submit', function () {
          $.ajax({
            type: 'post',
            url: '<?php echo base_url('user/contact'); ?>',
            data: $('form').serialize(),
            success: function (response) {
                $("#result").html('Thank you for your Enquiry. We will get in touch!'); 
                $("#result").addClass("alert alert-success");
            }
          });
          return false;
        });
      });
    </script> -->