
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Trang đăng nhập Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href="{{asset('public/backend/css/b_font.css')}}" rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>

    <?php
    $message=Session::get('message');
    if($message)
    {
        echo '<span class="arler-text" style="color:red;font-size: 17px;width: 100%;text-align: center;">'.$message.'</span>';
       Session::put('message',null);
    }
    ?>
		<form action="{{URL::to('/admin-dashboard')}}" method="post">
        {{csrf_field()}}
			<input type="email" class="ggg" name="Admin_Email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="Admin_Password" placeholder="PASSWORD" required="">
			<span><input type="checkbox" />Remember Me</span>
			<h6 style="font-size: 15px;"><a href="#">Forgot Password?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
		</form>
		<!-- Don't Have an Account ? -->
		<p><a href="registration.html">Create an account</a>
		<a href="{{URL::to('/login-facebook')}}">Login with Facebook</a>
		<a href="{{URL::to('/login-google')}}">Login with Google</a>
		</p>
</div>
</div>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script type="application/x-javascript"> addEventListener
("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
 </script>

</body>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
</html>
