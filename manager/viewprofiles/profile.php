<?php

require('../../con/db.php');

$userid = $_POST['userid'];

$query = "select u.userfname, t.type_title, u.workstat, u.date from user_t as u join user_type as t on u.user_type = t.type_id where user_id = '".$userid."'";

$result = $con->query($query);
$row = $result->fetch_array();

echo "<div class=\"col-md-5\">";
echo "<div class=\"card\">";
    echo "<div class=\"card-header\">";
        echo "Employee Info";
    echo "</div>";
    echo "<img class=\"card-img-top\" src=\"\" alt=\"Card image cap\">";
    echo "<div class=\"card-body\">";
        echo "<h5 class=\"card-title\">". $row['userfname'] ."</h5><span class=\"text-secondary\">" . $row['type_title'] . "</span>";
        echo "<p class=\"card-text\">Working Status: " . $row['workstat']."<br>Date Joined: ". $row['date'] ."</p>";
    echo "</div>";
echo "</div>";
echo "</div>";
?>