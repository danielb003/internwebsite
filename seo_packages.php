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

	if(isset($_POST['submit']) && isset($_SESSION['valid_form']) && $_SESSION['valid_form'] == true) {
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
		$mail->Subject = 'SEO Packages Page Enquiry';
		$mail->Body = $_POST['name'] . ", sent a message of interest that reads: " . $_POST['message'] . ". Their website name is: " . $_POST['website'] . ". Their email is " . $_POST['email'];
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
		unset($_POST['submit']);
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
					<div id="seo_banner_title_div">
						<p id="banner_title">SEO Packages</p>
						<br>
						<p>SEO is the art and process of getting traffic organically from search results on search engines like Google. Need a plumber to fix the bathroom or catering for the business's Christmas party? With phone books a thing of the past, consumers turn to the Internet to search for results.</p>
					</div>
					<div id="seo_image_div">
						<img src="GNDA_seo_packages.jpg" alt="getnoticeddigitalagency_seo_image">
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
					<ul id="top_content_list">
						<li>93% of online interactions begin with online search.</li>
						<li>75% of users won't look past the first page of search results.</li>
					</ul>
					<p>If you are online, SEO should be part of your marketing strategy. When customers are searching online if you're not coming up then how will they find you? Will they even know you exist? They may even walk past your business to the one that is showing up.</p>
				</div>
			</div>
		</div>
		<div id="combine_content_div">
			<div id="combine_content_center_div">
				<div id="combine_content_left">
					<div class="combine_title_div">
						<h1>Why Your Business Needs SEO</h1>
					</div>
					<div class="p_combine_content_div">
						<p>With so much content online one of the biggest challenges is how to rank in searches. Today's digital business listing is competitive. You may have heard of the best-kept secret, the google algorithm, it ranks the importance of websites. No profession can leave this to chance robust SEO strategy is essential in business today. Having the right words and phrases may increase your business' chances of visibility and consumer awarness. The process of good SEO is very stratigic, and you should always call in the SEO experts.</p>
					</div>
				</div>
				<div id="combine_content_right">
					<div class="combine_title_div">
						<h1 id="sma_title">What we can do for you</h1>
					</div>
					<div class="p_combine_content_div">
						<p>At Get Noticed Digital Agency we keep up with the constant changes and SEO developments. Our packages are designed to help you improve visibility and generate web trafiic. Have you ever searched for a business and not found them, imagine if that was your customer looking for you. We understand the challenge of keeping up with the online world, and we're ready to tackle it!</p>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom_content_container" class="content_module_cr">
			<div class="bottom_content_module_div">
				<div class="bottom_content_title_div">
					<div id="bottom_content_title_centering_div">
						<h1>Like the sound of being found?</h1>
					</div>
				</div>
				<div id="bottom_content_div">
					<p>Whether you are the online heavy metal magazine or pumping plumber services, we are here to help with your visibility strategy through our SEO packages. Let us help ease the stress of running a business, so you have more time in your day. Give us a call or send us an email. We are here to get you noticed!</p>
				</div>
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