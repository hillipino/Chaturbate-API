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

					<body>
						
						<header id="header">
						
							<!-- Logo -->
								<h1><a href="' . BASEHREF . '" id="logo">' . SITENAME . '</a></h1>
							
							<nav id="nav">
								<ul class="actions options">
									<li><a href="' . BASEHREF . 'cams/female" class="' . ( ($link == "female") ? "active"   : "") . '">Females</a></li>
									<li><a href="' . BASEHREF . 'cams/male" class="' . ( ($link == "male") ? "active"   : "") . '">Males</a></li>
									<li><a href="' . BASEHREF . 'cams/couple" class="' . ( ($link == "couple") ? "active"   : "") . '">Couples</a></li>
									<li><a href="' . BASEHREF . 'cams/shemale" class="' . ( ($link == "shemale") ? "active"   : "") . '">Shemales</a></li>
									<li><a href="' . LINK_BROADCAST . '">Broadcast Your Cam!</a></li>
									<li><a href="' . LINK_AFF . '">Affiliate Program</a></li>
									<li><a href="' . LINK_SIGNUP . '" class="button">Free Account</a></li>
								</ul>
							</nav>

						</header>
					
					<!-- Main -->
						<div id="main">
									
			';
		
		}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Footer
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function tpl_footer() {
		
			echo '
			
						
					</div>
					
				<!-- Footer -->
					<div id="footer">
						<div class="copyright">

							<p>
								<a href="' . LINK_SIGNUP . '">Get your <strong>FREE</strong> account!</a> &nbsp;
								<a href="' . LINK_BROADCAST . '">Broadcast Your Cam!</a> &nbsp;
								<a href="' . LINK_AFF . '">Affiliate Program</a>				
							</p>
							
							<p>&copy; ' . SITENAME . ', All Rights Reserved. Powered by <a href="' . LINK_SIGNUP . '" target="_blank">Chaturbate</a></p>
							
						</div>
					</div>

					<!-- Scripts -->

						<script src="' . BASEHREF . 'assets/js/jquery.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/skel.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/util.js"></script>
						<script src="' . BASEHREF . 'assets/js/jquery.dropotron.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/jquery.scrollex.min.js"></script>
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
				
			get_cams ( AFFID, TRACK, $gender='', 24 );
					
		}
		
		function tpl_404() {
				
			get_cams ( AFFID, TRACK, $gender='', 24 );
					
		}	
		
		function tpl_cams() {		
		
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
				default:
					$gender = '';

			}
			
			get_cams ( AFFID, TRACK, $gender, 24 );
			
		}
		
		function tpl_view_cams() {

			$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
		
			solo_cams( AFFID, TRACK, $arg1 );	
		
		}

?>