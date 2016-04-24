<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Header
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function tpl_header($cmd, $title, $des, $kws) {
			
			$link = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
			
			echo '
				
				<!DOCTYPE html>
				
				<html lang="en">
				
					<head>
					
						<title>' . $title . '</title>
						<meta charset="utf-8" />
						<meta name="viewport" content="width=device-width, initial-scale=1" />
						<meta name="description" content="' . $des . '" />
						<meta name="keywords" content="' . $kws . '" /> 

						<link rel="stylesheet" href="' . BASEHREF . 'assets/css/main.css" />

						<!--[if lte IE 8]>
							<script src="' . BASEHREF . 'assets/js/ie/html5shiv.js"></script>
							<link rel="stylesheet" href="' . BASEHREF . 'assets/css/ie8.css" />
						<![endif]-->

						<!--[if lte IE 9]><link rel="stylesheet" href="' . BASEHREF . 'assets/css/ie9.css" /><![endif]-->							

					</head>

			';
				
			flush();
				
			echo '

					<body id="top">

						<!-- Header -->
							<header id="header">
								<h1><a href="' . BASEHREF . '">' . SITENAME . '</a></h1>				
								<a href="#menu">Menu</a>
							</header>

						<!-- Nav -->
							<nav id="menu">
								<ul class="links">
									<li><a href="' . BASEHREF . '">All Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/hd" class="' . ( ($link == "hd") ? "active"   : "") . '">HD Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/new" class="' . ( ($link == "new") ? "active"   : "") . '">New Cams</a></li>					
									<li><a href="' . BASEHREF . 'cams/female" class="' . ( ($link == "female") ? "active"   : "") . '">Female Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/male" class="' . ( ($link == "male") ? "active"   : "") . '">Male Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/couple" class="' . ( ($link == "couple") ? "active"   : "") . '">Couples</a></li>
									<li><a href="' . BASEHREF . 'cams/shemale" class="' . ( ($link == "shemale") ? "active"   : "") . '">Shemales</a></li>
									<li><a href="' . LINK_BROADCAST . '" class="external">Broadcast Your Cam!</a></li>
								</ul>
								<ul class="actions vertical">
									<li><a href="' . LINK_SIGNUP . '" class="button special fit external">Free Account</a></li>
									<li><a href="#" class="button fit">Get Laid!</a></li>
									<li><a href="' . LINK_AFF . '" class="button fit external">Affiliate Program</a></li>
									
								</ul>
							</nav>					

			';
		
		}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Footer
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function tpl_footer() {
		
			echo '
			
						
							</div>

						<!-- Footer -->
							<footer id="footer">
								<div class="container">
									<div class="row double">
										<div class="6u 12u$(medium)">
											<h2>Responsive Chaturbate API Demo</h2>
											<p>Ornare interdum nascetur enim lobortis nunc amet placerat pellentesque nascetur in adipiscing. Interdum amet accumsan placerat commodo ut amet aliquam blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id lorem ipsum dolor.</p>
										</div>
										<div class="3u 6u(medium) 12u$(small)">
											<h3>What\'s Hot</h3>
											<ul class="alt">
												<li><a href="' . BASEHREF . 'cams/female">Female Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/couple">Couple Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/hd">HD Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/new">New Cams</a></li>
											</ul>
										</div>
										<div class="3u$ 6u$(medium) 12u$(small)">
											<h3>More Cool Stuff</h3>
											<ul class="alt">
												<li><a href="http://adultfriendfinder.com/go/g10296-ppc?page_id=685" class="external">Sex With Strangers!</a></li>
												<li><a href="https://bongacash.com/ref?c=226357" class="external">Earn up to $3 per free signup!</a></li>
												<li><a href="http://babes.hillipino.com" class="external">Desktop Strippers</a></li>
												<li><a href="https://github.com/hillipino" class="external">Get this Script</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="copyright">
									&copy; ' . SITENAME . '. All rights reserved. <a href="' . BASEHREF . 'privacy">Privacy</a> | <a href="' . BASEHREF . '2257">2257</a>
								</div>
							</footer>

					<!-- Scripts -->

						<script src="' . BASEHREF . 'assets/js/jquery.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/skel.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/util.js"></script>
						<!--[if lte IE 8]><script src="' . BASEHREF . 'assets/js/ie/respond.min.js"></script><![endif]-->
						<script src="' . BASEHREF . 'assets/js/main.js"></script>				

				</body>
				
			</html>
			
			';
		
		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Homepage
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	
		function tpl_home() {

			get_banner();

			echo '
				<!-- Main -->
					<div id="main">';	
				
			get_cams ( AFFID, TRACK, $gender='', 24 );
					
		}
		
		function tpl_404() {

			echo '
				<!-- Main -->
					<div id="main">';				
				
			get_cams ( AFFID, TRACK, $gender='', 24 );
					
		}	
		
		function tpl_cams() {	

			echo '
				<!-- Main -->
					<div id="main">';				
		
			$gender = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
		
			switch ( $gender ) {
				
				case 'female':
					$gender = 'f';
					break;
				case 'male':
					$gender = 'm';
					break;
				case 'couple':
					$gender = 'c';
					break;
				case 'shemale':
					$gender = 's';
					break;
				case 'hd':
					$gender = 'hd';
					break;
				case 'new':
					$gender = 'new';
					break;										
				default:
					$gender = '';

			}
			
			get_cams ( AFFID, TRACK, $gender, 24 );
			
		}
		
		function tpl_view_cams() {

			echo '<div id="content">';				

			$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
		
			solo_cams( AFFID, TRACK, $arg1 );	
		
		}

		function tpl_2257() {

			echo '
				<!-- Main -->
					<div id="content">

						<div class="container">

							<h2>18 U.S.C. § 2257 Statement</h2>

							<p>Any actual human beings depicted in images appearing on this website were over the age of 18 at the time those images were recorded.</p>
							
							<h3>Exemption: Content Produced by Third Parties</h3>

							<p>The operators of this website are not the "producers" of any depictions of actual or simulated sexually explicit conduct which may appear on this website. More specifically, the operators of this website limit their handling of such content, and only perform the activities of transmission, storage, retrieval, hosting, and/or formatting of material that may depict sexually explicit conduct, all of which material appears on the website as the result of actions taken by third-party users of the website. All portions of the website that contain such user-generated material are under the control of the relevant user, for whom this website is provided as an online service by its operators. Pursuant to 18 U.S.C. § 2257(h)(2)(B)(v) and 47 U.S.C. § 230(c), the operators of this website reserve the right to delete materials appearing on the site as the result of actions taken by the website’s users, which materials are deemed, in the operator’s sole discretion, to be indecent, obscene, defamatory, or inconsistent with the policies and terms of service for this website.</p>

							<h3>Exemption: Content Produced by Website Operators</h3>

							<p>To the extent that any images appear on the website, for which the operators of this website may be considered the “producer,” those images are exempt from the requirements of 18 U.S.C. § 2257 and 28 C.F.R. § 75 for one or more of the following reasons: (i) the produced images do not portray any sexually explicit conduct defined in 18 U.S.C. §§ 2256(2)(A); (ii) the produced images do not portray depictions of the genitals or pubic area created after July 27, 2006; (iii) the produced images do not portray simulated sexually explicit activity occurring after the effective date of 18 U.S.C. § 2257A; and/or (iv) the produced images were created prior to July 3, 1995.</p>

							<h3>Designated Records Custodian</h3>

							<p>Without limiting in any way the applicability of the above-stated exemptions, the operators of this website have designated the custodian, whose address appears below, to be the keeper of original records described in 18 U.S.C. § 2257 and 28 C.F.R. § 75 for all materials appearing on this website that fall into one of the following two categories: (i) marketing and advertising materials that contain visual depictions of actual or simulated sexually explicit conduct, which materials have been acquired or created by the website’s operators for the purpose of promoting the website; and (ii) all visual depictions of models, actors, actresses and other persons (each a “Performer”) who have elected to enable tipping, private shows, group shows, or any other service that permits collection, by the Performer, of tokens or any other form of virtual funds. Age verification records are collected and reviewed before permitting a Performer to collect virtual funds.</p>

							<p>The aforementioned records and their custodian can be found at the following location:</p>

							<address>
								Keeper of Records<br />
								Multi Media, LLC<br />
								27 Durham Road<br />
								Leadgate, Consett, Co. Durham, UK DH8 7RL
							</address>
						</div>


			';
					
		}

		function tpl_privacy() {

			echo '
				<!-- Main -->
					<div id="content">

						<div class="container">
							
							<h2>Privacy Policy</h2>

						</div>


			';
					
		}
			

?>