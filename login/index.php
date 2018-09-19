<?php

session_start();
session_unset();
session_destroy();

require("../con/db.php");

if($_POST){
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $uquery = "select username from user_t where username = \"$username\"";
    $result = $con->query($uquery);
    if($result->num_rows == 0){
        echo "<script>alert('username does not exist');</script>";
    } else{
        $pquery = "select password from user_t where username = \"$username\"";
        $result = $con->query($pquery);
        $row = $result->fetch_row();
        $dbpass = $row[0];


        if(($passauth = password_verify($password, $dbpass)) == 1){
            $credentials = "select user_type, userfname, user_id from user_t where username=\"$username\"";
            $result = $con->query($credentials);
            $rows = $result->fetch_array();
            $user_type = $rows['user_type'];
            $fname = $rows['userfname'];
            $userid = $rows['user_id'];

            if($user_type == 1){
                session_start();
                $_SESSION['user_type'] = $user_type;
                $_SESSION['fname'] = $fname;
                $_SESSION['user_id'] = $userid;
                header("Location: manager");
                die();
            } elseif($user_type == 2){
                session_start();
                $_SESSION['user_type'] = $user_type;
                $_SESSION['fname'] = $fname;
                $_SESSION['user_id'] = $userid;
                header("Location: developer");
                die();
            } elseif ($user_type == 3) {
                session_start();
                $_SESSION['user_type'] = $user_type;
                $_SESSION['fname'] = $fname;
                $_SESSION['user_id'] = $userid;
                header("Location: tester");
                die();
            }
            exit();
        } else{
            echo "<script>alert('password is incorrect')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--beginning of head-->
        <title>Severify | Home</title>
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
        .carousel-inner img{
            height: 100%;
            width: 100%;
        }
        .carousel-caption{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-shadow: 1px 1px 10px #000;
        }
        .jumbotron {
            padding: 1rem;
            border-radius: 0;
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="#" method="POST">
                <input class="form-control mr-sm-2" type="text" placeholder="Username" id="uname" name="uname" required>
                <input class="form-control mr-sm-2" type="password" placeholder="Password" id="pass" name="pass" required>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="login">Login</button>
            </form>
        </div>
    </nav>
    
    <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            
            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../res/one.webp">
              </div>
              <div class="carousel-item">
                <img src="../res/two.jpg" alt="Chicago">
              </div>
              <div class="carousel-item">
                <img src="../res/three.webp">
              </div>
            </div>
            
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
          
    <div class="container-fluid padding">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h1>Severify</h1>
                <p class=" text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse assumenda, facilis maxime rem tempora ipsam delectus ab distinctio libero sint dignissimos, dolore commodi saepe cupiditate perferendis aperiam consequuntur excepturi. Cupiditate esse provident eius doloremque numquam itaque nemo repellendus accusamus, nostrum porro obcaecati? Nam possimus quae mollitia consectetur earum consequatur tempore asperiores voluptatibus, odio labore, dolorem ipsam sit maxime totam incidunt consequuntur quas impedit veritatis nesciunt distinctio nostrum! Inventore, tenetur?
                </p>
            </div>
        </div>  
    </div>
    
</body>
</html>

