<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php include 'links.php' ?>
</head>
<body>
    <header>
    <div class="container center-div shadow">
    <div class="heading text-center test-uppercase text-white mb-5"> ADMIN SIGN IN HERE</div>
    <div class="container row d-flex flex-row justify-content-center mb-5 ">
    <div class="admin-form shadow p-2">
    <form action="" method="POST">
    <div class="form-group">
    <label> Email ID </label>
    <input type="email" name="email" placeholder="Enter your email" value="" class="form-control" required="required"/>
    </div>
    <div class="form-group">
    <label> Password </label>
    <input type="password" name="password" placeholder=" Enetr your password" value="" class="form-control" required="required"/>
    </div>
    <button type="submit" name="submit" class="btn">Sign In</button>
    <p class="member"> Not yet a member?</p>
    <a href="register.php" class="signup" > Sign Up </a>
    </form>
    </div>
    </div>
    </div>
    </header>
</body>
</html>
<?php 
    session_start();
    include_once 'Crud.php';

    $crud=new Crud();
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=$_POST['password'];

        $query = " select * from admin where email='$email' AND password='$password'";

        $result = $crud->getData($query);
        if($result){
            foreach($result as $res){
                $email = $res['email'];
                $id=$res['id'];
            
            }
            $_SESSION['email']=$email;
            $_SESSION['id']=$id;
          
            header("Location:index.php");
        }
        else{
            echo "Inncorrect Username or Password";
        }
    }
?>