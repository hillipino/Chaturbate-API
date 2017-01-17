# Chaturbate API

Chaturbate API is a simple, barebones php script that will fetch <a href="http://affiliates.hillipino.com/jPqoq">Chaturbate's affiliate XML feed</a> and display the cams on your website. The template is fully customizable and responsive.

## Setup and Configuration

To setup the script is fairly straightforward. The below steps are the minimum steps to get the script running. Feel free to change or customize as you see fit.

- Download the latest release here [ https://github.com/hillipino/Chaturbate-API/releases ]
- Unzip the archive.
- Go to includes/settings.php and enter your chaturbate and server settings. The script should work once you set the 'BASEHREF', but to get credit for your referrals you need to also change the chaturbate settings. If you do not have one, setup a <a href="http://affiliates.hillipino.com/jPqoq">Chaturbate affiliate account.</a>
- Upload the files to your server.
- On your server make sure includes/data/feed.xml is writable.
- If you are running this script in a sub directory, you need to modify the htaccess file. Anywhere that you see /index.php , change it to /sub-directory/index.php

## Script Speed

When you first use this script, you may realize that it takes forever to load. This is due to the fact that every time you load the page the xml feed has to be parsed.

I highly recommend seting the USECRON to true and either setup a cronjob on your server or use one of the free services below to execute cron.php every 5 minutes or so. This file basically just fetches the xml feed and writes to a local file on your server that can be cached, preventing your site from downloading the feed on every page load.


### Free Cron Services

- Cron-job.org ( https://cron-job.org )
- SetCron ( https://www.setcron.com/ )
- MyWebCron ( http://www.mywebcron.com/ )


## License

Chaturbate API is released under the MIT license.

Copyright (c) hillipino.com

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
