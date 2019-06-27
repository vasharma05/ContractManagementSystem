<?php
session_start();

$con = mysqli_connect('localhost', 'root', '','cms');

$id = $_POST["id"];

$query = "Select * from vendors WHERE id=".$id;

$result = mysqli_query($con,$query);
if($row = mysqli_fetch_assoc($result)){
    $_SESSION["id"] = $id;
    $_SESSION["name"] = $row["name"];
    $_SESSION["start_date"] = $row["start_date"];
    $_SESSION["end_date"] = $row["end_date"];
    $_SESSION["added_by"] = $row["added_by"];
    $_SESSION["info_found"] = "Found";
    $_SESSION["status"] = "Click the Edit/Update Button";
    header("Location: ../vendor.php");
}else{
    $_SESSION["info_found"] = "Not Found";
    echo "Not Found";
}


