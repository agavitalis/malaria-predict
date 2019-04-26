<?php
include("controllers/session.php");
if(!isset($_SESSION["email"]) || !isset($_SESSION["admin"])){
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Malaria|Prediction System</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Services" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> <!-- Bootstrap-Core-CSS -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Oleo+Script:400,700&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>
<!-- banner -->
<div data-vide-bg="images/background">
	<div class="center-container">
		<div class="banner wthree">
			<div class="container">
				<div class="banner_top">
					<div class="col-md-6 col-sm-4 col-xs-4 logo">
						<h1><a href="index.php">M|Predict <span>malaria prediction on the go</span></a></h1>
					</div>
					<div class="col-md-6 col-sm-8 col-xs-8 w3_menu">
						<?php
							if(!isset($_SESSION["email"])){
								echo('
									<div class="col-md-6 col-sm-5 col-xs-5 top-nav-text">
										<a class="page-scroll" href="#myModal2" data-toggle="modal" data-hover="LOGIN">LOGIN</a>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-4 top-nav-text">
										<a class="page-scroll" href="#myModal3" data-toggle="modal" data-hover="SIGN UP">SIGN UP</a>
									</div>
								
								');
							}
							else{
								echo('

									<div class="col-md-6 col-sm-5 col-xs-5 top-nav-text">
										<a class="page-scroll" href="#" >'.$_SESSION["email"].'</a>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-4 top-nav-text">
										<a class="page-scroll" href="logout.php">LOGOUT<i class="fa fa-sign-out"></i></a>
									</div>

								');
							}
						?>
						
						<div class="mobile-nav-button">
							<div class="mobile-nav-button__line"></div>
							<div class="mobile-nav-button__line"></div>
							<div class="mobile-nav-button__line"></div>
						</div>
						<nav class="mobile-menu">
							<ul>
								
								<li class="active"><a href="index.php">Home</a></li>								
								<li><a href="admin.php">Setup 1</a></li>
								<li><a href="admin2.php">Setup 2</a></li>
								<li><a href="admin3.php">Setup 3</a></li>
								<li><a href="#" class="scroll">Profile</a></li>
								<?php
								 if(isset($_SESSION["email"])){
									echo('<li><a href="show_prediction.php">Previous Predictions</a></li>');
								 }
								?> 
								
								
							</ul>
						</nav>
					</div>
					<div class="clearfix"> </div>
				</div>
				
				<!-- form -->
				<div class="col-md-12">
					<div class="hdd">
					<p>Hello, set up probability values here</p>
					</div>
				</div>
				
                <div class="col-md-4 callbacks_container form-w3l-agil3">
					<div class="book-form">
					<p>BLOOD GROUP</p>
					   <form action="#" method="post">
							
							<div class="form-date-w3-agileits">
									<label><i class="fa fa-question" aria-hidden="true"></i> AA :</label>
									<input  type="number" name="aa" value="" required="">
							</div>
							
							<div class="form-date-w3-agileits">
									<label><i class="fa fa-question" aria-hidden="true"></i> AS :</label>
									<input  type="number"  name="as" value="" required="">
							</div>
                            
                            <div class="form-date-w3-agileits">
									<label><i class="fa fa-question" aria-hidden="true"></i> SS :</label>
									<input  type="number"  name="ss" value="" required="">
							</div>
							<div class="form-date-w3-agileits blood_message alert hidden">
                                <i class="" id="blood_text"></i>
                            </div>
							<div class="form-left-agileits-submit">
								
								<input id="blood_variable" type="button" value="ADD">
							  
							</div>
						</form>
					</div>
                </div>
                
                 <div class="col-md-4 callbacks_container form-w3l-agil3">
					<div class="book-form">
					<p>MOSQUITO TYPE</p>
					   <form action="#" method="post">
							
							<div class="form-date-w3-agileits">
									<label><i class="fa fa-question" aria-hidden="true"></i>Female Anophelis :</label>
									<input  type="number" name="fam" value="" required="">
							</div>
							
							<div class="form-date-w3-agileits">
									<label><i class="fa fa-question" aria-hidden="true"></i>Other Types :</label>
									<input  type="number" name="oth" value="" required="">
							</div>
                            
                            <div class="form-date-w3-agileits">
									<label><i class="fa fa-question" aria-hidden="true"></i>I dont Know:</label>
									<input  type="number" name="idk" value="" required="">
							</div>
							<div class="form-date-w3-agileits mosquito_message alert hidden">
                                <i class="" id="mosquito_text"></i>
                            </div>	 
							<div class="form-left-agileits-submit">
								
								<input id="mosquito_variable" type="button" value="ADD">
								
							</div>
						</form>
					</div>
				</div>

				 <div class="col-md-4 callbacks_container form-w3l-agil3">
					<div class="book-form">
					<p>LAST MEDICATION</p>
					   <form action="#" method="post">
							
							<div class="form-date-w3-agileits">
									<label><i class="fa fa-question" aria-hidden="true"></i> Over two weeks ago :</label>
									<input  type="number" name="two_weeks_ago" value="" required="">
							</div>
							
							<div class="form-date-w3-agileits">
									<label><i class="fa fa-question" aria-hidden="true"></i>Over one month ago :</label>
									<input  type="number" name="one_month_ago" value="" required="">
							</div>
                            
                            <div class="form-date-w3-agileits">
									<label><i class="fa fa-question" aria-hidden="true"></i>Over three months ago:</label>
									<input  type="number" name="three_months_ago" value="" required="">
							</div>
							<div class="form-date-w3-agileits medication_message alert hidden">
                                <i class="" id="medication_text"></i>
                            </div>
							<div class="form-left-agileits-submit">
								
									<input id="medication_variable" type="button" value="Predict">
								  
							</div>
						</form>
					</div>
                </div>
				<div class="clearfix"> </div>
				<!-- //form -->
			</div>
		</div>
		<!-- modal -->
		<div class="modal about-modal w3-agileits fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
					</div> 
					<div class="modal-body login-page "><!-- login-page -->     
						<div class="login-top sign-top">
							<div class="agileits-login">
							<h5>Login Here</h5>
							<form action="#" method="post">
								<input type="email" class="email" id="login_email" placeholder="Email" required=""/>
								<input type="password" class="password" id="login_password" placeholder="Password" required=""/>
								<div class="wthree-text"> 
									<ul> 
										<li>
											<label class="anim">
												<input type="checkbox" class="checkbox">
												<span> Remember me ?</span> 
											</label> 
										</li>
									</ul>
									<div class="clearfix"> </div>
								</div>  
								<div class="text-center">
									<p class="hidden alert" id="login_message"></p>
								</div>
								<div class="w3ls-submit"> 
									<input type="button" id="login" value="LOGIN">  	
								</div>	
							</form>

							</div>  
						</div>
					</div>  
				</div> <!-- //login-page -->
			</div>
		</div>
		<!-- //modal --> 
		<!-- modal -->
		<div class="modal about-modal w3-agileits fade" id="myModal3" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
					</div> 
					<div class="modal-body login-page "><!-- login-page -->     
						<div class="login-top sign-top">
							<div class="agileits-login">
							<h5>Sign Up Here</h5>
							<form action="#" method="post">
								<input type="text" id="signup_name" placeholder="Name" required=""/>
								<input type="email"  id="signup_email" placeholder="Email" required=""/>
								<input type="password" id="signup_password" placeholder="Password" required=""/>
								<input type="password" id="signup_password2" placeholder="Confirm Password" required="">
								<div class="wthree-text"> 
									<ul> 
										<li>
											<label class="anim">
												<input type="checkbox" class="checkbox">
												<span> I accept the terms of use</span> 
											</label> 
										</li>
									</ul>
									<div class="clearfix"> </div>
								</div>
								<div>
									<p class="hidden alert" id="signup_message"></p>
								</div>  
								<div class="w3ls-submit"> 
									<input type="button" id="signup" value="Register">  	
								</div>	
							</form>
							</div>  
						</div>
					</div>  
				</div> <!-- //login-page -->
			</div>
		</div>
		<!-- //modal --> 
	</div>
</div>
<!-- //banner -->




<!-- footer -->
<div class="footer" id="contact">
	
	<!-- copyright -->
	<div class="copyright">
		<p>All Rights Reserved|Design by<a href="jakomita.com"> Jakomita</a> </p>
	</div>
	<!-- //copyright -->
</div>
<!-- //footer -->

<!-- js-scripts -->		
		
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
	<!-- //js -->
	<!-- responsiveslider -->
	<script src="js/responsiveslides.min.js"></script>
		<script>
			// You can also use "$(window).load(function() {"
			$(function () {
			  // Slideshow 4
			  $("#slider3").responsiveSlides({
				auto: true,
				pager:true,
				nav:false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
				  $('.events').append("<li>before event fired.</li>");
				},
				after: function () {
				  $('.events').append("<li>after event fired.</li>");
				}
			  });
		
			});
		 </script>
	<!-- //responsiveslider -->
	<!-- menu -->
	<script>
		$(document).ready(function () {
		  $('.mobile-nav-button').on('click', function() {
		  $( ".mobile-nav-button .mobile-nav-button__line:nth-of-type(1)" ).toggleClass( "mobile-nav-button__line--1");
		  $( ".mobile-nav-button .mobile-nav-button__line:nth-of-type(2)" ).toggleClass( "mobile-nav-button__line--2");  
		  $( ".mobile-nav-button .mobile-nav-button__line:nth-of-type(3)" ).toggleClass( "mobile-nav-button__line--3");  
		  
		  $('.mobile-menu').toggleClass('mobile-menu--open');
		  return false;
		}); 
		});
	</script>
	<!-- //menu -->
	
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- for-bottom-to-top smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //for-bottom-to-top smooth scrolling -->

	<!-- video-js -->
	<script src="js/jquery.vide.min.js"></script>
	<!-- //video-js -->	
	
	<!--logic and action scritps-->
	<script src="js/auth.js"></script>
	<script src="js/admin_set_probability.js"></script>
	<!--ends-->

<!-- //js-scripts -->
</body>
</html>