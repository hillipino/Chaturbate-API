<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Sidebar
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
		function tpl_sidebar() {

			echo '
				<section id="sidebar">					

					<!-- Mini Posts -->
						<section>
							<h2>Top Teen Cams</h2>
							<div class="mini-posts">
			';

			get_mini_cams ( AFFID, TRACK, 'teen', 2, 'mini' );

			echo '
							</div>

							<ul class="alt">
								<li><a href="' . BASEHREF . 'cams/teen" class="button big fit">More Teen Cams</a></li>
							</ul>
						</section>

					<!-- Mini Posts -->
						<section>
							<h2>Top Milf Cams</h2>
							<div class="mini-posts">
			';

			get_mini_cams ( AFFID, TRACK, 'middleage', 2, 'mini' );

			echo '
							</div>

							<ul class="alt">
								<li><a href="' . BASEHREF . 'cams/middleage" class="button big fit">More Milf Cams</a></li>
							</ul>
						</section>

					<!-- Mini Posts -->
						<section>
							<h2>Today\'s Birthdays</h2>
							<div class="mini-posts">
			';

			get_mini_cams ( AFFID, TRACK, 'birthday', 2, 'mini' );

			echo '
							</div>

							<ul class="alt">
								<li><a href="' . BASEHREF . 'cams/birthday" class="button big fit">More Birthday Cams</a></li>
							</ul>
						</section>

						<!-- Footer -->
							<section id="footer">
								<ul class="icons">
			';

			if ( TWITTER != '' ) {
				echo '<li><a href="' . TWITTER . '" class="fa-twitter"><span class="label">Twitter</span></a></li>';
			}
			
			if ( FACEBOOK != '' ) {
				echo '<li><a href="' . FACEBOOK . '" class="fa-facebook"><span class="label">Facebook</span></a></li>';
			}

			if ( INSTAGRAM != '' ) {
				echo '<li><a href="' . INSTAGRAM . '" class="fa-instagram"><span class="label">Instagram</span></a></li>';
			}

			if ( YOUTUBE != '' ) {
				echo '<li><a href="' . YOUTUBE . '" class="fa-youtube"><span class="label">Youtube</span></a></li>';
			}

			if ( EMAIL != '' ) {
				echo '<li><a href="mailto:' . EMAIL . '" class="fa-envelope"><span class="label">Email</span></a></li>';
			}

			echo '
								</ul>
								<p class="copyright">&copy; ' . SITENAME . '. All rights reserved.<br /><a href="' . BASEHREF . 'privacy">Privacy</a> | <a href="' . BASEHREF . '2257">2257</a> | <a href="https://github.com/hillipino" class="external">Get this Script</a></p>
							</section>

					</section>		
		
			';

		}