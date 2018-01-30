<?php
	
	//autoload
	spl_autoload_register(function(string $className){

		//caminho das classes
		$path = "classes/{$className}.php";

		if(file_exists($path))
		{
			require_once($path);
		}
		else
		{
			echo "File not found";
		}


	});


?>