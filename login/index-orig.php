<!DOCTYPE html>
<html>

  <head>
      <link rel="shortcut icon" type="image/x-icon" href="/res/favicon.ico"/>
        <meta name="viewport" content="device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <link href="/css/style.css" type="text/css" rel="stylesheet" />
        <script src="/js/validation.js"></script>
  </head>

  <body>
   
	<nav class="navbar">
            <div class="container-fluid">
                 <div class="navbar-header">
                        <img id="logo" src="/res/smart-logo.png">
                        <h1 class="nav-brand" id="brand">Smart | Severify</h1>
                </div>
	</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<div id="login">
					<form action="#" method="post">
						<div class="form-group">
							<input class="form-control exempt" name="username" type="text" placeholder="Username" maxlength="20" required />
						</div>
						<div class="form-group">
							<input class="form-control exempt" name="password" type="password" placeholder="Password" maxlength="30" required /> 
						</div>
						<button class="btn btn-success" type="submit">Login</button>
					</form>
					</div>
				</div>
			</div>
		</div>
		
  </body>

</html>

<script>
  $(document).ready(function(){
    masaya();
  });


</script>




<?php
session_start();
session_unset();
session_destroy();

require("../con/db.php");


if($_POST){
$uname = $_POST[ "username" ];
$queruname = "
  select username
  from user_t
  where username=\"" .$_POST["username"] ."\"
";

$querpass = "
  select password
  from user_t
  where username=\"". $_POST["username"] ."\"
";


  $result = $con->query( $queruname );

  if($result->num_rows == 0){
    echo "<script> alert(\"Username does not exist\"); </script>";
  }
  else{
    $out = $con->query( $querpass );
    $row = $out->fetch_row();
    $password = $row[0];

    $passauth = password_verify( $_POST['password'], $password);

    if( $passauth == 1 ){
      $sql = "
	  select user_type, userfname, user_id
	  from user_t
	  where username=\"$uname\"";
      $out = $con->query( $sql );
      $row = $out->fetch_array();
      $id = $row["user_type"];
      $name = $row["userfname"];
      $userid = $row["user_id"];


      if( $id == 1 ){
        if(!session_id())
        session_start();
        $_SESSION['posid'] = $id;
        $_SESSION["logon?"] = true;
        $_SESSION["name"] = $name;
        $_SESSION["userid"] = $userid;
        header( "Location: manager" );
        die();
      }
      else if( $id == 2 ){
        if(!session_id())
        session_start();
        $_SESSION['posid'] = $id;
        $_SESSION["logon?"] = true;
        $_SESSION["name"] = $name;
        $_SESSION["userid"] = $userid;
        header( "Location: developer" );
        die();
      }
      else if( $id == 3 ){
        if(!session_id())
        session_start();
        $_SESSION['posid'] = $id;
        $_SESSION["logon?"] = true;
        $_SESSION["name"] = $name;
        $_SESSION["userid"] = $userid;
        header( "Location: tester" );
        die();
      }
      exit();
    } else {
      echo "<script> alert(\"Wrong password\"); </script>";
    }
  }
}
?>
