<?php 
	putenv("DISPLAY_ERRORS_DETAILS=".true);

	function pathUrl(){
		$dir = __DIR__;
		$root = "";
		$dir = str_replace('\\', '/', realpath($dir));
	
		//HTTPS or HTTP
		$root .= !empty($_SERVER['HTTPS']) ? 'https' : 'http';
	
		//HOST
		$root .= '://' . $_SERVER['HTTP_HOST'];
	
		//ALIAS
		if(!empty($_SERVER['CONTEXT_PREFIX'])) {
			$root .= $_SERVER['CONTEXT_PREFIX'];
			$root .= substr($dir, strlen($_SERVER[ 'CONTEXT_DOCUMENT_ROOT' ]));
		} else {
			$root .= substr($dir, strlen($_SERVER[ 'DOCUMENT_ROOT' ]));
		}
	
		$root .= '/';
	
		return $root;
	}

	putenv("GESTAOVENDAS_MYSQL_HOST=localhost");
	putenv("GESTAOVENDAS_MYSQL_DBNAME=gestaovendas");
	putenv("GESTAOVENDAS_MYSQL_USER=root");
	putenv("GESTAOVENDAS_MYSQL_PASSWORD=");
	putenv("GESTAOVENDAS_MYSQL_PORT=3306");
	putenv("DIRETORIO=".pathUrl());
	putenv("RAIZ=".__DIR__);

	

 ?>