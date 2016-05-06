<?php

	require('includes/settings.php');
	require('includes/functions.php');
	require('includes/templates.php');
	require('classes/arix.class.php');

	// Compress with gzip

		if ( substr_count( $_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) ) {
		    ob_start( "ob_gzhandler" );
		}
		else {
		    ob_start();
		}	

	$arg1 = array_key_exists('arg1', $_GET) ? $_GET['arg1'] : null;
	
	$core = new axl_Core();
	
	$core->setHeaderFunc('tpl_header');
	
	$core->setFooterFunc('tpl_footer');
	
	$core->addCommand('home', 'tpl_home', SITENAME . '', 'Description', 'Keywords');
	
	$core->addCommand('cams', 'tpl_cams', SITENAME . ' - Live ' . $arg1 . ' Web Cams', 'Description','Keywords');

	$core->addCommand('cam', 'tpl_view_cams', SITENAME . ' - ' . $arg1 . '\'s Live Web Cam', 'Description','Keywords');	

	$core->addCommand('404', 'tpl_404', ' 404 error Page Not Found' . SITENAME, ' - The requested page was not found on ' . SITENAME, 'Keywords');	

	$core->addCommand('2257', 'tpl_2257', ' 18 U.S.C. § 2257 Statement ' . SITENAME, 'Description', 'Keywords');

	$core->addCommand('privacy', 'tpl_privacy', ' Privacy Policy - ' . SITENAME, 'Description', 'Keywords');

	$core->start();	

?>