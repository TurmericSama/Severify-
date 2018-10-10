<?php

require("../../con/db.php");

$chk = "select p.proj_id, b.bug_id from project_t as p left outer join bugs_t as b on p.proj_id = b.proj_id where p.proj_id = 'PRJ0105413015'";
$result = $con->query($chk);
$row = $result->fetch_array();
if($row['bug_id'] == null){
    echo "masaya";
    echo $row['bug_id'];
}

?>