<?php

session_start();

require("../../con/db.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--beginning of head-->
        <title>Severify | Developer</title>
    <!--metadata-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--links and scripts-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="../../js/validation.js"></script>
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
                    <a class="nav-link" href="../developer">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../developer/files">Projects</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../developer/bugreports">Bug Reports</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Upload Files
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../developer/upload">Base File</a>
                            <a class="dropdown-item" href="../developer/patches">Patches</a>
                            <!-- <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">View Profiles</a>
                            </div> -->
                </li>
                
                <div class="dropdown float-right">
                    <a class="nav-link dropdown-toggle user" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Profile</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="../../login">Logout</a>
                            </div>
                </div>
            </ul>
        </div>
    </nav>

    <input type="text" name="id" id="id" hidden>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-0 col-sm-0 col-md-2 bg-light" style="height: 92vh;">
                <h3 class="mt-3 text-success">Projects</h3>
                    
                <div  id="memlist">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div id="info">
                    
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>


    </body>
    </html>

<script>

$(document).ready(function(){
    finduser();
    $.ajax({
        url: '../developer/bugreports/requesting.php',
        method: 'POST',
        success: function(data){
            $('#memlist').html(data);
        }
    });
});

function nameclick(){
    var bugid = "";
    bugid = $('#id').val();
    $.ajax({
        url: '../developer/bugreports/bug.php',
        method: 'POST',
        data:{
            bug_id: bugid
        },
        success: function(data){
            $('#info').html(data);
        }
    });

}
</script>