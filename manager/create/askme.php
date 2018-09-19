<?php

require('../../con/db.php');

$name = $_POST['proj_name'];
$query = "select name from project_t where name = ".$name."";
$result = $con->query($query);
if($result->num_rows !== 0){
    echo "<div class=\"alert alert-warning\">There is a project that has the same name,<br>do you want to continue?</div>";
}