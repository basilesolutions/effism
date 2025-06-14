<?php
ob_start(basil);
session_start(main);

extract($_POST);
if (isset($_POST['submit_x'])) {
	setcookie('enq_name', $name, time() + 60); //setting for 1 min
	setcookie('enq_contact', $contact, time() + 60);
	setcookie('enq_email', $email, time() + 60);
	setcookie('enq_location', $location, time() + 60);
	setcookie('enq_address', $address, time() + 60);
	setcookie('enq_comments', $comments, time() + 60);

	if ($_SESSION['vercode'] != $ver_code) {
		header("location:contact-us.php");
	} else {
		setcookie('enq_name', "", time() - 3600);
		setcookie('enq_contact', "", time() - 3600);
		setcookie('enq_email', "", time() - 3600);
		setcookie('enq_location', "", time() - 3600);
		setcookie('enq_address', "", time() - 3600);
		setcookie('enq_comments', "", time() - 3600);


		$subject = "New Enquiry";
		$mailto = "ariesmar@eim.ae";
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:' . $email . "\r\n";


		$message = '<div style=" width:600px; height:440px; background:linear-gradient(#0187bd, #a1c235);">
						   	<div style="width:590px;height:430px; background:linear-gradient(#ffffff, #f5f5f5);  margin:0 auto; ">
						   		<div style="background-color:#23557F;width:590px; height:20px; padding-bottom:10px; font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; color:rgb(255, 255, 255); text-align:center; padding-top:10px" >Contact</div>
							  	<table width="590" border="0" cellspacing="13" cellpadding="13" >
									<tr>
										<td align="left" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#23547f; font-weight:bold; width:30%; border:none; background-color:transparent; padding-left:10%"> Name &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</td>
										<td  bgcolor="#FFFFFF" style="border-bottom:1px solid #cccccc; width:80%; float:left;font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#666666; font-weight:bold;">' . $name . '</td>
									 </tr>
						  
									 <tr >
										<td align="left" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#23547f; font-weight:bold; width:30%; border:none; background-color:transparent;padding-left:10%"> Email&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</td>
										<td bgcolor="#FFFFFF" style="border-bottom:1px solid #cccccc; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#666666; font-weight:bold; width:80%; float:left" >' . $email . '</td>
									 </tr>
						  
									 <tr >
										<td align="left" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#23547f; font-weight:bold; width:30%; border:none; background-color:transparent;padding-left:10%"> Address&nbsp; &nbsp; &nbsp; &nbsp; :</td>
										<td bgcolor="#FFFFFF" style="border-bottom:1px solid #cccccc; width:80%; float:left;font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#666666; font-weight:bold;">' . $address . '</td>
									 </tr>
						  
									 <tr >
										<td align="left" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#23547f; font-weight:bold; width:30%; border:none; background-color:transparent;padding-left:10%"> Contact no&nbsp; &nbsp; :</td>
										<td bgcolor="#FFFFFF"  style="border-bottom:1px solid #cccccc; width:80%; float:left;font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#666666; font-weight:bold;">' . $contact . '</td>
									 </tr>

									 <tr>
										<td align="left" align="center" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#23547f; font-weight:bold; width:30%; border:none; background-color:transparent;padding-left:10%"> Location&nbsp; &nbsp; &nbsp; &nbsp; :</td>
										<td  bgcolor="#FFFFFF" style="border-bottom:1px solid #cccccc; width:80%; float:left;font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#666666; font-weight:bold;">' . $location . '</td>
									 </tr>

									 <tr>
										<td align="left" align="center" style="font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#23547f; font-weight:bold; width:30%; border:none; background-color:transparent;padding-left:10%; line-height:18px">Comments&nbsp;  :</td>
										<td  bgcolor="#FFFFFF" style="border-bottom:1px solid #cccccc; width:80%; float:left;font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#666666; font-weight: normal; height:60px; overflow:auto; text-align:justify">' . $comments . '</td>
									 </tr>
                                                                         
								</table>
							</div>
						</div>';

		mail(
			$mailto,
			$subject,
			stripslashes($message),
			$headers
		);

		setcookie('mailSent', 'Mail Sent Successfully', time() + 5);
		header("location:contact-us.php");
	}
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aries Group of Companies | Contact Us | Enquiry Form</title>
	<link href="css/iestyle.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/png" href="images/fav.png" />

	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="menu/menu.css" />
	<link rel="stylesheet" href="mobile/css/blue-mobile.css" />
	<script src="SpryAssets/SpryAccordion-contact.js" type="text/javascript"></script>
	<link href="SpryAssets/SpryAccordion-contact.css" rel="stylesheet" type="text/css">
	<link type="text/css" rel="stylesheet" href="popup/popModal.css">
	<link type="text/css" rel="stylesheet" href="popup/popup.css">
	<link rel="stylesheet" type="text/css" href="tooltip/css/default.css" />
	<link rel="stylesheet" type="text/css" href="tooltip/css/component.css" />
	<script src="tooltip/js/modernizr.custom.js"></script>
	<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
	<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
	<link href="css/spamstyle.css" rel=stylesheet>
	<script type="text/javascript">
		function IE(v) {
			var r = RegExp('msie' + (!isNaN(v) ? ('\\s' + v) : ''), 'i');
			return r.test(navigator.userAgent);
		}
	</script>

	<script type="text/javascript">
		function validate() {
			var name = document.enquiry.name.value;
			name = name.trim();
			if (name == "") {
				alert('Please enter your name');
				document.enquiry.name.focus();
				return false;
			}

			var email = document.enquiry.email.value;
			email = email.trim();
			if (email == "") {
				alert('Please enter your email');
				document.enquiry.email.focus();
				return false;
			}

			var pattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
			if (!pattern.test(email)) {
				alert('Please enter a valid email');
				document.enquiry.email.focus();
				return false;
			}

			var contact = document.enquiry.contact.value;
			contact = contact.trim();
			if (contact == "") {
				alert('Please enter your contact number');
				document.enquiry.contact.focus();
				return false;
			}

			var location = document.enquiry.location.value;
			location = location.trim();
			if (location == "") {
				alert('Please enter your location');
				document.enquiry.location.focus();
				return false;
			}

			var answer = document.enquiry.ver_code.value;
			answer = answer.trim();
			if (answer == "") {
				alert('Please Enter the captcha code');
				document.enquiry.ver_code.focus();
				return false;
			}

			return true;
			document.enquiry.submit();
		}
	</script>
	<!-- Default Statcounter code for Ariesgroupglobal.com
https://www.ariesgroupglobal.com/ -->
	<script type="text/javascript">
		var sc_project = 12205703;
		var sc_invisible = 1;
		var sc_security = "fec820d2";
		var sc_https = 1;
	</script>
	<style>
		.AccordionPanelContent {
			display: none;
			/* Hide content by default */
		}

		.AccordionPanel.active .AccordionPanelContent {
			display: block;
			/* Display content when accordion is active */
		}
	</style>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Select all accordion tabs
			var tabs = document.querySelectorAll(".AccordionPanelTab");

			tabs.forEach(function(tab) {
				tab.addEventListener("click", function() {
					var panel = tab.nextElementSibling;
					var allPanels = document.querySelectorAll(".AccordionPanelContent");
					var allTabs = document.querySelectorAll(".AccordionPanelTab");

					// Close all panels and remove active class from all tabs
					allPanels.forEach(function(panel) {
						panel.style.display = "none";
					});

					allTabs.forEach(function(tab) {
						tab.parentElement.classList.remove("active");
					});

					// Open the clicked panel if it was closed
					if (panel.style.display === "none" || panel.style.display === "") {
						panel.style.display = "block";
						tab.parentElement.classList.add("active");
					}
				});
			});
		});
	</script>
	<script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script>
	<noscript>
		<div class="statcounter"><a title="Web Analytics
Made Easy - StatCounter" href="https://statcounter.com/" target="_blank"><img class="statcounter"
					src="https://c.statcounter.com/12205703/0/fec820d2/1/" alt="Web Analytics Made Easy -
StatCounter"></a></div>
	</noscript>
	<!-- End of Statcounter Code -->
</head>

