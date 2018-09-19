<?php

session_start();

if(!$_SESSION['user_type'] == 1){
    header("Location:login");
    exit();
}

function submit(){
    require("../../con/db.php");

    $projname = $_POST['prname'];
    $dev = $_POST['dsel'];
    $tes = $_POST['tsel'];
    $desc = $_POST['desc'];
    $cby = $_SESSION['user_id'];

    $query = "insert into project_t (name, pdesc, coder, tester , creator) values ('$projname','$desc',$dev,$tes,$cby)";
    if($con->query( $query )){
        echo "<script>alert(\"Successful\")</script>";
    }
    else{
        echo "<script>alert(\"submit has failed\")</script>";
    }

}

if( $_POST){
    submit();
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
                <li class="nav-item active">
                    <a class="nav-link" href="../manager/create">Create Project</a>
                </li>
                <li class="nav-item dropdown">
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
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-9">            
                <form action="" method="post">
                <h1 class="display-5 text-light">Create Project</h1>
                <div class="input-group input-group-md mb-3">  
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Project Name</span>
                    </div>
                        <input type="text" name="prname" id="prname" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Project Name here.." maxlength="25" required>
                </div>
                <div id="warning"></div>
                <div class="input-group input-group-md mb-3">  
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Select Developer</span>
                        </div>
                            <select class="form-control" name="dsel" id="dsel" required>
                            </select>
                </div>
                <div class="input-group input-group-md mb-3">  
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Select Tester</span>
                        </div>
                            <select class="form-control" name="tsel" id="tsel" required>
                            </select>
                </div>
                <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-md">Project Description</span>
                        </div>
                    <textarea style="resize:none;" class="form-control" name="desc" id="desc" cols="50" rows="7" placeholder="Description" required></textarea>
                </div>
                <div class="input-group pt-2">
                    <input class="btn btn-success btn-block" type="submit" value="Create Project">
                </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<script>
    function fill() {
        var $newps = $('#dsel');
        var newps = $('#tsel');
            $.ajax({
                type: 'GET',
                url: '/manager/create/requesting.php',
                dataType: 'html',
                data: $(this).serialize(),
                success: function(newContent){
                   $newps.append(newContent);
                   console.log(newContent);
                }           
            });
            $.ajax({
                type: 'GET',
                url: '/manager/create/requesting1.php',
                dataType: 'html',
                data: $(this).serialize(),
                success: function(newContent){
                   newps.append(newContent);
                   console.log(newContent);
                }           
            });   
        }
    


    $(document).ready(function(){
        fill();
        
        $('#prname').blur(function(){
            var prname = $(this).val();
            console.log(typeof prname);
            if(prname.length >= 6){
            $.ajax({
                url:'../manager/create/askme.php',
                method: 'POST',
                data:{
                    proj_name: prname
                },
                success: function(data){
                    $('#warning').html(data);
                    console.log(data);
                }
            });
            }
            else if(prname.length < 6 && prname.length > 0 ){
                $('#warning').html("<div class=\"alert alert-danger\">Project is too short!</div>");    
            } else{
                $('#alert').remove();
            }
            });
        });

</script>