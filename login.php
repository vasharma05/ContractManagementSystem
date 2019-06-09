<?php
$username = $_POST["username"];
$password = $_POST["password"];

$con = mysqli_connect("localhost","root", "", "cms");
if(!$con){
    echo "Failed".mysqli_connect_errno();
}
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$query = "SELECT * FROM employees WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($con,$query);
$row=mysqli_fetch_array($result);
if($result===false){
    echo "error";
    echo mysqli_error($con);

}
else{
    echo $row[0];
}
    header("Location: vendor.html");
?>