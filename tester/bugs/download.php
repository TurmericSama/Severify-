<?php
include "../../db.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "select files from project_t where proj_id = $id ";

    if($file = $con->query( $query )){

        if(file_exists($file)){
            header('Content-Description: '. $data['description']);
            header('Content-Type: '.$data['type']);
            header('Content-Disposition: '.$data['disposition'].'; filename="'.basename($file).'"');
            header('Expires: '.$data['expires']);
            header('Cache-Control: '.data['cache']);
            header('Pragma: '.$data['pragma']);
            header('Content-Length: '.filesize($file));
            readfile($file);
            exit;
        }

    }
}