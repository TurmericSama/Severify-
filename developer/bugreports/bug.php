<?php

session_start();


require("../../con/db.php");

$bug_id = $_POST['bug_id'];
$coder = $_SESSION['user_id'];



$query = "select p.proj_id, b.bug_id, b.bugdesc, p.name, p.date as pdate, b.date as bdate, b.severity, b.replicate, u.userfname, p.coder from project_t as p join bugs_t as b on b.proj_id = p.proj_id join user_t as u on p.tester = u.user_id where coder = '$coder' and bug_id = \"BUG6505212337\"";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)){
    $query1 = "select u.userfname from project_t as p join user_t as u on p.coder = u.user_id where proj_id = '". $row['proj_id']."'";
    $result1 = mysqli_query($con, $query1);
    while($row1 = mysqli_fetch_array($result1)){
                echo "<div class=\"snnotif border\">";
                    echo "<h1>Bug Information</h1>";
                    echo "<span>Bug ID: </span>". $row['bug_id'] ."<br>";
                    echo "<span>Bug Description: </span>". $row['bugdesc'] ."<br>";
                    echo "<span>Project Developer: </span>". $row['userfname'] ."<br>";
                    echo "<span>Project Tester: </span>". $row1['userfname'] ."<br>";
                    echo "<video controls class='container-fluid'>
  <source src=" .$row['replicate']." type=\"video/mp4\">
  <source src=". $row['replicate']." type=\"video/ogg\">
  Your browser does not support HTML5 video</video>";
                echo "</div>";
            }
        }
?>