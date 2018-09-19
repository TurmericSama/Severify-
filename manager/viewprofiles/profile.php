<?php

require('../../con/db.php');

$userid = $_POST['userid'];

$query = "select u.userfname, t.type_title, u.workstat, u.date from user_t as u join user_type as t on u.user_type = t.type_id where user_id = ".$userid."";

$result = $con->query($query);
$row = $result->fetch_array();

echo "Employee Name: ".$row['userfname']."<br>Job Title: ".$row['type_title']."<br>Working Status: ". $row['workstat']."<br>Date Joined: ".$row['date']."";

?>