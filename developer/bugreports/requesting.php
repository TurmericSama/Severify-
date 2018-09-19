<?php

session_start();


require("../../con/db.php");

if(isset($con) && $con !== NULL){
    //do nothing
   }

$coder = $_SESSION['user_id'];

$query = "select project_source, bug_id, bugname, bugdesc, replicate, tester, date from bugs_t where coder = ". $coder ."";


$result =  $con->query( $query );
if($result->num_rows !== 0){
foreach($result as $row){
echo "<div class=\"snnotif border\" onClick=\"document.getElementById('id').value = '" . $row['project_source'] . "'; getit();\" data-toggle=\"modal\" data-target=\"#myModal\">";
        echo "<span class=\"badge badge-primary notif-p\">Bug Report</span>";
        echo "<span id=\"bugname\">" . $row['bugname'] . "</span>"; 
        echo "<p>" .$row['bugdesc'] . "</p>"; 
        echo "<input id=\"bug_id\" hidden value=\"". $row['bug_id'] ."\"/>";
echo "</div>";
    }
}
else{
    echo "<div class=\"snnotif border\">";
    echo "<p>No available Reports at this time</p>";
    echo "</div>";
}


?>

<!--data-toggle=\"modal\" data-target=\"#myModal\"->