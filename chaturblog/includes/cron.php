<?php

	// Include Settings

		require('settings.php');
		require('functions.php');

	// Continue processing on disconnect. Prevents time out issues for third party cron services.

		ignore_user_abort( true );
		set_time_limit( 0 );

	// Fetch the xml feed	

		get_xml();

	echo 'nothing here to see';

?>