<body>
	<script type="text/javascript">
		if (IE()) {

			if (IE(6)) {
				alert('UPgrade your IE version 6 !');
			}
			if (IE(7)) {
				alert('UPgrade your IE version 7 !');
			}
			if (IE(8)) {
				alert('UPgrade your IE version 8 !');
			}
			if (IE(9)) {
				alert('UPgrade your IE version 9 !');
			}

		}
	</script>
	<!-- start index wrapper-->
	<div class="index-wrapper">
		<!-- start header-->
		<?php require_once('includes/header.php') ?>
		<!-- end header-->
		<!-- start main-container-->
		<div class="main-container">
			<!-- start banner-->
			<!--<div class="inr-bnr"><img src="images/contact-bnr.jpg" alt="Aries Group" title=" Aries Group" class="img-full">-->

			<div class="inr-bnr"><img src="images/aries-banner-76companies.jpg" alt="Aries Group" title=" Aries Group"
					class="img-full">


				<div class="indian-location">
					<div id="page">
						<div class="exampleContainer">
							<div class="exampleLive">
								<button class="hintModal">
									<img src="images/location-icon.png" class="img-responsive" alt="Aries Group"
										title="India ">
									<div class="hintModal_container">
										<h2>ARIES INDIA</h2>
										<p>BCG Tower<br>
											Opp. CSEZ<br>
											Seaport Airport Road, Kakkanad<br>
											Kochi - 682037, Kerala, INDIA<br>
											Tel. : +91 484 4081555<br>
											Fax : +91 484 4055561<br>
											Website: <a href="www.ariesmar.com" target="_blank">www.ariesmar.com</a><br>
											Email: ariesindia@ariesmar.com<br>
										</p>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="goa-location">
					<div id="page">
						<div class="exampleContainer">
							<div class="exampleLive">
								<button class="hintModal">
									<img src="images/location-icon.png" class="img-responsive" alt="Aries Group"
										title="India ">
									<div class="hintModal_container">
										<h2>ARIES GOA</h2>
										<p>ARIES MARINE & ENGG. SERVICES<br>
											Office# 302, 3rd floor<br>
											Dr. Ozler Forum Building<br>
											Nr. St. Andreoo Church<br>
											Vasco Da Gama, Goa-403802<br>
											Tel. : +91 0832 2500066<br>
											Email: ariesgoa@ariesgroup.ae<br>



										</p>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="bahrain-location">
					<div id="page">
						<div class="exampleContainer">
							<div class="exampleLive">
								<button class="hintModal">
									<img src="images/location-icon.png" class="img-responsive" alt="Aries Group"
										title="India ">
									<div class="hintModal_container">
										<h2>ARIES BAHRAIN</h2>
										<p>CR NO # 90451-1<br>
											YBA Kanoo Tower, Flat No: 113, 11th Floor<br>
											Road: 1703 , Block: 317, Building: 155, <br>
											Diplomatic Area<br>
											Kingdom of Bahrain<br>
										</p>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>


				<div class="baku-location">
					<div id="page">
						<div class="exampleContainer">
							<div class="exampleLive">
								<button class="hintModal">
									<img src="images/location-icon.png" class="img-responsive" alt="Aries Group"
										title="India ">
									<div class="hintModal_container">
										<h2>ARIES BAKU</h2>
										<p>Aries Marine MMC <br>
											Garadagh District <br>
											Salyan Highway 15 <br>
											Baku , Azerbaijan <br>
											Tel. : 994 12 4471412<br>
											Fax: 994 12 4471494<br>
											Email:ariesbaku@ariesgroup.ae<br>
										</p>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>


				<div class="uae-location">
					<div id="page">
						<div class="exampleContainer">
							<div class="exampleLive">
								<button class="hintModal">
									<img src="images/location-icon.png" class="img-responsive" alt="Aries Group"
										title="UAE ">
									<div class="hintModal_container">
										<h2>ARIES TESTING LAB </h2>
										<p>Tower 400 Building<br>
											20th floor<br>
											Mina Road<br>
											Near Sharjah Gold Souq<br>
											Sharjah, UAE<br>
											P.O.Box: 24496<br>
											Tel: 06 - 5503300<br>
											Fax: 06 - 5503100<br>
											Email: ariesmar@emirates.net.ae<br />
											Website: ariesmar.com<br />
										</p>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>


				<div class="behrain-location">
					<div id="page">
						<div class="exampleContainer">
							<div class="exampleLive">
								<button class="hintModal">
									<img src="images/location-icon.png" class="img-responsive" alt="Aries Group"
										title="USA ">
									<div class="hintModal_container">
										<h2>ARIES USA </h2>
										<p>Suite# 211<br>
											5100 Westheimer Ave.<br>
											Houston, TX 77056<br>
											Tel: +1 832 600 5008<br>
											Website: www.ariesoffshore.com<br>
											Email: arieshouston@ariesoffshore.com<br>
										</p>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>



				<div class="malaysia-location">
					<div id="page">
						<div class="exampleContainer">
							<div class="exampleLive">
								<button class="hintModal">
									<img src="images/location-icon.png" class="img-responsive" alt="Aries Group"
										title="Malaysia">
									<div class="hintModal_container">
										<h2>ARIES MALAYSIA</h2>
										<p>17-3, Jalan Wangsa Delima 12<br />
											Wangsa Maju 53300<br />
											Kuala Lampur, Malaysia<br />
											Tel : +6 03 4010 4010<br />
											Fax: +6 03 4010 4011<br />
											email: malaysia@ariesgroup.ae<br />
										</p>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>



				<div class="singapore-location">
					<div id="page">
						<div class="exampleContainer">
							<div class="exampleLive">
								<button class="hintModal">
									<img src="images/location-icon.png" class="img-responsive" alt="Aries Group"
										title="Singapore  ">
									<div class="hintModal_container">
										<h2>ARIES SINGAPORE</h2>
										<p>
											Aries Network Pte Ltd.<br />
											2 Venture Drive,<br />
											#11-14 Vision Exchange, <br />

											Singapore 608526<br />
											Tel: +65 6220 9056 <br />
											Fax: +65 6220 9057<br />
											Email: designsg@ariesgroup.ae<br />
											Web: ariesmar.com<br />
										</p>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>


				<div class="quatar-location">
					<div id="page">
						<div class="exampleContainer">
							<div class="exampleLive">
								<button class="hintModal">
									<img src="images/location-icon.png" class="img-responsive" alt="Aries Group"
										title="Qatar ">
									<div class="hintModal_container">
										<h2>Aries Marine Company W.L.L. , QATAR</h2>
										<p>P.O. Box 15368<br>
											Doha, Qatar<br>
											Premises :<br>
											Jaidah Square Umm Ghuwailina<br>
											63 Airport Road - Zone 27<br>
											Doha Qatar<br>
											3rd Floor-303-B<br>
											Tel: +974 4 4366052<br>
											Fax: +974 4 4420362<br>
											Email: ariesqatar@ariesgroup.ae<br>
										</p>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>


				<div class="china-location">
					<div id="page">
						<div class="exampleContainer">
							<div class="exampleLive">
								<button class="hintModal">
									<img src="images/location-icon.png" class="img-responsive" alt="Aries Group"
										title="China ">
									<div class="hintModal_container">
										<h2>ARIES CHINA</h2>


										<p>Office No.3401<br>
											Zhongnan century city Halleast<br>
											Tower A, Post code: 226000<br>
											Nantong City<br>
											Jiangsu Province<br>
											CHINA<br>
											Tel:+86 513810 20640<br>
										</p>
									</div>
								</button>
							</div>
						</div>
					</div>
				</div>

				<!--<div class="china-location">
<div id="page">
<div class="exampleContainer">
<div class="exampleLive">
<button class="hintModal">
<img src="images/location-icon.png" class="img-responsive" alt="Aries Group" title="China "> 
<div class="hintModal_container">
<h2>ARIES CHINA</h2>


<p>Office No.3401<br>
Zhongnan century city Halleast<br>
Tower A, Post code: 226000<br>
 Nantong City<br>
 Jiangsu Province<br>
 CHINA<br> 
Tel:+86 513810 20640<br>
</p>
</div>
</button>
</div>
</div>
</div>
</div>    -->



				<script src="popup/jquery.min.js"></script>
				<script src="popup/popModal.js"></script>
				<script>
					$(function() {
						$('#popModal_ex1').click(function() {
							$('#popModal_ex1').popModal({
								html: $('#content'),
								placement: 'bottomLeft',
								showCloseBut: true,
								onDocumentClickClose: true,
								onDocumentClickClosePrevent: '',
								overflowContent: false,
								inline: true,
								beforeLoadingContent: 'Please, waiting...',
								onOkBut: function() {},
								onCancelBut: function() {},
								onLoad: function() {},
								onClose: function() {}
							});
						});

						$('#popModal_ex2').click(function() {
							$('#popModal_ex2').popModal({
								html: function(callback) {
									$.ajax({
										url: 'ajax.html'
									}).done(function(content) {
										callback(content);
									});
								}
							});
						});

						$('#notifyModal_ex1').click(function() {
							$('#content2').notifyModal({
								duration: 2500,
								placement: 'center',
								overlay: true,
								type: 'notify'
							});
						});

						$('#dialogModal_ex1').click(function() {
							$('.dialog_content').dialogModal({
								onOkBut: function() {},
								onCancelBut: function() {},
								onLoad: function() {},
								onClose: function() {},
							});
						});

					});
				</script>
				<div class="inr-contactslogan"><span class="breadcrumps"></span><img src="images/inrslogan.png"
						class="img-responsive" alt="Aries Group" title=" Aries slogan"></div>
			</div>
			<!-- end banner-->
			<!-- start content container-->
			<div class="content-container">
				<div class="breadcrumps">
					<p><a href="index.php">Home</a></p>
					<div class="bread-img"><img src="images/bread-arrow.jpg" alt="Aries Group"></div>
					<p>Contact Us</p>
				</div>
				<div class="clear"></div>
				<!--start inrrgt-->
				<div class="inr-lft">
					<!--start contact-->
					<div class="contactbg">
						<div class="contact-logo">
							<br />
							<!--<center><h1> Contacts Us</h1></center>-->
							<!--<img src="images/contact-logo.jpg" class="img-responsive"; alt="Aries Group" title=" Aries logo">-->
						</div>
						<!--start address-->
						<div class="address-col">
							<div class="corporate-address">
								<h2>ARIES HEAD OFFICE-UAE</h2>
								<p><strong> Aries Marine & Eng. Services LLC </strong><br>
									<!--P.O. Box : 24496<br>
