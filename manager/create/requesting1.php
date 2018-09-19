<?php

session_start();

require("../../con/db.php");

$query = "select user_id, userfname from user_t where user_type = 3";


echo "<option>--Select Tester--</option>";

$result =  $con->query( $query );
foreach($result as $row){
    echo "<option value=\"" . $row['user_id'] . "\">" . $row['userfname'] . "</option>";
}

?>