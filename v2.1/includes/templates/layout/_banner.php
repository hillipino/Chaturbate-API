<?php

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Banner
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			function tpl_banner() {

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