Tower 400, 20th Floor<br>
Mina Road, Sharjah, UAE.<br>
Tel : +971 6 5503300<br>
Fax : +971 6 5503100<br>
Email : <a href="mailto:ariesmar@eim.ae">ariesmar@eim.ae</a></p>-->

									Tower 400 Building, 20th floor <br>

									Al Mina Road,Al Soor Area<br>

									Sharjah, UAE<br>

									P.O.Box: 24496<br>
									Tel: +971 6 5503300<br>
									Fax: +971 6 5503100 <br>

									Email: <a href="mailto:ariesmar@emirates.net.ae"
										target="_blank">ariesmar@emirates.net.ae</a> <br>

									Website: <a href="https://www.ariesgroupglobal.com/"
										target="_blank">www.ariesgroupglobal.com</a> <br>

									<span style="color:blue;font-weight: bold;">Emergency Contact:</span>
									<br>
									<span style="color:black;">
										Shaj Mullath : +971 50 5062268 </span>
									<!-- <span style="color:black;">Santhosh Kumar: +971 50 2066902 <br>
Ajai Mathew: +971 56 6297466 </span> -->


								<div class="contact-icons">
									<ul>
										<!--<li><img src="images/location_contact.jpg" class="img-responsive" alt="Aries Group" title="location map"></li>-->
										<li><a href="https://twitter.com/Ariesgroupglob" target="_blank"><img
													src="images/twitter_contact.jpg" style="margin-top: 7px;"
													class="img-responsive" alt="Aries Group" title="twitter"></a></li>
										<li><a href="https://www.facebook.com/Ariesgroup" target="_blank"><img
													src="images/facebook_contact.jpg" class="img-responsive"
													alt="Aries Group" title="facebook"></a></li>

									</ul>
									<div class="clear"></div>
								</div>

							</div>
							<div class="office-address">


								<div id="Accordion1" class="Accordion" tabindex="0">

									<!--Aries International Maritime Research Institute, Sharjah, U.A.E.-->
									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries International Maritime Research<br> Institute L.L.C, Sharjah</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Tower 400 Building, 22th floor <br>
													Al Mina Road,Al Soor Area <br>
													Sharjah, UAE <br>
													P.O.Box: 26034 <br>
													Tel: +971 6 5503131 <br>
													Fax: +971 6 5503939 <br>
													Email: <a href="mailto:admin@aimri.in">admin@aimri.in</a> <br>
													Website: <a href="https://www.aimri.ae/"
														target="_blank">www.aimri.ae</a> <br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Akhil S: +91 9048767807 </span>


												</p>
											</div>

										</div>
									</div>
									<!--Aries International Maritime Research Institute, Sharjah, U.A.E.-->

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Overseas Services LLC, Sharjah</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>P.O. Box : 24496 <br>
													Tower 400, 20th Floor Mina Road <br>
													Sharjah, UAE. <br>
													Email: <a
														href="mailto:medhr@ariesgroup.ae">medhr@ariesgroup.ae</a><br>
													Website: <a href="https://www.hrmedico.com/"
														target="_blank">www.hrmedico.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Vipin P: +91 9539000570 </span>
												</p>
											</div>

										</div>
									</div>


									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Testing Lab - SHJ. BR, SHARJAH</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Plot No: 817<br>
													Shubra No.1<br>
													Behind Al Dhaid Street,<br>
													Al Sajaa Industrial Area<br>
													Sharjah,UAE<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Arun Mohan : +971 50 4905886
													</span>
													<!--Website:<a href="https://www.ariesmar.com" target="_blank">www.ariesmar.com</a><br>-->
												</p>
											</div>

										</div>

									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine (L.L.C), Dubai</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Al Qayada Building <br>
													Office# 112 1st Floor <br>
													Near Galadari Signal <br>
													Hor-Al-Anz, Dubai, UAE <br>
													P.O.Box: 94354 <br>
													Tel: +971 4 2997939 <br>
													Fax: +971 4 2997940 <br>

													Email: <a
														href="mailto:ariesmarine@ariesgroup.ae">ariesmarine@ariesgroup.ae</a>
													<br>
													Website: <a href="https://www.ariesmar.com/"
														target="_blank">www.ariesmar.com</a> <br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Sabin T S:+971 50 9786114 </span>


												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Testing Lab L.L.C, Dubai</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Post Box No: 125378<br>
													Warehouse# 4, Plot No. 613-892<br>
													Industrial Area--2,<br>
													Ras Al Khoor,
													Dubai ,U.A.E<br>
													Phone No: +971 4 3471531<br>
													Fax No: +971 4 3471591<br>
													Email: <a
														href="mailto:atlab@ariesgroup.ae">atlab@ariesgroup.ae</a><br>
													Website: <a href="http://www.ariesgroupglobal.com/"
														target="_blank">www.ariesgroupglobal.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Prashob Radhakrishnan:+971 50 1674394
													</span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries International Interiors (L.L.C),<br> Dubai</h2>
											<div class="clear"></div>
										</div>


										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Po .Box .96297 <br>
													Office 112,Al Qayada building<br>
													Abuhail,Dubai,UAE <br>
													Email: <a
														href="mailto:abhiraj.pd@ariesgroup.ae">abhiraj.pd@ariesgroup.ae</a><br>
													Website: <a
														href="https://www.ariesinternational.ae/">www.ariesinternational.ae</a><br>


													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Abhiraj PD : +971 50 3014232 </span>

												</p>
											</div>

										</div>

									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Biz Events Management, Dubai</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>P O Box: 94354 <br> Dubai, UAE<br>
													Tel: +971 4 299 7939 <br>
													Email: <a
														href="mailto:eventmanager@ariesgroupglobal.com">eventmanager@ariesgroupglobal.com</a><br>
													Website: <a href="https://www.biztvevents.com/"
														target="_blank">www.biztvevents.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Saran Shammy:+971 50 905 1687 </span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Technical & Safety Training ,<br> Dubai</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													P.O. Box 125378, <br>
													57 Street First Al Khail Street<br>
													Building #5,Jebel Ali Industrial Area-1, <br>
													Dubai, UAE<br>
													Tele:+971 4 2940071<br>



													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Prasanth Surendran : +971 50 2299505
													</span>

												</p>
											</div>

										</div>

									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Oil Field Services L L C,<br> Abu Dhabi</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													Post Box No: 39651<br>
													Al Mussafah Industrial Area<br>
													Plot # 4-6 M40, Ware House # 13<br>
													Abudhabi.,U.A.E<br>
													Phone No: +971 2 5508893<br>
													Fax No: +971 2 5508996<br>

													<!--Email: <a href="mailto:mechtest@ariesgroup.ae">mechtest@ariesgroup.ae</a><br>-->
													Email: <a
														href="mailto:ariesauh@ariesgroup.ae">ariesauh@ariesgroup.ae</a><br>
													Website: <a href="http://www.ariesgroupglobal.com/"
														target="_blank">www.ariesgroupglobal.com</a><br>


													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Abhilash Bachan : +971 50 9697338 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries International Lab Oil & Gas <br> Engineering Services L.L.C., Abu Dhabi</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													Al Mussafah, M-45, Plot-2<br>
													Ground Floor, Warehouse No-28<br>
													P.O Box: 25114, Abu Dhabi, UAE<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Arun Ashokan : +971 50 5006113 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Energy Holding LTD, ABU DHABI
											</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													2459, 24, AL Sila Tower , <br>
													Abu Dhabi Global Market Square, <br>
													AL Maryah Island, <br>
													Abu Dhabi, UAE<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Shaj Mullath : +971 50 5062268
													</span>



												</p>
											</div>

										</div>

									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Biz Tv Network FZE, Ras Al Khaimah</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>Biz TV Network, P.O. Box No. 32429, <br>
													Ras Al Khaimah - UAE<br>
													Tel: +971 7 2447603<br>
													Tel: +971 4 2997940<br>
													Email: <a
														href="mailto:biznetwork@ariesgroup.ae">biznetwork@ariesgroup.ae</a><br>
													Website: <a href="https://www.biztvnetworks.com/"
														target="_blank">www.biztvnetworks.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Muhammed Basheer : +971 50 167 4408
													</span>
												</p>
											</div>

										</div>
									</div>


									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Testing Lab , Fujairah</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>


													Flat No. 309<br>
													Al Zarooni Building<br>
													Gold Souq- Fujairah<br>
													P.O.Box No. 40033<br>
													Tel: +971 9 2236565<br>
													Fax: +971 9 2236453<br>
													Email: <a
														href="mailto:ariesfuj@ariesgroup.ae">ariesfuj@ariesgroup.ae</a><br>
													Website: <a href="https://www.ariesgroupglobal.com/"
														target="_blank">www.ariesgroupglobal.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Prashob Radhakrishnan : +971 50 1674394
													</span>


													<!--Website:<a href="http://www.ariesinternational.ae/" target="_blank">www.ariesinternational.ae</a><br>-->
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine - Fujairah Branch LLC,<br> Fujairah</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>


													Flat No. 310<br>
													Al Zarooni Building<br>
													Gold Souq- Fujairah<br>
													Land Lord Office<br>
													Tel: +971 9 2236464<br>
													Fax: +971 9 2236465<br>
													P.O.Box No. 40034<br>
													Email: Email: <a
														href="mailto:ariesfuj@ariesgroup.ae">ariesfuj@ariesgroup.ae</a><br>
													Website: <a href="http://www.ariesgroupglobal.com/"
														target="_blank">www.ariesgroupglobal.com</a><br>


													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Prashob Radhakrishnan : +971 50 1674394
													</span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Underwater Solutions LLC,<br> Fujairah</h2>
											<div class="clear"></div>
										</div>


										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													201 C, UASC BUILDING, <br>
													Opposite Fujairah Port Gate, <br>
													Fujairah, U A E <br>
													PO Box: 50103 <br>
													Tel: +971 9 2242066 <br>
													Email: <a
														href="mailto:aus@ariesgroupglobal.com">aus@ariesgroupglobal.com</a><br>


													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Aneesh Murali: +971 56 9357847 </span>

												</p>
											</div>

										</div>

									</div>


									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>ACT Solutions - F.Z.E, AJMAN</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													EFZP1 - 12, AJMAN FREEZONE <br>
													SHEKH RASHID BIN SAEED AL MAKTOUN ST<br>
													AJMAN<br>
													Tel:+971 6 5466939<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Prabeen Thomas : +971 50 4778436</span>
												</p>
											</div>

										</div>

									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Testing Lab LLC (BRANCH) ,<br> Dubai</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													P.O. Box 125378,57 Street First Al Khail Street<br>

													Building #5, Jebel Ali Industrial Area-1,<br>
													Dubai, UAE<br>
													Tel: +971 4 2940071<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Jithu M.A : +971 50 4608302<br>
													</span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Dental and Aesthetic Clinic LLC,<br> Dubai</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													PT01, Amwaj plaza, The Walk, JBR<br>

													Landline: +971 4 4496304<br>
													Mobile: +971 56 6800802<br>

													Email: <a
														href="mailto:contact@ariesclinic.com">contact@ariesclinic.com</a><br>

													Website: <a
														href="https://ariesclinic.com/">www.ariesclinic.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Mary Jane : +971 56 6800802</span>
												</p>
											</div>

										</div>



									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Printing Services LLC,<br>Sharjah</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													Industrial Area 15<br>
													Maleha Road<br>
													Showroom No.5<br>
													Sharjah,UAE<br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Sreenath Nandakumar : +971
														50 9361643</span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Macins Global Medical Services<br> L.L.C , Dubai</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													Deira Al Khabisi - Basma Darwish Building.<br>
													Jassim Darwish Fakhro - 214 offc no.<br>
													Dubai,UAE<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Praveen : +971 55 4560554</span>
												</p>
											</div>

										</div>
									</div>



									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Mind Transformation Studio LLC, Sharjah</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													Sharjah Media City center<br> Sharjah<br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Nivedya Sohan Roy : +971
														50 1440753</span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Oil Field Services L L C - BRANCH,<br> Abu Dhabi</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Al Fahim Building
													Room# 116<br>
													Musaffah<br>
													Abu Dhabi<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Arun Ashokan : +971 50 5006113 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Maritime Power Switchgears<br> Assembling (S.P.C - L.L.C), Ajman</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>Northern Sector Jurf Industrial 1,<br> Plot 0962, unit 2,<br>
													Ajman <br>


													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Prabeen Thomas: +971 50 4778436 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>ARIES MARINE (L.L.C) - Branch 01,<br> Ajman</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>Northern Sector Jurf Industrial 1,<br> Plot 0962, unit 1,<br>
													Ajman <br>


													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Prabeen Thomas: +971 50 4778436 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine Co. WLL.,<br> Qatar
											</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													P.O. Box 15368<br>
													Doha, Qatar<br>
													Premises :<br>
													Jaidah Square Umm Ghuwailina<br>
													63 Airport Road - Zone 27<br>
													Doha Qatar<br>
													3rd Floor-303-B<br>
													Ph:+974 44366052 <br>
													Fax:+974 44420362<br>
													<!--Website:<a href="http://www.ariesinternational.ae/" target="_blank">www.ariesinternational.ae</a><br>-->

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Siju Varghese : +974 55 699854 </span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Global Company L.L.C,<br>Oman</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													1st Floor, Business Centre Building, Room#209<br>
													Al Khuwair (South),<br>
													Muscat, Sultanate of Oman<br>
													P.O.Box:1856<br>
													Postal Code: 133<br>
													Telephone: +968 24393000<br>
													Fax: +968 24482784<br>
													Email : <a
														href="mailto:technical@ariesglobaloman.com">technical@ariesglobaloman.com</a>
													<br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Sandeep K : +968 95915353 </span>
												</p>
											</div>

										</div>
									</div>
									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine W.L.L, Bahrain</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Aries Marine WLL Bahrain<br>
													CR# 90451-1<br>
													Flat No12,<br>
													Building No: 717.<br>
													Road: 3715 , Block: 337<br>
													Umm al Hassam -Bahrain.<br>
													Email: <a
														href="mailto:ariesbahrain@ariesgroup.ae">ariesbahrain@ariesgroup.ae</a><br>


													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Anoop Raj O M : +973 36341357 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine Services Co.Ltd,<br> Saudi Arabia</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													Aries Marine Services Co.Ltd<br>

													Al Jubail 35514,<br> Gulf Star Business center, <br>2nd floor, office no.201, Al Jabal Rd,
													<br>Kingdom of Saudi Arabia
													<br>Office Tel : +966 13 344 9494,



													<br>Email : <a
														href="mailto:ariessaudi@ariesksa.com">ariessaudi@ariesksa.com</a>
													<br>
													Website: <a href="https://www.ariesmar.com"
														target="_blank">www.ariesmar.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Noufin Yousuf : +966 534125922 </span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Laboratories Company,<br> Saudi Arabia</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Tabuk 47738 - 6698<br>
													Al Yasmin 4222<br>
													Muhammed Bin Al Khateeb street <br>
													Kingdom of Saudi Arabia<br>

													Email : <a
														href="mailto:ariessaudi@ariesksa.com">ariessaudi@ariesksa.com</a>
													<br>


													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Noufin Yousuf : +966 534125922 </span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine Trading Company<br> Saudi Arabia</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>


													Office #504, Fluor Arabia Tower, Al Khobar 31952,
													King Fahed Road, Kingdom of Saudi Arabia,<br>
													Office Tel : +966 13 344 9494<br>
													Fax : +966 13 344 9595<br>
													Email: <a
														href="mailto:ariessaudi@ariesksa.com">ariessaudi@ariesksa.com</a><br>

													Website: <a href="https://www.ariesmar.com"
														target="_blank">www.ariesmar.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Noufin Yousuf : +966 534125922 </span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries International Trading & Technical Services Company LTD
												,<br>
												China</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>Office 4028,4/F,Zhonghui Building <br>
													No.16 Henan Rd.South, Huangpu District,<br>
													Shanghai,China 200002 <br>
													Tel: +86 (21)6330 6238<br>


													Email: <a
														href="mailto:arieschina@ariesmar.com">arieschina@ariesmar.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Sujith V S: +8615052310972</span>

													<br>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Oilfield Inspection & Consultation Co.WLL,<br> Kuwait</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													Ajial Complex<br>
													Plot No. 006122, Office No. C2<br>
													Floor 1, Block 11<br>
													PO Box: 48846, Sabahiya 54559<br>
													Fahaheel, Kuwait<br>
													Tel: +965 2391 0693<br>
													Fax: +965 2391 0719<br>
													Email: <a
														href="mailto:arieskuwait@ariesgroup.ae">arieskuwait@ariesgroup.ae</a><br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Sivadas KP : +965 6662 7600 </span>
												</p>
											</div>

										</div>


									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Energy Solutions, LDA,<br> ANGOLA</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													Warehouse A3, Avenida da Boa Vista,<br>
													Urbano Sambizanga District,<br>
													Luanda-Angola<br>
													Tel: +244 222 710 365<br>

													Email : <a
														href="mailto:ariesangola@ariesmar.com">ariesangola@ariesmar.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Satheesan Kolakkat: +244 949 179
														502</span>
												</p>
											</div>

										</div>

									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Energy Solutions GmbH, <br> Germany</h2>
											<div class="clear"></div>

										</div>


										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>Ludwig-Erhard-Str.18 <br>
													20459 Hamburg<br>
													Tel: +4915207391564<br>

													Email: <a
														href="mailto:arieshamburg@ariesgroupglobal.com">arieshamburg@ariesgroupglobal.com</a><br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Nisanth Menon : +4915207391564</span>

													<br>
												</p>
											</div>
										</div>



									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Offshore INC., U.S.A.</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													Westheimer Avenue. <br>
													Houston, TX 77056, USA <br>
													Tel: +971 50 1772084 <br>


													Email: <a
														href="mailto:arieshouston@ariesoffshore.com">arieshouston@ariesoffshore.com</a><br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Akhil Joseph V : +971 50 1772084</span>
												</p>
											</div>

										</div>


									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Network PTE. LTD, Singapore</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													2 Venture Drive<br>
													#11-14 Vision Exchange,<br>
													Singapore 608526<br>
													Tel: +65 6220 9056<br>
													Fax: +65 6220 9057<br>
													Email: <a
														href="mailto:designsg@ariesgroup.ae">designsg@ariesgroup.ae</a><br>
													Website: <a href="http://www.ariesgroupglobal.com/"
														target="_blank">www.ariesgroupglobal.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Jose George : +65 9710 9545</span>
													<br>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine (L.L.C) (Singapore Branch), Singapore</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>


													WCEGA PLAZA #-06-57 <br>
													1 Bukit Batok Cres <br>
													Singapore 658064 <br>
													Tel: +65 65705205 <br>
													Email : <a
														href="mailto:utsg@ariesgroup.ae">utsg@ariesgroup.ae</a><br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Roshan Thomas : +65 86180168</span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine & Engg Services SDN. BHD., Malaysia</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													Suite 5,Level 25,Tower 2<br>
													Etiqa Twins,11 Jalan Pinang<br>
													50450,Kuala Lumpur,Malaysia<br>
													Tel:0603 2726 9933<br>

													Email : <a
														href="mailto:malaysia@ariesgroup.ae">malaysia@ariesgroup.ae</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Benson: +601126203164</span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Offshore, UK</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>6&7 Queens Terrace<br>
													Aberdeen , AB10 1Xl<br>
													Tel: +44 7459541762<br>

													Email: <a
														href="mailto:arieseurope@ariesmar.com">arieseurope@ariesmar.com</a><br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Glen Goes
														: +44 7459541762</span>

													<br>
												</p>
											</div>
										</div>
									</div>
									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>PT ARIES MARITIM SOLUSI INDONESIA , Indonesia</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Komplek Perumahan Bukit Mas Blok Tanjung Nomor 19A,<br>
													Kelurahan Lubuk Baja Kota,<br>
													Kecamatan Lubuk Baja<br>
													Landmark: Belakang NITC Mall, Depan Billyard centre.<br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Syahrul Rahman: +6282284417605</span>

												</p>
											</div>

										</div>
									</div>
									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine MMC, Azerbaijan</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>Salyan Highway, Baku,<br>
													Azerbaijan<br>
													Mob: +994 503012258,<br>
													Tel: +994 124471412,<br>
													Fax: +994 124471494<br>
													Email: <a
														href="mailto:ariesbaku@ariesgroup.ae">ariesbaku@ariesgroup.ae</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Sarath Radakrishnan : +971 50 8643987
													</span>
													<!--Website:<a href="https://www.ariesmar.com" target="_blank">www.ariesmar.com</a><br>-->
												</p>
											</div>

										</div>
									</div>
									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Underwater Solutions PTE LTD, Singapore</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													2 Venture Drive<br>
													#11-14 Vision Exchange,<br>
													Singapore 608526<br>
													Tel: +65 6220 9056<br>

													Email: <a
														href="mailto:commercial.sg@ariesgroupglobal.com">commercial.sg@ariesgroupglobal.com</a><br>
													Website: <a href="http://www.ariesgroupglobal.com/"
														target="_blank">www.ariesgroupglobal.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Shridhar Basavraj : +65 8615 1629</span>
													<br>
												</p>
											</div>

										</div>
									</div>


									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Arteq PTE. LTD.,Singapore</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>2 Venture Drive<br> #11-14 Vision Exchange<br>
													Singapore 608526<br>
													Tel: <a href="tel:+65 6220 9056"> +65 6220 9056</a> <br>
													Email: <a href="mailto:arteq@ariesgroup.ae"> arteq@ariesgroup.ae
													</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Arunkumar: +65 8422 6402 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Energy Sarlu Madagascar</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													Lot 03B, Morafeno Plle 14/33 <br>
													TOMASINA, MADAGASCAR <br>
													Tel: +26 1327934429 <br>



													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Amal Sasi: +261 327934429</span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Energy Solutions SA, South Africa</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">


												<span style="color:blue;font-weight: bold;">Emergency
													Contact:</span>
												<br>
												<span style="color:black;">Nisanth M.S: +971 502219061 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Energy SDN BHD,Brunei</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Unit No.2, First floor, Lot 123,Jalan Sungai<br>
													Kuala Belait, KA2331, Negara Brunei Darussalam<br>
													Tel: +673 3281757<br>



													Email : <a
														href="mailto:ariesbrunei@ariesgroupglobal.com">ariesbrunei@ariesgroupglobal.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;"> Muhammed Niyas Nazarudeen: +673
														7101498</span>
												</p>
											</div>

										</div>

									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Global Energy Solutions LTD,<br> Turkey</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>IÇERENKÖY MAH.ÜSKÜDAR-İÇERENKÖY YOLU CAD.ÖZIS OFIS ATAŞEHIR NO: 21 IÇ
													KAPI NO:6 ATAŞEHIR/ISTANBUL
													<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Sajan Stephen: +90 5449204990
													</span>

												</p>
											</div>

										</div>
									</div>
									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Energy (GUYANA) INC,<br> Guyana</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>LOT1, Croal Street, Stabroek, George Town<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Praveenraj Priyanivas: +592 686 5077
													</span>

												</p>
											</div>

										</div>
									</div>



									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine W.L.L., Nepal</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>Madhyapur Thimi Municipality - 9,<br>
													Bhaktapur. Bagmati, Nepal<br>
													Mob: <a href="tel:+9779842566074"> +9779842566074</a> <br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Hari Parasad: +9779842566074 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Energy Solutions LTD, UK</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>6&7 Queens Terrace<br>
													Aberdeen , AB10 1Xl<br>
													Tel: +44 7459541762<br>

													Email: <a
														href="mailto:arieseurope@ariesmar.com">arieseurope@ariesmar.com</a><br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Glen Goes
														: +44 7459541762</span>

													<br>
												</p>
											</div>
										</div>
									</div>
									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Overseas Services, Cochin</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>BCG Tower<br>
													Opp. CSEZ<br>
													Seaport Airport Road, Kakkanad
													Kochi - 682037<br> Kerala, INDIA<br>
													Tel. : +91 484 4081555<br>
													Fax : +91 484 4055561<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Vipin P: +91 9539000570 </span>


												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine & Engineering Services<br> Private Limited, Punalur Br</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													1st Floor SreeVilasam,Aickarakkonam<br>
													Kakkodu P.O, Punalur<br>
													Pin - 691331 <br>
													Tel:+91 475 2225776<br>
													E-mail:<a
														href="mailto:adminpunalur@ariesmar.com">adminpunalur@ariesmar.com</a>
													<br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Rajesh K D:+91 8547740485 </span>
												</p>
											</div>

										</div>

									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine & Engineering Services<br> Private Limited, Mumbai</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Rupa Solitaire,1303,A-WING,<br>Millenium Bussiness Park, <br>

													Mahape, Navi Mumbai <br>
													P.O BOX - 400710<br>
													Contact No: +91(0)2249689844/45 <br>
													E-mail: <a
														href="mailto:designmumbai@ariesgroupglobal.com">designmumbai@ariesgroupglobal.com</a>
													<br>
													Web: <a href="https://www.ariesmar.com/in/en"
														target="_blank">www.ariesmar.com</a>
													<br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Pankaj Patil: +91 9892810634
													</span>

												</p>
											</div>
										</div>
									</div>
									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine & Engineering Services<br> Private Limited,Gujarat
											</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													PLOT NO:39/40<br>
													Office No: 18 <br>
													Swaminarayan Building, Gandhidham,Gujarat <br>
													P.O BOX: 370201 <br>


													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;"> Antony Roshin :<br>+91 9995806817 </span>

												</p>
											</div>
										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine & Engineering Services<br> Private Limited, Goa Br</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>PLOT SC- 1,41/42,<br>
													2nd Floor, Above State Bank of India,<br>
													Verna Industrial Estate<br>
													Verna, Goa 403722, India<br>
													Email: <a
														href="mailto:ariesgoa@ariesgroup.ae">ariesgoa@ariesgroup.ae</a>
													<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Girish Naik: +91 7798675872 </span>

												</p>
											</div>
										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Telecasting Private Limited, Cochin</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>BCG Tower<br>
													Opp. CSEZ<br>
													Seaport Airport Road, Kakkanad
													Kochi - 682037<br> Kerala, INDIA<br>
													Tel. : +91 484 4081555<br>
													Fax : +91 484 4055561<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Johnson T I: +91 9539000513 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries E-Solutions Private Limited, Cochin</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>BCG Tower<br>
													Opp. CSEZ<br>
													Seaport Airport Road, Kakkanad
													Kochi - 682037<br> Kerala, INDIA<br>
													Tel. : +91 484 4081555<br>
													Fax : +91 484 4055561<br>
													Website: <a href="http://ariesesolutions.com/"
														target="_blank">ariesesolutions.com</a><br>
													Email: <a
														href="mailto:support@ariesesolutions.com">support@ariesesolutions.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Basil : +91 9562346314 </span>


												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Medibiz Solutions Private Limited,<br>Cochin</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>BCG Tower<br>
													Opp. CSEZ<br>
													Seaport Airport Road, Kakkanad
													Kochi - 682037<br> Kerala, INDIA<br>
													Tel. : +91 484 4081555<br>
													Fax : +91 484 4055561<br>
													Website: <a href="http://medibiztv.com/"
														target="_blank">medibiztv.com</a><br>
													Email: <a href="mailto:hr@medibiztv.com">hr@medibiztv.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Johnson T I: +91 9539000513 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine & Engineering Services<br> Private Limited, Cochin</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>BCG Tower<br>
													Opp. CSEZ<br>
													Seaport Airport Road, Kakkanad
													Kochi - 682037<br> Kerala, INDIA<br>
													Tel. : +91 484 4081555<br>
													Fax : +91 484 4055561<br>
													Website: <a href="http://www.ariesmar.com/"
														target="_blank">www.ariesmar.com</a><br>
													Email: <a
														href="mailto:ariesindia@ariesmar.com">ariesindia@ariesmar.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Ajith E S: +91 9995801912 </span><br>
													<span style="color:black;">Antony Roshin :<br>+91 9995806817 </span>


												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries International Maritime Research Institute, Cochin</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													BCG, Building,1st floor Opp.CSEZ,<br>
													Seaport Airport Road<br>
													Kakkanad<br>
													Cochin - 682 037<br>
													Tel: +91 484 4081555<br>
													Fax: +91 484 4055561<br>

													Website: <a href="https://www.aimri.in"
														target="_blank">Aimri.in</a><br>
													Email: <a href="mailto:admin@aimri.in">admin@aimri.in</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Akhil S: +91 9048767807 </span>


												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Rope Access Specialist Certification Centre, Cochin</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>Nalam Mile, Erumathala P.O.,<br> Aluva, Ernakulam<br>
													Kerala - 683112, India <br>
													Tel. : +91 484 4081555<br>
													Fax : +91 484 4055561<br>
													E-mail : <a
														href="mailto:iratatraining@ariesmar.com">iratatraining@ariesmar.com</a>
													<br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Soman: +91 9995806812</span>


												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Vismayas Max Entertainments <br> Private Limited, Cochin</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>57, 7th Cross Road, Giringar Housing Colony<br>
													Giri Nagar Housing Society<br>
													KV Nagar,Panampilly Nagar<br>

													Ernakulam - 682036 <br> Kerala, India<br>
													<!-- Tel. : +91 484 4081555<br>
													Fax : +91 484 4055561<br> -->

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Jayachandran N : +91 9847712304</span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Indywood Entertainment Consortium LLP,Cochin</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>

													BCG Tower<br>
													Opp. CSEZ<br>
													Seaport Airport Road <br> Kakkanad
													Kochi - 682037<br> Kerala, INDIA<br>
													Tel. : +91 484 4081555<br>
													Fax : +91 484 4055561<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Lakshmi Atul :+91 9539000518 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Plex Private Limited,<br>Trivandrum</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													<!-- Kunnumpuram Road,
													Near Ayurveda College, <br>
													Trivandrum, Kerala, India<br>
													Booking Related Enquiries:<br>
													Tel:0471 4066660 <br> -->

													SL Theatre Complex, Near Overbridge,<br>
													Thiruvananthapuram,<br>
													Pin:695001 <br>
													Tel:+91 471 2473031<br>

													Email: <a href="mailto: contact@ariesepica.com">
														contact@ariesepica.com</a><br>
													<!--Website:<a href="https://www.ariesmar.com" target="_blank">www.ariesmar.com</a><br>-->
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														<!-- Vipin Thulaseedharan : +91 7510300075 -->
														Jayadev s kumar : +91 9633958465
													</span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Vismayas Max Entertainments<br> Private Limited KINFRA, Trivandrum,
											</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>HVMH+428<br>
													KINFRA Film and Video Park, <br>
													Chanthavila, Sainik School <br>
													P.O BOX: 695585 <br>
													Email: <a
														href="mailto:jayan@ariesvismayasmax.com">jayan@ariesvismayasmax.com</a><br>
													Website: <a href="http://ariesvismayasmax.com"
														target="_blank">ariesvismayasmax.com</a><br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Jayadev S :+91 9633958465 </span>

												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Digital Magics Private Limited, Trivandrum</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Door# 11/335,<br> pullappallil Buildings, Kuruppanthara<br>
													Kottayam, Kerala- 686603 <br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Baiju Sreedhar: +91 9744764007</span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Sportica and Leisure Castle<br> Private Limited, Punalur
											</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													BLDNG NO: 23/478 <br>
													Near Akshaya Center, Aickarakkonam,<br>
													Kakkodu Post, Punalur- 691331 <br>
													Tel: +91 475 2225776 <br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Rajesh Kumar Dharmarajan: +91 8547740485</span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>First Drop Innovations Pvt. Ltd,<br> Cochin</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													BCG, Building,1st floor Opp.CSEZ, <br> SEAPORT AIRPORT ROAD,KAKKANAD
													<br> COCHIN- 682 037<br>
													Tel: +91 484 4081555 <br>
													FAX: +91 484 4055561 <br>
													E-mail: <a
														href="mailto:ariesindia@ariesmar.com">ariesindia@ariesmar.com</a>
													<br>
													Web : <a href="https://www.ariesgroupglobal.com/"
														target="_blank">www.ariesgroupglobal.com</a><br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Shyam Kurup: +91 9539000541 </span>

												</p>
											</div>

										</div>

									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine & Engineering Services<br> Private Limited ,
												Mangaluru</h2>
											<div class="clear"></div>
										</div>

										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													2nd Floor, Albuquerque Chambers,<br> Pandeshwar, Mangalore,
													Karnataka<br> P.O BOX: 575001<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Sujaya Chandra: +91 8714016453 </span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Marine & Engineering Services Private Limited , Kannur
											</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													X9GC+8WV, Mangad,
													Kerala<br>
													P.O BOX - 670562<br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Rajesh P V: +91 9995806818 </span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Rope Access and Specialized <br>Training Services Private
												Limited,<br>
												Jharkhand</h2>
											<div class="clear"></div>

										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Plot No 589, Khata No. 38,<br> Hitku Rugardih Road, Thana No. 130,
													<br> P.O. Sunder nagar, Mouza,<br>Jharkhand- 832107<br>

													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>

													<span style="color:black;">

														Antony Roshin :<br>+91 9995806817
													</span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Go Green Products Private<br> Limited, Punalur</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Door # 103K,<br>
													Government Hospital Road, Punalur,<br>
													Pathanapuram Kollam- 691305<br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Arun C- Project Manager: +91 8921344035 </span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Plex Private Limited, Punalur</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Aries PRV Grande ,Valacodu,<br>
													Punalur- Kollam<br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Joy Madhavan : +91 9995367729 </span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Kalanilayam Arts & Theatre<br> Private Limited,Punalur</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Kalanilayam Buildings, Kodungallur,<br>
													Thrissur- 680664<br>
													Tel:+91 480 2802526 <br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Ananthapadmanabhan: +91 8089922757<br>(Manging Director)
													</span>
												</p>
											</div>

										</div>
									</div>

									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Freshcraft Technologies Trading LLC<br>Dubai</h2>
											<div class="clear"></div>
										</div>
										<!-- <div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Address: <br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Name and number
													</span>
												</p>
											</div>
										</div> -->
									</div>
									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>
												Empire Marine Aries Yachts And Boats Trading LL<br>Dubai
											</h2>
											<div class="clear"></div>
										</div>
										<!-- <div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Address: <br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Name and number
													</span>
												</p>
											</div>
										</div> -->
									</div>
									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>
												Aries Marine & Eng.Services LLC-Branch -01<br>Ajman
											</h2>
											<div class="clear"></div>
										</div>
										<!-- <div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>
													Address: <br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">
														Name and number
													</span>
												</p>
											</div>
										</div> -->
									</div>








									<!-- <div class="AccordionPanelContent">
										<div class=" ad-content">
											<p>

												Post Box No: 25114<br>
												Al Mussafah Industrial Area<br>
												Plot # 4-6 M40, Ware House # 12<br>
												Abudhabi.,U.A.E<br>
												Phone No: +971 2 4414416<br>
												Fax No: +971 2 4414467<br>

												<span style="color:blue;font-weight: bold;">Emergency
													Contact:</span>
												<br>
												<span style="color:black;">Arun Ashokan : +971 50 5006113 </span>

											</p>
										</div>

									</div> -->
								</div>






								<!--<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>EPICA Media Production L.L.C, Sharjah</h2>
