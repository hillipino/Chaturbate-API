# Chaturbate API

Chaturbate API is a simple, barebones php script that will fetch [Chaturbate's affiliate XML feed](http://affiliates.hillipino.com/jPqoq) and display the cams on your website. The template is fully customizable and responsive.


## Setup and Configuration

To setup the script is fairly straightforward. The below steps are the minimum steps to get the script running. Feel free to change or customize as you see fit.

1. Download the latest release here ( https://github.com/hillipino/Chaturbate-API/releases )
2. Unzip the archive.
3. Go to includes/settings.php and enter your chaturbate and server settings. The script should work once you set the 'BASEHREF', but to get credit for your referrals you need to also change the chaturbate settings. If you do not have one, setup a [Chaturbate's affiliate account](http://affiliates.hillipino.com/jPqoq).</a>
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


### Random Descriptions

You can add as many descriptions as you like just change the $num variable to match the correct amount of descriptions. eg... if you added 10 descriptions it would read:

```php

	$num = Rand (1,10);

```

#### Available variables are 

```php

	$model 			// Models Username
	$age 	 		// How old they are
	$location		// Where they are
	$num_users		// amount of people watching
	$time_online	// how long they have been online.

```

Example Description

```php

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
