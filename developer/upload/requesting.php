<?php

session_start();

require("../../con/db.php");

if(isset($con) && $con !== NULL){
    //do nothing
   }

$query = "select proj_id , name from project_t where coder = \"" . $_SESSION["user_id"] . "\" AND source is NULL order by date desc";



$result =  $con->query( $query );

if($result ->num_rows == 0){
    echo "<option value=\"\">No Projects at this time</option>";    
} else{
    echo "<option value=\"\">--Select Project--</option>";
}

foreach($result as $row){
    echo "<option value=\"" . $row['proj_id'] . "\">" . $row['name'] . "</option>";
}

?>
