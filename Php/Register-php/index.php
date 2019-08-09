<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('location: php/dashboard.php');
    die();
}

include("php/db.php");

$errorMessage = '';
if (isset($_POST['btnLogin'])) {
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (empty($email)) {
    $errorMessage = 'Please enter email id';
} 
if (empty($password)) {
    $errorMessage = 'Please enter password';
}

$password = md5($password); 

$obj = new dbconnect();
$obj->connector();
$conn=$obj->connector();

$res = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND `password`='$password'");
$row = mysqli_fetch_assoc($res);
if(!$row) { 
    $errorMessage = 'Invalid login credentials';
 }
 else {
    $_SESSION['user_id'] = $row['user_id'];
    $user_id = $_SESSION['user_id'];
    header("Location: php/dashboard.php");
 }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Registartion Form</title>
</head>

<body class="login-page"> 
    <div class="col-md-4 col-md-offset-4 login-container">
        <div class="col-md-12 login-header">
            <h3 class="text-center">
                LOGIN FORM
            </h3>
        </div>
        <div class="col-md-12 login-content">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="col-md-12">
                <br /><br />
                <input type="text" class="form-control" name="email" placeholder="Enter Email"><br />
                <input type="password" class="form-control" name="password" placeholder="Enter Password"><br />

                <?php
                                if (!empty($errorMessage)) {
                                    echo '<div class="alert alert-warning alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button> ' . $errorMessage . '</div>';
                                }
                                ?>

                <div class="col-md-12">
                    <div class="col-md-6">
                        <button type="submit" class="form-control btn btn-primary" id="btnLogin" name="btnLogin">Login</button><br /><br />
                    </div>
                    <div class="col-md-6">
                        <a href="php/Register.php" type="submit" class="form-control btn btn-primary">Register</a><br /><br />
                    </div>
                </div>

            </div>
        </form>

    </div>
    <script src="js/main.js"></script>
</body>

</html>
