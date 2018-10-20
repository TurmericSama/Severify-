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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background-color: white;
        }
        .carousel-inner img{
            height: 50% !important;
            width: 100%;
        }
        .carousel-caption{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-shadow: 1px 1px 10px #000;
        }
        .carousel-caption h1{
            font-size: 500%;
            text-shadow: 1px 1px 10px #000;
        }
        .jumbotron {
            padding: 1rem;
            border-radius: 0;
        }
        .padding{
            padding: 2rem .3rem 2rem .3rem
        }
        .fa-html5{
            color: #e54d26;
        }
        .fa-css3{
            color: #2163af;
        }
        .fa-bold{
            color: #563d7c;
        }
        .fa-bold, .fa-css3, .fa-html5{
            font-size: 4em;
            margin: 1rem;
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

  <div id="slides" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../res/one.jpg" alt="imageOne">
            <div class="carousel-caption">
                <h1 class="display-1">Severify</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../res/two.jpg" alt="imageOne">
        </div>
        <div class="carousel-item">
            <img src="../res/three.jpg" alt="imageOne">
        </div>
    </div>
    </div>  
    <a class="carousel-control-prev" href="#slides" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#slides" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
 
    <div class="container-fluid padding">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                <h1>Severify</h1>
                <p class="text-justify">A simple, yet reliable project management platform to focused on creating, storing, relaying project information and files for the people involved.
                </p>
            </div>
        </div>  
    </div>

    <div class="container-fluid padding" style="background-color: #E8EAF6">
        <div class="row padding">
            <div class="col-md-3 col-sm-6 col-xs-4">
                <div class="card">
                    <img class="card-img-top" src="../res/gab.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Gabrielle Celestino</h5>
                        <p class="card-text">
                            Project Manager <br>
                            <span class="text-secondary">Polytechnic University of the Philippines</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-4">
                <div class="card">
                    <img class="card-img-top" src="../res/zen.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Sweetzen Aandrea Jimenez</h5>
                        <p class="card-text">
                            Quality Assurance <br>
                            <span class="text-secondary">Polytechnic University of the Philippines</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-4">
                <div class="card">
                    <img class="card-img-top" src="../res/mel.png" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Melrose Iglesia</h5>
                        <p class="card-text">
                            Lead Documenter <br>
                            <span class="text-secondary">Polytechnic University of the Philippines</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-4">
                <div class="card">
                    <img class="card-img-top" src="../res/pau.jpg" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Paulo Lopera</h5>
                        <p class="card-text">
                            Full Stack Developer <br>
                            <span class="text-secondary">Polytechnic University of the Philippines</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <i class="fa fa-html5"></i>
                <h3>HTML5</h3>
                <p>Built with the latest version of HTML, HTML5</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <i class="fa fa-css3"></i>
                <h3>CSS3</h3>
                <p>Built with the latest version of CSS, CSS3</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <i class="fa fa-bold"></i>
                <h3>BOOTSTRAP</h3>
                <p>Built with the latest version of Bootstrap, Bootstrap 4.1</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <img style="padding: 0; margin: 1rem;" height="11%" src="../res/jq.png" alt="">
                <h3>JQUERY</h3>
                <p>Built with the latest version of JQuery, JQuery 3.3.1</p>
            </div>
        </div>
    </div>
    
<figure>
   <img style="position: fixed;" width="100%" src="../res/one.jpg" alt="">
</figure>
  
    <footer>
        <div class="container-fluid">
            <div class="col-md-4">
                <h1 style="color: green;">Severify</h1>
            </div>
        </div>
    </footer>
</body>
</html>

