<?php


require("../con/db.php");

$fname =  $_POST['fname'];


$query = "select userfname from user_t where userfname = '$fname'";
$result = $con->query($query);

if(!$row = $result->num_rows){
    echo "<div id=\"alert\" class=\"alert alert-success\" role=\"alert\">Name is not registered, you're OK to go!</div>";
} else{
    echo "<div id=\"alert\" class=\"alert alert-danger\" role=\"alert\">This name is already registered in the system!</div>";
}


?>