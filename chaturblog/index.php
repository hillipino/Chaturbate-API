<?php

	// Include Settings

		require('includes/settings.php');
		require('includes/functions.php');

	// Layout Templates

		require('includes/templates/layout/_footer.php');		// Footer Template
		require('includes/templates/layout/_header.php');		// Header Template
		require('includes/templates/layout/_sidebar.php');		// Sidebar Template

	// Page Templates

		require('includes/templates/pages/_2257.php');			// 2257 Page Template
		require('includes/templates/pages/_404.php');			// 404 Error Page Template
		require('includes/templates/pages/_cams.php');			// Cam Thumbnail Display Template
		require('includes/templates/pages/_home.php');			// Homepage Template
		require('includes/templates/pages/_privacy.php');		// Privacy Page Template
		require('includes/templates/pages/_solo.php');			// Solo Cams Template

	// Command Class
		require('classes/arix.class.php');

	// Get Pages

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