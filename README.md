# Chaturbate API

Chaturbate API is a simple, barebones php script that will fetch [Chaturbate's affiliate XML feed](http://affiliates.hillipino.com/jPqoq) or [Camgasm's XML feed](http://camgasm.com/affiliates/in/?track=default&tour=07kX&campaign=7iFy8) and display the cams on your website. The template is fully customizable and responsive.


## Setup and Configuration

To setup the script is fairly straightforward. The below steps are the minimum steps to get the script running. Feel free to change or customize as you see fit.

1. Download the latest release here ( https://github.com/hillipino/Chaturbate-API/releases )
2. Unzip the archive.
3. Go to includes/settings.php and enter your chaturbate and server settings. The script should work once you set the 'BASEHREF', but to get credit for your referrals you need to also change the chaturbate settings. If you do not have one, setup a [Chaturbate affiliate account](http://affiliates.hillipino.com/jPqoq) or  [Camgasm affiliate account](http://camgasm.com/affiliates/in/?track=default&tour=07kX&campaign=7iFy8).</a>
4. Upload the files to your server.
5. On your server make sure includes/data/feed.xml is writable.
6. If you are running this script in a sub directory, you need to modify the htaccess file. Anywhere that you see /index.php , change it to /sub-directory/index.php


## Script Speed

When you first use this script, you may realize that it takes forever to load. This is due to the fact that every time you load the page the xml feed has to be parsed.

I highly recommend seting the USECRON to true and either setup a cronjob on your server or use one of the free services below to execute cron.php every 5 minutes or so. This file basically just fetches the xml feed and writes to a local file on your server that can be cached, preventing your site from downloading the feed on every page load.

### Free Cron Services

- Cron-job.org ( https://cron-job.org )
- SetCron ( https://www.setcron.com/ )
- MyWebCron ( http://www.mywebcron.com/ )


## Settings

An explanation of the settings.php file. It is heavily commented but I figured I would list some extra notes here anyways.

### Server Settings

Your server settings, you should only have to change BASEHREF. I would recommend changing USECRON to true and setting up a cronjob as noted above.

```php
	define ( 'BASEHREF',		'http://192.168.0.10/adult/chaturbate/v2.3/' );		// The Url path o the index.php
	define ( 'BASEPATH',		getcwd() );											// The file directory path to index.php
	define ( 'FLATFILE',		BASEPATH . '/includes/data/feed.xml');				// Name of file to store xml feed into
	define ( 'USECRON',			false );											// If you would like to update via cron set this to true.
```

### Chaturbate/Camgasm Settings

Your [Chaturbate affiliate account](http://affiliates.hillipino.com/jPqoq) or  [Camgasm affiliate account](http://camgasm.com/affiliates/in/?track=default&tour=07kX&campaign=7iFy8) settings. These are pretty much self explanatory except for the CBWL.

Due to some recent changes if you are using a whitelabel the iframes will error if you are linking with the https://. So be sure to use http:// in your whitelabel domain for the CBWL setting. If you aren't using a whitelabel, just leave it as is.


```php
	define ( 'USER',			'blogbabes' );								// Your Chaturbate Username ( this is only useful if you embed a personal chatroom )
	define ( 'AFFID',			'827SM' );									// Chaturbate Affiliate ID
	define ( 'TRACK',			'HILLIPINO' );								// Chaturbate Campaign for Tracking
	define ( 'MODE',			'revshare' );								// ( revshare, signup, or tokens )
	define ( 'ROOM',			'top' );									// Which featured chatroom to embed ( top, male, transexual, personal, NULL )
	define ( 'CBWL',			'https://chaturbate.com' );					// If you are wanting to change the domain to match one of your hosted whitelabels,
																			// enter the domain here. eg ( http://www.yourdomain.com ) the default is 'https://chaturbate.com'

```																				


### General Settings

```php
	define ( 'SITENAME',		'Chaturbate API Demo V2.3' );	// Your Site Name
	define ( 'GOOGLE',			'' );							// Google Analytics Tracking ID Leave Blank to disable
```


### Layout Settings

These control how certain layout elements behave or rather or not to show them.

```php
	define ( 'SLIDE_DIR',		'down' );		// Which direction thumbnail overlays slide in. (up,down,left,right)
	define ( 'RELATED_SHOW',	true );			// Shows related cams on single cam page.
	define ( 'RELATED_CNT', 	20 );			// The amount of related cams to show.
	define ( 'THUMB_CNT',		30 );			// How many Thumbnails to show per page in the cam listings.
	define ( 'BIRTHDAY_SHOW',	true );			// Show Birthday Cams
	define ( 'PAGINATE',		true );			// Paginate Cams						
```


### Thumbnail Position Ads

This is pretty experimental, you will have to tweak the css to get your ads to show up correctly within the grid. I wouldn't recommend using this unless you are comfortable modifying the css files. There are helper classes for each ad.

Note the AD_CODE is a php variable, so be sure to escape correctly

```php
	define ( 'AD_POS1',			NULL );			// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
	define ( 'AD_POS2',			NULL );			// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
	define ( 'AD_POS3',			NULL );			// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
	define ( 'AD_POS4',			NULL );			// ( Thumbnail Ad Position starting at 0 , NULL for no ad )
		
	define ( 'AD_CODE1',		NULL );			// ( Ad Code for position 1 )
	define ( 'AD_CODE2',		NULL );			// ( Ad Code for position 2 )
	define ( 'AD_CODE3',		NULL );			// ( Ad Code for position 3 )
	define ( 'AD_CODE4',		NULL );			// ( Ad Code for position 4 )

	// Example Ad Code

	define ( 'AD_CODE4',		'<a href="' . $variable . '" class="whatever"><img src="/path/to/img" alt="something" /></a>' );			// ( Ad Code for position 4 )
```

### Random Titles and Descriptions

You can add as many titles and descriptions as you like just change the $num variable to match the correct amount of descriptions and add a new case. eg... if you added 10 descriptions it would read:

```php
		$num = Rand (1,10);
```

Example Title

``` php
		/* 
			Available variables are:

			$model			- Models Username
			$age 			- How old they are			

		*/	

		case 1:
		echo '
			' . $model . '\'s Live Cam Show
		';
		break;		
```	

Example Description ( note descriptions can use the global defines in set above )

``` php
		/* 
			Available variables are:

			$model			- Models Username
			$age 			- How old they are
			$location 		- Where they are
			$num_users 		- amount of people watching
			$time_online 	- how long they have been online.
		*/	

		case 1:
		echo '
			<p>
				Welcome to <strong>' . $model . '\'s live stream</strong> and chat room! Watching ' . $model . ' getting naked, fucking, sucking, etc... is <storng>completely FREE</strong>! However, to chat with ' . $model . ', view ' . $model . '\'s private profile photos and video clips, and many more member-only features... you\'ll need a <a href="' . LINK_SIGNUP . '" class="external">FREE account</a>. Right now, ' . $model . ' is responding live to viewers... <a href="' . LINK_SIGNUP . '" class="external">Create your free account</a> now to join in on the fun!
			</p>
		';
		break;
```


### Links

These shouldn't have to be changed, but you can check in your affiliate account to make sure the codes match up. It is possible that these could change in the future or on a per account basis.


## License

Chaturbate API is released under the MIT license.

Copyright (c) hillipino.com

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
