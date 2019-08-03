<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:adminlogin.php');
}  
include_once 'Crud.php';
$crud = new Crud();
if(isset($_POST['submit'])){
    $id=$_POST['id'];
}

if($crud->delete($id,"employees")){
    header("location:index.php");
}
?>