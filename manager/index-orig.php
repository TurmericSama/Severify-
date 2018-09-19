
<?php

session_start();


?>

<!DOCTYPE html>

<html>
	<head>
		<title>
			Manager | Home
		</title>
		<meta name="viewport" content="device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <link href="/css/style.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<nav class="navbar">
			<div class="container-fluid">
				 <div class="navbar-header">
						<img id="logo" src="/res/smart-logo.png">
						<h1 class="nav-brand" id="brand">Smart | Severify</h1>
						<ul id="nav" style="list-style: none; float: left">
                            <li><a class="btn btn-secondary" href="../manager">Home</a></li>
                            <li><a class="btn btn-secondary" href="../manager/create">Create Project</a></li>
                            <li><div id="option"class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">Manage People
									<span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="../manager/addpeople">Create Account</a></li>
											<li><a class="dropdown-item" href="#">View Profiles</a></li>
										</ul>
								</div></li>
                        </ul>
				</div>
				<div id="option"class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options
						<span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="../logout">Logout</a></li>
								<li><a class="dropdown-item" href="#">Settings</a></li>
								<li><a class="dropdown-item" href="#">Profile</a></li>
							</ul>
				</div>
		</nav>

		<input type="number" name="id" id="id" hidden>

		<div class="container-fluid">
			<div class="row">
				
				<div class="col-md-12">
					<div id="projtable" class="container" style="height:600px; overflow:auto;">
						
					</div>
				</div>
			</div>
		</div>


<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		<h4 class="modal-title">Project Information</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
					project information
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

	</body>

</html>

<script>
	function getit(){
		var projid = $('#id');
		proj_id = projid.val();
		
		var modalbody = $('.modal-body');


		$.ajax({
			type: 'GET',
			url: 'manager/modalreq.php',
			dataType: 'html',
			data: {
				proj_id: proj_id
			},
			success: function(newcontent){
				modalbody.html(newcontent);
				console.log(newcontent);
			}
			
		});
	}

 
	function fill() {
		var $projtable = $('#projtable');

	 	$.ajax({
	 		type: 'GET',
	 		url: '/manager/requesting.php',
	 		dataType: 'html',
	 		data: $(this).serialize(),
	 		success: function(newContent){
	 		$projtable.html(newContent);
	 		   console.log(newContent);
	 			// setTimeout("fill()", 1000);
	 		}			
	 	});
	};

		$("document").ready(function(){
		fill();
		getit();
    	});



</script>
