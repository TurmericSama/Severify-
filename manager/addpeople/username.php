<?php


require("../../con/db.php");

$username =  $_POST['username'];


$query = "select username from user_t where username = '$username'";
$result = $con->query($query);

if(!$row = $result->num_rows){
    echo "<div id=\"alert\" class=\"alert alert-success\" role=\"alert\">Username available!</div>";
} else{
    echo "<div id=\"alert\" class=\"alert alert-danger\" role=\"alert\">This username is already registered in the system!</div>";
}


?>