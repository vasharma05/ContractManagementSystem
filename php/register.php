<?php   

$con = mysqli_connect("localhost","root", "", "cms");
if(!$con){
    echo "Failed".mysqli_connect_errno();
}

$username =  mysqli_real_escape_string($con, $_GET["username"]);
$name =  mysqli_real_escape_string($con, $_GET["name"]);
$gender =  mysqli_real_escape_string($con, $_GET["gender"]);
$designation = mysqli_real_escape_string($con, $_GET["designation"]);
$email = mysqli_real_escape_string($con, $_GET["email"]);
$contact = mysqli_real_escape_string($con, $_GET["contact"]);
$password = mysqli_real_escape_string($con, $_GET["password"]);


$query = "INSERT INTO employees VALUES ('$username','$name','$gender', '$designation', '$email', '$contact', '$password')";

$result = mysqli_query($con,$query);

if($result===false){
    echo "error";
    echo mysqli_error($con);
}else{
    echo "Updated";
}
header("Location: ../login.html");

?>