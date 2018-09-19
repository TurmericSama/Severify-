<?php
	$route = explode( "?", $_SERVER[ "REQUEST_URI" ] )[0];
	switch( $route ) {
		case "/login":
			require( "/login" );
			break;
		case "/logout":
			require( "/logout" );
			break;
	}
