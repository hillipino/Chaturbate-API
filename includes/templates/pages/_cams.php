<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Thumbnails Page
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	
		function tpl_cams( ) {	

			echo '<div id="main">';				
		
			$category = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
		
			switch ( $category ) {
				
				case 'female':
					$category = 'f';
					break;

				case 'male':
					$category = 'm';
					break;

				case 'couple':
					$category = 'c';
					break;

				case 'shemale':
					$category = 's';
					break;

				case 'hd':
					$category = 'hd';
					break;

				case 'new':
					$category = 'new';
					break;	

				case 'teen':
					$category = 'teen';
					break;

				case 'adult':
					$category = 'adult';
					break;

				case 'middleage':
					$category = 'middleage';
					break;

				case 'mature':
					$category = 'mature';
					break;

				case 'senior':
					$category = 'senior';
					break;	

				case 'birthday':
					$category = 'birthday';
					break;									

				default:
					$category = '';

			}
			
			get_cams ( AFFID, TRACK, $category, THUMB_CNT );
			
		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Thumbnails Display Function
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

		function print_cams($cam) {			
				
			echo '	
				<div class="thumbnail">
					<div class="image fit"><img src="' . $cam->image_url . '" alt="Watch ' . $cam->display_name . ' Streaming Live" /></div>
					<div class="overlay slide' . SLIDE_DIR . '">
						<div class="content">
							<h3>' . limit_chars( $cam->username, 20 ) . '</h3>
							<ul class="actions">
								<li><span class="fa fa-eye"></span> ' . $cam->num_users . '</li>
								<li><span class="fa fa-clock-o"></span> ' .  ago( $cam->seconds_online ) . '</li>
							</ul>
							<a href="' . BASEHREF . 'cam/' . $cam->username . '" class="button special">Watch Live Stream</a>
						</div>
						<a href="' . BASEHREF . 'cam/' . $cam->username . '" class="link"><span>Click Me</span></a>
					</div>
				</div>			
			';	
				
		}		