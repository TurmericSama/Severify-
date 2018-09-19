<!DOCTYPE html>

<html>
    <head>
        <title>
            Bootstrap Sample
        </title>
        <meta name="viewport" content="device-width, initial-scale=1"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <link href="/Tester/style.css" type="text/css" rel="stylesheet" />
    </head>

    <body>

        <nav class="navbar">
            <div class="container-fluid">
                 <div class="navbar-header">
                        <img id="logo" src="../../smart-logo.png">
                        <h1 class="nav-brand" id="brand">Smart | App Development</h1>
                </div>
                <div id="option"class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Options
                        <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="../logout.php">Logout</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="#">Profile</a></li>
                            </ul>
                </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='/Tester/Report'">Report A Bug</button>
                </div>
                <div id="base" class="col-md-9">
                    <div id="projtable" class="container">
						<div id="notifcont" class="container">

						</div>
                    </div>
                </div>
            </div>
        </div>


        

    </body>

</html>

<script>
	  function fill() {
            var $newps = $('#notifcont');

            $.ajax({
                type: 'GET',
                url: '/Tester/Bugs/request.php',
                dataType: 'html',
                data: $(this).serialize(),
                success: function(newContent){
                   $newps.html(newContent);
                   console.log(newContent);
                    setTimeout("fill()", 1000);
                }
            });
        };

     $(document).ready(function(){
       fill();
     });

  	</script>