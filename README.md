# Chaturbate-API
A simple responsive php template to pull chaturbate's affiliate XML Feed.

#Setup and Configuration
Open includes/settings.php and add your configuration details. Be sure to change your user and aff id if you want to get credit for your sales. If you do not have an affiliate account you can get one <a href="http://chaturbate.com/affiliates/in/3Mc9/827SM/?track=GH">here</a>. The following options are configurable:

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// General Configuration Settings
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		define ( 'SITENAME',		'Chaturbate Demo' );						// Your Site Name
		define ( 'BASEHREF',		'http://your.website.com/' );				// The Url path to the index.php
		define ( 'BASEPATH',		'/path/to/script' );						// The file directory path to index.php
		define ( 'USER',			'username' );								// Your Chaturbate Username ( this is only useful if you embed a personal chatroom )
		define ( 'AFFID',			'827SM' );									// Chaturbate Affiliate ID
		define ( 'TRACK',			'DEFAULT' );									// Chaturbate Campaign for Tracking
		define ( 'MODE',			'revshare' );								// ( revshare, signup, or tokens )
		define ( 'ROOM',			'top' );									// Which featured chatroom to embed ( top, male, transexual, personal, NULL )
		define ( 'CBWL',			'chaturbate.com' );							// If you are wanting to change the domain to match one of your hosted whitelabels,
																				// enter the domain here. eg ( www.yourdomain.com ) the default is 'chaturbate.com'
		define ( 'USECRON',			false );									// If you would like to update via cron set this to true.
																				// Add includes/cron.php to your crontab 
		define ( 'COLUMNS_DESKTOP',	'2u' );										// How many columns do you want to show.
		define ( 'COLUMNS_LARGE',	'3u(large)' );								// How many columns do you want to show.
		define ( 'COLUMNS_TABLET',	'6u(medium)' );								// How many columns do you want to show.	
		define ( 'COLUMNS_MOBILE',	'12u(small)' );								// How many columns do you want to show.													
		define ( 'SHOW_STATUS', 	true );										// Shows or hides the room status public, private  ( true or false )	
		define ( 'RELATED_SHOW',	true );										// Shows related cams on single cam page.
		define ( 'RELATED_CNT', 	12 );										// The amount of related cams to show.
		define ( 'PAGINATE',		true );										
		define ( 'FLATFILE',		BASEPATH . '/includes/data/feed.xml');		// Name of file to store xml feed into
		
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Thumbnail Position Ads
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		define ( 'AD_POS1',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		define ( 'AD_POS2',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		define ( 'AD_POS3',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		define ( 'AD_POS4',			NULL );										// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		
		define ( 'AD_CODE1',		NULL );										// ( Ad Code for position 1 )
		define ( 'AD_CODE2',		NULL );										// ( Ad Code for position 2 )
		define ( 'AD_CODE3',		NULL );										// ( Ad Code for position 3 )
		define ( 'AD_CODE4',		NULL );										// ( Ad Code for position 4 )
		
		#Random Descriptions
		In the settings file there is also a section that allows you to set random descriptions for the single cam display page. You can modify these descriptions or even add or remove them.
		
		If you add or remove descriptions be sure to change the following variable:
		$num 	= Rand (1,6); // 6 would be the total amount of descriptions added.
		
		#Links
		These shouldn't have to be modified but you can double check your affiliate links to make sure the codes matchup.
