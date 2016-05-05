<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Footer
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function tpl_footer() {
		
			echo '
				<footer id="footer">
					<div class="container">
						<div class="row double">
							<div class="6u 12u$(medium)">
								<h2>Responsive Chaturbate API Demo</h2>
								<p>Ornare interdum nascetur enim lobortis nunc amet placerat pellentesque nascetur in adipiscing. Interdum amet accumsan placerat commodo ut amet aliquam blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id lorem ipsum dolor.</p>
							</div>
							<div class="3u 6u(medium) 12u$(small)">
								<h3>What\'s Hot</h3>
								<ul class="alt">
									<li><a href="' . BASEHREF . 'cams/female">Female Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/couple">Couple Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/hd">HD Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/new">New Cams</a></li>
								</ul>
							</div>
							<div class="3u$ 6u$(medium) 12u$(small)">
								<h3>More Cool Stuff</h3>
								<ul class="alt">
									<li><a href="' . BASEHREF . 'cams/teen">Teen Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/middleage">Milf Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/mature">Mature Cams</a></li>
									<li><a href="' . BASEHREF . 'cams/senior">Granny Cams</a></li>
								</ul>
							</div>
						</div>
					</div>
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
						<script src="' . BASEHREF . 'assets/js/skel.min.js"></script>
						<script src="' . BASEHREF . 'assets/js/util.js"></script>
						<!--[if lte IE 8]><script src="' . BASEHREF . 'assets/js/ie/respond.min.js"></script><![endif]-->
						<script src="' . BASEHREF . 'assets/js/main.js"></script>				

					</body>
				
				</html>
			
			';
		
		}