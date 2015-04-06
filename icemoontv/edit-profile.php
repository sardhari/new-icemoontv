<?php
session_start();
if(empty($_SESSION['userUUID']))
    echo'<script> window.location="login.php"; </script>';
?>
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
        <?php
        if ($_POST) {
            $url = 'https://qa.icemoon.tv/aui/spring/j_spring_security_check?j_username=' . $_SESSION['profile']['fields']['email']['value'] . '&j_password=' . $_SESSION['password'];
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
                echo'<script> window.location="login.php"; </script>';
            else {
                $url = 'https://qa.icemoon.tv/aui/spring/registration/updateProfile.action?firstName=' . $_POST['firstName'] . '&lastName=' . $_POST['lastName'] . '&address.line1=' . $_POST['address_line1'] . '&address.line2=' . $_POST['address_line2'] . '&address.postalCode=' . $_POST['address_postalCode'] . '&address.country=' . $_POST['address_country'] . '&userUUID=' . $_SESSION['userUUID'];
                curl_setopt($ch, CURLOPT_URL, $url);
                $result = curl_exec($ch);
                $response = json_decode($result, true);
                if ($response['stageName'] == 'PROFILE_UPDATE_SUCCESS') {
                    echo'<script> window.location="home.php"; </script>';
                }
            }
        }
        ?>

        <!--=== Top ===-->
        <div class="top">
            <div class="container">
                <div class="top-widget pull-right">
                    <ul class="loginbar">
                        <li class="phone-number">Call Us 123 456 7890</li>
                        <li class="devider">&nbsp;</li>
                        <li><a href="#" class="login-btn">Help</a></li>
                        <li class="devider">&nbsp;</li>
                        <li><a href="logout.php" class="login-btn">Logout</a></li>
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
                <h1 class="color-green pull-left">Edit Profile</h1>
                <ul class="pull-right breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li class="active">Edit Profile</li>
                </ul>
            </div><!--/container-->
        </div><!--/breadcrumbs-->
        <!--=== End Breadcrumbs ===-->

        <!--=== Content Part ===-->
        <div class="container">	
            <div class="row text-center">
                <form method="post">
                    <div class="well well-small">
                        <div class="row">
                            <div class="span5 offset1">
                                <div class="control-group text-left">
                                    <h4><?php echo $_SESSION['profile']['fields']['firstName']['nameLabel'] ?></h4>
                                    <input type="text" class="input-xlarge" name="firstName" value="<?php echo $_SESSION['profile']['fields']['firstName']['value']; ?>" required=""/>
                                </div>
                                <div class="controls text-left">
                                    <h4><?php echo $_SESSION['profile']['fields']['lastName']['nameLabel'] ?></h4>
                                    <input type="text" class="input-xlarge" name="lastName" value="<?php echo $_SESSION['profile']['fields']['lastName']['value']; ?>" required=""/>
                                </div>
                                <div class="control-group text-left">
                                    <h4><?php echo $_SESSION['profile']['fields']['address.line1']['nameLabel'] ?></h4>
                                    <input type="text" class="input-xxlarge" name="address.line1" value="<?php echo $_SESSION['profile']['fields']['address.line1']['value']; ?>" required=""/>
                                </div>
                                <div class="controls text-left">
                                    <h4><?php echo $_SESSION['profile']['fields']['address.line2']['nameLabel'] ?></h4>
                                    <input type="text" class="input-xxlarge" name="address.line2" value="<?php echo $_SESSION['profile']['fields']['address.line2']['value']; ?>" required=""/>
                                </div>
                            </div>
                            <div class="span5 offset1">
                                <div class="control-group text-left">
                                    <h4><?php echo $_SESSION['profile']['fields']['address.postalCode']['nameLabel'] ?></h4>
                                    <input type="text" class="input-xlarge" name="address.postalCode" value="<?php echo $_SESSION['profile']['fields']['address.postalCode']['value']; ?>" required=""/>
                                </div>
                                <div class="controls text-left">
                                    <h4><?php echo $_SESSION['profile']['fields']['address.country']['nameLabel'] ?></h4>
                                    <input type="text" class="input-xlarge" name="address.country" value="<?php echo $_SESSION['profile']['fields']['address.country']['value']; ?>"  required=""/>
                                </div>
                            </div>
                            <div class="span12 text-right">
                                <button class="btn btn-primary" type="submit"><i class="icon-ok"></i> Change</button>
                                <a class="btn btn-danger" href="home.php"><i class="icon-remove"></i> Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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