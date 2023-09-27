<?php

$firstname =    $_POST['firstname'];
$lastname =     $_POST['lastname'];
$email =        $_POST['email'];

$errors = [
  'firstnameError' => '',
  'lastnameError' => '',
  'emailError' => '', 
];

if(isset($_POST['submit'])) {





//تحقق الاسم الاول
if(empty($firstname)){
  $errors['firstnameError'] = 'برجى ادخال الاسم الاول';
}

//تحقق الاسم الاخير
if(empty($lastname)){
  $errors['lastnameError'] = 'برجى ادخال الاسم الاخير';
}


//تحقق البريد الالكتروني
if(empty($email)){
  $errors['emailError'] = 'برجى ادخال البريد الالكتروني';
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $errors['emailError'] = 'برجى ادخال البريد الالكتروني بشكل صحيح';
}

//تحقق لا يوجد اخطاء

if(!array_filter($errors)){
    $firstname =   mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname =    mysqli_real_escape_string($conn, $_POST['lastname']);
    $email =       mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO users(firstName, lastName, email)
    VALUES ('$firstname', '$lastname', '$email')";

if(mysqli_query($conn, $sql)){
  header('Location:' . $_SERVER['PHP_SELF']);
}else{
  echo 'Error' . mysqli_error($conn);
  }
 }

}









