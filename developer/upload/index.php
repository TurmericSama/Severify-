
<?php

session_start();

require("../../con/db.php");

if($_POST){
    

    $dir = "files/";
    $target = $dir . $_FILES['fileinput']['name'];
    $proj_id = $_POST['select'];

    function randomNumber($length){
        $result = '';
        for($i = 0; $i < $length; $i++){
            $result .= mt_rand(0,9);
        }
        return $result;
    };
    
    $length = 10;
    $source_id = "SRC".randomNumber($length);

    $query = "insert into source (source_id, proj_id, source_type, dir) values ('$source_id','$proj_id','base','$target')";
    $update = "update project_t set source= '". $source_id ."', status = 'testing' where proj_id= '". $proj_id."'";
    if(move_uploaded_file($_FILES['fileinput']['tmp_name'], $target) && $con->query($query) && $con->query($update)){
        echo "<script>alert('File Upload Successful')</script>";
    }
}

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
                <li class="nav-item">
                    <a class="nav-link" href="../developer/bugreports">Bug Reports</a>
                </li>
                <li class="nav-item dropdown active">
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Options
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Current User</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="../../login">Logout</a>
                            </div>
                </div>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <h1 class="display-4 text-light">Upload Base File</h1>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Select Project</span>
                                    </div>
									<select name="select" id="select" class="form-control" onchange="sel(); infoappend();" required>
                                    </select>
								</div>
                                <div id="projinfo">

                                    </div>
								<div class="form-group">
									<input type="file" id="fileinput" name="fileinput" class="form-control" required/>
								</div>
								<div class="input-group">
									<input type="submit" value="Submit File" id="selectbtn" class="btn btn-success btn-block" disabled>
								</div>
							</form>
					</div>
				</div>
			</div>	
	</body>
</html>

<script>

	 function fill() {
            var $newps = $('#select');
            $.ajax({
                type: 'GET',
                url: '/developer/upload/requesting.php',
                dataType: 'html',
                data: $(this).serialize(),
                success: function(newContent){
                   $newps.append(newContent);
                   console.log(newContent);
                }           
            });
        };
        
     $(document).ready(function(){
       fill();
        
        $('#select').blur(function () { 
            var selectv = $('#select').val();
           if(!selectv || selectv == "empty"){
            $('#select').prop('disabled', true);  
            $('#selectbtn').prop('disabled', true);
            $('#fileinput').prop('disabled', true);
            $('#projinfo').hide();
           }
           else if(selectv == "none"){
            $('.alert').remove();
            $('#selectbtn').prop('disabled', true);
            $('#fileinput').prop('disabled',true);
            $('#projinfo').hide();
           }
            else{
            $('#selectbtn').prop('disabled', false);
            $('#fileinput').prop('disabled', false);
            $('#projinfo').show();
            $.ajax({
                type: "POST",
                url: "../developer/upload/projinfo.php",
                data: {
                    proj_id: proj_id
                },
                success: function (response) {
                    $('#projinfo').html(response);
                }
            });
           }
        });
     });

</script>