<div class="clear"></div>
</div>

</div>  -->






								<!--	<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Aviation Services FZE,<br> Sharjah</h2>
											<div class="clear"></div>
										</div>
										<div class="AccordionPanelContent">
											<div class=" ad-content">
												<p>Q3-187, PO Box 8337, <br>
													Sharjah Airport Free Zone, <br>
													Sharjah, United Arab Emirates <br>
													Phone No: +971 6 5529113, <br>
													Fax No: +971 6 5503100, <br>
													Email: <a
														href="mailto:aviation@ariesgroup.ae">aviation@ariesgroup.ae</a><br>
													Website: <a
														href="https://www.ariesaviationservices.com/">www.ariesaviationservices.com</a><br>
													<span style="color:blue;font-weight: bold;">Emergency
														Contact:</span>
													<br>
													<span style="color:black;">Renjith Raj : +971 50 9638995 </span>
													<!--Website: <a href="http://www.ariesgroupglobal.com/" target="_blank">www.ariesgroupglobal.com</a><br>
												</p>
											</div>

										</div>
									</div>


									<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Worldwide Services DWC L.L.C, Dubai</h2>
											<div class="clear"></div>
										</div>

									</div>-->







								<!--	<div class="AccordionPanel">
										<div class="AccordionPanelTab" onclick="toggleAccordion(this)">
											<h2>Aries Printing Services LLC, Dubai</h2>
											<div class="clear"></div>
										</div>
									</div>-->















								<!-- *****************************************-->







































								<!---**************UAE************************************** -->




















































								<!--
