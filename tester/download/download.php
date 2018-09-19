<?php

	$file	=	$_GET[ "file" ];

	header( "Content-Disposition: attachment; filename=". $file );
	header( "Content-Type: application/octet-stream" );
	readfile( $file );






?>