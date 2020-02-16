<?php
// index.php - main file for proxy8080
// last modified by farglabs on 2019-09-23

$iniPath = './config.ini'; // Default location of config.ini is in same directory as index.php
$iniArray = '';
$proxiedPort = "8080"; // These defaults should be overwritten by your config.ini file!
$proxyPath = "proxy8080"; // These defaults should be overwritten by your config.ini file!

try {
	$iniArray = parse_ini_file( $iniPath );
	$proxiedPort = $iniArray["proxiedPort"];
	$proxyPath = $iniArray["proxyPath"];
} catch( Exception $iniError ) {
	echo 'Error parsing your config.ini file: ', $iniError->getMessage();
}

if( gettype($proxiedPort) == "string" && gettype($proxyPath) == "string" ) {
	try {
		proxyRequest($proxiedPort, $proxyPath);
	} catch( Exception $proxyError ) {
		echo 'Error proxying your site: ', $proxyError->getMessage();
	}
} else {
	echo 'Error: Check your config.ini settings.';
}

function proxyRequest($port, $webPath) {
	$path = $_SERVER[REQUEST_URI];
	if( substr($path, -2) == "js" ) {
                header('Content-type: text/javascript');
        }
        if( substr($path, -3) == "css" ) {
                header('Content-type: text/css');
        }
        if( $webPath == "" && $path != "/" ) {
                echo `curl http://127.0.0.1:$port$path`;
        } else if( $webPath == "" && $path == "/" ) {
                echo `curl http://127.0.0.1:$port`;
	} else if( $_SERVER[REQUEST_URI] == '/' . $webPath . '/' ) {
		echo `curl http://127.0.0.1:$port`;
	} else if( $_SERVER[REQUEST_URI] == '/' . $webPath . '/index.php' ) {
		echo `curl http://127.0.0.1:$port`;
	} else if( substr( $_SERVER[REQUEST_URI], 0, strlen('/' . $webPath . '/index.php') ) == '/' . $webPath . '/index.php' ) {
		$path = $_SERVER[REQUEST_URI];
		$path = substr( $path, strlen('/' . $webPath . '/index.php') );
		echo `curl http://127.0.0.1:$port$path`;
	} else if( substr( $_SERVER[REQUEST_URI], 0, strlen('/' . $webPath ) ) == '/' . $webPath ) {
		$path = $_SERVER[REQUEST_URI];
		$path = substr( $path, strlen('/' . $webPath) );
		echo `curl http://127.0.0.1:$port$path`;
	} else {
		echo 'Invalid request or something...';
	}
}
?>
