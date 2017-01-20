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
					</head>

			';
				
			flush();
				
			echo '
				<body id="top">

					<!-- Wrapper -->
						<div id="wrapper">	

							<!-- Header -->
								<header id="header">
									<h1><a href="' . BASEHREF . '">' . SITENAME . '</a></h1>
									<nav class="links">
										<ul>				
											<li><a href="' . BASEHREF . 'cams/female" class="' . ( ($link == "female") ? "active"   : "") . '">Female Cams</a></li>
											<li><a href="' . BASEHREF . 'cams/male" class="' . ( ($link == "male") ? "active"   : "") . '">Male Cams</a></li>
											<li><a href="' . BASEHREF . 'cams/couple" class="' . ( ($link == "couple") ? "active"   : "") . '">Couples</a></li>
											<li><a href="' . BASEHREF . 'cams/shemale" class="' . ( ($link == "shemale") ? "active"   : "") . '">Shemales</a></li>
											<li><a href="' . LINK_SIGNUP . '" class="external">Free Account</a></li>
										</ul>
									</nav>
									<nav class="main">
										<ul>
											<li class="menu">
												<a class="fa-bars" href="#menu">Menu</a>
											</li>
										</ul>
									</nav>
								</header>

							<!-- Menu -->
								<section id="menu">

									<!-- Actions -->
										<section>
											<ul class="actions vertical">
												<li><a href="' . LINK_SIGNUP . '" class="button big fit external">Free Account</a></li>
											</ul>
										</section>
																		
									<!-- Links -->
										<section>
											<ul class="links">
												<li><a href="' . LINK_BROADCAST . '" class="external">Become a Model</a></li>
												<li><a href="' . BASEHREF . 'cams/hd">HD Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/new">New Cams</a></li>					
												<li><a href="' . BASEHREF . 'cams/female">Female Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/teen">Teen Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/couple">Couple Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/middleage">Milf Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/mature">Mature Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/senior">Granny Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/male">Male Cams</a></li>
												<li><a href="' . BASEHREF . 'cams/shemale">Shemale Cams</a></li>
											</ul>
										</section>

									<!-- Actions -->
										<section>
											<ul class="actions vertical">
												<li><a href="' . LINK_AFF . '" class="button big fit external">Affiliate Program</a></li>
											</ul>
										</section>										

								</section>										

							<!-- Main -->
								<div id="main">				

			';
		
		}