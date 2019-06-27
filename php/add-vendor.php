<?php

session_start();
$con = mysqli_connect("localhost","root","","cms");

$id = $_POST["id"];
$name = mysqli_real_escape_string($con,$_POST["name"]);
$start_date = mysqli_real_escape_string($con,$_POST["start_date"]);
$end_date = mysqli_real_escape_string($con,$_POST["end_date"]);
$employee_id = $_SESSION["employee_id"];
$bg_no = $_POST["bg-no"];
$bg_amount = $_POST["bg-amount"];
$bg_date = mysqli_real_escape_string($con,$_POST["bg-date"]);
$bg_expiry_date = mysqli_real_escape_string($con,$_POST["bg-expiry"]);
$query = "INSERT INTO vendors VALUES($employee_id, $id, '$name', '$start_date', '$end_date', $bg_no, $bg_amount, '$bg_date', '$bg_expiry_date')";

$result = mysqli_query($con, $query);

if($result === false){
    echo "Failure";
    echo mysqli_error($con);
}else{
    echo "Updated";
    $_SESSION["status"] = "Successfully Added!";
    header("Location: ../vendor.php");
}