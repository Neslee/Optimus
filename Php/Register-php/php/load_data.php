<?php  
     include('db.php');
     $obj = new dbconnect();
     $conn=$obj->connector();
     if(isset($_POST['id'])){
            $id=$_POST['id'];
            $query = mysqli_query($conn,"SELECT gender,DATE_FORMAT(dob, '%d/%b/%Y') FROM user WHERE user_id=$id");
            $row = mysqli_fetch_assoc($query);
            foreach ($row as $key => $value) {
                echo "$value <br>";
             } 
     }
?>
