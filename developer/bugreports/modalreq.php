<?php

session_start();


require("../../con/db.php");

$bug_id = $_GET['bug_id'];
$coder = $_SESSION['user_id'];


$query = "select b.bug_id, b.bugname,b.bugdesc,b.replicate ,u.userfname, b.coder, b.tester, b.date from bugs_t as b inner join user_t as u on b.coder = u.user_id where bug_id = \"$bug_id\" and coder = $coder";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)){
    $query1 = "select u.userfname from bugs_t as b join user_t as u on b.tester = u.user_id where b.bug_id = \"$bug_id\"";
    $result1 = mysqli_query($con, $query1);
    while($row1 = mysqli_fetch_array($result1)){
                echo "<div class=\"snnotif border\">";
                    echo "<h1>Bug Information</h1>";
                    echo "<span>Bug ID: </span>". $row['bug_id'] ."<br>";
                    echo "<span>Bug Name: </span>". $row['bugname'] ."<br>";
                    echo "<span>Bug Description: </span>". $row['bugdesc'] ."<br>";
                    echo "<span>Bug Description: </span>". $row['replicate'] ."<br>";
                    echo "<span>Project Developer: </span>". $row['userfname'] ."<br>";
                    echo "<span>Project Tester: </span>". $row1['userfname'] ."<br>";
                echo "</div>";
            }
        }
?>