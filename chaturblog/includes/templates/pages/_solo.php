<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Solo Cams Page
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	

		function tpl_view_cams() {

			$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;

			solo_cams( AFFID, TRACK, $arg1 );

		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Solo Cams Display
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

		function solo_cams( $affid, $track, $user ) {

			$arg1 		= array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;				
			$cams 		= new SimpleXMLElement(FLATFILE, null, true);
			$online 	= false;
			$index 		= 0;
				
			foreach( $cams->resource as $cam ){ 
				
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

					$online 		= true;
					$prev 			= $cams->resource[ $index - 1 ];
        			$next 			= $cams->resource[ $index + 1 ];
        			$time_online 	= ago( $cam->seconds_online );

					if ( MODE == 'revshare' ) {

						$chatroom 	= str_replace( 'https://chaturbate.com', CBWL, $cam->chat_room_url_revshare );
						$iframe 	= str_replace( 'https://chaturbate.com', CBWL, $cam->iframe_embed_revshare );
									
					} else {

						//$chatroom 	= str_replace( 'https://chaturbate.com', CBWL, $cam->chat_room_url );
						$iframe 	= str_replace( 'https://chaturbate.com', CBWL, $cam->iframe_embed );
														
					}        			

					echo '	
						<article class="post">
							<header>
								<div class="title">
									<h2>
					';

					random_title( $arg1, $cam->age );	

					echo '
										 ( <a href="' . $chatroom . '" class="external">bio</a> )
									</h2>
									<p>' . $cam->room_subject . '</p>
								</div>
							</header>							
							<section class="cb_video video-wrapper">
								' . $iframe . '
							</section>

							<p><a href="' . LINK_SIGNUP . '" class="button fit big external">Send Tip</a></p>

							<div class="flex">
								<div class="flex-item">';

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
								</div>
							</div>

							<ul class="actions">
								<li><a href="' . BASEHREF . 'cam/' . $prev->username . '" class="button big previous">Previous Cam</a></li>
								<li><a href="' . BASEHREF . 'cam/' . $next->username . '" class="button big next">Next Cam</a></li>
							</ul>
						</article>
							
					';		
						
				}

				$index++;			
	
			}

			if ( !$online ) { // Display this if user is offline

				echo '
					<article class="post">
						<header>
							<div class="title">
								<h2>' . $arg1 . ' is Currently Offline</h2>
								<p>So we have picked out another Hot Live Stream for you to enjoy!</p>
							</div>
						</header>
						<section class="cb_video video-wrapper">
				';

							featured( 'revshare', 'top' );

				echo '
						</section>
					</article>
				';

			}
				
			if ( RELATED_SHOW ) {
				
				echo '
					<article class="post related">
						<header>
							<div class="title">
								<h2>More Live Cams</h2>
							</div>
						</header>
						<section class="flex flex-3">
							';
				
							get_mini_cams( AFFID, TRACK, '', RELATED_CNT );
								
							echo '
						</section>
					</article>
				';

			}					

		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
	// Featured Cam
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		function featured( $mode, $room ) {
			
			switch ( $mode ) {
					
				case 'signup': 	//signup mode
					
					switch ( $room ) {
							
						case 'personal':
							$go = 'Jrvi';
							break;

						case 'top':
							$go = 'NxHf';
							break;		

						case 'male':
							$go = 'SKWo';
							break;	

						case 'tranny':
							$go = 'JXvq';
							break;	
								
					}
						
					break;							

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
				echo '<iframe src="' . CBWL . '/affiliates/in/' . $go . '/' . AFFID . '/?track=' . TRACK . '&amp;room=' . USER . '&amp;bgcolor=transparent" height="528" width="850" ></iframe>';
			else
				echo '<iframe src="' . CBWL . '/affiliates/in/' . $go . '/' . AFFID . '/?track=' . TRACK . '&amp;bgcolor=transparent" height="528" width="850" ></iframe>';
			
		}			