<?php
	
	spl_autoload_register(function($nameClass){

		$path = "Classes".DIRECTORY_SEPARATOR."{$nameClass}.class.php";

		if(file_exists($path))
		{
			require_once($path);
		}

	});

?>