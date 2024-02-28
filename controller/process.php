<?php
include("../model/model.php");

$name=$email=$password=$phone=$gender="";
$nameErr=$emailErr=$passwordErr=$phoneErr=$genderErr="";
$haserror = false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
   function test_input($data) 
   {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
   }

//Name Validation
if(empty($_POST["name"]))
{
    $nameErr="Name is required";
    $haserror=true;
}
else
{
    $name=test_input($_POST["name"]);
    if(!preg_match("/^[a-zA-Z-' ]*$/",$name))
{
    $nameErr="Name Should be only contain Alphabets";
}
}

//Email Validation
if (empty($_POST["email"])) {
    $emailErr = "Email address is required";
    $haserror = true;
} else {
    $email = test_input($_POST["email"]);
    if (!strpos($email, '@') || !strpos($email, '.com')) {
        $emailErr = "Email must contain '@' and '.com' domain";
    }
}

//Password Validation
if(empty($_POST["password"]))
{
    $passwordErr="Password is required";
    $haserror=true;
}
else
{
    $password=test_input($_POST["password"]);
    if(!preg_match("/^(?=.*[a-zA-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/",$password))
    {
        $passwordErr="Password must contain at least 8 characters & one numeric character";
    }
}

//Phone Number Validation
if(empty($_POST["phone"]))
{
    $phoneErr="Phone Number is required";
    $haserror=true;
}
else
{
    $phone=test_input($_POST["phone"]);
    if(!strlen($phone)<=11 &&!preg_match('/[0-9]/',$phone))
    {
        $phoneErr="only numbers should be contain";
    }
    elseif(!preg_match('/^(017|018)\d{8}$/', $phone)) {
        $phoneErr = "Must start with 017 or 018 and contain exactly 11 digits in total";
    }
}
//Checkbox Validation
if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $haserror=true;
} 
else 
{
    $gender = test_input($_POST["gender"]);
}

if($haserror==false)
{
    
    $model = new register();
    $conobj = $model->OpenCon();
    $result = $model->InsertUser($conobj,"user1",$name,$email,$password,$phone,$gender);
    if($result===TRUE)
    {
        echo "Registration Successful";
    }
    else
    {
        echo "Registration Failed ".$conobj->error;
    }
    
}
else
    {
        echo "Complete the validation first";
    }
}
?>