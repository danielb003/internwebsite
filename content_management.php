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

	if(isset($_POST['wp_submit']) && isset($_SESSION['valid_form']) && $_SESSION['valid_form'] == true) {
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
		$mail->Subject = 'Content Management Page Enquiry';
		$mail->Body = $_POST['name'] . ", sent an enquiry for content management with the following information.<br> Email: " . $_POST['email'] . "<br> Phone: " . $_POST['number'] . "<br> Website: " . $_POST['website'] . "<br> Blogs per month: " . $_POST['cm_blogs'] . "<br> Company Objective: " . $_POST['company_objective'] . "<br> Social Accounts: " . $sa1 . $sa2 . $sa3 . $sa4 . $sa5 . $sa6 . "<br> Media Audit: " . $_POST['audit'];
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
		unset($_POST['wp_submit']);
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
					<div id="cm_banner_title_div">
						<p id="banner_title">Content Management</p>
						<br>
						<p>Content management is a big part of communication with customers. But there is more to writing good content than sitting in a coffee shop and being creative. Content management is writing that sells. Brochures that stand out, online copies that are SEO friendly, ads that are catchy, it's all part of writing with purpose.</p>
					</div>
					<div id="cm_image_div">
						<img src="GNDA_content_management.jpg" alt="getnoticeddigitalagency_cm_image">
					</div>
				</div>
			</div>
		</div>
		<div id="top_content_background" class="content_module_cr">
			<div class="top_content_module_div">
				<div class="top_content_title_div">
					<div id="top_content_title_centering_div">
						<h1>Let's talk marketing content strategy</h1>
					</div>
				</div>
				<div id="top_content_div">
					<p>When writing web content, you need to ensure every aspect of your content is Google friendly. This improves your SEO ranking. Written content is only powerful if it's written with and for a purpose.</p>
					<br>
					<p>Content marketing should be a part of your business strategy. Bad content is hard to read or just copied and pasted will be ignored, and that means your business won't get noticed.</p>
				</div>
			</div>
		</div>
		<div id="combine_content_div">
			<div id="combine_content_center_div">
				<div id="combine_content_left">
					<div class="combine_title_div">
						<h1>Why You Need Content Management</h1>
					</div>
					<div class="p_combine_content_div">
						<p>Good content marketing improves online visibility and customer interaction. it is better for engaging with your business and that means <b>you stand out</b> amongst your your competitors.</p>
					</div>
				</div>
				<div id="combine_content_right">
					<div class="combine_title_div">
						<h1>What we can do for you</h1>
					</div>
					<div class="p_combine_content_div">
						<p>At Getting Noticed Digital Agency we have a team of experts across all digital communication fields. Content is an essential part of any business. We look at your business with fresh eyes, keep your content and call to action compelling across all platforms and industries. Why? Becuase we love creating content with a purpose and using that to get you noticed!</p>
					</div>
				</div>
			</div>
		</div>
		<div class="content_module_cr">
			<div class="bottom_content_module_div">
				<div class="bottom_content_title_div">
					<div id="bottom_content_title_centering_div">
						<h1>Like the idea of having content your customers read?</h1>
					</div>
				</div>
				<div id="bottom_content_div">
					<p>Whether you're the fortune teller at the back of the bookstore or the colourful florist on the street corner, our Content Management packages have all your content needs covered. We are experts when it comes to the art form of repurposing content as a selling tool. We are here to start getting you noticed!</p>
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
					<input type="text" class="small_input" name="number" pattern="[0-9]{8,12}" title="Enter 8-12 numbers only" placeholder="Enter your phone *" required>
					<input type="text" class="small_input" name="website" pattern="[A-Za-z0-9 ,.'-_+=|#@!%&]{8,}" title="Enter at least 8 characters" placeholder="Enter your website">
					<br>
					<label id="service_blogs_label">How many blogs I need a month</label><br>
					<br>
					<div id="service_blogs_div">
						<select id="service_audit_input" name="cm_blogs" required>
							<option value="" selected disabled>Select an option *</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8+">8+</option>
						</select>
					</div>
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
						<option value="No">No</option>
					</select>
					<br>
					<input type="submit" id="service_submit" name="cm_submit" value="Submit">
				</form>
				<?php
					if(isset($_POST['cm_submit'])) {
						if($_POST['name'] == "") {

						} else if($_POST['email'] == "") {

						} else if(is_numeric($_POST['number']) == false) {

						} else if(isset($_POST['cm_blogs']) == "") {

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