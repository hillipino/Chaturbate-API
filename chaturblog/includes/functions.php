<?php
																
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Check for cron , if set to false process the xml script
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		if ( !USECRON )
			get_xml();

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Get the feed and save it to your server
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		function get_xml() {

			$filename 	= FLATFILE;
			$url 		= CBWL . '/affiliates/api/onlinerooms/?format=xml&wm='. AFFID .'';
			$data 		= file_get_contents( $url );

			if( !empty( $data ) ) {

				if ( substr_count( $data, '<resource>' ) > 0 ) {

					file_put_contents( $filename, $data );

				}

			} else {

				echo "Oops! The XML file could not be reached!<br />\n";

			}

		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Process the XML Request 
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
			
		function get_cams( $affid, $track, $category, $limit ) {
			
			$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
			$arg2 = array_key_exists('arg2', $_GET) ? $_GET['arg2'] : null;

			if ( $arg1 ) {
					
				if ( is_numeric( $arg1 ) ) {

					$page = $arg1;
					$targetpage = 'cams/';

				} else {

					$targetpage = 'cams/' . $arg1 . '/';
					
					if ( $arg2  ) {

						if ( is_numeric( $arg2 ) )
							$page = $arg2;
					
					} else { $page = 1; }
						
				} 
					
				} else {
					
					$targetpage = 'cams/';
					$page = 1;
				
				}
				
				$end 	= $page * $limit;
				$start	= $end - $limit;
				$cams 	= new SimpleXMLElement(FLATFILE, null, true);
		
				// Count the total cams
				
					if ( $category != '' ) {
					
						$doc = new DOMDocument();
						$doc->load(FLATFILE);
						$totalCams = 0;

						// Show only HD Cams
							if ( $category == 'hd' ) {

								foreach( $doc->getElementsByTagName('is_hd') as $is_hd )  {
									if( $is_hd->nodeValue == 'True' )
										$totalCams++;
								}

						// Show only New Cams
							} elseif ( $category == 'new' ) {
									
								foreach( $doc->getElementsByTagName('is_new') as $is_new )  {
									if( $is_new->nodeValue == 'True' )
										$totalCams++;
								}									

						// Show Cams by Age
							} elseif ( $category == 'teen' || $category == 'adult' || $category == 'middleage' || $category == 'mature' || $category == 'senior' ) {

								switch ( $category ) {
									case 'teen':
										$ages = range(18,21);
										break;
									case 'adult':
										$ages = range(22,30);
										break;
									case 'middleage':
										$ages = range(31,40);
										break;
									case 'mature':
										$ages = range(41,60);
										break;
									case 'senior':
										$ages = range(61,150);
										break;
								}
									
								foreach( $doc->getElementsByTagName('age') as $age )  {
									if( in_array( $age->nodeValue, $ages ) )
										$totalCams++;
								}

						// Show only Birthday Cams
							} elseif ( $category == 'birthday' ) {

								foreach( $doc->getElementsByTagName('birthday') as $birthday )  {
									if (substr($birthday->nodeValue, -5) === date_create()->format('m-d'))
										$totalCams++;
								}																		

							} else {

								foreach( $doc->getElementsByTagName('gender') as $tag ) {
									// to iterate the children
										foreach( $tag->childNodes as $child ) {
											// outputs the xml of the child nodes. Of course, there are any number of
											// things that you could do instead!
												$i = $doc->saveXML($child);
											
												if ($i == $category )
													$totalCams++;
										}
								}

							}

						
					} else { $totalCams = count($cams); }

				
				$count = 0;
				
				foreach( $cams as $cam ){ 

					if ( $category == $cam->gender ) {

						cam_rows( $cam, $count, $start, $end );
						$count++;

					}  elseif ( $category == 'teen' || $category == 'adult' || $category == 'middleage' || $category == 'mature' || $category == 'senior' ) {

						switch ( $category ) {
							case 'teen':
								$ages = range(18,21);
								break;
							case 'adult':
								$ages = range(22,30);
								break;
							case 'middleage':
								$ages = range(31,40);
								break;
							case 'mature':
								$ages = range(41,60);
								break;
							case 'senior':
								$ages = range(61,150);
								break;
						}

						if( in_array( $cam->age, $ages ) ) {
							cam_rows( $cam, $count, $start, $end );
							$count++;
						}

					} elseif ( $category == 'birthday' ) {

						if (substr($cam->birthday, -5) === date_create()->format('m-d')) {
							cam_rows( $cam, $count, $start, $end );
							$count++;
						}

					} elseif ( $category == 'hd' && $cam->is_hd == 'True' ) {

						cam_rows( $cam, $count, $start, $end );
						$count++;

					} elseif ( $category == 'new' && $cam->is_new == 'True' ) {

						cam_rows( $cam, $count, $start, $end );
						$count++;

					} elseif ( $category == '' ) {

						cam_rows( $cam, $count, $start, $end );
						$count++;

					}
					
				}
				
				if ( PAGINATE )
					paginate($page, $totalCams, $limit, $targetpage);
					
		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Get Related Cams
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
				$count 	= 0;
				
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
				
			}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Get Mini Cams
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		function get_mini_cams( $affid, $track, $category, $limit ) {
				
			$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
			$arg2 = array_key_exists('arg2', $_GET) ? $_GET['arg2'] : null;

			if ( $arg1 ) {
					
				if ( is_numeric( $arg1 ) ) {

					$page = $arg1;
					$targetpage = 'cams/';

				} else {

					$targetpage = 'cams/' . $arg1 . '/';
					
					if ( $arg2  ) {

						if ( is_numeric( $arg2 ) )
							$page = $arg2;
					
					} else { $page = 1; }
						
				} 
					
				} else {
					
					$targetpage = 'cams/';
					$page = 1;
				
				}
				
				$end 	= $page * $limit;
				$start	= $end - $limit;
				$cams 	= new SimpleXMLElement(FLATFILE, null, true);
				$count 	= 0;
				
				foreach( $cams as $cam ){ 


					if ( $category == $cam->gender ) {

						if ( $count >= $start && $count < $end )
							print_mini_cams($cam);
						
						$count++;

					}  elseif ( $category == 'teen' || $category == 'adult' || $category == 'middleage' || $category == 'mature' || $category == 'senior' ) {

						switch ( $category ) {
							case 'teen':
								$ages = range(18,21);
								break;
							case 'adult':
								$ages = range(22,30);
								break;
							case 'middleage':
								$ages = range(31,40);
								break;
							case 'mature':
								$ages = range(41,60);
								break;
							case 'senior':
								$ages = range(61,150);
								break;
						}

						if( in_array( $cam->age, $ages ) ) {

							if ( $count >= $start && $count < $end )
								print_mini_cams($cam);
						
							$count++;
						}

					} elseif ( $category == 'birthday' ) {

						if (substr($cam->birthday, -5) === date_create()->format('m-d')) {

							if ( $count >= $start && $count < $end )
								print_mini_cams($cam);
						
							$count++;
						}

					} elseif ( $category == 'hd' && $cam->is_hd == 'True' ) {

						if ( $count >= $start && $count < $end )
							print_mini_cams($cam);
						
						$count++;

					} elseif ( $category == 'new' && $cam->is_new == 'True' ) {

						if ( $count >= $start && $count < $end )
							print_mini_cams($cam);

						$count++;

					} elseif ( $category == '' ) {

						if ( $count >= $start && $count < $end )
							print_mini_cams($cam);
						
						$count++;

					}
					
				}
				
		}					

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	// Display the Cam Rows
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		

		function cam_rows( $cam, $count, $start, $end ) {

			if ( PAGINATE ) {

				if ( $count >= $start && $count < $end )							
					print_cams( $cam );
														
			} else {

				print_cams( $cam );
			}

		}
						

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Human Readable Time
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		function ago( $secs ) {
			
			$second 	= 1;
			$minute 	= 60;
			$hour 		= 60*60;
			$day 		= 60*60*24;
			$week 		= 60*60*24*7;
			$month 		= 60*60*24*7*30;
			$year 		= 60*60*24*7*30*365;
				 
			if ( $secs <= 0 ) {

				$output = "now";

			} elseif ( $secs > $second && $secs < $minute ) {

				$output = round( $secs/$second )." second";

			} elseif ( $secs >= $minute && $secs < $hour ) {

				$output = round( $secs/$minute )." minute";

			} elseif ( $secs >= $hour && $secs < $day ) {

				$output = round( $secs/$hour )." hour";

			} elseif ( $secs >= $day && $secs < $week ) {

				$output = round( $secs/$day )." day";

			} elseif ( $secs >= $week && $secs < $month ) {

				$output = round( $secs/$week )." week";

			} elseif ( $secs >= $month && $secs < $year ) {

				$output = round( $secs/$month )." month";

			} elseif ( $secs >= $year && $secs < $year*10 ) {

				$output = round( $secs/$year )." year";

			} else { 

				$output = " more than a decade ago"; 

			}
				 
			if ( $output <> "now" ) {

				$output = ( substr( $output,0,2 )<>"1 " ) ? $output."s" : $output;

			}

			return $output;
				
		}	
		
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	// Function to Limit characters of string.
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		function limit_chars( $string, $word_limit ) {
			 
			$string			= preg_replace( "/&#?[a-z0-9]{2,8};/i", "", strip_tags( $string ) );
			$words 			= explode( ' ', $string );
			$new_string 	= substr( $string, 0, $word_limit );
				
			return $new_string;
			 
		}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	// Paginate
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

		function paginate( $page, $total_pages, $limit, $targetpage ) { 
			
			// How many adjacent pages should be shown on each side?

				$adjacents = 1;
			
			// Setup page vars for display. 

				if ($page == 0) $page = 1;								//if no page var is given, default to 1.

				$prev 			= $page - 1;							//previous page is page - 1
				$next 			= $page + 1;							//next page is page + 1
				$lastpage 		= ceil($total_pages/$limit);			//lastpage is = total pages / items per page, rounded up.
				$lpm1 			= $lastpage - 1;						//last page minus 1
				$targetpage 	= BASEHREF . $targetpage;
				
			// Now we apply our rules and draw the pagination object. We're actually saving the code to a variable in case we want to draw it more than once.

				$pagination 	= "";

				if ($lastpage > 1) {	

					$pagination .= '<ul class="actions pagination">';

					//previous button

						if ($page > 1) 
							$pagination.= '<li><a href="' . $targetpage . $prev . '" class="previous big button">previous</a><li>';
						else
							$pagination.= '<li><a href="#" class="disabled previous big button">previous</a><li>';	
					
					
					//pages	

						if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
						{	
							for ($counter = 1; $counter <= $lastpage; $counter++)
							{
												
							}
						}
						elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
						{
							//close to beginning; only hide later pages
							if($page < 1 + ($adjacents * 2))		
							{
								for ($counter = 1; $counter < 2 + ($adjacents * 2); $counter++)
								{
													
								}
								
							}
							//in middle; hide some front and some back
							elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
							{
							
								for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
								{
											
								}
							
							}
							//close to end; only hide early pages
							else
							{
				
								for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
								{
						
								}
							}
						}


				
					//next button

						if ($page <= $counter -1 ) 
							$pagination.= '<li><a href="' . $targetpage . $next . '" class="next big button">Next</a></li>';
						else
							$pagination.= '<li><a href="#" class="disabled button big next">Next</a></li>';

					$pagination.= '</ul>';	

				}
				
			echo $pagination;
				
		}