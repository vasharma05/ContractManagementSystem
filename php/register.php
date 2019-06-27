<?php   

$con = mysqli_connect("localhost","root", "", "cms");
if(!$con){
    echo "Failed".mysqli_connect_errno();
}

$username = $_POST["username"];
$emp_name =  mysqli_real_escape_string($con, $_POST["name"]);
$gender =  mysqli_real_escape_string($con, $_POST["gender"]);
$designation = mysqli_real_escape_string($con, $_POST["designation"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$contact = mysqli_real_escape_string($con, $_POST["contact"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);


$query = "INSERT INTO employees VALUES ($username,'$emp_name','$gender', '$designation', '$email', '$contact', '$password')";

$result = mysqli_query($con,$query);

if($result===false){
    echo "error";
    echo mysqli_error($con);
}else{
    echo "Updated";
}
// header("Location: ../login_form.php");

?>