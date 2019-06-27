<?php

session_start();
$con = mysqli_connect("localhost","root","","cms");

$id = $_POST["id"];
$name = mysqli_real_escape_string($con,$_POST["name"]);
$project_name = mysqli_real_escape_string($con,$_POST["project_name"]);
$start_date = mysqli_real_escape_string($con,$_POST["start_date"]);
$end_date = mysqli_real_escape_string($con,$_POST["end_date"]);
$employee_id = $_SESSION["employee_id"];
$client = $_POST["client_id"];
$remarks = mysqli_real_escape_string($con,$_POST['remarks']);

$bg_no = $_POST["bg-no"];
$bg_amount = $_POST["bg-amount"];
$bg_date = mysqli_real_escape_string($con,$_POST["bg-date"]);
$bg_expiry_date = mysqli_real_escape_string($con,$_POST["bg-expiry"]);
$confirmation =  mysqli_real_escape_string($con,$_POST["confirm"]);
$confirm_date =  mysqli_real_escape_string($con,$_POST["confirm_date"]);



$info_query = "INSERT INTO vendors VALUES($employee_id, $id, '$name', '$project_name', '$start_date', '$end_date', $client, '$remarks')"; 
$info_result = mysqli_query($con, $info_query);

$bg_query = "INSERT INTO bg_info VALUES($id, $bg_no, $bg_amount, '$bg_date', '$bg_expiry_date', '$confirmation', '$confirm_date')";
$bg_result = mysqli_query($con, $bg_query);

if($info_result === false || $bg_query=== false){
    echo "Failure";
    echo mysqli_error($con);
}else{
    echo "Updated";
    $_SESSION["status"] = "Successfully Added!";
    header("Location: ../vendor.php");
}

?>