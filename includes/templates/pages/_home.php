<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Homepage
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	
		function tpl_home() {

			echo '<div id="main">';	

			// Display Cams
				
				get_cams ( AFFID, TRACK, $gender='', THUMB_CNT );				

			echo '</div>';

			if ( BIRTHDAY_SHOW ) {
				
				echo '
					<div id="related">
						<section>
							<header>
								<h2>Todays Birthdays</h2>
							</header>
				';
	
				get_cams( AFFID, TRACK, 'birthday', RELATED_CNT );
					
				echo '
						</section>
					</div>
				';

			}			
					
		}