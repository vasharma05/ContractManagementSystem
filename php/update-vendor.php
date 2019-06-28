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
        $remarks =  mysqli_real_escape_string($con,$_POST["remarks"]);
        $vendor = $_POST['vendor_id'];
        
        $info_query = "UPDATE clients SET name='$name', project_name = '$project_name', start_date = '$start_date', end_date = '$end_date', work_no = $work_no, client_date = '$client_date', vendor = $vendor, remarks = '$remarks' WHERE id = ".$id;
        $info_result = mysqli_query($con, $info_query);
    }else{
        $id = $_POST["id"];
        $name = mysqli_real_escape_string($con,$_POST["name"]);
        $project_name = mysqli_real_escape_string($con,$_POST["project_name"]);
        $start_date = mysqli_real_escape_string($con,$_POST["start_date"]);
        $end_date = mysqli_real_escape_string($con,$_POST["end_date"]);
        $client = $_POST['client_id'];
        $remarks =  mysqli_real_escape_string($con,$_POST["remarks"]);

        $info_query = "UPDATE vendors SET name = '$name', project_name = '$project_name', start_date = '$start_date', end_date = '$end_date', client = $client, remarks = '$remarks' WHERE id =".$id; 
        $info_result = mysqli_query($con, $info_query);
    }

    echo $info_query;

    $bg_no = $_POST["bg-no"];
    $bg_amount = $_POST["bg-amount"];
    $bg_date = mysqli_real_escape_string($con,$_POST["bg-date"]);
    $bg_expiry_date = mysqli_real_escape_string($con,$_POST["bg-expiry"]);  
    $confirmation = mysqli_real_escape_string($con,$_POST["confirm"]);
    $confirm_date = mysqli_real_escape_string($con,$_POST["confirm_date"]); 

    if($confirmation === "Yes"){
        $bg_query = "UPDATE bg_info SET bg_no = '$bg_no', confirmation = '$confirmation', confirm_date = '$confirm_date', bg_amount = '$bg_amount', bg_date = '$bg_date', bg_expiry = '$bg_expiry_date' WHERE id=". $id;
    }else{
        $confirm_date = NULL;
        $bg_query = "UPDATE bg_info SET bg_no = '$bg_no', confirmation = '$confirmation', bg_amount = '$bg_amount', bg_date = '$bg_date', bg_expiry = '$bg_expiry_date' WHERE id=". $id;
    }
    echo $bg_query;
    // $bg_result = mysqli_query($con, $bg_query);

    if($info_result === false ){
        echo "Failure";
        echo mysqli_error($con);
    }else{
        echo "Updated";
        $_SESSION["status"] = "Successfully Added!";
        // header("Location: ../vendor.php");
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