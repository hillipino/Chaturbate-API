<?php

	class axl_Core
	{
		var $commands;
		var $headerFunc;
		var $footerFunc;

		function axl_Core()
		{
			$this->commands = array();

		}

		function setHeaderFunc($func)
		{
			$this->headerFunc = $func;
			return true;
		}

		function setFooterFunc($func)
		{
			$this->footerFunc = $func;
			return true;
		}

		function start()
		{
			$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : 'home';

			$args = array();
			
			if (isset($_GET['arg1']))
				$args[0] = $_GET['arg1'];

			if (isset($_GET['arg2']))
				$args[1] = $_GET['arg2'];

			if (!isset($this->commands[$cmd]))
			{
				header('HTTP/1.0 404 Not Found');
				$this->outputHeader('404', '404 - File Not Found', 'You have reached our error page', '404 error');
				echo '<div class="box">';
				echo '<div class="title"><h2>File not found</h2></div>';
				echo '<div class="content">';
				
				
				echo '</div>';
				echo '</div>';
				$this->outputFooter();
				return false;
			}

			$c = $this->commands[$cmd];

			if ($c[3])
			{
				$this->outputHeader($cmd, $c[1], $c[2], $c[3]);
				call_user_func($c[0], $args);
				$this->outputFooter();
			}
			else
				call_user_func($c[0], $args);			
			
			return true;
		}


		function outputHeader($cmd, $title, $des, $kw)
		{
			if (isset($this->headerFunc))
				return call_user_func($this->headerFunc, $cmd, $title, $des, $kw);
				
			return false;
		}
	
		function outputFooter()
		{
			if (isset($this->footerFunc))
				return call_user_func($this->footerFunc);

			return false;
		}

		function addCommand($cmd, $function, $title=NULL, $des=NULL, $kw=NULL)
		{
			$this->commands[$cmd] = array($function, $title, $des, $kw);
			return true;
		}
	}
	
	?>