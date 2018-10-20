<?php

session_start();

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
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../../js/validation.js"></script>
    <style>
        body{
            background-color: grey;
        }
        .snnotif{
            margin: 3px;
            padding: 4px;
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
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Manager People
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../manager/addpeople">Create Acccount</a>
                            <a class="dropdown-item" href="#">View Profiles</a>
                            <!-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">View Profiles</a>
                            </div> -->
                </li>
                <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Reports</a>
                </li> -->
            

                <div class="dropdown float-right">
                    <a class="nav-link dropdown-toggle user" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="../logout">Logout</a>
                            </div>
                </div>
            </ul>
        </div>
    </nav>

<figure>
   <img style="position: fixed;" width="100%" src="../res/back.jpg" alt="">
</figure>


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
    