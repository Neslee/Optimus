<?php
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$paddress=$_POST['paddress'];
$laddress=$_POST['laddress'];
$birth_date=$_POST['birth_date'];
$gender = $_POST["Gender"];
$company = $_POST["company"];
$experience = $_POST["experience"];
$location = $_POST["location"];
$food = $_POST["food"];
$tshirt = $_POST["tshirt"];
$languages = $_POST["languages"];
$session = $_POST["session"];
$hobbies = $_POST["hobbies"];

$flag = false;
if (empty($fullname)) {
 $flag = true;
   echo "Enter Fullname" . "<br />";
}
if (empty($email)) {
 $flag = true;
 echo "Enter Email" . "<br />";
}
if (empty($phone)) {
 $flag = true;
 echo "Enter Phone Number" . "<br />";
}
If(strlen($phone) < 10){ 
    echo "Invalid Phone Number" . "<br />";
}

 $birthdate = new DateTime($birth_date);
 $today   = new DateTime('today');
 $age = $birthdate->diff($today)->y;

 $bday=date('d.m.Y',strtotime($birth_date));



if(!$flag) {
    echo "Fullname: " .$fullname ."<br />";
    echo "Email: " . $email . "<br />";
    echo "Phone Number: " . $phone . "<br />";
    echo "Permanent Address: " . $paddress . "<br />";
    echo "Local Address: " . $laddress . "<br />";
    echo "Birth Date: " . $bday . "<br />";
    echo "Age: " . $age . "<br />";
    echo "Gender: " . $gender . "<br />";
    echo "Company: " . $company . "<br />";
    echo "Experience: " . $experience . "<br />";
    echo "Location: " . $location . "<br />";
    echo "Food: " . $food . "<br />";
    echo "T-Shirt: " . $tshirt . "<br />";
    echo "Languages: " . $languages . "<br />";
    echo "Session: " . $session . "<br />";
    echo "Hobbies: " . $hobbies . "<br />";
  }

  $fp=fopen("form-details.csv","a+");
  $no_of_rows=count(file("form-details.csv"));
  $form_data = [];
  foreach($_POST as $key=>$value) {
  if($no_of_rows >= 1) {
      array_push($form_data, $value);
  } else {
      array_push($form_data, $key);
      array_push($form_data, $value);
  }
}

fputcsv($fp, $form_data);
fclose($fp);
  ?>