<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>EPICA Studio Private Limited, Trivandrum, India</h2>
<div class="clear"></div>
</div>
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>MODULE 110-S, 10TH FLOOR, GANGA BUILDING,<br>
	TECHNOPARK PHASE III, TRIVANDRUM,<br>
	KERALA 695583, INDIA. <br>
	Phone:+91 471 2710710 <br>
Email: <a href="mailto:contact@ariesepica.com">contact@ariesepica.com</a><br>
<!--Website:<a href="https://www.ariesmar.com" target="_blank">www.ariesmar.com</a><br>-->
								<!--</p></div>
   
</div>
</div>-->














































								<!--
<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>Cliniqally Healthtech Private Ltd, BANGALORE</h2>
<div class="clear"></div>
</div>

</div>-->




















								<!-- <div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>Aries International Interiors L.L.C RAK Branch, Ras Al Khaimah</h2>
<div class="clear"></div>
</div>
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>Office No: 504, Julphar Tower, Ras Al Khaimah, U.A.E, PO Box : 96297 <br>
Ras Al Khaimah - UAE<br>
+971 723 396 89.<br>
+971 723 396 86.<br>
Email: <a href="mailto:interior@ariesgroup.ae">interior@ariesgroup.ae</a><br>
Website:<a href="http://www.ariesinternational.ae/" target="_blank">www.ariesinternational.ae</a><br>
</p></div>
   
