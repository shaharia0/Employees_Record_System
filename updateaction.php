<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:adminlogin.php');
}
	include_once 'Crud.php';
	
	$crud = new Crud();
	
	if(isset($_POST['update'])){
		$id = $_POST['id'];
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $address=$_POST['address'];
		$salary = $_POST['salary'];
		
		$result = $crud->execute("Update employees Set name='$name',phone_number='$phone_number',address='$address',salary='$salary' where id=$id");
		
		if($result){
			header("Location:index.php");
		}else{
			echo "Insertion Problem!";
		}
		
	}
	
	
?>