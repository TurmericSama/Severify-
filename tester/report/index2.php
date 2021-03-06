<?php

require("../../con/db.php");

session_start();


function randomNumber($length){
	$result = '';
	for($i = 0; $i < $length; $i++){
		$result .= mt_rand(0,9);
	}
	return $result;
};

$length = 10;

	if($_POST){
		$id = "BUG".randomNumber($length);
		$project_source = $_POST['projsel'];
		$desc = $_POST['bugdesc'];
		$rep = $_POST['rep'];
		$severity = $_POST['severity'];
        $founder = $_SESSION['user_id'];
        $dir = "files/";
        $target = $dir . $_FILES['upfile']['name'];

			$query = "insert into bugs_t(bug_id,project_source,bugdesc,replicate,bugname,severity,tester)
			values ('$id',$project_source,'$desc','$rep','$severity',$founder)";
			$update = "update project_t set status = \"debugging\" where proj_id = $project_source";
			if($con->query($query)&&$con->query($update)){
                echo "<script> alert('bug report sent')</script>";
			} else {
			echo "<script> alert('error sending report')</script>";
			die();
				}

			
    }
?>

<!DOCTYPE html>
<html>

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
    <style>
        body{
            background-color: grey;
        }
			input[type="file"] {
			display: block;
		}
		.imageThumb {
			max-height: 75px;
			border: 2px solid;
			padding: 1px;
			cursor: pointer;
		}
		.pip {
			display: inline-block;
			margin: 10px 10px 0 0;
		}
		.remove {
			display: block;
			background: #444;
			border: 1px solid black;
			color: white;
			text-align: center;
			cursor: pointer;
		}
		.remove:hover {
			background: white;
			color: black;
		}

    </style>
    <!--end of head-->
	</head>

	<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a style="color:green;" class="navbar-brand" href="#">Severify</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>            
                
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../tester">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../tester/projects">Projects</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../tester/report">Report a bug</a>
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
        <div class="row pt-2">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-9">            
                <form action="" method="post">
                <h1 class="display-5 text-light">Create Bug Report</h1>

                <div class="input-group input-group-md mb-3">  
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Select Project</span>
                        </div>
                            <select class="form-control" name="projsel" id="projsel" required>
                            </select>
                </div>
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-md">Bug Description</span>
                        </div>
                    <textarea style="resize:none;" class="form-control" name="bugdesc" id="bugdesc" cols="50" rows="7" placeholder="Description"></textarea>
                </div>
				<div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-md">How to Replicate</span>
                        </div>
                    <textarea style="resize:none;" class="form-control" name="rep" id="rep" cols="50" rows="7" placeholder="Description"></textarea>
                </div>
				<div class="input-group input-group-md mb-3">  
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Severity</span>
                        </div>
                            <select class="form-control" name="severity" id="severity" required>
								<option value="low">low</option>
								<option value="medium">medium</option>
								<option value="high">high</option>
                            </select>
                </div>
				<div id="filediv" class="input-group mb-3">
								<input type="file" id ="files" name="upfile[]" class="form-control" required>
							</div>
                <div class="input-group mb-3">
                    <input class="btn btn-success btn-block" type="submit" value="Send Bug Report">
                </div>
                </form>
            </div>
        </div>
    </div>

	</body>
</html>

<script>
	function fill() {
		   var $newps = $('#projsel');

		   $.ajax({
			   type: 'GET',
			   url: '/tester/report/requesting.php',
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
	});

</script>

<script>
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#filediv");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
            $('#files').val();
          });
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }

});

</script>

