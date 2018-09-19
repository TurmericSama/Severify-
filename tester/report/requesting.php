<?php

session_start();

require("../../con/db.php");

if(isset($con) && $con !== NULL){
    //do nothing
   }

   $userid =  $_SESSION['user_id'];

$query = "select proj_id , coder, name from project_t where tester = $userid AND source is NOT NULL and status = \"testing\" order by date desc";


$result =  $con->query( $query );

if($result->num_rows == 0 ){
    
echo "<option value=\"none\">There are no projects at this time</option>";
}
else{
    
echo "<option>--Select Project--</option>";
    foreach($result as $row){
        echo "<option value=\"" . $row['proj_id'] . "\">" . $row['name'] . "</option>";
    }
}
?>
