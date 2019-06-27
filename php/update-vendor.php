<?php 
    session_start();
    $con = mysqli_connect("localhost","root","","cms");

    if($_SESSION['option']==="client"){
        $id = $_POST["id"];
        $name = mysqli_real_escape_string($con,$_POST["name"]);
        $project_name = mysqli_real_escape_string($con,$_POST["project_name"]);
        $start_date = mysqli_real_escape_string($con,$_POST["start_date"]);
        $end_date = mysqli_real_escape_string($con,$_POST["end_date"]);
        $work_no = $_POST["work-no"];
        $client_date = mysqli_real_escape_string($con,$_POST["client-date"]);
        
        $info_query = "UPDATE clients name='$name', project_name = '$start_date', '$end_date', $work_no, '$client_date')";
        $info_result = mysqli_query($con, $info_query);
    }else{
        $id = $_POST["id"];
        $name = mysqli_real_escape_string($con,$_POST["name"]);
        $project_name = mysqli_real_escape_string($con,$_POST["project_name"]);
        $start_date = mysqli_real_escape_string($con,$_POST["start_date"]);
        $end_date = mysqli_real_escape_string($con,$_POST["end_date"]);
        $employee_id = $_SESSION["employee_id"];

        $info_query = "UPDATE vendors VALUES($employee_id, $id, '$name', '$project_name', '$start_date', '$end_date')"; 
        $info_result = mysqli_query($con, $info_query);
    }



    $bg_no = $_POST["bg-no"];
    $bg_amount = $_POST["bg-amount"];
    $bg_date = mysqli_real_escape_string($con,$_POST["bg-date"]);
    $bg_expiry_date = mysqli_real_escape_string($con,$_POST["bg-expiry"]);  

    $bg_query = "UPDATE bg_info VALUES($id, $bg_no, $bg_amount, '$bg_date', '$bg_expiry_date')";
    $bg_result = mysqli_query($con, $bg_query);

    if($info_result === false || $bg_result === false){
        echo "Failure";
        echo mysqli_error($con);
    }else{
        echo "Updated";
        $_SESSION["status"] = "Successfully Added!";
        header("Location: ../vendor.php");
    }



































    // $id = $_POST["id"];
    // $name = mysqli_real_escape_string($con,$_POST["name"]);
    // $start_date = mysqli_real_escape_string($con,$_POST["start_date"]);
    // $end_date = mysqli_real_escape_string($con,$_POST["end_date"]);

    // $check_query = "SELECT name FROM  vendors WHERE id=$id";

    // $check_result = mysqli_query($con,$check_query);
    // $row=mysqli_fetch_array($check_result);
    // if($check_result === false){
    //     echo "Failure";
    //     echo mysqli_error($con);
    // }else{
    //     if($row[0]){
            // $query = "UPDATE vendors SET name = '$name', start_date = '$start_date', end_date ='$end_date' WHERE id=$id ";

    //         $result = mysqli_query($con, $query);

    //         if($result === false){
    //             echo "Failure";
    //             echo mysqli_error($con);
    //         }

    //         $_SESSION["status"] = "Updated Successfully";
            
    //     }else{
    //         $_SESSION["status"] = "No Records Found";
            

    // }
    // echo $_SESSION["status"];
    // header("Location: ../vendor.php");
    
    // }    
    ?>