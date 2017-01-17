<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Server Settings
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
		define ( 'BASEHREF',		'http://192.168.0.10/adult/chaturbate/v2.3/' );						// The Url path o the index.php
		define ( 'BASEPATH',		getcwd() );									// The file directory path to index.php
		define ( 'FLATFILE',		BASEPATH . '/includes/data/feed.xml');		// Name of file to store xml feed into
		define ( 'USECRON',			false );									// If you would like to update via cron set this to true.

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

		define ( 'SITENAME',		'Chaturbate API Demo V2.3' );				// Your Site Name
		define ( 'GOOGLE',			'' );										// Google Analytics Tracking ID Leave Blank to disable
		

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Layout Settings
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		
		define ( 'SLIDE_DIR',		'down' );									// Which direction thumbnail overlays slide in. (up,down,left,right)
		define ( 'RELATED_SHOW',	true );										// Shows related cams on single cam page.
		define ( 'RELATED_CNT', 	20 );										// The amount of related cams to show.
		define ( 'THUMB_CNT',		30 );										// How many Thumbnails to show in the cam listings.
		define ( 'BIRTHDAY_SHOW',	true );										// Show Birthday Cams
		define ( 'PAGINATE',		true );										

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Thumbnail Position Ads
	// This is pretty experimental, you will have to tweak the css to get your ads to show up correctly within the grid. I wouldn't
	// recommend using this unless you are comfortable modifying the css files. There are helper classes for each ad.
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		define ( 'AD_POS1',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		define ( 'AD_POS2',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		define ( 'AD_POS3',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		define ( 'AD_POS4',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		
		define ( 'AD_CODE1',		NULL );										// ( Ad Code for position 1 )
		define ( 'AD_CODE2',		NULL );										// ( Ad Code for position 2 )
		define ( 'AD_CODE3',		NULL );										// ( Ad Code for position 3 )
		define ( 'AD_CODE4',		NULL );										// ( Ad Code for position 4 )	


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

			$num 	= Rand (1,6);

			switch ($num) {

				// Description 1

					case 1:
					echo '
						<p>
							Welcome to <strong>' . $model . '\'s live stream</strong> and chat room! Watching ' . $model . ' getting naked, fucking, sucking, etc... is <storng>completely FREE</strong>! However, to chat with ' . $model . ', view ' . $model . '\'s private profile photos and video clips, and many more member-only features... you\'ll need a <a href="' . LINK_SIGNUP . '" class="external">FREE account</a>. Right now, ' . $model . ' is responding live to viewers... <a href="' . LINK_SIGNUP . '" class="external">Create your free account</a> now to join in on the fun!
						</p>
					';
					break;

				// Description 2	

					case 2:
					echo '
						<p>
							Thanks for checking out <strong>' . $model . '\'s live stream</strong> and chat room! You can enjoy watching ' . $model . ' absolutely FREE! If you would like to chat with this <strong>Smoking HOT ' . $age . ' year old</strong>, or view ' . $model . '\'s private pics and video clips you\'ll have  to <a href="' . LINK_SIGNUP . '" class="external">register for a FREE account</a>.

						</p>
					';
					break;

				// Description 3

					case 3:
					echo '
						<p>
							Welcome to <strong>' . $model . '\'s live stream</strong> and chat room! Watching ' . $model . ' getting naked, fucking, sucking, etc... is <storng>completely FREE</strong>! However, to chat with ' . $model . ', view ' . $model . '\'s private profile photos and video clips, and many more member-only features... you\'ll need a <a href="' . LINK_SIGNUP . '" class="external">FREE account</a>. Right now, ' . $model . ' is responding live to viewers... <a href="' . LINK_SIGNUP . '" class="external">Create your free account</a> now to join in on the fun!
						</p>
					';
					break;

				// Description 4

					case 4:
					echo '
						<p>
							Welcome to <strong>' . $model . '\'s live stream</strong> and chat room! Watching ' . $model . ' getting naked, fucking, sucking, etc... is <storng>completely FREE</strong>! However, to chat with ' . $model . ', view ' . $model . '\'s private profile photos and video clips, and many more member-only features... you\'ll need a <a href="' . LINK_SIGNUP . '" class="external">FREE account</a>. Right now, ' . $model . ' is responding live to viewers... <a href="' . LINK_SIGNUP . '" class="external">Create your free account</a> now to join in on the fun!
						</p>
					';
					break;

				// Description 5

					case 5:
					echo '
						<p>
							Welcome to <strong>' . $model . '\'s live stream</strong> and chat room! Watching ' . $model . ' getting naked, fucking, sucking, etc... is <storng>completely FREE</strong>! However, to chat with ' . $model . ', view ' . $model . '\'s private profile photos and video clips, and many more member-only features... you\'ll need a <a href="' . LINK_SIGNUP . '" class="external">FREE account</a>. Right now, ' . $model . ' is responding live to viewers... <a href="' . LINK_SIGNUP . '" class="external">Create your free account</a> now to join in on the fun!
						</p>
					';
					break;

				// Description 6

					case 6:
					echo '
						<p>
							Welcome to <strong>' . $model . '\'s live stream</strong> and chat room! Watching ' . $model . ' getting naked, fucking, sucking, etc... is <storng>completely FREE</strong>! However, to chat with ' . $model . ', view ' . $model . '\'s private profile photos and video clips, and many more member-only features... you\'ll need a <a href="' . LINK_SIGNUP . '" class="external">FREE account</a>. Right now, ' . $model . ' is responding live to viewers... <a href="' . LINK_SIGNUP . '" class="external">Create your free account</a> now to join in on the fun!
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
