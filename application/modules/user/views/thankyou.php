<!-- Google Tag Manager -->
<script>
 function gtag(){dataLayer.push(arguments)};
  gtag('subscription',sessionStorage.getItem("sub"));
  gtag('amount',sessionStorage.getItem("amt"));
  gtag('payment_id',sessionStorage.getItem("pay"));

(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TJ9JR8KZ');</script>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ9JR8KZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager -->
</head>

<body>
<div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h4 class="display-4 text-white animated slideInDown mb-4">
                 Thank you for payment
            </h4>
            <h6 class="display-4 text-white animated slideInDown mb-2">Subscription Added Successfully</h6>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white" href="<?php echo base_url('user/index');?>">Home</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        Payment
                    </li>
                </ol>
            </nav>
            <br><br>
            <section id="our-service" class="home-page">
                <div class="container">
                    <div>
                        <div class="main text-center">
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-4">
                                    <div class="" style="background-color:transparent">
                                        <ul class="list-group">
                                            <li class="text-dark animated slideInDown list-group-item">Subscription Id <span class="text-dark badge" id="sub">4564</span></li>
                                            <li class="list-group-item">Amount <span class="text-dark badge" id="amt"></span></li>
                                            <li class="list-group-item">Transaction Id <span class="text-dark badge" id="pay"></span></li>
                                        </ul>
                                    </div>
                                </div>                                 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
    <script>
        window.onload = function() {
            console.log("dfkjhduifg");
            document.getElementById("sub").innerHTML = sessionStorage.getItem("sub");
            document.getElementById("amt").innerHTML = sessionStorage.getItem("amt");
            document.getElementById("pay").innerHTML = sessionStorage.getItem("pay");
        };
    </script>