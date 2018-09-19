<!DOCTYPE html>
<html>

  	<head>
    	<title>Smart | Report a Bug</title>
    	<meta name="viewport" content="width=device-width">
    	<link rel="shortcut icon" type="image/x-icon" href="/res/favicon.ico"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/css/style.css" />
  	</head>
	
	  <style>
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


	<body>
		<nav class="navbar">
				<div class="container-fluid">
					<div class="navbar-header">
							<img id="logo" src="../../res/smart-logo.png">
							<h1 class="nav-brand" id="brand">Smart | App Development</h1>
							<ul id="nav" style="list-style: none; float: left">
                            <li><a class="btn btn-secondary" href="../tester">Home</a></li>
                            <li><a class="btn btn-secondary" href="../tester/report">Report a Bug</a></li>
                            <li><a class="btn btn-secondary" href="../tester/projects">Bugs List</a></li>
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

			<div class="container-fluid" style="height: 600px; overflow: auto;">
				<div class="row">
					<div id="base" class="container w-75">
						<div id="projtable" class="container">
							<form action="#" method="POST" enctype="multipart/form-data">	
								<h3>Create Bug Report</h3>
								<h5>Fill up Bug Information</h5>
								<div class="form-group">
									<select class="form-control w-75" name="projsel" id="projsel" required>

									</select>
								</div>
								<div class="form-group">
									<input type="text" name="bugname" class="form-control w-75" placeholder="Bug Name" required />
								</div>
								<div class="form-group">
									<textarea name="bugdesc" class="form-control w-75" cols="50" rows="5" placeholder="Bug Description" required style="resize: none;"></textarea>
								</div>
								<div class="form-group">
									<textarea name="rep" id="rep" cols="50" rows="5" placeholder="How to replicate" class="form-control w-75" style="resize: none;"></textarea>
								</div>
								<div class="form-group">
									<select name="severity" class="form-control w-75">
										<option class="form-control">Low</option>
										<option class="form-control">Medium</option>
										<option class="form-control">High</option>
									</select>
								</div>
								<div class="form-group">
									<input type="file" id ="files" name="upfile[]" class="form-control w-75" enctype="multipart/form-data" multiple="multiple"/>
								</div>
								<input type="submit" class="btn btn-primary w-75" />
								</form>
							</div>
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
            "</span>").insertAfter("#files");
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



<?php

    session_start();
	require("../../con/db.php");

	function randomNumber($length) {

		$result = '';
	
		for($i = 0; $i < $length; $i++) {
			$result .= mt_rand(0, 9);
		}
	
		return $result;
    }

    $length = 10;

    if($_POST){
		$id = "BUG".randomNumber($length);	
  	$name = $_POST['bugname'];
		$project_source = $_POST['projsel'];
		$desc = $_POST['bugdesc'];
		$rep = $_POST['rep'];
		$severity = $_POST['severity'];
		$founder = $_SESSION['userid'];

			$query = "insert into bugs_t(bug_id,project_source,bugdesc,replicate,bugname,severity,tester) 
			values ('$id',$project_source,'$desc','$rep','$name','$severity',$founder)";
		echo $query;
			if($con->query($query)){
			echo '<script> alert("Sucessful");</script>';
			} else {
			echo "<script> alert('error sending report')</script>";
				}
			}
			

?>




<script>

</script>