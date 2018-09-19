<?php

require("../../db.php");

if(isset($con) && $con !== NULL){
    //do nothing
   }

$query = "select proj_id, name, proj_desc, date from project_t where tester = 0 order by date desc";


$result =  $con->query( $query );

while($row = mysqli_fetch_array($result)){

echo "<div class=\"snnotif border\">";
        echo "<span class=\"badge badge-primary notif-p\">For Testing</span>";
        echo "<span id=\"projname\">" . $row['name'] . "</span>"; 
        echo "<p>" .$row['proj_desc'] . "</p>";
        echo "<a href=\"Bugs/download.php?id=" . $row['proj_id'] ."\" class=\"btn btn-primary\" >Download</a>";
        echo $row['proj_id'];
echo "</div>";
}

?>