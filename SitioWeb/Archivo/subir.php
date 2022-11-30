<?php
    if(isset($_POST['guardar'])){
 
        // Count total files
        //$countfiles = count($_FILES['file']['name']);
    
        // Looping all files
        //for($i=0;$i<$countfiles;$i++){
            $filename = $_FILES['file']['name'];
            echo "Entre aquí";
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],'../upload/'.$filename);
     
        //}
    } 
?>