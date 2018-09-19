<?php

require("../../con/db.php");


$querpass = "select password from user_t where username=\"".."\"";



$result = $con -> query($query);

if($result->num_rows == 0){
    echo "0";
  } else{
    echo "1";
  }






?>