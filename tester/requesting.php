
    <?php

    session_start();
    
    
    require("../con/db.php");
    
    if(isset($con) && $con !== NULL){
        //do nothing
       }
    
    $tester = $_SESSION['user_id'];
    
    $query = "select proj_id, name, pdesc, date from project_t where tester = $tester AND status = \"testing\" order by date desc ";
    
    
    $result =  $con->query( $query );
    if($result->num_rows !== 0){
    foreach($result as $row){
    echo "<div class=\"snnotif border\" onClick=\"document.getElementById('id').value = $(this).find('#proj_id').val(); getit();\" data-toggle=\"modal\" data-target=\"#myModal\">";
            echo "<span class=\"badge badge-primary notif-p\">New Project</span>";
            echo "<span id=\"projname\">" . $row['name'] . "</span>"; 
            echo "<p>" .$row['pdesc'] . "</p>"; 
            echo "<input id=\"proj_id\" hidden value=\"". $row['proj_id'] ."\"/>";
    echo "</div>";
        }
    }
    else{
        echo "<div class=\"snnotif border\">";
        echo "<p>No available projects at this time</p>";
        echo "</div>";
    }
    
    
    ?>
    