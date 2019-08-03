<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:adminlogin.php');
}
 require_once "DBConfig.php";
 include_once 'Crud.php';
 $crud = new Crud();

$id = $_GET['id'];
$query="select *from employees where id=$id";
$result = $crud->getData($query);
foreach($result as $res){
    $id=$res['id'];
    $name=$res['name'];
    $address=$res['address'];
    $phone_number=$res['phone_number'];
    $salary=$res['salary'];
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="updateaction.php" method="post">

                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">

                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone_number" class="form-control" value="<?php echo $phone_number; ?>">
                            

                            </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                            
 
                        </div>

                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            
                        </div>
                
                        <input type="submit" name="update" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>