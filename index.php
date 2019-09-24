<?php
// index.php - main file for proxy8080
// last modified by farglabs on 2019-09-23
if( $_SERVER[REQUEST_URI] == '/proxy8080/' ) {
	echo `curl http://127.0.0.1:8080`;
} else if( $_SERVER[REQUEST_URI] == '/proxy8080/index.php' ) {
	echo `curl http://127.0.0.1:8080`;
} else if( substr( $_SERVER[REQUEST_URI], 0, strlen('/proxy8080/index.php') ) == '/proxy8080/index.php' ) {
	$path = $_SERVER[REQUEST_URI];
	$path = substr( $path, strlen('/proxy8080/index.php') );
	echo `curl http://127.0.0.1:8080$path`;
} else if( substr( $_SERVER[REQUEST_URI], 0, strlen('/proxy8080') ) == '/proxy8080' ) {
	$path = $_SERVER[REQUEST_URI];
	$path = substr( $path, strlen('/proxy8080') );
	echo `curl http://127.0.0.1:8080$path`;
} else {
	echo "Invalid request or something...";
}
?>
