<?php

$con = mysqli_connect('localhost','root','','cms');
if(!$con){
    mysqli_error(con);
}

$query="Select added_by,vendors.id,name,project_name,start_date,end_date,client,bg_no,confirmation,confirm_date,bg_amount,bg_date,bg_expiry,remarks from vendors,bg_info WHERE vendors.id = bg_info.id";
$result = mysqli_query($con,$query);

$file = fopen("vendors.csv","a");

$string = "Added By,Client ID,Client Name,Project Name,Start Date,End Date,Client,BG No.,Confirmation from Bank,Confirmation Date,BG Amount,BG Date,BG Expiry Date,Remarks\n";

file_put_contents("vendors.csv",$string);

while($rows = mysqli_fetch_row($result)){   
    fputcsv($file,$rows);
}

fclose($file);
header("Location: ../vendor.php");
?>