<?php session_start(); ?>
<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->  
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
    <head>
        <title>ICE Moon TV | Login</title>

        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS Global Compulsory-->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/headers/header1.css">
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="assets/css/style_responsive.css">
        <link rel="shortcut icon" href="favicon.ico">
        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css" type="text/css" media="screen">
        <link rel="stylesheet" href="assets/plugins/parallax-slider/css/parallax-slider.css" type="text/css">
        <link rel="stylesheet" href="assets/plugins/bxslider/jquery.bxslider.css">
        <!-- CSS Theme -->
        <link rel="stylesheet" href="assets/css/themes/default.css" id="style_color">
        <link rel="stylesheet" href="assets/css/themes/headers/default.css" id="style_color-header-1">   
    </head> 

    <body>


        <!--=== Top ===-->
        <div class="top">
            <div class="container">
                <div class="top-widget pull-right">
                    <ul class="loginbar">
                        <li class="phone-number">Call Us 123 456 7890</li>
                        <li class="devider">&nbsp;</li>
                        <li><a href="#" class="login-btn">Help</a></li>
                        <li class="devider">&nbsp;</li>
                        <li><a href="#" class="login-btn">Login</a></li>
                    </ul>
                    <ul class="social-icons pull-right">
                        <li><a href="#" data-original-title="Facebook" class="social_facebook"></a></li>
                        <li><a href="#" data-original-title="Twitter" class="social_twitter"></a></li>
                        <li><a href="#" data-original-title="Goole Plus" class="social_googleplus"></a></li>
                        <li><a href="#" data-original-title="Linkedin" class="social_linkedin"></a></li>
                    </ul>
                </div>

            </div>
        </div><!--/top-->
        <!--=== End Top ===-->

        <!--=== Header ===-->
        <div class="header">
            <div class="container"> 
                <!-- Logo -->
                <div class="logo"> <a href="index.html"><img id="logo-header" src="assets/img/logo.png" alt="Ice MoonTV Logo"></a> </div>
                <!-- /logo --> 

                <!-- Menu -->
                <div class="navbar">
                    <div class="navbar-inner"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a><!-- /nav-collapse -->
                        <div class="nav-collapse collapse">
                            <ul class="nav top-2">
                                <li class="active"> <a href="#" >Home </a>
                                </li>
                                <li> <a href="livechannels.html">Live Channels</a>
                                </li>
                                <li> <a href="ondemand.html">On Demand</a>
                                </li>
                                <li> <a href="pricing.html">Mix & Match Pricing</a>
                                </li>
                                <li> <a href="#">How it works</a>
                                </li>
                                <li> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Support<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Sales</a></li>
                                        <li><a href="#">Billing</a></li>
                                        <li><a href="faq.html">FAQs</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                    <b class="caret-out"></b> </li>
                            </ul>
                        </div>
                        <!-- /nav-collapse --> 
                    </div>
                    <!-- /navbar-inner --> 
                </div>
                <!-- /navbar --> 
            </div>
            <!-- /container --> 
        </div><!--/header -->      
        <!--=== End Header ===-->

        <!--=== Breadcrumbs ===-->
        <div class="breadcrumbs margin-bottom-40">
            <div class="container">
                <h1 class="color-green pull-left">Login</h1>
                <ul class="pull-right breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li class="active">Login</li>
                </ul>
            </div><!--/container-->
        </div><!--/breadcrumbs-->
        <!--=== End Breadcrumbs ===-->

        <!--=== Content Part ===-->
        <div class="container">	
            <div class="row text-center">
                <?php
                if ($_POST) {
                    $url = 'https://qa.icemoon.tv/aui/spring/j_spring_security_check?j_username=' . $_POST['email'] . '&j_password=' . $_POST['password'];
                    $post = array();

                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookies.txt');

                    $result = curl_exec($ch);

                    $response = json_decode($result, true);



                    if ($response['stageName'] == 'LOGIN_STAGE')
                        echo '<p style="color:red;">Incorrect Email or Password</p>';
                    else {
                        $_SESSION['userUUID'] = $response['userUUID'];
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['password'] = $_POST['password'];
                        echo '<div class="alert alert-success">Please wait while we are trying to access your profile.</div>';
                        $url = 'https://qa.icemoon.tv/aui/spring/registration/viewProfile.action?userUUID=' . $response['userUUID'];
                        curl_setopt($ch, CURLOPT_URL, $url);
                        $result = curl_exec($ch);
                        $profile = json_decode($result, true);
                        $_SESSION['profile'] = $profile;

                        echo'<script> window.location="home.php"; </script>';
                        die();
                    }
                }
                ?>
            </div>
            <div class="row-fluid">
                <form class="log-page" method="POST">
                    <h3>Login to your account</h3>    
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input class="input-xlarge" type="email" placeholder="E-Mail Address" name="email" required>
                    </div>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-lock"></i></span>
                        <input class="input-xlarge" type="password" placeholder="Username" name="password" required>
                    </div>
                    <div class="controls form-inline">
                        <label class="checkbox"><input type="checkbox" /> Stay Signed in</label>
                        <button class="btn-u pull-right" type="submit">Login</button>
                    </div>
                    <hr />
                    <p>New User? <a class="color-green" href="registration.php">Register here</a> to Sign Up.</p>
                    <hr />
                    <h4>Forget your Password ?</h4>
                    <p>no worries, <a class="color-green" href="#">click here</a> to reset your password.</p>

                </form>
            </div><!--/row-fluid-->
        </div><!--/container-->		
        <!--=== End Content Part ===-->

        <!--=== Footer ===-->
        <div class="footer">
            <div class="container">
                <div class="row-fluid">
                    <div class="span3"> 
                        <!-- About -->
                        <div class="headline">
                            <h3>About</h3>
                        </div>
                        <p class="margin-bottom-25">Lorem ipsum dolor sit amet, <strong>nec facilisis dignissim ne</strong>, mucius constituto dissentias an mel. Sumo habeo virtute ut eam. </p>
                    </div>
                    <!--/span3-->

                    <div class="span3">
                        <!--<div class="headline">
                          <h3>Useful Links</h3>
                        </div>
                        <ul class="links-block">
                          <li><a href="#">Home</a></li>
                          <li><a href="#"><a href="#" >Products</a></li>
                          <li><a href="#"><a href="#" >Contact Us</a></li>
                        </ul> -->   
                    </div>
                    <!--/span3-->

                    <div class="span3"> 
                        <!-- Monthly Newsletter -->
                        <div class="headline">
                            <h3>Stay Connected</h3>
                        </div>
                        <ul class="social-icons">
                            <li><a href="#" data-original-title="Facebook" class="social_facebook"></a></li>
                            <li><a href="#" data-original-title="Twitter" class="social_twitter"></a></li>
                            <li><a href="#" data-original-title="Goole Plus" class="social_googleplus"></a></li>
                            <li><a href="#" data-original-title="Linkedin" class="social_linkedin"></a></li>
                        </ul>
                    </div>
                    <!--/span3-->
                    <div class="span3"> 
                        <!-- Monthly Newsletter -->
                        <div class="headline">
                            <h3>Contact Us</h3>
                        </div>
                        <address>
                            25, Lorem Ipsum Street, Toronto <br />
                            Ontario, CA <br />
                            Phone:  123 456 7890 <br />
                            Email: <a href="mailto:info@icemoontv.ca" class="">info@icemoontv.ca</a>
                        </address>
                    </div>
                    <!--/span3--> 
                </div>
                <!--/row-fluid--> 
            </div>
            <!--/container--> 
        </div><!--/footer-->	
        <!--=== End Footer ===-->

        <!--=== Copyright ===-->
        <div class="copyright">
            <div class="container">
                <div class="row-fluid">
                    <div class="span8">
                        <p>2014 &copy; IceMoonTV. ALL Rights Reserved. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
                    </div>
                    <div class="span4"> <a href="index.html"><img id="logo-footer" src="assets/img/logo2.png" class="pull-right" alt="" /></a> </div>
                </div>
                <!--/row-fluid--> 
            </div>
            <!--/container--> 
        </div><!--/copyright-->	
        <!--=== End Copyright ===-->

        <!-- JS Global Compulsory -->           
        <script type="text/javascript" src="assets/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="assets/js/modernizr.custom.js"></script>        
        <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
        <!-- JS Implementing Plugins -->           
        <script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
        <!-- JS Page Level -->           
        <script type="text/javascript" src="assets/js/app.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                App.init();
            });
        </script>
        <!--[if lt IE 9]>
            <script src="assets/js/respond.js"></script>
        <![endif]-->

    </body>
</html> 