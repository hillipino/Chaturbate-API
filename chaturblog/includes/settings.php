<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Server Settings
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
		define ( 'BASEHREF',		'http://your.tld/' );									// The Url path to the index.php include trailing slash
		define ( 'BASEPATH',		getcwd() );												// The file directory path to index.php
		define ( 'FLATFILE',		BASEPATH . '/includes/data/feed.xml');					// Name of file to store xml feed into
		define ( 'USECRON',			true );													// If you would like to update via cron set this to true.

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Chaturbate Settings
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		define ( 'USER',			'blogbabes' );								// Your Chaturbate Username ( this is only useful if you embed a personal chatroom )
		define ( 'AFFID',			'827SM' );									// Chaturbate Affiliate ID
		define ( 'TRACK',			'HILLIPINO' );								// Chaturbate Campaign for Tracking
		define ( 'MODE',			'revshare' );								// ( revshare, signup, or tokens )
		define ( 'ROOM',			'top' );									// Which featured chatroom to embed ( top, male, transexual, personal, NULL )
		define ( 'CBWL',			'https://chaturbate.com' );					// If you are wanting to change the domain to match one of your hosted whitelabels,
																				// enter the domain here. eg ( http://www.yourdomain.com ) the default is 'https://chaturbate.com'

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// General Settings
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		define ( 'SITENAME',		'Chaturblog' );								// Your Site Name
		define ( 'SITEDESC',		'Imports the Chaturbate Affiliate API as a blog styled template.' );	 // Your Site Description
		define ( 'GOOGLE',			'' );										// Google Analytics Tracking ID Leave Blank to disable
		
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Social Settings
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		// Enter the urls to your social profiles or email address if you would like them to appear in the sidebar. Leave blank to hide.

		define ( 'TWITTER',			'https://twitter.com' );
		define ( 'FACEBOOK',		'https://facebook.com' );
		define ( 'INSTAGRAM',		'https://instagram.com' );
		define ( 'YOUTUBE',			'https://youtube.com' );
		define ( 'EMAIL',			'somebody@tld.ext' );

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Layout Settings
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		
		define ( 'SLIDE_DIR',		'down' );									// Which direction thumbnail overlays slide in. (up,down,left,right)
		define ( 'RELATED_SHOW',	true );										// Shows related cams on single cam page.
		define ( 'RELATED_CNT', 	18 );										// The amount of related cams to show.
		define ( 'THUMB_CNT',		10 );										// How many Thumbnails to show in the cam listings.
		define ( 'BIRTHDAY_SHOW',	true );										// Show Birthday Cams
		define ( 'PAGINATE',		true );											

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Random Titles for single page.
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function random_title( $model, $age  ) {

			$num 	= Rand (1,6);

			switch ($num) {

				// Description 1

					case 1:
					echo '
						' . $model . '\'s Live Cam Show
					';
					break;

				// Description 2	

					case 2:
					echo '
						' . $model . '\'s Live Webcam
					';
					break;

				// Description 3

					case 3:
					echo '
						' . $model . '\'s Live Stream
					';
					break;

				// Description 4

					case 4:
					echo '
						' . $model . '\'s Streaming Webcam
					';
					break;

				// Description 5

					case 5:
					echo '
						' . $model . '\'s Online Webcam Show
					';
					break;

				// Description 6

					case 6:
					echo '
						' . $model . '\'s Live Cam Show
					';
					break;																									

			}
			
		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Random Descriptions for single page.
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	/* 
		You can add as many descriptions as you like just change the $num variable to match the correct amount of descriptions.

		Available variables are 
			$model - Models Username
			$age - How old they are
			$location - Where they are
			$num_users - amount of people watching
			$time_online - how long they have been online.

	*/	
	
		function random_text( $model, $age, $location, $num_users, $time_online  ) {

			$num 	= Rand (1,3);

			switch ($num) {

				// Description 1

					case 1:
					echo '
						<p>
							Hi I\'m <strong>' . $model . '</strong>. Im soo glad you decided to watch my live webcam. You can watch me strip, suck, fuck and more completely <strong>FREE</strong>! If you would like to take me private you need to <a href="' . LINK_SIGNUP . '">sign up for a free account</a>. With your free account you also get access to my private profile photos and video clips!
						</p>
					';
					break;

				// Description 2	

					case 2:
					echo '
						<p>
							Hi I\'m <strong>' . $model . '</strong>. Im soo glad you decided to watch my live webcam. You can watch me strip, suck, fuck and more completely <strong>FREE</strong>! If you would like to take me private you need to <a href="' . LINK_SIGNUP . '">sign up for a free account</a>. With your free account you also get access to my private profile photos and video clips!
						</p>
					';
					break;

				// Description 3

					case 3:
					echo '
						<p>
							Hi I\'m <strong>' . $model . '</strong>. Im soo glad you decided to watch my live webcam. You can watch me strip, suck, fuck and more completely <strong>FREE</strong>! If you would like to take me private you need to <a href="' . LINK_SIGNUP . '">sign up for a free account</a>. With your free account you also get access to my private profile photos and video clips!
						</p>
					';
					break;																							

			}
			
		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Links
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		// These shouldn't have to be changed, but you can check in your affiliate account to make sure the codes match up. It is possible
		// that these could change in the future.

		// Link Codes Revshare

			define ( 'REV_BEST_TOUR', 		'hr8m' );
			define ( 'REV_BROADCASTER', 	'NwNd' );
			define ( 'REV_CONTEST', 		'jb4g' );
			define ( 'REV_HOME', 			'grq0' );
			define ( 'REV_HOME_COUPLE', 	'0G9g' );
			define ( 'REV_HOME_FEMALE', 	'IsSO' );
			define ( 'REV_HOME_MALE', 		'R2Xc' );
			define ( 'REV_HOME_TRANNY', 	'khMd' );
			define ( 'REV_JOIN', 			'3Mc9' );
			define ( 'REV_RAND_COUPLE', 	'goZq' );
			define ( 'REV_RAND_FEMALE', 	'41Ea' );
			define ( 'REV_RAND_MALE', 		'9rL0' );
			define ( 'REV_RAND_TRANNY', 	'sxJR' );
			define ( 'REV_AFF_PROG', 		'07kX' );
			define ( 'REV_YOURCAM', 		'dT8X' );

		//link Codes Signup

			define ( 'REG_BEST_TOUR', 		'ZmU7' );
			define ( 'REG_BROADCASTER', 	'5zjT' );
			define ( 'REG_CONTEST', 		'PFml' );
			define ( 'REG_HOME', 			'g4pe' );
			define ( 'REG_HOME_COUPLE', 	'ZLaY' );
			define ( 'REG_HOME_FEMALE', 	'wFE6' );
			define ( 'REG_HOME_MALE', 		'EyB0' );
			define ( 'REG_HOME_TRANNY', 	'xC0v' );
			define ( 'REG_JOIN', 			'3Mc9' );
			define ( 'REG_RAND_COUPLE', 	'gT8O' );
			define ( 'REG_RAND_FEMALE', 	'bfpW' );
			define ( 'REG_RAND_MALE', 		'RDvD' );
			define ( 'REG_RAND_TRANNY', 	'z7da' );
			define ( 'REG_AFF_PROG', 		'9O7D' );
			define ( 'REG_YOURCAM', 		'ZQAI' );		

		// Link Codes Token

			define ( 'TOK_BEST_TOUR', 		'OT2s' );
			define ( 'TOK_BROADCASTER', 	'5bpG' );
			define ( 'TOK_HOME', 			'4uT2' );
			define ( 'TOK_YOURCAM', 		'O1Tt' );

		// Show link based on which mode is set above

			switch ( MODE ) {

				case 'revshare':

					define ( 'LINK_SIGNUP',		CBWL . '/affiliates/in/' . REV_JOIN . '/' . AFFID . '/?track=' . TRACK );			// Signup Link
					define ( 'LINK_YOURCAM',	CBWL . '/affiliates/in/' . REV_YOURCAM . '/' . AFFID . '/?track=' . TRACK );		// Your Personal Cam Link
					define ( 'LINK_AFF',		CBWL . '/affiliates/in/' . REV_AFF_PROG . '/' . AFFID . '/?track=' . TRACK );		// Your Affiliate URL
					define ( 'LINK_BROADCAST',	CBWL . '/affiliates/in/' . REV_BROADCASTER . '/' . AFFID . '/?track=' . TRACK );	// Broadcast your cam

					break;

				case 'signup':

					define ( 'LINK_SIGNUP',		CBWL . '/affiliates/in/' . REG_JOIN . '/' . AFFID . '/?track=' . TRACK );			// Signup Link
					define ( 'LINK_YOURCAM',	CBWL . '/affiliates/in/' . REG_YOURCAM . '/' . AFFID . '/?track=' . TRACK );		// Your Personal Cam Link
					define ( 'LINK_AFF',		CBWL . '/affiliates/in/' . REG_AFF_PROG . '/' . AFFID . '/?track=' . TRACK );		// Your Affiliate URL
					define ( 'LINK_BROADCAST',	CBWL . '/affiliates/in/' . REG_BROADCASTER . '/' . AFFID . '/?track=' . TRACK );	// Broadcast your cam

					break;

				case 'tokens':

					define ( 'LINK_SIGNUP',		CBWL . '/affiliates/in/' . TOK_BEST_TOUR . '/' . AFFID . '/?track=' . TRACK );		// Signup Link
					define ( 'LINK_YOURCAM',	CBWL . '/affiliates/in/' . TOK_BROADCASTER . '/' . AFFID . '/?track=' . TRACK );	// Your Personal Cam Link
					define ( 'LINK_AFF',		CBWL . '/affiliates/in/' . REV_AFF_PROG . '/' . AFFID . '/?track=' . TRACK );		// Your Affiliate URL
					define ( 'LINK_BROADCAST', 	CBWL . '/affiliates/in/' . TOK_BROADCASTER . '/' . AFFID . '/?track=' . TRACK );	// Broadcast your cam

					break;

			}			

?>
