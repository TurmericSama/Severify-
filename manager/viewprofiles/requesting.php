<?php

require("../../con/db.php");

$query = "select userfname, user_type, user_id from user_t where user_type != 1";

$result = $con->query($query);

foreach($result as $row){
    echo "<div class=\"snnotif border\" onClick=\"document.getElementById('id').value = $(this).find('#userid').val(); nameclick();\">";
    echo "<span id=\"userfname\">" . $row['userfname'] . "</span>";  
    echo "<input id=\"userid\" hidden value=\"". $row['user_id'] ."\"/>";
echo "</div>";
}


?>