</div>
</div>  -->





								<!-- <div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>MediBiz Ayur Home, Trivandrum, India</h2>
<div class="clear"></div>
</div>
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>North Cliff End,Thiruvambadi Beach,Varkala-695141,Kerala India.<br>
+91 9539 999 968<br>
+91 4702606565<br>
Email: <a href="mailto:info@medibizayurhome.com">info@medibizayurhome.com</a><br>
Website:<a href="http://medibizayurhome.com/" target="_blank">medibizayurhome.com</a><br>
</p></div>
   
</div>
</div> -->









								<!-- <div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>Aries Estrrado Technologies, Trivandrum, India</h2>
<div class="clear"></div>
</div>
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>Keston Enclave, Keston Road Near KSIDC,<br>
 Vellayambalam Trivandrum-33, <br>
 Kerala, India +91 9074555150<br>
Email: <a href="mailto:info@estrrado.com">info@estrrado.com</a><br>

</p></div>
   
</div>
</div> -->

								<!-- <div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>Aries Animatica, Trivandrum, India</h2>
<div class="clear"></div>
</div>
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>MODULE 110-S, 10TH FLOOR, GANGA BUILDING,<br>
	TECHNOPARK PHASE III, TRIVANDRUM,<br>
	KERALA 695583, INDIA. <br>
	Phone:+91 471 2710710 <br>
