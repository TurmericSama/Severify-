<?php

session_start();

require("../../con/db.php");

if(isset($con) && $con !== NULL){
    //do nothing
   }

$proj_id = $_POST['proj_id'];

$query = "select p.proj_id, p.name, p.creator, u.userfname, p.coder, p.tester, p.status, p.date from project_t as p join user_t as u on p.creator = u.user_id where proj_id = '$proj_id'";

$result =  $con->query( $query );
$rows = $result->fetch_array();

        echo "<div class=\"alert alert-success\">";
            echo "<h4>Project Information</h4>";
            echo "Project ID: ". $rows['proj_id'] ."<br>";
            echo "Project Name: \"". $rows['name'] ."\"<br>"; 
            echo "Project Manager \"". $rows['userfname']."\"<br>";
            echo "Creation Date: \"". $rows['date']."\""; 
        echo "</div>";

?>
