<?php
require_once("PHPMailer-master/PHPMailerAutoload.php");
	$mail = new PHPMailer();
	session_start();
	$success_msg = "Form submitted successfully";
	$error_msg = "Form failed to submit, please try again";
	/* for debuggin only
	if(isset($_SESSION['valid_form'])) {
		echo "valid form is : " . $_SESSION['valid_form'];
	} */

	if(isset($_POST['smm_submit']) && isset($_SESSION['valid_form']) && $_SESSION['valid_form'] == true) {
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465; // 465 or 587
		$mail->IsHTML(true);
		$mail->Username = 'jackgnda@gmail.com';
		$mail->Password = '#18LNbag';
		$mail->SetFrom('jackgnda@gmail.com');
		$mail->Subject = 'Social Media Management Page Enquiry';
		$mail->Body = $_POST['name'] . ", sent an enquiry for social media management with the following information.<br> Email: " . $_POST['email'] . "<br> Phone: " . $_POST['number'] . "<br> Website: " . $_POST['website'];
		$mail->FromName = 'GNDA home page';
		/* $mail->AddAddress('s3399062@student.rmit.edu.au'); */
		$mail->AddAddress('jackgnda@gmail.com');

		if(!$mail->Send()) {
			/* for debugging only
			 * echo "Mailer Error: " . $mail->ErrorInfo;
			 */

			echo "<script type='text/javascript'>alert(\"$error_msg\");</script>";
		} elseif($mail->Send()) {
			/*echo "<div id='form_success_message'>Form submitted successfully!</div>";*/
			echo "<script type='text/javascript'>alert(\"$success_msg\");</script>";
		}

		/* for debugging only
		echo "mail script running"; */
		
		$_SESSION['valid_form'] = false;
		unset($_POST['smm_submit']);
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title>Get Noticed Digital Agency</title>
	<link rel="stylesheet" type="text/css" href="gnda.css" />
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<script type="text/javascript">
		window.onload = function() {
			document.getElementById("loading_mask").style.display="none";
		}
	</script>
</head>
<body>
<div id="loading_mask">
	<header id="header">
		<?php require('nav.php'); ?>
	</header>
	<div id="mainframe">
		<div id="banner_div">
			<div id="banner_service_container">
				<div id="banner_centering_div">
					<div id="smm_banner_title_div">
						<p id="banner_title">Social Media Management</p>
						<br>
						<p>Need help with Social Media Marketing? At Get Noticed Digital Agency we help with our small business Social Media Managements Packages. <b>It's how your business gets noticed.</b></p>
					</div>
					<div id="smm_image_div">
						<img src="GNDA_social_media_management.jpg" alt="getnoticeddigitalagency_smm_image">
					</div>
				</div>
			</div>
		</div>
		<div id="top_content_background" class="content_module_cr">
			<div class="top_content_module_div">
				<div class="top_content_title_div">
					<div id="top_content_title_centering_div">
						<h1>Let's talk numbers</h1>
					</div>
				</div>
				<div id="top_content_div">
				<p>In Australia...</p>
					<ul id="top_content_list">
						<li>94% of people use Facebook</li>
						<li>46% of people use Instagram</li>
						<li>32% of people use Twitter</li>
						<li>59% of people use social media at least once a day</li>
					</ul>
					<p>Social media isn't a fad or trend anymore. Today it is a part of everyday life. We use it for socialising, catching up and staying informed.</p>
				</div>
			</div>
		</div>
		<div id="combine_content_div">
			<div id="combine_content_center_div">
				<div id="combine_content_left">
					<div class="combine_title_div">
						<h1>Social Media is a business tool...</h1>
					</div>
					<div class="p_combine_content_div">
						<p>Today, 79% of internet users use social media. Have you created a Facebook business page? Does your business have Instagram, Twitter? If your small business does not have a social media marketing plan, you won't get noticed. Every small business needs social media, with high-quality, interactive content that engages customers.</p>
						<br>
						<ul id="smm_content_list">
							<li>Don't have the know how for social media? Don't worry, we take care of it for you.</li>
							<li>Packages purposely designed for all small business'.</li>
							<li>Original high-quality content.</li>
							<li>We know the benefits of social media marketing.</li>
						</ul>
					</div>
				</div>
				<div id="combine_content_right">
					<div class="combine_title_div">
						<h1>What we can do for you</h1>
					</div>
					<div class="p_combine_content_div">
						<p>With a tech savvy team of designers, writers and marketing experts we have the know how that will get you noticed on social media. We create, monitor and manage. We love social media, and we love to see other small businesses shine.</p>
						<br>
						<p>When social media profiles like Facebook, Instagram and Twitter have high-quality content, it get better results.</p>
						<br>
						<p>Did you know that what people see on social media is determined by a highly sophisiticated algorithm system? We create content that align to your customer and the algorithm. Getting your business noticed by your target audience.</p>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom_content_container" class="content_module_cr">
			<div class="bottom_content_module_div">
				<div class="bottom_content_title_div">
					<div id="bottom_content_title_centering_div">
						<h1>Like the idea of more time in your day?</h1>
					</div>
				</div>
				<div id="bottom_content_div">
					<p>Whether your business is a early bird cafe or a number crunching accounting firm, we are at your side when it comes to social media. Our social media management packages cater at any and all your social media needs, big or small. Let us help ease the stress of running a small business so that you have more time in your day. It's time to consider social media management for your business. We are here to start getting you noticed.</p>
				</div>
			</div>
		</div>
		<div id="service_form_background_div">
			<div id="service_form_div">
				<div id="service_form_title">
					<h2>Get Started</h2>
				</div>
				<div id="service_form_instructions">
					<p>Fill this out and we will send you our pricing packages.</p>
				</div>
				<form id="service_form" action="" method="POST">
					<input type="text" class="small_input" name="name" pattern="[A-Za-z ,.'`-]{2,40}" placeholder="Enter your name *" required>
					<input type="email" class="small_input" name="email" placeholder="Enter your email *" required>
					<input type="text" class="small_input" name="number" pattern="[0-9]{8,12}" placeholder="Enter your phone *" required>
					<input type="text" class="small_input" name="website" pattern="[A-Za-z0-9 ,.'-_+=|#@!%&]{8,}" title="Enter at least 8 characters" placeholder="Enter your website">
					<input type="submit" id="service_submit" name="smm_submit" value="Submit">
				</form>
				<?php
					if(isset($_POST['smm_submit'])) {
						if($_POST['name'] == "") {

						} else if($_POST['email'] == "") {

						} else if(is_numeric($_POST['number']) == false) {

						} else {
							$_SESSION['valid_form'] = true;
						}
					}
				?>
			</div>
		</div>
	</div>
	<footer id="footer">
		<?php require('footer.php'); ?>
	</footer>
</div>
<script type="text/javascript">
	window.onload=function() {
		document.getElementById("loading_mask").style.display = "block";
	}
</script>
	
</body>
</html>