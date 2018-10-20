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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
                    <a class="nav-link" href="manager.html">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="create.html">Create Project</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Manager People
                    </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Create Acccount</a>
                            <a class="dropdown-item" href="#">View Profiles</a>
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
                                <a class="dropdown-item text-danger" href="login.html">Logout</a>
                            </div>
                </div>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row pt-2 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-9">
            <h1 class="display-5 text-light">Create Project</h1>
            <div class="input-group input-group-sm mb-3">  
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Project Name</span>
                </div>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Project Name here.." maxlength="25">
            </div>
            <div class="input-group input-group-sm mb-3">  
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Select Developer</span>
                    </div>
                        <select class="form-control" name="devsel" id="devsel">
                            <option selected disabled value="">--Developers--</option>
                            <option value="">Developer name</option>
                        </select>
            </div>
            <div class="input-group input-group-sm mb-3">  
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Select Tester</span>
                    </div>
                        <select class="form-control" name="devsel" id="devsel">
                            <option selected disabled value="">--Testers--</option>
                            <option value="">Developer name</option>
                        </select>
            </div>
            <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Project Description</span>
                    </div>
                <textarea style="resize:none;" class="form-control" name="desc" id="desc" cols="50" rows="10" placeholder="Description"></textarea>
            </div>
        </div>
    </div>

</body>
</html>