<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:adminlogin.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Mnagement System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Employees Record System</h2>
                        <a href="add.php" class="btn btn-success pull-right">Add New Employee</a>
                        
                        <a href="signout.php" class="btn btn-success pull-right">Sign Out</a>

                    </div>
                    <p>Welcome <?php echo $_SESSION['email'];?></p>
                 
                    <?php


                    // Include config file
                    include_once "DBConfig.php";
                    include_once 'Crud.php';
                    $crud = new Crud();
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    $result = $crud->getData($sql);
                   // if($result = $crud->getData($sql)){
                        if(!$result > 0){
                            echo "No records were found.";
                        }
                            else{
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Salary</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
foreach($result as $key=>$res){
    echo "<tr>";
    echo "<td>" . $res['id'] . "</td>";
    echo "<td>" . $res['name'] . "</td>";
    echo "<td>" . $res['address'] . "</td>";
    echo "<td>"  .$res['phone_number']. "</td>";
    echo "<td>" . $res['salary'] . "</td>";   
    echo "<td>";
        echo "<a href='read.php?id=". $res['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
        echo "<a href='update.php?id=". $res['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
        echo "<a href='delete.php?id=". $res['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
    echo "</td>";
echo "</tr>";
}
                             
                                echo "</tbody>";                            
                            echo "</table>";
}     

                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>

