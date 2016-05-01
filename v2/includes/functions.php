<?php
																
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Display Functions No Need to Edit any of this unless you really want to.
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


		// Check for cron , if set to false process the xml script

			if ( !USECRON )
				get_xml();

		// Get The feed and save it to your server

			function get_xml() {

				$filename 	= FLATFILE;
				$url 		= 'http://' . CBWL . '/affiliates/api/onlinerooms/?format=xml&wm='. AFFID .'';
				$data 		= file_get_contents( $url );

				if( !empty( $data ) ) {

					if ( substr_count( $data, '<resource>' ) > 0 ) {

						file_put_contents( $filename, $data );

					}

				} else {

					echo "Did not get a file back<br />\n";

				}

			}

			function get_banner() {

				$cams 	= new SimpleXMLElement(FLATFILE, null, true);
				$count 	= 0;
				
				foreach( $cams as $cam ){ 

					if ( $count == 0 ) {

						echo '
							<section id="banner" style="background-image: url(' .  $cam->image_url_360x270. ')">
								<div class="content">
									<h2>'; 

								random_banner_title( $cam->username ); 

								echo '
									</h2>
									<p>
								'; 

								random_banner_text( );

								echo '
									</p>
									<ul class="actions">
										<li><a href="' . BASEHREF . 'cam/' . $cam->username . '" class="button special">Watch My Live Cam</a></li>
									</ul>
								</div>
							</section>
						';	
					}			

					$count++;

				}
				

			}
			

		// Process the XML Request 
		
			function get_cams( $affid, $track, $gender, $limit ){
			
				$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
				$arg2 = array_key_exists('arg2', $_GET) ? $_GET['arg2'] : null;

				if ( $arg1 ) {
					
					if ( is_numeric( $arg1 ) ) {
					
						$page = $arg1;
						$targetpage = 'cams/';
						
					} else {
					
						$targetpage = 'cams/' . $arg1 . '/';
					
						if ( $arg2  ) {

							if ( is_numeric( $arg2 ) ) {

								$page = $arg2;
								
							} 
							
						} else {
						
							$page = 1;
						
						}
						
					} 
					
				} else {
					
					$targetpage = 'cams/';
					$page = 1;
				
				}
				
				$end 	= $page * $limit;
				$start	= $end - $limit;
				$cams 	= new SimpleXMLElement(FLATFILE, null, true);
				
				// Count the total cams
				
				if ( $gender != '' ) {
				
					$doc = new DOMDocument();
					$doc->load(FLATFILE);
					$totalCams = 0;

					if ( $gender == 'hd' ) {

						foreach( $doc->getElementsByTagName('is_hd') as $is_hd )  {

							if( $is_hd->nodeValue == 'True' )
								$totalCams++;

						}

					} elseif ( $gender == 'new' ) {
						
						foreach( $doc->getElementsByTagName('is_new') as $is_new )  {

							if( $is_new->nodeValue == 'True' )
								$totalCams++;

						}

					} else {

						foreach( $doc->getElementsByTagName('gender') as $tag ) {
							// to iterate the children
							foreach( $tag->childNodes as $child ) {
								// outputs the xml of the child nodes. Of course, there are any number of
								// things that you could do instead!
								$i = $doc->saveXML($child);
								
								if ($i == $gender )
									$totalCams++;
							}
						}

					}


					
				} else {
				
					$totalCams = count($cams);
					
				}
				
				
				echo '<div class="row uniform 0%">';
				
				$count = 0;
				
				foreach( $cams as $cam ){ 

					if ( $gender == $cam->gender ) {
						cam_rows( $cam, $count, $start, $end );
						$count++;
					} 

					elseif ( $gender == 'hd' && $cam->is_hd == 'True' ) {
						
						cam_rows( $cam, $count, $start, $end );
						$count++;
					} 

					elseif ( $gender == 'new' && $cam->is_new == 'True' ) {
						cam_rows( $cam, $count, $start, $end );
						$count++;
					} 										
					
					elseif ( $gender == '' ) {
						cam_rows( $cam, $count, $start, $end );
						$count++;
					}
					
					
				}
				
				echo '</div>';
				
				if ( PAGINATE )
					paginate($page, $totalCams, $limit, $targetpage);
					
			}
			
		// Get Related Cams

			function get_related( $affid, $track, $gender, $limit ){
				
				$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
				$arg2 = array_key_exists('arg2', $_GET) ? $_GET['arg2'] : null;
				
				if ( $arg1 ) {
					
					if ( is_numeric( $arg1 ) ) {
					
						$page = $arg1;
						$targetpage = 'cams/';
						
					} else {
					
						$targetpage = 'cams/' . $arg1 . '/';
					
						if ( $arg2  ) {

							if ( is_numeric( $arg2 ) ) {

								$page = $arg2;
								
							} 
							
						} else {
						
							$page = 1;
						
						}
						
					} 
					
				} else {
					
					$targetpage = 'cams/';
					$page = 1;
				
				}
				
				$end 	= $page * $limit;
				$start	= $end - $limit;				
				$cams 	= new SimpleXMLElement(FLATFILE, null, true);
				
				// Count the total cams
				
				if ( $gender != '' ) {
				
					$doc = new DOMDocument();
					$doc->load($xml);
					$totalCams = 0;
					foreach( $doc->getElementsByTagName('gender') as $tag ) 
					{
						// to iterate the children
						foreach( $tag->childNodes as $child ) 
						{
							// outputs the xml of the child nodes. Of course, there are any number of
							// things that you could do instead!
							$i = $doc->saveXML($child);
							
							if ($i == $gender )
								$totalCams++;
						}
					}

					
				} else {
				
					$totalCams = count($cams);
					
				}

				echo '<div class="row uniform 0%">';
				
				$count = 0;
				
				foreach( $cams as $cam ){ 

					if ( $cam->gender == $gender ) {

						if ( $count >= $start && $count < $end ) {

							print_cams($cam);
							
						}


						$count++;
						
					} 
					
					if ( $gender == '' ) {

						if ( $count >= $start && $count < $end ) {
								print_cams($cam);
						}
						
						$count++;
								
					}
					
					
				}
				
				echo '</div>';
				
			}		
			
			
		// Print each individual cam
		
			function print_cams($cam) {

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
				
				echo '
						
					<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">

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
							</div>
						</div>	

					</div>					
							
				';	
				
			}			
		
		// Print Solo Cams
		
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
							<div class="container">
								<div class="row 200% uniform">
									<div class="12u">						
										<section class="cb_video video-wrapper">
							
											';					
										
											if ( MODE == 'revshare' ) {

													$iframe = str_replace( 'chaturbate.com', CBWL, $cam->iframe_embed_revshare );
													echo $iframe;

											} else {

													$iframe = str_replace( 'chaturbate.com', CBWL, $cam->iframe_embed );
													echo $iframe;
													
											}

											$time_online = ago( $cam->seconds_online );
											
											echo '
						
										</section>
									</div>
									<div class="6u 12u(medium)">
										<header>
											<h2>';
											random_title( $arg1, $cam->age );		
											echo '</h2>
											<p>' . $cam->room_subject . '</p>
										</header>
										';

										random_text($arg1, $cam->age, $cam->location, $cam->num_users, $time_online  );

										echo '
									</div>
									<div class="6u 12u(medium)">
										<ul class="alt">		
											<li>' . $cam->age . ' ' . $gender . '</li>
											<li>' . $cam->location . '</li>
											<li><i class="fa fa-clock-o"></i>&nbsp; ' . $time_online . '</li>
											<li><i class="fa fa-eye"></i>&nbsp; ' . $cam->num_users . '</li>
										</ul>

										<a href="' . LINK_SIGNUP . '" target="_blank" class="button special">Register to tip ' . $arg1 . '</a>

									</div>
								</div>
							</div>

						</div>	
							
						';					
						
					}			
	
				}

				if ( !$online ) {

					echo '
						<div class="container">
							<header>
								<h2>' . $arg1 . ' is Currently Offline</h2>
								<p>So we have picked out another Hot Live Stream for you to enjoy!</p>
							</header>
							<section class="cb_video video-wrapper">
					';

					featured( 'revshare', 'top' );

					echo '</section></div></div>';

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
					
					echo '</section>';
				}					

			}	
			
		// Featured Cam
		
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
					echo '<iframe src="http://chaturbate.com/affiliates/in/' . $go . '/' . AFFID . '/?track=' . TRACK . '&amp;room=' . USER . '&amp;bgcolor=transparent" height="528" width="850" ></iframe>';
				else
					echo '<iframe src="http://chaturbate.com/affiliates/in/' . $go . '/' . AFFID . '/?track=' . TRACK . '&amp;bgcolor=transparent" height="528" width="850" ></iframe>';
			
			}
			
		// Human Readable Time

			function ago( $secs ) {
			
				$second 	= 1;
				$minute 	= 60;
				$hour 		= 60*60;
				$day 		= 60*60*24;
				$week 		= 60*60*24*7;
				$month 		= 60*60*24*7*30;
				$year 		= 60*60*24*7*30*365;
				 
				if ( $secs <= 0 ) { $output = "now";
				} elseif ( $secs > $second && $secs < $minute ) { $output = round( $secs/$second )." second";
				} elseif ( $secs >= $minute && $secs < $hour ) { $output = round( $secs/$minute )." minute";
				} elseif ( $secs >= $hour && $secs < $day ) { $output = round( $secs/$hour )." hour";
				} elseif ( $secs >= $day && $secs < $week ) { $output = round( $secs/$day )." day";
				} elseif ( $secs >= $week && $secs < $month ) { $output = round( $secs/$week )." week";
				} elseif ( $secs >= $month && $secs < $year ) { $output = round( $secs/$month )." month";
				} elseif ( $secs >= $year && $secs < $year*10 ) { $output = round( $secs/$year )." year";
				} else { $output = " more than a decade ago"; }
				 
				if ( $output <> "now" ) {
					$output = ( substr( $output,0,2 )<>"1 " ) ? $output."s" : $output;
				}
				return $output;
				
			}	
		
		
		// Function to Limit characters of string.

			function limit_chars( $string, $word_limit ) {
			 
				$string			= preg_replace( "/&#?[a-z0-9]{2,8};/i", "", strip_tags( $string ) );
				$words 			= explode( ' ', $string );
				$new_string 	= substr( $string, 0, $word_limit );
				
				return $new_string;
			 
			}

		// Paginate
		
			function paginate( $page, $total_pages, $limit, $targetpage ) { 
			
				// How many adjacent pages should be shown on each side?
				$adjacents = 3;
			
				// Setup page vars for display. 
				if ($page == 0) $page = 1;								//if no page var is given, default to 1.
				$prev = $page - 1;										//previous page is page - 1
				$next = $page + 1;										//next page is page + 1
				$lastpage = ceil($total_pages/$limit);					//lastpage is = total pages / items per page, rounded up.
				$lpm1 = $lastpage - 1;									//last page minus 1
				
				$targetpage = BASEHREF . $targetpage;
				
				// Now we apply our rules and draw the pagination object. We're actually saving the code to a variable in case we want to draw it more than once.
				$pagination = "";
				if ($lastpage > 1)
				{	
					$pagination .= '<div class="cb_pager">';
					//previous button
					if ($page > 1) 
						$pagination.= '<a href="' . $targetpage . $prev . '" class="prev button">previous</a>';
					else
						$pagination.= '<span class="disabled button">previous</span>';	
					
					//pages	
					if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
					{	
						for ($counter = 1; $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination.= '<span class="current button">' . $counter . '</span>';
							else
								$pagination.= '<a href="' . $targetpage . $counter . '" class="button">' . $counter . '</a>';					
						}
					}
					elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
					{
						//close to beginning; only hide later pages
						if($page < 1 + ($adjacents * 2))		
						{
							for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
							{
								if ($counter == $page)
									$pagination.= '<span class="current button">' . $counter . '</span>';
								else
									$pagination.= '<a href="' . $targetpage . $counter . '" class="button">' . $counter . '</a>';					
							}
							$pagination.= '...';
							$pagination.= '<a href="' . $targetpage . $lpm1 . '" class="button">' . $lpm1 . '</a>';
							$pagination.= '<a href="' . $targetpage . $lastpage . '" class="button">' . $lastpage . '</a>';		
						}
						//in middle; hide some front and some back
						elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
						{
							$pagination.= '<a href="' . $targetpage . '/1" class="button">1</a>';
							$pagination.= '<a href="' . $targetpage . '/2" class="button">2</a>';
							$pagination.= '...';
							for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
							{
								if ($counter == $page)
									$pagination.= '<span class="current button">' . $counter . '</span>';
								else
									$pagination.= '<a href="' . $targetpage . $counter . '" class="button">' . $counter . '</a>';					
							}
							$pagination.= '...';
							$pagination.= '<a href="' . $targetpage . $lpm1 . '" class="button">' . $lpm1 . '</a>';
							$pagination.= '<a href="' . $targetpage . $lastpage . '" class="button">' . $lastpage . '</a>';		
						}
						//close to end; only hide early pages
						else
						{
							$pagination.= '<a href="' . $targetpage . '/1" class="button">1</a>';
							$pagination.= '<a href="' . $targetpage . '/2" class="button">2</a>';
							$pagination.= '...';
							for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
							{
								if ($counter == $page)
									$pagination.= '<span class="current button">' . $counter . '</span>';
								else
									$pagination.= '<a href="' . $targetpage . $counter . '" class="button">' . $counter . '</a>';					
							}
						}
					}
				
					//next button
					if ($page <= $counter -1 ) 
						$pagination.= '<a href="' . $targetpage . $next . '" class="next button">next</a>';
					else
						$pagination.= '<span class="disabled button">next</span>';
					$pagination.= '</div>';		
				}
				
				echo $pagination;
				
			}	

			function cam_rows( $cam, $count, $start, $end ) {

				if ( PAGINATE ) {

							if ( $count >= $start && $count < $end ) {

								if ( $count == AD_POS1 && AD_POS1 != null || $count == AD_POS2 && AD_POS2 != null || $count == AD_POS3 && AD_POS3 != null || $count == AD_POS4 && AD_POS4 != null )
								{
								
									if ( $count == AD_POS1 ) 
										echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE1 . '</div>';
									if ( $count == AD_POS2 ) 
										echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE2 . '</div>';
									if ( $count == AD_POS3 ) 
										echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE3 . '</div>';							
									if ( $count == AD_POS4 ) 
										echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE4 . '</div>';					
									
								} else {
								
									print_cams($cam);
								
								}
							
							}
						
				} else {

							if ( $count == AD_POS1 && AD_POS1 != null || $count == AD_POS2 && AD_POS2 != null || $count == AD_POS3 && AD_POS3 != null || $count == AD_POS4 && AD_POS4 != null )
							{
							
								if ( $count == AD_POS1 ) 
									echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE1 . '</div>';
								if ( $count == AD_POS2 ) 
									echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE2 . '</div>';
								if ( $count == AD_POS3 ) 
									echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE3 . '</div>';							
								if ( $count == AD_POS4 ) 
									echo '<div class="' . COLUMNS_DESKTOP . ' ' . COLUMNS_LARGE . ' ' . COLUMNS_TABLET . ' ' . COLUMNS_MOBILE . '">' . AD_CODE4 . '</div>';					
									
							} else {
								
								print_cams($cam);
								
							}

				}

			}		
	
	
?>