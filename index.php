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
		$mail->SMTPSecure = 'ssl'; // ssl or tls
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465; // 465 or 587
		$mail->IsHTML(true);
		$mail->Username = 'jackgnda@gmail.com';
		$mail->Password = '#18LNbag';
		$mail->SetFrom('jackgnda@gmail.com');
		$mail->Subject = 'Home Page Enquiry';
		$mail->Body = $_POST['name'] . ", sent a message of interest that reads: " . $_POST['message'] . ".<br> Their website name is: " . $_POST['website'] . ".<br> Their email is " . $_POST['email'];
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
	<meta name="keywords" content="web,web development,web designer,web design,web develop,develop web,webpage development,webpage creation,website creation,website creator,website creators,website builder,website builders,building websites,building website,build web,web build,build website,website build,internet website,website development,website design,website designer,website designers,get noticed,get noticed digital,get noticed digital agency,quick websites,quick webpages,quick website,quick webpage,quality website,quality webpage,digital agency,get digital agency,web agency,website agency,webpage agency,social media,social media advertising,social media marketing,social media solutions,website solutions,webpage solutions,web solutions,social media help,social media agency,video production,web content,good web content,great web content,seo packages,seo website packages,public relations packages,public relations help,public relations solutions,pr solutions,pr business,web business,website business,webpage business,web businesses,website businesses,webpage businesses">
	<meta name="description" content="We build and design custom websites. Different website packages and solutions. Experts in marketing and social media. Get Noticed Digital Agency is located in Melbourne">
	<title>Get Noticed Digital Agency Web Development</title>
	<link rel="stylesheet" type="text/css" href="gnda.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<script>
		/*function validateForm() {
			var name = document.forms["indexForm"]["name"].value;
			if(name == "") {

			}
		}*/
	</script>
</head>

<script type="text/javascript">
	var check = mobileCheck(check);

	window.onload = function() {
			document.getElementById("loading_mask").style.display="none";
			document.getElementById("mobile_mask").style.display="none";
		}
		/* DO NOT CHANGE INDENTATION BELOW */
	function mobileCheck(check) {
  check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};
	/* END OF RESTRICTED INDENTATION */
	
	if(check == false) {
		window.onload = function() {
			document.getElementById("loading_mask").style.display="none";
			document.getElementById("mobile_mask").style.display="block";
		}
	} else if(check == true) {
		window.onload = function() {
			document.getElementById("loading_mask").style.display="block";
			document.getElementById("mobile_mask").style.display="none";
		}
	}
