<?php 
unset($_SESSION["login_status"]);
session_destroy();
header("Location: ../login_form.php");
?>