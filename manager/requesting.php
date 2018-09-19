<?php
session_start();

require("../con/db.php");

if(isset($con) && $con !== NULL){
    //do nothing
   }

echo "<table class=\"table table-hover table-responsive\" id=\"tab\">";
                        echo "<thead class=\"thead-dark\">";
                        echo "<tr>";
                                echo "<th class=\"text-light\" scope=\"col\">Project ID</th>";
                                echo "<th scope=\"col\">Project Name</th>";
                                echo "<th scope=\"col\">Creator</th>";
                                echo "<th scope=\"col\">Date</th>";
                                echo "<th scope=\"col\">Developer</th>";
                                echo "<th scope=\"col\">Tester</th>";
                                echo "<th scope=\"col\">Status</th>";
                         echo "<tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    
$userid = $_SESSION['user_id'];

$query = "select p.proj_id, p.name, u.userfname, p.date, p.coder, p.tester, p.status from project_t as p inner join user_t as u on p.creator = u.user_id where p.creator = ".$_SESSION['user_id']."";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)){
    $query1 = "select u.userfname from project_t as p join user_t as u on p.coder = u.user_id where p.proj_id=" . $row['proj_id'] . " and coder=" . $row['coder'] . "";
    $result1 = mysqli_query($con, $query1);
    while($row1 = mysqli_fetch_array($result1)){
        $query2 = "select u.userfname from project_t as p join user_t as u on p.tester = u.user_id where p.proj_id=" . $row['proj_id'] . " and tester=" . $row['tester'] . "";    
        $result2  = mysqli_query($con,$query2);
        while($row2 = mysqli_fetch_array($result2)){
            echo "<tr onClick=\"document.getElementById('id').value = $(this).find('td:first').text(); getit();\" data-toggle=\"modal\" data-target=\"#myModal\" class=\"table-row\" >";
            echo "<td class=\"text-light\" id=\"proj_id\">" . $row['proj_id'] . "</td>";
            echo "<td class=\"text-light\" id=\"projname\">" . $row['name'] . "</td>";
            echo "<td class=\"text-light\" id=\"proman\">" . $row['userfname'] . "</td>";
            echo "<td class=\"text-light\" id=\"date\">" . $row['date'] . "</td>";
            echo "<td class=\"text-light\" id=\"coder\">" . $row1['userfname'] . "</td>";
            echo "<td class=\"text-light\" id=\"tester\">" . $row2['userfname'] . "</td>";
            echo "<td class=\"text-light\" id=\"tester\">" . $row['status']. "</td>";
            echo "</tr>";
            }
        }
    }
        echo "</tbody>";
        echo "</table>";

	
?>
