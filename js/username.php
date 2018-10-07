<?php

session_start();
$name = $_SESSION['fname'];
$arr = explode(' ',trim($name));
echo $arr[0];

?>