Email: <a href="mailto:contact@ariesepica.com">contact@ariesepica.com</a><br>
</p></div>
   
</div>
</div> -->




								<!-- <div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>Aries Interiors & Architects, Kochi, India</h2>
<div class="clear"></div>
</div>
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>BCG Tower<br> 
Opp. CSEZ<br>
Seaport Airport Road, Kakkanad 
Kochi - 682037<br> Kerala, INDIA<br>
Tel. : +91 484 4066666<br>
Fax : +91 484 4055561<br>
</p></div>
   
</div>
</div> -->




								<!-- <div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>Aries Tourism, Kochi, India</h2>
<div class="clear"></div>
</div>
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>BCG Tower<br> 
Opp. CSEZ<br>
Seaport Airport Road, Kakkanad 
Kochi - 682037<br> Kerala, INDIA<br>
Tel. : +91 484 4066666<br>
Fax : +91 484 4055561<br>
</p></div>
   
</div>
</div> -->
								<!-- <div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>Aries Creations, Kochi, India</h2>
<div class="clear"></div>
</div>
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>BCG Tower<br> 
Opp. CSEZ<br>
Seaport Airport Road, Kakkanad 
Kochi - 682037<br> Kerala, INDIA<br>
Tel. : +91 484 4066666<br>
Fax : +91 484 4055561<br>
</p></div>
   
</div>
</div> -->



















								<!--indian
<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>ARIES INDIA</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>BCG Tower<br> 
Opp. CSEZ<br>
Seaport Airport Road, Kakkanad 
Kochi - 682037<br> Kerala, INDIA<br>
Tel. : +91 484 4066666<br>
Fax : +91 484 4055561<br>
Website: <a href="http://www.ariesmar.com/" target="_blank">www.ariesmar.com</a><br>
Email: <a href="mailto:ariesindia@ariesmar.com">ariesindia@ariesmar.com</a><br>
</p></div>
   
</div></div>
indian

uae
<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>ARIES TESTING LAB</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>Post Box No: 125378<br>
Warehouse# 4, Plot No. 613-892<br>
Industrial Area-2, <br>
Ras Al Khoor<br>
Dubai ,U.A.E<br>
Phone No: 04-3471531<br>
Fax No: 04-3471591<br>
											 
Email: <a href="mailto:atlab@ariesgroup.ae">atlab@ariesgroup.ae</a><br>
Website: <a href="http://www.ariesgroupglobal.com/" target="_blank">ariesgroupglobal.com</a><br>
</p></div>
   
</div></div>
uae

behrain
<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>ARIES USA</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>Suite# 211<br>
5100 Westheimer Ave.<br>
Houston, TX 77056<br>
Tel: +1 832 600 5008<br>
Website: <a href="http://www.ariesoffshore.com/" target="_blank">www.ariesoffshore.com</a><br>
Email: <a href="mailto:arieshouston@ariesoffshore.com">arieshouston@ariesoffshore.com</a><br>
</p></div>
   
</div></div>
behrain

malaysia
<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>ARIES MALAYSIA</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>17-3, Jalan Wangsa Delima 12<br> 
Wangsa Maju 53300<br>
Kuala Lampur, Malaysia<br>
Tel : +6 03 4010 4010<br>
Fax: +6 03 4010 4011<br>
email: <a href="mailto:malaysia@ariesgroup.ae">malaysia@ariesgroup.ae</a><br>
</p></div>
   
</div></div>
malaysia

singapore
<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>ARIES SINGAPORE</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>10 Anson Road,#22-03A<br>

International Plaza<br>

Singapore - 079903<br>

T : +6562209056<br>

F : +6562209057<br>

Email : <a href="mailto:designsg@ariesgroup.ae">designsg@ariesgroup.ae</a><br>
</p><br/>

	<p>21 Bukit Batok Crescent,<br>

		#16-72,<br>
		
		Wcega Tower,<br>

		Singapore 658065,<br>

		Tel: +65 65705205<br>
		
		Fax: +65 65705019<br>

Email : <a href="mailto:utsg@ariesgroup.ae">utsg@ariesgroup.ae</a><br>
</p>

</div>
   
</div></div>
singapore

qatar
<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>ARIES QATAR</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>P.O. Box: 15368<br>
Doha, Qatar<br>
Tel: +974 4 4366052<br>
Fax: +974 4 4420362<br>
Email: <a href="mailto:ariesqatar@ariesgroup.ae">ariesqatar@ariesgroup.ae</a><br>
</p></div>
   
</div></div>
qatar

china
<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2>ARIES CHINA</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>Office No.3401<br>
Zhongnan century city Halleast<br>
Tower A<br>
Post code 226000<br>
 Nantong City<br>
Jiangsu Province<br>
CHINA<br>
Tel:+86 513810 20640
</p></div>
   
</div></div>
qatar

mc

Aries International Interiors L.L.C-Dubai
<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2  style="text-transform: uppercase">Aries International<br /> Interiors L.L.C</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>Dubai<br />
	Al Qayada Building<br />

Office# 112 1st Floor<br />

Near Galadari Signal<br />

Hor-Al-Anz<br />

Post Box No: 96297<br />

Deira Dubai,U.A.E<br />

Phone No: 04-2997491<br />

Fax No:     04-2997892<br />

Email:<a href="mailto:interior@ariesgroup.ae">interior@ariesgroup.ae</a>
</p></div>
   
</div></div>
end Aries International Interiors L.L.C-Dubai

 Aries Marine L.L.C
