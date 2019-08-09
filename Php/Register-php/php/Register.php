<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('location: dashboard.php');
    die();
}

include("db.php");


$errorMessage = '';
if (isset($_POST['btnRegister'])) {

$fullname=$_POST['fullname'];
$employeeid=$_POST['employeeid'];
$email=$_POST['email'];
$password=$_POST['password'];
$repassword=$_POST['re-password'];
$photo = $_FILES['file']['name'];
$phone=$_POST['phone'];
$paddress=$_POST['address'];
$pincode=$_POST['pincode'];
$birth_date=$_POST['birth_date'];
$gender=$_POST['gender'];
$project=$_POST['project'];
$position=$_POST['position'];
$experience=$_POST['experience'];
$interest=$_POST['interest'];
$hobbies=$_POST['hobbies'];
$flag = 0;

global $conn;
$res = mysqli_query($conn, "SELECT 1 FROM user WHERE email='$email'");
$row = mysqli_fetch_assoc($res);
if($row)
{
    $flag = 1;
    $errorMessage = 'Email id  '. $email. ' Already Exists';
    displayMessage($errorMessage); 
}

function checkfield($field,$str) {
  global $flag;
  if (empty($field)) {
  $flag = 1;
  $errorMessage = 'Please Enter '. $str;
  displayMessage($errorMessage);
  }
}
checkfield($fullname,'fullname');
checkfield($email,'email');
checkfield($phone,'phone');
checkfield($password,'password');
checkfield($repassword,'re-password');
checkfield($photo,'file');

$filepath="../upload/".$photo;
$up=move_uploaded_file($_FILES["file"]["tmp_name"] , "$filepath");
if(!$up) 
{
  $errorMessage = 'Image not uploaded';
  displayMessage($errorMessage);
}

$name = trim($name);
$name = explode(" ", $fullname);
$firstname=$name[0]; 
$lastname=$name[1];

if($lastname==''){
  $flag=1;
  $errorMessage = 'Please enter the last name';
  displayMessage($errorMessage);
}

  $emailnew = explode('@',$email);
  $emailfirst = $emailnew[0];
  $emaillast = $emailnew[1];


  if(preg_match("/(?!^[0-9]*$)(?!^[a-z]*$)(?!^[A-Z]*$)^([a-zA-Z0-9]{6,15})$/",$password))
   {
     if(strcmp($password,$repassword)!=0){
       $flag=true;
       $errorMessage = 'Password mismatches';
       displayMessage($errorMessage);
     }
   }
   else{
     $flag=true;
     $errorMessage = 'Password should contain 1 lowercase ,1 upper case and 1 digit';
     displayMessage($errorMessage);
   }
   $password=md5($password);
   $repassword=md5($repassword);

   $current_date  = date('Y-m-d');
   $date1 = date_create($current_date);
   $date2 = date_create($birth_date);
   $interval = date_diff($date1, $date2);
   $age=$interval->format('%y Year %m Month %d Day');
   

   if($flag==0){
    $table_name = 'user';
    $form_data = array(
      'employee_id'=> $employeeid,
      'firstname'=> $firstname,
      'lastname'=>$lastname,
      'email'=>$email,
      'password'=>$password,
      'gender'=>$gender,
      'dob'=>$birth_date,
      'age'=>$age,
      'photo'=>$filepath,
      'status'=>'offline'
  );

  $obj = new dbconnect();
  $obj->connector();
  $insert_id=$obj->insert_user("$table_name",$form_data);

  $table_name = 'contact';
    $form_data = array(
      'email'=> $email,
      'domain_name'=>$emaillast,
      'phone'=>$phone,
      'pincode'=>$pincode,
      'address'=>$paddress,
      'user_id'=>$insert_id
  );
  $obj->insert_user("$table_name",$form_data);

    $table_name = 'personal';
    $form_data = array(
      'projects'=> $project,
      'position'=>$position,
      'experience'=>$experience,
      'interest'=>$interest,
      'hobbies'=>$hobbies,
      'user_id'=>$insert_id
  );
  $obj->insert_user("$table_name",$form_data);

    header("Location: Register.php");
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
    <link rel="stylesheet" href="../css/bootstarp-datepicker.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
    <script src="../js/countries.js"></script>
    <title>Registartion Form</title>
   
</head>

<body class="register-page">
    <div class="col-md-12">
        <div class="col-md-12">
            <h3 class="text-center">
                REGISTRATION FORM
            </h3>
        </div>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <div class="col-md-6 col-md-offset-3">
                <br /><br />
                <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name" value="<?php echo htmlspecialchars($_POST['fullname']); ?>"><br />
                <input type="text" class="form-control" name="employeeid" placeholder="Enter Employee Id" value="<?php echo htmlspecialchars($_POST['employeeid']); ?>"><br />
                <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php echo htmlspecialchars($_POST['email']); ?>"><br />
                <input type="password" class="form-control" name="password" placeholder="Enter Password" value="<?php echo htmlspecialchars($_POST['password']); ?>"><br />
                <input type="password" class="form-control" name="re-password" placeholder="Re-enter Password" value="<?php echo htmlspecialchars($_POST['re-password']); ?>"><br />
                <input type="file" class="form-control" name="file" value="<?php echo htmlspecialchars($_POST['file']); ?>"><br />
                <input type="number" class="form-control" name="phone" placeholder="Phone" value="<?php echo htmlspecialchars($_POST['phone']); ?>"><br />

                <textarea class="form-control" rows="5" name="address" id="address" placeholder="Enter Address" value="<?php echo htmlspecialchars($_POST['address']); ?>"></textarea><br />

                <input type="text" class="form-control" name="pincode" placeholder="Pincode" value="<?php echo htmlspecialchars($_POST['pincode']); ?>"><br />

                <input type='date' class="form-control" name="birth_date" placeholder="Birth Date" value="<?php echo htmlspecialchars($_POST['birth_date']); ?>" />


                <div class="radio text-center">
                    <label>Select Gender</label><br />
                    <label><input type="radio" name="gender" value="male" value="<?php echo htmlspecialchars($_POST['gender']); ?>">Male</label>
                    <label><input type="radio" name="gender" value="female" value="<?php echo htmlspecialchars($_POST['gender']); ?>">Female</label>
                </div>

                 <textarea class="form-control" rows="5" name="project" placeholder="Enter Project" value="<?php echo htmlspecialchars($_POST['project']); ?>"></textarea><br />

                <input type="text" class="form-control" name="position" placeholder="Position" value="<?php echo htmlspecialchars($_POST['position']); ?>"><br />

                <select class="form-control" name="experience" value="<?php echo htmlspecialchars($_POST['experience']); ?>">
                    <option value="none">Experience Level</option>
                    <option value="fresher">Fresher</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="expert">Expert</option>
                </select><br />

                <select class="form-control" name="interest" value="<?php echo htmlspecialchars($_POST['interest']); ?>">
                    <option value="none">Select Intrested Area</option>
                    <option value="bangalore">Politics</option>
                    <option value="chennai">Businessmen</option>
                </select><br />


                <div class="hobbies text-center">
                    <br /> <label>Hobbies</label><br />
                    <input type="checkbox" name="hobbies" value="swimming">Swimming
                    <input type="checkbox" name="hobbies" value="cycling">Cycling
                    <input type="checkbox" name="hobbies" value="singing">Singing
                    <input type="checkbox" name="hobbies" value="dancing">Dancing<br /><br />
                </div>

                    <?php
                                function displayMessage($errorMessage){
                                if (!empty($errorMessage)) {
                                    echo '<div class="alert alert-warning alert-dismissible col-md-6 col-md-offset-3" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button> ' . $errorMessage . '</div>';
                                }
                              }
                     ?>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <button type="submit" class="form-control btn btn-primary" id="btnRegister" name="btnRegister">Register</button><br /><br />
                    </div>
                    <div class="col-md-6">
                        <a href="../index.php" type="submit" class="form-control btn btn-primary">Login</a><br /><br />
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script src="js/main.js"></script>
</body>

</html>
