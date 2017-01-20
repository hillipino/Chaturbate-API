<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Thumbnails Page
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	
		function tpl_cams( ) {				
		
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

		function print_cams( $cam ) {	

			// Check if HD
				if ( $cam->is_hd == 'True' )
					$hd = '<a href="' . BASEHREF . 'cams/hd">HD</a>';
				else
					$hd = '';

			// Check if New
				if ( $cam->is_new == 'True' )
					$new = '<a href="' . BASEHREF . 'cams/new">New</a>';
				else
					$new = '';	

			echo '	
				<article class="post">
					<header>
						<div class="title">
							<h2><a href="' . BASEHREF . 'cam/' . $cam->username . '">' . $cam->display_name . '</a></h2>
							<p>' . $cam->room_subject . '</p>
						</div>
					</header>
					<div class="content">
					<div>		
						<p>'; random_text( $cam->username, $cam->age, $cam->location, $cam->num_users, $cam->seconds_online  ); echo '</p></div>
						<a href="' . BASEHREF . 'cam/' . $cam->username . '" class="image featured"><img src="' . $cam->image_url . '" alt="Watch ' . $cam->display_name . ' Streaming Live" /></a>
					</div>
					<footer>
						<ul class="actions">
							<li><a href="' . BASEHREF . 'cam/' . $cam->username . '" class="button big">View Live Stream</a></li>
						</ul>
						<ul class="stats">';
							
							if ( !empty( $hd ) )
								echo '<li>' . $hd . '</li>';

							if ( !empty( $new ) )
								echo '<li>' . $new . '</li>';

							echo '
							<li><a href="#" class="icon fa-clock-o">' . ago( $cam->seconds_online ) . '</a></li>
							<li><a href="#" class="icon fa-comment">' . $cam->num_users . '</a></li>
						</ul>
					</footer>
				</article>			
			';	
				
		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Mini Cams Display Function
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

		function print_mini_cams( $cam ) {	

			// Check if HD
				if ( $cam->is_hd == 'True' )
					$hd = '<a href="' . BASEHREF . 'cams/hd">HD</a>';
				else
					$hd = '';

			// Check if New
				if ( $cam->is_new == 'True' )
					$new = '<a href="' . BASEHREF . 'cams/new">New</a>';
				else
					$new = '';	

			echo '	

			<!-- Mini Post -->
				<article class="mini-post">
					<header>
						<h3><a href="' . BASEHREF . 'cam/' . $cam->username . '">' . $cam->display_name . '</a></h3>
						<span class="published icon fa-clock-o" > ' . ago( $cam->seconds_online ) . '</span> <span class="published icon fa-comment"> ' . $cam->num_users . '</span>
					</header>
					<a href="' . BASEHREF . 'cam/' . $cam->username . '" class="image"><img src="' . $cam->image_url . '" alt="Watch ' . $cam->display_name . ' Streaming Live" /></a>
				</article>

				
			';	
				
		}		

	
									
					
								
								