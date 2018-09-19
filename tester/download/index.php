<?php

require("../../con/db.php");

$query = "select source_id,
         dir
         from source
         ";

    $result = $con->query( $query );
    foreach($result as $row){
        echo "<a href=\"/download.php?file=" .$row['dir']. "\">Download</a></br>";
    }





?>