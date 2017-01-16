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
									<li><a href="http://adultfriendfinder.com/go/g10296-ppc?page_id=685" class="button fit external">Get Laid!</a></li>
									<li><a href="' . LINK_AFF . '" class="button fit external">Affiliate Program</a></li>
									
								</ul>
							</nav>					

			';
		
		}