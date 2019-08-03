<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <?php include 'links.php' ?>
</head>
<body>
    <div class="header">
    <h2> Registration </h2>
</div>
<form method="post" action="register.php">

<div class="input-group">
        <label> Email </label>
        <input type="text" name="email" placeholder="Enter your email" required="required"/>
</div>
<div class="input-group">
        <label> Password </label>
        <input type="text" name="password1" placeholder="Enter your password" required="required"/>
</div>
<div class="input-group">
        <label> Confirm Password </label>
        <input type="text" name="password2" placeholder="confirm your password" required="required"/>
</div>
<div class="input-group">
        <button  type="submit" name="submit" class="btn">Register</button>
</div>
<p class="member"> Already a member?</p>
 <a href="adminlogin.php" class="signin" > Sign In </a>
</form>
</body>
</html>

<?php

include_once "Crud.php";
$crud= new Crud();

if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password1=$_POST['password1'];
        $password2=$_POST['password2'];

        if($password1 !=$password2){
                echo "Passwords Not Matched";
        }
        else{
                $result = $crud->execute("Insert into admin(email,password) VALUES ('$email','$password1')");

                if($result){
                        header("Location:adminlogin.php");
                }
                else{
                        echo "Insertion Problem";
                }
        }



}

?>


