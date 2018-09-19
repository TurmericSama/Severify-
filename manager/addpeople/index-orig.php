<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="/res/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<link href="/css/style.css" type="text/css" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Project</title>
</head>
    <body>  
        <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                            <img id="logo" src="/res/smart-logo.png">
                            <h1 class="nav-brand" id="brand">Smart | App Development</h1>
                            <ul id="nav" style="list-style: none; float: left">
                                <li><a class="btn btn-secondary" href="../manager">Home</a></li>
                                <li><a class="btn btn-secondary" href="../manager/create">Create Project</a></li>
                                <li><div id="option"class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">Manage People
									<span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="../manager/addpeople">Create Account</a></li>
											<li><a href="#">View Profiles</a></li>
										</ul>
								</div></li>
                            </ul>
                    </div>
                    <div id="option"class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options
                            <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="../../logout">Logout</a></li>
                                    <li><a href="#">Settings</a></li>
                                    <li><a href="#">Profile</a></li>
                                </ul>
                    </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="w-75 p-3 container-fluid">
                    <h3>Create New Account</h3>
                    <form action="#" method="POST">
                        <div class="form-group w-75">
                            <input name="name" type="text" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group w-75">
                            <input name="username" type="text" class="form-control" placeholder="Select a Username" required>
                        </div>
                        <div class="form-group">
                            <select class="form-control w-75" name="emptype" id="emptype" required>
                                <option selected disabled>--Position--</option>
                                <option value="2">Developer</option>
                                <option value="3">Tester</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary w-75" type="submit" name="create" value="Create account">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>


<?php 

session_start();

if(!$_SESSION['user_type'] == 1){
    header("Location: /login");
    die();
}

function post(){

    require("../../con/db.php");

    $name = $_POST['name'];
    $username = $_POST['username'];
    $user_type =  $_POST['emptype'];

    $query = "insert into user_t (userfname, username, user_type) values ('$name','$username','$user_type')";

    if($con->query( $query )){
        echo "<script>alert(\"user creation sucessful\")</script>";
    } else{
        echo "<script>alert('Incomplete information supplied, please try again');</script>";
    }
}


if($_POST){
    post();   
}
?>

<script>

$.post( "check.php", { user: $("#username").val() }, function (data){
  if(data=='1'){
      
  }
  elseif(data=='0'){
    //do 0
  }
});


</script>