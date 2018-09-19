<?php

session_start();


require("../con/db.php");
$proj_id = $_GET['proj_id'];

$query = "select p.proj_id, p.name,p.pdesc, u.userfname, p.coder, p.tester, p.date from project_t as p inner join user_t as u on p.creator = u.user_id where proj_id = $proj_id";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)){
    $query1 = "select u.userfname from project_t as p join user_t as u on p.coder = u.user_id where p.proj_id=" . $row['proj_id'] . " and coder=" . $row['coder'] . "";
    $result1 = mysqli_query($con, $query1);
    while($row1 = mysqli_fetch_array($result1)){
        $query2 = "select u.userfname from project_t as p join user_t as u on p.tester = u.user_id where p.proj_id=" . $row['proj_id'] . " and tester=" . $row['tester'] . "";    
        $result2  = mysqli_query($con,$query2);
        while($row2 = mysqli_fetch_array($result2)){
                echo "<div>";
                    echo "<span>Project ID:</span>". $row['proj_id'] ."<br>";
                    echo "<span>Project Name:</span>". $row['name'] ."<br>";
                    echo "<span>Project Description:</span>". $row['pdesc'] ."<br>";
                    echo "<span>Project Manager:</span>". $row['userfname'] ."<br>";
                    echo "<span>Developer:</span>". $row1['userfname'] ."<br>";
                    echo "<span>Tester:</span>". $row['userfname'] ."<br>";
                echo "</div>";
            }
        }
    }






?>