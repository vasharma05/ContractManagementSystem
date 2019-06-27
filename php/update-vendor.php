<?php 
    session_start();
    $con = mysqli_connect("localhost","root","","cms");


    $id = $_POST["id"];
    $name = mysqli_real_escape_string($con,$_POST["name"]);
    $start_date = mysqli_real_escape_string($con,$_POST["start_date"]);
    $end_date = mysqli_real_escape_string($con,$_POST["end_date"]);

    $check_query = "SELECT name FROM  vendors WHERE id=$id";

    $check_result = mysqli_query($con,$check_query);
    $row=mysqli_fetch_array($check_result);
    if($check_result === false){
        echo "Failure";
        echo mysqli_error($con);
    }else{
        if($row[0]){
            $query = "UPDATE vendors SET name = '$name', start_date = '$start_date', end_date ='$end_date' WHERE id=$id ";

            $result = mysqli_query($con, $query);

            if($result === false){
                echo "Failure";
                echo mysqli_error($con);
            }

            $_SESSION["status"] = "Updated Successfully";
            
        }else{
            $_SESSION["status"] = "No Records Found";
            

    }
    echo $_SESSION["status"];
    header("Location: ../vendor.php");
    
    }
    ?>