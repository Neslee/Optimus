<?php
require_once("session.php");
$user_id = $_SESSION['user_id'];

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800))
{
   echo "<script>location.href='../index.php'</script>";
   session_unset();     
   session_destroy(); 
}
$_SESSION['LAST_ACTIVITY'] = time();

include("db.php");

$obj = new dbconnect();
$conn=$obj->connector();
$res = mysqli_query($conn, "SELECT * FROM user WHERE user_id='$user_id'");
$row = mysqli_fetch_assoc($res);

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $gender = $row['gender'];
    $dob = $row['dob'];
    $age = $row['age'];
    $status = $row['status'];
    $photo = $row['photo'];
    $photo_path=$photo;

    if (isset($_POST['search'])) {
        $search = $_POST['employeeid'];
        $search = preg_replace("#[^0-9a-z]i#","", $search);
        $query = mysqli_query($conn,"SELECT * FROM user WHERE employee_id LIKE '%$search%'") or die ("Could not search");
        $row = mysqli_fetch_assoc($query);
        if($row)
        {
            $id=$row['user_id'];
            $first_name = $row['firstname'];
            $last_name = $row['lastname'];
            $email = $row['email'];
            $status = $row['status'];
            $user_photo = $row['photo'];
            $user_photopath=$user_photo;

            $gender = $row['gender'];
            $dob = $row['dob'];
            $age = $row['age'];   
        }
        else{
            ?>
                   <script type="text/javascript">
                   alert("No Employee Id Found");
                   </script>
                <?php
        }
    }

    if (isset($_POST['btnStatus'])) {
        $status = $_POST['status'];
        if(isset($status)){
        $sql = "UPDATE user SET status = '$status' where user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_query($conn, $sql)) {
            ?>
               <script type="text/javascript">
               alert("Status Updated");
               </script>
            <?php
        }
        else
        {
        echo "Error: " . $sql . "" . mysqli_error($conn);
        }
    }else{
        ?>
               <script type="text/javascript">
               alert("Please Select the Status");
               </script>
            <?php
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <title>Dashboard</title>
       <script type="text/javascript">
    $(document).ready(function() {
        $("#loadmore").click(function() {
          var id = $(this).data('id');  
          $.ajax({    
            type: "POST",
            url: "load_data.php",
            data:{
                  id:id,
            },
            success: function(response){
                 $("#more_data").html(response);
            }
        });
      });
      });
        </script>
</head>
<body>

    <div class="col-md-3 dashboard-head">
    <div class="col-md-12 dashboard-heading text-center">
    <span class="online"></span>
    <img class="dashboard-image" src='<?php echo $photo_path;  ?>' >
    <h3>Welcome <?php echo $firstname ?> </h3>
    </div>
    <div class="col-md-12 dashboard-links text-center">
        
        <div class="col-md-12 search-div">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <h3>Search Employees</h3>
        <input name="employeeid" type="text" size="30" placeholder="Enter Employee Id"/>
        <button type="submit" id="search" name="search">Search</button><br /><br />
        </form> 
        </div>

        <div class="col-md-12 status-div">
        <div class="status">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <h3>Update Status</h3><br />
        <div class="col-md-12 col-md-offset-1 text-left">
        <div class="col-md-6">
        <label><input type="radio" name="status" value="online"> Online</label><br />
         </div>
         <div class="col-md-6">
        <label><input type="radio" name="status" value="offline"> Offline</label><br />
         </div>
         </div>
         <div class="col-md-12 col-md-offset-1 text-left">
         <div class="col-md-6">
        <label><input type="radio" name="status" value="workhome"> Work From Home</label><br />
        </div>
        <div class="col-md-6">
        <label><input type="radio" name="status" value="leave"> Leave</label><br /><br />
        </div>
         </div>
        <button type="submit" name="btnStatus">Update Status</button><br /><br />
        </form> 
        </div>
        </div>
     </div>
    </div>

    <div class="col-md-9 dashboard-header text-right">
    <div class="col-md-12">
       <a href="logout.php">Logout</a>
       </div>
    </div>

    <div class="col-md-9 dashboard-container">
            <div class="col-md-11 col-md-offset-1 container-right">
            <?php
               if(isset($user_photopath))
               {
                   ?>
              <div class="col-md-4">
             <img class="dashboard-body-image" src='<?php echo $user_photopath;  ?>' >
             </div>
                   <?php
               }
               else{
                ?>
                <div class="col-md-4">
               <img class="dashboard-body-image" src='<?php echo $photo_path;  ?>' >
               </div>
                     <?php
               }
            ?>

            

            <div class="col-md-8">
            <div class="col-md-12 dashboard-data">
            <?php 
            $array = array($first_name, $last_name);
            $fullname = implode(" ", $array);
            ?>
            <?php
            echo $fullname;
             ?>
            </div>
            <div class="col-md-12 dashboard-data">
            <?php echo $email ?>
            </div>
            <div class="col-md-12 dashboard-data">
            <?php echo $status ?>
            </div>

            <div id="more_data" class="dashboard-data"></div>
           
            <?php 
            if (isset($_POST['search'])) {  ?>
            <div class="row">
                      <div class="col-lg-12">
                      <button type="button" name="loadmore" id="loadmore" class="loadmore" data-id="<?php echo $id; ?>">Load More</button>
                      </div>
             </div>
             <?php
            }
            ?>
            </div>
            </div>
           
    </div>
</div>
</body>
</html>