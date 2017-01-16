<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Footer
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function tpl_footer() {
		
			echo '
				<footer id="footer">
					<div class="content">
						<div class="column">		
							<h3>What\'s Hot</h3>
							<ul class="alt">
								<li><a href="' . BASEHREF . 'cams/female">Female Cams</a></li>
								<li><a href="' . BASEHREF . 'cams/couple">Couple Cams</a></li>
								<li><a href="' . BASEHREF . 'cams/hd">HD Cams</a></li>
								<li><a href="' . BASEHREF . 'cams/new">New Cams</a></li>
							</ul>
						</div>
						<div class="column">	
							<h3>More Cool Stuff</h3>
							<ul class="alt">
								<li><a href="' . BASEHREF . 'cams/teen">Teen Cams</a></li>
								<li><a href="' . BASEHREF . 'cams/middleage">Milf Cams</a></li>
								<li><a href="' . BASEHREF . 'cams/mature">Mature Cams</a></li>
								<li><a href="' . BASEHREF . 'cams/senior">Granny Cams</a></li>
							</ul>
						</div>
						<div class="column">	
							<h3>Recommended Sites</h3>
							<ul class="alt">
								<li><a href="http://istri.it/?p=28&s=24420&pp=1&v=30" class="external">Desktop Strippers</a></li>
								<li><a href="http://adultfriendfinder.com/go/g10296-ppc?page_id=685" class="external">Get Laid Tonight</a></li>
								<li><a href="http://secure.gigiriveraxxx.com/track/MTg3LjEuOC45LjAuMC4wLjAuMA" class="external">Gigi Rivera</a></li>
								<li><a href="http://secure.pornstarplatinum.com/track/MTg3LjEuMTcuMTguMC4wLjAuMC4w" class="external">Pornstar Platinum</a></li>
							</ul>
						</div>
						<div class="column">	
							<h3>My Favorites</h3>
							<ul class="alt">
								<li><a href="http://secure.angelinavalentine.com/track/MTg3LjEuMTEuMTIuMC4wLjAuMC4w" class="external">Angelina Valentine</a></li>
								<li><a href="http://secure.ariellaferrera.com/track/MTg3LjEuNTYuMjA0LjAuMC4wLjAuMA" class="external">Ariella Ferrera</a></li>
								<li><a href="http://secure.clubveronicaavluv.com/track/MTg3LjEuMTMuMTQuMC4wLjAuMC4w" class="external">Veronica Avluv</a></li>
								<li><a href="http://secure.emilysplayground.com/track/MTg3LjEuMTguMjEuMC4wLjAuMC4w" class="external">Emilys Playground</a></li>
							</ul>
						</div>												
					</div>
					<hr />
					<div class="copyright">
						&copy; ' . SITENAME . '. All rights reserved. <a href="' . BASEHREF . 'privacy">Privacy</a> | <a href="' . BASEHREF . '2257">2257</a> | <a href="https://github.com/hillipino" class="external">Get this Script</a>
					</div>
				</footer>
			';

			if ( GOOGLE != '' ) {

				echo '

					<!-- Google Analytics -->

						<script>
							(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
							(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
							m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
							})(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');

							ga(\'create\', \'' . GOOGLE . '\', \'auto\');
							ga(\'send\', \'pageview\');

						</script>
				';
						
			}

			echo '

					<!-- Scripts -->
						<script src="' . BASEHREF . 'assets/js/jquery.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/jquery.scrollex.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/jquery.scrolly.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/skel.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/util.js"></script>
						<script src="' . BASEHREF . 'assets/js/main.js"></script>				

					</body>
				
				</html>
			
			';
		
		}