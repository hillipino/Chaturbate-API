<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Footer
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function tpl_footer() {	

			// Closing Main
				echo '</div>';
				
			// Sidebar
				tpl_sidebar();

			// Closing page wrapper
				echo '</div>';	
						

			// Google Analytics
				if ( GOOGLE != '' ) {

					echo '
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