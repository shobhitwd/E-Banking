<!DOCTYPE HTML>
<html lang="zxx">
<head>
<title>Transfer Money</title>
<link rel="shortcut icon" href="images/ebanking.jpg" />
<?php
	$con = mysqli_connect('localhost', 'root', '', 'info');
	if(isset($_POST['submit']))
	{
		$from_acc = $_POST['from_acc'];
		$to_acc = $_POST['to_acc'];
		$amount = $_POST['amount'];
		?>
			<div id="myModal" class="modal">
				<!-- Modal content -->
				<div class="modal-content">
					<span class="close">&times;</span>
					<p align=center id="warning_text"><b></b></p>
				</div>
			</div>
			<script>
				var modal = document.getElementById("myModal");
				var span = document.getElementsByClassName("close")[0];
				function display(var1) {
					document.getElementById("warning_text").innerHTML = var1;
					modal.style.display = "block";
				}
				span.onclick = function() {
				  modal.style.display = "none";
				}

				window.onclick = function(event) {
				  if (event.target == modal) {
					modal.style.display = "none";
				  }
				}
			</script> 
		<?php	
		if(empty($from_acc) || empty($to_acc) || empty($amount))
		{ 
			echo"<script>display('Please enter all the details!');</script>";
		}
		else
		{
			if($from_acc == $to_acc)
			{ 
				echo"<script>display('Both the account numbers are same!');</script>";
			}
			else
			{
				$sql = "SELECT * from customers where ID='$from_acc'";
				
				$result = mysqli_query($con, $sql);
				if(mysqli_num_rows($result) > 0)
				{ 
					while($row = mysqli_fetch_assoc($result)) {
						if($amount > $row['BankBalance'])
						{
							echo"<script>display('Bank Balance of Sender is smaller than the amount entered!');</script>";
						}
						else
						{
							$sql1 = "SELECT * from customers where ID='$to_acc'";
							$result1 = mysqli_query($con, $sql1);
							if(mysqli_num_rows($result1) > 0)
							{ 
								$sql = "UPDATE customers SET BankBalance = BankBalance-'$amount' WHERE ID='$from_acc'";
								$sql1 = "UPDATE customers SET BankBalance = BankBalance+'$amount' WHERE ID='$to_acc'";
								mysqli_query($con, $sql);
								mysqli_query($con, $sql1);
								echo"<script>display('Transaction Successful!');</script>";
							}
							else {
								echo"<script>display('Account number of receiver is invalid!');</script>";
							}
						}
					}
				}
				else {
					echo"<script>display('Account number of sender is invalid!');</script>";
				}
			}
		}
	}
?>
		


<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Online Banking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> <!-- Bootstrap-Core-CSS -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" /> <!-- Banner-Slider-CSS -->
<link rel="stylesheet" href="css/w3.css">
<!-- //css files -->
<link rel="stylesheet" type="text/css" href="css/demo.css"/>
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Ubuntu+Condensed&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>

<!-- navigation -->
<div class="nav-links">	
		<div class="header-w3l">
			<div class="container">
						<a class="navbar-brand" href="index.php"><h1><span>Online</span> Banking</h1></a>
							<img src="images/ebanking.jpg" height=70 width=50 style="float: right;">
						<div class="clearfix"></div>
					</div>
		</div>
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
			</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<div class="w3l-nav">
				<ul class="nav navbar-nav link-effect">
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php#about">About Us</a></li>
					<li><a href="index.php#services">Services</a></li>
					<li><a href="index.php#team">Team</a></li>
					<li><a href="customers.php">View All Customers</a></li>	
					<li class="active"><a href="transfer.php">Transfer Money</a></li>	
					<li><a href="index.php#contact">Contact Us</a></li>
				</ul>
			</div>
		</div>
	</nav>

			<div class="clearfix"></div>
</div>
<!-- //navigation -->
<!-- banner section -->
<div class="banner-slider">
				<div class="container">
						<!--Slider-->	
				<div class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<div class="w3l_banner_info">
								<h3>Best way to save time and money!</h3>
								<p>Express bank will save your time, money and improve the way you manage your business finances. You will have the control you need, with multiple disbursement and payment options, along with many other cash management features to help you optimize your business cash flow</p>
								<div class="agileits_w3layouts_more menu__item">
									<a href="index.php#about">Learn More</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<!-- //Slider -->

				</div>
</div>
<br><br><h3 class="w3l-title-center" align=center><span>Transfer</span> Money</h3>
<div class="formcontainer">
  <form method="POST" action="transfer.php">
    <label for="fname">From</label>
    <input type="text" name="from_acc" placeholder="Enter Sender's Account Number">

    <label for="lname">To</label>
    <input type="text" name="to_acc" placeholder="Enter Receiver's Account Number">

    <label for="amount">Amount</label>
    <input type="text" name="amount" placeholder="Enter Amount">
	
    <input type="submit" value="Submit" name="submit">
  </form>
</div><br><br>
		<!-- footer -->
		<div class="footer-bot">
			<div class="container">
				<div class="logo2">
					<h2><a href="index.php"><span>Online</span> Banking</a></h2>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="copy-right">
			<div class="agileinfo_social_icons">
				<ul class="agileits_social_list">
					<li><a href="https://www.facebook.com/imshobhit27" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="https://twitter.com/wdgodxd" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="https://www.linkedin.com/in/shobhit-pathak-3283661b8/" class="w3_agile_linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="container">
				<p> &copy; 2020 E-Banking. All Rights Reserved</p>
			</div>
		</div>
		<!-- //footer -->

<!-- js files -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js -->
<!-- js for banner -->
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
	<!-- stats -->
<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //stats -->
<!-- /js for banner -->
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
<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->
<!-- smooth-scrolling-of-move-up -->
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
<!-- //smooth-scrolling-of-move-up -->  
<!-- video-js -->
<script src="js/jquery.vide.min.js"></script>
<!-- //video-js -->
<!--gallery-js -->
<script src="js/jquery.picEyes.js"></script>
				<script>
					$(function(){
						//picturesEyes($('.demo li'));
						$('.demo li').picEyes();
					});
				</script>
<!--//gallery-js -->
<!-- //js files -->

</body>
</html>