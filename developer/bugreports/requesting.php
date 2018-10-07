<?php

session_start();


require("../../con/db.php");


$coder = $_SESSION['user_id'];

$query = "select p.proj_id, p.name, p.date as pdate, b.date as bdate, b.replicate, b.bug_id from project_t as p join bugs_t as b on p.proj_id = b.proj_id where p.coder = '".$coder."'";
$result =  $con->query( $query );
if($result->num_rows !== 0){
    foreach($result as $row){
        echo "<div class=\"snnotif border\" onClick=\"document.getElementById('id').value = $(this).find('#userid').val(); nameclick();\">";
        echo "<span id=\"userfname\">" . $row['bug_id'] . "</span>";  
        echo "<input id=\"userid\" hidden value=\"". $row['bug_id'] ."\"/>";
    echo "</div>";
    }
}
else{
    echo "<div class=\"snnotif border\">";
    echo "<p>No available Reports at this time</p>";
    echo "</div>";
}


?>
