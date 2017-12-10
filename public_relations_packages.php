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

	if(isset($_POST['pr_submit']) && isset($_SESSION['valid_form']) && $_SESSION['valid_form'] == true) {
		$sa1 = $sa2 = $sa3 = $sa4 = $sa5 = $sa6 = "";
		$count = 0;
		
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
		$mail->Subject = 'Public Relations Packages Page Enquiry';
		$mail->Body = $_POST['name'] . ", sent an enquiry for public relations with the following information.<br> Email: " . $_POST['email'] . "<br> Phone: " . $_POST['number'] . "<br> Website: " . $_POST['website'] . "<br> Company Objective: " . $_POST['company_objective'] . "<br> Social Accounts: " . $sa1 . $sa2 . $sa3 . $sa4 . $sa5 . $sa6 . "<br> Media Audit: " . $_POST['audit'];
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
		unset($_POST['pr_submit']);
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
					<div id="prp_banner_title_div">
						<p id="banner_title">Public Relations Packages</p>
						<br>
						<p>PR is key to communicating effectively with customers. Good publicity is more effective than the best front page ad. It gives you access to contacts you don't have time to find or know. It is the companies pitch that will get noticed.</p>
					</div>
					<div id="prp_image_div">
						<img src="GNDA_public_relations.png" alt="getnoticeddigitalagency_prp_image">
					</div>
				</div>
			</div>
		</div>
		<div id="top_content_background" class="content_module_cr">
			<div class="top_content_module_div">
				<div class="top_content_title_div">
					<div id="top_content_title_centering_div">
						<h1>Let's talk strategy</h1>
					</div>
				</div>
				<div id="top_content_div">
					<ul id="top_content_list">
						<li>You have something great, you need to tell the media, but how?</li>
						<li>You need to attract that client you've dreamed of forever, but how?</li>
						<li>You need a pitch that all your employees can use, but how?</li>
						<li>You need media attention, but how?</li>
						<li>You want to stand out from your competitors, but how?</li>
						<li>You need introductions to potential partners and influencers, but how?</li>
					</ul>
					<p>With 84% of Australians using the Internet daily, a website is the place to get noticed.</p>
				</div>
			</div>
		</div>
		<div id="combine_content_div">
			<div id="combine_content_center_div">
				<div id="combine_content_left">
					<div class="combine_title_div">
						<h1>Why You Need Public Relations</h1>
					</div>
					<div class="p_combine_content_div">
						<p>If you want your business to stay ahead of the game, PR is your next step. Not only is it key to effective communication, it is also essential for building brand consistency, creating awareness, credibility and trust with your customers.</p>
					</div>
				</div>
				<div id="combine_content_right">
					<div class="combine_title_div">
						<h1 id="sma_title">What we can do for you</h1>
					</div>
					<div class="p_combine_content_div">
						<p>At Get Noticed Digital Agency we love all things PR: pitches, speeches, media releases, promotions, customer communication, publicity and events. In a nutshell, we promote, you relax, and together we get you noticed.</p>
					</div>
				</div>
			</div>
		</div>
		<div id="bottom_content_container" class="content_module_cr">
			<div class="bottom_content_module_div">
				<div class="bottom_content_title_div">
					<div id="bottom_content_title_centering_div">
						<h1>Like the idea of PR?</h1>
					</div>
				</div>
				<div id="bottom_content_div">
					<p>Whether your business is the organic wholefoods store down the road or Rockabilly 50's diner, our Public Relations packages have you covered. We are ready to start getting you noticed.</p>
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
					<label id="service_to_quote_label">Tell us about your company objective</label><br><br>
					<input type="textarea" class="small_input" name="company_objective" placeholder="Enter your company objective">
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
					<input type="submit" id="service_submit" name="pr_submit" value="Submit">
				</form>
				<?php
					if(isset($_POST['sma_submit'])) {
						if($_POST['name'] == "") {
							echo "no name entered";
						} else if($_POST['email'] == "") {
							echo "no email entered";
						} else if($_POST['number'] == "") {
							echo "no website entered";
						} else {
							$valid_form = true;
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