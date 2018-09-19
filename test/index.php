

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <form action="">
        <input type="text" name="name" id="name">
        <div id="warning"></div>
    </form>
</body>

<script>

    $(document).ready(function(){
        $('#name').blur(function(){
            var fname = $(this).val();
            console.log(typeof fname);
            if(fname.length >= 6){
            $.ajax({
                url:'/test/name.php',
                method: 'POST',
                data:{
                    fname: fname
                },
                success: function(data){
                    $('#warning').html(data);
                    console.log(data);
                }
            });
            }
            else if(fname.length < 6 && fname.length > 1 ){
                $('#warning').html("<div class=\"alert alert-danger\">Please provide a proper name</div>");    
            } else{
                $("#alert").remove();
            }
            });
        

        $('#username').blur(function(){
            var fname = $(this).val();
            console.log(typeof fname);
            if(fname.length >= 6){
            $.ajax({
                url:'/test/username.php',
                method: 'POST',
                data:{
                    fname: fname
                },
                success: function(data){
                    $('#warning').html(data);
                    console.log(data);
                }
            });
            }
            else if(fname.length < 6 && fname.length > 1 ){
                $('#warning').html("<div class=\"alert alert-danger\">Please provide a proper name</div>");    
            } else{
                $("#alert").remove();
            }
            });
        });


</script>