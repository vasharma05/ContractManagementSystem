<?php
session_start();

$con = mysqli_connect('localhost', 'root', '','cms');

$id = $_POST["id"];
$option = mysqli_real_escape_string($con,$_POST["option"]);


$query = "Select * from ".$option."s, bg_info WHERE ".$option."s.id = bg_info.id";
echo $query;
$result = mysqli_query($con,$query);
if($row = mysqli_fetch_assoc($result)){
    $_SESSION['result'] = $row;
    $_SESSION["status"] = "Click the Edit/Update Button";
    $_SESSION["option"] = $option;
    $_SESSION["info_found"] = "Found";
    header("Location: ../vendor.php");
}else{
    $_SESSION["info_found"] = "Not Found";
    echo "Not Found";
}


