<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Solo Cams Page
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	

		function tpl_view_cams() {

			$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;

			echo '<div>';	
		
			solo_cams( AFFID, TRACK, $arg1 );

			echo '</div>';
		
		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Solo Cams Display
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

		function solo_cams( $affid, $track, $user ) {

			$arg1 		= array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;				
			$cams 		= new SimpleXMLElement(FLATFILE, null, true);
			$online 	= false;
				
			foreach( $cams as $cam ){ 
				
				switch ( $cam->gender) {
						
					case 'f':
						$gender = 'female';
						break;
					case 'm':
						$gender = 'male';
						break;
					case 'c':
						$gender = 'couple';
						break;
					case 's':
						$gender = 'shemale';
						break;
					case 'new':
						$gender = 'new';
						break;
					case 'hd':
						$gender	= 'hd';
						break;							
					default:
						$gender = '';
				}				


				if ( $cam->username == $user ) {

					$online = true;
					
					echo '		
						<div class="inner solo">

							<section class="cb_video video-wrapper">';					
										
								if ( MODE == 'revshare' ) {

									$chatroom 	= str_replace( 'camgasm.com', CBWL, $cam->chat_room_url_revshare );
									$iframe 	= str_replace( 'camgasm.com', CBWL, $cam->iframe_embed_revshare );
									echo $iframe;

								} else {
									$chatroom 	= str_replace( 'camgasm.com', CBWL, $cam->chat_room_url );
									$iframe 	= str_replace( 'camgasm.com', CBWL, $cam->iframe_embed );
									echo $iframe;
													
								}

								$time_online = ago( $cam->seconds_online );
											
								echo '
						
							</section>

							<div class="flex">
								<div class="flex-item">
							

							<header>
								<h2>';
									random_title( $arg1, $cam->age );	
									echo '
									( <a href="' . $chatroom . '" class="external">bio</a> )
								</h2>
								<p>' . $cam->room_subject . '</p>
							</header>';							

							random_text($arg1, $cam->age, $cam->location, $cam->num_users, $time_online  );

							echo '
								</div>
								<div class="flex-item">
									<ul class="alt">		
										<li>' . $cam->age . ' ' . $gender . '</li>
										<li>' . $cam->location . '</li>
										<li><i class="fa fa-clock-o"></i>&nbsp; ' . $time_online . '</li>
										<li><i class="fa fa-eye"></i>&nbsp; ' . $cam->num_users . '</li>
									</ul>

									<a href="' . LINK_SIGNUP . '" class="button special external">Register to tip ' . $arg1 . '</a>
								</div>
							</div>
						</div>
							
					';					
						
				}			
	
			}

			if ( !$online ) { // Display this if user is offline

				echo '
					<div class="inner">
						<header>
							<h2>' . $arg1 . ' is Currently Offline</h2>
							<p>So we have picked out another Hot Live Stream for you to enjoy!</p>
						</header>
						<section class="cb_video video-wrapper">
				';

				featured( 'revshare', 'top' );

				echo '
						</section>
					</div>
				';

			}
				
			if ( RELATED_SHOW ) {
				
				echo '
					<div id="related">
						<section>
							<header>
								<h2>More Live Cams</h2>
							</header>
				';
	
				get_related( AFFID, TRACK, '', RELATED_CNT );
					
				echo '
						</section>
					</div>
				';

			}					

		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	// Featured Cam
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		function featured( $mode, $room ) {
			
			switch ( $mode ) {				

				default: 		// revshare mode

					switch ( $room ) {
							
						case 'personal':
							$go = '9oGW';
							break;
						
						case 'top':
							$go = 'dTm0';
							break;								
							
						case 'male':
							$go = 'CoeM';
							break;								
							
						case 'tranny':
							$go = 'zoQq';
							break;	
								
					}					
						
					break;

			}			
			
			if ( $room == 'personal' )
				echo '<iframe src="https://camgasm.com/affiliates/in/?tour=' . $go . '&amp;campaign=' . AFFID . '&amp;?track=' . TRACK . '&amp;room=' . USER . '&amp;bgcolor=transparent" height="528" width="850" ></iframe>';
			else
				echo '<iframe src="https://camgasm.com/affiliates/in/?tour=' . $go . '&amp;campaign=' . AFFID . '&amp;?track=' . TRACK . '&amp;bgcolor=transparent" height="528" width="850" ></iframe>';
			
		}			