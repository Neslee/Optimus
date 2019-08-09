    <?php
    require_once("session.php");
    $user_id = $_SESSION['user_id'];

    require_once("db.php");

    global $conn;
    $res = mysqli_query($conn, "SELECT * FROM user WHERE user_id='$user_id'");
    $user = mysqli_fetch_assoc($res);
        $firstname = $user['firstname'];
        $lastname = $user['lastname'];
        $array = array($firstname, $lastname);
        $fullname = implode(" ", $array);
        $email = $user['email'];
        $gender = $user['gender'];
        $age = $user['age'];
        $dob = $user['dob'];
        $photo = $user['photo'];

    $res = mysqli_query($conn, "SELECT * FROM contact WHERE user_id='$user_id'");
    $contact = mysqli_fetch_assoc($res);
        $phone = $contact['phone'];
        $address = $contact['address'];
        $pincode = $contact['pincode'];

    $res = mysqli_query($conn, "SELECT * FROM workshop WHERE user_id='$user_id'");
    $workshop = mysqli_fetch_assoc($res);
        $company = $workshop['company'];
        $experience_level = $workshop['experience_level'];
        $food = $workshop['food'];
        $t_shirt = $workshop['t_shirt'];

    $res = mysqli_query($conn, "SELECT * FROM personal WHERE user_id='$user_id'");
    $personal = mysqli_fetch_assoc($res);
        $languages = $personal['languages'];
        $hobbies = $personal['hobbies'];
        $puc = $personal['puc'];
        $sslc = $personal['sslc'];
        $degree = $personal['degree'];


        if (isset($_POST['btnUpdate'])) {
            $fullname=$_POST['fullname'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $birth_date=$_POST['birth_date'];
            $photo = $_FILES['file']['name'];
            $paddress=$_POST['paddress'];
            $gender=$_POST['gender'];
            $pincode=$_POST['pincode'];
            $company=$_POST['company'];
            $experience=$_POST['experience'];
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

            $table_name = 'user';
            $table_id = 'user_id';
            $form_data = array(
            'firstname'=> $firstname,
            'lastname'=>$lastname,
            'email'=>$email,
            'gender'=>$gender,
            'dob'=>$birth_date,
            'age'=>$age
        );
        update_data($table_name,$form_data,$table_id,$user_id);
        
        $table_name = 'contact';
        $table_id = 'user_id';
            $form_data = array(
            'email'=> $email,
            'domain_name'=>$emaillast,
            'phone'=>$phone,
            'pincode'=>$pincode,
            'address'=>$paddress
        );
        update_data($table_name,$form_data,$table_id,$user_id);
        
            $table_name = 'workshop';
            $table_id = 'user_id';
            $form_data = array(
            'company'=> $company,
            'experience_level'=>$experience,
            'food'=>$food,
            't_shirt'=>$tshirt
        );
        update_data($table_name,$form_data,$table_id,$user_id);
        
            $table_name = 'personal';
            $table_id = 'user_id';
            $form_data = array(
            'languages'=> $languages,
            'hobbies'=>$hobbies,
            'sslc'=>$sslc,
            'puc'=>$puc,
            'degree'=>$engg,
            'total'=>$total,
            'average'=>$avg,
        );
        update_data($table_name,$form_data,$table_id,$user_id);
        header("Location: edit.php");
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
        <link rel="stylesheet" href="css/style.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <script src="js/countries.js"></script>
        <title>Registartion Form</title> 
    </head>

    <body>
    <div class="col-md-3 dashboard-head">
    <div class="col-md-12 dashboard-heading text-center">
    <img class="dashboard-image" src='<?php echo $photo;  ?>' >
    <h3>Welcome <?php echo $firstname ?> </h3>
    </div>
    <div class="col-md-12 dashboard-links text-center">
    <div class="col-md-6">
       <a href="dashboard.php">Dashboard</a>
       </div>
       <div class="col-md-6">
       <a href="logout.php">Logout</a>
       </div>
     </div>
    </div>

        <div class="col-md-9 dashboard-container">
            <div class="col-md-12">
                <h3 class="text-center">
                    <span class="label label-info">Update Profile</span>
                </h3>
            </div>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                <div class="col-md-6 col-md-offset-3">
                    <br /><br />
                    <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name" value="<?php echo $fullname; ?>"><br />
                    <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $email; ?>"><br />
                    <input type="number" class="form-control" name="phone" placeholder="Phone" value="<?php echo $phone; ?>"><br />
        
                    <textarea class="form-control" rows="5" name="paddress" id="paddress" placeholder="Permanent Address"><?=$address;?></textarea><br />
                    <span id="paragraph" value="echo">0</span><span> out of 300</span></span><br/><br/>

                    <textarea class="form-control" rows="5" name="laddress" placeholder="Local Address"><?=$address;?></textarea><br />
                    <span id="paragraph" value="echo">0</span><span> out of 300</span></span><br/><br/>

                    <input type="text" class="form-control" name="pincode" placeholder="Pincode" value="<?php echo $pincode; ?>"><br />

                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" name="birth_date" placeholder="Birth Date" value="<?php echo $dob; ?>"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker({
                            format: 'DD/MM/YYYY'
                        });
                        });
                    </script>

                    <div class="radio text-center">
                        <label>Select Gender</label><br />
                        <label><input type="radio" name="gender" value="male" <?php if ($gender == 'male') {echo ' checked ';} ?>>Male</label>
                        <label><input type="radio" name="gender" value="female" <?php if ($gender == 'female') {echo ' checked ';} ?>>Female</label>
                    </div>

                    <input type="text" class="form-control" name="company" placeholder="Company" value="<?php echo $company; ?>"><br />

                    <select class="form-control" name="experience">
                        <option value="none">Experience Level</option>
                        <option value="fresher" <?php if($experience_level=="fresher") echo 'selected="selected"'; ?>>Fresher</option>
                        <option value="intermediate" <?php if($experience_level=="intermediate") echo 'selected="selected"'; ?>>Intermediate</option>
                        <option value="expert" <?php if($experience_level=="expert") echo 'selected="selected"'; ?>>Expert</option>
                    </select><br />


                    <select class="form-control" name="food">
                        <option value="none">Select Food</option>
                        <option value="veg" <?php if($food=="veg") echo 'selected="selected"'; ?>>Veg</option>
                        <option value="nonveg" <?php if($food=="nonveg") echo 'selected="selected"'; ?>>Non Veg</option>
                    </select><br />

                    <select class="form-control" name="tshirt">
                        <option value="none">Select T-Shirt Size</option>
                        <option value="small" <?php if($t_shirt=="small") echo 'selected="selected"'; ?>>Small</option>
                        <option value="medium" <?php if($t_shirt=="medium") echo 'selected="selected"'; ?>>Medium</option>
                        <option value="large" <?php if($t_shirt=="large") echo 'selected="selected"'; ?>>Large</option>
                    </select><br />

                    <div class="languages text-center">
                        <label>Languages Known</label><br />
                        <input type="checkbox" name="languages" value="english" <?php if ($languages == 'english') {echo ' checked ';} ?>>English
                        <input type="checkbox" name="languages" value="hindi" <?php if ($languages == 'hindi') {echo ' checked ';} ?>>Hindi
                        <input type="checkbox" name="languages" value="kannada" <?php if ($languages == 'kannada') {echo ' checked ';} ?>>Kannada<br /><br />
                    </div>


                    <div class="hobbies text-center">
                        <br /> <label>Hobbies</label><br />
                        <input type="checkbox" name="hobbies" value="swimming" <?php if ($hobbies == 'swimming') {echo ' checked ';} ?>>Swimming
                        <input type="checkbox" name="hobbies" value="cycling" <?php if ($hobbies == 'cycling') {echo ' checked ';} ?>>Cycling
                        <input type="checkbox" name="hobbies" value="singing" <?php if ($hobbies == 'singing') {echo ' checked ';} ?>>Singing
                        <input type="checkbox" name="hobbies" value="dancing" <?php if ($hobbies == 'dancing') {echo ' checked ';} ?>>Dancing<br /><br />
                    </div>


                        Engineering Agreegate:
                        <input type="number" name="engg" class="form-control"  placeholder="%" value="<?php echo $degree; ?>"><br/>

                        PU Agreegate:
                        <input type="number" name="puc" class="form-control"  placeholder="%" value="<?php echo $puc; ?>"><br/>

                        SSLC Agreegate:
                        <input type="number" name="sslc" class="form-control" placeholder="%" value="<?php echo $sslc; ?>"><br /><br />

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
                            <button type="submit" class="form-control btn btn-success" id="btnUpdate" name="btnUpdate">Update</button><br /><br />
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <script src="js/main.js"></script>
    </body>

    </html>
