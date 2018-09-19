<?php

session_start();

require("../../con/db.php");

$userid = $_SESSION['user_id'];

if(isset($con) && $con !== NULL){
    //do nothing
   }

$query = "select p.name as name, p.source as source ,s.dir as dir from project_t as p inner join source as s on p.proj_id = s.proj_id and p.source = s.source_id where source is not null and coder = $userid";

$result =  $con->query( $query );

echo "<table class=\"table\">";
                        echo "<thead class=\"thead-dark\">";
                        echo "<tr>";
                                echo "<th scope=\"col\">Project Name</th>";
                                echo "<th scope=\"col\">Download</th>";
                         echo "<tr>";
					echo "</thead>";
					
foreach($result as $row){
	echo "<tr>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td><a class=\"btn btn-success\"href=\"/download?file=/". $row[ 'dir' ] ."\">Download</a></td>";
	echo "</tr>"; 
}
                       
               	echo "</table>";
    
	
?>
