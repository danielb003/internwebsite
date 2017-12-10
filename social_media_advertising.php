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

	if(isset($_POST['sma_submit']) && isset($_SESSION['valid_form']) && $_SESSION['valid_form'] == true) {
		$sa1 = $sa2 = $sa3 = $sa4 = $sa5 = $sa6 = "";
		$sq1 = $sq2 = $sq3 = $sq4 = $sq5 = $sq6 = "";
		$count = $second_count = 0;
		
			foreach($_POST['social_to_quote'] as $value) {
				$second_count++;
				if($count == 1) {
					$sq1 = $value . ", ";
				} else if($count == 2) {
					$sq2 = $value . ", ";
				} else if($count == 3) {
					$sq3 = $value . ", ";
				} else if($count == 4) {
					$sq4 = $value . ", ";
				} else if($count == 5) {
					$sq5 = $value . ", ";
				} else if($count == 6) {
					$sq6 = $value;
				}
			}

			foreach($_POST['social_account'] as $value) {
				$count++;
				if($count == 1) {
					$sa1 = $value . ", ";
				} else if($count == 2) {
					$sa2 = $value . ", ";
				} else if($count == 3) {
					$sa3 = $value . ", ";
				} else if($count == 4) {
					$sa4 = $value . ", ";
				} else if($count == 5) {
					$sa5 = $value . ", ";
				} else if($count == 6) {
					$sa6 = $value;
				}
			}

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
		$mail->Subject = 'Social Media Advertising Enquiry';
		$mail->Body = $_POST['name'] . ", sent an enquiry for social media advertising with the following information.<br> Email: " . $_POST['email'] . "<br> Phone: " . $_POST['number'] . "<br> Website: " . $_POST['website'] . "<br> They would like a quote for the following; " . $sq1 . $sq2 . $sq3 . $sq4 . $sq5 . $sq6 . "<br> They use the following social media accounts; " . $sa1 . $sa2 . $sa3 . $sa4 . $sa5 . $sa6 . "<br> Media Audit: " . $_POST['audit'];
		$mail->FromName = 'GNDA social media advertising page';
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
		unset($_POST['sma_submit']);
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
					<div id="sma_banner_title_div">
						<p id="banner_title">Social Media Advertising</p>
						<br>
						<p>With 79% of Australia's having at least one social media profile its no suprise that social media platforms have become a hotspot for advertising</p>
					</div>
					<div id="sma_image_div">
						<img src="social_media_advertising.png" alt="getnoticeddigitalagency_sma_image">
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
					<p>Of the 800 consumers and 1100 businesses surveyed in 2017 social media sensis</p>
					<ul id="top_content_list">
						<li>59% access social media everyday</li>
						<li>64% of consumers are more likely to trust a brand that interacts positively on facebook</li>
						<li>47% of small business are on social media</li>
						<li>94% of Australians use facebook</li>
						<li>46% of Australians use Instagram</li>
					</ul>
					<p>Social media isn't a fad or trend. It is part of everyday life. Used for socialising, staying informed and business updates. Don't have time to manage social media? Let us help</p>
				</div>
			</div>
		</div>
		<div id="combine_content_div">
			<div id="combine_content_center_div">
				<div id="combine_content_left">
					<div class="combine_title_div">
						<h1>Why Social Media Advertising</h1>
					</div>
					<div class="p_combine_content_div">
						<p>With so many people using social media, it's where you need to advertise to get your business noticed. For a small business with a small budget, Pay Per Click Advertising is the way to go. When done properly Pay Per Click can tailor a campaign to an extremely niche market. For example, a cafe could offer a half priced coffee exclusively to people within a 1km radius. Radio, newspaper and magazines ads are usually not effective for small business. They tend not to hit the specific small business objectives. Pay Per Click advertising is tailored to your individual business objectives, pain points and delivered to an audience that is more likely to notice you and make a purchase.</p>
					</div>
				</div>
				<div id="combine_content_right">
					<div class="combine_title_div">
						<h1>What we can do for you</h1>
					</div>
					<div class="p_combine_content_div">
						<p>At <b>Get Noticed Digital Agency</b> we highlight unique characteristics of your business. With our team of advertising and marketing experts we <b>create, monitor and manage</b> social media and digital advertising for you. Whoever your target market is. Why? Because we know the difference advertising on social media can make for your business and we want to help get you noticed!</p>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom_content_conatiner" class="content_module_cr">
			<div class="bottom_content_module_div">
				<div class="bottom_content_title_div">
					<div id="bottom_content_title_centering_div">
						<h1>Like the idea of some extra attention?</h1>
					</div>
				</div>
				<div id="bottom_content_div">
					<p>Whether your business is the secluded underground bar or the small law firm above the noodle shop, we've got your advertising needs, big or small. Let us help ease the stress of running a business. We are here to start getting you noticed.</p>
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
					<br>
					<label id="service_to_quote_label">Social Account to qoute on</label><br><br>
					<div id="service_to_qoute_div">
						<input type="checkbox" class="service_to_quote_input" name="social_to_quote[]" value="instagram">Instagram&nbsp;&nbsp;&nbsp;
						<input type="checkbox" class="service_to_quote_input" name="social_to_quote[]" value="facebook">Facebook&nbsp;&nbsp;&nbsp;
						<input type="checkbox" class="service_to_quote_input" name="social_to_quote[]" value="twitter">Twitter&nbsp;&nbsp;&nbsp;
						<input type="checkbox" class="service_to_quote_input" name="social_to_quote[]" value="googleplus">Google Plus&nbsp;&nbsp;&nbsp;
						<input type="checkbox" class="service_to_quote_input" name="social_to_quote[]" value="zomato">Zomato&nbsp;&nbsp;&nbsp;
						<input type="checkbox" class="service_to_quote_input" name="social_to_quote[]" value="other">Other&nbsp;&nbsp;&nbsp;
					</div>
					<br>
					<label id="service_accounts_label">Social Accounts I use</label><br><br>
					<div id="service_accounts_div">
						<input type="checkbox" class="service_accounts_input" name="social_account[]" value="instagram">Instagram&nbsp;&nbsp;&nbsp;
						<input type="checkbox" class="service_accounts_input" name="social_account[]" value="facebook">Facebook&nbsp;&nbsp;&nbsp;
						<input type="checkbox" class="service_accounts_input" name="social_account[]" value="twitter">Twitter&nbsp;&nbsp;&nbsp;
						<input type="checkbox" class="service_accounts_input" name="social_account[]" value="googleplus">Google Plus&nbsp;&nbsp;&nbsp;
						<input type="checkbox" class="service_accounts_input" name="social_account[]" value="zomato">Zomato&nbsp;&nbsp;&nbsp;
						<input type="checkbox" class="service_accounts_input" name="social_account[]" value="other">Other&nbsp;&nbsp;&nbsp;
					</div>
					<br><br>
					<label id="service_audit_label">I'd like Get Noticed Digital Agency to do a free social media audit</label><br><br>
					<select id="service_audit_input" name="audit" required>
						<option value="" selected disabled>Select an option *</option>
						<option value="Yes">Yes</option>
						<option value="No" required>No</option>
					</select>
					<br>
					<input type="submit" id="service_submit" name="sma_submit" value="Submit">
				</form>
				<?php
					if(isset($_POST['sma_submit'])) {
						if($_POST['name'] == "") {
							
						} else if($_POST['email'] == "") {
							
						} else if(is_numeric($_POST['number']) == false) {
							
						} else if($_POST['audit'] == "") {

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