<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->  
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
    <head>
        <title>ICE Moon TV | Registration</title>

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
        <style type="text/css">
            .has-error
            {
                border-color: red;
            }
        </style>
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
                        <li><a href="login.php" class="login-btn">Login</a></li>
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

        <!--=== Content Part ===-->
        <div class="body">
            <div class="breadcrumbs margin-bottom-50">
                <div class="container">
                    <h1 class="color-green pull-left">Register</h1>
                    <ul class="pull-right breadcrumb">
                        <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                        <li class="active">Registration</li>
                    </ul>
                </div><!--/container-->
            </div><!--/breadcrumbs-->

            <div class="container">		
                <div class="row-fluid margin-bottom-10">
                    <?php
                    if ($_POST) {
                        $url = 'https://qa.icemoon.tv/aui/spring/registration/save.action?email=' . $_POST['email'] . '&firstPin=' . $_POST['password1'] . '&secondPin=' . $_POST['password2'] . '&policyAccept=true&address.line1=' . $_POST['address1'] . '&address.line2=' . $_POST['address2'] . '&address.postalcode=' . $_POST['postalcode'] . '&firstName=' . $_POST['firstname'] . '&lastName=' . $_POST['lastname'];
                        $post = array();
                        $ch = curl_init();

                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

                        $result = curl_exec($ch);
                        curl_close($ch);
                        $response = json_decode($result, true);

                        if ($response['stageName'] == 'REGISTRATION_SUCCESS') {
                            echo '<div class="alert alert-success">
                                    <p>' . $response["message1"] . ' ' . $response["message2"] . '</p>
                                    <p>' . $response['message3'] . '</p>
                                  </div>';
                            $to = $_POST['email'];
                            $subject = "Email Verification";
                            $txt = "Congratulations!!!, You have successfully Registered with us.From Now onwards you can enjoy all icemoon free and premium contents. Please verify you account";
                            $headers = "From: webmaster@icemoontv.com";

                            mail($to, $subject, $txt, $headers);
                        } else
                            echo '<p style="color:red;">Registration is not success</p>';
                    }
                    ?>
                    <form class="reg-page" method="POST" id="form1">
                        <h3>Register a new account</h3>
                        <div class="controls">
                            <div class="span6">
                                <label>First Name <span class="color-red">*</span></label>
                                <input type="text" class="span12" required name="firstname"/>
                                <span id="firstnamesp" style="color: red;"></span>
                            </div>
                            <div class="span6">
                                <label>Last Name <span class="color-red">*</span></label>
                                <input type="text" class="span12" required name="lastname"/>
                                <span id="lastnamesp" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="controls">    
                            <label>Email Address <span class="color-red">*</span></label>
                            <input type="email" class="span12" required name="email"/>
                            <span id="emailsp" style="color: red;"></span>
                        </div>
                        <div class="controls">
                            <div class="span6">
                                <label>Password <span class="color-red">*</span></label>
                                <input type="password" class="span12" required name="password1"/>
                            </div>
                            <div class="span6">
                                <label>Confirm Password <span class="color-red">*</span></label>
                                <input type="password" class="span12" required name="password2"/>
                            </div>
                            <span id="passwordsp" style="color: red;"></span>
                        </div>
                        <div class="controls">    
                            <label>Address Line 1 <span class="color-red">*</span></label>
                            <input type="text" class="span12" required name="address1"/>
                            <span id="address1sp" style="color: red;"></span>
                        </div>
                        <div class="controls">    
                            <label>Address Line 2 <span class="color-red">*</span></label>
                            <input type="text" class="span12" required name="address2"/>
                            <span id="address2sp" style="color: red;"></span>
                        </div>
                        <div class="controls">    
                            <label>Postal Code <span class="color-red">*</span></label>
                            <input type="text" class="span12" required name="postalcode"/>
                            <span id="postalcodesp" style="color: red;"></span>
                        </div>

                        <div class="controls form-inline">
                            <label class="checkbox"><input type="checkbox" required name="policy" id="policy"/>&nbsp; I read Terms and Conditions <span class="color-red">*</span></label>
                            <button class="btn-u pull-right" type="button" id="btnRegister" >Register</button>
                        </div>
                        <span id="policysp" style="color: red;"></span>
                        <hr />
                        <p>Already Signed Up? Click <a href="login.php" class="color-green">Sign In</a> to login your account.</p>
                    </form>
                </div><!--/row-fluid-->
            </div><!--/container-->		
        </div><!--/body-->
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
            $(document).ready(function() {
                App.init();
                $('form').submit(function(e) {
                    var flag = 0;
                    if ($('input[name=firstname]').val() === '')
                    {
                        $('#firstnamesp').text('First Name is Required');
                        flag++;
                    }
                    else
                        $('#firstnamesp').text('');
                    if ($('input[name=lastname]').val() === '')
                    {
                        $('#lastnamesp').text('Last Name is Required');
                        flag++;
                    }
                    else
                        $('#lastnamesp').text('');
                    if ($('input[name=email]').val() === '')
                    {
                        $('#emailsp').text('Email is Required');
                        flag++;
                    }
                    else
                    {
                        $('#emailsp').text('');
                        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                        if (!regex.test($('input[name=email]').val()))
                        {
                            $('#emailsp').text('Email is Invalid');
                            flag++;
                        }
                    }


                    if ($('input[name=password1]').val() === '' || $('input[name=password2]').val() === '')
                    {
                        $('#passwordsp').text('Password is Required');
                        flag++;
                    }
                    else
                    {
                        $('#passwordsp').text('');
                        if ($('input[name=password1]').val().length < 6)
                        {
                            $('#passwordsp').text('Password must contains minimum 6 characters');
                            flag++;
                        }
                        else
                        {
                            $('#passwordsp').text('');
                            if ($('input[name=password1]').val() !== $('input[name=password2]').val())
                            {
                                $('#passwordsp').text('Passwords not Same');
                                flag++;
                            }
                        }
                    }

                    if ($('input[name=address1]').val() === '')
                    {
                        $('#address1sp').text('Address Line1 is Required');
                        flag++;
                    }
                    else
                        $('#address1sp').text('');
                    if ($('input[name=address2]').val() === '')
                    {
                        $('#address2sp').text('Address Line2 is Required');
                        flag++;
                    }
                    else
                        $('#address2sp').text('');
                    if ($('input[name=postalcode]').val() === '')
                    {
                        $('#postalcodesp').text('Postal Code is Required');
                        flag++;
                    }
                    else
                        $('#postalcodesp').text('');
                    if (!$('#policy').is(":checked"))
                    {
                        $('#policysp').text('Policy is Required');
                        flag++;
                    }
                    else
                        $('#policysp').text('');
                    if (flag !== 0)
                    {
                        $('#btnRegister').text('Register');
                        $('#btnRegister').removeAttr('disabled');
                        e.preventDefault();
                    }
                });
            });
            $('#btnRegister').click(function() {
                $('#btnRegister').text('Loading...');
                $('#btnRegister').attr('disabled', 'disabled');
                $.ajax({
                    type: "POST",
                    url: 'check_email.php',
                    data: "email=" + $('input[name=email]').val(),
                    success: function(msg) {
                        if (msg !== '1')
                        {
                            $('#emailsp').text('');
                            $('form').submit();
                        }
                        else
                        {
                            $('#emailsp').text('Email is already available');
                            $('input[name=email]').focus();
                            $('#btnRegister').text('Register');
                            $('#btnRegister').removeAttr('disabled');
                        }
                    }
                });
            });
        </script>
        <!--[if lt IE 9]>
            <script src="assets/js/respond.js"></script>
        <![endif]-->

    </body>
</html> 