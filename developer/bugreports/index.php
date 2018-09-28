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
                <div class="col-sm-12 col-md-3" id="notifcont" style="overflow-y: auto;">
                </div>
                <div class="col-sm-12 col-md-9" id="reportbody" style="overflow-y: auto;">

                </div>
            </div>
        </div>
        <div class="container">
        <input type="text" name="id" id="id" hidden>
  
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
		            <h4 class="modal-title">Project Information</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                        <div class="modal-body">
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
		var bugid = $('#id');
		bug_id = bugid.val();
		var modalbody = $('#reportbody');
		$.ajax({
			type: 'GET',
			url: 'bugreports/modalreq.php',
			dataType: 'html',
			data: {
				bug_id: bug_id
			},
			success: function(newcontent){
				modalbody.html(newcontent);
				console.log(newcontent);
			}
			
		});
	}


	  function fill() {
            var $newps = $('#notifcont');

            $.ajax({
                type: 'GET',
                url: 'bugreports/requesting.php',
                dataType: 'html',
                data: $(this).serialize(),
                success: function(newContent){
                   $newps.html(newContent);
                   console.log(newContent);
                    // setTimeout("fill()", 1000);
                }
            });
        };

     $(document).ready(function(){
       fill();
     });

  	</script>		
