<?php

require('../../con/db.php');

$proj_id = $_POST['proj_id'];

$query = "select p.proj_id, p.name, p.creator, u.userfname, p.coder, p.tester, p.status, p.date from project_t as p join user_t as u on p.creator = u.user_id where proj_id = '$proj_id'";

$result = $con->query($query);
$row = $result->fetch_array();
        echo "<div class=\"alert alert-success\">";
            echo "<h4>Project Information</h4>";
            echo "Project ID: ". $row['proj_id'] ."<br>";
            echo "Project Name: \"". $row['name'] ."\"<br>"; 
            echo "Project Manager \"". $row['userfname']."\"<br>";
            echo "Creation Date: \"". $row['date']."\""; 
        echo "</div>";


?>