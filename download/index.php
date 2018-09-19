<?php
    $file = $_SERVER[ "DOCUMENT_ROOT" ]. "/developer/upload/". $_GET[ "file" ];
    $name = $_GET[ "file" ];

    header( "Content-Disposition: attachment; filename=". $name );
    header( "Content-Type: application/octet-stream" );
    readfile( $file );