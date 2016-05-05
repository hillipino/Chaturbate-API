<?php

	// Include Settings

		require('includes/settings.php');
		require('includes/functions.php');

	// Layout Templates

		
		require('includes/templates/layout/_banner.php');		// Banner Template
		require('includes/templates/layout/_footer.php');		// Footer Template
		require('includes/templates/layout/_header.php');		// Header Template

	// Page Templates

		require('includes/templates/pages/_2257.php');			// 2257 Page Template
		require('includes/templates/pages/_404.php');			// 404 Error Page Template
		require('includes/templates/pages/_cams.php');			// Cam Thumbnail Display Template
		require('includes/templates/pages/_home.php');			// Homepage Template
		require('includes/templates/pages/_privacy.php');		// Privacy Page Template
		require('includes/templates/pages/_solo.php');			// Solo Cams Template

	get_xml();

?>