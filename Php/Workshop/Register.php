<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('location: dashboard.php');
    die();
}

require_once("db.php");

$errorMessage = '';
if (isset($_POST['btnRegister'])) {

$fullname=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$birth_date=$_POST['birth_date'];
$photo = $_FILES['file']['name'];
$password=$_POST['password'];
$repassword=$_POST['re-password'];
$paddress=$_POST['paddress'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$pincode=$_POST['pincode'];
$country=$_POST['country'];
$state=$_POST['state'];
$company=$_POST['company'];
$experience=$_POST['experience'];
$location=$_POST['location'];
$food=$_POST['food'];
$tshirt=$_POST['tshirt'];
$languages=$_POST['languages'];
$hobbies=$_POST['hobbies'];
$sslc=$_POST['sslc'];
$puc=$_POST['puc'];
$engg=$_POST['engg'];
$flag = 0;

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

$filepath="upload/".$photo;
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
   
   $total=$sslc+$puc+$engg;
   $avg = ( $sslc + $puc + $engg) / 3;
   if(($sslc < 60 && $puc < 60 && $engg<60) && $avg<65)
   {
    $flag=1;
    $errorMessage = 'Marks doesnot satisfy';
    displayMessage($errorMessage);
   }

   if($flag==0){
    $table_name = 'user';
    $form_data = array(
      'firstname'=> $firstname,
      'lastname'=>$lastname,
      'password'=>$password,
      'email'=>$email,
      'gender'=>$gender,
      'dob'=>$birth_date,
      'age'=>$age,
      'photo'=>$filepath
  );
  $insert_id=insert_user($table_name,$form_data);

  $table_name = 'contact';
    $form_data = array(
      'email'=> $email,
      'domain_name'=>$emaillast,
      'phone'=>$phone,
      'pincode'=>$pincode,
      'address'=>$paddress,
      'country'=>$country,
      'state'=>$state,
      'user_id'=>$insert_id
  );
    insert_user($table_name,$form_data);

    $table_name = 'workshop';
    $form_data = array(
      'company'=> $company,
      'experience_level'=>$experience,
      'food'=>$food,
      't_shirt'=>$tshirt,
      'user_id'=>$insert_id
  );
    insert_user($table_name,$form_data);

    $table_name = 'personal';
    $form_data = array(
      'languages'=> $languages,
      'hobbies'=>$hobbies,
      'sslc'=>$sslc,
      'puc'=>$puc,
      'degree'=>$engg,
      'total'=>$total,
      'average'=>$avg,
      'user_id'=>$insert_id
  );
    insert_user($table_name,$form_data);

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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstarp-datepicker.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="js/countries.js"></script>
    <title>Registartion Form</title>
   
</head>

<body>
    <div class="col-md-12">
        <div class="col-md-12">
            <h3 class="text-center">
                <span class="label label-info">REGISTRATION FORM</span>
            </h3>
        </div>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <div class="col-md-6 col-md-offset-3">
                <br /><br />
                <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name" value="<?php echo htmlspecialchars($_POST['fullname']); ?>"><br />
                <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php echo htmlspecialchars($_POST['email']); ?>"><br />
                <input type="password" class="form-control" name="password" placeholder="Enter Password" value="<?php echo htmlspecialchars($_POST['password']); ?>"><br />
                <input type="password" class="form-control" name="re-password" placeholder="Re-enter Password" value="<?php echo htmlspecialchars($_POST['re-password']); ?>"><br />
                <input type="file" class="form-control" name="file" value="<?php echo htmlspecialchars($_POST['file']); ?>"><br />
                <input type="number" class="form-control" name="phone" placeholder="Phone" value="<?php echo htmlspecialchars($_POST['phone']); ?>"><br />

                <textarea class="form-control" rows="5" name="paddress" id="paddress" placeholder="Permanent Address" value="<?php echo htmlspecialchars($_POST['paddress']); ?>"></textarea><br />
                <span id="paragraph" value="echo">0</span><span> out of 300</span></span><br/><br/>

                <textarea class="form-control" rows="5" name="laddress" placeholder="Local Address" value="<?php echo htmlspecialchars($_POST['laddress']); ?>"></textarea><br />
                <span id="paragraph" value="echo">0</span><span> out of 300</span></span><br/><br/>

                <input type="text" class="form-control" name="pincode" placeholder="Pincode" value="<?php echo htmlspecialchars($_POST['pincode']); ?>"><br />

                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" name="birth_date" placeholder="Birth Date" value="<?php echo htmlspecialchars($_POST['birth_date']); ?>" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker1').datetimepicker();
                    });
                </script>

                <div class="radio text-center">
                    <label>Select Gender</label><br />
                    <label><input type="radio" name="gender" value="male" value="<?php echo htmlspecialchars($_POST['gender']); ?>">Male</label>
                    <label><input type="radio" name="gender" value="female" value="<?php echo htmlspecialchars($_POST['gender']); ?>">Female</label>
                </div>

                <select id="country" name="country" class="form-control" value="<?php echo htmlspecialchars($_POST['country']); ?>"></select> <br/><br/>
                <select name ="state" id="state" name="state" class="form-control" value="<?php echo htmlspecialchars($_POST['state']); ?>"></select>  <br/> <br/>
                
                <script language="javascript">
                    populateCountries("country", "state"); 
                </script>

                <input type="text" class="form-control" name="company" placeholder="Company" value="<?php echo htmlspecialchars($_POST['company']); ?>"><br />

                <select class="form-control" name="experience" value="<?php echo htmlspecialchars($_POST['experience']); ?>">
                    <option value="none">Experience Level</option>
                    <option value="fresher">Fresher</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="expert">Expert</option>
                </select><br />

                <select class="form-control" name="location" value="<?php echo htmlspecialchars($_POST['location']); ?>">
                    <option value="none">Select Location</option>
                    <option value="bangalore">Bangalore</option>
                    <option value="chennai">Chennai</option>
                    <option value="hyderbad">Hyderbad</option>
                </select><br />

                <select class="form-control" name="food" value="<?php echo htmlspecialchars($_POST['food']); ?>">
                    <option value="none">Select Food</option>
                    <option value="veg">Veg</option>
                    <option value="nonveg">Non Veg</option>
                </select><br />

                <select class="form-control" name="tshirt" value="<?php echo htmlspecialchars($_POST['tshirt']); ?>">
                    <option value="none">Select T-Shirt Size</option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                </select><br />

                <div class="languages text-center">
                    <label>Languages Known</label><br />
                    <input type="checkbox" name="languages" value="english">English
                    <input type="checkbox" name="languages" value="hindi">Hindi
                    <input type="checkbox" name="languages" value="kannada">Kannada<br /><br />
                </div>


                <div class="hobbies text-center">
                    <br /> <label>Hobbies</label><br />
                    <input type="checkbox" name="hobbies" value="swimming">Swimming
                    <input type="checkbox" name="hobbies" value="cycling">Cycling
                    <input type="checkbox" name="hobbies" value="singing">Singing
                    <input type="checkbox" name="hobbies" value="dancing">Dancing<br /><br />
                </div>


                    Engineering Agreegate:
                    <input type="number" name="engg" class="form-control"  placeholder="%" value="<?php echo htmlspecialchars($_POST['engg']); ?>"><br/>

                    PU Agreegate:
                    <input type="number" name="puc" class="form-control"  placeholder="%" value="<?php echo htmlspecialchars($_POST['puc']); ?>"><br/>

                    SSLC Agreegate:
                    <input type="number" name="sslc" class="form-control" placeholder="%" value="<?php echo htmlspecialchars($_POST['sslc']); ?>"><br /><br />

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
                        <button type="submit" class="form-control btn btn-success" id="btnRegister" name="btnRegister">Register</button><br /><br />
                    </div>
                    <div class="col-md-6">
                        <a href="index.php" type="submit" class="form-control btn btn-success">Login</a><br /><br />
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script src="js/main.js"></script>
</body>

</html>