<div class="AccordionPanel">
<div class="AccordionPanelTab">
<h2  style="text-transform: uppercase"> Aries Marine L.L.C</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>Dubai<br />
   Al Qayada Building<br />

Office# 112 1st Floor<br />

Near Galadari Signal<br />

Hor-Al-Anz<br />
Post Box No: 94354<br />

Phone No: 04-2997939<br />

Fax No:     04-2997940<br />

Email:<a href="mailto:ariesmarine@ariesgroup.ae">marilto:ariesmarine@ariesgroup.ae</a>
</p></div>
   
</div></div>
 
 end  Aries Marine L.L.C
 
 <div class="AccordionPanel">
<div class="AccordionPanelTab">
	<h2 style="text-transform: uppercase">Aries Oil Field <br />Services L.L.C</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>Abudhabi<br />
   

Post Box No: 39651<br />

Al Mussafah Industrial Area<br />

Plot # 4-6 M40, Ware House # 13<br />

Abudhabi.,U.A.E<br />

Phone No: 02-5508893<br />

Fax No:     02-5508996<br />

Email:<a href="mailto:ariesauh@ariesgroup.ae">ariesauh@ariesgroup.ae</a>
</p></div>
   
</div></div>
 
 
 
 
 
 <div class="AccordionPanel">
<div class="AccordionPanelTab">
	<h2 style="text-transform: uppercase">
Aries International  <br />Lab Oil & Gas Engineering Services L.L.C</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>Abudhabi<br />
   

Post Box No: 25114<br />

Al Mussafah Industrial Area<br />

Plot # 4-6 M40, Ware House # 12<br />

Abudhabi.,U.A.E<br />

Phone No: 02-4414416<br />

Fax No:     02-4414467<br />

Email:<a href="mailto:ariesauh@ariesgroup.ae">ariesauh@ariesgroup.ae</a>
</p></div>
   
</div></div>
 
 <div class="AccordionPanel">
<div class="AccordionPanelTab">
	<h2 style="text-transform: uppercase">
Aries International  <br />Lab Oil & Gas Engineering Services L.L.C</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>Abudhabi<br />
   

Post Box No: 25114<br />

Al Mussafah Industrial Area<br />

Plot # 4-6 M40, Ware House # 12<br />

Abudhabi.,U.A.E<br />

Phone No: 02-4414416<br />

Fax No:     02-4414467<br />

Email:<a href="mailto:ariesauh@ariesgroup.ae">ariesauh@ariesgroup.ae</a>
</p></div>
   
</div></div>-->


								<!-- <div class="AccordionPanel">
<div class="AccordionPanelTab">
	<h2 style="text-transform: uppercase">
Aries International  <br />Lab Oil & Gas Engineering Services L.L.C</h2>
<div class="clear"></div>
</div>
	
<div class="AccordionPanelContent">
<div class=" ad-content">
<p>Abudhabi<br />
   

Post Box No: 25114<br />

Al Mussafah Industrial Area<br />

Plot # 4-6 M40, Ware House # 12<br />

Abudhabi.,U.A.E<br />

Phone No: 02-4414416<br />

Fax No:     02-4414467<br />

Email:<a href="mailto:ariesauh@ariesgroup.ae">ariesauh@ariesgroup.ae</a>
</p></div>
   
</div></div>-->



							</div>
							<!--end accordian-->
						</div>
						<!--end office address-->
					</div>
					<!--end address-->

					<!--start enquiry-->
					<div class="enguiry-col">
						<h1>Write to Us</h1>
						<div class="enquiry">
							<?php
							//	if(isset($_COOKIE['enq_name']))
							//	{
							//		echo "<span style='color:#f00; padding-left:62px;'>Incorrect Captcha value entered</span>";
							//	}
							//	if(isset($_COOKIE['mailSent']))
							//	{
							//		echo "<span style='color:#f00;'>Thanks for contacting. We will get back to you soon.</span>";
							//	}


							?>
							<form name="enquiry" method="post" id="form-contact" action="contactback.php">
								<?php

								if (isset($_GET['status']) && $_GET['status'] == 0) {

									echo " <font color=red>Please click on the reCAPTCHA box</font>.";
								}

								if (isset($_GET['status']) && $_GET['status'] == 1) {

									echo " <font color=green>Your enquiry has been submitted successfuly</font>.";
								}
								?>
								<div class="enquiry-form">
									<h5>Name</h5>
									<div class="sep">:</div>
									<div class="enquiry-box"><input type="text" class="txtbox" name="name" id="name1"
											<?php if (isset($_COOKIE['enq_name'])) {
												echo "value='" . $_COOKIE['enq_name'] . "'";
											} ?>></div>
									<div class="star">*</div>
								</div><br>

								<div class="enquiry-form">
									<h5>Address</h5>
									<div class="sep">:</div>
									<div class="enquiry-box"><input type="text" name="address" id="address"
											class="txtbox" <?php if (isset($_COOKIE['enq_address'])) {
																echo "value='" . $_COOKIE['enq_address'] . "'";
															} ?>></div>
								</div><br>


								<div class="enquiry-form">
									<h5>Email</h5>
									<div class="sep">:</div>
									<div class="enquiry-box"><input type="email" name="email" id="email" class="txtbox"
											<?php if (isset($_COOKIE['enq_email'])) {
												echo "value='" . $_COOKIE['enq_email'] . "'";
											} ?>></div>
									<div class="star">*</div>
								</div><br>
								<div class="enquiry-form" id="email_add">
									<h5>Email ID</h5>
									<div class="sep">:</div>
									<div class="enquiry-box"><input type="email" name="emailid" id="emailid"
											class="txtbox"></div>
									<div class="star">*</div>
								</div>
								<div class="enquiry-form">
									<h5>Contact no.</h5>
									<div class="sep">:</div>
									<div class="enquiry-box"><input type="text" name="contact" id="contact"
											class="txtbox" <?php if (isset($_COOKIE['enq_contact'])) {
																echo "value='" . $_COOKIE['enq_contact'] . "'";
															} ?>></div>
								</div><br>

								<div class="enquiry-form">
									<h5>Location</h5>
									<div class="sep">:</div>
									<div class="enquiry-box"><input type="text" class="txtbox" name="location"
											id="location" <?php if (isset($_COOKIE['enq_location'])) {
																echo "value='" . $_COOKIE['enq_location'] . "'";
															} ?>></div>
								</div><br>

								<div class="enquiry-form1">
									<h5>Comments</h5>
									<div class="sep">:</div>
									<div class="comment-box"><input type="text" name="comments" id="comments"
											class="txtbox1" <?php if (isset($_COOKIE['enq_comments'])) {
																echo "value='" . $_COOKIE['enq_comments'] . "'";
															} ?>></div>
									<div class="star">*</div>
								</div><br>

								<!--        <div class="codebox"><img src="captcha.php"  class="img-responsive"></div>
		
		 <div class="enquiry-form"><h5>Enter Code</h5><div class="sep">:</div><div class="enquiry-box"><input type="text" class="txtbox" name="ver_code" id="ver_code" value=""></div><div class="star">*</div></div>-->
								<div class="g-recaptcha" data-sitekey="6Ldxe20UAAAAAD_17wcLirt0F7WmMb_Ixgoi3AYt">
								</div>
								<!--<center>  <div class="sendbtn"><input type="image" src="images/send-btn.jpg" class="img-responsive" onClick="return validate();" name="submit" alt="" title=""></div></center>-->
								<center> <input type="submit" class="btn btn-primary" value="Send Message" name="sub">
								</center>
							</form>
						</div>

						<div class="clear"></div>
					</div>
					<!--end enquiry-->
					<div class="clear"></div>
				</div>
				<!--end contact-->
			</div>
			<!--end inr lft-->
			<!--start inr rgt-->
			<?php require_once('includes/right-container-contact.php') ?>
			<!--end inr rgt-->
		</div>
		<!-- end content container-->
		<div class="clear"></div>
	</div>
	<!-- end main-container-->
	</div>
	<!-- end index wrapper-->
	<div class="clear"></div>


	<!-- <script type="text/javascript">
		var Accordion1 = new Spry.Widget.Accordion("Accordion1");
	</script> -->

	<script type="text/javascript">
		var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1", {
			contentIsOpen: false
		});
	</script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<script src="https://www.google.com/recaptcha/api.js"></script>
	<!--Form validation script start-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<!--Form validation script End-->
	<style>
		.error {
			color: red;
			font-family: "Times New Roman", Times, serif;
		}
	</style>
	<script type="text/javascript">
		var validate = $("#form-contact").validate({
			rules: {
				name: "required",
				//                 address:"required",
				email: "required",
				//                  contact:"required",
				//                  location:"required",
				comments: "required",
			},
			messages: {
				name: "Please Enter Your Name",
				//            address:"Please Enter Address",
				email: "Please Enter Valid Email Id",
				//            contact:"Please Enter Contact Number",
				//            location:"Please Enter Your Location",
				comments: "Please Enter Comments",
			}
		});
		// to avoid spam mails
		$(document).ready(
			function() {
				$('#email_add').hide()
			}
		);
	</script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<?php require_once('includes/footer.php') ?>
</body>

</html>
