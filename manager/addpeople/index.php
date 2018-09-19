<?php

session_start();

if(!$_SESSION['user_type'] == 1 ){
    header("Location:login");
    exit();
}

function post(){
    require("../../con/db.php");

    $name = $_POST['name'];
    $username =  $_POST['username'];
    $position = $_POST['psel'];
    
    $query = "insert into user_t (username, userfname, user_type) values ('$username','$name',$position)";
    if($con->query($query)){
        echo "<script>alert('Account Creation successful')</script>";
    } else{
        echo "<script>alert('Account Creation failed')</script>";
    }
}


if($_POST){
    post();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--beginning of head-->
        <title>Severify | Manager</title>
    <!--metadata-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--links and scripts-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        body{
            background-color: grey;
        }
    </style>
    <!--end of head-->
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a style="color:green;" class="navbar-brand" href="/index.php">Severify</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>            
                
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../manager">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../manager/create">Create Project</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Manager People
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../manager/addpeople">Create Acccount</a>
                            <a class="dropdown-item" href="../manager/viewprofiles">View Profiles</a>
                            <!-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">View Profiles</a>
                            </div> -->
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="#">Reports</a>
                </li>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Current User</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="../logout">Logout</a>
                            </div>
                </div>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row pt-2">
            <div class=" col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-9">
                <form action="#" method="post">    
                    <h1 class="display-5 text-light">Create Account</h1>
                    <div class="input-group input-group-md mb-3">  
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Full name</span>
                        </div>
                            <input name="name" id="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Ex: Juan dela Crux" maxlength="25" required>
                    </div>
                    <div id="warning"></div>
                    <div class="input-group input-group-md mb-3">  
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Username</span>
                        </div>
                        <input name="username" id="username" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Select Username" maxlength="25" required>
                    </div>
                    <div id="uwarning"></div>
                    <div class="input-group input-group-md mb-3">  
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Job Title</span>
                        </div>
                            <select class="form-control" name="psel" id="psel" required>
                                <option value="">--Position--</option>
                                <option value="2">Developer</option>
                                <option value="3">Tester</option>
                            </select>
                    </div>
                    <div class="input-group">
                        <input class="form-control btn btn-success" type="submit" value="Create Account">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<script>

    $(document).ready(function(){
        $('#name').blur(function(){
            var fname = $(this).val();
            console.log(typeof fname);
            if(fname.length >= 6){
            $.ajax({
                url:'../manager/addpeople/name.php',
                method: 'POST',
                data:{
                    fname: fname
                },
                success: function(data){
                    $('#warning').html(data);
                    console.log(data);
                }
            });
            }
            else if(fname.length < 6 && fname.length > 0 ){
                $('#warning').html("<div class=\"alert alert-danger\">Please provide a proper name</div>");    
            } else{
                $('#alert').remove();
            }
            });

            $('#username').blur(function(){
            var username = $(this).val();
            console.log(typeof username);
            if(username.length >= 6){
            $.ajax({
                url:'/manager/addpeople/username.php',
                method: 'POST',
                data:{
                    username: username
                },
                success: function(data){
                    $('#uwarning').html(data);
                    console.log(data);
                }
            });
            }
            else if(username.length < 6 && username.length > 0 ){
                $('#uwarning').html("<div class=\"alert alert-danger\">Username must be atleast 8 characters</div>");    
            } else{
                $('#alert').remove();
            }
            });
        });

</script>