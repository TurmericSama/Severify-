<?php

require('../../con/db.php');

$proj_id = $_POST['proj_id'];

$query = "select * from project_t where proj_id = $proj_id";

$result = $con->query($query);
$row = $result->fetch_array();

echo "<div class=\"alert alert-success\">hello</div>";

?>