</script>
<body>
<!-- code for the desktop application -->
<div id="loading_mask">
	<header id="header">
		<?php require('nav.php'); ?>
	</header>
	<div id="mainframe">
		<div id="image_banner_div">
			<div id="banner_container">
				<div id="index_banner_centering_div">
					<div id="main_title_container">
						<div id="main_title_div">
							<h1>Grow Your Business With Us!</h1>
						</div>
					</div>
					<div id="main_content_container">
						<div id="main_content_div">
							<p>Get Noticed Digital Agency is all about social media marketing for medium and small businesses. We can build a tailor-made program for even the smallest home business, allowing you to flourish and getting customers to find, engage and associate with your brand. We’re passionately driven to deliver extraordinary results consistently.</p>
						 	<br>
							<p>The world of social media may seem like a foreign land but we speak your language. We understand broader business objectives and customise them to suit your brand’s social media goals. From the beginning, Get Noticed Digital Agency has been a digital marketing agency with a difference. We think outside the square to develop creative strategies that work for your business.</p>
						 	<br>
							<p>The pressure of running your own business is huge but you shouldn’t have to face it alone. Let us take some work off your shoulders!</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="mainframe_content">
			<div id="sub_content">
				<div id="index_services_container">
					<div id="index_services_centering_div">
						<div id="sub_title_container">
							<div id="sub_title_div">
								<h1>Our Services</h1>
							</div>
						</div>
						<div id="sub_content_spacer">
							<div id="sub_content_spacer_div">
								<p>Click the buttons below for a small description of what we offer!</p>
							</div>
						</div>
						<div id="sub_img_div">
							<div id="sub_img">
								<button id="smm_button" class="sub_button" onclick="revealSocialMediaManagement()"></button>
								<button id="tm_button" class="sub_button" onclick="revealTwitterManagement()"></button>
								<button id="pr_button" class="sub_button" onclick="revealPublicRelations()"></button>
								<button id="ec_button" class="sub_button" onclick="revealECommerce()"></button>
								<button id="cm_button" class="sub_button" onclick="revealContentManagement()"></button>
								<button id="sma_button" class="sub_button" onclick="revealSocialMediaAdvertising()"></button>
								<button id="wdm_button" class="sub_button" onclick="revealWebsiteDesignManagement()"></button>
								<button id="fm_button" class="sub_button" onclick="revealFacebookManagement()"></button>
								<button id="seo_button" class="sub_button" onclick="revealSEO()"></button>
								<button id="ppc_button" class="sub_button" onclick="revealPayPerClick()"></button>
								<button id="im_button" class="sub_button" onclick="revealInstagramManagement()"></button>
								<button id="vp_button" class="sub_button" onclick="revealVideoProduction()"></button>
								<div id="social_media_management" class="swappable_div" style="display: none;">
									<p id="swappable_div_smm">WITH 79% of Australians on social media, a strong digital presence for a brand is no longer an option. Your social media accounts should always be active and provide engaging and useful content. We can set up your accounts, create and execute a social media plan, and manage online customer engagement for you.</p>
								</div>
								<div id="twitter_management" class="swappable_div" style="display: none;">
									<p id="swappable_div_tm">TWITTER is a platform used for broadcasting breaking news. If an event needs to go viral in a short period of time, Twitter is the place to go. We can manage your Twitter account and always keep customers posted on your business activities.</p>
								</div>
								<div id="public_relations" class="swappable_div" style="display: none;">
									<p id="swappable_div_pr">PUBLIC RELATIONS can help reinforce business communications and build a consistent brand model. We also execute special events and promote you via editorial coverage, making submissions on your behalf. At Get Noticed Digital Agency, we promote our clients and build their public image as successful, exciting, relevant, and honest as possible.</p>
								</div>
								<div id="e_commerce" class="swappable_div" style="display: none;">
									<p id="swappable_div_ec">E-COMMERCE is vital to recieving payments online. We can provide you with safe and secure functionality that will allow your business to make swift transactions online with clients!</p>
								</div>
								<div id="content_management" class="swappable_div" style="display: none;">
									<p id="swappable_div_cm">CONTENT management can seem simple at first but when your busy with running a business it can easily be neglected. We can write, edit and publish content from social media to your website to video production at the hands of professional writers. If you want quality content that has had thought and craft put into it then leave it to us for reliable results.</p>
								</div>
								<div id="social_media_advertising" class="swappable_div" style="display: none;">
									<p id="swappable_div_sma">ADVERTISING on social media has recieved more favourable responses from internet users. 37% of Australians click on social media ads to find out more. Our advertising services are proven to reach the targeted audience and grow you customer base on an affordable budget.</p>
								</div>
								<div id="website_design_management" class="swappable_div" style="display: none;">
									<p id="swappable_div_wdm">A WEBSITE is the first and foremost online element of a business. Customers now use the internet to search for products and services before making a purchase decision. Get Noticed Digital Agency has packages customised to suit every business.</p>
								</div>
								<div id="facebook_management" class="swappable_div" style="display: none;">
									<p id="swappable_div_fm">DESPITE fierce competition in the online world, Facebook remains the most powerful platform with 1.94 billion users globally. With a deep understanding of online customer behaviour, we create strategies that align Facebook activities and your overall business goals.</p>
								</div>
								<div id="seo" class="swappable_div" style="display: none;">
									<p id="swappable_div_seo">YOU may have heard about SEO, but do you know how to make it work for your business? Basically, SEO is optimizing your webpage so that it is pushed to the top of search lists. We will develop the best words and phrases that are relevant to your business and push your website to the top of search lists.</p>
								</div>
								<div id="pay_per_click" class="swappable_div" style="display: none;">
									<p id="swappable_div_ppc">PAY PER CLICK is an important online advertising tool and Get Noticed Digital Agency can set your business up with a package that will offer you adverts on the front pages of popular websites.</p>
								</div>
								<div id="instagram_management" class="swappable_div" style="display: none;">
									<p id="swappable_div_im">INSTAGRAM is the rising star in the land of social media. It has transferred from a teen hangout tool to a serious social networking site, where many of your potential customers lay. At Get Noticed Digital Agency, we can manage your Instagram account and look at it from a customer's perspective.</p>
								</div>
								<div id="video_production" class="swappable_div" style="display: none;">
									<p id="swappable_div_vp">WHILE written content proves to be important, it is undeniable that visual content has been getting increased attention, especially online videos. Did you know that 61% of internet users watch videos on social media? We offer a wide range of video production packages that fit the needs of your business</p>
								</div>
							</div>
							<script>
							var smm_div = document.getElementById('social_media_management');
							var tm_div = document.getElementById('twitter_management');
							var pr_div = document.getElementById('public_relations');
							var ec_div = document.getElementById('e_commerce');
							var cm_div = document.getElementById('content_management');
							var sma_div = document.getElementById('social_media_advertising');
							var wdm_div = document.getElementById('website_design_management');
							var fm_div = document.getElementById('facebook_management');
							var seo_div = document.getElementById('seo');
							var ppc_div = document.getElementById('pay_per_click');
							var im_div = document.getElementById('instagram_management');
							var vp_div = document.getElementById('video_production');

							function revealSocialMediaManagement() {
								if(smm_div.style.display == 'none') {
									smm_div.style.display = 'block';
									tm_div.style.display = pr_div.style.display = ec_div.style.display = cm_div.style.display = sma_div.style.display = wdm_div.style.display = fm_div.style.display = seo_div.style.display = ppc_div.style.display = im_div.style.display = vp_div.style.display = 'none';
									/*pr_div.style.display = 'none';*/
								} else if(smm_div.style.display == 'block') {
									smm_div.style.display = 'none';
								}
							}

							function revealTwitterManagement() {
								if(tm_div.style.display == 'none') {
									tm_div.style.display = 'block';
									smm_div.style.display = pr_div.style.display = ec_div.style.display = cm_div.style.display = sma_div.style.display = wdm_div.style.display = fm_div.style.display = seo_div.style.display = ppc_div.style.display = im_div.style.display = vp_div.style.display = 'none';
								} else if(tm_div.style.display == 'block') {
									tm_div.style.display = 'none';
								}
							}
							function revealPublicRelations() {
								if(pr_div.style.display == 'none') {
									pr_div.style.display = 'block';
									smm_div.style.display = tm_div.style.display = ec_div.style.display = cm_div.style.display = sma_div.style.display = wdm_div.style.display = fm_div.style.display = seo_div.style.display = ppc_div.style.display = im_div.style.display = vp_div.style.display = 'none';
								} else if(pr_div.style.display == 'block') {
									pr_div.style.display = 'none';
								}
							}
							function revealECommerce() {
								if(ec_div.style.display == 'none') {
									ec_div.style.display = 'block';
									smm_div.style.display = tm_div.style.display = pr_div.style.display = cm_div.style.display = sma_div.style.display = wdm_div.style.display = fm_div.style.display = seo_div.style.display = ppc_div.style.display = im_div.style.display = vp_div.style.display = 'none';
								} else if(ec_div.style.display == 'block') {
									ec_div.style.display = 'none';
								}
							}
							function revealContentManagement() {
								if(cm_div.style.display == 'none') {
									cm_div.style.display = 'block';
									smm_div.style.display = tm_div.style.display = pr_div.style.display = ec_div.style.display = sma_div.style.display = wdm_div.style.display = fm_div.style.display = seo_div.style.display = ppc_div.style.display = im_div.style.display = vp_div.style.display = 'none';
								} else if(cm_div.style.display == 'block') {
									cm_div.style.display = 'none';
								}
							}
							function revealSocialMediaAdvertising() {
								if(sma_div.style.display == 'none') {
									sma_div.style.display = 'block';
									smm_div.style.display = tm_div.style.display = pr_div.style.display = ec_div.style.display = cm_div.style.display = wdm_div.style.display = fm_div.style.display = seo_div.style.display = ppc_div.style.display = im_div.style.display = vp_div.style.display = 'none';
								} else if(sma_div.style.display == 'block') {
									sma_div.style.display = 'none';
								}
							}
							function revealWebsiteDesignManagement() {
								if(wdm_div.style.display == 'none') {
									wdm_div.style.display = 'block';
									smm_div.style.display = tm_div.style.display = pr_div.style.display = ec_div.style.display = cm_div.style.display = sma_div.style.display = fm_div.style.display = seo_div.style.display = ppc_div.style.display = im_div.style.display = vp_div.style.display = 'none';
								} else if(wdm_div.style.display == 'block') {
									wdm_div.style.display = 'none';
								}
							}
							function revealFacebookManagement() {
								if(fm_div.style.display == 'none') {
									fm_div.style.display = 'block';
									smm_div.style.display = tm_div.style.display = pr_div.style.display = ec_div.style.display = cm_div.style.display = sma_div.style.display = wdm_div.style.display = seo_div.style.display = ppc_div.style.display = im_div.style.display = vp_div.style.display = 'none';
								} else if(fm_div.style.display == 'block') {
									fm_div.style.display = 'none';
								}
							}
							function revealSEO() {
								if(seo_div.style.display == 'none') {
									seo_div.style.display = 'block';
									smm_div.style.display = tm_div.style.display = pr_div.style.display = ec_div.style.display = cm_div.style.display = sma_div.style.display = wdm_div.style.display = fm_div.style.display = ppc_div.style.display = im_div.style.display = vp_div.style.display = 'none';
								} else if(seo_div.style.display == 'block') {
									seo_div.style.display = 'none';
								}
							}
							function revealPayPerClick() {
								if(ppc_div.style.display == 'none') {
									ppc_div.style.display = 'block';
									smm_div.style.display = tm_div.style.display = pr_div.style.display = ec_div.style.display = cm_div.style.display = sma_div.style.display = wdm_div.style.display = fm_div.style.display = seo_div.style.display = im_div.style.display = vp_div.style.display = 'none';
								} else if(ppc_div.style.display == 'block') {
									ppc_div.style.display = 'none';
								}
							}
							function revealInstagramManagement() {
								if(im_div.style.display == 'none') {
									im_div.style.display = 'block';
									smm_div.style.display = tm_div.style.display = pr_div.style.display = ec_div.style.display = cm_div.style.display = sma_div.style.display = wdm_div.style.display = fm_div.style.display = seo_div.style.display = ppc_div.style.display = vp_div.style.display = 'none';
								} else if(im_div.style.display == 'block') {
									im_div.style.display = 'none';
								}
							}
							function revealVideoProduction() {
								if(vp_div.style.display == 'none') {
									vp_div.style.display = 'block';
									smm_div.style.display = tm_div.style.display = pr_div.style.display = ec_div.style.display = cm_div.style.display = sma_div.style.display = wdm_div.style.display = fm_div.style.display = seo_div.style.display = ppc_div.style.display = im_div.style.display = 'none';
								} else if(vp_div.style.display == 'block') {
									vp_div.style.display = 'none';
								}
							}
						</script>
						</div>
					</div>
				</div>
				<div id="index_blog_title_centering_div">
					<div id="index_blog_title_div">
						<h1>Recent Blogs</h1>
					</div>
				</div>
				<div id="index_blog_div">
					<div id="index_blog_module_centering_div">
						<div id="index_blog_module_div">
							<div class="index_blog_module">
								<div class="blog_content_img_div">
									<img src="9_marketing_tips.png" alt="9_marketing_tips">
								</div>
								<div class="blog_content_desc_div">
									<div class="blog_content_desc_div_a">
										<a href="marketing_tips_blog.php">9 Marketing Tips On Promoting Small Business That You Can Do Yourself</a>
									</div>
									<div class="blog_content_tag_div">
										<h4>20 November 2017</h4>
										<p>Marketing, Tips, Promotion, Business</p>
									</div>
								</div>
							</div>
							<div class="index_blog_module">
								<div class="blog_content_img_div">
									<img src="chasing_likes.jpg" alt="chasing_likes">
								</div>
								<div class="blog_content_desc_div">
									<div class="blog_content_desc_div_a">
										<a href="chasing_likes_blog.php">Why Chasing Social Media Likes Is The Fatest Way To Kill Your Marketing Strategy</a>
									</div>
									<div class="blog_content_tag_div">
										<h4>20 November 2017</h4>
										<p>Social Media, Tips, Marketing, Strategy</p>
									</div>
								</div>
							</div>
							<div class="index_blog_module">
								<div class="blog_content_img_div">
									<img src="small_business_social_media.png" alt="small_business_social_media">
								</div>
								<div class="blog_content_desc_div">
									<div class="blog_content_desc_div_a">
										<a href="small_business_strat_blog.php">Why Small Business Needs A Social Media Strategy</a>
									</div>
									<div class="blog_content_tag_div">
										<h4>20 November 2017</h4>
										<p>Social Media, Tips, Strategy, Business</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 
				<div id="bottom_content_title">
					<div id="bc_title_div">
						<h1>Why Do You Need A Social Media Agency</h1>
					</div>
				</div>
				<div id="bottom_content">
					<div id="bottom_content_centering_div">
						<div id="bottom_content_module_01">
							<div id="bc_module_01_img"></div>
							<div id="bc_module_content">
								<p>Your customers engage, interact and use social media on a daily bases. You need to get noticed amongst the millions of rival social media accounts who, let’s face it, may be doing a better job. Some may even be your competitors.</p>
								<br>
								<p>Today all businesses, no matter of industry need to engage, connect to an audience, to their existing customers, find new customers on social media.</p>
								<br>
								<p>Social Media is now a powerful, if not the most powerful branding tool available to any business, brand, or organisation.</p>
								<div class="bc_module_content_chqpoint_divs">
									<img src="check_icon.png" alt="check_icon" class="bc_check_icon"><p class="bc_check_icon_p">Generates new leads</p>
								</div>
								<div class="bc_module_content_chqpoint_divs">
									<img src="check_icon.png" alt="check_icon" class="bc_check_icon"><p class="bc_check_icon_p">Increase brand awareness</p>
								</div>
								<div class="bc_module_content_chqpoint_divs">
									<img src="check_icon.png" alt="check_icon" class="bc_check_icon"><p class="bc_check_icon_p">Increase website traffic</p>
								</div>
							</div>
						</div>
						<div id="bottom_content_module_02">
							<div id="first_bottom_content">
								<p>Did you know that eight in ten Australians are on social media? We know the market inside out when it comes to digital marketing. We have been on your side of the desk, working endless hours to get a business off the ground. Let’s face it, the digital world changes faster than any other industry. It is no longer an option. Digital transformation is a matter of survival. Most large corporations employ a team of digital marketing experts to run their businesses. Surveys highlight that only 48% say they feel highly proficient in digital marketing and a whopping 78% of marketers believe that marketing will undergo fundamental changes over the next five years.</p>
							</div>
							<div id="second_bottom_content">
								<p>"We want to see you get noticed and achieve your goals."</p>
								<br>
								<p>"We use our own inhouse tools to get you ahead of your competition."</p>
								<br>
								<p>"We build customised strategies to help your business reach the right customers."</p>
								<br>
								<p>"We understand online customer behaviour and can help you stand out at the purchase decision stage."</p>
								<br>
								<p>"Our social media experts bring unique ideas to get you to stand out from the rest."</p>
							</div>
							<div id="third_bottom_content">
								<p>We know online customers can take many different paths to purchase your product. Do you think people are on social media when they are least expected? Answer is, they are. 9% Australian internet users access social media while they are at the gym, 5% do so in the cinema, and 33% still keep up with the social media while dining out with their loved ones.</p>
								<br>
								<p>This makes it almost impossible to determine which is the most effective for marketers to follow and efficiently allocate marketing budgets. We conduct industry research for you and ensure you have time to work on growing your business. We are experts at the customer engagement journey, knowing it needs to be agile, reacting rapidly to the unpredictability of online behaviour. As such, our solutions are more than just posting to a platform, they align online behaviour.</p>
								<br>
								<p>Being a small business doesn’t stop you from achieving big results. That’s why we are here to help. We treat our clients like long time friends and we work together to achieve success, hitting milestones that will let you stand out for the right reasons. When it comes to being safe, traditional or boring, we fall terribly short. Our creative minds think outside the box to create strategies – that work – like no others.</p>
							</div>
						</div>
					</div>
				</div>
				<div id="contact_content_title">
					<div id="cc_title_div">
						<h1>Get Started Today</h1> 
					</div>
				</div>
				<div id="contact_content">
					<div id="contact_content_module">
						<div id="form_instructions">
							<p>Someone from Get Noticed Digital will contact you to get you on your way.</p>
						</div>
						<form id="contact_form" action="" method="POST" name="indexForm">
							<input type="text" class="small_input" name="name" pattern="[A-Za-z ,.'`-]{2,40}" placeholder="Enter your name *" required>
							<input type="email" class="small_input" name="email" placeholder="Enter your email *" required>
							<input type="text" class="small_input" name="website" pattern="[A-Za-z0-9 ,.'-_+=|\#@!%&]{8,}" placeholder="Enter your website">
							<textarea rows="1" cols="1"  id="large_input" name="message" pattern="[A-Za-z0-9 ,.'-_+=\|#@!%&]{2,}" placeholder="Enter your message *" required></textarea>
							<!--<input type="checkbox" name="checkbox" value="checkbox" hidden>-->
							<input type="submit" id="submit_contact_message" name="submit" value="Send Message">
						</form>
						<?php
							if(isset($_POST['submit'])) {
								if($_POST['name'] == "") {
									echo "no name entered";
								} else if($_POST['email'] == "") {
									echo "no email entered";
								} else if($_POST['message'] == "") {
									echo "no message entered";
								} else {
									$_SESSION['valid_form'] = true;
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer id="footer">
		<?php require('footer.php'); ?>
	</footer>
</div>

<!-- code for the mobile application -->
<div id="mobile_mask">
	<?php require('mobile_index.php'); ?>
</div>
</body>
</html>