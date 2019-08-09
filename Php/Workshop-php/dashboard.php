<?php
require_once("session.php");
$user_id = $_SESSION['user_id'];

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800))
{
   echo "<script>location.href='index.php'</script>";
   session_unset();     
   session_destroy(); 
}
$_SESSION['LAST_ACTIVITY'] = time();

require_once("db.php");

global $conn;
$res = mysqli_query($conn, "SELECT * FROM user WHERE user_id='$user_id'");
$row = mysqli_fetch_assoc($res);

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $gender = $row['gender'];
    $dob = $row['dob'];
    $age = $row['age'];
    $photo = $row['photo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
</head>
<body>

    <div class="col-md-3 dashboard-head">
    <div class="col-md-12 dashboard-heading text-center">
    <img class="dashboard-image" src='<?php echo $photo;  ?>' >
    <h3>Welcome <?php echo $firstname ?> </h3>
    </div>
    <div class="col-md-12 dashboard-links text-center">
    <div class="col-md-6">
       <a href="edit.php">Edit Profile</a>
       </div>
       <div class="col-md-6">
       <a href="logout.php">Logout</a>
       </div>
     </div>
    </div>

    <div class="col-md-9 dashboard-container">
            <div class="col-md-11 col-md-offset-1 container-right">
            <div class="col-md-12 dashboard-data">
            <?php 
            $array = array($firstname, $lastname);
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
            <?php echo $gender ?>
            </div>
            <div class="col-md-12 dashboard-data">
            <?php echo $dob ?>
            </div>
            <div class="col-md-12 dashboard-data">
            <?php echo $age ?>
            </div>
            </div>
    </div>
</div>
</body>
</html>