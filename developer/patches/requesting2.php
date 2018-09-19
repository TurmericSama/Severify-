<?php

session_start();

require("../../con/db.php");

if(isset($con) && $con !== NULL){
    //do nothing
   }

$proj_id = $_GET['proj_id'];


$query = "select p.proj_id , p.name, u.userfname, p.date from project_t as p join user_t as u on p.creator = u.user_id where proj_id = $proj_id and coder = \"" . $_SESSION["userid"] . "\" AND source is NULL order by date desc";


$result =  $con->query( $query );
$rows = $result->fetch_array();

        echo "<div>";
            echo "<h4>Project Information</h4>";

            echo "Project ID: \"". $rows['proj_id']."\"";
            echo "Project Name: \"". $rows['name'] ."\""; 
            echo "Project Manager \"". $rows['userfname']."\"";
            echo "Creation Date: \"". $rows['date']."\""; 
        echo "</div>";

?>
