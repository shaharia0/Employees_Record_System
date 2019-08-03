<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="add.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="Phone" required="required">
                            
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Address" required="required">
                            
                        </div>

                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" placeholder="Salary" required="required">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>


<?php
	
	include_once 'Crud.php';
	
	$crud = new Crud();
	
	if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $address=$_POST['address'];
		$phone_number = $_POST['phone_number'];
		$salary = $_POST['salary'];
		
		$result = $crud->execute("INSERT into employees(name,address,phone_number,salary) VALUES('$name','$address','$phone_number','$salary')");
		
		if($result){
			header("Location:index.php");
		}else{
			echo "Insertion Problem!";
		}
		
	}
	
	
?>